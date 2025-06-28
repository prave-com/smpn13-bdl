<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\NewsImage;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class NewsController extends Controller
{
    /**
     * Display a listing of the news.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $news = News::with('category', 'images')
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%")
                    ->orWhereHas('category', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    });
            })
            ->latest('published_at')
            ->paginate(10)
            ->appends($request->only('search'));

        return view('admin.news.index', compact('news', 'search'));
    }

    /**
     * Show the form for creating a new news.
     */
    public function create()
    {
        $categories = NewsCategory::orderBy('name')->get();

        return view('admin.news.create', compact('categories'));
    }

    /**
     * Store a newly created news in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique(News::class, 'slug'),
                'regex:/^[a-z0-9-]+$/',
            ],
            'content' => 'required|string', // Konten dari CKEditor
            'news_category_id' => 'required|exists:news_categories,id',
            'published_at' => 'nullable|date',
            // 'images.*' dihapus karena gambar kini dari CKEditor
        ]);

        DB::beginTransaction(); // Mulai transaksi database

        try {
            $news = News::create([
                'title' => $validatedData['title'],
                'slug' => $validatedData['slug'],
                'content' => $validatedData['content'],
                'news_category_id' => $validatedData['news_category_id'],
                'published_at' => $validatedData['published_at'] ? Carbon::parse($validatedData['published_at']) : null,
            ]);

            // Ambil semua URL gambar CKEditor dari konten
            $uploadedImageUrls = $this->extractCkeditorImageUrls($validatedData['content']);

            foreach ($uploadedImageUrls as $url) {
                // Konversi URL publik CKEditor ke path internal storage
                // Asumsi URL dari CKEditor adalah Storage::url('ckeditor_images/nama_file.jpg')
                $relativePath = str_replace(Storage::url(''), '', $url); // Dapatkan 'ckeditor_images/nama_file.jpg'

                // Pastikan file tersebut benar-benar ada di folder ckeditor_images
                if (Storage::disk('public')->exists($relativePath)) {
                    // Pindahkan file dari ckeditor_images ke news_images
                    $newPath = 'news_images/'.basename($relativePath);
                    Storage::disk('public')->move($relativePath, $newPath);

                    // Simpan ke tabel news_images
                    NewsImage::create([
                        'news_id' => $news->id,
                        'image' => $newPath, // Simpan path baru di news_images
                    ]);

                    // Ganti URL gambar di konten CKEditor agar menunjuk ke path baru
                    // Ini penting agar gambar tetap muncul setelah dipindahkan
                    $validatedData['content'] = str_replace($url, Storage::url($newPath), $validatedData['content']);
                }
            }

            // Update konten berita dengan URL gambar yang sudah diperbarui
            $news->content = $validatedData['content'];
            $news->save();

            DB::commit(); // Komit transaksi

            return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dibuat.');

        } catch (\Exception $e) {
            DB::rollBack(); // Rollback jika ada error
            Log::error('Error creating news and processing CKEditor images: '.$e->getMessage(), ['exception' => $e]);

            return redirect()->back()->with('error', 'Gagal membuat berita. Terjadi kesalahan: '.$e->getMessage())->withInput();
        }
    }

    /**
     * Show the form for editing the specified news.
     */
    public function edit(News $news)
    {
        $categories = NewsCategory::orderBy('name')->get();
        $news->load('images');

        return view('admin.news.edit', compact('news', 'categories'));
    }

    /**
     * Update the specified news in storage.
     */
    public function update(Request $request, News $news)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique(News::class, 'slug')->ignore($news->id),
                'regex:/^[a-z0-9-]+$/',
            ],
            'content' => 'required|string', // Konten dari CKEditor
            'news_category_id' => 'required|exists:news_categories,id',
            'published_at' => 'nullable|date',
            // 'images.*' dan 'existing_images_to_delete' dihapus
        ]);

        DB::beginTransaction(); // Mulai transaksi database

        try {
            $news->update([
                'title' => $validatedData['title'],
                'slug' => $validatedData['slug'],
                'content' => $validatedData['content'],
                'news_category_id' => $validatedData['news_category_id'],
                'published_at' => $validatedData['published_at'] ? Carbon::parse($validatedData['published_at']) : null,
            ]);

            // Ambil gambar yang sudah ada di database untuk berita ini
            $existingNewsImages = $news->images->pluck('image')->map(function ($path) {
                return Storage::url($path); // Ubah ke URL publik untuk perbandingan
            })->toArray();

            // Ambil semua URL gambar CKEditor dari konten yang baru disubmit
            $currentCkeditorImageUrls = $this->extractCkeditorImageUrls($validatedData['content']);

            // --- Logika untuk menghapus gambar yang tidak lagi ada di konten CKEditor ---
            foreach ($existingNewsImages as $existingUrl) {
                // Periksa apakah URL gambar lama tidak ada di konten CKEditor yang baru
                if (! in_array($existingUrl, $currentCkeditorImageUrls)) {
                    // Dapatkan path internal dari URL
                    $relativePath = str_replace(Storage::url(''), '', $existingUrl);

                    // Hapus file fisik jika masih ada
                    if (Storage::disk('public')->exists($relativePath)) {
                        Storage::disk('public')->delete($relativePath);
                        Log::info('Deleted old news image file: '.$relativePath);
                    }

                    // Hapus dari tabel NewsImage
                    NewsImage::where('news_id', $news->id)->where('image', $relativePath)->delete();
                    Log::info('Deleted old news image record from DB: '.$relativePath);
                }
            }

            // --- Logika untuk menambahkan gambar baru dari konten CKEditor (yang baru diupload) ---
            foreach ($currentCkeditorImageUrls as $url) {
                // Konversi URL publik CKEditor ke path internal storage
                $relativePath = str_replace(Storage::url(''), '', $url);

                // Cek apakah gambar ini baru (belum ada di tabel news_images) dan ada di folder ckeditor_images
                // Asumsi: Gambar baru dari CKEditor akan berada di folder 'ckeditor_images'
                // Gambar lama yang sudah di news_images akan memiliki path 'news_images/...'
                if (str_starts_with($relativePath, 'ckeditor_images/') && Storage::disk('public')->exists($relativePath)) {
                    $newPath = 'news_images/'.basename($relativePath);

                    // Pindahkan file dari ckeditor_images ke news_images
                    Storage::disk('public')->move($relativePath, $newPath);

                    // Simpan ke tabel news_images
                    NewsImage::create([
                        'news_id' => $news->id,
                        'image' => $newPath,
                    ]);

                    // Ganti URL gambar di konten CKEditor agar menunjuk ke path baru
                    $validatedData['content'] = str_replace($url, Storage::url($newPath), $validatedData['content']);
                }
            }

            // Update konten berita dengan URL gambar yang sudah diperbarui (path baru)
            $news->content = $validatedData['content'];
            $news->save();

            DB::commit();

            return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui.');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating news and processing CKEditor images: '.$e->getMessage(), ['exception' => $e]);

            return redirect()->back()->with('error', 'Gagal memperbarui berita. Terjadi kesalahan: '.$e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified news from storage.
     */
    public function destroy(News $news)
    {
        DB::beginTransaction();
        try {
            // Hapus file fisik gambar yang terkait dengan berita ini dari storage
            foreach ($news->images as $image) {
                Storage::disk('public')->delete($image->image);
            }

            // Hapus berita dan gambar-gambar terkait dari database (karena cascadeOnDelete)
            $news->delete();

            DB::commit();

            return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error deleting news and its images: '.$e->getMessage(), ['exception' => $e]);

            return redirect()->back()->with('error', 'Gagal menghapus berita. Terjadi kesalahan: '.$e->getMessage());
        }
    }

    /**
     * Handle CKEditor 5 image uploads.
     * Gambar sementara disimpan di public/ckeditor_images.
     */
    public function uploadCkeditorImage(Request $request): JsonResponse
    {
        // Untuk debugging, log request dan header
        Log::info('CKEditor Image Upload Request:', $request->all());
        Log::info('X-CSRF-TOKEN Header:', ['token' => $request->header('X-CSRF-TOKEN')]);
        Log::info('ckCsrfToken in Payload (if any):', ['token' => $request->input('ckCsrfToken')]);

        // Validasi token jika dikirim via URL parameter (dari ckeditor_initializer.js)
        if ($request->has('_token') && $request->input('_token') !== csrf_token()) {
            Log::error('CSRF Token mismatch via URL parameter in uploadCkeditorImage!', [
                'received_token' => $request->input('_token'),
                'expected_token' => csrf_token(),
            ]);

            return response()->json([
                'uploaded' => 0,
                'error' => [
                    'message' => 'CSRF token mismatch.',
                ],
            ], 419); // Atau 400
        }

        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // 'upload' adalah nama input default CKEditor
        ]);

        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            // Simpan gambar di folder public/ckeditor_images (sementara)
            $path = $file->store('ckeditor_images', 'public');

            // Dapatkan URL publik untuk gambar yang disimpan
            $url = Storage::url($path);

            // Log path dan URL yang dikembalikan ke CKEditor
            Log::info('CKEditor Image Upload Success:', ['path' => $path, 'url' => $url]);

            // CKEditor mengharapkan respons JSON dalam format tertentu
            return response()->json([
                'uploaded' => 1,
                'fileName' => basename($path),
                'url' => $url,
            ]);
        }

        Log::error('CKEditor File upload failed.', ['request_has_file' => $request->hasFile('upload')]);

        return response()->json([
            'uploaded' => 0,
            'error' => [
                'message' => 'File upload failed.',
            ],
        ], 400);
    }

    /**
     * Helper function to extract CKEditor image URLs from HTML content.
     */
    private function extractCkeditorImageUrls(string $htmlContent): array
    {
        preg_match_all('/<img[^>]+src="([^">]+)"/', $htmlContent, $matches);

        return $matches[1] ?? [];
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\NewsImage;   
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Pastikan ini ada
use Illuminate\Validation\Rule;
use Carbon\Carbon;

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
            ->latest('published_at') // Urutkan berdasarkan tanggal publikasi terbaru
            ->paginate(10)
            ->appends($request->only('search'));

        return view('admin.news.index', compact('news', 'search'));
    }

    /**
     * Show the form for creating a new news.
     */
    public function create()
    {
        $categories = NewsCategory::orderBy('name')->get(); // Ambil semua kategori berita
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
                'regex:/^[a-z0-9-]+$/', // Hanya huruf kecil, angka, dan hyphen
            ],
            'content' => 'required|string',
            'news_category_id' => 'required|exists:news_categories,id',
            'published_at' => 'nullable|date', // Opsional, jika kosong akan diisi null
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Untuk multiple image
        ]);

        $news = News::create([
            'title' => $validatedData['title'],
            'slug' => $validatedData['slug'],
            'content' => $validatedData['content'],
            'news_category_id' => $validatedData['news_category_id'],
            'published_at' => $validatedData['published_at'] ? Carbon::parse($validatedData['published_at']) : null,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                // Simpan di storage/app/public/news_images
                // Simpan path internal ke database
                $path = $imageFile->store('news_images', 'public'); 
                NewsImage::create([
                    'news_id' => $news->id,
                    'image' => $path, // <--- PERUBAHAN UTAMA DI SINI: Simpan $path (jalur internal)
                ]);
            }
        }

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dibuat.');
    }

    /**
     * Show the form for editing the specified news.
     */
    public function edit(News $news)
    {
        $categories = NewsCategory::orderBy('name')->get();
        // Memuat ulang gambar untuk memastikan yang terbaru terambil (jika ada perubahan sebelumnya)
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
                Rule::unique(News::class, 'slug')->ignore($news->id), // Abaikan slug berita ini sendiri
                'regex:/^[a-z0-9-]+$/',
            ],
            'content' => 'required|string',
            'news_category_id' => 'required|exists:news_categories,id',
            'published_at' => 'nullable|date',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'existing_images_to_delete' => 'nullable|array', // Array ID gambar yang akan dihapus
            'existing_images_to_delete.*' => 'exists:news_images,id',
        ]);

        $news->update([
            'title' => $validatedData['title'],
            'slug' => $validatedData['slug'],
            'content' => $validatedData['content'],
            'news_category_id' => $validatedData['news_category_id'],
            'published_at' => $validatedData['published_at'] ? Carbon::parse($validatedData['published_at']) : null,
        ]);

        // Hapus gambar yang ditandai untuk dihapus
        if (isset($validatedData['existing_images_to_delete'])) {
            foreach ($validatedData['existing_images_to_delete'] as $imageId) {
                $imageToDelete = NewsImage::find($imageId);
                if ($imageToDelete) {
                    // <--- PERUBAHAN UTAMA DI SINI: Hapus langsung menggunakan path yang disimpan
                    Storage::disk('public')->delete($imageToDelete->image); 
                    $imageToDelete->delete(); // Hapus dari database
                }
            }
        }

        // Tambahkan gambar baru
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                // Simpan di storage/app/public/news_images
                // Simpan path internal ke database
                $path = $imageFile->store('news_images', 'public');
                NewsImage::create([
                    'news_id' => $news->id,
                    'image' => $path, // <--- PERUBAHAN UTAMA DI SINI: Simpan $path (jalur internal)
                ]);
            }
        }

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui.');
    }

    /**
     * Remove the specified news from storage.
     */
    public function destroy(News $news)
    {
        // Karena ada cascadeOnDelete di migrasi news_images, gambar-gambar terkait akan terhapus otomatis.
        // Namun, file fisik di storage tidak otomatis terhapus. Kita perlu menghapusnya secara manual.
        foreach ($news->images as $image) {
            // <--- PERUBAHAN UTAMA DI SINI: Hapus langsung menggunakan path yang disimpan
            Storage::disk('public')->delete($image->image);
        }

        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus.');
    }

    /**
     * Handle CKEditor 5 image uploads.
     */
    public function uploadCkeditorImage(Request $request): JsonResponse
    {
        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // 'upload' adalah nama input default CKEditor
        ]);

        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            // Simpan gambar di folder public/ckeditor_images
            $path = $file->store('ckeditor_images', 'public'); // Simpan path internal di sini

            // Dapatkan URL publik untuk gambar yang disimpan
            $url = Storage::url($path); // Untuk CKEditor, kita tetap harus mengembalikan URL publik

            // CKEditor mengharapkan respons JSON dalam format tertentu
            return response()->json([
                'uploaded' => 1,
                'fileName' => basename($path),
                'url' => $url,
            ]);
        }

        return response()->json([
            'uploaded' => 0,
            'error' => [
                'message' => 'File upload failed.'
            ]
        ], 400); // Kode status 400 untuk kesalahan
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class GalleryCategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $galleryCategories = GalleryCategory::when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('slug', 'like', "%{$search}%");
        })->paginate(10)
            ->appends($request->only('search'));

        return view('admin.gallery-categories.index', compact('galleryCategories', 'search'));
    }

    public function create()
    {
        return view('admin.gallery-categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique(GalleryCategory::class, 'slug'),
                'regex:/^[a-z0-9-]+$/',
            ],
        ]);

        GalleryCategory::create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return redirect()->route('admin.gallery-categories.index')->with('success', 'Kategori galeri berhasil dibuat.');
    }

    public function edit(GalleryCategory $galleryCategory)
    {
        return view('admin.gallery-categories.edit', compact('galleryCategory'));
    }

    public function update(Request $request, GalleryCategory $galleryCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique(GalleryCategory::class, 'slug')->ignore($galleryCategory->id),
                'regex:/^[a-z0-9-]+$/',
            ],
        ]);

        $galleryCategory->update([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return redirect()->route('admin.gallery-categories.index')->with('success', 'Kategori galeri berhasil diperbarui.');
    }

    public function destroy(GalleryCategory $galleryCategory)
    {
        foreach ($galleryCategory->galleries as $gallery) {
            Storage::disk('public')->delete($gallery->image);
            $gallery->delete();
        }

        $galleryCategory->delete();

        return redirect()->route('admin.gallery-categories.index')->with('success', 'Kategori galeri berhasil dihapus.');
    }
}

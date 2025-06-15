<?php

namespace App\Http\Controllers;

use App\Models\GalleryCategory;
use Illuminate\Http\Request;

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

        return view('gallery-categories.index', compact('galleryCategories', 'search'));
    }

    public function create()
    {
        return view('gallery-categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:App\Models\GalleryCategory,slug|regex:/^[a-z0-9-]+$/',
        ]);

        GalleryCategory::create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return redirect()->route('gallery-categories.index')->with('success', 'Kategori galeri berhasil dibuat.');
    }

    public function show(GalleryCategory $galleryCategory)
    {
        return view('gallery-categories.show', compact('galleryCategory'));
    }

    public function edit(GalleryCategory $galleryCategory)
    {
        return view('gallery-categories.edit', compact('galleryCategory'));
    }

    public function update(Request $request, GalleryCategory $galleryCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:App\Models\GalleryCategory,slug,'.$galleryCategory->id.'|regex:/^[a-z0-9-]+$/',
        ]);

        $galleryCategory->update([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return redirect()->route('gallery-categories.index')->with('success', 'Kategori galeri berhasil diperbarui.');
    }

    public function destroy(GalleryCategory $galleryCategory)
    {
        $galleryCategory->delete();

        return redirect()->route('gallery-categories.index')->with('success', 'Kategori galeri berhasil dihapus.');
    }
}

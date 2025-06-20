<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index(GalleryCategory $galleryCategory)
    {
        $galleries = $galleryCategory->galleries()->latest()->get();

        return view('admin.galleries.index', compact('galleryCategory', 'galleries'));
    }

    public function store(Request $request, GalleryCategory $galleryCategory)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        foreach ($request->file('images') as $image) {
            $imagePath = $image->store('galleries', 'public');

            $galleryCategory->galleries()->create([
                'image' => $imagePath,
            ]);
        }

        return redirect()->route('admin.gallery-categories.galleries.index', $galleryCategory->slug);
    }

    public function destroy(Gallery $gallery)
    {
        Storage::disk('public')->delete($gallery->image);

        $gallery->delete();

        return back();
    }
}

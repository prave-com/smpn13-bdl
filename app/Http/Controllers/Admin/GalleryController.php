<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index(GalleryCategory $galleryCategory)
    {
        $galleries = $galleryCategory->galleries()->latest()->get();

        return view('galleries.index', compact('galleryCategory', 'galleries'));
    }

    public function store(Request $request, GalleryCategory $galleryCategory)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        foreach ($request->file('images') as $image) {
            $imagePath = $image->store('galleries');

            $galleryCategory->galleries()->create([
                'image' => basename($imagePath),
            ]);
        }

        return redirect()->route('gallery-categories.galleries.index', $galleryCategory->slug);
    }

    public function destroy(Gallery $gallery)
    {
        Storage::delete('galleries/'.$gallery->image);

        $gallery->delete();

        return back();
    }

    public function showImage(Gallery $gallery)
    {
        $path = 'galleries/'.$gallery->image;

        if (Storage::exists($path)) {
            $headers = [
                'Content-Type' => File::mimeType(Storage::path($path)),
            ];

            return response()->file(Storage::path($path), $headers);
        }

        abort(404);
    }
}

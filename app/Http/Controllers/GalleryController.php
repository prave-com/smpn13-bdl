<?php

namespace App\Http\Controllers;

use App\Models\GalleryCategory;

class GalleryController extends Controller
{
    public function index()
    {
        $galleryCategories = GalleryCategory::with('galleries')->get();

        return view('gallery.index', compact('galleryCategories'));
    }

    public function show(GalleryCategory $galleryCategory)
    {
        return view('gallery.show', compact('galleryCategory'));
    }
}

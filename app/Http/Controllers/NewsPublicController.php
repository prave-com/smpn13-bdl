<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsPublicController extends Controller
{
    /**
     * Display a listing of the news.
     */
    public function index()
    {
        $allNews = News::with(['images', 'category'])
            ->latest('published_at')
            ->whereNotNull('published_at')
            ->paginate(9); // Contoh paginasi 9 berita per halaman

        return view('news.index', compact('allNews'));
    }

    /**
     * Display the specified news.
     */
    public function show(News $news) // Menggunakan Route Model Binding
    {
        // Pastikan berita memiliki gambar yang dimuat
        $news->load('images', 'category');

        return view('news.show', compact('news'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class NewsPublicController extends Controller
{
    public function index(Request $request)
    {
        // Get all categories with their news count
        $categories = NewsCategory::withCount('news')->get();
        $search = $request->query('search');

        // Get total count of published news for the "Semua" (All) category
        $totalNewsCount = News::whereNotNull('published_at')->count();

        $allNews = News::with(['images', 'category'])
            ->whereNotNull('published_at')
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                        ->orWhere('content', 'like', "%{$search}%");
                });
            })
            ->latest('published_at')
            ->paginate(9)
            ->withQueryString(); // agar pagination tetap mempertahankan query

        // Pass totalNewsCount to the view
        return view('news.index', compact('allNews', 'categories', 'search', 'totalNewsCount'));
    }

    public function category(NewsCategory $category, Request $request)
    {
        // Get all categories with their news count
        $categories = NewsCategory::withCount('news')->get();
        $search = $request->query('search');

        // Get total count of published news for the "Semua" (All) category
        $totalNewsCount = News::whereNotNull('published_at')->count();

        $allNews = News::with(['images', 'category'])
            ->where('news_category_id', $category->id)
            ->whereNotNull('published_at')
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                        ->orWhere('content', 'like', "%{$search}%");
                });
            })
            ->latest('published_at')
            ->paginate(9)
            ->withQueryString();

        // Pass totalNewsCount to the view
        return view('news.index', compact('allNews', 'categories', 'search', 'category', 'totalNewsCount'));
    }

    public function show(NewsCategory $category, News $news)
    {
        // Validasi dengan object comparison (lebih aman)
        abort_unless($news->category->is($category), 404);

        $news->load('images', 'category');

        // Calculate reading time
        $wordCount = str_word_count(strip_tags($news->content));
        $wordsPerMinute = 200; // Average reading speed
        $readingTime = ceil($wordCount / $wordsPerMinute); // Round up to nearest minute

        return view('news.show', compact('news', 'readingTime')); // Pass readingTime to the view
    }
}
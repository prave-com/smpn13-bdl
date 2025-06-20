<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class NewsCategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $newsCategories = NewsCategory::when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('slug', 'like', "%{$search}%");
        })->paginate(10)
            ->appends($request->only('search'));

        return view('admin.news-categories.index', compact('newsCategories', 'search'));
    }

    public function create()
    {
        return view('admin.news-categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:App\Models\NewsCategory,slug|regex:/^[a-z0-9-]+$/',
        ]);

        NewsCategory::create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return redirect()->route('admin.news-categories.index')->with('success', 'Kategori berita berhasil dibuat.');
    }

    public function edit(NewsCategory $newsCategory)
    {
        return view('admin.news-categories.edit', compact('newsCategory'));
    }

    public function update(Request $request, NewsCategory $newsCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:App\Models\NewsCategory,slug,'.$newsCategory->id.'|regex:/^[a-z0-9-]+$/',
        ]);

        $newsCategory->update([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return redirect()->route('admin.news-categories.index')->with('success', 'Kategori berita berhasil diperbarui.');
    }

    public function destroy(NewsCategory $newsCategory)
    {
        $newsCategory->delete();

        return redirect()->route('admin.news-categories.index')->with('success', 'Kategori berita berhasil dihapus.');
    }
}

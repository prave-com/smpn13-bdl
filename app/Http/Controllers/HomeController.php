<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Extracurricular;
use App\Models\Staff;
use App\Models\Statistic;
use App\Models\News; // <-- TAMBAHKAN INI
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $stats = Statistic::first();
        $achievements = Achievement::latest()->take(4)->get();
        $extracurriculars = Extracurricular::latest()->take(3)->get();
        $staffs = Staff::latest()->take(4)->get();

        // Mengambil 6 berita terbaru yang sudah dipublikasi, eager load gambar dan kategori
        $latestNews = News::with(['images', 'category'])
                          ->latest('published_at')
                          ->whereNotNull('published_at') // Pastikan hanya berita yang punya tanggal publikasi
                          ->take(6) // Ambil 6 berita untuk slider
                          ->get();

        return view('welcome', compact('stats', 'achievements', 'extracurriculars', 'staffs', 'latestNews'));
    }
}
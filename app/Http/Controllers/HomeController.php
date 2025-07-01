<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Extracurricular;
use App\Models\News;
use App\Models\Staff;
use App\Models\Statistic;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $stats = Statistic::first();
        $achievements = Achievement::take(4)->get();
        $extracurriculars = Extracurricular::take(3)->get();
        $staffs = Staff::with('positions')
            ->select('staff.*', DB::raw('MIN(positions.ordering) as min_ordering_position'))
            ->leftJoin('position_staff', 'staff.id', '=', 'position_staff.staff_id')
            ->leftJoin('positions', 'position_staff.position_id', '=', 'positions.id')
            ->groupBy('staff.id', 'staff.name', 'staff.avatar', 'staff.created_at', 'staff.updated_at')
            ->orderByRaw('MIN(positions.ordering) IS NULL ASC, MIN(positions.ordering) ASC')
            ->orderBy('staff.name', 'ASC')
            ->take(4)
            ->get();

        $latestNews = News::with(['images', 'category'])
            ->latest('published_at')
            ->whereNotNull('published_at')
            ->take(6)
            ->get();

        return view('welcome', compact('stats', 'achievements', 'extracurriculars', 'staffs', 'latestNews'));
    }
}

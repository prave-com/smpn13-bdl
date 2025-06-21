<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    public function index(Request $request)
    {
        $achievements = Achievement::all();

        return view('prestasi', compact('achievements'));
    }
}

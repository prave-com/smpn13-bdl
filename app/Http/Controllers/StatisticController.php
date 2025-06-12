<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function edit()
    {
        $statistic = Statistic::firstOrCreate([]);

        return view('statistics.edit', compact('statistic'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'students_count' => 'required|integer|min:0',
            'teachers_count' => 'required|integer|min:0',
            'staff_count' => 'required|integer|min:0',
            'alumni_count' => 'required|integer|min:0',
        ]);

        $statistic = Statistic::first();
        $statistic->update($request->validated());

        return redirect()->route('statistics.edit')->with('success', 'Statistics data has been successfully updated!');
    }
}

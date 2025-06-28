<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Statistic;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function edit()
    {
        $statistic = Statistic::firstOrCreate([]);

        return view('admin.statistics.edit', compact('statistic'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'students_count' => 'required|integer|min:0',
            'teachers_count' => 'required|integer|min:0',
            'staff_count' => 'required|integer|min:0',
            'alumni_count' => 'required|integer|min:0',
        ]);

        $statistic = Statistic::first();
        $statistic->update($validated);

        return redirect()->route('admin.statistics.edit')->with('success', 'Data statistik berhasil diperbarui.');
    }
}

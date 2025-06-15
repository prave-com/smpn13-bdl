<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AchievementController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $achievements = Achievement::when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        })->paginate(10)
            ->appends($request->only('search'));

        return view('achievements.index', compact('achievements', 'search'));
    }

    public function create()
    {
        return view('achievements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $imagePath = $request->file('image')->store('achievements');

        Achievement::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => basename($imagePath),
        ]);

        return redirect()->route('achievements.index')->with('success', 'Prestasi berhasil dibuat.');
    }

    public function show(Achievement $achievement)
    {
        return view('achievements.show', compact('achievement'));
    }

    public function edit(Achievement $achievement)
    {
        return view('achievements.edit', compact('achievement'));
    }

    public function update(Request $request, Achievement $achievement)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $updateData = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        if ($request->hasFile('image')) {
            Storage::delete('achievements/'.$achievement->image);
            $imagePath = $request->file('image')->store('achievements');
            $updateData['image'] = basename($imagePath);
        }

        $achievement->update($updateData);

        return redirect()->route('achievements.index')->with('success', 'Prestasi berhasil diperbarui.');
    }

    public function destroy(Achievement $achievement)
    {
        Storage::delete('achievements/'.$achievement->image);

        $achievement->delete();

        return redirect()->route('achievements.index')->with('success', 'Prestasi berhasil dihapus.');
    }

    public function showImage(Achievement $achievement)
    {
        $path = 'achievements/'.$achievement->image;

        if (Storage::exists($path)) {
            $headers = [
                'Content-Type' => File::mimeType(Storage::path($path)),
            ];

            return response()->file(Storage::path($path), $headers);
        }

        abort(404);
    }
}

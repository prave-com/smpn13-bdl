<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AchievementController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $achievements = Achievement::when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%");
        })->paginate(10)
            ->appends($request->only('search'));

        return view('admin.achievements.index', compact('achievements', 'search'));
    }

    public function create()
    {
        return view('admin.achievements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'attachment' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,txt,odt|max:20480',
        ]);

        $attachmentPath = $request->file('attachment')->store('achievements', 'public');

        Achievement::create([
            'name' => $request->name,
            'attachment' => $attachmentPath,
        ]);

        return redirect()->route('admin.achievements.index')->with('success', 'Prestasi berhasil dibuat.');
    }

    public function edit(Achievement $achievement)
    {
        return view('admin.achievements.edit', compact('achievement'));
    }

    public function update(Request $request, Achievement $achievement)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,txt,odt|max:20480',
        ]);

        $updateData = [
            'name' => $request->name,
        ];

        if ($request->hasFile('attachment')) {
            Storage::disk('public')->delete($achievement->attachment);
            $attachmentPath = $request->file('attachment')->store('achievements', 'public');
            $updateData['attachment'] = $attachmentPath;
        }

        $achievement->update($updateData);

        return redirect()->route('admin.achievements.index')->with('success', 'Prestasi berhasil diperbarui.');
    }

    public function destroy(Achievement $achievement)
    {
        Storage::disk('public')->delete($achievement->attachment);

        $achievement->delete();

        return redirect()->route('admin.achievements.index')->with('success', 'Prestasi berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Extracurricular;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ExtracurricularController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $extracurriculars = Extracurricular::where('name', 'like', "%{$search}%")
            ->orWhere('description', 'like', "%{$search}%")
            ->paginate(10)
            ->appends($request->only('search'));

        return view('extracurriculars.index', compact('extracurriculars', 'search'));
    }

    public function create()
    {
        return view('extracurriculars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $imagePath = $request->file('image')->store('extracurriculars');

        Extracurricular::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => basename($imagePath),
        ]);

        return redirect()->route('extracurriculars.index')->with('success', 'Ekstrakurikuler berhasil dibuat.');
    }

    public function show(Extracurricular $extracurricular)
    {
        return view('extracurriculars.show', compact('extracurricular'));
    }

    public function edit(Extracurricular $extracurricular)
    {
        return view('extracurriculars.edit', compact('extracurricular'));
    }

    public function update(Request $request, Extracurricular $extracurricular)
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
            Storage::delete('extracurriculars/'.$extracurricular->image);
            $imagePath = $request->file('image')->store('extracurriculars');
            $updateData['image'] = basename($imagePath);
        }

        $extracurricular->update($updateData);

        return redirect()->route('extracurriculars.index')->with('success', 'Ekstrakurikuler berhasil diperbarui.');
    }

    public function destroy(Extracurricular $extracurricular)
    {
        Storage::delete('extracurriculars/'.$extracurricular->image);

        $extracurricular->delete();

        return redirect()->route('extracurriculars.index')->with('success', 'Ekstrakurikuler berhasil dihapus.');
    }

    public function showImage(Extracurricular $extracurricular)
    {
        $path = 'extracurriculars/'.$extracurricular->image;

        if (Storage::exists($path)) {
            $headers = [
                'Content-Type' => File::mimeType(Storage::path($path)),
            ];

            return response()->file(Storage::path($path), $headers);
        }

        abort(404);
    }
}

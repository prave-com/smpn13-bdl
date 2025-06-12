<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FacilityController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $facilities = Facility::where('name', 'like', "%{$search}%")
            ->paginate(10);

        return view('facilities.index', compact('facilities', 'search'));
    }

    public function create()
    {
        return view('facilities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $imagePath = $request->file('image')->store('facilities');

        Facility::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => basename($imagePath),
        ]);

        return redirect()->route('facilities.index')->with('success', 'Fasilitas berhasil dibuat.');
    }

    public function show(Facility $facility)
    {
        return view('facilities.show', compact('facility'));
    }

    public function edit(Facility $facility)
    {
        return view('facilities.edit', compact('facility'));
    }

    public function update(Request $request, Facility $facility)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        if ($request->hasFile('image')) {
            Storage::delete('facilities/'.$facility->image);

            $imagePath = $request->file('image')->store('facilities');
            $facility->update(['image' => basename($imagePath)]);
        }

        $facility->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('facilities.index')->with('success', 'Fasilitas berhasil diperbarui.');
    }

    public function destroy(Facility $facility)
    {
        Storage::delete('facilities/'.$facility->image);

        $facility->delete();

        return redirect()->route('facilities.index')->with('success', 'Fasilitas berhasil dihapus.');
    }

    public function showImage(Facility $facility)
    {
        $path = 'facilities/'.$facility->image;

        if (Storage::disk('local')->exists($path)) {
            $headers = [
                'Content-Type' => File::mimeType(Storage::disk('local')->path($path)),
            ];

            return response()->file(Storage::disk('local')->path($path), $headers);
        }

        abort(404);
    }
}

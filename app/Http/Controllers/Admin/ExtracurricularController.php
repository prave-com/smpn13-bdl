<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Extracurricular;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExtracurricularController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $extracurriculars = Extracurricular::when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        })->paginate(10)
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
            'description' => 'nullable|string',
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'image4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'image5' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $imagePath1 = $request->file('image1')->store('extracurriculars', 'public');
        $imagePath2 = $request->hasFile('image2') ? $request->file('image2')->store('extracurriculars', 'public') : null;
        $imagePath3 = $request->hasFile('image3') ? $request->file('image3')->store('extracurriculars', 'public') : null;
        $imagePath4 = $request->hasFile('image4') ? $request->file('image4')->store('extracurriculars', 'public') : null;
        $imagePath5 = $request->hasFile('image5') ? $request->file('image5')->store('extracurriculars', 'public') : null;

        Extracurricular::create([
            'name' => $request->name,
            'description' => $request->description,
            'image1' => $imagePath1,
            'image2' => $imagePath2,
            'image3' => $imagePath3,
            'image4' => $imagePath4,
            'image5' => $imagePath5,
        ]);

        return redirect()->route('extracurriculars.index')->with('success', 'Ekstrakurikuler berhasil dibuat.');
    }

    public function edit(Extracurricular $extracurricular)
    {
        return view('extracurriculars.edit', compact('extracurricular'));
    }

    public function update(Request $request, Extracurricular $extracurricular)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'image4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'image5' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $updateData = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        if ($request->hasFile('image1')) {
            if ($extracurricular->image1) {
                Storage::disk('public')->delete($extracurricular->image1);
            }
            $imagePath = $request->file('image1')->store('extracurriculars', 'public');
            $updateData['image1'] = $imagePath;
        }

        if ($request->hasFile('image2')) {
            if ($extracurricular->image2) {
                Storage::disk('public')->delete($extracurricular->image2);
            }
            $imagePath = $request->file('image2')->store('extracurriculars', 'public');
            $updateData['image2'] = $imagePath;
        }

        if ($request->hasFile('image3')) {
            if ($extracurricular->image3) {
                Storage::disk('public')->delete($extracurricular->image3);
            }
            $imagePath = $request->file('image3')->store('extracurriculars', 'public');
            $updateData['image3'] = $imagePath;
        }

        if ($request->hasFile('image4')) {
            if ($extracurricular->image4) {
                Storage::disk('public')->delete($extracurricular->image4);
            }
            $imagePath = $request->file('image4')->store('extracurriculars', 'public');
            $updateData['image4'] = $imagePath;
        }

        if ($request->hasFile('image5')) {
            if ($extracurricular->image5) {
                Storage::disk('public')->delete($extracurricular->image5);
            }
            $imagePath = $request->file('image5')->store('extracurriculars', 'public');
            $updateData['image5'] = $imagePath;
        }

        $extracurricular->update($updateData);

        return redirect()->route('extracurriculars.index')->with('success', 'Ekstrakurikuler berhasil diperbarui.');
    }

    public function destroy(Extracurricular $extracurricular)
    {
        Storage::disk('public')->delete($extracurricular->image1);

        if ($extracurricular->image2) {
            Storage::disk('public')->delete($extracurricular->image2);
        }

        if ($extracurricular->image3) {
            Storage::disk('public')->delete($extracurricular->image3);
        }

        if ($extracurricular->image4) {
            Storage::disk('public')->delete($extracurricular->image4);
        }

        if ($extracurricular->image5) {
            Storage::disk('public')->delete($extracurricular->image5);
        }

        $extracurricular->delete();

        return redirect()->route('extracurriculars.index')->with('success', 'Ekstrakurikuler berhasil dihapus.');
    }
}

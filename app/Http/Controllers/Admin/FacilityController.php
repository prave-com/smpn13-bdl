<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FacilityController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $facilities = Facility::when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        })->paginate(10)
            ->appends($request->only('search'));

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
            'description' => 'nullable|string',
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'image4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'image5' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $imagePath1 = $request->file('image1')->store('facilities', 'public');
        $imagePath2 = $request->hasFile('image2') ? $request->file('image2')->store('facilities', 'public') : null;
        $imagePath3 = $request->hasFile('image3') ? $request->file('image3')->store('facilities', 'public') : null;
        $imagePath4 = $request->hasFile('image4') ? $request->file('image4')->store('facilities', 'public') : null;
        $imagePath5 = $request->hasFile('image5') ? $request->file('image5')->store('facilities', 'public') : null;

        Facility::create([
            'name' => $request->name,
            'description' => $request->description,
            'image1' => $imagePath1,
            'image2' => $imagePath2,
            'image3' => $imagePath3,
            'image4' => $imagePath4,
            'image5' => $imagePath5,
        ]);

        return redirect()->route('facilities.index')->with('success', 'Fasilitas berhasil dibuat.');
    }

    public function edit(Facility $facility)
    {
        return view('facilities.edit', compact('facility'));
    }

    public function update(Request $request, Facility $facility)
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
            if ($facility->image1) {
                Storage::disk('public')->delete($facility->image1);
            }
            $imagePath = $request->file('image1')->store('facilities', 'public');
            $updateData['image1'] = $imagePath;
        }

        if ($request->hasFile('image2')) {
            if ($facility->image2) {
                Storage::disk('public')->delete($facility->image2);
            }
            $imagePath = $request->file('image2')->store('facilities', 'public');
            $updateData['image2'] = $imagePath;
        }

        if ($request->hasFile('image3')) {
            if ($facility->image3) {
                Storage::disk('public')->delete($facility->image3);
            }
            $imagePath = $request->file('image3')->store('facilities', 'public');
            $updateData['image3'] = $imagePath;
        }

        if ($request->hasFile('image4')) {
            if ($facility->image4) {
                Storage::disk('public')->delete($facility->image4);
            }
            $imagePath = $request->file('image4')->store('facilities', 'public');
            $updateData['image4'] = $imagePath;
        }

        if ($request->hasFile('image5')) {
            if ($facility->image5) {
                Storage::disk('public')->delete($facility->image5);
            }
            $imagePath = $request->file('image5')->store('facilities', 'public');
            $updateData['image5'] = $imagePath;
        }

        $facility->update($updateData);

        return redirect()->route('facilities.index')->with('success', 'Fasilitas berhasil diperbarui.');
    }

    public function destroy(Facility $facility)
    {
        Storage::disk('public')->delete($facility->image1);

        if ($facility->image2) {
            Storage::disk('public')->delete($facility->image2);
        }

        if ($facility->image3) {
            Storage::disk('public')->delete($facility->image3);
        }

        if ($facility->image4) {
            Storage::disk('public')->delete($facility->image4);
        }

        if ($facility->image5) {
            Storage::disk('public')->delete($facility->image5);
        }

        $facility->delete();

        return redirect()->route('facilities.index')->with('success', 'Fasilitas berhasil dihapus.');
    }
}

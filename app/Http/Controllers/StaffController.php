<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $staff = Staff::when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('position', 'like', "%{$search}%");
        })->paginate(10)
            ->appends($request->only('search'));

        return view('staff.index', compact('staff', 'search'));
    }

    public function create()
    {
        return view('staff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $imagePath = $request->file('avatar')->store('staff');

        Staff::create([
            'name' => $request->name,
            'position' => $request->position,
            'avatar' => basename($imagePath),
        ]);

        return redirect()->route('staff.index')->with('success', 'Staff berhasil dibuat.');
    }

    public function edit(Staff $staff)
    {
        return view('staff.edit', compact('staff'));
    }

    public function update(Request $request, Staff $staff)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $updateData = [
            'name' => $request->name,
            'position' => $request->position,
        ];

        if ($request->hasFile('avatar')) {
            Storage::delete('staff/'.$staff->avatar);
            $imagePath = $request->file('avatar')->store('staff');
            $updateData['avatar'] = basename($imagePath);
        }

        $staff->update($updateData);

        return redirect()->route('staff.index')->with('success', 'Staff berhasil diperbarui.');
    }

    public function destroy(Staff $staff)
    {
        Storage::delete('staff/'.$staff->avatar);

        $staff->delete();

        return redirect()->route('staff.index')->with('success', 'Staff berhasil dihapus.');
    }

    public function showImage(Staff $staff)
    {
        $path = 'staff/'.$staff->avatar;

        if (Storage::exists($path)) {
            $headers = [
                'Content-Type' => File::mimeType(Storage::path($path)),
            ];

            return response()->file(Storage::path($path), $headers);
        }

        abort(404);
    }
}

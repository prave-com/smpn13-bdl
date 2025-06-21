<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $staff = Staff::when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%");
        })->paginate(10)
            ->appends($request->only('search'));

        return view('admin.staff.index', compact('staff', 'search'));
    }

    public function create()
    {
        $positions = Position::orderBy('ordering')->get();

        return view('admin.staff.create', compact('positions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'positions' => 'required|array',
            'positions.*' => 'exists:positions,id',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $imagePath = $request->hasFile('avatar') ? $request->file('avatar')->store('staff', 'public') : null;

        $staff = Staff::create([
            'name' => $request->name,
            'avatar' => $imagePath,
        ]);

        $staff->positions()->sync($request->positions);

        return redirect()->route('admin.staff.index')->with('success', 'Staff berhasil dibuat.');
    }

    public function edit(Staff $staff)
    {
        $positions = Position::orderBy('ordering')->get();

        return view('admin.staff.edit', compact('staff', 'positions'));
    }

    public function update(Request $request, Staff $staff)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'positions' => 'required|array',
            'positions.*' => 'exists:positions,id',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $updateData = [
            'name' => $request->name,
        ];

        if ($request->hasFile('avatar')) {
            if ($staff->avatar) {
                Storage::disk('public')->delete($staff->avatar);
            }
            $imagePath = $request->file('avatar')->store('staff', 'public');
            $updateData['avatar'] = $imagePath;
        }

        $staff->update($updateData);
        $staff->positions()->sync($request->positions);

        return redirect()->route('admin.staff.index')->with('success', 'Staff berhasil diperbarui.');
    }

    public function destroy(Staff $staff)
    {
        if ($staff->avatar) {
            Storage::disk('public')->delete($staff->avatar);
        }

        $staff->delete();

        return redirect()->route('admin.staff.index')->with('success', 'Staff berhasil dihapus.');
    }
}

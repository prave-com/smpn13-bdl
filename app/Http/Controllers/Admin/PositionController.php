<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $positions = Position::when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%");
        })->orderBy('ordering')
            ->paginate(10)
            ->appends($request->only('search'));

        return view('admin.positions.index', compact('positions', 'search'));
    }

    public function create()
    {
        return view('admin.positions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'ordering' => 'required|integer|numeric|between:0,255|unique:App\Models\Position,ordering',
        ]);

        Position::create([
            'name' => $request->name,
            'ordering' => $request->ordering,
        ]);

        return redirect()->route('admin.positions.index')->with('success', 'Posisi berhasil dibuat.');
    }

    public function edit(Position $position)
    {
        return view('admin.positions.edit', compact('position'));
    }

    public function update(Request $request, Position $position)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'ordering' => 'required|integer|numeric|between:0,255|unique:App\Models\Position,ordering,'.$position->id,
        ]);

        $position->update([
            'name' => $request->name,
            'ordering' => $request->ordering,
        ]);

        return redirect()->route('admin.positions.index')->with('success', 'Posisi berhasil diperbarui.');
    }

    public function destroy(Position $position)
    {
        $position->delete();

        return redirect()->route('admin.positions.index')->with('success', 'Posisi berhasil dihapus.');
    }
}

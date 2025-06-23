<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class PositionController extends Controller
{
    protected function reorderPositions()
    {
        DB::transaction(function () {
            $positions = Position::orderBy('ordering')->get();

            foreach ($positions as $index => $position) {
                $position->ordering = $index;
                $position->saveQuietly();
            }
        });
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $positions = Position::when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%");
        })->orderBy('ordering')
            ->get();

        $canAddPosition = true;
        if (Position::max('ordering') + 1 > 255) {
            $canAddPosition = false;
        }

        return view('admin.positions.index', compact('positions', 'search', 'canAddPosition'));
    }

    public function create()
    {
        $nextOrdering = Position::max('ordering');
        $suggestedOrdering = $nextOrdering !== null ? $nextOrdering + 1 : 0;

        if ($suggestedOrdering > 255) {
            $suggestedOrdering = null;
        }

        return view('admin.positions.create', compact('suggestedOrdering'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'ordering' => [
                'required',
                'integer',
                'numeric',
                'between:0,255',
                Rule::unique('positions', 'ordering'),
            ],
        ]);

        Position::create([
            'name' => $request->name,
            'ordering' => $request->ordering,
        ]);

        $this->reorderPositions();

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
        ]);

        $position->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.positions.index')->with('success', 'Posisi berhasil diperbarui.');
    }

    public function destroy(Position $position)
    {
        $position->delete();

        $this->reorderPositions();

        return redirect()->route('admin.positions.index')->with('success', 'Posisi berhasil dihapus.');
    }

    public function updateOrder(Request $request)
    {
        $request->validate([
            'positions' => 'required|array',
            'positions.*.id' => 'required|integer|exists:positions,id',
            'positions.*.ordering' => 'required|integer|min:0|max:255',
        ]);

        DB::transaction(function () use ($request) {
            Position::query()->update(['ordering' => null]);

            foreach ($request->positions as $positionData) {
                Position::where('id', $positionData['id'])->update([
                    'ordering' => $positionData['ordering'],
                ]);
            }
        });

        $this->reorderPositions();

        return response()->json(['message' => 'Urutan posisi berhasil diperbarui.']);
    }
}

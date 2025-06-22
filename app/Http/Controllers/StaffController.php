<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function index(Request $request)
    {
        $staffMembers = Staff::with('positions')
            ->select('staff.*', DB::raw('MIN(positions.ordering) as min_ordering_position'))
            ->leftJoin('position_staff', 'staff.id', '=', 'position_staff.staff_id')
            ->leftJoin('positions', 'position_staff.position_id', '=', 'positions.id')
            ->groupBy('staff.id', 'staff.name', 'staff.avatar', 'staff.created_at', 'staff.updated_at')
            ->orderByRaw('MIN(positions.ordering) IS NULL ASC, MIN(positions.ordering) ASC')
            ->orderBy('staff.name', 'ASC')
            ->get();

        $groupedStaff = [];
        foreach ($staffMembers as $staff) {
            $mainPosition = $staff->positions->sortBy('ordering')->first();

            $positionName = $mainPosition ? $mainPosition->name : 'Tanpa Posisi';
            $positionOrdering = $mainPosition ? $mainPosition->ordering : PHP_INT_MAX;

            if (! isset($groupedStaff[$positionName])) {
                $groupedStaff[$positionName] = [
                    'ordering' => $positionOrdering,
                    'staff' => [],
                ];
            }
            $groupedStaff[$positionName]['staff'][] = $staff;
        }

        uasort($groupedStaff, function ($a, $b) {
            return $a['ordering'] <=> $b['ordering'];
        });

        return view('guru-pegawai', compact('groupedStaff'));
    }
}

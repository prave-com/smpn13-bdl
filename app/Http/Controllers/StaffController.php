<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function index(Request $request)
    {
        $staffMembers = Staff::select('staff.*', DB::raw('MIN(positions.ordering) as min_ordering'))
            ->leftJoin('position_staff', 'staff.id', '=', 'position_staff.staff_id')
            ->leftJoin('positions', 'position_staff.position_id', '=', 'positions.id')
            ->groupBy('staff.id')
            // CORRECTED orderByRaw for MySQL:
            // Use an IFNULL or CASE statement to handle NULLs LAST effect
            // We want NULL ordering values to sort after non-NULL ordering values.
            // A common way is to order by a boolean (0 for non-null, 1 for null), then by the actual value.
            ->orderByRaw('MIN(positions.ordering) IS NULL ASC, MIN(positions.ordering) ASC') // This is the concise way
            // Alternative (more explicit CASE statement, also works):
            // ->orderByRaw('CASE WHEN MIN(positions.ordering) IS NULL THEN 1 ELSE 0 END ASC, MIN(positions.ordering) ASC')
            ->orderBy('staff.name', 'ASC')
            ->with('positions')
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

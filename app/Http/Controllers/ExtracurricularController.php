<?php

namespace App\Http\Controllers;

use App\Models\Extracurricular;
use Illuminate\Http\Request;

class ExtracurricularController extends Controller
{
    public function index(Request $request)
    {
        $extracurriculars = Extracurricular::all();

        return view('ekstrakurikuler', compact('extracurriculars'));
    }
}

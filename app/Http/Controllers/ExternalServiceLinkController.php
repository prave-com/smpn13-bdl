<?php

namespace App\Http\Controllers;

use App\Models\ExternalServiceLink;
use Illuminate\Http\Request;

class ExternalServiceLinkController extends Controller
{
    public function index(Request $request)
    {
        $externalServiceLink = ExternalServiceLink::all();

        return view('link-layanan-eksternal', compact('externalServiceLink'));
    }
}

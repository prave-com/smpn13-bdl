<?php

namespace App\Http\Controllers;

use App\Models\ExternalServiceLink;
use Illuminate\Http\Request;

class ExternalServiceLinkController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $externalServiceLinks = ExternalServiceLink::where('name', 'like', "%{$search}%")
            ->orWhere('url', 'like', "%{$search}%")
            ->paginate(10)
            ->appends($request->only('search'));

        return view('external-service-links.index', compact('externalServiceLinks', 'search'));
    }

    public function create()
    {
        return view('external-service-links.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|string|max:255|active_url',
        ]);

        ExternalServiceLink::create([
            'name' => $request->name,
            'url' => $request->url,
        ]);

        return redirect()->route('external-service-links.index')->with('success', 'Link layanan eksternal berhasil dibuat.');
    }

    public function show(ExternalServiceLink $externalServiceLink)
    {
        return view('external-service-links.show', compact('externalServiceLink'));
    }

    public function edit(ExternalServiceLink $externalServiceLink)
    {
        return view('external-service-links.edit', compact('externalServiceLink'));
    }

    public function update(Request $request, ExternalServiceLink $externalServiceLink)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|string|max:255|active_url',
        ]);

        $externalServiceLink->update([
            'name' => $request->name,
            'url' => $request->url,
        ]);

        return redirect()->route('external-service-links.index')->with('success', 'Link layanan eksternal berhasil diperbarui.');
    }

    public function destroy(ExternalServiceLink $externalServiceLink)
    {
        $externalServiceLink->delete();

        return redirect()->route('external-service-links.index')->with('success', 'Link layanan eksternal berhasil dihapus.');
    }
}

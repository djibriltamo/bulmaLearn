<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Site::latest();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        $sites = $query->paginate(5);
        return view('sites.index',  compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sites.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'region' => 'required',
            'ville' => 'required'
        ],[
            'name.required' => 'Le nom du site est obligatoire.',
            'region.required' => 'La région du site est obligatoire.',
            'ville.required' => 'La ville du site est obligatoire.'
        ]);

        $site = new Site();
        $site->create($validated);

        return redirect()->route('sites.index')->with('success', 'Site créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sites = Site::findOrFail($id);
        return view('sites.edit', compact('sites'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $site = Site::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required',
            'region' => 'required',
            'ville' => 'required'
        ],[
            'name.required' => 'Le nom du site est obligatoire.',
            'region.required' => 'La région du site est obligatoire.',
            'ville.required' => 'La ville du site est obligatoire.'
        ]);

        $site->update($validated);

        return redirect()->route('sites.index')->with('success', 'Site modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sites = Site::findOrFail($id);
        $sites->delete();

        return redirect()->back()->with('error', 'Site supprimé avec succès');
    }
}

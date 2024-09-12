<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Mission;
use App\Models\Site;
use App\Models\User;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $missions = Mission::with(['site', 'employer'])->latest()->paginate(5);
        
        return view('missions.index', compact('missions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sites = Site::all();
        $employers = Employer::all();

        return view('missions.create', compact('sites', 'employers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'statut' => 'required|in:Ouverte,En cours,Fermée',
            'employer_id' => 'required|exists:employers,id',
            'site_id' => 'required|exists:sites,id',
        ],[
            'name.required' => 'Le nom est obligatoire.',
            'description.required' => 'Le prénom est obligatoire.',
            'statut.required' => 'Le statut est obligatoire.',
            'employer_id.required' => 'Le nom est obligatoire.',
            'employer_id.exists' => 'Le nom sélectionné n\'est pas valide.',
            'site_id.required' => 'Le nom du site est obligatoire.',
            'site_id.exists' => 'Le site sélectionné n\'est pas valide.',
        ]);

        $mission = Mission::create($request->all());

        $mission->employer()->associate($request->employer_id);
        $mission->site()->associate($request->site_id);
        $mission->save();

        return redirect()->route('missions.index')->with('success', 'Mission créée avec succès.');
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
        $missions = Mission::findOrfail($id);
        $employers = Employer::all();
        $sites = Site::all();

        return view('missions.edit', compact('sites', 'missions', 'employers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Mission $missions, String $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'statut' => 'required|in:Ouverte,En cours,Fermée',
            'site_id' => 'required|exists:sites,id',
            'employer_id' => 'required|exists:employers,id',
        ],[
            'name.required' => 'Le nom est obligatoire.',
            'description.required' => 'Le prénom est obligatoire.',
            'statut.required' => 'Le statut est obligatoire.',
            'site_id.required' => 'Le nom du site est obligatoire.',
            'site_id.exists' => 'Le site sélectionné n\'est pas valide.',
            'employer_id.required' => 'Le nom est obligatoire.',
            'employer_id.exists' => 'Le nom sélectionné n\'est pas valide.',
        ]);

        $missions = Mission::findOrFail($id);

        $missions->name = $request->input('name');
        $missions->description = $request->input('description');
        $missions->statut = $request->input('statut');
        $missions->site()->associate($request->site_id);
        $missions->employer()->associate($request->employer_id);

        $missions->save();

        return redirect()->route('missions.index')->with('success', 'Mission mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $missions = Mission::findOrFail($id);
        $missions->delete();

        return redirect()->back()->with('error', 'La mission a été supprimée');
    }
}

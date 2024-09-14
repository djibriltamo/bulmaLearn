<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Site;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Employer::with(['site'])->latest();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        $employers = $query->paginate(5);
        return view('employers.index',  compact('employers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sites = Site::all();
        return view('employers.create', compact('sites')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'age' => 'required|integer|min:0|max:255',
            'sexe' => 'required|in:Feminin,Masculin',
            'phone' => 'required|string|max:255',
            'date_both' => 'required|date',
            'site_id' => 'required|exists:sites,id',
        ],[
            'name.required' => 'Le nom est obligatoire.',
            'surname.required' => 'Le prénom est obligatoire.',
            'age.required' => 'L\'âge est obligatoire.',
            'sexe.required' => 'Le sexe est obligatoire.',
            'phone.required' => 'Le numéro de téléphone est obligatoire.',
            'date_both.required' => 'La date de naissance est obligatoire.',
            'site_id.required' => 'Le nom du site est obligatoire.',
            'site_id.exists' => 'Le site sélectionné n\'est pas valide.',
        ]);

        $employer = Employer::create($request->all());
        
        //Associer le site à l'utilisateur
        $site = Site::find($request->site_id);
        $employer->site()->associate($site);

        $employer->save();

        return redirect()->route('employers.index')->with('success', 'Employé(e) créé avec succès');
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
        $employer = Employer::findOrFail($id);
        $sites = Site::all();
        return view('employers.edit', compact('employer','sites'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employer $employer)
    {
       
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'age' => 'required|integer|max:255',
            'sexe' => 'required|in:Feminin,Masculin',
            'phone' => 'required||string|max:255',
            'date_both' => 'required|date',
            'site_id' => 'required|exists:sites,id',
        ],[
            'name.required' => 'Le nom est obligatoire.',
            'surname.required' => 'Le prénom est obligatoire.',
            'age.required' => 'L\'âge est obligatoire.',
            'sexe.required' => 'Le sexe est obligatoire.',
            'phone.required' => 'Le numéro de téléphone est obligatoire.',
            'date_both.required' => 'La date de naissance est obligatoire.',
            'site_id.required' => 'Le nom du site est obligatoire.'
        ]);
        
        $employer->update($request->all());

        $site = Site::find($request->site_id);
        $employer->site()->associate($site);

        $employer->save();

        return redirect()->route('employers.index')->with('success', 'Employé(e) mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employers = Employer::findOrFail($id);
        $employers->delete();

        return redirect()->back()->with('error', 'Employé(e) supprimé avec succès');
    }
}

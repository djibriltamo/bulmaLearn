@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <form action="{{ route('missions.update', $missions->id) }}" method="POST">
        @csrf
        @method('PUT')
    
            <div class="field">
                <label class="label is-medium">Nom de la mission</label>
                <div>
                    <input class="input is-medium" type="text" name="name" placeholder="Entrer un nom" value="{{ $missions->name }}">
                </div>
                @error('name')
                    <p class="help is-danger">
                        <strong>{{ $message }}</strong>
                    </p>
                @enderror
            </div>
    
            <div class="field">
                <label class="label is-medium">Description</label>
                <div>
                    <input class="input is-medium" type="text" name="description" placeholder="Entrer une description" value="{{ $missions->description }}">
                </div>
                @error('description')
                    <p class="help is-danger">
                        <strong>{{ $message }}</strong>
                    </p>
                @enderror
            </div>
    
            <div class="field">
                <label class="label is-medium">Statut</label>
                <div class="control">
                    <div class="select" >
                        <select name="statut">
                            <option value="Choisir...">Sélectionner...</option>
                            <option value="Ouverte" @selected($missions->statut == "Ouverte")>Ouverte</option>
                            <option value="En cours" @selected($missions->statut == "En cours")>En cours</option>
                            <option value="Fermée" @selected($missions->statut == "Fermée")>Fermée</option>
                        </select>
                    </div>
                </div>
                @error('statut')
                    <p class="help is-danger">
                        <strong>{{ $message }}</strong>
                    </p>
                @enderror
            </div>
    
            <div class="field">
                <label class="label is-medium">Site associé</label>
                <div class="control">
                    <div class="select">
                        <select name="site_id">
                            <option value="">Sélectionner...</option>
                            @foreach ($sites as $site)
                                <option value="{{ $site->id }}" {{ $missions->site_id == $site->id ? 'selected' : '' }}>
                                    {{ $site->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @error('site_id')
                    <p class="help has-text-danger">
                        <strong>{{ $message }}</strong>
                    </p>
                @enderror
            </div>

            <div class="field">
                <label class="label is-medium">Employé(e) associé(e)</label>
                <div class="control">
                    <div class="select">
                        <select name="employer_id">
                            <option value="">Sélectionner...</option>
                            @foreach ($employers as $employer)
                                <option value="{{ $employer->id }}" {{ $missions->employer_id == $employer->id ? 'selected' : '' }}>
                                    {{ $employer->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @error('employer_id')
                    <p class="help has-text-danger">
                        <strong>{{ $message }}</strong>
                    </p>
                @enderror
            </div>
    
            <div class="field">
                <p class="control">
                  <button class="button is-link">
                    Mettre à jour
                  </button>
                </p>
            </div>
    
        </form>

</div> 

@endsection

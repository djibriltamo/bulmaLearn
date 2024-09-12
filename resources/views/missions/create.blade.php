@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <form action="{{ route('missions.store') }}" method="POST">
    @csrf

        <div class="field">
            <label class="label is-medium">Nom de la mission</label>
            <div>
                <input class="input is-medium" type="text" name="name" placeholder="Entrer un nom">
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
                <input class="input is-medium" type="text" name="description" placeholder="Entrer une description">
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
                        <option value="Ouverte">Ouverte</option>
                        <option value="En cours">En cours</option>
                        <option value="Fermée">Fermée</option>
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
            <label class="label is-medium">Employé(e) associé(e)</label>
            <div class="control">
                <div class="select">
                    <select name="employer_id">
                        <option value="">Sélectionner...</option>
                        @foreach ($employers as $employer)
                            <option value="{{ $employer->id }}">{{ $employer->name }}</option>
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
            <label class="label is-medium">Site associé</label>
            <div class="control">
                <div class="select">
                    <select name="site_id">
                        <option value="">Sélectionner...</option>
                        @foreach ($sites as $site)
                            <option value="{{ $site->id }}">{{ $site->name }}</option>
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
            <p class="control">
              <button class="button is-link">
                Ajouter une mission
              </button>
            </p>
        </div>

    </form>

</div> 

@endsection

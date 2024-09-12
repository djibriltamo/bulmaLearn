@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <form action="{{ route('employers.update', $employer->id) }}" method="POST">
    @csrf
    @method('PUT')

        <div class="field">
            <label class="label is-medium">Nom du personnel</label>
            <div>
                <input class="input is-medium" type="text" name="name" placeholder="Entrer un nom" value="{{ $employer->name }}">
            </div>
            @error('name')
                <p class="help is-danger">
                    <strong>{{ $message }}</strong>
                </p>
            @enderror
        </div>

        <div class="field">
            <label class="label is-medium">Prenom du personnel</label>
            <div>
                <input class="input is-medium" type="text" name="surname" placeholder="Entrer un prenom" value="{{ $employer->surname }}">
            </div>
            @error('surname')
                <p class="help is-danger">
                    <strong>{{ $message }}</strong>
                </p>
            @enderror
        </div>

        <div class="field">
            <label class="label is-medium">Age</label>
            <div>
                <input class="input is-medium" type="number" name="age" placeholder="Entrer un age" value="{{ $employer->age }}">
            </div>
            @error('age')
                <p class="help is-danger">
                    <strong>{{ $message }}</strong>
                </p>
            @enderror
        </div>

        <div class="field">
            <label class="label is-medium">Sexe</label>
            <div class="control">
                <div class="select" type="text">
                    <select name="sexe">
                        <option value="Choisir...">Sélectionner...</option>
                        <option value="Feminin" @selected($employer->sexe == 'Feminin')>Féminin</option>
                        <option value="Masculin" @selected($employer->sexe == 'Masculin')>Masculin</option>
                    </select>
                </div>
            </div>
            @error('sexe')
                <p class="help is-danger">
                    <strong>{{ $message }}</strong>
                </p>
            @enderror
        </div>
        
        <div class="field">
            <label class="label is-medium">Numéro de téléphone</label>
            <div>
                <input class="input is-medium" type="text" name="phone" placeholder="Entrer un numéro de téléphone" value="{{ $employer->phone }}">
            </div>
            @error('phone')
                <p class="help has-text-danger">
                    <strong>{{ $message }}</strong>
                </p>
            @enderror
        </div>
        
        <div class="field">
            <label class="label is-medium">Date de naissance</label>
            <div>
                <input class="input is-medium" type="date" name="date_both" placeholder="Entrer une date de naissance" value="{{ $employer->date_both }}">
            </div>
            @error('date_both')
                <p class="help has-text-danger">
                    <strong>{{ $message }}</strong>
                </p>
            @enderror
        </div>

        <div class="field">
            <label class="label is-medium">Site associé</label>
            <div class="control">
                <div class="select" type="text">
                    <select name="site_id">
                        <option value="Choisir...">Sélectionner...</option>
                        @foreach ($sites as $site)
                            <option value="{{ $site->id }}" {{ $employer->site_id === $site->id ? 'selected' : '' }}>
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
            <p class="control">
              <button class="button is-link">
                Mettre à jour
              </button>
            </p>
        </div>

    </form>
</div> 

@endsection

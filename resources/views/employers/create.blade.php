@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <form action="{{ route('employers.store') }}" method="POST">
    @csrf

        <div class="field">
            <label class="label is-medium">Nom du personnel</label>
            <div>
                <p class="control has-icons-left">
                    <input class="input is-medium" type="text" name="name" placeholder="Entrer un nom">
                    <span class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                    </span>
                </p>
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
                <p class="control has-icons-left">
                    <input class="input is-medium" type="text" name="surname" placeholder="Entrer un prenom">
                    <span class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                    </span>
                </p>
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
                <input class="input is-medium" type="number" name="age" placeholder="Entrer un age">
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
                <div class="select" >
                    <select name="sexe">
                        <option value="Choisir...">Sélectionner...</option>
                        <option value="Feminin">Féminin</option>
                        <option value="Masculin">Masculin</option>
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
                <input class="input is-medium" type="text" name="phone" placeholder="Entrer un numéro de téléphone">
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
                <input class="input is-medium" type="date" name="date_both" placeholder="Entrer une date de naissance">
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
                Ajouter un employé
              </button>
            </p>
        </div>

    </form>
</div> 

@endsection

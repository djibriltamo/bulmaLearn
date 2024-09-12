@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <form action="{{ route('sites.store') }}" method="POST">
    @csrf

    <div class="field">
        <label class="label is-medium">Nom du site</label>
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
        <label class="label is-medium">Région du site</label>
        <div>
            <input class="input is-medium" type="text" name="region" placeholder="Entrer une région">
        </div>
        @error('region')
            <p class="help has-text-danger">
                <strong>{{ $message }}</strong>
            </p>
        @enderror
    </div>
    
    <div class="field">
        <label class="label is-medium">Ville du site</label>
        <div>
            <input class="input is-medium" type="text" name="ville" placeholder="Entrer une ville">
        </div>
        @error('ville')
            <p class="help has-text-danger">
                <strong>{{ $message }}</strong>
            </p>
        @enderror
    </div>

        <div class="field">
            <p class="control">
              <button class="button is-link">
                Ajouter un site
              </button>
            </p>
        </div>

    </form>
</div> 

@endsection

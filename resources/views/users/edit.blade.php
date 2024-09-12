@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-half">
                <div class="box">
                    <h4 class="title is-4">Édition de compte</h4>

                    <form action="{{ route('users.profile', $user->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="field">
                            <label class="label" for="name">Nom de l'utilisateur</label>
                            <div class="control">
                                <input type="text" class="input" name="name" id="name" value="{{ $user->name }}" placeholder="Entrer un nom">
                                @error('name')
                                    <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="field">
                            <label class="label" for="email">Adresse email</label>
                            <div class="control">
                                <input type="email" class="input" name="email" id="email" value="{{ $user->email }}" placeholder="Entrer un email">
                                @error('email')
                                    <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="field">
                            <label class="label" for="password">Mot de passe</label>
                            <div class="control">
                                <input type="password" class="input" name="password" id="password" value="{{ $user->password }}" placeholder="Entrer un mot de passe">
                                @error('password')
                                    <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <button class="button is-success is-fullwidth">Modifier un compte</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
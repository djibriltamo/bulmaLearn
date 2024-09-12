@extends('layouts.app')

@section('content')

<div class="hero-body">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-5">
                <article class="message">

                    <div class="message-header">
                      <p>Bienvenue {{ Auth::user()->name }}</p>
                    </div>

                    <div class="message-body">
                        <h1 class="has-text-link is-large">
                            Ici je vous propose un petit travail pratique avec Laravel et Bulma où je fais un petit CRUD (Create, Read, Update, Delete)
                            et je gère la connexion et l'inscription des utilisateurs avec la possibilité de gérer leurs comptes.

                            Je met aussi en exède les notions de relations avec Laravel, les clés étrangères, etc...
                        </h1>
                    </div>

                </article>
            </div>
        </div>
    </div>
</div>

@endsection
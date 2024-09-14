@extends('layouts.app')

@section('content')
    <section class="hero is-fullheight is-light">
    <div class="hero-body">
      <div class="container">
        <div class="columns is-centered">
          <div class="column is-5">
            <h2 class="title is-4 has-text-centered"><b>INSCRIPTION</b></h2>

                <form action="{{ route('auth.register') }}" method="POST">
                    @csrf

                    <!-- Name -->
                    <div class="field">
                        <label class="label">Nom d'utilisateur</label>
                        <div class="control">
                            <p class="control has-icons-left">
                                <input class="input" type="text" name="name" placeholder="Entrer votre nom d'utilisateur">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-user"></i>
                                </span>
                            </p>
                        </div>
                        @error('name')
                            <p class="has-text-danger">
                                <strong>{{ $message }}</strong>
                            </p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="field">
                        <label class="label">Email</label>
                        <div class="control">
                            <p class="control has-icons-left">
                                <input class="input" type="email" name="email" placeholder="Entrer votre adresse E-mail">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-envelope"></i>
                                </span>
                            </p>
                        </div>
                        @error('email')
                            <p class="has-text-danger">
                                <strong>{{ $message }}</strong>
                            </p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="field">
                        <label class="label">Mot de passe</label>
                        <div class="control">
                            <p class="control has-icons-left">
                                <input class="input" type="password" name="password" placeholder="Entrer votre mot de passe">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-lock"></i>
                                </span>
                            </p>
                        </div>
                        @error('password')
                            <p class="has-text-danger">
                                <strong>{{ $message }}</strong>
                            </p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="field">
                        <label class="label">Confirmer mot de passe</label>
                        <div class="control">
                            <p class="control has-icons-left">
                                <input class="input" type="password" name="password_confirmation" placeholder="Confirmer votre mot de passe">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-lock"></i>
                                </span>
                            </p>
                        </div>
                    </div>

                    <!-- Register Button -->
                    <div class="field">
                        <div class="control">
                            <button class="button is-primary is-fullwidth">S'inscrire</button>
                        </div>
                    </div>

                    <!-- Already Registered -->
                    <div class="field has-text-centered">
                        <p>
                            <a href="{{ route('auth.login') }}">Déjà connecté? Se connecter ici</a>
                        </p>
                    </div>

                </form>

          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
  


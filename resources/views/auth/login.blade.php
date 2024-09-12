@extends('layouts.app')

@section('content')
  <section class="hero is-fullheight is-light">
    <div class="hero-body">
      <div class="container">
        <div class="columns is-centered">
          <div class="column is-5">
            <h2 class="title is-4 has-text-centered">Connexion</h2>
                <form action="{{ route('auth.login') }}" method="POST">
                    @csrf

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

                    <!-- Remember Me -->
                    <div class="field">
                        <label class="checkbox">
                            <input type="checkbox" name="remember"> Se souvenir de moi
                        </label>
                    </div>

                    <!-- Login Button -->
                    <div class="field">
                        <div class="control">
                            <button type="submit" class="button is-link is-fullwidth input is-medium">Se connecter</button>
                        </div>
                    </div>
                    
                    <!-- Forgot Password & Already Registered -->
                    <div class="field has-text-centered">
                        <p>
                            <a href="/forgot-password">Mot de passe oublié?</a> | 
                            <a href="{{ route('auth.register') }}">Déjà inscris?</a>
                        </p>
                    </div>
                </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
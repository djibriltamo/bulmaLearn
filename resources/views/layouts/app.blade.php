<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <nav class="navbar is-transparent is-light">
  
        <div id="navbarExampleTransparentExample" class="navbar-menu">

            @auth
                <div class="navbar-start tabs is-large">
                    <a class="navbar-item" href="URL::to('dashboard')"> Tableau de bord </a>
                </div>

                <div class="tabs is-centered is-large">
                    <ul>
                      <li><a href="{{ route('missions.index') }}">Missions</a></li>
                      <li><a href="{{ route('employers.index') }}">Employés</a></li>
                      <li><a href="{{ route('sites.index') }}">Sites</a></li>
                      <li class="is-active"><a href="{{ route('users.index') }}">Profil</a></li>
                    </ul>
                </div>
            @endauth
      
          <div class="navbar-end">
            <div class="navbar-item">
    
            @guest
                <div class="field is-grouped">
                    <p class="control">
                        <a
                            class="button button is-link"
                            href="{{ route('auth.login') }}"
                        >
                        <span>Se connecter</span>
                        </a>
                    </p>
                    <p class="control">
                    <a class="button is-primary" href="{{ route('auth.register') }}">
                        <span>S'inscrire</span>
                    </a>
                    </p>
                </div>
                </div>
            @else
                <div class="field is-grouped">
                    <p class="control">
                        <span><b>{{ auth()->user()->name}}</b></span>
                    </p>

                    <button type="submit" class="button is-danger input is-medium" form="logout-form">
                        <div class="control">
                            <a class="button is-danger" onclick="return confirm('Voulez-vous fermer votre session ?');">
                                <span>Se deconnecter</span>
                            </a>
                        </div>
                    </button>
    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                        @method('POST')
                  </form>
                </div>
            </div>
            @endguest
              
          </div>
        </div>
      </nav>
    @yield('content')
</body>
</html>
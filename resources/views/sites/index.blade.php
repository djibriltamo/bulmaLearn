@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        @if(Session::has('error'))
            <div class="notification is-danger is-light">
                <p class="help is-danger title is-4">
                    <strong>{{ Session::get('error') }}</strong>
                </p>
            </div>
        @else
            <div class="notification is-success is-light">
                <p class="help is-success title is-4">
                    <strong>{{ Session::get('success') }}</strong>
                </p>
            </div>
        @endif

        <div class="field is-grouped">
            <form method="GET" action="{{ route('sites.index') }}">
                    <div class="control mb-1">
                        <input class="input" type="text" placeholder="Rechercher..." value="{{ request('name') }}">
                    </div>
                    <div class="control">
                        <button class="button is-info">
                            Rechercher
                        </button>
                    </div>
            </form>

            <div class="control has-text-right" style="margin-left: auto;">
                <button class="button is-primary">
                    <a href="{{ route('sites.create') }}">
                        Ajouter un site
                    </a>
                </button>
            </div>
        </div>

        <table class="table is-striped is-fullwidth">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom du site</th>
                    <th>Région du site</th>
                    <th>Ville du site</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($sites as $site)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $site->name }}</td>
                        <td>{{ $site->region }}</td>
                        <td>{{ $site->ville }}</td>
                        <td>
                            <div class="buttons">
                                <a href="{{ route('sites.edit', $site->id) }}" class="button is-warning is-small">
                                    Modifier
                                </a>
                        
                                <form action="{{ route('sites.destroy', $site->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="button is-danger is-small" onclick="return confirm('Voulez-vous supprimer lce site ?');">
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>

        <div class="nav-pagination">
            {{ $sites->links() }}
        </div>
    </div>

@endsection
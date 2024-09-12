@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        @if(Session::has('error'))
            <div class="notification is-danger is-light">
                <p class="help is-danger">
                    <strong>{{ Session::get('error') }}</strong>
                </p>
            </div>
        @else
            <div class="notification is-success is-light">
                <p class="help is-success">
                    <strong>{{ Session::get('success') }}</strong>
                </p>
            </div>
        @endif

        <div class="field is-grouped">
            <form method="GET" action="{{ route('missions.index') }}" style="margin-right: auto;">
                <div class="control">
                    <input class="input" type="text" name="name" placeholder="Rechercher..." value="{{ request('name') }}">
                </div>
                <div class="control">
                    <button class="button is-info" type="submit">
                        Rechercher
                    </button>
                </div>
            </form>
        
            <div class="control">
                <a href="{{ route('missions.create') }}" class="button is-primary">
                    Ajouter une mission
                </a>
            </div>
        </div>

        <table class="table is-striped is-fullwidth">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom de la mission</th>
                    <th>Description</th>
                    <th>Statut</th>
                    <th>Nom de l'employé(e) associé(e)</th>
                    <th>Nom du site associé</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($missions as $mission)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mission->name }}</td>
                        <td>{{ $mission->description }}</td>
                        <td>
                            @if ($mission->statut == "Ouverte")
                                <p class="has-text-primary"><b>{{ $mission->statut }}</b></p>
                            @elseif($mission->statut == "En cours")
                                <p class="has-text-warning"><b>{{ $mission->statut }}</b></p>
                            @elseif($mission->statut == "Fermée")
                                <p class="has-text-danger"><b>{{ $mission->statut }}</b></p>
                            @endif
                        </td>
                        <td>{{ $mission->employer->name }} {{ $mission->employer->surname }}</td>
                        <td>{{ $mission->site->name }}</td>

                        <td>
                            <div class="buttons">
                                <a href="{{ route('missions.edit', $mission->id) }}" class="button is-warning is-small">
                                    Modifier
                                </a>
                        
                                <form action="{{ route('missions.destroy', $mission->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="button is-danger is-small" onclick="return confirm('Voulez-vous supprimer cette mission ?');">
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
            {{ $missions->links() }}
        </div>
    </div>

@endsection
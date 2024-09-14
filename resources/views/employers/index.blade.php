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
            <form method="GET" action="{{ route('employers.index') }}" style="margin-right: auto;">
                <div class="control mb-1">
                    <input class="input" type="text" name="name" placeholder="Rechercher..." value="{{ request('name') }}">
                </div>
                <div class="control">
                    <button class="button is-info" type="submit">
                        Rechercher
                    </button>
                </div>
            </form>
        
            <div class="control">
                <a href="{{ route('employers.create') }}" class="button is-primary">
                    Ajouter un employé(e)
                </a>
            </div>
        </div>

        <table class="table is-striped is-fullwidth">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom de l'employé(e)</th>
                    <th>Prénom de l'employé(e)</th>
                    <th>Age de l'employé(e)</th>
                    <th>Sexe</th>
                    <th>Numéro de téléphone</th>
                    <th>Date de naissance</th>
                    <th>Site associé</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($employers as $employer)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $employer->name }}</td>
                        <td>{{ $employer->surname }}</td>
                        <td>{{ $employer->age }} ans</td>
                        <td>{{ $employer->sexe }}</td>
                        <td>{{ $employer->phone }}</td>
                        <td>{{ $employer->date_both }}</td>
                        <td>{{ $employer->site->name }}</td>

                        <td>
                            <div class="buttons">
                                <a href="{{ route('employers.edit', $employer->id) }}" class="button is-warning is-small">
                                    Modifier
                                </a>
                        
                                <form action="{{ route('employers.destroy', $employer->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="button is-danger is-small" onclick="return confirm('Voulez-vous supprimer l\'employé(e) ?');">
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
            {{ $employers->links() }}
        </div>
    </div>

@endsection
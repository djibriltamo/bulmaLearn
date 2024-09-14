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

        <table class="table-container">
            <table class="table is-striped is-fullwidth">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom utlisateur</th>
                        <th>Adresse mail</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($users as $user)
                    @if (auth()->user()->name == $user->name)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <div class="buttons">
                                    <a href="{{ route('users.edit', $user->id) }}" class="button is-warning is-small">
                                        Modifier
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @else
        
                    @endif
                    @endforeach
                    
                </tbody>
            </table>
        </table>
        
    </div>

@endsection
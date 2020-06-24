@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Admins</h3>
    <a href="{{ route('users.create', ['role' => 'admin', 'redirect' => Request::path()]) }}">Maak nieuw admin aan</a>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Naam</th>
                    <th scope="col">Rol</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td scope="col">{{$user->name." ".$user->lastname}}</td>
                        <td scope="col">@foreach($user->roles as $role){{$role->role." "}}@endforeach</td>
                        <td scope="col"><a href="{{ route('users.edit', ['user' => $user->id, 'redirect' => Request::path()]) }}">Wijzig</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
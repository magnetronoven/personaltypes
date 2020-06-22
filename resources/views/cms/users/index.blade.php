@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Leden/Users</h3>
    <a href="{{ route('users.create') }}">Maak nieuw user aan</a>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Naam</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td scope="col">{{$user->id}}</td>
                        <td scope="col">{{$user->name." ".$user->lastname}}</td>
                        <td scope="col"><a href="{{ route('users.edit', ['user' => $user->id]) }}">Wijzig</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
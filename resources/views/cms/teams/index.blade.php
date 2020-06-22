@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Teams</h3>
    <a href="{{ route('teams.create') }}">Maak nieuw team aan</a>
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
                @foreach($teams as $team)
                    <tr>
                        <td scope="col">{{$team->id}}</td>
                        <td scope="col"><a href="{{ route('teams.show', ['team' => $team->name]) }}">{{$team->name}}</a></td>
                        <td scope="col"><a href="{{ route('teams.edit', ['team' => $team->name]) }}">Wijzig</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

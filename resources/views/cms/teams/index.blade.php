@extends('layouts.app')

@section('content')
<div class="container">
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
                        <td scope="col">{{$team->name}}</td>
                        <td scope="col"><a href="{{ route('teams.edit', ['team' => $team->id]) }}">Wijzig</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

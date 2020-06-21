@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('users.create', ['team' => $team->name]) }}">Voeg speler toe</a>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Naam</th>
                    <th scope="col">Profiel</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($team->players as $player)
                    <tr>
                        <td scope="col">{{$player->name." ".$player->lastname}}</td>
                        <td scope="col">{{$player->profile}}</td>
                        <td scope="col"><a href="{{ route('users.edit', ['user' => $player->id]) }}">Wijzig</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
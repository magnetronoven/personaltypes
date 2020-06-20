@extends('layouts.app')

@section('content')
<div class="m-home container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="m-home__grid">
        @foreach($teams as $team)
            <div class="m-home__grid__team">
                <a href="{{ route('catagory', ['team' => $team->name, 'catagory' => $catagory->catagory]) }}"><h3>{{$team->name}}</h3></a>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Naam</th>
                                <th scope="col">Profiel</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($team->players as $player)
                                <tr>
                                    <td scope="col">{{$player->name." ".$player->lastname}}</td>
                                    <td scope="col">{{$player->profile}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

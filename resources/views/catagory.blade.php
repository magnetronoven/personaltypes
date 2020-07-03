@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{$team->name}} - {{$catagory->catagory}}</h2>

    <h4>Coaches</h4>
</div>
<div class="container-catagory">
    <div class="m-table__stacked">
        <div class="table-responsive">
            <table class="table table-striped table-in-catagory">
                <thead>
                    <tr>
                        <th scope="col">Naam</th>
                        <th scope="col">Profiel</th>
                        <th scope="col">DMD</th>
                        @foreach($themes as $theme)
                            <th scope="col">{{$theme->theme}}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($team->users as $player)
                        <tr>
                            <td scope="col"><a href="{{ route('showuser', ['user' => $player->id]) }}">{{$player->name." ".$player->lastname}}</a></td>
                            <td scope="col">{{$player->profile}}</td>
                            <td scope="col">{{$player->dmd}}</td>
                            @foreach($themes as $theme)
                                <td scope="col">{!! MBTITagToText($player, $theme->types) !!}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="container">
    <h4>Spelers</h4>
</div>
<div class="container-catagory">
    <div class="m-table__stacked">
        <div class="table-responsive">
            <table class="table table-striped table-in-catagory">
                <thead>
                    <tr>
                        <th scope="col">Naam</th>
                        <th scope="col">Profiel</th>
                        <th scope="col">DMD</th>
                        <th scope="col">Positie</th>
                        @foreach($themes as $theme)
                            <th scope="col">{{$theme->theme}}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($players as $player)
                        <tr>
                            <td scope="col"><a href="{{ route('showuser', ['user' => $player->id]) }}">{{$player->name." ".$player->lastname}}</a></td>
                            <td scope="col">{{$player->profile}}</td>
                            <td scope="col">{{$player->dmd}}</td>
                            <td scope="col">{{$player->position->position}}</td>
                            @foreach($themes as $theme)
                                <td scope="col">{!! MBTITagToText($player, $theme->types) !!}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
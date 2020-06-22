@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{$catagory->catagory}}</h2>

    <h4>Coaches</h4>
    <div class="m-table__stacked">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Naam</th>
                        <th scope="col">Profiel</th>
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
                            @foreach($themes as $theme)
                                <td scope="col">{!! MBTITagToText($player, $theme->types) !!}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="m-table__stacked">
        <h4>{{$team->name}}</h4>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Naam</th>
                        <th scope="col">Profiel</th>
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
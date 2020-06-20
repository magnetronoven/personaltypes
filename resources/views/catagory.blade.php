@extends('layouts.app')

@section('content')
<div class="container">
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
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                @foreach($players as $player)
                    <tr>
                        <td scope="col">{{$player->name}}</td>
                        <td scope="col">{{$player->profile}}</td>
                        @foreach($themes as $theme)
                            <td scope="col">{{getMBTIType($theme->theme)}}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @foreach($players as $player)
        {{$player->name}}
    @endforeach
</div>
@endsection

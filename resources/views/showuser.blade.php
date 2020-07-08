@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{$user->name." ".$user->lastname}}</h2>

    <div class="m-table__stacked">
        <h3>Algemeen</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Onderdeel</th>
                        <th scope="col">Toelichting</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Profiel</td>
                        <td scope="col">{{$user->profile}}</td>
                    </tr>
                    <tr>
                        <td>DMD</td>
                        <td scope="col">{{$user->dmd}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    @foreach ($catagories as $catagory)
        <div class="m-table__stacked">
            <h3>{{$catagory->catagory}}</h3>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Onderdeel</th>
                            <th scope="col">Toelichting</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($catagory->themes as $theme)
                            <tr>
                                <td>{{$theme->theme}}</td>
                                <td scope="col">{!! MBTITagToText($user, $theme) !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
    
</div>
@endsection
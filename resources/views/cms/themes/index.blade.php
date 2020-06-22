@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Thema's</h3>
    <!-- <a href="{{ route('themes.create') }}">Maak nieuw thema aan</a> -->
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Thema</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($themes as $theme)
                    <tr>
                        <td scope="col">{{$theme->id}}</td>
                        <td scope="col">{{$theme->theme}}</td>
                        <td scope="col"><a href="{{ route('themes.edit', ['theme' => $theme->id]) }}">Wijzig</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
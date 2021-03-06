@extends('layouts.app')

@section('content')
<div class="container">
    @include('inc.breadcrumb', ['location' => "CMS/Posities"])
    <h3>Posities</h3>
    <a href="{{ route('positions.create') }}">Maak nieuw positie aan</a>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Positie</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($positions as $position)
                    <tr>
                        <td scope="col">{{$position->position}}</td>
                        <td scope="col"><a href="{{ route('positions.edit', ['position' => $position->id]) }}">Wijzig</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">

    <h3>{{$theme->theme}}</h3>
    <a href="{{ route('types.create', ['theme_id' => $theme->id]) }}">Voeg type toe</a>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Type</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($types as $type)
                    <tr>
                        <td scope="col">{{$type->keywords}}</td>
                        <td scope="col"><a href="{{ route('types.edit', ['type' => $type->id]) }}">Wijzig</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
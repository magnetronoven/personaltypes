@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('catagories.create') }}">Maak nieuw catagorie aan</a>
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
                @foreach($catagories as $catagory)
                    <tr>
                        <td scope="col">{{$catagory->id}}</td>
                        <td scope="col">{{$catagory->catagory}}</td>
                        <td scope="col"><a href="{{ route('catagories.edit', ['catagory' => $catagory->catagory]) }}">Wijzig</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
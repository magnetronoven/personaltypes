@extends('layouts.app')

@section('content')
<div class="container">
    @include('inc.breadcrumb', ['location' => 'CMS/Categorieën'])
    <h3>Categorieën</h3>
    <a href="{{ route('catagories.create') }}">Maak nieuwe categorie aan</a>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Naam</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($catagories as $catagory)
                    <tr>
                        <td scope="col"><a href="{{ route('catagories.show', ['catagory' => $catagory->catagory]) }}">{{$catagory->catagory}}</a></td>
                        <td scope="col"><a href="{{ route('catagories.edit', ['catagory' => $catagory->catagory]) }}">Wijzig</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
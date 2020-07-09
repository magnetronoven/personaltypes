@extends('layouts.app')

@section('content')
<div class="container">
    @include('inc.breadcrumb', ['location' => 'CMS/Categorieën/'.$catagory->catagory])
    <h3>Categorie: {{$catagory->catagory}}</h3>
    <a href="{{ route('themes.create', ['catagory' => $catagory->catagory]) }}">Voeg thema toe</a>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Thema</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($themes as $theme)
                    <tr>
                        <td scope="col"><a href="{{ route('themes.show', ['theme' => $theme->id]) }}">{{$theme->theme}}</a></td>
                        <td scope="col"><a href="{{ route('themes.edit', ['theme' => $theme->id]) }}">Wijzig</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
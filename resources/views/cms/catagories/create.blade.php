@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Voeg categorie toe</h3>
    <form id="catagory-form" method="POST" action="{{ route('catagories.store') }}" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label for="catagory">Categorie</label>
            <input class="form-control @error('catagory') is-invalid @enderror" value="{{ old('catagory') }}" type="text" name="catagory" id="catagory">

            @error('catagory')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
</div>
@endsection

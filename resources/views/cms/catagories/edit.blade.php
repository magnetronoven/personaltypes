@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Wijzig categorie</h3>
    <form id="catagory-form" method="POST" action="{{ route('catagories.update', ['catagory' => $catagory->catagory]) }}">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="catagory">Categorie</label>
            <input class="form-control @error('catagory') is-invalid @enderror" value="{{ old('catagory', $catagory->catagory) }}" type="text" name="catagory" id="catagory">

            @error('catagory')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="m-form__action--buttons">
            <button type="submit" class="btn btn-primary">Opslaan</button>
            <button type="submit" class="btn btn-danger"form="delete-form">Verwijder</button>
        </div>
    </form>

    <form method="POST" id="delete-form" action="{{ route('catagories.destroy', ['catagory' => $catagory->catagory]) }}" onsubmit="return confirm('Weet je zeker dat je deze wilt verwijderen?');">
        @csrf
        @method('DELETE')
    </form>

</div>
@endsection

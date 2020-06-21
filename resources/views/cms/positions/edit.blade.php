@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Wijzig team</h3>
    <form id="position-form" method="POST" action="{{ route('positions.update', ['position' => $position->id]) }}">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="position">Positie</label>
            <input class="form-control @error('position') is-invalid @enderror" value="{{ old('position', $position->position) }}" type="text" name="position" id="position">

            @error('position')
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

    <form method="POST" id="delete-form" action="{{ route('positions.destroy', ['position' => $position->id]) }}" onsubmit="return confirm('Weet je zeker dat je deze wilt verwijderen?');">
        @csrf
        @method('DELETE')
    </form>

</div>
@endsection

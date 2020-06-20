@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Wijzig team</h3>
    <form id="municipality-form" method="POST" action="{{ route('teams.store') }}" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label for="name">Naam</label>
            <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $team->name) }}" type="text" name="name" id="name">

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Opslaan</button>

    </form>

</div>
@endsection

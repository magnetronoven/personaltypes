@extends('layouts.app')

@section('content')
<div class="container">
    @include('inc.breadcrumb', ['location' => "CMS/Posities/Nieuw"])
    <h3>Voeg team toe</h3>
    <form id="position-form" method="POST" action="{{ route('positions.store') }}" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label for="position">Positie</label>
            <input class="form-control @error('position') is-invalid @enderror" value="{{ old('position') }}" type="text" name="position" id="position">

            @error('position')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Voeg thema toe</h3>
    <form id="theme-form" method="POST" action="{{ route('themes.store') }}" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label for="theme">Thema</label>
            <input class="form-control @error('theme') is-invalid @enderror" value="{{ old('theme') }}" type="text" name="theme" id="theme">

            @error('theme')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <input name="catagory_id" type="hidden" value="{{ $catagory->id }}">

        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Wijzig thema</h3>
    <form id="theme-form" method="POST" action="{{ route('themes.update', ['theme' => $theme->id]) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        
        <div class="form-group">
            <label for="catagory">Thema</label>
            <input class="form-control @error('theme') is-invalid @enderror" value="{{ old('theme', $theme->theme) }}" type="text" name="theme" id="theme">

            @error('theme')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <input name="catagory_id" type="hidden" value="{{ $theme->catagory_id }}">

        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
</div>
@endsection

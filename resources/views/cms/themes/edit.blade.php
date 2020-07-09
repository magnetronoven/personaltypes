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

        <div class="form-group">
            <label>Zichtbaar voor positie</label>
            @foreach ($positions as $position)
                <div class="form-check">
                    <input class="form-check-input" name="positions[{{$position->id}}]" type="checkbox" value="{{$position->id}}" id="{{$position->id}}" @if($theme->positions->contains($position->id)) checked @endif>
                    <label class="form-check-label" for="{{$position->id}}">
                        {{$position->position}}
                    </label>
                </div>
            @endforeach
        </div>

        <input name="catagory_id" type="hidden" value="{{ $theme->catagory_id }}">

        <div class="m-form__action--buttons">
            <button type="submit" class="btn btn-primary">Opslaan</button>
            <button type="submit" class="btn btn-danger"form="delete-form">Verwijder Thema</button>
        </div>
    </form>

    <form method="POST" id="delete-form" action="{{ route('themes.destroy', ['theme' => $theme->id]) }}" onsubmit="return confirm('Weet je zeker dat je deze wilt verwijderen?');">
        @csrf
        @method('DELETE')
    </form>
</div>
@endsection

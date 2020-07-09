@extends('layouts.app')

@section('content')
<div class="container">
    @include('inc.breadcrumb', ['location' => "CMS/Teams/Wijzig"])
    <h3>Wijzig team</h3>
    <form id="team-form" method="POST" action="{{ route('teams.update', ['team' => $team->name]) }}">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Naam</label>
            <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $team->name) }}" type="text" name="name" id="name">

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
			<label for="users">Coaches</label>
			<select name="users[]" id="users" multiple>
				@foreach($coaches as $coach)
					<option @if($team->users->contains($coach->id)) selected @endif value="{{$coach->id}}">{{$coach->name." ".$coach->lastname}}</option>
				@endforeach
            </select>
            <small class="form-text text-muted">Om een coach te worden moet de gebruiker de juiste rol hebben.</small>
		</div>

        <div class="m-form__action--buttons">
            <button type="submit" class="btn btn-primary">Opslaan</button>
            <button type="submit" class="btn btn-danger"form="delete-form">Verwijder Team</button>
        </div>
    </form>

    <form method="POST" id="delete-form" action="{{ route('teams.destroy', ['team' => $team->name]) }}" onsubmit="return confirm('Weet je zeker dat je deze wilt verwijderen?');">
        @csrf
        @method('DELETE')
    </form>

</div>
@endsection

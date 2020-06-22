@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Wijzig speler/user</h3>
    <form id="user-form" method="POST" action="{{ route('users.update', ['user' => $user->id]) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        
        <div class="form-group">
            <label for="name">Voornaam</label>
            <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" type="text" name="name" id="name">

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="lastname">Achternaam</label>
            <input class="form-control @error('lastname') is-invalid @enderror" value="{{ old('lastname', $user->lastname) }}" type="text" name="lastname" id="lastname">

            @error('lastname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="profile">Profiel</label>
            <input class="form-control @error('profile') is-invalid @enderror" value="{{ old('profile', $user->profile) }}" type="text" name="profile" id="profile">

            @error('profile')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" type="email" name="email" id="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="changepassword">Verander wachtwoord</label>
            <input type="checkbox" id="checkpassword" name="checkpassword">
            <input disabled class="form-control @error('password') is-invalid @enderror" value="" type="password" name="password" id="changepassword">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="position_id">Positie</label>
            <select name="position_id">
                <option value="">Geen</option>
                @foreach($positions as $position)
                    <option value="{{$position->id}}" @if($position->id == $user->position_id) selected @endif>{{$position->position}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="team_id">Team</label>
            <select name="team_id">
                <option value="">Geen</option>
                @foreach($teams as $team)
                    <option value="{{$team->id}}" @if($team->id == $user->team_id) selected @endif>{{$team->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
			<label for="roles">Rol</label>
			<select name="roles[]" id="roles" multiple>
				@foreach($roles as $role)
					<option @if($user->roles->contains($role->id)) selected @endif value="{{$role->id}}">{{$role->role}}</option>
				@endforeach
			</select>
		</div>

        <div class="m-form__action--buttons">
            <button type="submit" class="btn btn-primary">Opslaan</button>
            <button type="submit" class="btn btn-danger"form="delete-form">Verwijder</button>
        </div>
    </form>

    <form method="POST" id="delete-form" action="{{ route('users.destroy', ['user' => $user->id]) }}" onsubmit="return confirm('Weet je zeker dat je deze wilt verwijderen?');">
        @csrf
        @method('DELETE')
    </form>
</div>
@endsection

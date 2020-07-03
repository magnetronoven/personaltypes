@extends('layouts.app')

@section('content')
<div class="container">
	<h3>Voeg Lid/gebruiker toe</h3>
	<form id="user-form" method="POST" action="{{ route('users.store', ['redirect' => $redirect]) }}" enctype="multipart/form-data">
		@csrf
		
		<div class="form-group">
			<label for="name">Voornaam</label>
			<input class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" name="name" id="name">

			@error('name')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>

		<div class="form-group">
			<label for="lastname">Achternaam</label>
			<input class="form-control @error('lastname') is-invalid @enderror" value="{{ old('lastname') }}" type="text" name="lastname" id="lastname">

			@error('lastname')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>

		<div class="form-group">
			<label for="profile">Profiel</label>
			<input class="form-control @error('profile') is-invalid @enderror" value="{{ old('profile') }}" type="text" name="profile" id="profile">

			@error('profile')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>

		<div class="form-group">
			<label for="dmd">DMD</label>
			<input class="form-control @error('dmd') is-invalid @enderror" value="{{ old('dmd') }}" type="text" name="dmd" id="dmd">

			@error('dmd')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>

		<div class="form-group">
			<label for="email">Email</label>
			<input class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" type="email" name="email" id="email">

			@error('email')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>

		<div class="form-group">
			<label for="password">Wachtwoord</label>
			<input class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" type="password" name="password" id="password">

			@error('password')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>

		@if($team)
			<input name="team_id" type="hidden" value="{{ $team->id }}">
		@endif

		<div class="form-group">
			<label for="position_id">Positie</label>
			<select name="position_id">
				<option selected value="">Geen</option>
				@foreach($positions as $position)
					<option value="{{$position->id}}">{{$position->position}}</option>
				@endforeach
			</select>
		</div>

		<div class="form-group">
			<label for="roles">Rol</label>
			<select name="roles[]" id="roles" multiple>
				@foreach($roles as $role)
					<option @if(Request::get('role') == $role->role) selected @endif value="{{$role->id}}">{{$role->role}}</option>
				@endforeach
			</select>
		</div>

		<button type="submit" class="btn btn-primary">Opslaan</button>
	</form>
</div>
@endsection

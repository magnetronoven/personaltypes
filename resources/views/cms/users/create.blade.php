@extends('layouts.app')

@section('content')
<div class="container">
	<h3>wijzig speler/user</h3>
	<form id="user-form" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
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

		<input name="role_id" type="hidden" value="1">

		<button type="submit" class="btn btn-primary">Opslaan</button>
	</form>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    @include('inc.breadcrumb', ['location' => "CMS/Teams/Nieuw"])
    <h3>Voeg team toe</h3>
    <form id="team-form" method="POST" action="{{ route('teams.store') }}" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label for="name">Naam</label>
            <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" name="name" id="name">

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
			<label for="users[]">Coaches</label>
			<select name="users[]" id="users" multiple>
				@foreach($coaches as $coach)
					<option value="{{$coach->id}}">{{$coach->name." ".$coach->lastname}}</option>
				@endforeach
			</select>
		</div>

        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
</div>
@endsection

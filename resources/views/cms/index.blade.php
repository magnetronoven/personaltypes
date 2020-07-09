@extends('layouts.app')

@section('content')
<div class="m-cms container">
    @include('inc.breadcrumb', ['location' => 'CMS'])
    <h2>Cms</h2>
    <div class="m-cms__grid">
        <div class="m-cms__grid__item">
            <h4>Admins en leden</h4>
            <ul>
                <li><a href="{{ route('users.index') }}">Alle gebruikers/leden</a></li>
                <li><a href="{{ route('users.coaches') }}">Alle coaches</a></li>
                <li><a href="{{ route('users.admins') }}">Alle admins</a></li>
            </ul>
        </div>
        <div class="m-cms__grid__item">
            <h4>Teams en posities</h4>
            <ul>
                <li><a href="{{ route('teams.index') }}">Alle teams</a></li>
                <li><a href="{{ route('positions.index') }}">Posities</a></li>
            </ul>
        </div>
        <div class="m-cms__grid__item">
            <h4>Categorieën, thema's en types</h4>
            <ul>
                <li><a href="{{ route('catagories.index') }}">Categorieën</a> <small class="text-muted">(Toevoegen, bekijken en wijzigen)</small></li>
                <li><a href="{{ route('themes.index') }}">Thema's</a> <small class="text-muted">(Bekijken en wijzigen)</small></li>
                <li><a href="{{ route('types.index') }}">Types</a> <small class="text-muted">(Bekijken en wijzigen)</small></li>
            </ul>
        </div>
    </div>
</div>
@endsection
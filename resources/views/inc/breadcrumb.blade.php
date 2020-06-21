<?php

$stringToLink = [
    'CMS' => route('cms'),
    'Users' => route('users.index'),
    'Teams' => route('teams.index'),
    'Posities' => route('positions.index'),
    "Thema's" => route('themes.index'),
    'Categorieën' => route('catagories.index'),
]

?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <?php $navArray = explode('/', $location); ?>
        @foreach($navArray as $key => $nav)
            @if($key == count($navArray) - 1)
                <li class="breadcrumb-item active" aria-current="page">{{$nav}}</li>
            @else
                <li class="breadcrumb-item"><a href="{{$stringToLink[$nav]}}">{{$nav}}</a></li>
            @endif
        @endforeach
    </ol>
</nav>
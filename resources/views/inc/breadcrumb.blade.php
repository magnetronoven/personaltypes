<?php

$stringToLink = [
    'CMS' => route('cms'),
    'Users' => route('users.index'),
    'Teams' => route('teams.index'),
    'Positie' => route('positions.index'),
    'Thema' => route('themes.index'),
]

?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <?php $navArray = explode('/', $location); ?>
        @foreach($navArray as $key => $nav)
            @if($key == count($navArray) - 1)
                <li class="breadcrumb-item active" aria-current="page"><a href="{{$stringToLink[$nav]}}">{{$nav}}</a></li>
            @else
                <li class="breadcrumb-item"><a href="#"><a href="{{$stringToLink[$nav]}}">{{$nav}}</a></a></li>
            @endif
        @endforeach
    </ol>
</nav>
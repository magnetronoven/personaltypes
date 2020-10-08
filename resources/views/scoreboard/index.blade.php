<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://kit.fontawesome.com/8ccf398d8a.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 1em;
            padding: 10px;
        }
        .scoreboard {
            display: inline-block;
            border-radius: 5px;
            overflow: hidden;
        }
    
        .board {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px 0;
        }
    
        .team {
            background-color: rgb(35, 77, 167);
            color: white;
        }
    
        .team:first-child {
            margin-bottom: 50px;
        }
    
        .name {
            padding: 15px 20px 15px 10px;
            font-size: 20px;
        }
    
        .home .name {
            padding-bottom: 10px;
        }
    
        .opponent .name {
            padding-top: 10px;
        }
    
        .sets {
            padding: 5px;
            background: rgba(144, 227, 252, 0.856);
            color: #000;
            margin-right: 10px;
            border-radius: 2px;
        }
    
        .points {
            padding: 5px;
            background: rgb(255, 255, 255);
            color: #000;
            margin-right: 10px;
            border-radius: 2px;
        }
    
        .right {
            display: flex;
            justify-content: right;
            align-items: center;
        }
    
        button {
            display: block;
            font-size: 16px;
        }
    
        #outgoing {
            font-size: 10px;
        }
    
        .point-buttons {
            display: flex;
            /* justify-content:space-between; */
        }
    
        .buttons {
            display: flex;
            justify-content: space-between;
        }
    
        .buttons button {
            height: 50px;
        }
    
        .set-buttons {
            display: flex;
        }
    
        .point-buttons button:first-child {
            margin-right: 10px;
        }
    
        .set-buttons button:first-child {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    
    <div class="scoreboard">
        <div class="team home">
            <div class="board">
                <div class="name">Vtc</div>
                <div class="right">
                    <div class="sets">0</div>
                    <div class="points">00</div>
                </div>
            </div>
            <div class="buttons">
                <div class="point-buttons">
                    <button class="home-points-plus">Punt +</button>
                    <button class="home-points-min">Punt -</button>
                </div>
                <div class="set-buttons">
                    <button class="home-sets-plus">Set +</button>
                    <button class="home-sets-min">Set -</button>
                </div>
            </div>
        </div>

        <div class="team opponent">
            <div class="board">
                <div class="name">Tegenstander</div>
                <div class="right">
                    <div class="sets">0</div>
                    <div class="points">00</div>
                </div>
            </div>
            <div class="buttons">
                <div class="point-buttons">
                    <button class="opponent-points-plus">Punt +</button>
                    <button class="opponent-points-min">Punt -</button>
                </div>
                <div class="set-buttons">
                    <button class="opponent-sets-plus">Set +</button>
                    <button class="opponent-sets-min">Set -</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        // Scoreboard elements
        const homeSets = document.querySelector(".home .sets");
        const homePoints = document.querySelector(".home .points");
        const opponentSets = document.querySelector(".opponent .sets");
        const opponentPoints = document.querySelector(".opponent .points");

        // Button elements
        const buttonHomePointsPlus = document.querySelector(".home-points-plus");
        const buttonHomePointsMin = document.querySelector(".home-points-min");
        const buttonHomeSetsPlus = document.querySelector(".home-sets-plus");
        const buttonHomeSetsMin = document.querySelector(".home-sets-min");

        const buttonOpponentPointsPlus = document.querySelector(".opponent-points-plus");
        const buttonOpponentPointsMin = document.querySelector(".opponent-points-min");
        const buttonOpponentSetsPlus = document.querySelector(".opponent-sets-plus");
        const buttonOpponentSetsMin = document.querySelector(".opponent-sets-min");

        // Model
        let scoreboard = {
            home: {
                sets: 0,
                points: 0
            },
            opponent: {
                sets: 0,
                points: 0
            }
        }

        const renderScoreBoard = (scoreboard) => {
            homeSets.innerHTML = scoreboard.home.sets;
            homePoints.innerHTML = addZeroToBegin(scoreboard.home.points);
            opponentSets.innerHTML = scoreboard.opponent.sets;
            opponentPoints.innerHTML = addZeroToBegin(scoreboard.opponent.points);
        }

        const addZeroToBegin = (number) => {
            if(number < 10 && number >= 0) return '0' + number;
            else return number;
        }

        // Events
        buttonHomePointsPlus.addEventListener("click", () => ++scoreboard.home.points);
        buttonHomePointsMin.addEventListener("click", () => --scoreboard.home.points);
        buttonHomeSetsPlus.addEventListener("click", () => ++scoreboard.home.sets);
        buttonHomeSetsMin.addEventListener("click", () => --scoreboard.home.sets);
        buttonOpponentPointsPlus.addEventListener("click", () => ++scoreboard.opponent.points);
        buttonOpponentPointsMin.addEventListener("click", () => --scoreboard.opponent.points);
        buttonOpponentSetsPlus.addEventListener("click", () => ++scoreboard.opponent.sets);
        buttonOpponentSetsMin.addEventListener("click", () => --scoreboard.opponent.sets);

        document.querySelectorAll("button").forEach(button => {
            button.addEventListener("click", () => {
                renderScoreBoard(scoreboard);

                var data = new URLSearchParams();
                data.append('home_points', scoreboard.home.points);
                data.append('opponent_points', scoreboard.opponent.points);
                data.append('home_sets', scoreboard.home.sets);
                data.append('opponent_sets', scoreboard.opponent.sets);

                fetch('http://127.0.0.1:8000/api/scoreboardupdate', {
                    method: 'POST',
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded",
                    },
                    body: data.toString()
                });
            })

        })

        
    </script>
</body>


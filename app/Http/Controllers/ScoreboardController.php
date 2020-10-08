<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scoreboard;

class ScoreboardController extends Controller
{
    
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('checkRole:admin');
    // }

    public function index()
    {
        $scoreboard = Scoreboard::first();

        return view('scoreboard.index', [
            'scoreboard' => $scoreboard,
        ]);

    }

    public function update(Request $request)
    {
        $scoreboard = Scoreboard::first();

        $scoreboard['home_points'] = $request->input()['home_points'];
        $scoreboard['opponent_points'] = $request->input()['opponent_points'];
        $scoreboard['home_sets'] = $request->input()['home_sets'];
        $scoreboard['opponent_sets'] = $request->input()['opponent_sets'];

        $scoreboard->save();
    }

    public function get(Request $request)
    {
        return Scoreboard::first();
    }
}

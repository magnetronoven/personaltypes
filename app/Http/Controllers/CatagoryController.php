<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catagory;
use App\Team;
use App\User;
use App\Theme;
use App\Type;
use Illuminate\Support\Facades\Auth;

class CatagoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkRole:admin,coach');
    }

    public function index(Team $team, Catagory $catagory)
    {
    
        if($this->notAllowedToSeeProfile($team)) {
            return abort(401);
        }

        $themes = $catagory->themes()->with('types')->get();
        
        return view('catagory', [
            'players' => User::where('team_id', $team->id)->with('position')->get(),
            'catagories' => Catagory::all(),
            'catagory' => $catagory,
            'themes' => $themes,
            'team' => $team,
        ]);
    }

    // Check if user has a role to see all the teams -> otherwise check if user is coach of team
    private function notAllowedToSeeProfile($team)
    {
        $isAllowed = false;
     
        if(Auth::user()->hasRole('admin')) $isAllowed = true;
        if(Auth::user()->isCoachOfTeam($team)) $isAllowed = true;

        return !$isAllowed;
    }
}

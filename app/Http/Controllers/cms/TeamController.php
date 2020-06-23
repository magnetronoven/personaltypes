<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Team;
use App\User;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkRole:admin');
    }
    
    public function index()
    {
        $teams = Team::All();

        return view('cms.teams.index', [
            'teams' => $teams,
        ]);
    }

    public function show(Team $team)
    {
        return view('cms.teams.show', [
            'team' => $team,
            'players' => User::where('team_id', $team->id)->get(),
        ]);
    }

    public function create()
    {
        $coaches = User::with('roles')->whereHas(
            'roles', function($q){
                $q->where('role', 'coach');
            }
        )->get();

        return view('cms.teams.create', [
            'coaches' => $coaches,
        ]);
    }

    public function store(Request $request)
    {
        $team = Team::create($this->validateform());
        $team->users()->attach(request('users'));

        return redirect()->route('teams.index');
    }

    public function edit(Team $team)
    {
        $coaches = User::with('roles')->whereHas(
            'roles', function($q){
                $q->where('role', 'coach');
            }
        )->get();

        return view('cms.teams.edit', [
            'team' => $team,
            'coaches' => $coaches,
        ]);
    }

    public function update(Request $request, Team $team)
    {
        // Unique name field requires weird validation ¯\_(ツ)_/¯
        request()->validate([
            'name' => 'required|unique:teams,name,'.$team->id,
        ]);
        $team->name = request("name");
        $team->save();
        $team->users()->sync(request('users'));

        return redirect()->route('teams.index');
    }

    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('teams.index');
    }

    protected function validateform()
    {
        return request()->validate([
            'name' => ['required', 'unique:teams'],
        ]);
    }
}

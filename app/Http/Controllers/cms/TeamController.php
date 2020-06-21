<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Team;
use App\User;

class TeamController extends Controller
{
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
        return view('cms.teams.create');
    }

    public function store(Request $request)
    {
        Team::create($this->validateform());
        return redirect()->route('teams.index');
    }

    public function edit(Team $team)
    {
        return view('cms.teams.edit', [
            'team' => $team,
        ]);
    }

    public function update(Request $request, Team $team)
    {
        $this->validateform();
        $team->name = request("name");
        $team->save();
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

<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Team;
use App\Position;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::All();

        return view('cms.users.index', [
            'users' => $users,
        ]);
    }

    public function create(Request $request)
    {
        return view('cms.users.create', [
            'team' => Team::where('name', $request->input('team'))->first(),
            'positions' => Position::all(),
        ]);
    }

    public function store(Request $request)
    {
        User::create($this->validateform());

        if($request->has('team_id')) {
            return redirect()->route('teams.show', ['team' => Team::where('id', request("team_id"))->first()->name]);
        }

        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        return view('cms.users.edit', [
            'user' => $user,
            'positions' => Position::all(),
            'teams' => Team::all(),
        ]);
    }

    public function update(Request $request, User $user)
    {
        $this->validateform();

        if($request->has('checkpassword')){
            $user->password = request("password");
        }
        
        $user->name = request("name");
        $user->lastname = request("lastname");
        $user->profile = request("profile");
        $user->email = request("email");
        $user->team_id = request("team_id");
        $user->role_id = request("role_id");
        $user->position_id = request("position_id");
        $user->save();

        if($request->has('team_id') && !is_null(request("team_id"))) {
            return redirect()->route('teams.show', ['team' => Team::where('id', request("team_id"))->first()->name]);
        }

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }

    protected function validateform()
    {
        return request()->validate([
            'name' => ['required'],
            'lastname' => ['required'],
            'profile' => ['nullable'],
            'email' => ['nullable'],
            'password' => ['nullable'],
            'team_id' => ['nullable'],
            'role_id' => ['required'],
            'position_id' => ['nullable'],
        ]);
    }
}

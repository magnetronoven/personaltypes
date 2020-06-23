<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Team;
use App\Position;
use App\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkRole:admin');
    }
    
    public function index()
    {
        $users = User::with('roles')->get();

        return view('cms.users.index', [
            'users' => $users,
        ]);
    }

    public function admins()
    {
        $users = User::with('roles')->whereHas(
            'roles', function($q){
                $q->where('role', 'admin');
            }
        )->get();

        return view('cms.users.admins', [
            'users' => $users,
        ]);
    }

    public function create(Request $request)
    {
        return view('cms.users.create', [
            'team' => Team::where('name', $request->input('team'))->first(),
            'positions' => Position::all(),
            'roles' => Role::all(),
        ]);
    }

    public function store(Request $request)
    {
        $user = User::create($this->validateform());
        $user->roles()->attach(request('roles'));

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
            'roles' => Role::all(),
        ]);
    }

    public function update(Request $request, User $user)
    {
        // Unique email field requires weird validation ¯\_(ツ)_/¯
        request()->validate([
            'name' => ['required'],
            'lastname' => ['required'],
            'profile' => ['nullable'],
            'dmd' => ['nullable'],
            'email' => ['nullable', 'unique:users,email,'.$user->id],
            'password' => ['nullable'],
            'team_id' => ['nullable'],
            'position_id' => ['nullable'],
            'roles' => ['nullable', 'array'],
        ]);

        if($request->has('checkpassword')){
            $user->password = request("password");
        }
        
        $user->name = request("name");
        $user->lastname = request("lastname");
        $user->profile = request("profile");
        $user->dmd = request("dmd");
        $user->email = request("email");
        $user->team_id = request("team_id");
        $user->position_id = request("position_id");
        $user->save();
        $user->roles()->sync(request('roles'));

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
            'dmd' => ['nullable'],
            'email' => ['nullable', 'unique:users'],
            'password' => ['nullable'],
            'team_id' => ['nullable'],
            'position_id' => ['nullable'],
            'roles' => ['nullable', 'array'],
        ]);
    }
}

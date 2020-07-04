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

    public function coaches()
    {
        $users = User::with('roles')->whereHas(
            'roles', function($q){
                $q->where('role', 'coach');
            }
        )->get();

        return view('cms.users.coaches', [
            'users' => $users,
        ]);
    }

    public function create(Request $request)
    {
        return view('cms.users.create', [
            'team' => Team::where('name', $request->input('team'))->first(),
            'positions' => Position::all(),
            'roles' => Role::all(),
            'redirect' => $request->input('redirect'),
        ]);
    }

    public function store(Request $request)
    {
        dd($request);
        $this->validateform();

        $user = User::create([
            'name' => request("name"),
            'lastname' => request("lastname"),
            'profile' => request("profile"),
            'dmd' => request("dmd"),
            'email' => request("email"),
            'password' => Hash::make(request("password")),
            'team_id' => request("team_id"),
            'position_id' => request("position_id"),
        ]);

        $user->roles()->attach(request('roles'));

        if($request->input('redirect')) {
            return redirect($request->input('redirect'));
        }

        return redirect()->route('users.index');
    }

    public function edit(Request $request, User $user)
    {
        return view('cms.users.edit', [
            'user' => $user,
            'positions' => Position::all(),
            'teams' => Team::all(),
            'roles' => Role::all(),
            'redirect' => $request->input('redirect'),
        ]);
    }

    public function update(Request $request, User $user)
    {
        // Unique email field requires weird validation ¯\_(ツ)_/¯
        request()->validate([
            'name' => ['required', 'max:255'],
            'lastname' => ['required', 'max:255'],
            'profile' => ['nullable', 'max:255'],
            'dmd' => ['nullable', 'max:255'],
            'email' => ['nullable', 'unique:users,email,'.$user->id, 'max:255'],
            'password' => ['nullable', 'max:255'],
            'team_id' => ['nullable'],
            'position_id' => ['nullable'],
            'roles' => ['nullable', 'array'],
        ]);

        if($request->has('checkpassword')){
            $user->password = Hash::make(request("password"));
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

        if($request->input('redirect')) {
            return redirect($request->input('redirect'));
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
            'name' => ['required', 'max:255'],
            'lastname' => ['required', 'max:255'],
            'profile' => ['nullable', 'max:255'],
            'dmd' => ['nullable', 'max:255'],
            'email' => ['nullable', 'unique:users', 'max:191'],
            'password' => ['nullable', 'max:255'],
            'team_id' => ['nullable'],
            'position_id' => ['nullable'],
            'roles' => ['nullable', 'array'],
        ]);
    }
}

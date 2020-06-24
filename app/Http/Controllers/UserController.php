<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Catagory;
use App\Theme;
use App\Type;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        // $this->middleware('checkRole:eigen-profiel-zien')->only('profile');
        $this->middleware('checkRole:admin,coach')->only('show');
    }

    public function show(User $user)
    {
        // Check if user has a role to see all the teams -> otherwise check if user is coach of team
        if(!Auth::user()->hasAnyRole(['admin'])) {
            if(!Auth::user()->isCoachOfTeam($user)) {
                return abort(403);
            }
        }

        return view('showuser', [
            'user' => $user,
            'catagories' => Catagory::with('themes.types')->get(),
        ]);
    }

    public function profile()
    {
        return view('showuser', [
            'user' => Auth::user(),
            'catagories' => Catagory::with('themes.types')->get(),
        ]);
    }
}

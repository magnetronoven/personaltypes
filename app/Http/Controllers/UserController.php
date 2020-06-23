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

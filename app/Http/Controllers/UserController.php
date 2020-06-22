<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Catagory;
use App\Theme;
use App\Type;

class UserController extends Controller
{
    public function show(User $user)
    {
        return view('showuser', [
            'user' => $user,
            'catagories' => Catagory::with('themes.types')->get(),
        ]);
    }
}

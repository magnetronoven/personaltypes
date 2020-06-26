<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Testmail;
use App\Catagory;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Has no role -> other home screen
        $user = Auth::user();
        if($user->hasNoRole()) {
            return redirect()->route('profile');
        }

        $teams = $user->teams()->with('players')->get();
        $catagory = Catagory::first();

        return view('home', [
            'teams' => $teams,
            'catagory' => $catagory,
        ]);
    }

    // public function email()
    // {
    //     return new Testmail();
    //     Mail::to('email@email.com')->send(new Testmail());
    // }
}

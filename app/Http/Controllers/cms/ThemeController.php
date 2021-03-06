<?php

namespace App\Http\Controllers\cms;

use App\Catagory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Theme;
use App\Type;
use App\Position;

class ThemeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkRole:admin');
    }
    
    public function index()
    {
        $themes = Theme::All();

        return view('cms.themes.index', [
            'themes' => $themes,
        ]);
    }

    public function show(Theme $theme)
    {
        return view('cms.themes.show', [
            'theme' => $theme,
            'types' => Type::where('theme_id', $theme->id)->get(),
        ]);
    }

    public function create(Request $request)
    {
        // Must have a catagory
        if(!$request->has('catagory')) abort(403);

        return view('cms.themes.create', [
            'catagory' => Catagory::where('catagory', $request->input('catagory'))->first(),
            'positions' => Position::all(),
        ]);
    }

    public function store(Request $request)
    {
        $theme = Theme::create($this->validateform());

        $theme->positions()->attach(request('positions'));
        return redirect()->route('catagories.show', ['catagory' => Catagory::where('id', $request->input('catagory_id'))->first()]);
    }
    
    public function edit(Theme $theme)
    {
        return view('cms.themes.edit', [
            'theme' => $theme,
            'positions' => Position::all(),
        ]);
    }

    public function update(Request $request, Theme $theme)
    {
        $this->validateform();
        $theme->theme = request("theme");
        $theme->save();
        $theme->positions()->sync(request('positions'));
        return redirect()->route('themes.index');
    }

    public function destroy(Theme $theme)
    {
        $theme->delete();
        return redirect()->route('themes.index');
    }

    protected function validateform()
    {
        return request()->validate([
            'theme' => ['required', 'max:255'],
            'catagory_id' => ['required'],
            'positions' => ['nullable', 'array'],
        ]);
    }
}

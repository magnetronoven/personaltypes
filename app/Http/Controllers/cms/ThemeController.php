<?php

namespace App\Http\Controllers\cms;

use App\Catagory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Theme;

class ThemeController extends Controller
{
    public function index()
    {
        $themes = Theme::All();

        return view('cms.themes.index', [
            'themes' => $themes,
        ]);
    }

    public function create(Request $request)
    {
        if(!$request->has('catagory')) abort(403);
        return view('cms.themes.create', [
            'catagory' => Catagory::where('catagory', $request->input('catagory'))->first(),
        ]);
    }

    public function store(Request $request)
    {
        Theme::create($this->validateform());
        return redirect()->route('catagories.show', ['catagory' => Catagory::where('id', $request->input('catagory_id'))->first()]);
    }
    
    public function edit(Theme $theme)
    {
        return view('cms.themes.edit', [
            'catagory' => $theme,
        ]);
    }

    public function update(Request $request, Theme $theme)
    {
        $this->validateform();
        $theme->theme = request("theme");
        $theme->save();
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
            'theme' => ['required'],
            'catagory_id' => ['required'],
        ]);
    }
}

<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Type;
use App\Theme;

class TypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkRole:admin');
    }
    
    public function index()
    {
        $types = Type::All();

        return view('cms.types.index', [
            'types' => $types,
        ]);
    }

    public function create(Request $request)
    {
        // Must have a catagory
        if(!$request->has('theme_id')) abort(403);
        
        return view('cms.types.create', [
            'theme' => Theme::where('id', $request->input('theme_id'))->first(),
        ]);
    }
        
    public function store(Request $request)
    {
        Type::create($this->validateform());
        return redirect()->route('themes.show', ['theme' => Theme::where('id', $request->input('theme_id'))->first()]);
    }
    
    public function edit(Type $type)
    {
        return view('cms.types.edit', [
            'type' => $type,
        ]);
    }

    public function update(Request $request, Type $type)
    {
        $this->validateform();
        $type->keywords = request("keywords");
        $type->description = request("description");
        $type->hyperlink = request("hyperlink");
        $type->connected_mbti = request("connected_mbti");
        $type->save();
        return redirect()->route('types.index');
    }

    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('types.index');
    }

    protected function validateform()
    {
        return request()->validate([
            'keywords' => ['required'],
            'description' => ['nullable'],
            'hyperlink' => ['nullable'],
            'connected_mbti' => ['nullable'],
            'theme_id' => ['required'],
        ]);
    }
}

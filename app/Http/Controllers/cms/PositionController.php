<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Position;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Position::All();

        return view('cms.positions.index', [
            'positions' => $positions,
        ]);
    }

    public function create()
    {
        return view('cms.positions.create');
    }

    public function store(Request $request)
    {
        Position::create($this->validateform());
        return redirect()->route('positions.index');
    }

    public function edit(Position $position)
    {
        return view('cms.positions.edit', [
            'position' => $position,
        ]);
    }

    public function update(Request $request, Position $position)
    {
        $this->validateform();
        $position->position = request("position");
        $position->save();
        return redirect()->route('positions.index');
    }

    public function destroy(Position $position)
    {
        $position->delete();
        return redirect()->route('positions.index');
    }

    protected function validateform()
    {
        return request()->validate([
            'position' => ['required'],
        ]);
    }
}

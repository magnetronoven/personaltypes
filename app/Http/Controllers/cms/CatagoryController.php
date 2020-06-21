<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Catagory;

class CatagoryController extends Controller
{
    public function index()
    {
        $catagories = Catagory::All();

        return view('cms.catagories.index', [
            'catagories' => $catagories,
        ]);
    }

    public function create()
    {
        return view('cms.catagories.create');
    }

    public function store(Request $request)
    {
        Catagory::create($this->validateform());
        return redirect()->route('catagories.index');
    }
    
    public function edit(Catagory $catagory)
    {
        return view('cms.catagories.edit', [
            'catagory' => $catagory,
        ]);
    }

    public function update(Request $request, Catagory $catagory)
    {
        $this->validateform();
        $catagory->catagory = request("catagory");
        $catagory->save();
        return redirect()->route('catagories.index');
    }

    public function destroy(Catagory $catagory)
    {
        $catagory->delete();
        return redirect()->route('catagories.index');
    }

    protected function validateform()
    {
        return request()->validate([
            'catagory' => ['required'],
        ]);
    }
}

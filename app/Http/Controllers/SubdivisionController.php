<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Subdivision;

class SubdivisionController extends Controller
{
    public function addSubdivision(Request $request)
    {
        $subdivision = new Subdivision();

        $subdivision->code_subdivision = $request->input('code_subdivision');
        $subdivision->name_subdivision = $request->input('name_subdivision');

        $subdivision->save();

        return view('add_subdivision')->with(array('done'=> true));
    }
}
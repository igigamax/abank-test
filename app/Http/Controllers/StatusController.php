<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Status;

class StatusController extends Controller
{
    public function addStatus(Request $request)
    {
        $status = new Status();

        $status->name_status = $request->input('name_status');

        $status->save();

        return view('add_status')->with(array('done'=> true));
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Option;

class OptionController extends Controller
{
    public function setPagination(Request $request)
    {
        Option::setOption('paginate', $request->input('paginate'));
        return view('options');
    }
}
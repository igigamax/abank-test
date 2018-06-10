<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Manufacturer;

class ManufacturerController extends Controller
{
    public function addManufacturer(Request $request)
    {
        $manufacturer = new Manufacturer();

        $manufacturer->name_manufacturer = $request->input('name_manufacturer');

        $manufacturer->save();

        return view('add_manufacturer')->with(array('done'=> true));
    }
}
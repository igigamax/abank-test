<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Terminal;
use App\EmployeesTerminal;

class TerminalController extends Controller
{
    public function addTerminal(Request $request)
    {
        $terminal = new Terminal();

        $terminal->code_terminal = $request->input('code_terminal');
        $terminal->id_subdivision = $request->input('id_subdivision');
        $terminal->id_manufacturer = $request->input('id_manufacturer');
        $terminal->id_status = $request->input('id_status');
        $terminal->installation_date = $request->input('installation_date');
        $terminal->last_service_date = $request->input('last_service_date');
        $name = '';

        if ($request->hasFile('image'))
        {
            $destinationPath = 'images/terminals';
            $name = $request->file('image')->getClientOriginalName();
            $request->file('image')->move($destinationPath, $name);
        }
        $terminal->image = $name;

        $terminal->save();

        $employeesTerminal = new EmployeesTerminal();

        $employeesTerminal->id_terminal = $terminal->id;
        $employeesTerminal->id_employee = $request->input('id_employee');//id_employee

        $employeesTerminal->save();

        return view('add_terminal')->with(array('done'=> true));
    }

    public function getTerminals()
    {
        $terminals = Terminal::getTerminals();
        return view('terminals')->with(array('terminals'=> $terminals));
    }

    public function getTerminalById($id)
    {
        $terminal = Terminal::getTerminal($id);
        return view('terminal')->with(array('terminal'=> $terminal));
    }

    public function changeStatus(Request $request, $id)
    {
        $new_status_id = $request->input('id_status');
        Terminal::changeStatus($id, $new_status_id);

        return $this->getTerminalById($id);
    }

    public function deleteTerminal($id)
    {
        Terminal::deleteTerminal($id);
        EmployeesTerminal::deleteTerminal($id);
        return redirect('terminals');
    }
}

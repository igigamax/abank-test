<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;
use App\EmployeesTerminal;

class EmployeeController extends Controller
{
    public function addEmployee(Request $request)
    {
        $employee = new Employee();

        $employee->firstname = $request->input('firstname');
        $employee->lastname = $request->input('lastname');
        $employee->id_subdivision = $request->input('id_subdivision');

        $employee->save();

        return view('add_employee')->with(array('done'=> true));
    }

    public function getEmployees()
    {
        $employees = Employee::getEmployees();
        $terminals = EmployeesTerminal::getTerminalsWithEmployees();

        return view('employees')->with(array(
            'employees' => $employees,
            'terminals' => $terminals
        ));
    }

    public function filterEmployees($id)
    {
        $employees = Employee::filterEmployees($id);
        $terminals = EmployeesTerminal::getTerminalsWithEmployees();

        return view('employees')->with(array(
            'employees' => $employees,
            'terminals' => $terminals
        ));
    }
}
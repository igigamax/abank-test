<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class EmployeesTerminal extends Model
{
    public static function getTerminalsWithEmployees()
    {
        //$terminals = self::where('delete', 0)->get();
        $terminals = DB::table('employees_terminals')->
            join('terminals', 'employees_terminals.id_terminal', '=', 'terminals.id')->
            join('subdivisions', 'terminals.id_subdivision', '=', 'subdivisions.id')->
            select('employees_terminals.id_employee',
                'employees_terminals.id_terminal',
                'subdivisions.code_subdivision',
                'terminals.code_terminal')->
            where('employees_terminals.delete', 0)->
            orderBy('subdivisions.code_subdivision', 'asc')->
            get();
        foreach ($terminals as $terminal){
            $employees[$terminal->id_employee][] = array(
                'id_terminal' => $terminal->id_terminal,
                'code_terminal' => $terminal->code_subdivision.'-'.$terminal->code_terminal
            );
        }
        return $employees;
    }

    public static function deleteTerminal($id)
    {
        self::where('id_terminal', $id)->update(['delete' => 1]);
    }
}

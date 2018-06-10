<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Terminal extends Model
{
    public static function getTerminals()
    {
        $terminals = DB::table('terminals')->
            join('subdivisions', 'terminals.id_subdivision', '=', 'subdivisions.id')->
            join('manufacturers', 'terminals.id_manufacturer', '=', 'manufacturers.id')->
            join('statuses', 'terminals.id_status', '=', 'statuses.id')->
            join('employees_terminals', 'terminals.id', '=', 'employees_terminals.id_terminal')->
            join('employees', 'employees_terminals.id_employee', '=', 'employees.id')->
            select('terminals.*',
                'subdivisions.code_subdivision',
                'manufacturers.name_manufacturer',
                'statuses.name_status',
                'employees.firstname','employees.lastname')->
            where('terminals.delete', 0)->
            paginate(Option::getOption('paginate')?Option::getOption('paginate'):5);


        return $terminals;
    }
    public static function getTerminal($id)
    {
        $terminals = DB::table('terminals')->
            join('subdivisions', 'terminals.id_subdivision', '=', 'subdivisions.id')->
            join('manufacturers', 'terminals.id_manufacturer', '=', 'manufacturers.id')->
            join('statuses', 'terminals.id_status', '=', 'statuses.id')->
            join('employees_terminals', 'terminals.id', '=', 'employees_terminals.id_terminal')->
            join('employees', 'employees_terminals.id_employee', '=', 'employees.id')->
            select('terminals.*',
                'subdivisions.code_subdivision',
                'manufacturers.name_manufacturer',
                'statuses.name_status',
                'employees.firstname','employees.lastname')->
            where('terminals.delete', 0)->
            where('terminals.id', $id)->
            first();


        return $terminals;
    }

    public static function changeStatus($id, $new_status_id)
    {
        self::where('id', $id)->update(['id_status' => $new_status_id]);
    }

    public static function deleteTerminal($id)
    {
        self::where('id', $id)->update(['delete' => 1]);
    }
}

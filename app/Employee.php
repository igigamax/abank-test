<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Option;
use DB;

class Employee extends Model
{
    public static function getEmployees()
    {
        $employees = DB::table('employees')->
        join('subdivisions', 'employees.id_subdivision', '=', 'subdivisions.id')->
        select('employees.*',
            'subdivisions.code_subdivision')->
        orderBy('subdivisions.code_subdivision', 'asc')->
        paginate(Option::getOption('paginate')?Option::getOption('paginate'):5);

        return $employees;
    }
    public static function filterEmployees($id)
    {
        $employees = DB::table('employees')->
        join('subdivisions', 'employees.id_subdivision', '=', 'subdivisions.id')->
        select('employees.*',
            'subdivisions.code_subdivision')->
        where('employees.id_subdivision', $id)->
        orderBy('subdivisions.code_subdivision', 'asc')->
        paginate(Option::getOption('paginate')?Option::getOption('paginate'):5);

        return $employees;
    }


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public static function getOption($name)
    {
        $option =  self::where('name', $name)->first();
        return $option['value'];
    }

    public static function setOption($name, $value)
    {
        if(self::where('name', $name)->count()){
            self::where('name', $name)->update(['value' => $value]);
            return true;
        }else{
            $option = new Option();
            $option->name = $name;
            $option->value = $value;
            $option->save();
            return true;
        }
        return false;
    }
}

<?php

namespace  Hoda\SMS\Factory;

use Hoda\SMS\Contracts\Driver;

class DriverFactory
{
    /**
     * @param $driver
     * @return mixed
     */
    public static function create($driver,$from)
    {
        $className = \Str::studly($driver) . 'Driver';
        $obj =   "Hoda\\SMS\\Drivers\\" . $className;

//        if (!$obj instanceof Driver) {
//            throw new \InvalidArgumentException("Driver [$driver] not supported.");
//        }
        return new $obj($from);
    }
}

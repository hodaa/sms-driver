<?php

namespace  Hoda\SMS\Factory;

class DriverFactory
{
    /**
     * @param $driver
     * @return mixed
     */
    public static function create($driver)
    {

        $className = Str::studly($driver) . 'Driver';
//        $obj =  __NAMESPACE__ . "Drivers\\" . $className;
        $obj ="App\\Drivers\\" . $className;

        return new $obj();

        // throw new InvalidArgumentException("Driver [$driver] not supported.");
    }
}

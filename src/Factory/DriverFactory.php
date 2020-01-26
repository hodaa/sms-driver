<?php

namespace  Hoda\SMS\Factory;

use Hoda\SMS\Contracts\Driver;

class DriverFactory
{
    /**
     * @param $driver
     * @return mixed
     */
    public static function create($driver)
    {
        $className = \Str::studly($driver) . 'Driver';
        $obj =  __NAMESPACE__ . "Drivers\\" . $className;
        if (! $obj instanceof Driver) {
            throw new InvalidArgumentException("Driver [$driver] not supported.");
        }
        return new $obj();
    }
}

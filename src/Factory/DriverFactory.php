<?php

namespace  Hoda\SMS\Factory;

use Hoda\SMS\Contracts\Driver;
use Hoda\SMS\Exceptions\SmsException;


class DriverFactory
{
    /**
     * @param $driver
     * @return mixed
     */
    public static function create($driver, $from)
    {
        $className = \Str::studly($driver) . 'Driver';
        $obj =   "Hoda\\SMS\\Drivers\\" . $className;

        if (!class_exists($obj)) {
            throw new SmsException("Driver [$driver] not supported.");
        }
//        if (!$obj instanceof Driver) {
//            throw new \InvalidArgumentException("Driver [$driver] not supported.");
//        }
        return new $obj($from);
    }
}

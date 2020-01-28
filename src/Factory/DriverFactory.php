<?php

namespace  Hoda\SMS\Factory;

use Hoda\SMS\Drivers\Driver;
use Hoda\SMS\Exceptions\SmsException;

class DriverFactory
{
    /**
     * @param $driver
     * @param $from
     * @return mixed
     * @throws SmsException
     */
    public static function create($driver, $from)
    {
        $className = \Str::studly($driver) . 'Driver';
        $obj =   "Hoda\\SMS\\Drivers\\" . $className;

        if (!class_exists($obj) || !$obj instanceof Driver) {
            throw new SmsException("Driver [$driver] not supported.");
        }

        return new $obj($from);
    }
}

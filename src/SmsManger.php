<?php

namespace Hoda\SMS;

use Hoda\SMS\Factory\DriverFactory;

class SmsManger
{
    /**
     * @param null $name
     * @return mixed
     */
    public function channel($name = null)
    {
        return $this->driver($name);
    }

    /**
     * @return string|null
     */
    public function getDefaultDriver()
    {
        return $this->app['config']['sms.default'] ?? null;
    }

    /**
     * @param null $driver
     * @return mixed
     */
    public function driver($driver = null)
    {
        $driver = $driver ?: $this->getDefaultDriver();

        if (is_null($driver)) {
            throw new InvalidArgumentException(sprintf(
                'Unable to resolve NULL driver for [%s].',
                static::class
            ));
        }

        // If the given driver has not been created before, we will create the instances
        // here and cache it so we can return it next time very quickly. If there is
        // already a driver created by this name, we'll just return that instance.
        if (! isset($this->drivers[$driver])) {
            $from = config('sms.' . $driver . '.from');
            $this->drivers[$driver] = DriverFactory::create($driver, $from);
        }

        return $this->drivers[$driver];
    }
}

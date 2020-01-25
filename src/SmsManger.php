<?php

namespace Hoda\SMS;

use \Illuminate\Support\Manager;
use Hoda\SMS\Drivers;

class SmsManger extends Manager
{
    public function sayHello()
    {
        echo "Hello, sms";
    }

    public function channel($name = null)
    {
        return $this->driver($name);
    }

    /**
     * Create a Nexmo SMS driver instance.
     *
     * @return \App\Components\Sms\Drivers\NexmoDriver
     */
    public function createNexmoDriver()
    {
        return new NexmoDriver(
            $this->createNexmoClient(),
            $this->app['config']['sms.nexmo.from']
        );
    }

    public function createTwilioDriver()
    {
        return new TwilioDriver(
            $this->createTwilioClient(),
            $this->app['config']['sms.twilio.from']
        );
    }


    /**
     * @inheritDoc
     */
    public function getDefaultDriver()
    {
       return $this->app['config']['sms.default'] ?? null;
    }

    public function driver($driver = null)
    {
        $driver = $driver ?: $this->getDefaultDriver();

        if (is_null($driver)) {
            throw new InvalidArgumentException(sprintf(
                'Unable to resolve NULL driver for [%s].', static::class
            ));
        }

        // If the given driver has not been created before, we will create the instances
        // here and cache it so we can return it next time very quickly. If there is
        // already a driver created by this name, we'll just return that instance.
        if (! isset($this->drivers[$driver])) {
            $this->drivers[$driver] = $this->createDriver($driver);
        }

        return $this->drivers[$driver];
    }
}

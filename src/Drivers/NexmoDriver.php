<?php

namespace Hoda\SMS\Drivers;

use Hoda\SMS\Drivers\Driver;

use Nexmo\Client as NexmoClient;

class NexmoDriver extends Driver
{
    /**
     * The Nexmo client.
     *
     * @var \Nexmo\Client
     */
    protected $client;

    /**
     * The phone number this sms should be sent from.
     *
     * @var string
     */
    protected $from;


    /**
     * Create a new Nexmo driver instance.
     *
     * @param string $from
     */
    public function __construct($from)
    {
        $this->client = app(NexmoClient::class);
        $this->from = $from;
    }


    /**
     * @return \Nexmo\Message\Message
     * @throws NexmoClient\Exception\Request
     * @throws NexmoClient\Exception\Server
     * @throws NexmoClient\Exception\Exception
     */
    public function send()
    {
        return $this->client->message()->send([
            'from' => $this->from,
            'to' => $this->recipient,
            'text' => trim($this->message)
        ]);
    }
}

<?php

namespace Hoda\SMS\Drivers;

use Hoda\SMS\Contracts\Driver;
use Nexmo\Client as NexmoClient;

class NexmoDriver implements Driver
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
     * The phone number  that will receive this sms .
     * @var
     */
    private $recipient;

    /**
     * The content of Message Sent.
     * @var
     */
    private $message;

    /**
     * Create a new Nexmo driver instance.
     *
     * @param  \Nexmo\Client  $nexmo
     * @param  string  $from
     * @return void
     */
    public function __construct($from)
    {
        $this->client = app(NexmoClient::class);
        $this->from = $from;
    }

    /**
     * @param $recipient
     * @return $this
     */
    public function to($recipient)
    {
        $this->recipient = $recipient;
        return $this;
    }

    /**
     * @param $message
     * @return $this
     */
    public function message($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return \Nexmo\Message\Message
     * @throws NexmoClient\Exception\Request
     * @throws NexmoClient\Exception\Server
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

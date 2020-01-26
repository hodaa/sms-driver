<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Hoda\SMS\SMSFacade;
use \Mockery as m;

final class EmailTest extends TestCase
{
    public function tearDown(): void
    {
        \Mockery::close();
    }

    public function testSendNeximoSMS(): void
    {
        $mock = m::mock(SMSFacade::class);
        $response = $mock->shouldReceive('channel')->with('twilio')->andReturn('Hello, sms');
      //  channel('nexmo')->to('201069642842')->send();
//        $response = $mock->shouldReceive('sayHello')->andReturn('Hello, sms');
//        $this->assertEquals('Hello, sms', $mock->sayHello());


//        var_dump($response);
//        exit("hoda");
//       $resposne= SMS::channel('twilio');
//        \App\Facades\SMS::sa
//        $this->assertTrue(true);
    }
}

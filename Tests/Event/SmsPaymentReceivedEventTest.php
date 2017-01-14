<?php

namespace Ernestre\PaymentBundle\Tests\Event;

use Ernestre\PaymentBundle\Entity\SmsPayment;
use Ernestre\PaymentBundle\Event\SmsPaymentReceivedEvent;

class SmsPaymentReceivedEventTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldReturnTheSameObjectGivenInConstruct()
    {
        $smsPayment = $this->getMock(SmsPayment::class);

        $event = new SmsPaymentReceivedEvent($smsPayment);

        $this->assertEquals($smsPayment, $event->getSmsPayment());
    }

    public function testShouldHaveCorrectEventName()
    {
        $this->assertEquals('smsPayment.received', SmsPaymentReceivedEvent::NAME);
    }
}

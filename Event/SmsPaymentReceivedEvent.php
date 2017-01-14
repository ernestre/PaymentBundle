<?php

namespace Ernestre\PaymentBundle\Event;

use Ernestre\PaymentBundle\Entity\SmsPayment;
use Symfony\Component\EventDispatcher\Event;

class SmsPaymentReceivedEvent extends Event
{
    const NAME = 'smsPayment.received';

    /**
     * @var SmsPayment
     */
    protected $smsPayment;

    /**
     * @param SmsPayment $smsPayment
     */
    public function __construct(SmsPayment $smsPayment)
    {
        $this->smsPayment = $smsPayment;
    }

    /**
     * @return SmsPayment
     */
    public function getSmsPayment()
    {
        return $this->smsPayment;
    }
}

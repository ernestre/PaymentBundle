<?php

namespace Ernestre\PaymentBundle\Services\Interfaces;

use Ernestre\PaymentBundle\Entity\SmsPayment;

interface AnswerSenderInterface
{
    /**
     * @param SmsPayment $smsPayment
     * @param            $responseText
     * @return mixed
     */
    public function send(SmsPayment $smsPayment, $responseText);
}

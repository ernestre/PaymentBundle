<?php

namespace Ernestre\PaymentBundle\Tests\Services;

use Ernestre\PaymentBundle\Entity\SmsPayment;
use Ernestre\PaymentBundle\Services\SmsPaymentAnswerSender;

class SmsPaymentAnswerSenderStub extends SmsPaymentAnswerSender
{
    protected function sendAnswer(array $answerData)
    {
        return true;
    }

    public function generateAnswerData(SmsPayment $smsPayment, $responseText)
    {
        return parent::generateAnswerData($smsPayment, $responseText);
    }
}

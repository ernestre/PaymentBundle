<?php

namespace Ernestre\PaymentBundle\Services;

use Ernestre\PaymentBundle\Entity\SmsPayment;
use Ernestre\PaymentBundle\Services\Interfaces\AnswerSenderInterface;

class SmsPaymentAnswerSender implements AnswerSenderInterface
{
    /**
     * @var string
     */
    protected $signPassword;

    /**
     * @param $signPassword
     */
    public function __construct($signPassword)
    {
        $this->signPassword = $signPassword;
    }

    /**
     * {@inheritdoc}
     */
    public function send(SmsPayment $smsPayment, $responseText)
    {
        $answerData = $this->generateAnswerData($smsPayment, $responseText);
        return $this->sendAnswer($answerData);
    }

    /**
     * @param SmsPayment $smsPayment
     * @param string     $responseText
     * @return array
     */
    protected function generateAnswerData(SmsPayment $smsPayment, $responseText)
    {
        return [
            'id'            => $smsPayment->getPaymentId(),
            'msg'           => $responseText,
            'sign_password' => $this->signPassword
        ];
    }

    /**
     * @param array $answerData
     */
    protected function sendAnswer(array $answerData)
    {
        \WebToPay::smsAnswer($answerData);
    }
}

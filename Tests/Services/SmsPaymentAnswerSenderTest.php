<?php

namespace Ernestre\PaymentBundle\Services;

use Ernestre\PaymentBundle\Entity\SmsPayment;
use Ernestre\PaymentBundle\Tests\Services\SmsPaymentAnswerSenderStub;

class SmsPaymentAnswerSenderTest extends \PHPUnit_Framework_TestCase
{
    const SIGN_PASSWORD = 'pass';

    /**
     * @var SmsPaymentAnswerSenderStub
     */
    protected $smsPaymentAnswerSender;

    public function setUp()
    {
        $this->smsPaymentAnswerSender = new SmsPaymentAnswerSenderStub(self::SIGN_PASSWORD);
    }

    public function testTestShouldGenerateCorrectResponseData()
    {
        $respMessage = 'respMessage';
        $smsPayment  = $this->getMock(SmsPayment::class);
        $smsPayment->method('getPaymentId')->willReturn(123);

        $output = $this->smsPaymentAnswerSender->generateAnswerData($smsPayment, $respMessage);

        $this->assertEquals(
            [
                'id'            => 123,
                'msg'           => $respMessage,
                'sign_password' => self::SIGN_PASSWORD
            ],
            $output
        );
    }

    public function testShouldSendResponse()
    {
        $respMessage = 'respMessage';
        $smsPayment  = $this->getMock(SmsPayment::class);
        $smsPayment->method('getPaymentId')->willReturn(123);

        $output = $this->smsPaymentAnswerSender->send($smsPayment, $respMessage);

        $this->assertTrue($output);
    }
}

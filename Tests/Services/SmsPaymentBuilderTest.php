<?php

namespace Ernestre\PaymentBundle\Tests\Services;

use Ernestre\PaymentBundle\Entity\SmsPayment;
use Ernestre\PaymentBundle\Services\SmsPaymentBuilder;

class SmsPaymentBuilderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SmsPaymentBuilder
     */
    protected $smsPaymentBuilder;

    public function setUp()
    {
        $this->smsPaymentBuilder = new SmsPaymentBuilder();
    }

    /**
     * @dataProvider invalidDataProvider
     * @expectedException \InvalidArgumentException
     */
    public function testShouldThrowExceptionOnInvalidData($invalidData)
    {
        $this->smsPaymentBuilder->build($invalidData);
    }

    public function testShouldCreateSmsPaymentFormDataArray()
    {
        $paymentData = [
            'to'        => 123,
            'sms'       => 'foo',
            'from'      => '321',
            'operator'  => 'The operator',
            'amount'    => 9001,
            'currency'  => 'EUR',
            'country'   => 'Lithuania',
            'id'        => 1,
            'test'      => 1,
            'key'       => 111,
            'projectid' => 100,
            'version'   => 1.6,
        ];

        $smsPayment = $this->smsPaymentBuilder->build($paymentData);

        $this->assertTrue($smsPayment instanceof SmsPayment);

        $this->assertEquals($paymentData['to'], $smsPayment->getSmsTo());
        $this->assertEquals($paymentData['sms'], $smsPayment->getSms());
        $this->assertEquals($paymentData['from'], $smsPayment->getSmsFrom());
        $this->assertEquals($paymentData['operator'], $smsPayment->getOperator());
        $this->assertEquals($paymentData['amount'], $smsPayment->getAmount());
        $this->assertEquals($paymentData['currency'], $smsPayment->getCurrency());
        $this->assertEquals($paymentData['country'], $smsPayment->getCountry());
        $this->assertEquals($paymentData['id'], $smsPayment->getPaymentId());
        $this->assertEquals($paymentData['test'], $smsPayment->getTest());
        $this->assertEquals($paymentData['key'], $smsPayment->getSmsShortCode());
        $this->assertEquals($paymentData['projectid'], $smsPayment->getProjectId());
        $this->assertEquals($paymentData['version'], $smsPayment->getVersion());
        $this->assertEquals(date('Y-m-d'), $smsPayment->getDate()->format('Y-m-d'));
    }

    public function invalidDataProvider()
    {
        return [
            [[1]],
            [
                [
                    'sms'       => 123,
                    'from'      => 123,
                    'operator'  => 123,
                    'amount'    => 123,
                    'currency'  => 123,
                    'country'   => 123,
                    'id'        => 123,
                    'test'      => 123,
                    'key'       => 123,
                    'projectid' => 123,
                    'version'   => 123,
                ]
            ],
            [
                [
                    'to'        => null,
                    'sms'       => 123,
                    'from'      => 123,
                    'operator'  => 123,
                    'amount'    => 123,
                    'currency'  => 123,
                    'country'   => 123,
                    'id'        => 123,
                    'test'      => 123,
                    'key'       => 123,
                    'projectid' => 123,
                    'version'   => 123,
                ]
            ],
            [
                [
                    'to'        => '',
                    'sms'       => 123,
                    'from'      => 123,
                    'operator'  => 123,
                    'amount'    => 123,
                    'currency'  => 123,
                    'country'   => 123,
                    'id'        => 123,
                    'test'      => 123,
                    'key'       => 123,
                    'projectid' => 123,
                    'version'   => 123,
                ]
            ],
        ];
    }
}

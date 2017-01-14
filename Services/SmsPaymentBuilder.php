<?php

namespace Ernestre\PaymentBundle\Services;

use Ernestre\PaymentBundle\Entity\SmsPayment;

class SmsPaymentBuilder
{
    const TO         = 'to';
    const SMS        = 'sms';
    const FROM       = 'from';
    const OPERATOR   = 'operator';
    const AMOUNT     = 'amount';
    const CURRENCY   = 'currency';
    const COUNTRY    = 'country';
    const ID         = 'id';
    const TEST       = 'test';
    const KEY        = 'key';
    const PROJECT_ID = 'projectid';
    const VERSION    = 'version';

    const REQUIRED_PARAMETERS = [
        self::TO,
        self::SMS,
        self::FROM,
        self::OPERATOR,
        self::AMOUNT,
        self::CURRENCY,
        self::COUNTRY,
        self::ID,
        self::TEST,
        self::KEY,
        self::PROJECT_ID,
        self::VERSION,
    ];

    /**
     * @param array $smsPaymentData
     * @return SmsPayment
     */
    public function build(array $smsPaymentData)
    {
        $this->validateData($smsPaymentData);
        return $this->buildSmsPayment($smsPaymentData);
    }

    /**
     * @param array $smsPaymentData
     * @return SmsPayment
     */
    protected function buildSmsPayment(array $smsPaymentData)
    {
        $smsPayment = new SmsPayment();

        $smsPayment
            ->setSmsTo($smsPaymentData[self::TO])
            ->setSms($smsPaymentData[self::SMS])
            ->setSmsFrom($smsPaymentData[self::FROM])
            ->setOperator($smsPaymentData[self::OPERATOR])
            ->setAmount($smsPaymentData[self::AMOUNT])
            ->setCurrency($smsPaymentData[self::CURRENCY])
            ->setCountry($smsPaymentData[self::COUNTRY])
            ->setPaymentId($smsPaymentData[self::ID])
            ->setTest($smsPaymentData[self::TEST])
            ->setSmsShortCode($smsPaymentData[self::KEY])
            ->setProjectId($smsPaymentData[self::PROJECT_ID])
            ->setVersion($smsPaymentData[self::VERSION])
            ->setDate(new \DateTime());

        return $smsPayment;
    }

    /**
     * @param array $smsPaymentData
     */
    protected function validateData(array $smsPaymentData)
    {
        foreach (self::REQUIRED_PARAMETERS as $requiredParameter) {
            if (!array_key_exists($requiredParameter, $smsPaymentData)) {
                throw new \InvalidArgumentException();
            }

            $parameterValue = $smsPaymentData[$requiredParameter];

            if (empty($parameterValue)) {
                throw new \InvalidArgumentException();
            }
        }
    }
}

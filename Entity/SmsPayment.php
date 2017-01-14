<?php

namespace Ernestre\PaymentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SmsPayment
 *
 * More information : https://developers.paysera.com/en/sms-keywords/current
 *
 * @ORM\Table(name="sms_payment")
 * @ORM\Entity(repositoryClass="Ernestre\PaymentBundle\Repository\SmsPaymentRepository")
 */
class SmsPayment
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $paymentId;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $smsTo;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $sms;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $smsFrom;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $operator;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $amount;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $currency;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $country;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $test;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $smsShortCode;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $projectId;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $version;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set paymentId
     *
     * @param string $paymentId
     *
     * @return SmsPayment
     */
    public function setPaymentId($paymentId)
    {
        $this->paymentId = $paymentId;

        return $this;
    }

    /**
     * Get paymentId
     *
     * @return string
     */
    public function getPaymentId()
    {
        return $this->paymentId;
    }

    /**
     * Set smsTo
     *
     * @param string $smsTo
     *
     * @return SmsPayment
     */
    public function setSmsTo($smsTo)
    {
        $this->smsTo = $smsTo;

        return $this;
    }

    /**
     * Get smsTo
     *
     * @return string
     */
    public function getSmsTo()
    {
        return $this->smsTo;
    }

    /**
     * Set sms
     *
     * @param string $sms
     *
     * @return SmsPayment
     */
    public function setSms($sms)
    {
        $this->sms = $sms;

        return $this;
    }

    /**
     * Get sms
     *
     * @return string
     */
    public function getSms()
    {
        return $this->sms;
    }

    /**
     * Set smsFrom
     *
     * @param string $smsFrom
     *
     * @return SmsPayment
     */
    public function setSmsFrom($smsFrom)
    {
        $this->smsFrom = $smsFrom;

        return $this;
    }

    /**
     * Get smsFrom
     *
     * @return string
     */
    public function getSmsFrom()
    {
        return $this->smsFrom;
    }

    /**
     * Set operator
     *
     * @param string $operator
     *
     * @return SmsPayment
     */
    public function setOperator($operator)
    {
        $this->operator = $operator;

        return $this;
    }

    /**
     * Get operator
     *
     * @return string
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * Set amount
     *
     * @param string $amount
     *
     * @return SmsPayment
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set currency
     *
     * @param string $currency
     *
     * @return SmsPayment
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return SmsPayment
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set test
     *
     * @param string $test
     *
     * @return SmsPayment
     */
    public function setTest($test)
    {
        $this->test = $test;

        return $this;
    }

    /**
     * Get test
     *
     * @return string
     */
    public function getTest()
    {
        return $this->test;
    }

    /**
     * Set smsShortCode
     *
     * @param string $smsShortCode
     *
     * @return SmsPayment
     */
    public function setSmsShortCode($smsShortCode)
    {
        $this->smsShortCode = $smsShortCode;

        return $this;
    }

    /**
     * Get smsShortCode
     *
     * @return string
     */
    public function getSmsShortCode()
    {
        return $this->smsShortCode;
    }

    /**
     * Set projectId
     *
     * @param string $projectId
     *
     * @return SmsPayment
     */
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;

        return $this;
    }

    /**
     * Get projectId
     *
     * @return string
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * Set version
     *
     * @param string $version
     *
     * @return SmsPayment
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return SmsPayment
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
}

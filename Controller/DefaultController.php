<?php

namespace Ernestre\PaymentBundle\Controller;

use Ernestre\PaymentBundle\Event\SmsPaymentReceivedEvent;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/sms-callback", name="payment-sms-callback")
     */
    public function smsCallbackAction()
    {
        $response = \WebToPay::checkResponse($_GET, array(
            'projectid'     => $this->getParameter('project_id'),
            'sign_password' => $this->getParameter('sign_password'),
        ));

        $smsPayment = $this->get('ernestre_payment.sms_payment.sms_payment_builder')->build($response);

        $em = $this->getDoctrine()->getManager();
        $em->persist($smsPayment);
        $em->flush();

        $this
            ->get('event_dispatcher')
            ->dispatch(SmsPaymentReceivedEvent::NAME, new SmsPaymentReceivedEvent($smsPayment));

        return new Response('NOSMS');
    }
}

## Symfony Paysera SMS Payment Bundle.

This bundle uses `webtopay/libwebtopay` library for accepting sms payments via [ Paysera ](https://www.paysera.lt/v2/en-LT/index) payment gateway.

# Install
`composer require ernestre/sms-payment-bundle`

# Configuration


* Add bundle to `app/AppKernel`:
```php
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Ernestre\PaymentBundle\ErnestrePaymentBundle(),
            // ...
        );
    }
    // ...
}
```

* Add routes:
```yml
ernestre_payment:
    resource: "@ErnestrePaymentBundle/Controller/"

```
* Add configuration:
```yml
ernestre_payment:
  project:
    id:             123 # Your project id
    sign_password:  123 # Your project's sign password
```

* Configure sms callback route to `/sms-callback` in your paysera project setting.

# Usage

After each received payment, `SmsPayment` entity is created and saved to the database.

Then `SmsPaymentReceivedEvent` event is dispatched containing the `SmsPayment` entity with all the payment information.

Then the action sends `NOSMS` response. ( Detailed information about response messages can be found [ here ](https://developers.paysera.com/en/sms-keywords/current). )


Your job is to create a [ listener ](http://symfony.com/doc/current/event_dispatcher.html) which listens to `smsPayment.received` event and do what ever you need with the payment information.

However, using the `NOSMS` response message requires you to send a payment confirmation message back to the Paysera serivce. You can use `ernestre_payment.sms_payment.answer_sender` service to generate this response message. Service's send method requires the `SmsPayment` entity and `response text` (which will be sent to the client). The `response text` can be used to send some king of code (i.e. discount coupon) to the client.


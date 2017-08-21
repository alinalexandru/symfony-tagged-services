<?php
namespace PayU\PaymentBundle\Service;

use Innobyte\TaggedServicesDemoBundle\Payment\PaymentProviderInterface;

/**
 * Class Payment
 *
 * @author Alin Alexandru <alin.alexandru@innobyte.com>
 */
class Payment implements PaymentProviderInterface
{
    public function getName()
    {
        return 'PayU';
    }

    public function getIdentifier()
    {
        return 'payu';
    }

    public function makePayment()
    {
        return 'Payment OK';
    }
}

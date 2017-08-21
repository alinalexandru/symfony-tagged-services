<?php

namespace MobilPay\PaymentBundle\Service;

use Innobyte\TaggedServicesDemoBundle\Payment\PaymentProviderInterface;

/**
 * Class Payment
 *
 * @package MobilPay\PaymentBundle\Service
 *
 * @author Alin Alexandru <alin.alexandru@innobyte.com>
 */
class Payment implements PaymentProviderInterface
{
    public function getName()
    {
        return 'MobilPay';
    }

    public function getIdentifier()
    {
        return 'mobilpay';
    }

    public function makePayment()
    {
        return 'Payment NOT OK';
    }
}

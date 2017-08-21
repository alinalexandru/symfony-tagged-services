<?php

namespace Innobyte\TaggedServicesDemoBundle\Service;

use Innobyte\TaggedServicesDemoBundle\Payment\PaymentProviderInterface;

/**
 * Class PaymentFactory
 *
 * @author Alin Alexandru <alin.alexandru@innobyte.com>
 */
class PaymentFactory
{

    private $payments;

    /**
     * @param string $identifier
     *
     * @return PaymentProviderInterface
     */
    public function getPayment($identifier)
    {
        if (isset($this->payments[$identifier])) {
            return $this->payments[$identifier];
        }

        throw new \InvalidArgumentException('Payment does not exists');
    }

    /**
     * @param PaymentProviderInterface $paymentProvider
     * @return $this
     */
    public function addPayment(PaymentProviderInterface $paymentProvider)
    {
        $this->payments[$paymentProvider->getIdentifier()] = $paymentProvider;

        return $this;
    }

    /**
     * @return PaymentProviderInterface[]
     */
    public function getPayments()
    {
        return $this->payments;
    }
}

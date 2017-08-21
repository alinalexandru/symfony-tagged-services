<?php

namespace Innobyte\TaggedServicesDemoBundle\Payment;

/**
 * Interface PaymentInterface
 *
 * @package Innobyte\TaggedServicesDemoBundle\Payment
 *
 * @author Alin Alexandru <alin.alexandru@innobyte.com>
 */
interface PaymentProviderInterface
{
    public function getName();

    public function getIdentifier();

    public function makePayment();
}

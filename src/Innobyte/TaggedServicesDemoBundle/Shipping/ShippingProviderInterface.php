<?php

namespace Innobyte\TaggedServicesDemoBundle\Shipping;

/**
 * Class ShippingProviderInterface
 *
 * @package Innobyte\TaggedServicesDemoBundle\Shipping
 *
 * @author Alin Alexandru <alin.alexandru@innobyte.com>
 */
interface ShippingProviderInterface
{
    public function getName();

    public function calculateShippingCost();

    public function getIdentifier();
}

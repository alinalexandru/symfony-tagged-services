<?php

namespace Innobyte\TaggedServicesDemoBundle\Service;

use Innobyte\TaggedServicesDemoBundle\Shipping\ShippingProviderInterface;

/**
 * Class ShippingFactory
 *
 * @package Innobyte\TaggedServicesDemoBundle\Service
 *
 * @author Alin Alexandru <alin.alexandru@innobyte.com>
 */
class ShippingFactory
{
    private $shippingMethods;

    /**
     * @param ShippingProviderInterface $shippingProvider
     *
     * @return $this
     */
    public function addShipping(ShippingProviderInterface $shippingProvider)
    {
        $this->shippingMethods[$shippingProvider->getIdentifier()] = $shippingProvider;

        return $this;
    }

    /**
     * @param string $identifier
     * @return ShippingProviderInterface
     */
    public function getShipping($identifier)
    {
        if (isset($this->shippingMethods[$identifier])) {
            return $this->shippingMethods[$identifier];
        }

        throw new \InvalidArgumentException('Shipping does not exists');
    }

    public function getShippings()
    {
        return $this->shippingMethods;
    }



}

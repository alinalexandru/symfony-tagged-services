<?php
namespace Fancourier\ShippingBundle\Service;

use Innobyte\TaggedServicesDemoBundle\Shipping\ShippingProviderInterface;

/**
 * Class Shipping
 *
 * @author Alin Alexandru <alin.alexandru@innobyte.com>
 */
class Shipping implements ShippingProviderInterface
{
    public function getName()
    {
        return 'Fancourier';
    }

    public function calculateShippingCost()
    {
        return 10;
    }

    public function getIdentifier()
    {
        return 'fancourier';
    }
}

<?php

namespace Innobyte\TaggedServicesDemoBundle\TwigExtension;

/**
 * Class CustomExtension
 *
 * @author Alin Alexandru <alin.alexandru@innobyte.com>
 */
class CustomExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('formatPrice', array($this, 'formatPrice')),
        );
    }

    public function formatPrice($price)
    {
        return $price . " $";
    }
}

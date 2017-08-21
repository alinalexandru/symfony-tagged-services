<?php

namespace Innobyte\TaggedServicesDemoBundle;

use Innobyte\TaggedServicesDemoBundle\DependencyInjection\Compiler\PaymentPass;
use Innobyte\TaggedServicesDemoBundle\DependencyInjection\Compiler\ShippingPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class InnobyteTaggedServicesDemoBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new PaymentPass());
        $container->addCompilerPass(new ShippingPass());
    }
}

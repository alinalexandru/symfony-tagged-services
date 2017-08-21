<?php

namespace Innobyte\TaggedServicesDemoBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class ShippingPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('innobyte_shipping_factory')) {
            return;
        }

        $definition     = $container->getDefinition('innobyte_shipping_factory');
        // find all service IDs with the app.mail_transport tag
        $taggedServices = $container->findTaggedServiceIds('shipping.provider');

        foreach ($taggedServices as $id => $tags) {
            // add the transport service to the ChainTransport service
            $definition->addMethodCall('addShipping', array(new Reference($id)));
            $definition->addTag('symfony');
        }
    }
}

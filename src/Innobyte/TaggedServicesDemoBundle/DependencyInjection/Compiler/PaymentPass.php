<?php

namespace Innobyte\TaggedServicesDemoBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class PaymentPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('innobyte_payment_factory')) {
            return;
        }

        $definition     = $container->getDefinition('innobyte_payment_factory');
        // find all service IDs with the app.mail_transport tag
        $taggedServices = $container->findTaggedServiceIds('payment.provider');

        foreach ($taggedServices as $id => $tags) {
            // add the transport service to the ChainTransport service
            $definition->addMethodCall('addPayment', array(new Reference($id)));
        }
    }
}

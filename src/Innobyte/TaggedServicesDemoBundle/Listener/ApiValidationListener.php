<?php

namespace Innobyte\TaggedServicesDemoBundle\Listener;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

/**
 * Class ApiValidationListener
 *
 * @author Alin Alexandru <alin.alexandru@innobyte.com>
 */
class ApiValidationListener
{
    const API_KEY = 'symfony';
    const SIGNATURE_SECRET = "meetup";

    public function onKernelRequest(GetResponseEvent $event)
    {
        if (false !== strpos($event->getRequest()->getRequestUri(), "/api/")) {
            $key = $event->getRequest()->get("key");
            if ($key != self::API_KEY) {

                $event->setResponse(new JsonResponse("Unauthorized request", 403));
            }
        }
    }

    public function onKernelResponse(FilterResponseEvent $event)
    {
        $signature = md5($event->getResponse()->getContent() . self::SIGNATURE_SECRET);
        $event->getResponse()->headers->add(
            ['Api-Signature' => $signature ]
        );
    }

}

<?php

namespace Innobyte\TaggedServicesDemoBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiController extends Controller
{
    /**
     * @Route("/api/1/campaign/list", name="api_campaign_list")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function campaignsAction()
    {
        return new JsonResponse(
            [
                ["id" => 1, "name" => "Symfony"],
                ["id" => 2, "name" => "Meetup"],
            ]
        );
    }
}

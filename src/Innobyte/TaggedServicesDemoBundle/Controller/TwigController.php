<?php

namespace Innobyte\TaggedServicesDemoBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TwigController extends Controller
{
    /**
     * @Route("/twig", name="twig")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render(
            'InnobyteTaggedServicesDemoBundle:Twig:index.html.twig',
            array(
                'price' => 10
            )
        );
    }
}

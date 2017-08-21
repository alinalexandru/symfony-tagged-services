<?php

namespace Innobyte\TaggedServicesDemoBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CheckoutController extends Controller
{
    /**
     * @Route("/checkout", name="checkout")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render(
            'InnobyteTaggedServicesDemoBundle:Checkout:index.html.twig',
            array(
                'shippingMethods' => $this->get('innobyte_shipping_factory')->getShippings(),
                'paymentMethods'  => $this->get('innobyte_payment_factory')->getPayments(),
            )
        );
    }

    /**
     * @Route("/placeOrder", name="place_order")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function placeOrder(Request $request)
    {
        $shippingMethod = $request->get('shipping');
        $paymentMethod = $request->get('payment');

        $shippingCost = $this->get('innobyte_shipping_factory')->getShipping($shippingMethod)->calculateShippingCost();
        $paymentStatus = $this->get('innobyte_payment_factory')->getPayment($paymentMethod)->makePayment();

        return $this->render(
            'InnobyteTaggedServicesDemoBundle:Checkout:placeOrder.html.twig',
            array(
                'shippingCost' => $shippingCost,
                'paymentStatus' => $paymentStatus,
            )
        );
    }
}

<?php

namespace Eshop\ShopBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Suin\RSSWriter\Feed;
use Suin\RSSWriter\Channel;

class FeedController extends Controller
{ 
    /**
     * Generate the Products feed
     *
     * @Route("/feed/product", name="feed_product")
     * @Method({"GET", "POST"})
     * @Template()
     * 
     */
    public function feedProductAction()
    {
        $em = $this->getDoctrine()->getManager();
        $site = $em->getRepository('ShopBundle:Infosite')->find(1);
        $products = $em->getRepository('ShopBundle:Product')->findAll();
        
        return $this->render('ShopBundle:Feed:feedProduct.xml.twig', array(
                'site' => $site,
                'products' => $products,
            ));
    }
    
    
    /**
     * Generate the Products feed
     *
     * @Route("/feed/product/google", name="feed_product_google")
     * @Method({"GET", "POST"})
     * @Template()
     * 
     */
    public function GGfeedProductAction()
    {
        $em = $this->getDoctrine()->getManager();
        $site = $em->getRepository('ShopBundle:Infosite')->find(1);
        $products = $em->getRepository('ShopBundle:Product')->findAll();
        
        return $this->render('ShopBundle:Feed:GGfeedProduct.xml.twig', array(
                'site' => $site,
                'products' => $products,
            ));
    }
}

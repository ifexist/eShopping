<?php

namespace Eshop\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Eshop\ShopBundle\Entity\Prodexistin;

/**
 * Prodexistin controller.
 *
 * @Route("/admin/prodexistin")
 */
class ProdexistinController extends Controller
{
    /**
     * Lists all Prodexistin entities.
     *
     * @Route("/", name="admin_prodexistin")
     * @Method("GET")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        //$prodexistinRepository = $em->getRepository('ShopBundle:Prodexistin');
        
        $dql   = "SELECT prx FROM ShopBundle:Prodexistin prx";
        $query = $em->createQuery($dql);
        
        
        $limit = $this->getParameter('admin_prodexistins_pagination_count');
        $paginator  = $this->get('knp_paginator');
        
        $prodexistins = $paginator->paginate(
        $query, /* query NOT result */
        $request->query->getInt('page', 1)/*page number*/,
        $limit/*limit per page*/
    );

        return array(
            'entities' => $prodexistins,
        );
    }

    /**
     * Finds and displays a Prodexistin entity.
     *
     * @Route("/{id}", name="admin_prodexistin_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction(Prodexistin $prodexistin)
    {
        $em = $this->getDoctrine()->getManager();

        return array(
            'entity' => $prodexistin,
        );
    }

}
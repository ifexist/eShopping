<?php

namespace Eshop\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * ClassifyProductCat controller.
 *
 * @Route("/admin/category/products/classification")
 */
class ClassifyProductCatController extends Controller
{
    /**
     * Lists all Google product classification entities.
     *
     * @Route("/google", name="admin_category_products_classification_google")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function googleCategoryProductsAction(Request $request)
    {
        $locale = $request->getLocale();
        $em = $this->getDoctrine()->getManager();
        // On récupère le repository
        $reposAllCat = $em->getRepository('ShopBundle:GProductcat'.$locale);
        $reposOneCat = $em->getRepository('ShopBundle:GProductcat1'.$locale);
        
        if($request->request->get('catname') != ""){
            $catname = $request->request->get('catname');
            // On récupère les docs qu'il faut grâce à findBy() :
            $gproductcatall = $reposAllCat->findBy(
                array('enable' => 1, 'cat1' => $catname),                 // Pas de critère
                array()
            );
        }else{
            $catname = "";
            // On récupère les docs qu'il faut grâce à findBy() :
            $gproductcatall = $reposAllCat->findBy(
                array('enable' => 1),                 // Pas de critère
                array()
            );
        }
        // On récupère les docs qu'il faut grâce à findBy() :
        $gproductcatone = $reposOneCat->findBy(
            array('enable' => 1),                 // Pas de critère
            array()
        );

        return array(
            'entities' => $gproductcatall,
            'onecats' => $gproductcatone,
            'catname' => $catname
        );
    }
}

<?php

namespace Eshop\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Eshop\ShopBundle\Entity\Infositemetas;

/**
 * Infositemetas controller.
 *
 * @Route("/admin/infositemetas")
 */
class InfositemetasController extends Controller
{
    /**
     * Lists all Infositemetas entities.
     *
     * @Route("/", name="admin_infositemetas")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $Infositemetas = new Infositemetas();
        $em = $this->getDoctrine()->getManager();
        $infositemetas = $em->getRepository('ShopBundle:Infositemetas')->findOneBy(array(
            'id' => 1
        ));
        
        if(count($infositemetas) > 0){
            return $this->redirectToRoute('admin_infositemetas_edit', array('id' => 1));
        }else{
            $Infositemetas->getId(1);
            $em->persist($Infositemetas);
            $em->flush();

            return $this->redirectToRoute('admin_infositemetas_edit', array('id' => $Infositemetas->getId()));
        }

        return array(
            'entities' => $infositemetas,
        );
    }

    /**
     * Displays a form to create a new Infositemetas entity.
     *
     * @Route("/new", name="admin_infositemetas_new")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $oneInfositemetas = $em->getRepository('ShopBundle:Infositemetas')->findOneBy(array(
            'id' => 1
        ));
        
        if(count($oneInfositemetas) > 0){
            return $this->redirectToRoute('admin_infositemetas_edit', array('id' => 1));
        }
        $infositemetas = new Infositemetas();
        $form = $this->createForm('Eshop\ShopBundle\Form\Type\InfositemetasType', $infositemetas);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $infositemetas->setMetaContentlanguage($request->get('langcode'));
            $em->persist($infositemetas);
            $em->flush();

            return $this->redirectToRoute('admin_infositemetas_edit', array('id' => $infositemetas->getId()));
        }

        return array(
            'entity' => $infositemetas,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a Infositemetas entity.
     *
     * @Route("/{id}", name="admin_infositemetas_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction(Infositemetas $infositemetas)
    {
        return array(
            'entity' => $infositemetas,
        );
    }

    /**
     * Displays a form to edit an existing Infositemetas entity.
     *
     * @Route("/{id}/edit", name="admin_infositemetas_edit")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function editAction(Request $request, Infositemetas $infositemetas)
    {
        $em = $this->getDoctrine()->getManager();
        
        $langs = $em->getRepository('ShopBundle:Langs')->findBy(
            array(),  
            array('code' => 'DESC')
        );
        
        $editForm = $this->createForm('Eshop\ShopBundle\Form\Type\InfositemetasType', $infositemetas);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em->persist($infositemetas);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'notice',
                'Your changes were saved!'
            );

            return $this->redirectToRoute('admin_infositemetas_edit', array('id' => $infositemetas->getId()));
        }

        return array(
            'entity' => $infositemetas,
            'langs' => $langs,
            'edit_form' => $editForm->createView(),
        );
    }
}

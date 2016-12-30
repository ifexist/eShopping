<?php

namespace Eshop\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Eshop\ShopBundle\Entity\Prodcolor;

/**
 * Prodcolor controller.
 *
 * @Route("/admin/prodcolor")
 */
class ProdcolorController extends Controller
{
    /**
     * Lists all Prodcolor entities.
     *
     * @Route("/", name="admin_prodcolor")
     * @Method("GET")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        //$prodcolorRepository = $em->getRepository('ShopBundle:Prodcolor');
        
        $dql   = "SELECT prc FROM ShopBundle:Prodcolor prc";
        $query = $em->createQuery($dql);
        
        
        $limit = $this->getParameter('admin_prodcolors_pagination_count');
        $paginator  = $this->get('knp_paginator');
        
        $prodcolors = $paginator->paginate(
        $query, /* query NOT result */
        $request->query->getInt('page', 1)/*page number*/,
        $limit/*limit per page*/
    );

        return array(
            'entities' => $prodcolors,
        );
    }

    /**
     * Displays a form to create a new Prodcolor entity.
     *
     * @Route("/new", name="admin_prodcolor_new")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $prodcolors = $em->getRepository('ShopBundle:Prodcolor')->findAll();
        $prodcolor = new Prodcolor();
        
        $form = $this->createForm('Eshop\ShopBundle\Form\Type\ProdcolorType', $prodcolor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($prodcolor);
            $em->flush();

            return $this->redirectToRoute('admin_prodcolor_show', array('id' => $prodcolor->getId()));
        }

        return array(
            'entity' => $prodcolors,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a Prodcolor entity.
     *
     * @Route("/{id}", name="admin_prodcolor_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction(Prodcolor $prodcolor)
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('ShopBundle:Category')->findBy(array(
            'parent' => $prodcolor->getId(),
        ));
        $cntCategories = COUNT($categories);
        
        $deleteForm = $this->createDeleteForm($prodcolor);

        return array(
            'entity' => $prodcolor,
            'cntCategories' => $cntCategories,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an prodcolorg Prodcolor entity.
     *
     * @Route("/{id}/edit", name="admin_prodcolor_edit")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function editAction(Request $request, Prodcolor $prodcolor)
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('ShopBundle:Category')->findBy(array(
            'parent' => $prodcolor->getId(),
        ));
        $cntCategories = COUNT($categories);
        
        $deleteForm = $this->createDeleteForm($prodcolor);
        $editForm = $this->createForm('Eshop\ShopBundle\Form\Type\ProdcolorType', $prodcolor);
        $editForm->handleRequest($request);
        

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            
            $em->persist($prodcolor);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'notice',
                'Your changes were saved!'
            );

            return $this->redirectToRoute('admin_prodcolor_show', array('id' => $prodcolor->getId()));
        }

        return array(
            'entity' => $prodcolor,
            'cntCategories' => $cntCategories,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Prodcolor entity.
     *
     * @Route("/{id}", name="admin_prodcolor_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Prodcolor $prodcolor)
    {
        $form = $this->createDeleteForm($prodcolor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($prodcolor);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_prodcolor'));
    }

    /**
     * Creates a form to delete a Prodcolor entity by id.
     *
     * @param Prodcolor $prodcolor The Prodcolor entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Prodcolor $prodcolor)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_prodcolor_delete', array('id' => $prodcolor->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
<?php

namespace Eshop\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Eshop\ShopBundle\Entity\Prodsize;

/**
 * Prodsize controller.
 *
 * @Route("/admin/prodsize")
 */
class ProdsizeController extends Controller
{
    /**
     * Lists all Prodsize entities.
     *
     * @Route("/", name="admin_prodsize")
     * @Method("GET")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        //$prodsizeRepository = $em->getRepository('ShopBundle:Prodsize');
        
        $dql   = "SELECT prs FROM ShopBundle:Prodsize prs";
        $query = $em->createQuery($dql);
        
        
        $limit = $this->getParameter('admin_prodsizes_pagination_count');
        $paginator  = $this->get('knp_paginator');
        
        $prodsizes = $paginator->paginate(
        $query, /* query NOT result */
        $request->query->getInt('page', 1)/*page number*/,
        $limit/*limit per page*/
    );

        return array(
            'entities' => $prodsizes,
        );
    }

    /**
     * Displays a form to create a new Prodsize entity.
     *
     * @Route("/new", name="admin_prodsize_new")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $prodsizes = $em->getRepository('ShopBundle:Prodsize')->findAll();
        $prodsize = new Prodsize();
        
        $form = $this->createForm('Eshop\ShopBundle\Form\Type\ProdsizeType', $prodsize);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($prodsize);
            $em->flush();

            return $this->redirectToRoute('admin_prodsize_show', array('id' => $prodsize->getId()));
        }

        return array(
            'entity' => $prodsizes,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a Prodsize entity.
     *
     * @Route("/{id}", name="admin_prodsize_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction(Prodsize $prodsize)
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('ShopBundle:Category')->findBy(array(
            'parent' => $prodsize->getId(),
        ));
        $cntCategories = COUNT($categories);
        
        $deleteForm = $this->createDeleteForm($prodsize);

        return array(
            'entity' => $prodsize,
            'cntCategories' => $cntCategories,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an prodsizeg Prodsize entity.
     *
     * @Route("/{id}/edit", name="admin_prodsize_edit")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function editAction(Request $request, Prodsize $prodsize)
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('ShopBundle:Category')->findBy(array(
            'parent' => $prodsize->getId(),
        ));
        $cntCategories = COUNT($categories);
        
        $deleteForm = $this->createDeleteForm($prodsize);
        $editForm = $this->createForm('Eshop\ShopBundle\Form\Type\ProdsizeType', $prodsize);
        $editForm->handleRequest($request);
        

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            
            $em->persist($prodsize);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'notice',
                'Your changes were saved!'
            );

            return $this->redirectToRoute('admin_prodsize_show', array('id' => $prodsize->getId()));
        }

        return array(
            'entity' => $prodsize,
            'cntCategories' => $cntCategories,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Prodsize entity.
     *
     * @Route("/{id}", name="admin_prodsize_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Prodsize $prodsize)
    {
        $form = $this->createDeleteForm($prodsize);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($prodsize);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_prodsize'));
    }

    /**
     * Creates a form to delete a Prodsize entity by id.
     *
     * @param Prodsize $prodsize The Prodsize entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Prodsize $prodsize)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_prodsize_delete', array('id' => $prodsize->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
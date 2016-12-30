<?php

namespace Eshop\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Eshop\ShopBundle\Entity\Catparent;

/**
 * Catparent controller.
 *
 * @Route("/admin/catparent")
 */
class CatparentController extends Controller
{
    /**
     * Lists all Catparent entities.
     *
     * @Route("/", name="admin_catparent")
     * @Method("GET")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        //$catparentRepository = $em->getRepository('ShopBundle:Catparent');
        
        $dql   = "SELECT pc FROM ShopBundle:Catparent pc";
        $query = $em->createQuery($dql);
        
        
        $limit = $this->getParameter('admin_catparents_pagination_count');
        $paginator  = $this->get('knp_paginator');
        
        $catparents = $paginator->paginate(
        $query, /* query NOT result */
        $request->query->getInt('page', 1)/*page number*/,
        $limit/*limit per page*/
    );

        return array(
            'entities' => $catparents,
        );
    }

    /**
     * Displays a form to create a new Catparent entity.
     *
     * @Route("/new", name="admin_catparent_new")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $catparents = $em->getRepository('ShopBundle:Catparent')->findAll();
        $catparent = new Catparent();
        
        $form = $this->createForm('Eshop\ShopBundle\Form\Type\CatparentType', $catparent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($catparent);
            $em->flush();

            return $this->redirectToRoute('admin_catparent_show', array('id' => $catparent->getId()));
        }

        return array(
            'entity' => $catparents,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a Catparent entity.
     *
     * @Route("/{id}", name="admin_catparent_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction(Catparent $catparent)
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('ShopBundle:Category')->findBy(array(
            'parent' => $catparent->getId(),
        ));
        $cntCategories = COUNT($categories);
        
        $deleteForm = $this->createDeleteForm($catparent);

        return array(
            'entity' => $catparent,
            'cntCategories' => $cntCategories,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Catparent entity.
     *
     * @Route("/{id}/edit", name="admin_catparent_edit")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function editAction(Request $request, Catparent $catparent)
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('ShopBundle:Category')->findBy(array(
            'parent' => $catparent->getId(),
        ));
        $cntCategories = COUNT($categories);
        
        $deleteForm = $this->createDeleteForm($catparent);
        $editForm = $this->createForm('Eshop\ShopBundle\Form\Type\CatparentType', $catparent);
        $editForm->handleRequest($request);
        

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            
            $em->persist($catparent);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'notice',
                'Your changes were saved!'
            );

            return $this->redirectToRoute('admin_catparent_show', array('id' => $catparent->getId()));
        }

        return array(
            'entity' => $catparent,
            'cntCategories' => $cntCategories,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Catparent entity.
     *
     * @Route("/{id}", name="admin_catparent_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Catparent $catparent)
    {
        $form = $this->createDeleteForm($catparent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($catparent);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_catparent'));
    }

    /**
     * Creates a form to delete a Catparent entity by id.
     *
     * @param Catparent $catparent The Catparent entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Catparent $catparent)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_catparent_delete', array('id' => $catparent->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
<?php

namespace Eshop\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Eshop\ShopBundle\Entity\Category;


/**
 * Category controller.
 *
 * @Route("/admin/category")
 */
class CategoryController extends Controller
{
    /**
     * Lists all Category entities.
     *
     * @Route("/", name="admin_category")
     * @Method("GET")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $categoryRepository = $em->getRepository('ShopBundle:Category');
        $catparents = $em->getRepository('ShopBundle:Catparent')->findAll();
        $paginator = $this->get('knp_paginator');

        $qb = $categoryRepository->getAllCategoriesAdminQB();
        $limit = $this->getParameter('admin_categories_pagination_count');

        $categories = $paginator->paginate(
            $qb,
            $request->query->getInt('page', 1),
            $limit
        );

        return array(
            'entities' => $categories,
            'catparents' => $catparents
        );
    }

    /**
     * Displays a form to create a new Category entity.
     *
     * @Route("/new", name="admin_category_new")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $catparents = $em->getRepository('ShopBundle:Catparent')->findAll();
        $cntCatparents = COUNT($catparents);
        if($cntCatparents < 1){
            return $this->redirectToRoute('admin_catparent_new');
        }
        $category = new Category();
        
        $form = $this->createForm('Eshop\ShopBundle\Form\Type\CategoryType', $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($category);
            $em->flush();

            return $this->redirectToRoute('admin_category_show', array('id' => $category->getId()));
        }

        return array(
            'entity' => $category,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a Category entity.
     *
     * @Route("/{id}", name="admin_category_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction(Category $category)
    {
        $em = $this->getDoctrine()->getManager();
        $prods = $em->getRepository('ShopBundle:Product')->findBy(array(
            'category' => $category->getId(),
        ));
        $cntProds = COUNT($prods);
        
        $deleteForm = $this->createDeleteForm($category);

        return array(
            'entity' => $category,
            'cntProds' => $cntProds,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Category entity.
     *
     * @Route("/{id}/edit", name="admin_category_edit")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function editAction(Request $request, Category $category)
    {
        $em = $this->getDoctrine()->getManager();
        $prods = $em->getRepository('ShopBundle:Product')->findBy(array(
            'category' => $category->getId(),
        ));
        $cntProds = COUNT($prods);
        
        $deleteForm = $this->createDeleteForm($category);
        $editForm = $this->createForm('Eshop\ShopBundle\Form\Type\CategoryType', $category);
        $editForm->handleRequest($request);
        

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            if ($editForm->get('file')->getData() !== null) { // if any file was updated
                $file = $editForm->get('file')->getData();
                $category->removeUpload(); // remove old file, see this at the bottom
                $category->setPath(($file->getClientOriginalName())); // set Image Path because preUpload and upload method will not be called if any doctrine entity will not be changed. It tooks me long time to learn it too.
            }
            
            $em->persist($category);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'notice',
                'Your changes were saved!'
            );

            return $this->redirectToRoute('admin_category_show', array('id' => $category->getId()));
        }

        return array(
            'entity' => $category,
            'cntProds' => $cntProds,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Category entity.
     *
     * @Route("/{id}", name="admin_category_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Category $category)
    {
        $form = $this->createDeleteForm($category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($category);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_category'));
    }

    /**
     * Creates a form to delete a Category entity by id.
     *
     * @param Category $category The Category entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Category $category)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_category_delete', array('id' => $category->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

}
<?php

namespace Eshop\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Eshop\ShopBundle\Entity\EmailData;

/**
 * EmailData controller.
 *
 * @Route("/admin/email/data")
 */
class EmailDataController extends Controller
{
    /**
     * Lists all EmailData entities.
     *
     * @Route("/", name="admin_email_data")
     * @Method("GET")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $emaildataRepository = $em->getRepository('ShopBundle:EmailData');
        
        $paginator = $this->get('knp_paginator');

        $qb = $emaildataRepository->getAllEmailDatasAdminQB();
        $limit = $this->getParameter('admin_email_datas_pagination_count');

        $emaildatas = $paginator->paginate(
            $qb,
            $request->query->getInt('page', 1),
            $limit
        );

        $totalEmailDatas = count($qb);
        
        if($totalEmailDatas < 1){
            return $this->redirectToRoute('admin_email_data_new');
        }
        
        return array(
            'entities' => $emaildatas,
            'total' => $totalEmailDatas
        );
    }

    /**
     * Displays a form to create a new EmailData entity.
     *
     * @Route("/new", name="admin_email_data_new")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function newAction(Request $request)
    {
        $emaildata = new EmailData();
        $form = $this->createForm('Eshop\ShopBundle\Form\Type\EmailDataType', $emaildata);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($emaildata);
            $em->flush();

            return $this->redirectToRoute('admin_email_data_show', array('id' => $emaildata->getId()));
        }

        return array(
            'entity' => $emaildata,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a EmailData entity.
     *
     * @Route("/{id}", name="admin_email_data_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction(EmailData $emaildata)
    {
        $deleteForm = $this->createDeleteForm($emaildata);

        return array(
            'entity' => $emaildata,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing EmailData entity.
     *
     * @Route("/{id}/edit", name="admin_email_data_edit")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function editAction(Request $request, EmailData $emaildata)
    {
        $deleteForm = $this->createDeleteForm($emaildata);
        $editForm = $this->createForm('Eshop\ShopBundle\Form\Type\EmailDataType', $emaildata);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($emaildata);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'notice',
                'Your changes were saved!'
            );

            return $this->redirectToRoute('admin_email_data_edit', array('id' => $emaildata->getId()));
        }

        return array(
            'entity' => $emaildata,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a EmailData entity.
     *
     * @Route("/{id}", name="admin_email_data_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, EmailData $emaildata)
    {
        $form = $this->createDeleteForm($emaildata);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($emaildata);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_email_data'));
    }

    /**
     * Creates a form to delete a EmailData entity by id.
     *
     * @param EmailData $emaildata The EmailData entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EmailData $emaildata)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_email_data_delete', array('id' => $emaildata->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}

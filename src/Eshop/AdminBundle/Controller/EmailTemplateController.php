<?php

namespace Eshop\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Eshop\ShopBundle\Entity\EmailTemplate;

/**
 * EmailTemplate controller.
 *
 * @Route("/admin/email/template")
 */
class EmailTemplateController extends Controller
{
    /**
     * Lists all EmailTemplate entities.
     *
     * @Route("/", name="admin_email_template")
     * @Method("GET")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $emailtemplateRepository = $em->getRepository('ShopBundle:EmailTemplate');
        
        $paginator = $this->get('knp_paginator');

        $qb = $emailtemplateRepository->getAllEmailTemplatesAdminQB();
        $limit = $this->getParameter('admin_email_templates_pagination_count');

        $emailtemplates = $paginator->paginate(
            $qb,
            $request->query->getInt('page', 1),
            $limit
        );

        $totalEmailTemplates = count($qb);
        
        if($totalEmailTemplates < 1){
            return $this->redirectToRoute('admin_email_template_new');
        }
        
        return array(
            'entities' => $emailtemplates,
            'total' => $totalEmailTemplates
        );
    }

    /**
     * Displays a form to create a new EmailTemplate entity.
     *
     * @Route("/new", name="admin_email_template_new")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function newAction(Request $request)
    {
        $emailtemplate = new EmailTemplate();
        $form = $this->createForm('Eshop\ShopBundle\Form\Type\EmailTemplateType', $emailtemplate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($emailtemplate);
            $em->flush();

            return $this->redirectToRoute('admin_email_template_show', array('id' => $emailtemplate->getId()));
        }

        return array(
            'entity' => $emailtemplate,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a EmailTemplate entity.
     *
     * @Route("/{id}", name="admin_email_template_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction(EmailTemplate $emailtemplate)
    {
        $deleteForm = $this->createDeleteForm($emailtemplate);

        return array(
            'entity' => $emailtemplate,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing EmailTemplate entity.
     *
     * @Route("/{id}/edit", name="admin_email_template_edit")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function editAction(Request $request, EmailTemplate $emailtemplate)
    {
        $deleteForm = $this->createDeleteForm($emailtemplate);
        $editForm = $this->createForm('Eshop\ShopBundle\Form\Type\EmailTemplateType', $emailtemplate);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($emailtemplate);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'notice',
                'Your changes were saved!'
            );

            return $this->redirectToRoute('admin_email_template_edit', array('id' => $emailtemplate->getId()));
        }

        return array(
            'entity' => $emailtemplate,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a EmailTemplate entity.
     *
     * @Route("/{id}", name="admin_email_template_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, EmailTemplate $emailtemplate)
    {
        $form = $this->createDeleteForm($emailtemplate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($emailtemplate);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_email_template'));
    }

    /**
     * Creates a form to delete a EmailTemplate entity by id.
     *
     * @param EmailTemplate $emailtemplate The EmailTemplate entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EmailTemplate $emailtemplate)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_email_template_delete', array('id' => $emailtemplate->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}

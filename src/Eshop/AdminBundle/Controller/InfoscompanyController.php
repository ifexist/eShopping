<?php

namespace Eshop\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Eshop\ShopBundle\Entity\Infoscompany;

/**
 * Infoscompany controller.
 *
 * @Route("/admin/infoscompany")
 */
class InfoscompanyController extends Controller
{
    /**
     * Lists all Infoscompany entities.
     *
     * @Route("/", name="admin_infoscompany")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $infoscompany = new Infoscompany();
        $em = $this->getDoctrine()->getManager();
        $oneInfoscompany = $em->getRepository('ShopBundle:Infoscompany')->findOneBy(array(
            'id' => 1
        ));
        
        if(count($oneInfoscompany) > 0){
            return $this->redirectToRoute('admin_infoscompany_edit', array('id' => 1));
        }else{
            $infoscompany->getId(1);
            $infoscompany->setAdded(time());
            $em->persist($infoscompany);
            $em->flush();

            return $this->redirectToRoute('admin_infoscompany_edit', array('id' => $infoscompany->getId()));
        }

        return array(
            'entities' => $infoscompany,
        );
    }
    
    /**
     * Finds and displays a Infoscompany entity.
     *
     * @Route("/{id}", name="admin_infoscompany_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction(Infoscompany $infoscompany)
    {
        $deleteForm = $this->createDeleteForm($infoscompany);

        return array(
            'entity' => $infoscompany,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Infoscompany entity.
     *
     * @Route("/{id}/edit", name="admin_infoscompany_edit")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function editAction(Request $request, Infoscompany $infoscompany)
    {
        $em = $this->getDoctrine()->getManager();
        
        $currencies = $em->getRepository('ShopBundle:Currency')->findBy(
            array(),                 // Pas de critère
            array('code' => 'asc')
        );
        
        $deleteForm = $this->createDeleteForm($infoscompany);
        $editForm = $this->createForm('Eshop\ShopBundle\Form\Type\InfoscompanyType', $infoscompany);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($infoscompany);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'notice',
                'Your changes were saved!'
            );

            return $this->redirectToRoute('admin_infoscompany_edit', array('id' => $infoscompany->getId()));
        }

        return array(
            'entity' => $infoscompany,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Infoscompany entity.
     *
     * @Route("/{id}", name="admin_infoscompany_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Infoscompany $infoscompany)
    {
        $form = $this->createDeleteForm($infoscompany);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($infoscompany);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_infoscompany'));
    }

    /**
     * Creates a form to delete a Infoscompany entity by id.
     *
     * @param Infoscompany $infoscompany The Infoscompany entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Infoscompany $infoscompany)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_infoscompany_delete', array('id' => $infoscompany->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}

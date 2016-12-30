<?php

namespace Eshop\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Eshop\ShopBundle\Entity\Infositelinks;

/**
 * Infositelinks controller.
 *
 * @Route("/admin/infositelinks")
 */
class InfositelinksController extends Controller
{
    /**
     * Lists all Infositelinks entities.
     *
     * @Route("/", name="admin_infositelinks")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $Infositelinks = new Infositelinks();
        $em = $this->getDoctrine()->getManager();
        $infositelinks = $em->getRepository('ShopBundle:Infositelinks')->findOneBy(array(
            'id' => 1
        ));
        
        if(count($infositelinks) > 0){
            return $this->redirectToRoute('admin_infositelinks_edit', array('id' => 1));
        }else{
            $Infositelinks->getId(1);
            $em->persist($Infositelinks);
            $em->flush();

            return $this->redirectToRoute('admin_infositelinks_edit', array('id' => $Infositelinks->getId()));
        }

        return array(
            'entities' => $infositelinks,
        );
    }

    /**
     * Displays a form to create a new Infositelinks entity.
     *
     * @Route("/new", name="admin_infositelinks_new")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $medias = $em->getRepository('ShopBundle:TagTerms')->findBy(
                array('enable' => 1, 'cid' => 23),
                array('name' => 'asc')
                
        );
        
        $oneInfositelinks = $em->getRepository('ShopBundle:Infositelinks')->findOneBy(array(
            'id' => 1
        ));
        
        if(count($oneInfositelinks) > 0){
            return $this->redirectToRoute('admin_infositelinks_edit', array('id' => 1));
        }
        $infositelinks = new Infositelinks();
        $form = $this->createForm('Eshop\ShopBundle\Form\Type\InfositelinksType', $infositelinks);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $infositelinks->setMediatitle1($request->get('mediatitle1'));
            $infositelinks->setMediatitle2($request->get('mediatitle2'));
            $infositelinks->setMediatitle3($request->get('mediatitle3'));
            $infositelinks->setMediatitle4($request->get('mediatitle4'));
            $infositelinks->setMediatitle5($request->get('mediatitle5'));
            $infositelinks->setMediatitle6($request->get('mediatitle6'));
            $infositelinks->setMediatitle7($request->get('mediatitle7'));
            $infositelinks->setMediatitle8($request->get('mediatitle8'));
            $infositelinks->setMediatitle9($request->get('mediatitle9'));
            $infositelinks->setMediatitle10($request->get('mediatitle10'));
            $em->persist($infositelinks);
            $em->flush();

            return $this->redirectToRoute('admin_infositelinks_show', array('id' => $infositelinks->getId()));
        }

        return array(
            'entity' => $infositelinks,
            'medias' => $medias,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a Infositelinks entity.
     *
     * @Route("/{id}", name="admin_infositelinks_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction(Infositelinks $infositelinks)
    {
        $em = $this->getDoctrine()->getManager();
        
        $medias = $em->getRepository('ShopBundle:TagTerms')->findBy(
                array('enable' => 1, 'cid' => 23),
                array('name' => 'asc')
                
        );
        
        $deleteForm = $this->createDeleteForm($infositelinks);

        return array(
            'entity' => $infositelinks,
            'medias' => $medias,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Infositelinks entity.
     *
     * @Route("/{id}/edit", name="admin_infositelinks_edit")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function editAction(Request $request, Infositelinks $infositelinks)
    {
        $em = $this->getDoctrine()->getManager();
        
        $medias = $em->getRepository('ShopBundle:TagTerms')->findBy(
                array('enable' => 1, 'cid' => 23),
                array('name' => 'asc')
                
        );
        
        
        $deleteForm = $this->createDeleteForm($infositelinks);
        $editForm = $this->createForm('Eshop\ShopBundle\Form\Type\InfositelinksType', $infositelinks);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $infositelinks->setMediatitle1($request->get('mediatitle1'));
            $infositelinks->setMediatitle2($request->get('mediatitle2'));
            $infositelinks->setMediatitle3($request->get('mediatitle3'));
            $infositelinks->setMediatitle4($request->get('mediatitle4'));
            $infositelinks->setMediatitle5($request->get('mediatitle5'));
            $infositelinks->setMediatitle6($request->get('mediatitle6'));
            $infositelinks->setMediatitle7($request->get('mediatitle7'));
            $infositelinks->setMediatitle8($request->get('mediatitle8'));
            $infositelinks->setMediatitle9($request->get('mediatitle9'));
            $infositelinks->setMediatitle10($request->get('mediatitle10'));
            $em->persist($infositelinks);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'notice',
                'Your changes were saved!'
            );

            return $this->redirectToRoute('admin_infositelinks_edit', array('id' => $infositelinks->getId()));
        }

        return array(
            'entity' => $infositelinks,
            'medias' => $medias,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Infositelinks entity.
     *
     * @Route("/{id}", name="admin_infositelinks_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Infositelinks $infositelinks)
    {
        $form = $this->createDeleteForm($infositelinks);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($infositelinks);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_infositelinks'));
    }

    /**
     * Creates a form to delete a Infositelinks entity by id.
     *
     * @param Infositelinks $infositelinks The Infositelinks entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Infositelinks $infositelinks)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_infositelinks_delete', array('id' => $infositelinks->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}

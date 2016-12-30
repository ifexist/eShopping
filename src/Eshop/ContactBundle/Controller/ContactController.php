<?php

namespace Eshop\ContactBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Eshop\ContactBundle\Entity\Contact;

/**
 * Contact controller.
 *
 * @Route("/message")
 */
class ContactController extends Controller
{
    /**
     * Displays a form to create a new Contact entity.
     *
     * @Route("/sending", name="message_sending")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $contact = new Contact();
        $form = $this->createForm('Eshop\ContactBundle\Form\Type\ContactType', $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $em->persist($contact);
            $em->flush();

            return $this->redirectToRoute('message_confirm', array('id' => $contact->getId()));
        }

        return array(
            'entity' => $contact,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a Contact entity.
     *
     * @Route("confirm/{id}", name="message_confirm")
     * @Method("GET")
     * @Template()
     */
    public function showAction(Contact $contact)
    {
        return array(
            'entity' => $contact,
        );
    }

}

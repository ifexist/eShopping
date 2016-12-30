<?php

namespace Eshop\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use FOS\UserBundle\Controller\ProfileController as BaseController;
/**
 * Profile controller.
 *
 * @Route("/user/profile")
 */
class ProfileController extends BaseController
{

    /**
     * Finds and displays a Profile entity.
     *
     * @Route("/show", name="user_profile_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction()
    {
        $em = $this->getDoctrine()->getManager();
        if( ! $this->get('security.context')->isGranted("IS_AUTHENTICATED_REMEMBERED") )
        {
            // Sinon on déclenche une exception "Accès Interdit"
            return $this->redirect($this->generateUrl('user_profile_restriction'));
        }
        $usr = $this->get('security.context')->getToken()->getUser();
        $userid = $usr->getId();
        $profile = $em->getRepository('UserBundle:User')->find($userid);

        return array(
            'entity' => $profile,
        );
    }

    /**
     * Displays a form to edit an existing Profile entity.
     *
     * @Route("/edit", name="user_profile_edit")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function editAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        if( ! $this->get('security.context')->isGranted("IS_AUTHENTICATED_REMEMBERED") )
        {
            // Sinon on déclenche une exception "Accès Interdit"
            return $this->redirect($this->generateUrl('user_profile_restriction'));
        }
        $usr = $this->get('security.context')->getToken()->getUser();
        $userid = $usr->getId();
        $useremail = $usr->getEmail();
        
        $profile = $em->getRepository('UserBundle:User')->find($userid);
        
        $editForm = $this->createForm('Eshop\UserBundle\Form\Type\ProfileFormType', $profile);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            
            $oneUserEmail = $em->getRepository('UserBundle:User')->findOneBy(array(
                'email' => $request->get('email'),
            ));

            $cntEmail = COUNT($oneUserEmail);
            
            if($cntEmail > 0 && $userid != $oneUserEmail->getId()){
                $msgEmail = "profile.error.email";
                return $this->redirectToRoute('user_profile_edit', array(
                    'msgEmail' => $msgEmail
                ));
            }else{
                $em->persist($profile);
                $em->flush();
                $this->get('session')->getFlashBag()->add(
                    'notice',
                    'Your changes were saved!'
                );
                $msgEmail = "";
                return $this->redirectToRoute('user_profile_show');
            }
        }
        
        $msgEmail = "";
        return array(
            'entity' => $profile,
            'msgEmail' => $msgEmail,
            'form' => $editForm->createView(),
        );
    }
    /**
     * Finds and displays a Profile entity.
     *
     * @Route("/", name="user_profile_restriction")
     * @Method("GET")
     * @Template()
     */
    public function restrictionAction()
    {
        return array();
    }

}

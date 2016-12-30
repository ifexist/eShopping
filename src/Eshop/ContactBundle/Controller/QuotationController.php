<?php

namespace Eshop\ContactBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Eshop\ContactBundle\Entity\Quotation;

/**
 * Quotation controller.
 *
 * @Route("/quotation")
 */
class QuotationController extends Controller
{
    /**
     * Displays a form to create a new Quotation entity.
     *
     * @Route("/demand", name="quotation_demand")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $web_dir = $_SERVER['DOCUMENT_ROOT'];
        $em = $this->getDoctrine()->getManager();
        $quotRepo = $em->getRepository('ContactBundle:Quotation');
        $langs = $em->getRepository('ShopBundle:Langs')->findBy(array(
            'enable' => 1
        ));
        $quotation = new Quotation();
        $form = $this->createForm('Eshop\ContactBundle\Form\Type\QuotationType', $quotation);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $quotEmail = $request->request->get('email');
            $quotTypesite = $request->request->get('typesite');
            $listQuots = $quotRepo->findBy(
                    array('email' => $quotEmail, 'typesite' => $quotTypesite),
                    array()
            );

            $cntListQuots = count($listQuots);
            
            if($cntListQuots > 0){
                return $this->redirectToRoute('quotation_exists', array('id' => $quotation->getId()));
            }
            
            $quotation->setLang($request->get('lang'));
            $em->persist($quotation);
            $em->flush();
            
            return $this->redirectToRoute('quotation_confirm', array('id' => $quotation->getId()));

        }

        return array(
            'entity' => $quotation,
            'langs' => $langs,
            'web_dir' => $web_dir,
            'mailto' => $this->getParameter('mailer_user'),
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a Quotation entity.
     *
     * @Route("/demand/verify/{id}", name="quotation_verify")
     * @Method("GET")
     * @Template()
     */
    public function verifyAction(Quotation $quotation, Request $request)
    {
        $web_dir = $_SERVER['DOCUMENT_ROOT'];
        
        $mailTo = $this->getParameter('mailer_user');
        
        if($request->get('verify') != "" && $request->get('verify') == "y"){
            $mailer = $this->get('mailer');
            $message = \Swift_Message::newInstance();
            $message->setSubject($quotation->getSubject());
            $message->setFrom($quotation->getEmail());
            $message->setTo($mailTo);
            // pour envoyer le message en HTML
            $message->setBody('<h4>One free quoat is requested on<h4>');
            // pour envoyer le message en HTML
            $message->setBody('<p>One free quoat</p>','text/html'); 
            //envoi du message
            $mailer->send($message);
            
            return $this->redirectToRoute('quotation_confirm', array('id' => $quotation->getId()));
        }
        return array(
            'entity' => $quotation,
            'web_dir' => $web_dir,
            'mailto' => $mailTo
        );
    }

    /**
     * Finds and displays a Quotation entity.
     *
     * @Route("/demand/confirm/{id}", name="quotation_confirm")
     * @Method("GET")
     * @Template()
     */
    public function confirmAction(Quotation $quotation)
    {
        $web_dir = $_SERVER['DOCUMENT_ROOT'];

        return array(
            'entity' => $quotation,
            'web_dir' => $web_dir
        );
    }

    /**
     * Finds and displays a Quotation entity.
     *
     * @Route("/demand/exists/{id}", name="quotation_exists")
     * @Method("GET")
     * @Template()
     */
    public function existsAction(Quotation $quotation)
    {
        $web_dir = $_SERVER['DOCUMENT_ROOT'];

        return array(
            'entity' => $quotation,
            'web_dir' => $web_dir
        );
    }
    

}

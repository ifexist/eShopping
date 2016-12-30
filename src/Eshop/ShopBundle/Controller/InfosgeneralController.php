<?php

namespace Eshop\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class InfosgeneralController extends Controller
{  
    /**
     * render infoscompany
     */
    public function infoscompanyAction()
    {
        $em = $this->getDoctrine()->getManager();
        $ifgInfoscompany = $em->getRepository('ShopBundle:Infoscompany')->find(1);

        return $this->render('ShopBundle:Infosgeneral:infoscompany.html.twig',
            array('ifgInfoscompany' => $ifgInfoscompany));
    }
    
    /**
     * render infosite contact
     */
    public function infositeContactAction()
    {
        $em = $this->getDoctrine()->getManager();
        $ifgSiteContact = $em->getRepository('ShopBundle:Infosite')->find(1);
        $cntIfgSiteContact = COUNT($ifgSiteContact);
        return $this->render('ShopBundle:Infosgeneral:infositeContact.html.twig', array(
                'ifgSiteContact' => $ifgSiteContact,
                'cntIfgSiteContact' => $cntIfgSiteContact,
            ));
    }
    

    
    /**
     * render infosite contact footer
     */
    public function infositeContactFooterAction()
    {
        $em = $this->getDoctrine()->getManager();
        $ifgSiteContactFooter = $em->getRepository('ShopBundle:Infosite')->find(1);
        $cntIfgSiteContactFooter = COUNT($ifgSiteContactFooter);
        
        
        return $this->render('ShopBundle:Infosgeneral:infositeContactFooter.html.twig', array(
                'ifgSiteContactFooter' => $ifgSiteContactFooter,
                'cntIfgSiteContactFooter' => $cntIfgSiteContactFooter,
            ));
    }
    
    /**
     * render sitelinks
     */
    public function sitelinksAction()
    {
        $em = $this->getDoctrine()->getManager();
        $ifgSitelinks = $em->getRepository('ShopBundle:Infositelinks')->find(1);

        return $this->render('ShopBundle:Infosgeneral:sitelinks.html.twig',
            array('ifgSitelinks' => $ifgSitelinks));
    }
    
    
    /**
     * render ifgSitelinksFooter
     */
    public function sitelinksFooterAction()
    {
        $em = $this->getDoctrine()->getManager();
        $ifgSitelinksFooter = $em->getRepository('ShopBundle:Infositelinks')->find(1);

        return $this->render('ShopBundle:Infosgeneral:sitelinksFooter.html.twig',
            array('ifgSitelinksFooter' => $ifgSitelinksFooter));
    }
    
    /**
     * render sitestyle
     */
    public function sitestyleAction()
    {
        $em = $this->getDoctrine()->getManager();
        $ifgsitestyle = $em->getRepository('ShopBundle:Infosite')->find(1);

        return $this->render('ShopBundle:Infosgeneral:sitestyle.html.twig',
            array('ifgsitestyle' => $ifgsitestyle));
    }
    
    /**
     * render adminstyle
     */
    public function adminstyleAction()
    {
        $em = $this->getDoctrine()->getManager();
        $ifgAdminstyle = $em->getRepository('ShopBundle:Infosite')->find(1);

        return $this->render('ShopBundle:Infosgeneral:adminstyle.html.twig',
            array('ifgAdminstyle' => $ifgAdminstyle));
    }
    
    /**
     * render sitename
     */
    public function sitenameAction()
    {
        $em = $this->getDoctrine()->getManager();
        $sitename = $em->getRepository('ShopBundle:Infosite')->find(1);


        return $this->render('ShopBundle:Infosgeneral:sitename.html.twig', array(
            'sitename' => $sitename,
            'currentUrl' => $currentUrl
        ));
    }
    
    /**
     * render sitename
     */
    public function sitemetasAction()
    {
        $em = $this->getDoctrine()->getManager();
        $sitemetas = $em->getRepository('ShopBundle:Infositemetas')->find(1);
        $siteinfos = $em->getRepository('ShopBundle:Infosite')->find(1);
        if($_SERVER['PHP_SELF'] == ""){
            $currentPage = "index";
        }else{
            $currentPage = "";
        }

        return $this->render('ShopBundle:Infosgeneral:sitemetas.html.twig', array(
            'sitemetas' => $sitemetas,
            'siteinfos' => $siteinfos,
            'currentPage' => $currentPage
        ));
    }
    
    /**
     * render sitename
     */
    public function infositeAllAction()
    {
        $em = $this->getDoctrine()->getManager();
        $infositeByField = $em->getRepository('ShopBundle:Infosite')->find(1);

        return $this->render('ShopBundle:Infosgeneral:infositeAll.html.twig', array(
            'infositeByField' => $infositeByField
        ));
    }
}

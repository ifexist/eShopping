<?php

namespace Eshop\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Eshop\ShopBundle\Entity\Infosite;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

/**
 * Infosite controller.
 *
 * @Route("/admin/infosite")
 */
class InfositeController extends Controller
{
    /**
     * Lists all Infosite entities.
     *
     * @Route("/", name="admin_infosite")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $Infosite = new Infosite();
        $em = $this->getDoctrine()->getManager();
        $infosite = $em->getRepository('ShopBundle:Infosite')->findOneBy(array(
            'id' => 1
        ));
        
        if(count($infosite) > 0){
            return $this->redirectToRoute('admin_infosite_edit', array('id' => 1));
        }else{
            $Infosite->getId(1);
            $em->persist($Infosite);
            $em->flush();

            return $this->redirectToRoute('admin_infosite_edit', array('id' => $Infosite->getId()));
        }

        return array(
            'entities' => $infosite,
        );
    }

    /**
     * Displays a form to edit an existing Infosite entity.
     *
     * @Route("/{id}/edit", name="admin_infosite_edit")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function editAction(Request $request, Infosite $infosite)
    {
        $web_dir = $request->server->get('DOCUMENT_ROOT');
        $siteImageDir = 'site/images';
        
        
        $locale = $request->getLocale();
        if($locale == "fr"){
            $lng = "fr";
        }else{
           $lng = "en"; 
        }
        $em = $this->getDoctrine()->getManager();
        
        $links = $em->getRepository('ShopBundle:Infositelinks')->findOneBy(array('id' => 1));
        
        
        $langs = $em->getRepository('ShopBundle:Langs')->findBy(
            array('enable' => 1),  
            array('code' => 'DESC')
        );
        
        $deleteForm = $this->createDeleteForm($infosite);
        $editForm = $this->createForm('Eshop\ShopBundle\Form\Type\InfositeType', $infosite);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em->persist($infosite);
            $infosite->setAdded(time());
            $infosite->setLangcode($request->get('langcode'));
            $infosite->setSitestyle($request->get('sitestyle'));
            $infosite->setAdminstyle($request->get('adminstyle'));
            $em->persist($infosite);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'notice',
                'Your changes were saved!'
            );

            return $this->redirectToRoute('admin_infosite_edit', array('id' => $infosite->getId()));
        } 

        
        if($locale == "fr"){
            $lng = "fr";
        }else{
           $lng = "en"; 
        }
        $GProductcatRepos = $em->getRepository('ShopBundle:GProductcat1'.$lng);

        
        $prodcats = $GProductcatRepos->findBy(
            array('enable' => 1), 
            array('id' => 'ASC')
        );
        
        $dir = $web_dir.'/bootswatch/skins';
        $sitestyles = $this->scanRecursiveDir($dir);
        $adminstyles = $this->scanRecursiveDir($dir);
        
        return array(
            'entity' => $infosite,
            'sitestyles' => $sitestyles,
            'adminstyles' => $adminstyles,
            'prodcats' => $prodcats,
            'langs' => $langs,
            'links' => $links,
            'web_dir' => $web_dir,
            'siteImageDir' => $siteImageDir,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Finds and displays a Infosite entity.
     *
     * @Route("/{id}", name="admin_infosite_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction(Request $request, Infosite $infosite)
    {
        $locale = $request->getLocale();
        if($locale == "fr"){
            $lng = "fr";
        }else{
           $lng = "en"; 
        }
        $web_dir = $request->server->get('DOCUMENT_ROOT');
        $siteImageDir = 'site/images';
        
        $em = $this->getDoctrine()->getManager();
        
        $links = $em->getRepository('ShopBundle:Infositelinks')->findOneBy(array('id' => 1));
        
        $deleteForm = $this->createDeleteForm($infosite);

        return array(
            'entity' => $infosite,
            'links' => $links,
            'web_dir' => $web_dir,
            'siteImageDir' => $siteImageDir,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Infosite entity.
     *
     * @Route("/{id}", name="admin_infosite_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Infosite $infosite)
    {
        $form = $this->createDeleteForm($infosite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($infosite);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_infosite'));
    }

    /**
     * Creates a form to delete a Infosite entity by id.
     *
     * @param Infosite $infosite The Infosite entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Infosite $infosite)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_infosite_delete', array('id' => $infosite->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
    
    
    function unique_multidim_array($array, $key) {
        $temp_array = array();
        $i = 0;
        $key_array = array();

        foreach($array as $val) {
            if (!in_array($val[$key], $key_array)) {
                $key_array[$i] = $val[$key];
                $temp_array[$i] = $val;
            }
            $i++;
        }
        return $temp_array;
    } 
    
    public function scanRecursiveDir($dir) {
        $files = scandir($dir);
        $allFiles = array();
        foreach ($files as $file) {
            if ($file != '.' && $file != '..') {
                if (is_dir($dir . $file)) {
                    $allFiles = array_merge($allFiles, Fonction::scanRecursiveDir($file));
                } else {
                    $allFiles[] = str_replace('//', '/', $file);
                }
            }
        }
        return $allFiles;
    }

}

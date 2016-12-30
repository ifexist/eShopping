<?php

namespace Eshop\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Eshop\ShopBundle\Entity\Slide;

/**
 * Slide controller.
 *
 * @Route("/admin/slide")
 */
class SlideController extends Controller
{
    /**
     * Lists all Slide entities.
     *
     * @Route("/", name="admin_slide")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('ShopBundle:Slide')->findBy(array(), array('slideOrder' => 'ASC'));

        $web_dir = $_SERVER['DOCUMENT_ROOT'];
        $imgDir = 'uploads/images/slide';

        return array(
            'entities' => $entities,
            'web_dir' => $web_dir,
            'imgDir' => $imgDir,
        );
    }

    /**
     * Displays a form to create a new Slide entity.
     *
     * @Route("/new", name="admin_slide_new")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function newAction(Request $request)
    {
        $slide = new Slide();
        $form = $this->createForm('Eshop\ShopBundle\Form\Type\SlideType', $slide);
        $form->handleRequest($request);
        
        $slidekey = sha1(uniqid(mt_rand()));
        
        $web_dir = $_SERVER['DOCUMENT_ROOT'];
        $imgDir = 'uploads/images/slide';

        if ($form->isSubmitted() && $form->isValid()) {


            if($request->get('image-data') != ""){
                $img = $request->get('image-data');
                //decode and save image tmp
                $imageDataEncoded = base64_encode(file_get_contents($img));
                $imageData = base64_decode($imageDataEncoded);
                $source = imagecreatefromstring($imageData);
                $angle = 0;
                $rotate = imagerotate($source, $angle, 0); // if want to rotate the image
                $fileTmp = $web_dir.'/'.$imgDir.'/'.$slidekey.'_tmp.jpg';
                $imageSave = imagejpeg($rotate,$fileTmp,100);
                imagedestroy($source);

                //resize and re save image tmp
                $thumb = new \Imagick($fileTmp);
                //create image tmp resized 850x250
                $thumb->resizeImage(850,250,\Imagick::FILTER_LANCZOS,1);
                //copy tmp image resized to real image in 850x250
                $thumb->writeImage($web_dir.'/'.$imgDir.'/'.$slidekey.'.jpg');

                $thumb->destroy();
                //remove tmp image
                unlink($fileTmp);
            }
            
            
            $em = $this->getDoctrine()->getManager();
            $slide->setSlidekey($slidekey);
            $em->persist($slide);
            $em->flush();


            return $this->redirectToRoute('admin_slide_show', array('id' => $slide->getId()));
        }

        return array(
            'entity' => $slide,
            'web_dir' => $web_dir,
            'imgDir' => $imgDir,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a Slide entity.
     *
     * @Route("/{id}", name="admin_slide_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction(Slide $slide)
    {
        $deleteForm = $this->createDeleteForm($slide);

        $web_dir = $_SERVER['DOCUMENT_ROOT'];
        $imgDir = 'uploads/images/slide';

        return array(
            'entity' => $slide,
            'web_dir' => $web_dir,
            'imgDir' => $imgDir,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Slide entity.
     *
     * @Route("/{id}/edit", name="admin_slide_edit")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function editAction(Request $request, Slide $slide)
    {
        $deleteForm = $this->createDeleteForm($slide);
        $editForm = $this->createForm('Eshop\ShopBundle\Form\Type\SlideType', $slide);
        $editForm->handleRequest($request);

        $slidekey = $slide->getSlidekey();

        $web_dir = $_SERVER['DOCUMENT_ROOT'];
        $imgDir = 'uploads/images/slide';

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            if($request->get('image-data') != ""){
                $img = $request->get('image-data');
                //decode and save image tmp
                $imageDataEncoded = base64_encode(file_get_contents($img));
                $imageData = base64_decode($imageDataEncoded);
                $source = imagecreatefromstring($imageData);
                $angle = 0;
                $rotate = imagerotate($source, $angle, 0); // if want to rotate the image
                $fileTmp = $web_dir.'/'.$imgDir.'/'.$slidekey.'_tmp.jpg';
                $imageSave = imagejpeg($rotate,$fileTmp,100);
                imagedestroy($source);

                //resize and re save image tmp
                $thumb = new \Imagick($fileTmp);
                //create image tmp resized 850x250
                $thumb->resizeImage(850,250,\Imagick::FILTER_LANCZOS,1);
                //copy tmp image resized to real image in 850x250
                $thumb->writeImage($web_dir.'/'.$imgDir.'/'.$slidekey.'.jpg');

                $thumb->destroy();
                //remove tmp image
                unlink($fileTmp);
            }
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($slide);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                    'notice', 'Your changes were saved!'
            );

            return $this->redirectToRoute('admin_slide');
        }

        return array(
            'entity' => $slide,
            'web_dir' => $web_dir,
            'imgDir' => $imgDir,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Slide entity.
     *
     * @Route("/{id}", name="admin_slide_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Slide $slide)
    {
        $form = $this->createDeleteForm($slide);
        $form->handleRequest($request);
        $slideky = $slide->getSlidekey();
        
        $web_dir = $_SERVER['DOCUMENT_ROOT'];
        $imgDir = 'uploads/images/slide';
        $img = $slideky.'.jpg';
        
        $fileSlidePath = $web_dir . '/' . $imgDir . '/' . $imgDir . '/' . $img;

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($slide);
            $em->flush();
            
            if(file_exists($fileSlidePath)){
                unlink($fileSlidePath);
            }
            
        }

        return $this->redirect($this->generateUrl('admin_slide'));
    }

    /**
     * Creates a form to delete a Slide entity by id.
     *
     * @param Slide $slide The Slide entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Slide $slide)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_slide_delete', array(
                'id' => $slide->getId()
                )))
            ->setMethod('DELETE')
            ->getForm();
    }
}

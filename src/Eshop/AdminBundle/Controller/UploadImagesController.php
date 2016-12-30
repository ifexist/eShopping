<?php

namespace Eshop\AdminBundle\Controller;
use Eshop\ShopBundle\Entity\OrderProduct;
use Eshop\ShopBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Eshop\ShopBundle\Entity\UploadImages;
use Eshop\ShopBundle\Classes\VerotUpload\src\Upload;

/**
 * Upload Images controller.
 *
 * @Route("/admin/uploadimages")
 */
class UploadImagesController extends Controller
{
    /**
     * @Route("/", name="admin_uploadimages_index")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        return array();

    }
    
    /**
     * @Route("/error", name="admin_uploadimages_error")
     * @Method("GET")
     * @Template()
     */
    public function errorAction(Request $request)
    {  
        if($request->get('msgError') == ""){
            $msgError = $request->get('msgError'); 
        }else{
            $msgError = ""; 
        }
        return array(
            'msgError' => $msgError,
            );

    }

    /**
     * Displays a form to create a new StaticPage entity.
     *
     * @Route("/cropbanner", name="admin_uploadimages_cropbanner")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function cropBannerAction(Request $request)
    {
        $web_dir = $_SERVER['DOCUMENT_ROOT'];
        $bannerDir = 'site/images';
        $pathBanner = $web_dir .'/' . $bannerDir;
        if (file_exists($pathBanner)) {
            $bannerExist = 'y';
        }else{
            $bannerExist = 'n';
        }
        
        if($request->get('image-data') != ""){
            $img = $request->get('image-data');
            //decode and save image tmp
            $imageDataEncoded = base64_encode(file_get_contents($img));
            $imageData = base64_decode($imageDataEncoded);
            $source = imagecreatefromstring($imageData);
            $angle = 0;
            $rotate = imagerotate($source, $angle, 0); // if want to rotate the image
            $fileTmp = $bannerDir.'/banner_tmp.png';
            $imageSave = imagejpeg($rotate,$fileTmp,100);
            imagedestroy($source);

            //resize and re save image tmp
            $thumb = new \Imagick($fileTmp);
            //create image tmp resized 700x200
            $thumb->resizeImage(700,200,\Imagick::FILTER_LANCZOS,1);
            //copy tmp image resized to real image in 700x200
            $thumb->writeImage($bannerDir.'/banner.png');

            $thumb->destroy();
            //remove tmp image
            unlink($fileTmp);
            

            return $this->redirectToRoute('admin_infosite_show', array('id' => 1));

        }

        return array(
            'web_dir' => $web_dir,
            'bannerDir' => $bannerDir,
            'pathBanner' => $pathBanner,
            'bannerExist' => $bannerExist,
        );
    }

    /**
     * Displays a form to create a new StaticPage entity.
     *
     * @Route("/croplogo", name="admin_uploadimages_croplogo")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function cropLogoAction(Request $request)
    {
        $web_dir = $_SERVER['DOCUMENT_ROOT'];
        $logoDir = 'site/images';
        $pathLogo = $web_dir .'/' . $logoDir;
        if (file_exists($pathLogo)) {
            $logoExist = 'y';
        }else{
            $logoExist = 'n';
        }
        
        if($request->get('image-data') != ""){
            $img = $request->get('image-data');
            //decode and save image tmp
            $imageDataEncoded = base64_encode(file_get_contents($img));
            $imageData = base64_decode($imageDataEncoded);
            $source = imagecreatefromstring($imageData);
            $angle = 0;
            $rotate = imagerotate($source, $angle, 0); // if want to rotate the image
            $fileTmp = $logoDir.'/logo_tmp.png';
            $imageSave = imagejpeg($rotate,$fileTmp,100);
            imagedestroy($source);

            //resize and re save image tmp
            $thumb = new \Imagick($fileTmp);
            //create image tmp resized 300x150
            $thumb->resizeImage(300,150,\Imagick::FILTER_LANCZOS,1);
            //copy tmp image resized to real image in 300x150
            $thumb->writeImage($logoDir.'/logo.png');

            $thumb->destroy();
            //remove tmp image
            unlink($fileTmp);
            

            return $this->redirectToRoute('admin_infosite_show', array('id' => 1));

        }

        return array(
            'web_dir' => $web_dir,
            'logoDir' => $logoDir,
            'pathLogo' => $pathLogo,
            'logoExist' => $logoExist,
        );
    }
    

    /**
     * Displays a form to create a new StaticPage entity.
     *
     * @Route("/cropicon", name="admin_uploadimages_cropicon")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function cropIconAction(Request $request)
    {
        $web_dir = $_SERVER['DOCUMENT_ROOT'];
        $iconDir = 'site/images';
        $pathIcon = $web_dir .'/' . $iconDir;
        if (file_exists($pathIcon)) {
            $iconExist = 'y';
        }else{
            $iconExist = 'n';
        }
        
        if($request->get('image-data') != ""){
            $img = $request->get('image-data');
            //decode and save image tmp
            $imageDataEncoded = base64_encode(file_get_contents($img));
            $imageData = base64_decode($imageDataEncoded);
            $source = imagecreatefromstring($imageData);
            $angle = 0;
            $rotate = imagerotate($source, $angle, 0); // if want to rotate the image
            $fileTmp = $iconDir.'/apple-touch-icon_tmp.png';
            $imageSave = imagejpeg($rotate,$fileTmp,100);
            imagedestroy($source);

            
            $width = "129";
            $height = "129";
            
            $thumb = new \Imagick($fileTmp);
 
            // get width an height of the image
            extract($thumb->getImageGeometry());

            // create circle mask
            $circle = new \Imagick();
            $circle->newImage($width,$height, '#fff');
            $circle->setImageFormat('png');
            $circle->setImageMatte(true);
            $draw = new \ImagickDraw();
            $draw->setFillColor('#000');
            $draw->circle(round($width / 2), round($height / 2), round($width / 2), $width);
            $circle->drawImage($draw);

            // apply mask
            $thumb->compositeImage($circle, \Imagick::COMPOSITE_SCREEN, 0, 0);

            // save image
            $thumb->writeImage($iconDir.'/apple-touch-icon.png');
            $thumb->destroy(); 
            //remove tmp image
            unlink($fileTmp);
            

            return $this->redirectToRoute('admin_infosite_show', array('id' => 1));

        }

        return array(
            'web_dir' => $web_dir,
            'iconDir' => $iconDir,
            'pathIcon' => $pathIcon,
            'iconExist' => $iconExist,
        );
    }

}

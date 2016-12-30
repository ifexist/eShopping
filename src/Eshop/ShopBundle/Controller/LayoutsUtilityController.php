<?php

namespace Eshop\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class LayoutsUtilityController extends Controller
{
    /**
     * render categories menu
     */
    public function categoriesMenuAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categoryRepository = $em->getRepository('ShopBundle:Category');

        $settings = $this->get('app.site_settings');
        $showEmpty = $settings->getShowEmptyCategories();

        $categories = $categoryRepository->getAllCategories($showEmpty);

        return $this->render('ShopBundle:Partials:categoriesMenu.html.twig',
            array('categories' => $categories));
    }

    /**
     * render top categories Dropdown Menu.
     */
    public function categoriesDropdownMenuAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $catparent = $em->getRepository('ShopBundle:Catparent');
        $mainCategories = $catparent->findBy(
                array('enable' => 1),
                array('name' => 'DESC')
        );
        $categoryRepository = $em->getRepository('ShopBundle:Category');

        $settings = $this->get('app.site_settings');
        $showEmpty = $settings->getShowEmptyCategories();

        $subCategories = $categoryRepository->getAllCategories($showEmpty);
        
        return $this->render('ShopBundle:Partials:categoriesDropdownMenu.html.twig', array(
                'mainCategories' => $mainCategories,
                'subCategories' => $subCategories,
        ));
    }

    /**
     * render top categories Footer Menu.
     */
    public function categoriesFooterMenuAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $catparentFoot = $em->getRepository('ShopBundle:Catparent');
        $mainCatsFoot = $catparentFoot->findBy(
                array('enable' => 1),
                array('name' => 'DESC')
        );
        $categoryRepository = $em->getRepository('ShopBundle:Category');

        $settings = $this->get('app.site_settings');
        $showEmpty = $settings->getShowEmptyCategories();

        $subCatsFoot = $categoryRepository->getAllCategories($showEmpty);
        
        return $this->render('ShopBundle:Partials:categoriesFooterMenu.html.twig', array(
                'mainCatsFoot' => $mainCatsFoot,
                'subCatsFoot' => $subCatsFoot,
        ));
    }

    /**
     * render manufacturers menu
     */
    public function manufacturersMenuAction()
    {
        $em = $this->getDoctrine()->getManager();
        $manufacturerRepository = $em->getRepository('ShopBundle:Manufacturer');

        $settings = $this->get('app.site_settings');
        $showEmpty = $settings->getShowEmptyManufacturers();

        $manufacturers = $manufacturerRepository->getAllManufacturers($showEmpty);

        return $this->render('ShopBundle:Partials:manufacturersMenu.html.twig',
            array('manufacturers' => $manufacturers));
    }

    /**
     * render manufacturers Dropdown menu
     */
    public function manufacturersDropdownMenuAction()
    {
        $em = $this->getDoctrine()->getManager();
        $manufacturerRepository = $em->getRepository('ShopBundle:Manufacturer');

        $settings = $this->get('app.site_settings');
        $showEmpty = $settings->getShowEmptyManufacturers();

        $manufacturersDropdown = $manufacturerRepository->getAllManufacturers($showEmpty);

        return $this->render('ShopBundle:Partials:manufacturersDropdownMenu.html.twig',
            array('manufacturersDropdown' => $manufacturersDropdown));
    }

    /**
     * render manufacturers Footer menu
     */
    public function manufacturersFooterMenuAction()
    {
        $em = $this->getDoctrine()->getManager();
        $manufacturerRepository = $em->getRepository('ShopBundle:Manufacturer');

        $settings = $this->get('app.site_settings');
        $showEmpty = $settings->getShowEmptyManufacturers();

        $manufacturersFooter = $manufacturerRepository->getAllManufacturers($showEmpty);

        return $this->render('ShopBundle:Partials:manufacturersFooterMenu.html.twig',
            array('manufacturersFooter' => $manufacturersFooter));
    }
    
    

    /**
     * render top menu with static pages headers.
     */
    public function staticPagesMenuAction()
    {
        $em = $this->getDoctrine()->getManager();
        $headers = $em->getRepository('ShopBundle:StaticPage')->getHeaders();
        return $this->render('ShopBundle:Partials:staticPagesMenu.html.twig',
            array('headers' => $headers));
    }
    
    
    /**
     * render top menu with static pages headers.
     */
    public function staticPagesDropdownMenuAction()
    {
        $em = $this->getDoctrine()->getManager();
        $SPDDMs = $em->getRepository('ShopBundle:StaticPage')->getHeaders();
        return $this->render('ShopBundle:Partials:staticPagesDropdownMenu.html.twig',
            array('SPDDMs' => $SPDDMs));
    }
    
    /**
     * render top menu with static pages headers.
     */
    public function staticPagesFooterMenuAction()
    {
        $em = $this->getDoctrine()->getManager();
        $SPFs = $em->getRepository('ShopBundle:StaticPage')->getHeaders();
        return $this->render('ShopBundle:Partials:staticPagesFooterMenu.html.twig',
            array('SPFs' => $SPFs));
    }

    /**
     * render top locale (languages) Menu.
     */
    public function localeMenuAction()
    {
        $em = $this->getDoctrine()->getManager();
        $langs = $em->getRepository('ShopBundle:Langs')->findBy(
                array('enable' => 1),
                array('code' => 'DESC')
                
        );
        return $this->render('ShopBundle:Partials:localeMenu.html.twig',
            array('langs' => $langs));
    }
    
    
    public function themeSelectorAction(Request $request)
    {
        $web_dir = $request->server->get('DOCUMENT_ROOT');
        
        $dir = $web_dir.'/bootswatch/skins';
        $themes = $this->scanRecursiveDir($dir);
        
        return $this->render('ShopBundle:Partials:themeSelector.html.twig', array(
            'themes' => $themes,
        ));
        
    }
    
    /**
     * render sitename
     */
    public function bootsThemesCdnAction(Request $request)
    {
        $web_dir = $request->server->get('DOCUMENT_ROOT');
        
        $dir = $web_dir.'/bootswatch/skins';
        $bootswitchLinks = $this->scanRecursiveDir($dir);
        
        return $this->render('ShopBundle:Partials:bootsThemesCdn.html.twig', array(
            'bootswitchLinks' => $bootswitchLinks
        ));
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

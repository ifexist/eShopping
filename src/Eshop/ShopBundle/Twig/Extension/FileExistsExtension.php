<?php

namespace Eshop\ShopBundle\Twig\Extension;

class FileExistsExtension extends \Twig_Extension
{

    /**
     * Return the functions registered as twig extensions
     * 
     * @return array
     */
    public function getFunctions()
    {
        return array(
            'file_exists' => new \Twig_Function_Function('file_exists'),
        );
    }

    public function getName()
    {
        return 'app_bundle_file';
    }
}
?>

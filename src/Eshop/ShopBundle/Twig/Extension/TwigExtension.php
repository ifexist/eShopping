<?php

namespace Eshop\ShopBundle\Twig\Extension;

class FileExtension extends \Twig_Extension
{ 
        /**
         *Return the function registered as twig extension
         *
         *@return array
         */
        public function getFunctions()
        {
                return array(
                        'file_exists' => new \Twig_Function_Function('file_exists'),
                        );
        }
 
        public function getName()
        {
                return 'app_bundle_file_exists';
        }
}
?>

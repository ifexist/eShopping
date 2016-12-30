<?php

namespace Eshop\ShopBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {

            $builder->add('enabled', 'checkbox', array(
                'label'     => 'Check to enable user',
                'required'  => true,
            ));
    }

    /**
     * @return string
     */
    public function getBlockPrefix() {
        return 'eshop_shopbundle_usertype';
    }
    
}

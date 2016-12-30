<?php

namespace Eshop\UserBundle\Form\Type;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gender', 'choice', array(
                'label' => 'Gender',
                'choices' => array(
                    'Female' => 'Female',
                    'Male' => 'Male'
                ),
                'required'    => true,
                'empty_value' => '', 
                'translation_domain' => 'ShopBundle',
                'empty_data'  => null
            ))
                
            ->add('firstname', TextType::class,
                array('label' => 'Firstname', 'translation_domain' => 'ShopBundle'))
            ->add('lastname', TextType::class,
                array('label' => 'Lastname', 'translation_domain' => 'ShopBundle'))
            ->add('phone', TextType::class, array(
                'label' => 'Phone',  
                'required' => FALSE,
                'translation_domain' => 'ShopBundle'
                ))
            ->add('address', TextareaType::class, array(
                'label' => 'Address',  
                'required' => FALSE,
                'translation_domain' => 'ShopBundle'
                ));
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    public function getName()
    {
        return $this->getBlockPrefix();
    }
}

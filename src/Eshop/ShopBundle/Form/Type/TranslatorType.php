<?php

namespace Eshop\ShopBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class TranslatorType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('bundle', 'choice', array(
                    'label' => 'Bundle',
                    'choices' => array(
                        'Admin' => 'Admin',
                        'Shop' => 'Shop',
                        'Contact' => 'Contact'
                    ),
                    'required' => false,
                    'expanded' => false,
                ))
                ->add('lang', 'choice', array(
                    'translation_domain' => 'admin',
                    'label' => 'Language',
                    'choices' => array(
                        'en' => 'en',
                        'fr' => 'fr',
                        'es' => 'es',
                        'de' => 'de',
                        'pt' => 'pt',
                        'nl' => 'nl'
                    ),
                    'required' => false,
                    'expanded' => false,
                ))
                ->add('prefix', 'choice', array(
                    'translation_domain' => 'admin',
                    'label' => 'Translation file prefix',
                    'choices' => array(
                        'admin' => 'admin',
                        'shop' => 'shop',
                        'messages' => 'messages',
                        'validator' => 'validator',
                    ),
                    'required' => false,
                    'expanded' => false,
                ))
        ;
    }

    /**
     * @return string
     */
    public function getBlockPrefix() {
        return 'eshop_shopbundle_translator';
    }

}

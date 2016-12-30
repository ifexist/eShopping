<?php

namespace Eshop\ShopBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProdcolorType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('enable', 'checkbox', array(
                    'required' => FALSE))

                ->add('title', TextType::class, array(
                    'label' => 'Title of color',
                    'required'  => TRUE,
                    'attr' => array(
                        'style' => 'font-size:12px;',
                        'class' => 'col-xs-12')))

                ->add('name', TextType::class, array(
                    'label' => 'Name of color',
                    'required'  => TRUE,
                    'attr' => array(
                        'style' => 'font-size:12px;',
                        'class' => 'col-xs-12')))

                ->add('code1', TextType::class, array(
                    'label' => 'RGB code color',
                    'required'  => TRUE,
                    'attr' => array(
                        'style' => 'font-size:12px;',
                        'class' => 'col-xs-12')))

                ->add('code2', TextType::class, array(
                    'label' => 'HEX code color',
                    'required'  => TRUE,
                    'attr' => array(
                        'style' => 'font-size:12px;',
                        'class' => 'col-xs-12')))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Eshop\ShopBundle\Entity\Prodcolor'
        ));
    }

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'eshop_shopbundle_prodcolor';
    }
}

<?php

namespace Eshop\ShopBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SlideType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('slidekey', HiddenType::class)
                
            ->add('name', TextType::class, array(
                'attr' => array(
                    'maxlength' => 150,
                    'placeholder' => 'Add a name to this slide (Maximum 150 chars)',
                )))
            ->add('description', TextareaType::class, array(
                'attr' => array(
                    'maxlength' => 300,
                    'placeholder' => 'Add a description to this slide (Maximum chars 300)',
                )))
            ->add('enabled', CheckboxType::class, array(
                'label' => 'Enabled (Check for yes)',
                'required' => false
            ))
//            ->add('file', FileType::class, array('required' => false))
            ->add('slideOrder', IntegerType::class)
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Eshop\ShopBundle\Entity\Slide'
        ));
    }

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'eshop_shopbundle_slide';
    }
}

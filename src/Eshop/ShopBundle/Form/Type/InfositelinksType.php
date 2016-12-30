<?php

namespace Eshop\ShopBundle\Form\Type;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class InfositelinksType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder     
            ->add('mediatitle1', HiddenType::class)     
            ->add('mediatitle2', HiddenType::class)     
            ->add('mediatitle3', HiddenType::class)     
            ->add('mediatitle4', HiddenType::class)     
            ->add('mediatitle5', HiddenType::class)     
            ->add('mediatitle6', HiddenType::class)     
            ->add('mediatitle7', HiddenType::class)     
            ->add('mediatitle8', HiddenType::class)     
            ->add('mediatitle9', HiddenType::class)     
            ->add('mediatitle10', HiddenType::class)
                            
                            
            ->add('medialink1', TextType::class, array(
                'required' => FALSE,
                'attr' => array(
                    'style' => 'font-size:14px;',
                    
                    
            )))   
            ->add('medialink2', TextType::class, array(
                'required' => FALSE,
                'attr' => array(
                    'style' => 'font-size:14px;',
                    
                    
            )))   
            ->add('medialink3', TextType::class, array(
                'required' => FALSE,
                'attr' => array(
                    'style' => 'font-size:14px;',
                    
                    
            ))) 
            ->add('medialink4', TextType::class, array(
                'required' => FALSE,
                'attr' => array(
                    'style' => 'font-size:14px;',
                    
                    
            )))   
            ->add('medialink5', TextType::class, array(
                'required' => FALSE,
                'attr' => array(
                    'style' => 'font-size:14px;',
                    
                    
            )))   
            ->add('medialink6', TextType::class, array(
                'required' => FALSE,
                'attr' => array(
                    'style' => 'font-size:14px;',
                    
                    
            )))     
            ->add('medialink7', TextType::class, array(
                'required' => FALSE,
                'attr' => array(
                    'style' => 'font-size:14px;',
                    
                    
            )))    
            ->add('medialink8', TextType::class, array(
                'required' => FALSE,
                'attr' => array(
                    'style' => 'font-size:14px;',
                    
                    
            )))   
            ->add('medialink9', TextType::class, array(
                'required' => FALSE,
                'attr' => array(
                    'style' => 'font-size:14px;',
                    
                    
            )))     
            ->add('medialink10', TextType::class, array(
                'required' => FALSE,
                'attr' => array(
                    'style' => 'font-size:14px;',
                    
                    
            ))) 
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Eshop\ShopBundle\Entity\Infositelinks'
        ));
    }

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'eshop_shopbundle_infositelinks';
    }
}

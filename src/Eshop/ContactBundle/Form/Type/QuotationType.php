<?php

namespace Eshop\ContactBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;


class QuotationType extends AbstractType

{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('subject', HiddenType::class)     
            ->add('currency', HiddenType::class)     
            ->add('lang', HiddenType::class) 
            ->add('zipcode', TextType::class, array(
                'attr' => array(
                    'readonly' => false,
                ),
                'required' => false
            )) 
            ->add('city', TextType::class, array(
                'attr' => array(
                    'readonly' => true,
                ),
                'required' => false
            ))  
            ->add('region', HiddenType::class, array(
                'attr' => array(
                    'readonly' => true,
                ),
                'required' => false
            ))     
            ->add('country', TextType::class, array(
                'attr' => array(
                    'readonly' => true,
                ),
                'required' => false
            ))      
            ->add('title', 'choice', array(
                'translation_domain' => 'contact',
                'label' => 'Gender',
                'choices' => array(
                    'Mr' => 'Mr',
                    'Mrs' => 'Mrs'
                ),
                'required'    => true,
                'expanded' => true,
            ))
            
            ->add('namets', TextType::class, array(
                'required' => False,
            ))    
            ->add('firstname', TextType::class)
            ->add('lastname', TextType::class)
            ->add('email', EmailType::class)   
            ->add('phone', TextType::class)
            ->add('web', TextType::class, array(
                'required' => False,
            ))       
            ->add('webmodel', TextType::class, array(
                'required' => False,
            ))        
                
            ->add('typesite', 'choice', array(
                'translation_domain' => 'contact',
                'label' => 'Type of site',
                'choices' => array(
                    'ecommerce' => 'ecommerce',
                    'showcase' => 'showcase',
                    'catalog' => 'catalog',
                    'institutional' => 'institutional',
                    'associative' => 'associative',
                    'blog' => 'blog',
                    'other' => 'other',
                ),
                'empty_value' => '',
                'required'    => true,
                'expanded' => false,
            ))
            ->add('budget', 'choice', array(
                'translation_domain' => 'contact',
                'label' => 'budget',
                'choices' => array(
                    'less1500HT' => 'less1500HT',
                    '1500to2500HT' => '1500to2500HT',
                    'more2500HT' => 'more2500HT',
                    'more5000HT' => 'more5000HT',
                ),
                'empty_value' => '',
                'required'    => true,
                'expanded' => false,
            ))
            ->add('project', TextareaType::class)
            ->add('captcha', 'genemu_captcha', array(
                'label' => 'quotation.form.captcha',
            ))

            ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Eshop\ContactBundle\Entity\Quotation'
        ));
    }

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'eshop_contactbundle_quotationtype';
    }
}

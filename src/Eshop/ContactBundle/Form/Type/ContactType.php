<?php

namespace Eshop\ContactBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ContactType extends AbstractType

{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cat', HiddenType::class, array(
                'attr' => array(
                    'value' => 'message'
                ))) 
                ->add('title', 'choice', array(
                'translation_domain' => 'contact',
                'label' => 'title',
                'choices' => array(
                    'Mr' => 'Mr',
                    'Mrs' => 'Mrs'
                ),
                'required'    => true,
                'expanded' => true,
            ))
                
            ->add('subject', 'choice', array(
                'translation_domain' => 'contact',
                'label' => 'subject',
                'choices' => array(
                    '' => '',
                    'subject_devis' => 'subject_devis',
                    'subject_deminfos' => 'subject_deminfo',
                    'subject_sugg' => 'subject_sugg',
                    'subject_prbsit' => 'subject_prbsit',
                    'subject_other' => 'subject_other'
                ),
                'required'    => true,
                'expanded' => false,
            ))
                
            ->add('firstname', TextType::class, array('label' => 'firstname'))
            ->add('lastname', TextType::class, array('label' => 'lastname'))
            ->add('email', EmailType::class, array('label' => 'email'))   
            ->add('phone', TextType::class, array('label' => 'phone'))
            ->add('message', TextareaType::class, array('label' => 'message'))
            ->add('captcha', 'genemu_captcha', array(
                'label' => 'captcha',
            ))

            ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Eshop\ContactBundle\Entity\Contact'
        ));
    }

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'eshop_contactbundle_contacttype';
    }
}

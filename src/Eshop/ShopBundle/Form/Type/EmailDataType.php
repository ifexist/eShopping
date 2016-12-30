<?php

namespace Eshop\ShopBundle\Form\Type;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;

class EmailDataType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('enable', CheckboxType::class, array(
                'label' => 'Enable',
                'translation_domain' => 'shop',
                'required' => false
            ))    
           
            ->add('date', DateType::class, array(
                'label' => 'Date',
                'translation_domain' => 'shop',
                'required'  => FALSE,
                'widget' => 'single_text',
                'input' => 'datetime',
                'format' => 'dd-MM-yyyy HH:mm:ss',
                'attr' => array(
                    'value' => date('d-m-Y H:i:s'),
                    'readonly' => 'readonly', 
                )
            ))
            ->add('typecompte', CheckboxType::class, array(
                'label' => 'Client type',
                'translation_domain' => 'shop',
                'required' => false
            ))
            ->add('namets', TextType::class, array(
                'label' => 'Name of company',
                'translation_domain' => 'shop',
                'required' => false,
                'attr' => array(
                    'maxlength' => 255,
                )))
            ->add('activity', TextType::class, array(
                'label' => 'Activity',
                'translation_domain' => 'shop',
                'required' => false,
                'attr' => array(
                    'maxlength' => 150,
                )))
            ->add('typactivity', TextType::class, array(
                'label' => 'Type of activity',
                'translation_domain' => 'shop',
                'required' => false,
                'attr' => array(
                    'maxlength' => 150,
                )))
            ->add('sector', TextType::class, array(
                'label' => 'Sector of activity',
                'translation_domain' => 'shop',
                'required' => false,
                'attr' => array(
                    'maxlength' => 150,
                )))
                

            ->add('email', EmailType::class, array(
                'label' => 'email',
                'translation_domain' => 'shop',
                'required' => false,
                'attr' => array(
                    'maxlength' => 255,
                )))
            ->add('web', TextType::class, array(
                'label' => 'web',
                'translation_domain' => 'shop',
                'required' => false,
                'attr' => array(
                    'maxlength' => 255,
                )))
            ->add('gender', 'choice', array(
                'translation_domain' => 'shop',
                'label' => 'Gender',
                'choices' => array(
                    'Mr' => 'Mr',
                    'Mrs' => 'Mrs'
                ),
                'required'    => false,
                'expanded' => false,
            ))
            ->add('firstname', TextType::class, array(
                'label' => 'firstname',
                'translation_domain' => 'shop',
                'required' => false,
                'attr' => array(
                    'maxlength' => 150,
                )))
            ->add('lastname', TextType::class, array(
                'label' => 'lastname',
                'translation_domain' => 'shop',
                'required' => false,
                'attr' => array(
                    'maxlength' => 150,
                )))
            ->add('phone', TextType::class, array(
                'label' => 'phone',
                'translation_domain' => 'shop',
                'required' => false,
                'attr' => array(
                    'maxlength' => 25,
                )))
            ->add('mobile', TextType::class, array(
                'label' => 'mobile',
                'translation_domain' => 'shop',
                'required' => false,
                'attr' => array(
                    'maxlength' => 25,
                )))
            ->add('fax', TextType::class, array(
                'label' => 'fax',
                'translation_domain' => 'shop',
                'required' => false,
                'attr' => array(
                    'maxlength' => 25,
                )))
            ->add('zipcode', TextType::class, array(
                'label' => 'Postal code',
                'translation_domain' => 'shop',
                'required' => true,
                'attr' => array(
                    'maxlength' => 35,
                )))
            ->add('address', TextType::class, array(
                'label' => 'Address',
                'translation_domain' => 'shop',
                'required' => false,
                'attr' => array(
                    'maxlength' => 255,
                )))
            ->add('city', TextType::class, array(
                'label' => 'City',
                'translation_domain' => 'shop',
                'required' => false,
                'attr' => array(
                    'maxlength' => 255
                )))
            ->add('country', TextType::class, array(
                'label' => 'Country',
                'translation_domain' => 'shop',
                'required' => false,
                'attr' => array(
                    'maxlength' => 255
                )))
                
                
                
                
            ->add('lang', EntityType::class, array(
                    'label' => 'language',
                    'translation_domain' => 'shop',
                    'class' => 'Eshop\ShopBundle\Entity\Langs',
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('lg')
//                            ->where('lg.enable = :enable')
//                            ->setParameter('enable', 1)
                            ->orderBy('lg.code', 'ASC');
                    },
                    'empty_value' => '',
                    'property' => 'code',
                    'required' => false,
            ))
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Eshop\ShopBundle\Entity\EmailData'
        ));
    }

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'eshop_shopbundle_emaildata';
    }
}

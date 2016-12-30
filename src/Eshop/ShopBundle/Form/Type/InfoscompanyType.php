<?php

namespace Eshop\ShopBundle\Form\Type;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;

class InfoscompanyType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder 
            ->add('added', HiddenType::class) 
            ->add('updated', HiddenType::class, array(
                'attr' => array(
                    'value' => time()
            )))        
            ->add('latitude', TextType::class)         
            ->add('longitude', TextType::class)    
            ->add('namets', TextType::class, array(
                'required' => FALSE,
            )) 
            
            ->add('activity', EntityType::class, array(
                    'translation_domain' => 'shop',
                    'class' => 'Eshop\ShopBundle\Entity\Activity',
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('act')
                            ->where('act.enable = :enable')
                            ->setParameter('enable', 1)
                            ->orderBy('act.id', 'ASC');
                    },
                    'empty_value' => '',
                    'property' => 'cat',
                    'required' => TRUE,
                    'attr' => array(
                        'style' => 'font-size:12px;',
                        'class' => 'col-xs-12',
            )))  
            
            ->add('prodtype', EntityType::class, array(
                    'translation_domain' => 'shop',
                    'class' => 'Eshop\ShopBundle\Entity\GProductcat1en',
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('gpct')
                            ->where('gpct.enable = :enable')
                            ->setParameter('enable', 1)
                            ->orderBy('gpct.id', 'ASC');
                    },
                    'empty_value' => '',
                    'property' => 'cat1',
                    'required' => TRUE,
                    'attr' => array(
                        'style' => 'font-size:12px;',
                        'class' => 'col-xs-12',
            )))  
            
            ->add('currencycode', EntityType::class, array(
                    'class' => 'Eshop\ShopBundle\Entity\Currency',
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('cu')
                            ->where('cu.enable = :enable')
                            ->setParameter('enable', 1)
                            ->orderBy('cu.code', 'ASC');
                    },
                    'empty_value' => '',
                    'property' => 'code',
                    'required' => TRUE,
                    'attr' => array(
                        'style' => 'font-size:12px;',
                        'class' => 'col-xs-12',
            )))  
            
            ->add('langcode', EntityType::class, array(
                    'class' => 'Eshop\ShopBundle\Entity\Langs',
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('lg')
//                            ->where('lg.enable = :enable')
//                            ->setParameter('enable', 1)
                            ->orderBy('lg.code', 'ASC');
                    },
                    'empty_value' => '',
                    'property' => 'code',
                    'required' => TRUE,
                    'attr' => array(
                        'style' => 'font-size:12px;',
                        'class' => 'col-xs-12',
            ))) 

            ->add('email', EmailType::class, array(
                'required' => FALSE,
            ))  
                
            ->add('register', TextType::class, array(
                'label' => 'Register number',
                'required' => FALSE,
            ))   
                
            ->add('phone', NumberType::class, array(
                'required' => FALSE,
            ))   
                
            ->add('streetnum', TextType::class, array(
                'required' => FALSE,
            ))    
            ->add('address', TextType::class, array(
                'required' => FALSE,
            ))    
                
            ->add('zipcode', TextType::class, array(
                'required' => FALSE,
            ))   
                
            ->add('city', TextType::class, array(
                'required' => FALSE,
            ))   
                
            ->add('region', TextType::class, array(
                'required' => FALSE,
            ))  
                
            ->add('department', TextType::class, array(
                'required' => FALSE,
            ))   
                
            ->add('country', TextType::class, array(
                'required' => FALSE,
            ))  
                
                
            ->add('vat', NumberType::class, array(
                'required'  => FALSE,
                'scale' => 2
            )) 
            
            ->add('content', TextareaType::class, array(
                'required'  => FALSE,
                ))
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Eshop\ShopBundle\Entity\Infoscompany'
        ));
    }

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'eshop_shopbundle_infoscompany';
    }
}

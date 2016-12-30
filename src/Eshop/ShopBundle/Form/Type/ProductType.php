<?php

namespace Eshop\ShopBundle\Form\Type;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;

class ProductType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ref', TextType::class, array(
                'required'=>false
                ))
            ->add('prodkey', HiddenType::class)
            ->add('name', TextType::class)
            ->add('slug', HiddenType::class)
            ->add('description', TextareaType::class, array(
                'attr'=>array(
                    'rows'=> 5
                )))
            ->add('existin1', TextareaType::class, array(
                'required'=>false
                ))
            ->add('existin2', TextareaType::class, array(
                'required'=>false
                ))
                
                
            ->add('oldprice', NumberType::class)
            ->add('price', NumberType::class)
            ->add('deliveryprice', NumberType::class)
            ->add('delivery', CheckboxType::class, array(
                'label' => 'Check for yes',
                'required'  => false,
                'attr'=>array(
                    'class'=>'small'
                )))
            ->add('category', EntityType::class, array(
                'required'  => true,
                'multiple' => false,
                'class' => 'Eshop\ShopBundle\Entity\Category',
                'choice_label' => 'name',
            ))
            
            ->add('currency', EntityType::class, array(
                    'class' => 'Eshop\ShopBundle\Entity\Currency',
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('cu')
                            ->where('cu.enable = :enable')
                            ->setParameter('enable', 1)
                            ->orderBy('cu.code', 'ASC');
                    },
                    'empty_value' => '',
                    'property' => 'code',
                    'required' => false,
                    'attr' => array(
                        'style' => 'font-size:12px;',
                        'class' => 'col-xs-12',
            )))  
                            
//            ->add('currency', EntityType::class, array(
//                'required'  => true,
//                'multiple' => false,
//                'class' => 'Eshop\ShopBundle\Entity\Currency',
//                'choice_label' => 'code'
//            ))
            ->add('manufacturer', EntityType::class, array(
                'required'  => true,
                'multiple' => false,
                'class' => 'Eshop\ShopBundle\Entity\Manufacturer',
                'choice_label' => 'name'
            ))
            ->add('quantity', IntegerType::class)
            ->add('metaKeys', TextareaType::class)
            ->add('metaDescription', HiddenType::class)
                            
           
            ->add('measure', EntityType::class, array(
                    'class' => 'Eshop\ShopBundle\Entity\Measure',
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('msr')
                            ->where('msr.enable = :enable')
                            ->setParameter('enable', 1)
                            ->orderBy('msr.name', 'ASC');
                    },
                    'empty_value' => '',
                    'property' => 'name',
                    'required' => false,
                    'attr' => array(
                        'style' => 'font-size:12px;',
                        'class' => 'col-xs-12',
            )))               
                            
                            
                            
//            ->add('measure', EntityType::class, array(
//                'required'  => true,
//                'multiple' => false,
//                'expanded' => false,
//                'class' => 'Eshop\ShopBundle\Entity\Measure',
//                'choice_label' => 'name'))
           ->add('measureQuantity', IntegerType::class)
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Eshop\ShopBundle\Entity\Product'
        ));
    }

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'eshop_shopbundle_product';
    }
}

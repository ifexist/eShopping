<?php

namespace Eshop\ShopBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;

class CategoryType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'attr' => array(
                    'autocomplete' => 'off'
                )
            ))
                
            ->add('slug', HiddenType::class)
            ->add('metaDescription', HiddenType::class)
            ->add('metaKeys', TextareaType::class, array(
                'attr' => array(
                    'rows' => 5
                )
            ))
            ->add('description', TextareaType::class)
            ->add('file', FileType::class, array('required' => false))
            
            ->add('parent', EntityType::class, array(
                    'class' => 'Eshop\ShopBundle\Entity\Catparent',
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('cp')
                            ->where('cp.enable = :enable')
                            ->setParameter('enable', 1)
                            ->orderBy('cp.name', 'ASC');
                    },
                    'empty_value' => '',
                    'property' => 'name',
                    'required' => TRUE,
                    'attr' => array(
                        'style' => 'font-size:12px;',
                        'class' => 'col-xs-12',
            )))  
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Eshop\ShopBundle\Entity\Category'
        ));
    }

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'eshop_shopbundle_category';
    }
}

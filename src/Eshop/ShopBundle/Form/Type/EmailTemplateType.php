<?php

namespace Eshop\ShopBundle\Form\Type;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;

class EmailTemplateType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class)
            ->add('lang', EntityType::class, array(
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
            ->add('template', TextareaType::class)
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Eshop\ShopBundle\Entity\EmailTemplate'
        ));
    }

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'eshop_shopbundle_emailtemplate';
    }
}

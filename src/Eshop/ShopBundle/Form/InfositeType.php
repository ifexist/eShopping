<?php

namespace Eshop\ShopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InfositeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('added')
            ->add('updated')
            ->add('namesite')
            ->add('slogan')
            ->add('web')
            ->add('prodcats')
            ->add('sitestyle')
            ->add('adminstyle')
            ->add('titleservice1')
            ->add('emailservice1')
            ->add('phoneservice1')
            ->add('contactservice1')
            ->add('titleservice2')
            ->add('emailservice2')
            ->add('phoneservice2')
            ->add('contactservice2')
            ->add('titleservice3')
            ->add('emailservice3')
            ->add('phoneservice3')
            ->add('contactservice3')
            ->add('langcode')
            ->add('countrycode')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Eshop\ShopBundle\Entity\Infosite'
        ));
    }
}

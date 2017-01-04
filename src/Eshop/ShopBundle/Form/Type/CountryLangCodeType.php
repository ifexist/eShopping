<?php

namespace Eshop\ShopBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CountryLangCodeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('enable', HiddenType::class)
            ->add('country', HiddenType::class)
            ->add('countryName', HiddenType::class)
            ->add('currencyCode', HiddenType::class)
            ->add('population', HiddenType::class)
            ->add('fipsCode', HiddenType::class)
            ->add('isoNumeric', HiddenType::class)
            ->add('north', HiddenType::class)
            ->add('south', HiddenType::class)
            ->add('east', HiddenType::class)
            ->add('west', HiddenType::class)
            ->add('capital', HiddenType::class)
            ->add('continentName', HiddenType::class)
            ->add('continent', HiddenType::class)
            ->add('reaInSqKm', HiddenType::class)
            ->add('langsCode', HiddenType::class)
            ->add('angCountryCode', HiddenType::class)
            ->add('isoAlpha3', HiddenType::class)
            ->add('geonameId', HiddenType::class)
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Eshop\ShopBundle\Entity\Countries'
        ));
    }

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'eshop_shopbundle_countrylangcodetype';
    }
}

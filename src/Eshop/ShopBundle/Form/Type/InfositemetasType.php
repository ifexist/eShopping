<?php

namespace Eshop\ShopBundle\Form\Type;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Doctrine\ORM\EntityRepository;


class InfositemetasType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('metaContentlanguage', HiddenType::class)
                ->add('metaContentype', ChoiceType::class, array(
                    'label' => 'Content type',
                    'choices'  => array(
                        'UTF-8' => true,	
                        'ISO-8859-1' => false,
                        'ISO-8859-15' => false,
                        'cp1252' => false,
                        'BIG5' => false,
                        'GB2312' => false,
                        'BIG5-HKSCS' => false,
                        'Shift_JIS' => false,
                        'EUCJP' => false,
                    ),
                    // *this line is important*
                    'expanded' => false,
                    'choices_as_values' => true,
                ))
                
                
                ->add('metaTitle', TextType::class, array('required' => false))
                ->add('metaDescription', TextareaType::class, array('required' => false))
                ->add('metaKeyword', TextareaType::class, array('required' => true))
                ->add('metaCopyright', TextType::class, array('required' => true))
                ->add('metaAuthor', TextType::class, array('required' => false))
                ->add('metaPublisher', TextType::class, array('required' => false))
                ->add('metaImagelink', TextType::class, array('required' => false))
                ->add('metaReplyto', TextType::class, array('required' => false))
                ->add('metaRobots', ChoiceType::class, array(
                    'label' => 'Robots',
                    'choices'  => array(
                        'all' => true,
                        'none' => false,
                        'index' => false,
                        'noindex' => false,
                        'follow' => false,
                        'noFollow' => false,
                    ),
                    // *this line is important*
                    'expanded' => false,
                    'choices_as_values' => true,
                ))
                ->add('metaRating', ChoiceType::class, array(
                    'label' => 'Rating',
                    'choices'  => array(
                        'general' => true,
                        'mature' => false,
                        'restricted' => false,
                        '14 years' => false,
                    ),
                    // *this line is important*
                    'expanded' => false,
                    'choices_as_values' => true,
                ))
                ->add('metaDistribution', ChoiceType::class, array(
                    'label' => 'Distribution',
                    'choices'  => array(
                        'global' => TRUE,
                        'local' => FALSE,
                        'iu' => FALSE,
                    ),
                    // *this line is important*
                    'expanded' => false,
                    'choices_as_values' => true,
                ))
                ->add('metaGeography', TextType::class, array('required' => true))
                ->add('metaCategory', ChoiceType::class, array(
                    'label' => 'Category',
                    'choices'  => array(
                        'internet' => true,
                        'animals' => false,
                        'astronomy' => false,
                        'economics' => false,
                        'engineering' => false,
                        'environment' => false,
                        'family' => false,
                        'finance' => false,
                        'games' => false,
                        'literature' => false,
                        'software' => false,
                        'photography' => false,
                        'health' => false,
                        'shopping' => false,
                        'sports' => false,
                        'travel' => false,
                    ),
                    // *this line is important*
                    'expanded' => false,
                    'choices_as_values' => true,
                ))
                
                
                ->add('metaRevisitafter', ChoiceType::class, array(
                    'label' => 'Revisit after',
                    'choices'  => array(
                        '15 days' => true,
                        '1 day' => false,
                        '2 days' => false,
                        '3 days' => false,
                        '4 days' => false,
                        '5 days' => false,
                        '6 days' => false,
                        '7 days' => false,
                        '8 days' => false,
                        '9 days' => false,
                        '10 days' => false,
                        '11 days' => false,
                        '12 days' => false,
                        '13 days' => false,
                        '14 days' => false,
                        '16 days' => false,
                        '17 days' => false,
                        '18 days' => false,
                        '19 days' => false,
                        '20 days' => false,
                        '21 days' => false,
                        '22 days' => false,
                        '23 days' => false,
                        '24 days' => false,
                        '25 days' => false,
                        '26 days' => false,
                        '27 days' => false,
                        '28 days' => false,
                        '29 days' => false,
                        '30 days' => false,
                        '31 days' => false,
                    ),
                    // *this line is important*
                    'expanded' => false,
                    'choices_as_values' => true,
                ))
        ;
    }
    
    public function getDefaultLang(Request $request)
    {
        $locale = $request->getLocale();
        if($locale == "fr"){
            $lng = "fr";
        }else{
           $lng = "en"; 
        }
        return $lng;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Eshop\ShopBundle\Entity\Infositemetas'
        ));
    }

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'eshop_shopbundle_infositemetas';
    }
}

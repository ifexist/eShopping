<?php

namespace Eshop\ShopBundle\Form\Type;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
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
                ->add('added', HiddenType::class) 
                ->add('updated', HiddenType::class, array(
                    'attr' => array(
                        'value' => time()
                )))   
                ->add('langcode', HiddenType::class)
                ->add('sitestyle', HiddenType::class)
                ->add('adminstyle', HiddenType::class)
                ->add('prodcats', TextType::class, array('required' => true))
                ->add('namesite', TextType::class, array('required' => false))
                ->add('slogan', TextType::class, array('required' => false))
                ->add('web', TextType::class, array('required' => false))
                ->add('titleservice1', TextType::class, array('required' => false))
                ->add('emailservice1', EmailType::class, array('required' => false))
                ->add('phoneservice1', TextType::class, array('required' => false))
                ->add('contactservice1', TextType::class, array('required' => false))
                ->add('titleservice2', TextType::class, array('required' => false))
                ->add('emailservice2', EmailType::class, array('required' => false))
                ->add('phoneservice2', TextType::class, array('required' => false))
                ->add('contactservice2', TextType::class, array('required' => false))
                ->add('titleservice3', TextType::class, array('required' => false))
                ->add('emailservice3', EmailType::class, array('required' => false))
                ->add('phoneservice3', TextType::class, array('required' => false))
                ->add('contactservice3', TextType::class, array('required' => false))
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
            'data_class' => 'Eshop\ShopBundle\Entity\Infosite'
        ));
    }

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'eshop_shopbundle_infosite';
    }
}

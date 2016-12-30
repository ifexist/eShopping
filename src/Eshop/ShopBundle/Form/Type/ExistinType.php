<?php

namespace Eshop\ShopBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExistinType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('enable', 'checkbox', array(
                    'required' => FALSE))

                ->add('name', TextType::class, array(
                    'label' => 'Name',
                    'required'  => TRUE,
                    'attr' => array(
                        'style' => 'font-size:12px;',
                        'class' => 'col-xs-12')))
                
                ->add('isAttending', ChoiceType::class, array(
                    'label' => 'Field type',
                    'choices'  => array(
                        'Single' => true,
                        'Multiple' => false,
                    ),
                    // *this line is important*
                    'expanded' => true,
                    'choices_as_values' => true,
                ))

                ->add('fieldtype', ChoiceType::class, array(
                    'label' => 'Field type',
                    'required'  => TRUE,
                    'attr' => array(
                        'style' => 'font-size:12px;',
                        'class' => 'col-xs-12')))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Eshop\ShopBundle\Entity\Existin'
        ));
    }

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'eshop_shopbundle_existin';
    }
}

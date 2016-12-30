<?php

namespace Eshop\ShopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Doctrine\ORM\EntityRepository;

class TagTermsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('enable', 'checkbox', array(
                    'label' => 'Enable/Disable',
                    'required' => FALSE))

                ->add('code', 'text', array(
                    'label' => 'Code image',
                    'required'  => TRUE,
                    'attr' => array(
                        'style' => 'font-size:12px;',
                        'class' => 'col-xs-12')))

                ->add('codeicon', 'text', array(
                    'label' => 'Code icon',
                    'required'  => TRUE,
                    'attr' => array(
                        'style' => 'font-size:12px;',
                        'class' => 'col-xs-12')))

                ->add('name', 'text', array(
                    'label' => 'Term of Taxonomy',
                    'required'  => TRUE,
                    'attr' => array(
                        'style' => 'font-size:12px;',
                        'class' => 'col-xs-12')))

                ->add('bgcolor', 'text', array(
                    'label' => 'Background color',
                    'required'  => FALSE,
                    'attr' => array(
                        'style' => 'font-size:12px;',
                        'class' => 'col-xs-12')))
            
                ->add('cid', 'entity', array(
                        'label' => 'Taxonomy Cotegoy',
                        'class' => 'ApiCommonBundle:TagCategories',
                        'query_builder' => function(EntityRepository $er) {
                            return $er->createQueryBuilder('txc')
                                ->orderBy('txc.cat', 'DESC');
                        },
                        'empty_value' => '',
                        'property' => 'cat',
                        'required' => TRUE,
                        'attr' => array(
                            'style' => 'font-size:11px;',
                        )
                ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ShopBundle:TagTerms'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'api_commonbundle_tagtermstype';
    }
}
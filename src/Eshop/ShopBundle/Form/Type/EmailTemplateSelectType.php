<?php

namespace Eshop\ShopBundle\Form\Type;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class EmailTemplateSelectType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder
             ->add('email_template_id', 'entity', array(
                 'attr' => array(
                     'class' => 'email_template_ids'
                 ),
                'translation_domain' => 'EmailTemplate',
                'empty_value' => 'eshop.email-template.select template',
                'required' => false,
                'class' => 'EmailTemplateBundle:EmailTemplate',
                'property' => 'title',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('et')
                        ->orderBy('et.title', 'ASC');
                },
            ))
            ->add('template', 'textarea')
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'email_template_select';
    }
}

<?php

namespace Eshop\ShopBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Eshop\ShopBundle\Form\Type\EmailTemplateSelectType;

/**
 * @todo Deprecate?
 */
class EmailTemplateSelectTestType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email_template', 'email_template_select', array(
                'required' => false,
                'label' => 'eshop.email-template.email',
                'translation_domain' => 'EmailTemplate'
            ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'EmailTemplateSelectTest';
    }
}

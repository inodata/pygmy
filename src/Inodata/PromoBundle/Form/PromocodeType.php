<?php

namespace Inodata\PromoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PromocodeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('confirmation_token')
            ->add('downloads')
            ->add('is_valid')
            ->add('promo')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Inodata\PromoBundle\Entity\Promocode'
        ));
    }

    public function getName()
    {
        return 'inodata_promobundle_promocodetype';
    }
}

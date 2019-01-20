<?php

namespace StoreBundle\Form\Type;

use StoreBundle\Entity\Customer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CustomerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('last_name')
            ->add('email', EmailType::class)
            ->add('phone', TelType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->resolve([
            'data_class' => Customer::class,
        ]);
    }
}


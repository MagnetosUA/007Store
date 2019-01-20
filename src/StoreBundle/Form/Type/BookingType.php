<?php

namespace StoreBundle\Form\Type;

use StoreBundle\Entity\Booking;
use StoreBundle\Entity\Customer;
use StoreBundle\Entity\Product;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class php extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('products', EntityType::class, [
                'data_class' => Product::class,
            ])
            ->add('customer', EntityType::class, [
                'data_class' => Customer::class,
            ])
            ->add('status')
            ->add('delivery_address');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->resolve([
            'data_class' => Booking::class,
        ]);
    }
}


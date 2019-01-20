<?php

namespace StoreBundle\Form\Type;

use StoreBundle\Entity\Category;
use StoreBundle\Entity\Image;
use StoreBundle\Entity\Product;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('category', EntityType::class, [
                'data_class' => Category::class,
            ])
            ->add('price', IntegerType::class)
            ->add('image', EntityType::class, [
                'data_class' => Image::class,
            ])
            ->add('created', DateType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->resolve([
           'data_class' => Product::class,
        ]);
    }
}


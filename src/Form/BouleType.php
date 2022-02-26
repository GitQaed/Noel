<?php

namespace App\Form;

use App\Entity\Boule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class BouleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre',TextType::class, ["required" => false])
            ->add('description', TextType::class, ["required" => false])
            ->add('prix', IntegerType::class, ["required" => false])
            ->add('promotion')
            ->add('photo', TextType::class, ["required" => false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Boule::class,
        ]);
    }
}
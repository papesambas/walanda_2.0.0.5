<?php

namespace App\Form;

use App\Entity\LieuNaissances;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LieuNaissancesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('designation')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('slug')
            ->add('commune')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => LieuNaissances::class,
        ]);
    }
}

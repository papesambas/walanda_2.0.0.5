<?php

namespace App\Form;

use App\Entity\Meres;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MeresType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fullname')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('slug')
            ->add('nom')
            ->add('prenom')
            ->add('profession')
            ->add('telephone')
            ->add('nina')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Meres::class,
        ]);
    }
}

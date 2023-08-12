<?php

namespace App\Form;

use App\Entity\EcoleProvenances;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EcoleProvenancesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('designation')
            ->add('adresse')
            ->add('telephone')
            ->add('email')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('slug')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => EcoleProvenances::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\Telephones;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TelephonesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numero')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('slug')
            ->add('peres')
            ->add('meres')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Telephones::class,
        ]);
    }
}

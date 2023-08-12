<?php

namespace App\Form;

use App\Entity\Etablissements;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtablissementsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('designation')
            ->add('formeJuridique')
            ->add('adresse')
            ->add('numDecisionCreation')
            ->add('numDecisionOuverture')
            ->add('dateOuverture')
            ->add('numSocial')
            ->add('numFiscal')
            ->add('telephone')
            ->add('telephoneMobile')
            ->add('cpteBancaire')
            ->add('email')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('slug')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Etablissements::class,
        ]);
    }
}

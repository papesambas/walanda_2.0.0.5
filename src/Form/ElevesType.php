<?php

namespace App\Form;

use App\Entity\Eleves;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ElevesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('matricule')
            ->add('sexe')
            ->add('statutFinance')
            ->add('dateNaissance')
            ->add('dateExtrait')
            ->add('numExtrait')
            ->add('isAdmis')
            ->add('isActif')
            ->add('isHandicap')
            ->add('natureHandicap')
            ->add('dateInscription')
            ->add('dateRecrutement')
            ->add('fullname')
            ->add('adresse')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('slug')
            ->add('nom')
            ->add('prenom')
            ->add('lieuNaissance')
            ->add('classe')
            ->add('statut')
            ->add('ecoleAnDernier')
            ->add('ecoleRecrutement')
            ->add('departement')
            ->add('scolarite1')
            ->add('scolarite2')
            ->add('scolarite3')
            ->add('redoublement1')
            ->add('redoublement2')
            ->add('redoublement3')
            ->add('user')
            ->add('parent')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Eleves::class,
        ]);
    }
}

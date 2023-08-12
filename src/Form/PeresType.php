<?php

namespace App\Form;

use App\Entity\Noms;
use App\Entity\Ninas;
use App\Entity\Peres;
use App\Entity\Prenoms;
use App\Entity\Telephones;
use App\Entity\Professions;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PeresType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', EntityType::class, [
                'label' => 'Nom',
                'class' => Noms::class,
                'placeholder' => 'Entrer ou Choisir un Nom',
                'choice_label' => 'designation',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('n')
                        ->orderBy('n.designation', 'ASC');
                },
                'attr' => [
                    'class' => 'select-nomfamille',
                    'allow-clear' => 'true', // Permet de vider la sélection
                ],
                'required' => false,
                'error_bubbling' => false,
            ])
            ->add('prenom', EntityType::class, [
                'class' => Prenoms::class,
                'choice_label' => 'designation',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('p')
                        ->orderBy('p.designation', 'ASC');
                },
                'placeholder' => 'Entrer ou Choisir un prénom',
                'attr' => [
                    'class' => 'select-prenom',
                    'allow-clear' => 'true', // Permet de vider la sélection
                ],
                'required' => false,
                'error_bubbling' => false,
            ])
            ->add('profession', EntityType::class, [
                'label' => 'Porfession',
                'class' => Professions::class,
                'choice_label' => 'designation',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('p')
                        ->orderBy('p.designation', 'ASC');
                },
                'placeholder' => 'Entrer ou Choisir une profession',
                'attr' => [
                    'class' => 'select-profession',
                    'allow-clear' => 'true', // Permet de vider la sélection
                ],
                'required' => false,
                'error_bubbling' => false,
            ])
            ->add('telephone', EntityType::class, [
                'label' => '# Téléphone',
                'class' => Telephones::class,
                'placeholder' => 'Entrer ou Choisir un # de téléphone',
                'choice_label' => 'numero',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('t')
                        ->orderBy('t.numero', 'ASC');
                },
                'attr' => [
                    'class' => 'select-telephone',
                    // Ajoutez les attributs personnalisés ici (sans le préfixe 'data-')
                    'placeholder' => 'Sélectionnez un numéro de téléphone',
                    'allow-clear' => 'true', // Permet de vider la sélection
                ],
                'required' => false,
                'error_bubbling' => false,
            ])
            ->add('nina', EntityType::class, [
                'label' => '# Nina',
                'class' => Ninas::class,
                'placeholder' => 'Entrer ou Choisir un # Nina',
                'choice_label' => 'designation',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('n')
                        ->orderBy('n.designation', 'ASC');
                },
                'attr' => [
                    'class' => 'select-nina',
                    // Ajoutez les attributs personnalisés ici (sans le préfixe 'data-')
                    'placeholder' => 'Sélectionnez un numéro nina',
                    'allow-clear' => 'true', // Permet de vider la sélection
                ],
                'required' => false,
                'error_bubbling' => false,
            ]);;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Peres::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\Parents;
use App\Entity\Telephones;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParentsRechercheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('SearchPere', EntityType::class, [
                'label' => '# Téléphone',
                'class' => Telephones::class,
                'placeholder' => 'Entrer ou Choisir un # de téléphone',
                'choice_label' => 'numero',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('t')
                        ->orderBy('t.numero', 'ASC');
                },
                'attr' => [
                    'class' => 'select-Peretelephone',
                    // Ajoutez les attributs personnalisés ici (sans le préfixe 'data-')
                    'placeholder' => 'Sélectionnez un numéro de téléphone',
                    'allow-clear' => 'true', // Permet de vider la sélection
                ],
                'mapped' => false,
                'required' => false,
                'error_bubbling' => false,
            ])
            ->add('pere', PeresType::class)
            ->add('SearchMere', EntityType::class, [
                'label' => '# Téléphone',
                'class' => Telephones::class,
                'placeholder' => 'Entrer ou Choisir un # de téléphone',
                'choice_label' => 'numero',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('t')
                        ->orderBy('t.numero', 'ASC');
                },
                'attr' => [
                    'class' => 'select-Meretelephone',
                    // Ajoutez les attributs personnalisés ici (sans le préfixe 'data-')
                    'placeholder' => 'Sélectionnez un numéro de téléphone',
                    'allow-clear' => 'true', // Permet de vider la sélection
                ],
                'mapped' => false,
                'required' => false,
                'error_bubbling' => false,
            ])
            ->add('mere', MeresType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Parents::class,
        ]);
    }
}

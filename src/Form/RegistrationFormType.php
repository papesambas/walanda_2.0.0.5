<?php

namespace App\Form;

use App\Entity\Noms;
use App\Entity\Users;
use App\Entity\Prenoms;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class RegistrationFormType extends AbstractType
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
                    'class' => 'select-nomfamille'
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
                    'class' => 'select-prenom'
                ],
                'required' => false,
                'error_bubbling' => false,
            ])
            ->add('username', TextType::class, [
                'attr' => ['placeholder' => "Nom d'utilisateur"],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your username should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 50,
                    ]),
                ],

                'error_bubbling' => false,
            ])
            ->add('telephone', TelType::class, [
                'label' => 'Téléphone',
                'attr' => [
                    'placeholder' => 'exemple +22300000000',
                ],
                'constraints' => new Length([
                    'min' => 12,
                    'minMessage' => 'Your phone number should be at least {{ limit }} characters',
                    // max length allowed by Symfony for security reasons
                    'max' => 12,
                ]),
            ])
            ->add('email', EmailType::class, [
                'label' => "E-mail",
                'required' => True,
                'attr' => [
                    'placeholder' => 'exemple@email.fr',
                ]
            ])
            ->add('adresse', TextareaType::class, [
                'attr' => [
                    'placeholder' => 'Votre adresse ici',
                ],
            ])
            ->add('RGPDConsent', CheckboxType::class, [
                'mapped' => false,
                'label' => 'Consentement',
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            ->add('plainPassword', RepeatedType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'type' => PasswordType::class,
                'options' => [
                    'attr' => [
                        'type' => 'password'
                    ]
                ],
                'first_options' => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'confirmer le mot de passe'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
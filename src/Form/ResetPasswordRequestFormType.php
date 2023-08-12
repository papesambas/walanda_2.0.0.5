<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
<<<<<<< HEAD:src/Form/ResetPasswordRequestType.php
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
=======
use Symfony\Component\Validator\Constraints\NotBlank;
>>>>>>> b9bfd1581cf1d182a9b857f4d519ca584e8cdf49:src/Form/ResetPasswordRequestFormType.php

class ResetPasswordRequestFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
<<<<<<< HEAD:src/Form/ResetPasswordRequestType.php
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
            ]);
=======
            ->add('email', EmailType::class, [
                'attr' => ['autocomplete' => 'email'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter your email',
                    ]),
                ],
            ])
        ;
>>>>>>> b9bfd1581cf1d182a9b857f4d519ca584e8cdf49:src/Form/ResetPasswordRequestFormType.php
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([]);
    }
}

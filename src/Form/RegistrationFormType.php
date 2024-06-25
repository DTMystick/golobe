<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        
        ->add('lastName', TextType::class, [
            'label' => ' ',
            'attr' => [
                'placeholder' => 'Last name'
            ]
        ])
        ->add('firstName', TextType::class, [
            'label' => ' ',
            'attr' => [
                'placeholder' => 'First name'
            ]
        ])
        ->add('email', EmailType::class, [
            'label' => ' ',
            'attr' => ['class' => 'form-control',
                'placeholder' => 'Email'
            ]])


            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                    'label' => ' ',
                    'invalid_message' => 'La confirmation du mot de passe doit être conforme au mot de passe',
                    'required' => true,
                    'first_options' => [
                        'label' => ' ',
                        'attr' => [
                            'placeholder' => 'Password'
                        ]
                    ],
                    'second_options' => [
                        'label' => ' ',
                        'attr' => [
                            'placeholder' => 'Confirmation password'
                        ]
                    ]
            ])

            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
                ])

        
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}

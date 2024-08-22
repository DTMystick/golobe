<?php

namespace App\Form;

use App\Entity\Activity; // Entity reference
use Symfony\Component\Form\AbstractType; // Base form class
use Symfony\Component\Form\FormBuilderInterface; // Form builder interface
use Symfony\Component\Form\Extension\Core\Type\TextType; // Text input type
use Symfony\Component\Form\Extension\Core\Type\MoneyType; // Money input type
use Symfony\Component\Form\Extension\Core\Type\TextareaType; // Textarea input type
use Symfony\Component\Form\Extension\Core\Type\FileType; // File input type
use Symfony\Component\OptionsResolver\OptionsResolver; // Form options resolver

class ActivityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // Form fields
        $builder
            ->add('name', TextType::class, [
                'label' => 'Name of the Activity', // Field label
                'attr' => ['class' => 'form-control'] // HTML attributes
            ])
            ->add('price', MoneyType::class, [
                'label' => 'Price', // Field label
                'currency' => 'USD', // Currency type
                'attr' => ['class' => 'form-control'] // HTML attributes
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description', // Field label
                'attr' => ['class' => 'form-control'] // HTML attributes
            ])
            ->add('imageFilename', FileType::class, [
                'label' => 'Upload Image', // Field label
                'required' => false, // Optional field
                'mapped' => false, // This field is not directly mapped to the Entity property
                'attr' => ['class' => 'form-control'] // HTML attributes
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        // Link form to Activity entity
        $resolver->setDefaults([
            'data_class' => Activity::class, // Data class entity
        ]);
    }
}

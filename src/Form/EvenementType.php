<?php

namespace App\Form;

use App\Entity\Evenement;
use Gregwar\CaptchaBundle\Type\CaptchaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class EvenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('idUser', TextType::class, [
                'label' => 'User ID',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'User ID'
                ]
            ])
            ->add('date', DateType::class, [
                'label' => 'Event Date',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control'
                ],
                'data' => new \DateTime(), 
            ])
            ->add('evenementType', ChoiceType::class, [
                'label' => 'Event Type',
                'choices' => [
                    'Italien' => 'italien',
                    'Asiatique' => 'asiatique',
                    'Thailandai' => 'thailandai',
                    'Tunisien' => 'tunisien',
                ],
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'attr' => [
                    'class' => 'form-control',
                    'rows' => 4
                ]
            ])
            ->add('location', TextType::class, [
                'label' => 'Location',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Location'
                ]
            ])
            ->add('status', ChoiceType::class, [
                'label' => 'Status',
                'choices' => [
                    'Debute' => 'debute',
                    'Encours' => 'encours',
                    'Terminé' => 'terminé',
                ],
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('imageurl', FileType::class, [
                'label' => 'Image URL',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Image URL'
                ],
                
                'required'=>false,
                 'mapped'=>false,
            ])
            ->add('captcha', CaptchaType::class, [
                'label' => 'Please enter the captcha',
                'mapped' => false,
                'attr' => [
                    'placeholder' => 'Enter the captcha',
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Send',
                'attr' => [
                    'class' => 'btn btn-primary'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Evenement::class,
        ]);
    }
}

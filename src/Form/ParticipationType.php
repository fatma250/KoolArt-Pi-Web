<?php

namespace App\Form;

use App\Entity\Evenement;
use App\Entity\Participation;
use Gregwar\CaptchaBundle\Type\CaptchaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ParticipationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('userId', IntegerType::class, [
                'label' => 'User ID',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'User ID'
                ]
            ])
            ->add('eventId', EntityType::class, [
                'class' => Evenement::class,
                'choice_label' => 'id',
                'label' => 'Event',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Select Event'
                ]
            ])
            ->add('participationDate', DateTimeType::class, [
                'label' => 'Participation Date',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control'
                ],
                'data' => new \DateTime(), 
            ])
            ->add('participationStatus', ChoiceType::class, [
                'label' => 'Participation Status',
                'choices' => [
                    'In' => 'In',
                    'CANCEL' => 'CANCEL',
                ],
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('numero', IntegerType::class, [
                'label' => 'Number',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Number'
                ]
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
            'data_class' => Participation::class,
        ]);
    }
}

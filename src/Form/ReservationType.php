<?php

namespace App\Form;

use App\Entity\Reservation;
use App\Entity\Table;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('idUser', IntegerType::class, [
                'label' => 'User ID',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'User ID'
                ]
            ])
            ->add('dateReservation', DateType::class, [
                'label' => 'Reservation Date',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('nombrePersonnes', IntegerType::class, [
                'label' => 'Number of People',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Number of People'
                ]
            ])
            ->add('idRestaurant', IntegerType::class, [
                'label' => 'Restaurant ID',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Restaurant ID'
                ]
            ])
            ->add('heureReservation', TextType::class, [
                'label' => 'Reservation Time',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('idTable', EntityType::class, [
                'class' => Table::class,
                'choice_label' => 'idTable', // Assuming you want to display the description of the table
                'label' => 'Table',
                'attr' => [
                    'class' => 'form-control',
                ],
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('t')
                        ->leftJoin('App\Entity\Reservation', 'r', 'WITH', 'r.idTable = t.idTable')
                        ->where('r.idTable IS NULL');
                },
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
            'data_class' => Reservation::class,
        ]);
    }
}

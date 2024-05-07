<?php

namespace App\Form;

use App\Entity\Table;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TableType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('typeTable', ChoiceType::class, [
                'label' => 'Table Type',
                'choices' => [
                    'Regular' => 'regular',
                    'VIP' => 'vip',
                    'Outdoor' => 'outdoor',
                ],
                'required' => true,
                // Add more options as needed
            ])
            ->add('emplacement', TextType::class, [
                'label' => 'Location',
                'required' => true,
                // Add more options as needed
            ])
            ->add('etatTable', ChoiceType::class, [
                'label' => 'Table Status',
                'choices' => [
                    'Available' => 'available',
                    'Occupied' => 'occupied',
                    'Reserved' => 'reserved',
                ],
                'required' => true,
                // Add more options as needed
            ])
            ->add('description', TextType::class, [
                'label' => 'Description',
                'required' => true,
                // Add more options as needed
            ])
            ->add('idRestaurant', TextType::class, [
                'label' => 'Restaurant ID',
                'required' => false,
                // Add more options as needed
            ])
            ->add('isreserver', CheckboxType::class, [
                'label' => 'Reserved?',
                'required' => false,
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Send',
                'attr' => [
                    'class' => 'btn btn-primary'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Table::class,
        ]);
    }
}

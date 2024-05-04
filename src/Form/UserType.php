<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email',EmailType::class)
            ->add('prenom')
            ->add('nom')
            ->add('cin', null, [
                'constraints' => [
                    new Length([
                        'min' => 8,
                        'max' => 8,
                        'minMessage' => 'Your CIN must be exactly 8 characters long.',
                        'maxMessage' => 'Your CIN must be exactly 8 characters long.',
                    ]),
                ],
            ])        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}

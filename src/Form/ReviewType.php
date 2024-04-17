<?php
namespace App\Form;
use App\Entity\Review;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
class ReviewType extends AbstractType

{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('rating', ChoiceType::class, [
                'choices' => [
                    5 => '5 stars',
                    4 => '4 stars',
                    3 => '3 stars',
                    2 => '2 stars',
                    1 => '1 star',
                ],
                'expanded' => true,
                'multiple' => false,
            ])
            ->add('comment')
            ->add('recette')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Review::class,
        ]);
    }
}

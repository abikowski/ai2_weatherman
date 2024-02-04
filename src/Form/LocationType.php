<?php

namespace App\Form;

use App\Entity\Location;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class LocationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder,  array $options): void
    {
        $builder
            ->add('city', null,[
                'attr' => [
                    'placeholder' => 'City name'
                ],
            ])
            ->add('country', ChoiceType::class, [
                'choices' => [
                    'Poland' => 'PL',
                    'Germany' => 'DE',
                    'United States' => 'USA',
                    'Japan' => 'JP',
                    'France' => 'FR',
                    'United Kingdom' => 'GB',
                    'Brasil' => 'BR',
                ],
            ])
            ->add('latitude', null,[
                'attr' => [
                    'placeholder' => 'Enter latitude (-90 to 90)'
                ],
            ])
            ->add('longitude', null,[
                'attr' => [
                    'placeholder' => 'Enter longitude (-180 to 180)'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Location::class,
        ]);
    }
}

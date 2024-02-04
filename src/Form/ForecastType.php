<?php

namespace App\Form;

use App\Entity\Forecast;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ForecastType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('temperature', null,[
                'attr' => [
                    'placeholder' => 'Enter Temperature'
                ]
            ])
            ->add('humidity', null,[
                'attr' => [
                    'placeholder' => 'Enter Humidity'
                ]
            ])
            ->add('wind_dir', ChoiceType::class, [
                'choices' => [
                    'North' => 'N',
                    'NorthEast' => 'NE',
                    'East' => 'E',
                    'SouthEast' => 'SE',
                    'South' => 'S',
                    'SouthWest' => 'SW',
                    'West' => 'W',
                    'NorthWest' => 'NW',
                ],
            ])
            ->add('wind_spd', null,[
                'attr' => [
                    'placeholder' => 'Enter Wind Speed'
                ]
            ])
            ->add('time', TimeType::class)
            ->add('timespan', DateTimeType::class)
            ->add('overcast', ChoiceType::class, [
                'choices' => [
                    'none' => 0.000,
                    '1/8' => 0.125,
                    '2/8' => 0.250,
                    '3/8' => 0.375,
                    '4/8' => 0.500,
                    '5/8' => 0.625,
                    '6/8' => 0.750,
                    '7/8' => 0.825,
                    'full' => 1.000,
                ],
            ])
            ->add('date', DateType::class)
            ->add('location', LocationType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Forecast::class,
        ]);
    }
}

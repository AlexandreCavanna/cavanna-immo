<?php

namespace App\Form;

use App\Entity\Housing;
use App\Entity\Building;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

class HousingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lot', TextType::class, [
                'label'  => 'n° de Lot',
            ])
            ->add('type', TextType::class)
            ->add('rent', MoneyType::class, [
                'label'  => 'Loyer',
                'required'=>false
            ])
            ->add('electricity', MoneyType::class, [
                'label'  => 'Electricité',
                'required'=>false
            ])
            ->add('various_maintenance', MoneyType::class, [
                'label'  => 'Entretiens divers',
                'required'=>false
            ])
            ->add('outdoor_maintenance', MoneyType::class, [
                'label'  => 'Entretiens extérieur',
                'required'=>false
            ])
            ->add('building', EntityType::class, [
                'class' => Building::class,
                'label'  => 'Lié à l\'immeuble',

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Housing::class,
        ]);
    }
}

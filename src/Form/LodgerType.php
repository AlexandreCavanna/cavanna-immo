<?php

namespace App\Form;

use App\Entity\Housing;
use App\Entity\Lodger;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class LodgerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'label'  => 'Prénom',
            ])
            ->add('name', TextType::class, [
                'label'  => 'Nom',
            ])
            ->add('phone', TelType::class, [
                'label'  => 'Téléphone'
            ])
            ->add('housing', EntityType::class, [
                'class' => Housing::class,
                'label'  => 'Lié au logement',

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Lodger::class,
        ]);
    }
}

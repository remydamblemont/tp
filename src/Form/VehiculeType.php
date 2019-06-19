<?php

namespace App\Form;

use App\Entity\BrandVehicule;
use App\Entity\ColorVehicule;
use App\Entity\Kind;
use App\Entity\ModelVehicule;
use App\Entity\Vehicule;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VehiculeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Seat', IntegerType::class, [
                'label' => 'Nombre de place assise '
            ])
            ->add('Kind', EntityType::class, [
                'class' => Kind::class,
                'choice_label' => 'Type',
                'label' => 'Type de véhicule '
            ])
            ->add('Brand', EntityType::class, [
                'class' => BrandVehicule::class,
                'choice_label' => 'Name',
                'label' => 'Marque '
            ])
            ->add('Model', EntityType::class, [
                'class' => ModelVehicule::class,
                'choice_label' => 'Name',
                'label' => 'Model '
            ])
            ->add('Color', EntityType::class, [
                'class' => ColorVehicule::class,
                'choice_label' => 'Color',
                'label' => 'Couleur '
            ])
            ->add('Enregistrer', SubmitType::class, [])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Vehicule::class,
        ]);
    }
}

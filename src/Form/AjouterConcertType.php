<?php

namespace App\Form;

use App\Entity\Concert;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AjouterConcertType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('nom', TextType::class)
        ->add('band', ChoiceType::class, [
            'required' => true,
            'multiple' => false,
            'choices' => [
                'Dies Irae'=> 'Dies Irae',
                'Geminii' => 'Geminii',
                'Bismuth' => 'Bismuth',
                'Entertain Us' => 'Entertain Us',
                'Serial Clock Killer' => 'Serial Clock Killer',
                'Djoh' => 'Djoh'
            ]
        ])
        ->add('date', DateType::class)
        ->add('heure', TimeType::class)
        ->add('save', SubmitType::class, array('label' => 'Ajouter'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Concert::class,
        ]);
    }
}

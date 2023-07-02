<?php

namespace App\Form;

use App\Entity\Program;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;


class ProgramType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class)
            //->add('poster', FileType::class)
            ->add('synopsis', TextType::class)
            ->add('country', TextType::class)
            ->add('year', TextType::class)
            //->add('category', TextType::class)
            //Quest 14: asked to write the below sentence instead of the above one
            //Create error: to be fixed later
            ->add('category', null, ['choice_label' => 'name'])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Program::class,
        ]);
    }
}

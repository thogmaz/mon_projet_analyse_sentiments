<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('query', TextType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Search...',
                ],
            ])
            ->add('sort', ChoiceType::class, [
                'label' => 'Sort By',
                'required' => false,
                'choices' => [
                    'Relevance' => 'relevance',
                    'Newest' => 'newest',
                    'Oldest' => 'oldest',
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Search',
            ]);
    }
}

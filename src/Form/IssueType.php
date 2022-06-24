<?php

namespace App\Form;

use App\Entity\Issue;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IssueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class,['label' => 'Название'])
            ->add('month', ChoiceType::class, [
            'choices' => [
            'Январь' => 'Январь',
            'Февраль' => 'Февраль',
            'Март' => 'Март',
            'Апрель' => 'Апрель',
            'Май' => 'Май',
            'Июнь' => 'Июнь',
            'Июль' => 'Июль',
            'Август' => 'Август',
            'Сентябрь' => 'Сентябрь',
            'Октябрь' => 'Октябрь',
            'Ноябрь' => 'Ноябрь',
            'Декабрь' => 'Декабрь',
        ],
        'label' => 'Месяц'
    ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Issue::class,
        ]);
    }
}

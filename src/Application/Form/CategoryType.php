<?php

declare(strict_types=1);

namespace App\Application\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('category')
            ->add('name')
            ->add('price')
            ->add('currency')
            ->add('save', SubmitType::class)
        ;
    }
}
<?php

namespace App\Form;

use Symfony\UX\FormCollection\Form\UXCollectionType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Valid;

class ComplexType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('street_address', TextType::class)
            ->add('customers', UXCollectionType::class, [
                'entry_type' => CustomerType::class,
                'allow_add' => true,
                'allow_delete' => false,
                'constraints' => [
                    new Valid()
                ],
                'button_add' => [
                    'class' => 'btn btn-outline-primary'
                ],
                'button_delete' => [
                    'class' => 'btn btn-outline-secondary'
                ],
            ])
            ->add('embed', UXCollectionType::class, [
                'entry_type' => CustomerType::class,
                'allow_add' => true,
                'allow_delete' => false,
                'constraints' => [
                    new Valid()
                ],
                'button_add' => [
                    'class' => 'btn btn-outline-primary'
                ],
                'button_delete' => [
                    'class' => 'btn btn-outline-secondary'
                ],
            ])
            ->add('customers_old', CollectionType::class, [
                'entry_type' => CustomerType::class,
                'allow_add' => true,
                'allow_delete' => false
            ])
            ->add('submit', SubmitType::class)
        ;
    }
}

<?php

namespace App\Form;

use Stakovicz\UXCollection\Form\UXCollectionType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Valid;

class SimpleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('emails', UXCollectionType::class, [
                'entry_type' => EmailType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'attr' => [
                    'data-controller' => 'mycollection',
                ],
                'entry_options' => [
                    'constraints' => [
                        new NotBlank()
                    ],
                ],
                'constraints' => [
                    new Valid()
                ],
                'button_add' => [
                    'text' => 'Add an email',
                    'attr' => ['class' => 'btn btn-primary']
                ],
                'button_delete' => [
                    'text' => 'Remove this email',
                    'attr' => ['class' => 'btn btn-secondary']
                ],
            ])
            ->add('submit', SubmitType::class)
        ;
    }
}
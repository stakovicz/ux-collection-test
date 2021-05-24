<?php

namespace App\Form;

use Symfony\UX\FormCollection\Form\UXCollectionType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
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
                        new NotBlank(['message' => 'This email should not be blank.'])
                    ],
                ],
                'constraints' => [
                    new Valid()
                ],
                'button_add_text' => 'Add an email',
                'button_add_class' => 'btn btn-primary',
                'button_delete_text' => 'Remove this email',
                'button_delete_class' => 'btn btn-secondary',
            ])
            ->add('submit', SubmitType::class)
        ;
    }
}

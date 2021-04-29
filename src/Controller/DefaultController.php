<?php

namespace App\Controller;

use App\Form\CustomerType;
use Stakovicz\UXCollection\Form\UXCollectionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="bootstrap4")
     */
    public function bootstrap4(): Response
    {
        $parameters = $this->prepareParameters();
        return $this->render('default/bootstrap_4.html.twig', $parameters);
    }

    /**
     * @Route("/form_table", name="form_table")
     */
    public function formTable(): Response
    {
        $parameters = $this->prepareParameters();
        return $this->render('default/form_table.html.twig', $parameters);
    }

    private function prepareParameters(): array
    {
        $formSimple = $this->createFormBuilder([
                'emails' => [
                    'email-1@example.com',
                    'email-2@example.com',
                ]
            ])
            ->add('emails', UXCollectionType::class, [
                'entry_type' => EmailType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'attr' => [
                    'data-controller' => 'mycollection',
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
            ->getForm();

        $formComplex = $this->createFormBuilder([
                'customers' => [
                    ['givenName' => 'John']
                ],
                'customers_old' => [
                    ['givenName' => 'Pierre'],
                    ['givenName' => 'Paul'],
                ]
            ])
            ->add('street_address', TextType::class)
            ->add('customers', UXCollectionType::class, [
                'entry_type' => CustomerType::class,
                'allow_add' => true,
                'allow_delete' => false
            ])
            ->add('customers_old', CollectionType::class, [
                'entry_type' => CustomerType::class,
                'allow_add' => true,
                'allow_delete' => false
            ])
            ->getForm();

        return [
            'form_simple' => $formSimple->createView(),
            'form_complex' => $formComplex->createView(),
        ];
    }

}

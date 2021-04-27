<?php

namespace App\Controller;

use App\Form\CustomerType;
use Stakovicz\UXCollection\Form\UXCollectionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(): Response
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
                ]
            ])
            ->add('customers', UXCollectionType::class, [
                'entry_type' => CustomerType::class,
                'allow_add' => true,
                'allow_delete' => false
            ])
            ->getForm();

        return $this->render('default/index.html.twig', [
            'form_simple' => $formSimple->createView(),
            'form_complex' => $formComplex->createView(),
        ]);
    }

}

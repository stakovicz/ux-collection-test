<?php

namespace App\Controller;

use App\Form\SimpleType;
use App\Form\ComplexType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{

    /**
     * @Route("/", name="manual")
     */
    public function manual(Request $request): Response
    {
        return $this->action($request, 'default/manual.html.twig');
    }

    /**
     * @Route("/form_div", name="bootstrap4")
     */
    public function bootstrap4(Request $request): Response
    {
        return $this->action($request, 'default/bootstrap_4.html.twig');
    }

    /**
     * @Route("/form_table", name="form_table")
     */
    public function formTable(Request $request): Response
    {
        return $this->action($request, 'default/form_table.html.twig');
    }

    private function action(Request $request, string $template): Response
    {
        $formSimple = $this->createForm(SimpleType::class, [
            'emails' => [
                'email-1@example.com',
                'email-2@example.com',
            ]
        ], [
            'attr' => ['novalidate' => 'novalidate']
        ]);

        $formComplex = $this->createForm(ComplexType::class, [
            'customers' => [
                ['givenName' => 'John', 'familyName' => 'Doe']
            ],
            'customers_old' => [
                ['givenName' => 'Pierre'],
                ['givenName' => 'Paul'],
            ]
        ], [
            'attr' => ['novalidate' => 'novalidate']
        ]);

        $formSimple->handleRequest($request);
        $formComplex->handleRequest($request);

        return $this->render($template, [
            'form_simple' => $formSimple->createView(),
            'form_complex' => $formComplex->createView(),
        ]);
    }
}

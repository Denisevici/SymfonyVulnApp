<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

class FormController extends AbstractController
{
    #[Route('route11')]
    public function my_func(Request $request): Response
    {
        // creates a foo object and initializes some data for this example
        $foo = new Foo();
        $foo->setFoo('foo');
        $foo->setBar(0);

        // no vulnerability here
        $foo->pvo();
        $form = $this->createFormBuilder($foo)
            ->add('foo')
            ->add('bar')
            ->setMethod('GET')
            ->getForm();

        $form->handleRequest($request);
        $foo->pvo();

        return new Response(
            sprintf("Hello %s", $request->get('name'))
        );
    }

    #[Route('route12')]
    public function my_func_2(Request $request): Response
    {
        // creates a foo object and initializes some data for this example
        $foo = new Foo();
        $foo->setFoo('foo');
        $foo->setBar(0);

        // no vulnerability here
        $foo->pvo();
        $form = $this->createForm(FooType::class, $foo);

        $form->handleRequest($request);
        $foo->pvo();

        return new Response(
            sprintf("Hello %s", $request->get('name'))
        );
    }
}

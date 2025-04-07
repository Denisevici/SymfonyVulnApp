<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Twig\Environment;

class RenderController extends AbstractController
{
    #[Route("route20")]
    public function my_func(Request $request): Response
    {
        return $this->render('lucky/number.html.twig', ['number' => $request->get('number')]); // vuln CrossSiteScripting
    }

    #[Route("route21")]
    public function my_func_1(Request $request): Response
    {
        return $this->renderView('lucky/number.html.twig', ['number' => $request->get('number')]); //vuln CrossSiteScripting
    }

    #[Route("route22")]
    public function my_func_2(Request $request): Response
    {
        return $this->renderBlock('lucky/number.html.twig', 'block', ['number' => $request->get('number')]); //vuln CrossSiteScripting
    }

    #[Route("route23")]
    public function my_func_3(Request $request): Response
    {
        return $this->renderBlockView('lucky/number.html.twig', 'block', ['number' => $request->get('number')]); //vuln CrossSiteScripting
    }

    #[Route("route24")]
    public function my_func_4(Request $request, Environment $twig): Response
    {
        return $twig->render('lucky/number.html.twig', ['number' => $request->get('number')]); // vuln CrossSiteScripting
    }
}

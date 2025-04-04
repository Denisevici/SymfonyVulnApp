<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Twig\Environment;

class RenderController extends AbstractController
{
    #[Route("route4")]
    public function render_test(Request $request): Response
    {
        return $this->render('lucky/number.html.twig', ['number' => $request->get('number')]); // vuln
    }

    #[Route("route5")]
    public function render_view_test(Request $request): Response
    {
        return $this->renderView('lucky/number.html.twig', ['number' => $request->get('number')]); //vuln
    }

    #[Route("route6")]
    public function render_block_test(Request $request): Response
    {
        return $this->renderBlock('lucky/number.html.twig', 'block', ['number' => $request->get('number')]); //vuln
    }

    #[Route("route7")]
    public function render_block_view_test(Request $request): Response
    {
        return $this->renderBlockView('lucky/number.html.twig', 'block', ['number' => $request->get('number')]); //vuln
    }

    #[Route("route8")]
    public function twig_environment_render_test(Request $request, Environment $twig): Response
    {
        return $twig->render('lucky/number.html.twig', ['number' => $request->get('number')]); // vuln
    }
}

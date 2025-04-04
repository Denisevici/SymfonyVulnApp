<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

use Symfony\Bridge\Twig\Translation\TwigExtractor;
use Symfony\Component\Translation\MessageCatalogue;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TwigExtractorController extends AbstractController
{
    #[Route("route28")]
    public function func1()
    {
        $loader = new FilesystemLoader('/path/to/templates');
        $twig = new Environment($loader, [
            'cache' => '/path/to/compilation_cache',
        ]);

        $extractor = new TwigExtractor($twig);
        $catalogue = new MessageCatalogue('en');
        $extractor->extract($_GET['resource'], $catalogue);
    }
}

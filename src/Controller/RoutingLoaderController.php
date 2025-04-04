<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\Loader\AnnotationFileLoader; // before Symfony 7
use Symfony\Component\Routing\Loader\ClosureLoader;
use Symfony\Component\Routing\Loader\PhpFileLoader;

class RoutingLoaderController extends AbstractController
{
    #[Route('route18')]
    public function load_routing()
    {
        $fileLocator = new FileLocator(array(__DIR__));
        $loader = new YamlFileLoader($fileLocator);
        $routes = $loader->load($_GET['name']); // vuln

        $phpFileLoader = new PhpFileLoader($fileLocator);
        $routes = $phpFileLoader->load($_GET['name']); // vuln

        $annotationFileLoader = new AnnotationFileLoader($fileLocator);
        $routes = $annotationFileLoader->load($_GET['name']); // vuln

        $closureLoader = new ClosureLoader();
        $routes = $closureLoader->load($_GET['func_name']); // vuln
    }
}
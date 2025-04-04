<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

use Symfony\Component\ClassLoader\ClassMapGenerator;
use Symfony\Component\ClassLoader\ClassCollectionLoader;

class ClassLoaderController extends AbstractController
{
    #[Route('route15')]
    public function load_class()
    {
        ClassMapGenerator::createMap($_GET['directory']); // vuln
        ClassMapGenerator::dump($_GET['directory'], $_GET['file']); // vuln
        ClassCollectionLoader::load(['class'], $_GET['directory'], 'foo', false); // vuln
        ClassCollectionLoader::load(['class'], $_GET['directory'], $_GET['name'], false); // vuln
    }
}
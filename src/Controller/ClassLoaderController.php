<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

use Symfony\Component\ClassLoader\ClassMapGenerator;
use Symfony\Component\ClassLoader\ClassCollectionLoader;

class ClassLoaderController extends AbstractController
{
    #[Route('route4')]
    public function my_func()
    {
        ClassMapGenerator::createMap($_GET['directory']); // vuln ArbitraryFileReading + ServerSideRequestForgery + DeserializationOfUntrustedData(phar vector)
        ClassMapGenerator::dump($_GET['directory'], $_GET['file']); // vuln ArbitraryFileReading + ServerSideRequestForgery + DeserializationOfUntrustedData(phar vector) + ArbitraryFileCreation + ArbitraryFileModification
        ClassCollectionLoader::load(['class'], $_GET['directory'], $_GET['name'], false); // vuln ArbitraryFileReading + ArbitraryFileCreation + DeserializationOfUntrustedData(x2: with "Exception" in vector, another with "phar" in vector) + LocalFileInclusion + RemoteFileInclusion + ServerSideRequestForgery
    }
}
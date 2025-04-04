<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

use Symfony\Component\Serializer\Mapping\Loader\FileLoader;

class SerializerLoaderController extends AbstractController
{
    #[Route('route19')]
    public function load_serializer()
    {
        $loader = new FileLoader($_GET['filePath']); // vuln
    }
}
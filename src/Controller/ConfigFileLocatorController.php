<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

use Symfony\Component\Config\FileLocator;

class ConfigFileLocatorController extends AbstractController
{
    #[Route("route5")]
    public function my_func()
    {
        $loader = new FileLocator('directory');
        $loader->locate($_GET['file']); // vuln DeserializationOfUntrustedData(phar vector)
    }
}

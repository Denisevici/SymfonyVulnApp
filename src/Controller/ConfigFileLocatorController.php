<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

use Symfony\Component\Config\FileLocator;

class ConfigFileLocatorController extends AbstractController
{
    #[Route("route24")]
    public function func1()
    {
        $loader = new FileLocator('directory');
        $loader->locate($_GET['file']); // vuln
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;
use Symfony\Component\DependencyInjection\Loader\IniFileLoader;

class DependencyInjectionLoaderController extends AbstractController
{
    #[Route('route16')]
    public function load_smth()
    {
        $container = new ContainerBuilder(); // vuln
        $locator = new FileLocator(); // vuln

        $loader = new PhpFileLoader($container, $locator);
        $loader->load($_GET['filePath']); // vuln

        $loader = new IniFileLoader($container, $locator);
        $loader->load($_GET['filePath']); // vuln
    }
}
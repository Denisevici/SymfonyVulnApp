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
    #[Route('route7')]
    public function my_func()
    {
        $container = new ContainerBuilder();
        $locator = new FileLocator();

        $loader = new PhpFileLoader($container, $locator);
        $loader->load($_GET['filePath']); // vuln LocalFileInclusion + RemoteFileInclusion + DeserializationOfUntrustedData(phar vector)

        $loader = new IniFileLoader($container, $locator);
        $loader->load($_GET['filePath']); // vuln DeserializationOfUntrustedData(phar vector)
    }
}
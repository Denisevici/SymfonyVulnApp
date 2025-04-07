<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Mapping\Loader\YamlFileLoader;
use Symfony\Component\Validator\Mapping\Loader\FileLoader;

class ValidatorLoaderController extends AbstractController
{
    #[Route('route30')]
    public function my_func()
    {
        $loaders = Validation::createValidatorBuilder()
            ->addYamlMapping('validator/validation.yaml')
            ->getLoaders();

        $loader = $loaders[0];
        $loader->parseFile($_GET['name']); // vuln ArbitraryFileReading + ServerSideRequestForgery + DeserializationOfUntrustedData(phar vector)

        $loader = new YamlFileLoader('file.yml');
        $loader->parseFile($_GET['name']); // vuln ArbitraryFileReading + ServerSideRequestForgery + DeserializationOfUntrustedData(phar vector)

        $loader = new FileLoader($_GET['fileName']); // vuln DeserializationOfUntrustedData(phar vector)
    }
}
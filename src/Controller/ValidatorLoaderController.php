<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Mapping\Loader\YamlFileLoader;
use Symfony\Component\Validator\Mapping\Loader\FileLoader;

class ValidatorLoaderController extends AbstractController
{
    #[Route('route21')]
    public function load_validator()
    {
        $loaders = Validation::createValidatorBuilder()
            ->addYamlMapping('validator/validation.yaml')
            ->getLoaders();

        $loader = $loaders[0];
        $loader->parseFile($_GET['name']); // vuln

        $loader = new YamlFileLoader('file.yml');
        $loader->parseFile($_GET['name']); // vuln

        $loader = new FileLoader($_GET['fileName']); // vuln
    }
}
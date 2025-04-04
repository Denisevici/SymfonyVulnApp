<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

use Symfony\Component\Yaml\Yaml;

class YamlParseController extends AbstractController
{
    #[Route("route28")]
    public function func1()
    {
        $parsed = Yaml::parse($_GET['data']);
    }
}

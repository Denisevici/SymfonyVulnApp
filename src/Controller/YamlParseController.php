<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

use Symfony\Component\Yaml\Yaml;

class YamlParseController extends AbstractController
{
    #[Route("route31")]
    public function my_func()
    {
        $parsed = Yaml::parse($_GET['data']); // vuln ArbitraryFileReading + ServerSideRequestForgery + DeserializationOfUntrustedData(phar vector)
    }
}

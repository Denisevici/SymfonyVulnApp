<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

use Symfony\Component\Config\Util\XmlUtils;

class ConfigXmlUtilsController extends AbstractController
{
    #[Route("route6")]
    public function my_func()
    {
        XmlUtils::loadFile($_GET['file']); // vuln ArbitraryFileReading + ServerSideRequestForgery + DeserializationOfUntrustedData(phar vector)
    }
}

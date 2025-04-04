<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

use Symfony\Component\Config\Util\XmlUtils;

class ConfigXmlUtilsController extends AbstractController
{
    #[Route("route25")]
    public function func1()
    {
        XmlUtils::loadFile($_GET['file']);
    }
}

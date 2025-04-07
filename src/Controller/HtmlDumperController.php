<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

use Symfony\Component\VarDumper\Dumper\HtmlDumper;

class HtmlDumperController extends AbstractController
{
    #[Route("route13")]
    public function my_func()
    {
        $output = new HtmlDumper($_GET['output']); // vuln ArbitraryFileModification + ArbitraryFileCreation + DeserializationOfUntrustedData(phar vector)
    }
}

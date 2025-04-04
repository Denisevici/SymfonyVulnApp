<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

use Symfony\Component\VarDumper\Dumper\HtmlDumper;

class HtmlDumperController extends AbstractController
{
    #[Route("route26")]
    public function func1()
    {
        $output = new HtmlDumper($_GET['output']);
    }
}

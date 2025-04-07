<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

//The class is deprecated since Symfony 3.4
use Symfony\Bundle\FrameworkBundle\Translation\PhpExtractor;
use Symfony\Component\Translation\MessageCatalogue;

class PhpExtractorController extends AbstractController
{
    #[Route("route18")]
    public function my_func()
    {
        $extractor = new PhpExtractor();
        $extractor->extract($_GET['resource'], new MessageCatalogue('en')); // vuln DeserializationOfUntrustedData(phar vector)
    }
}

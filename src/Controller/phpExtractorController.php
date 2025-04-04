<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

//The class is deprecated since Symfony 3.4
use Symfony\Bundle\FrameworkBundle\Translation\PhpExtractor;
use Symfony\Component\Translation\MessageCatalogue;

class phpExtractorController extends AbstractController
{
    #[Route("route28")]
    public function func1()
    {
        $extractor = new PhpExtractor();
        $extractor->extract($_GET['resource'], new MessageCatalogue('en'));
    }
}

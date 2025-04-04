<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

use Symfony\Component\Intl\Data\Bundle\Reader\JsonBundleReader;
use Symfony\Component\Intl\Data\Bundle\Reader\PhpBundleReader;

class BundleReaderController extends AbstractController
{
    #[Route("route22")]
    public function func1()
    {
        $phpBundleReader = new PhpBundleReader();
        $phpBundleReader->read($_GET['path'], $_GET['locale']); // vuln

        $jsonBundleReader = new JsonBundleReader();
        $jsonBundleReader->read($_GET['path'], $_GET['locale']); // vuln
    }
}

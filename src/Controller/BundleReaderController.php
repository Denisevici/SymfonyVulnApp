<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

use Symfony\Component\Intl\Data\Bundle\Reader\JsonBundleReader;
use Symfony\Component\Intl\Data\Bundle\Reader\PhpBundleReader;

class BundleReaderController extends AbstractController
{
    #[Route("route2")]
    public function my_func()
    {
        $phpBundleReader = new PhpBundleReader();
        $phpBundleReader->read($_GET['path'], $_GET['locale']); // vuln LocalFileInclusion + RemoteFileInclusion + DeserializationOfUntrustedData(phar vector)

        $jsonBundleReader = new JsonBundleReader();
        $jsonBundleReader->read($_GET['path'], $_GET['locale']); // vuln DeserializationOfUntrustedData(phar vector) + ArbitraryFileReading + ServerSideRequestForgery
    }
}

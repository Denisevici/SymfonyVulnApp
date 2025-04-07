<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

use Twig\Cache\FilesystemCache;

class TwigCacheFileSystemController extends AbstractController
{
    #[Route("route27")]
    public function my_func()
    {
        $cache = new FilesystemCache('directory');
        $cache->load($_GET['filepath']); // vuln LocalFileInclusion + RemoteFileInclusion
        $cache->write($_GET['filepath'], 'test'); // vuln ArbitraryFileCreation
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

use Twig\Cache\FilesystemCache;

class TwigCacheFileSystemController extends AbstractController
{
    #[Route("route28")]
    public function func1()
    {
        $cache = new FilesystemCache('directory');
        $cache->load($_GET['filepath']);
        $cache->write($_GET['filepath'], 'test');
    }
}

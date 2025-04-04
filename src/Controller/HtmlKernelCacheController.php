<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

use Symfony\Component\HttpKernel\HttpCache\Store;
use Symfony\Component\HttpKernel\CacheWarmer\CacheWarmer;

class HtmlKernelCacheController extends AbstractController
{
    #[Route("route30")]
    public function func1()
    {
        $store = new Store($_GET['directory'].'/http_cache');

        $warmer = new CacheWarmer('file');
        $warmer->writeCacheFile($_GET['file'], 'content');
    }
}

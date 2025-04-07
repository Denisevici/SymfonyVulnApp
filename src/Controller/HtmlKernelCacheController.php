<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

use Symfony\Component\HttpKernel\HttpCache\Store;
use Symfony\Component\HttpKernel\CacheWarmer\CacheWarmer;

class HtmlKernelCacheController extends AbstractController
{
    #[Route("route15")]
    public function my_func()
    {
        $store = new Store($_GET['directory'].'/http_cache'); // vuln DeserializationOfUntrustedData(phar vector)

        $warmer = new CacheWarmer('file');
        $warmer->writeCacheFile($_GET['file'], 'content'); // vuln ArbitraryFileCreation
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

use Symfony\Bundle\FrameworkBundle\Command\CacheClearCommand;

class CacheClearCommandController extends AbstractController
{
    #[Route("route3")]
    public function my_func()
    {
        $testClass = new TestClass();
        $testClass->foo($_GET['warmupDir'], 'realCacheDir');
    }
}

class TestClass extends CacheClearCommand
{
    public function foo($warmupDir, $realCacheDir, $enableOptionalWarmers = true)
    {
        $this->warmup($warmupDir, $realCacheDir); // vuln ArbitraryFileCreation + ArbitraryFileModification + LocalFileInclusion + RemoteFileInclusion
    }
}

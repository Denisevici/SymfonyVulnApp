<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

use Symfony\Bundle\FrameworkBundle\Command\CacheClearCommand;

class CacheClearCommandController extends AbstractController
{
    #[Route("route23")]
    public function func1()
    {
        $testClass = new TestClass();
        $testClass->foo($_GET['warmupDir'], 'realCacheDir');
    }
}

class TestClass extends CacheClearCommand
{
    public function foo($warmupDir, $realCacheDir, $enableOptionalWarmers = true)
    {
        $this->warmup($warmupDir, $realCacheDir); // vuln
    }
}

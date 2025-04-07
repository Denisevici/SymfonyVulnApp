<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\LazyProxy\Instantiator\RealServiceInstantiator;

class RealServiceInstantiatorController extends AbstractController
{
    #[Route("route19")]
    public function my_func()
    {
        $instantiator = new RealServiceInstantiator();
        $callback = $_GET['a'];
        $instantiator->instantiateProxy(new Container(), new Definition(), 'foo', $callback); // vuln RemoteCodeExecution
    }
}

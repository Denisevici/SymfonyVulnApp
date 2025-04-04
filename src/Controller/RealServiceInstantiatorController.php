<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\LazyProxy\Instantiator\RealServiceInstantiator;

class RealServiceInstantiatorController extends AbstractController
{
    #[Route("route28")]
    public function func1()
    {
        $instantiator = new RealServiceInstantiator();
        $callback = jsa_test_taint();
        $instantiator->instantiateProxy(new Container(), new Definition(), 'foo', $callback);
    }
}

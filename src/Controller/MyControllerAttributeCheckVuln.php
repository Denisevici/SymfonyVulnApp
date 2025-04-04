<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

class MyControllerAttributeCheckVuln extends AbstractController
{
    // example to check if entry point is collected from attribute
    // if public mode disable here should be exploit : GET /route1?one=%3cscript%3ealert(0)%3c%2fscript%3e HTTP/1.1
    #[Route("route1")]
    public function func1()
    {
        echo $_GET['one']; // vuln
    }
}

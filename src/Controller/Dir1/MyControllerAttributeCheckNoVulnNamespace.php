<?php

namespace App\Controller\Dir1;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

class MyControllerAttributeCheckNoVulnNamespace extends AbstractController
{
    // example to check if entry point is not collected from attribute
    // because is in the wrong namespace: routes are placed in src/Controller dir AND in App\Controller namespace
    #[Route("route1")]
    public function my_func()
    {
        echo $_GET['one']; // no vuln with disabled public mode (if public mode true, here should be vuln CrossSiteScripting)
    }
}

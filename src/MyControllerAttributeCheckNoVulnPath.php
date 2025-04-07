<?php

namespace App;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

class MyControllerAttributeCheckNoVulnPath extends AbstractController
{
    // example to check if entry point is not collected from attribute
    // because is in the wrong place: routes are placed in src/Controller dir
    #[Route("route32")]
    public function my_func()
    {
        echo $_GET['one']; // no vuln with disabled public mode (if public mode true, here should be vuln CrossSiteScripting)
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

use Symfony\Component\HttpFoundation\File\File;

class HtmlFoundationFileController extends AbstractController
{
    #[Route("route28")]
    public function func1()
    {
        $path = 'test.copy.gif';
        $targetDir = $_GET['directory'];

        $file = new File($path);
        $movedFile = $file->move($targetDir, $_GET['fileName']);
    }
}

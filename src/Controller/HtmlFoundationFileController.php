<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

use Symfony\Component\HttpFoundation\File\File;

class HtmlFoundationFileController extends AbstractController
{
    #[Route("route14")]
    public function my_func()
    {
        $path = 'test.copy.gif';
        $targetDir = $_GET['directory'];

        $file = new File($path);
        $movedFile = $file->move($targetDir, $_GET['fileName']); // vuln DeserializationOfUntrustedData(phar vector) + ArbitraryFileCreation + UnrestrictedFileUpload
    }
}

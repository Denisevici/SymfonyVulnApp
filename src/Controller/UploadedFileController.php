<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UploadedFileController extends AbstractController
{
    #[Route('route29')]
    public function my_func(Request $request): Response
    {
        $file = $request->files->get('file');
        $file->move($_GET['dirName'], $_GET['fileName']); // vuln ArbitraryFileCreation + ArbitraryFileModification + UnrestrictedFileUpload
        echo $file->originalName; // vuln CrossSiteScripting

        return new Response(
            sprintf("Hello %s", $request->get('name'))
        );
    }
}
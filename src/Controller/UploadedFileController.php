<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UploadedFileController extends AbstractController
{
    #[Route('route14')]
    public function upload_file(Request $request): Response
    {
        $file = $request->files->get('file');
        $file->move($_GET['dirName'], $_GET['fileName']); // vuln

        return new Response(
            sprintf("Hello %s", $request->get('name'))
        );
    }
}
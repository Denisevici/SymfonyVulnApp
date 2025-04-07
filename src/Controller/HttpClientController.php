<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpClient\HttpClient;

class HttpClientController extends AbstractController
{
    #[Route('route16')]
    public function my_func()
    {
        $client = HttpClient::create();
        $request = $client->request('GET', $_GET['url']); // vuln ServerSideRequestForgery
    }
}
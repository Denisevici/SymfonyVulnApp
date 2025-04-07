<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

use Symfony\Component\DomCrawler\Field\FileFormField;

class FileFormFieldController extends AbstractController
{
    #[Route("route10")]
    public function my_func()
    {
        $document = new \DOMDocument();
        $node = $document->createElement('input', '');
        $node->setAttribute('type', 'file');

        $field = new FileFormField($node);
        $field->upload($_GET['name']); // vuln ArbitraryFileReading + ArbitraryFileCopying + DeserializationOfUntrustedData(phar vector)
    }
}

<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Attribute\Route;

class DoctrineController extends AbstractController
{
    #[Route('route8')]
    public function my_func(Request $request, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $query = $entityManager->createQuery('SELECT bar FROM foo WHERE id =' . $request->get('id')); // vuln SQLInjection
        $bar = $query->execute();

        return new Response(
            sprintf("Hello %s", $request->get('name'))
        );
    }

    #[Route('route9')]
    public function my_func_2(Request $request, EntityManagerInterface $entityManager): Response
    {
        $query = $entityManager->createQuery('SELECT * FROM foo WHERE id =' . $request->get('id')); // vuln SQLInjection
        $result1 = $query->setParameter($request->get('key'), 'value', 'type'); // vuln SQLInjection
        $result2 = $query->setParameters(['key' => $request->get('key')]); // vuln SQLInjection

        return new Response(
            sprintf("Hello %s", $request->get('name'))
        );
    }
}

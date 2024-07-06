<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BalivisitController extends AbstractController
{
    #[Route('/balivisit', name: 'app_balivisit')]
    public function index(): Response
    {
        return $this->render('balivisit/balivisit.html.twig', [
            'controller_name' => 'BalivisitController',
        ]);
    }
}

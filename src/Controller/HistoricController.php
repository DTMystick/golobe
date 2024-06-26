<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HistoricController extends AbstractController
{
    #[Route('/historic', name: 'app_historic')]
    public function index(): Response
    {
        return $this->render('historic/historic.html.twig', [
            'controller_name' => 'HistoricController',
        ]);
    }
}

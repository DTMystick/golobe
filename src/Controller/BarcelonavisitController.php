<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BarcelonavisitController extends AbstractController
{
    #[Route('/barcelonavisit', name: 'app_barcelonavisit')]
    public function index(): Response
    {
        return $this->render('barcelonavisit/barcelonavisit.html.twig', [
            'controller_name' => 'BarcelonavisitController',
        ]);
    }
}

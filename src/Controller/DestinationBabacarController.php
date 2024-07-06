<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DestinationBabacarController extends AbstractController
{
    #[Route('/helsinkivisit', name: 'app_destination_babacar')]
    public function index(): Response
    {
        return $this->render('destination_babacar/helsinkivisit.html.twig', [
            'controller_name' => 'DestinationBabacarController',
        ]);
    }
}

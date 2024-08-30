<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DestinationController extends AbstractController
{
    #[Route('/destination2', name: 'app_destination')]
    public function index(): Response
    {
        return $this->render('destination/destination.html.twig', [
            'controller_name' => 'DestinationController',
        ]);
    }
}

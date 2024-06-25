<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class NavbarConnectedController extends AbstractController
{
    #[Route('/navbarConnected', name: 'app_navbar_connected')]
    public function index(): Response
    {
        return $this->render('navbar_connected/navbarConnected.html.twig', [
            'controller_name' => 'NavbarConnectedController',
        ]);
    }
}

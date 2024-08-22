<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomePageController extends AbstractController
{
    // Route pour la page d'accueil (homepage)
    #[Route('/homepage', name: 'app_home_page')]
    public function index(): Response
    {
        // Rend la vue homepage.html.twig avec des données supplémentaires (controller_name)
        return $this->render('home_page/homepage.html.twig', [
            'controller_name' => 'HomePageController',
        ]);
    }

    // Route pour une autre page d'accueil alternative (home)
    #[Route('/home', name: 'app_home')]
    public function home(): Response
    {
        // Rend la vue home.html.twig avec des données supplémentaires (controller_name)
        return $this->render('home_page/home.html.twig', [
            'controller_name' => 'HomePageController',
        ]);
    }
}

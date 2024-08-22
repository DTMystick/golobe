<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomePageController extends AbstractController
{
    #[Route('/homepage', name: 'app_home_page')]
    public function index(): Response
    {
        return $this->render('home_page/homepage.html.twig', [
            'controller_name' => 'HomePageController',
        ]);
    }

    #[Route('/home', name: 'app_home')]
    public function home(): Response
    {
        return $this->render('home_page/home.html.twig', [
            'controller_name' => 'HomePageController',
        ]);
    }
}

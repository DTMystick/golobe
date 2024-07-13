<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ValoController extends AbstractController
{
    #[Route('/valo', name: 'app_valo')]
    public function index(): Response
    {
        return $this->render('valo/valo.html.twig', [
            'controller_name' => 'ValoController',
        ]);
    }
}

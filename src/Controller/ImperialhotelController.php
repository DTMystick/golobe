<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ImperialhotelController extends AbstractController
{
    #[Route('/imperialhotel', name: 'app_imperialhotel')]
    public function index(): Response
    {
        return $this->render('imperialhotel/imperial.html.twig', [
            'controller_name' => 'ImperialhotelController',
        ]);
    }
}

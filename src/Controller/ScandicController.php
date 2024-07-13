<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ScandicController extends AbstractController
{
    #[Route('/scandichotel', name: 'app_scandic')]
    public function index(): Response
    {
        return $this->render('scandic/scandichotel.html.twig', [
            'controller_name' => 'ScandicController',
        ]);
    }
}

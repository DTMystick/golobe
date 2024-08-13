<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class VillacellahotelController extends AbstractController
{
    #[Route('/villacellahotel', name: 'app_villacellahotel')]
    public function index(): Response
    {
        return $this->render('villacellahotel/villacella.html.twig', [
            'controller_name' => 'VillacellahotelController',
        ]);
    }
}

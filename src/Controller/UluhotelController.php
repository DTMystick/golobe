<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UluhotelController extends AbstractController
{
    #[Route('/uluhotel', name: 'app_uluhotel')]
    public function index(): Response
    {
        return $this->render('uluhotel/ulu.html.twig', [
            'controller_name' => 'UluhotelController',
        ]);
    }
}

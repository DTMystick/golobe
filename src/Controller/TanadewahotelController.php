<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TanadewahotelController extends AbstractController
{
    #[Route('/tanadewahotel', name: 'app_tanadewahotel')]
    public function index(): Response
    {
        return $this->render('tanadewahotel/tanadewa.html.twig', [
            'controller_name' => 'TanadewahotelController',
        ]);
    }
}

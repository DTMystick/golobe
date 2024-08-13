<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class OhlaeixamplehotelController extends AbstractController
{
    #[Route('/ohlaeixamplehotel', name: 'app_ohlaeixamplehotel')]
    public function index(): Response
    {
        return $this->render('ohlaeixamplehotel/ohlaeixample.html.twig', [
            'controller_name' => 'OhlaeixamplehotelController',
        ]);
    }
}

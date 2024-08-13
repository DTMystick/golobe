<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class OkurahotelController extends AbstractController
{
    #[Route('/okurahotel', name: 'app_okurahotel')]
    public function index(): Response
    {
        return $this->render('okurahotel/okura.html.twig', [
            'controller_name' => 'OkurahotelController',
        ]);
    }
}

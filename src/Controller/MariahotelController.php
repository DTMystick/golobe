<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MariahotelController extends AbstractController
{
    #[Route('/mariahotel', name: 'app_mariahotel')]
    public function index(): Response
    {
        return $this->render('mariahotel/mariahotel.html.twig', [
            'controller_name' => 'MariahotelController',
        ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ShiomihotelController extends AbstractController
{
    #[Route('/shiomihotel', name: 'app_shiomihotel')]
    public function index(): Response
    {
        return $this->render('shiomihotel/shiomi.html.twig', [
            'controller_name' => 'ShiomihotelController',
        ]);
    }
}

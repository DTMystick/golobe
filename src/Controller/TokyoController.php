<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TokyoController extends AbstractController
{
    #[Route('/tokyovisit', name: 'app_tokyo')]
    public function index(): Response
    {
        return $this->render('tokyo/tokyovisit.html.twig', [
            'controller_name' => 'TokyoController',
        ]);
    }
}

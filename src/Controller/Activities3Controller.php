<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class Activities3Controller extends AbstractController
{
    #[Route('/activities3', name: 'app_activities3')]
    public function index(): Response
    {
        return $this->render('activities3/tokyo.html.twig', [
            'controller_name' => 'Activities3Controller',
        ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class Activities2Controller extends AbstractController
{
    #[Route('/activities2', name: 'app_activities2')]
    public function index(): Response
    {
        return $this->render('activities2/barcelona.html.twig', [
            'controller_name' => 'Activities2Controller',
        ]);
    }
}

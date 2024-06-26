<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class Activities4Controller extends AbstractController
{
    #[Route('/activities4', name: 'app_activities4')]
    public function index(): Response
    {
        return $this->render('activities4/bali.html.twig', [
            'controller_name' => 'Activities4Controller',
        ]);
    }
}

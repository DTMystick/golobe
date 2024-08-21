<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ActivitiesController extends AbstractController
{
    #[Route('/activities', name: 'app_activities')]
    public function index(): Response
    {
        return $this->render('activities/helsinki.html.twig', [
            'controller_name' => 'ActivitiesController',
        ]);
    }
}

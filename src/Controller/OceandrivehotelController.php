<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class OceandrivehotelController extends AbstractController
{
    #[Route('/oceandrivehotel', name: 'app_oceandrivehotel')]
    public function index(): Response
    {
        return $this->render('oceandrivehotel/oceandrive.html.twig', [
            'controller_name' => 'OceandrivehotelController',
        ]);
    }
}

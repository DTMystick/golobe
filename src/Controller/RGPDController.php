<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RGPDController extends AbstractController
{
    #[Route('/rgpd', name: 'app_r_g_p_d')]
    public function index(): Response
    {
        return $this->render('rgpd/rgpd.html.twig', [
            'controller_name' => 'RGPDController',
        ]);
    }
}

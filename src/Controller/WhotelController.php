<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class WhotelController extends AbstractController
{
    #[Route('/whotel', name: 'app_whotel')]
    public function index(): Response
    {
        return $this->render('whotel/whotel.html.twig', [
            'controller_name' => 'WhotelController',
        ]);
    }
}

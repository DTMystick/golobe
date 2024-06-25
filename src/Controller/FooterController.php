<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FooterController extends AbstractController
{
    #[Route('/footer', name: 'app_footer')]
    public function index(): Response
    {
        return $this->render('footer/footer.html.twig', [
            'controller_name' => 'FooterController',
        ]);
    }
}

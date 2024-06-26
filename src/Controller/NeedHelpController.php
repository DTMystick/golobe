<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class NeedHelpController extends AbstractController
{
    #[Route('/needHelp', name: 'app_need_help')]
    public function index(): Response
    {
        return $this->render('need_help/help.html.twig', [
            'controller_name' => 'NeedHelpController',
        ]);
    }
}

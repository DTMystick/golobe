<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CreateAccountController extends AbstractController
{
    #[Route('/create/account', name: 'app_create_account')]
    public function index(): Response
    {
        return $this->render('create_account/createAccount.html.twig', [
            'controller_name' => 'CreateAccountController',
        ]);
    }
}

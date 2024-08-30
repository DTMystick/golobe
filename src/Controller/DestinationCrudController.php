<?php

namespace App\Controller;

use App\Entity\Destination;
use App\Form\DestinationType;
use App\Repository\DestinationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/destination')]
class DestinationCrudController extends AbstractController
{
    #[Route('/', name: 'app_destination_crud_index', methods: ['GET'])]
    public function index(DestinationRepository $destinationRepository): Response
    {
        return $this->render('destination_crud/index.html.twig', [
            'destinations' => $destinationRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_destination_crud_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $destination = new Destination();
        $form = $this->createForm(DestinationType::class, $destination);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($destination);
            $entityManager->flush();

            return $this->redirectToRoute('app_destination_crud_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('destination_crud/new.html.twig', [
            'destination' => $destination,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_destination_crud_show', methods: ['GET'])]
    public function show(Destination $destination): Response
    {
        return $this->render('destination_crud/show.html.twig', [
            'destination' => $destination,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_destination_crud_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Destination $destination, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DestinationType::class, $destination);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_destination_crud_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('destination_crud/edit.html.twig', [
            'destination' => $destination,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_destination_crud_delete', methods: ['POST'])]
    public function delete(Request $request, Destination $destination, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$destination->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($destination);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_destination_crud_index', [], Response::HTTP_SEE_OTHER);
    }
}

<?php

namespace App\Controller;

use App\Entity\Activity; // Activity entity
use App\Form\ActivityType; // Activity form
use App\Repository\ActivityRepository; // Activity repository
use Doctrine\ORM\EntityManagerInterface; // Entity Manager
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; // Base controller
use Symfony\Component\Form\Extension\Core\Type\SubmitType; // Submit button
use Symfony\Component\HttpFoundation\Request; // HTTP Request
use Symfony\Component\HttpFoundation\Response; // HTTP Response
use Symfony\Component\Routing\Annotation\Route; // Route annotation

class ActivitiesController extends AbstractController
{
    #[Route('/activities', name: 'app_activities')] // List activities route
    public function index(ActivityRepository $activityRepository): Response
    {
        $activities = $activityRepository->findAll(); // Fetch activities

        // Generate delete forms for each activity
        $deleteForms = [];
        foreach ($activities as $activity) {
            $form = $this->createFormBuilder()
                ->setAction($this->generateUrl('app_activity_delete', ['id' => $activity->getId()])) // Delete URL
                ->setMethod('POST') // POST method
                ->add('submit', SubmitType::class, [
                    'label' => 'Delete',
                    'attr' => ['class' => 'btn btn-danger btn-sm'] // Button style
                ])
                ->getForm();
            $deleteForms[$activity->getId()] = $form->createView(); // Store delete form
        }

        return $this->render('activities/index.html.twig', [
            'activities' => $activities, // Pass activities to view
            'delete_form' => $deleteForms, // Pass delete forms to view
        ]);
    }

    #[Route('/activities/new', name: 'app_activity_new', methods: ['GET', 'POST'])] // Create activity route
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $activity = new Activity(); // New activity instance
        $form = $this->createForm(ActivityType::class, $activity); // Create form
        $form->handleRequest($request); // Handle request

        if ($form->isSubmitted() && $form->isValid()) { // Form submission check
            $entityManager->persist($activity); // Persist activity
            $entityManager->flush(); // Save activity

            return $this->redirectToRoute('app_activities'); // Redirect to activities list
        }

        return $this->render('activities/new.html.twig', [
            'activityForm' => $form->createView(), // Render form
        ]);
    }

    #[Route('/activities/edit/{id}', name: 'app_activity_edit', methods: ['GET', 'POST'])] // Edit activity route
    public function edit(Request $request, Activity $activity, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ActivityType::class, $activity); // Create edit form
        $form->handleRequest($request); // Handle request

        if ($form->isSubmitted() && $form->isValid()) { // Form submission check
            $entityManager->flush(); // Update activity

            return $this->redirectToRoute('app_activities'); // Redirect to activities list
        }

        return $this->render('activities/edit.html.twig', [
            'activityForm' => $form->createView(), // Render edit form
            'activity' => $activity, // Pass activity data
        ]);
    }

    #[Route('/activities/delete/{id}', name: 'app_activity_delete', methods: ['POST'])] // Delete activity route
    public function delete(Request $request, Activity $activity, EntityManagerInterface $entityManager): Response
    {
        // CSRF token validation
        if ($this->isCsrfTokenValid('delete'.$activity->getId(), $request->request->get('_token'))) {
            $entityManager->remove($activity); // Remove activity
            $entityManager->flush(); // Confirm deletion
        }

        return $this->redirectToRoute('app_activities'); // Redirect to activities list
    }
}

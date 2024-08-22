<?php

namespace App\Controller;

use App\Entity\Activity; // Entity class for Activity
use App\Form\ActivityType; // Form class for Activity
use App\Repository\ActivityRepository; // Repository for database queries
use Doctrine\ORM\EntityManagerInterface; // Doctrine entity manager
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; // Base controller class
use Symfony\Component\Form\Extension\Core\Type\SubmitType; // Form type for submit button
use Symfony\Component\HttpFoundation\File\Exception\FileException; // Exception for file upload errors
use Symfony\Component\HttpFoundation\Request; // Handles HTTP requests
use Symfony\Component\HttpFoundation\Response; // Handles HTTP responses
use Symfony\Component\Routing\Annotation\Route; // Annotation for route definitions
use Symfony\Component\String\Slugger\SluggerInterface; // Handles string operations for filenames

class ActivitiesController extends AbstractController
{
    #[Route('/activities', name: 'app_activities')] // Route for listing activities
    public function index(ActivityRepository $activityRepository): Response
    {
        $activities = $activityRepository->findAll(); // Fetch all activities
        $deleteForms = []; // Array to store delete forms

        foreach ($activities as $activity) {
            $form = $this->createFormBuilder()
                ->setAction($this->generateUrl('app_activity_delete', ['id' => $activity->getId()])) // Delete action URL
                ->setMethod('POST') // Form method
                ->add('submit', SubmitType::class, [
                    'label' => 'Delete', // Submit button label
                    'attr' => ['class' => 'btn btn-danger btn-sm'] // Button styling
                ])
                ->getForm();
            $deleteForms[$activity->getId()] = $form->createView(); // Store form in array
        }

        return $this->render('activities/index.html.twig', [
            'activities' => $activities, // Pass activities to the view
            'delete_form' => $deleteForms, // Pass delete forms to the view
        ]);
    }

    #[Route('/activities/new', name: 'app_activity_new', methods: ['GET', 'POST'])] // Route for creating a new activity
    public function new(Request $request, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        $activity = new Activity(); // Create new Activity entity
        $form = $this->createForm(ActivityType::class, $activity); // Generate form
        $form->handleRequest($request); // Handle form submission

        if ($form->isSubmitted() && $form->isValid()) { // Check if form is valid
            $imageFile = $form->get('imageFilename')->getData(); // Get uploaded image

            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME); // Original filename
                $safeFilename = $slugger->slug($originalFilename); // Slugified filename
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension(); // Generate unique filename

                try {
                    $imageFile->move(
                        $this->getParameter('images_directory'), // Directory for uploaded images
                        $newFilename // New filename
                    );
                } catch (FileException $e) {
                    // Handle file upload exception
                }

                $activity->setImageFilename($newFilename); // Set image filename in Activity entity
            }

            $entityManager->persist($activity); // Save activity
            $entityManager->flush(); // Commit changes to database

            return $this->redirectToRoute('app_activities'); // Redirect to activities list
        }

        return $this->render('activities/new.html.twig', [
            'activityForm' => $form->createView(), // Pass form to view
        ]);
    }

    #[Route('/activities/edit/{id}', name: 'app_activity_edit', methods: ['GET', 'POST'])] // Route for editing an activity
    public function edit(Request $request, Activity $activity, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(ActivityType::class, $activity); // Generate form for editing
        $form->handleRequest($request); // Handle form submission

        if ($form->isSubmitted() && $form->isValid()) { // Check if form is valid
            $imageFile = $form->get('imageFilename')->getData(); // Get uploaded image

            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME); // Original filename
                $safeFilename = $slugger->slug($originalFilename); // Slugified filename
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension(); // Generate unique filename

                try {
                    $imageFile->move(
                        $this->getParameter('images_directory'), // Directory for uploaded images
                        $newFilename // New filename
                    );
                } catch (FileException $e) {
                    // Handle file upload exception
                }

                $activity->setImageFilename($newFilename); // Set image filename in Activity entity
            }

            $entityManager->flush(); // Commit changes to database

            return $this->redirectToRoute('app_activities'); // Redirect to activities list
        }

        return $this->render('activities/edit.html.twig', [
            'activityForm' => $form->createView(), // Pass form to view
            'activity' => $activity, // Pass activity to view
        ]);
    }

    #[Route('/activities/delete/{id}', name: 'app_activity_delete', methods: ['POST'])] // Route for deleting an activity
    public function delete(Request $request, Activity $activity, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$activity->getId(), $request->request->get('_token'))) {
            $entityManager->remove($activity); // Remove activity
            $entityManager->flush(); // Commit changes to database
        }

        return $this->redirectToRoute('app_activities'); // Redirect to activities list
    }
}

<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RouterInterface;
use Twig\Environment;

class CrudService
{
    private $em;
    private $formFactory;
    private $router;
    private $twig;

    public function __construct(
        EntityManagerInterface $em,
        FormFactoryInterface $formFactory,
        RouterInterface $router,
        Environment $twig
    ) {
        $this->em = $em;
        $this->formFactory = $formFactory;
        $this->router = $router;
        $this->twig = $twig;
    }

    public function create(
        string $formType,
        string $template,
        string $redirectRoute,
        string $entityClass,
        Request $request
    ): Response {
        $entity = new $entityClass();
        $form = $this->formFactory->create($formType, $entity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($entity);
            $this->em->flush();
            return new RedirectResponse($this->router->generate($redirectRoute));
        }

        return new Response($this->twig->render($template, [
            'form' => $form->createView(),
            'entity' => $entity,
        ]));
    }

    public function read(
        string $entityClass,
        string $template,
        int $id
    ): Response {
        $repository = $this->em->getRepository($entityClass);
        $entity = $repository->find($id);

        if (!$entity) {
            throw new \Exception('Entity not found');
        }

        return new Response($this->twig->render($template, [
            'entity' => $entity,
        ]));
    }

    public function update(
        string $formType,
        string $template,
        string $redirectRoute,
        string $entityClass,
        int $id,
        Request $request
    ): Response {
        $repository = $this->em->getRepository($entityClass);
        $entity = $repository->find($id);

        if (!$entity) {
            throw new \Exception('Entity not found');
        }

        $form = $this->formFactory->create($formType, $entity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->flush();
            return new RedirectResponse($this->router->generate($redirectRoute));
        }

        return new Response($this->twig->render($template, [
            'form' => $form->createView(),
            'entity' => $entity,
        ]));
    }

    public function delete(
        string $entityClass,
        string $redirectRoute,
        int $id,
        Request $request
    ): RedirectResponse {
        $repository = $this->em->getRepository($entityClass);
        $entity = $repository->find($id);

        if (!$entity) {
            throw new \Exception('Entity not found');
        }

        if ($this->isCsrfTokenValid('delete' . $id, $request->request->get('_token'))) {
            $this->em->remove($entity);
            $this->em->flush();
        }

        return new RedirectResponse($this->router->generate($redirectRoute));
    }

    private function isCsrfTokenValid(string $tokenId, ?string $token): bool
    {
        return hash_equals($tokenId, $token);
    }
}

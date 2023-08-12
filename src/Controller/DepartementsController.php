<?php

namespace App\Controller;

use App\Entity\Departements;
use App\Form\DepartementsType;
use App\Repository\DepartementsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/departements')]
class DepartementsController extends AbstractController
{
    #[Route('/', name: 'app_departements_index', methods: ['GET'])]
    public function index(DepartementsRepository $departementsRepository): Response
    {
        return $this->render('departements/index.html.twig', [
            'departements' => $departementsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_departements_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $departement = new Departements();
        $form = $this->createForm(DepartementsType::class, $departement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($departement);
            $entityManager->flush();

            return $this->redirectToRoute('app_departements_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('departements/new.html.twig', [
            'departement' => $departement,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_departements_show', methods: ['GET'])]
    public function show(Departements $departement): Response
    {
        return $this->render('departements/show.html.twig', [
            'departement' => $departement,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_departements_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Departements $departement, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DepartementsType::class, $departement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_departements_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('departements/edit.html.twig', [
            'departement' => $departement,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_departements_delete', methods: ['POST'])]
    public function delete(Request $request, Departements $departement, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$departement->getId(), $request->request->get('_token'))) {
            $entityManager->remove($departement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_departements_index', [], Response::HTTP_SEE_OTHER);
    }
}

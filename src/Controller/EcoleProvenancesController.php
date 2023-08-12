<?php

namespace App\Controller;

use App\Entity\EcoleProvenances;
use App\Form\EcoleProvenancesType;
use App\Repository\EcoleProvenancesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/ecole/provenances')]
class EcoleProvenancesController extends AbstractController
{
    #[Route('/', name: 'app_ecole_provenances_index', methods: ['GET'])]
    public function index(EcoleProvenancesRepository $ecoleProvenancesRepository): Response
    {
        return $this->render('ecole_provenances/index.html.twig', [
            'ecole_provenances' => $ecoleProvenancesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_ecole_provenances_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $ecoleProvenance = new EcoleProvenances();
        $form = $this->createForm(EcoleProvenancesType::class, $ecoleProvenance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($ecoleProvenance);
            $entityManager->flush();

            return $this->redirectToRoute('app_ecole_provenances_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ecole_provenances/new.html.twig', [
            'ecole_provenance' => $ecoleProvenance,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ecole_provenances_show', methods: ['GET'])]
    public function show(EcoleProvenances $ecoleProvenance): Response
    {
        return $this->render('ecole_provenances/show.html.twig', [
            'ecole_provenance' => $ecoleProvenance,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_ecole_provenances_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, EcoleProvenances $ecoleProvenance, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EcoleProvenancesType::class, $ecoleProvenance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_ecole_provenances_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ecole_provenances/edit.html.twig', [
            'ecole_provenance' => $ecoleProvenance,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ecole_provenances_delete', methods: ['POST'])]
    public function delete(Request $request, EcoleProvenances $ecoleProvenance, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ecoleProvenance->getId(), $request->request->get('_token'))) {
            $entityManager->remove($ecoleProvenance);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_ecole_provenances_index', [], Response::HTTP_SEE_OTHER);
    }
}

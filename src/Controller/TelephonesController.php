<?php

namespace App\Controller;

use App\Entity\Telephones;
use App\Form\TelephonesType;
use App\Repository\TelephonesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/telephones')]
class TelephonesController extends AbstractController
{
    #[Route('/', name: 'app_telephones_index', methods: ['GET'])]
    public function index(TelephonesRepository $telephonesRepository): Response
    {
        return $this->render('telephones/index.html.twig', [
            'telephones' => $telephonesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_telephones_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $telephone = new Telephones();
        $form = $this->createForm(TelephonesType::class, $telephone);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($telephone);
            $entityManager->flush();

            return $this->redirectToRoute('app_telephones_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('telephones/new.html.twig', [
            'telephone' => $telephone,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_telephones_show', methods: ['GET'])]
    public function show(Telephones $telephone): Response
    {
        return $this->render('telephones/show.html.twig', [
            'telephone' => $telephone,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_telephones_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Telephones $telephone, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TelephonesType::class, $telephone);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_telephones_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('telephones/edit.html.twig', [
            'telephone' => $telephone,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_telephones_delete', methods: ['POST'])]
    public function delete(Request $request, Telephones $telephone, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$telephone->getId(), $request->request->get('_token'))) {
            $entityManager->remove($telephone);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_telephones_index', [], Response::HTTP_SEE_OTHER);
    }
}

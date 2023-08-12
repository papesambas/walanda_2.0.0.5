<?php

namespace App\Controller;

use App\Entity\Parents;
use App\Form\ParentsType;
use App\Form\ParentsRechercheType;
use App\Repository\ParentsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/parents')]
class ParentsController extends AbstractController
{
    #[Route('/', name: 'app_parents_index', methods: ['GET'])]
    public function index(ParentsRepository $parentsRepository, CacheInterface $cache): Response
    {
        return $cache->get('parents_list', function (ItemInterface $item) use ($parentsRepository) {
            $item->expiresAfter(3600); // Cache valide pendant une heure (ajustez selon vos besoins)
            $parents = $parentsRepository->findAll();

            return $this->render('parents/index.html.twig', [
                'parents' => $parents,
            ]);
        });
    }

    #[Route('/new', name: 'app_parents_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $parent = new Parents();
        $form = $this->createForm(ParentsType::class, $parent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($parent);
            $entityManager->flush();

            return $this->redirectToRoute('app_parents_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('parents/new.html.twig', [
            'parent' => $parent,
            'form' => $form,
        ]);
    }

    #[Route('/new/eleve', name: 'app_parents_new_eleve', methods: ['GET', 'POST'])]
    public function newEleve(Request $request, EntityManagerInterface $entityManager): Response
    {
        $parent = new Parents();
        $form = $this->createForm(ParentsRechercheType::class, $parent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($parent);
            $entityManager->flush();

            return $this->redirectToRoute('app_parents_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('parents/new.html.twig', [
            'parent' => $parent,
            'form' => $form,
        ]);
    }


    #[Route('/{id}', name: 'app_parents_show', methods: ['GET'])]
    public function show(Parents $parent): Response
    {
        return $this->render('parents/show.html.twig', [
            'parent' => $parent,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_parents_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Parents $parent, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ParentsType::class, $parent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_parents_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('parents/edit.html.twig', [
            'parent' => $parent,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_parents_delete', methods: ['POST'])]
    public function delete(Request $request, Parents $parent, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $parent->getId(), $request->request->get('_token'))) {
            $entityManager->remove($parent);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_parents_index', [], Response::HTTP_SEE_OTHER);
    }
}

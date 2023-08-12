<?php

namespace App\Controller;

use App\Entity\Meres;
use App\Form\MeresType;
use App\Repository\MeresRepository;
use App\Repository\TelephonesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/meres')]
class MeresController extends AbstractController
{
    #[Route('/', name: 'app_meres_index', methods: ['GET'])]
    public function index(MeresRepository $meresRepository, CacheInterface $cache): Response
    {
        return $cache->get('meres_list', function (ItemInterface $item) use ($meresRepository) {
            $item->expiresAfter(3600); // Cache valide pendant une heure (ajustez selon vos besoins)
            $meres = $meresRepository->findAll();
            return $this->render('meres/index.html.twig', [
                'meres' => $meres,
            ]);
        });
    }

    #[Route('/new', name: 'app_meres_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $mere = new Meres();
        $form = $this->createForm(MeresType::class, $mere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($mere);
            $entityManager->flush();

            return $this->redirectToRoute('app_meres_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('meres/new.html.twig', [
            'mere' => $mere,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_meres_show', methods: ['GET'])]
    public function show(Meres $mere): Response
    {
        return $this->render('meres/show.html.twig', [
            'mere' => $mere,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_meres_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Meres $mere, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MeresType::class, $mere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_meres_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('meres/edit.html.twig', [
            'mere' => $mere,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_meres_delete', methods: ['POST'])]
    public function delete(Request $request, Meres $mere, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $mere->getId(), $request->request->get('_token'))) {
            $entityManager->remove($mere);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_meres_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route("/telephones/search/ajax/{telephoneId}", name: 'app_meres_telephones_search_ajax', methods: ['GET', 'POST'])]
    public function ajoutAjax(int $telephoneId, MeresRepository $meresRepository, Request $request, TelephonesRepository $telephonesRepository): Response
    {
        $telephone = $telephonesRepository->findOneBy(['id' => $telephoneId]);
        $mere = $meresRepository->findOneByTelephone($telephoneId);
        if ($mere !== null) {
            // Récupérez les informations nécessaires de la mère pour les passer au formulaire
            $mereId = $mere->getId() ? $mere->getId() : null;
            $nomId = $mere->getNom() ? $mere->getNom()->getId() : null;
            $prenomId = $mere->getPrenom() ? $mere->getPrenom()->getId() : null;
            $professionId = $mere->getProfession() ? $mere->getProfession()->getId() : null;
            $telephoneId = $mere->getTelephone() ? $mere->getTelephone()->getId() : null;
            $ninaId = $mere->getNina() ? $mere->getNina()->getId() : null;


            // Récupérer les noms, prénoms et professions associés à la mère
            $nom = $mere->getNom() ? $mere->getNom()->getDesignation() : null;
            $prenom = $mere->getPrenom() ? $mere->getPrenom()->getDesignation() : null;
            $profession = $mere->getProfession() ? $mere->getProfession()->getDesignation() : null;
            $telephone = $mere->getTelephone() ? $mere->getTelephone()->getNumero() : null;
            $nina = $mere->getNina() ? $mere->getNina()->getDesignation() : null;

            return new JsonResponse([
                'mereId' => $mereId,
                'nomId' => $nomId,
                'prenomId' => $prenomId,
                'professionId' => $professionId,
                'telephoneId' => $telephoneId,
                'ninaId' => $ninaId,
                'nom' => $nom,
                'prenom' => $prenom,
                'profession' => $profession,
                'telephone' => $telephone,
                'nina' => $nina
            ]);
        } else {
            $telephoneId = $telephone->getId();
            // Le téléphone existe, mais il n'a pas de mère associée
            return new JsonResponse([
                'error' => 'Le téléphone existe, mais il n\'a pas de mère associée.',
                'telephoneId' => $telephoneId,
                'telephone' => $telephone->getNumero(),

                'mereId' => null,
                'nomId' => null,
                'prenomId' => null,
                'professionId' => null,
                'ninaId' => null,
                'nom' => null,
                'prenom' => null,
                'profession' => null,
                'nina' => null


            ]);
        }
    }
}

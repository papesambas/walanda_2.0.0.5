<?php

namespace App\Controller;

use App\Entity\Peres;
use App\Form\PeresType;
use App\Repository\PeresRepository;
use App\Repository\TelephonesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/peres')]
class PeresController extends AbstractController
{
    #[Route('/', name: 'app_peres_index', methods: ['GET'])]
    public function index(PeresRepository $peresRepository, CacheInterface $cache): Response
    {
        return $cache->get('peres_list', function (ItemInterface $item) use ($peresRepository) {
            $item->expiresAfter(3600); // Cache valide pendant une heure (ajustez selon vos besoins)
            $peres = $peresRepository->findAll();
            return $this->render('peres/index.html.twig', [
                'peres' => $peres,
            ]);
        });
    }

    #[Route('/new', name: 'app_peres_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $pere = new Peres();
        $form = $this->createForm(PeresType::class, $pere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($pere);
            $entityManager->flush();

            return $this->redirectToRoute('app_peres_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('peres/new.html.twig', [
            'pere' => $pere,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_peres_show', methods: ['GET'])]
    public function show(Peres $pere): Response
    {
        return $this->render('peres/show.html.twig', [
            'pere' => $pere,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_peres_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Peres $pere, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PeresType::class, $pere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_peres_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('peres/edit.html.twig', [
            'pere' => $pere,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_peres_delete', methods: ['POST'])]
    public function delete(Request $request, Peres $pere, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $pere->getId(), $request->request->get('_token'))) {
            $entityManager->remove($pere);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_peres_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route("/telephones/search/ajax/{telephoneId}", name: 'app_peres_telephones_search_ajax', methods: ['GET', 'POST'])]
    public function ajoutAjax(int $telephoneId, PeresRepository $peresRepository, Request $request, TelephonesRepository $telephonesRepository): Response
    {
        $telephone = $telephonesRepository->findOneBy(['id' => $telephoneId]);
        $pere = $peresRepository->findOneByTelephone($telephoneId);
        if ($pere !== null) {
            // Récupérez les informations nécessaires de la mère pour les passer au formulaire
            $pereId = $pere->getId() ? $pere->getId() : null;
            $nomId = $pere->getNom() ? $pere->getNom()->getId() : null;
            $prenomId = $pere->getPrenom() ? $pere->getPrenom()->getId() : null;
            $professionId = $pere->getProfession() ? $pere->getProfession()->getId() : null;
            $telephoneId = $pere->getTelephone() ? $pere->getTelephone()->getId() : null;
            $ninaId = $pere->getNina() ? $pere->getNina()->getId() : null;


            // Récupérer les noms, prénoms et professions associés à la mère
            $nom = $pere->getNom() ? $pere->getNom()->getDesignation() : null;
            $prenom = $pere->getPrenom() ? $pere->getPrenom()->getDesignation() : null;
            $profession = $pere->getProfession() ? $pere->getProfession()->getDesignation() : null;
            $telephone = $pere->getTelephone() ? $pere->getTelephone()->getNumero() : null;
            $nina = $pere->getNina() ? $pere->getNina()->getDesignation() : null;

            return new JsonResponse([
                'pereId' => $pereId,
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
                'error' => 'Le téléphone existe, mais il n\'a pas de père associée.',
                'telephoneId' => $telephoneId,
                'telephone' => $telephone->getNumero(),

                'pereId' => null,
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
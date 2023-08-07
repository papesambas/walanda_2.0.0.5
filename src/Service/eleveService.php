<?php

namespace App\Service;

use App\Entity\Meres;
use App\Entity\Peres;
use App\Entity\Classes;
use App\Entity\Statuts;
use App\Entity\Departements;
use App\Entity\LieuNaissance;
use App\Entity\LieuNaissances;
use App\Entity\EcoleProvenances;
use App\Repository\ElevesRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class eleveService
{
    public function __construct(private RequestStack $requestStack, private ElevesRepository $elevesRepos, private PaginatorInterface $paginator)

    {
    }

    public function getSearch($mots)
    {
        $request = $this->requestStack->getMainRequest();
        $page = $request->query->getInt('page', 1);
        $limit = 15;
        $eleveQuery = $this->elevesRepos->search();
        return $this->paginator->paginate($eleveQuery, $page, $limit);
    }

    public function getEleves()
    {
        $request = $this->requestStack->getMainRequest();
        $page = $request->query->getInt('page', 1);
        $limit = 15;
        $eleveQuery = $this->elevesRepos->findAllForPagination();
        return $this->paginator->paginate($eleveQuery, $page, $limit);
    }

    public function getPaginatedEleves()
    {
        $request = $this->requestStack->getMainRequest();
        $page = $request->query->getInt('page', 1);
        $limit = 12;
        $eleveQuery = $this->elevesRepos->findAllForPagination();
        return $this->paginator->paginate($eleveQuery, $page, $limit);
    }

    public function getPaginatedElevesStatut(?Statuts $statuts = null)
    {
        $request = $this->requestStack->getMainRequest();
        $page = $request->query->getInt('page', 1);
        $limit = 15;
        $eleveQuery = $this->elevesRepos->findForPaginationStatut($statuts);
        return $this->paginator->paginate($eleveQuery, $page, $limit);
    }

    public function getPaginatedElevesDepartement(?Departements $departements = null)
    {
        $request = $this->requestStack->getMainRequest();
        $page = $request->query->getInt('page', 1);
        $limit = 15;
        $eleveQuery = $this->elevesRepos->findForPaginationDepartement($departements);
        return $this->paginator->paginate($eleveQuery, $page, $limit);
    }

    public function getPaginatedElevesClasse(?Classes $classes = null)
    {
        $request = $this->requestStack->getMainRequest();
        $page = $request->query->getInt('page', 1);
        $limit = 15;
        $eleveQuery = $this->elevesRepos->findForPaginationClasse($classes);
        return $this->paginator->paginate($eleveQuery, $page, $limit);
    }

    public function getPaginatedElevesLieu(?LieuNaissances $lieuNaissances = null)
    {
        $request = $this->requestStack->getMainRequest();
        $page = $request->query->getInt('page', 1);
        $limit = 15;
        $eleveQuery = $this->elevesRepos->findForPaginationLieu($lieuNaissances);
        return $this->paginator->paginate($eleveQuery, $page, $limit);
    }

    public function getPaginatedElevesEcole(?EcoleProvenances $ecoleProvenances = null)
    {
        $request = $this->requestStack->getMainRequest();
        $page = $request->query->getInt('page', 1);
        $limit = 15;
        $eleveQuery = $this->elevesRepos->findForPaginationEcole($ecoleProvenances);
        return $this->paginator->paginate($eleveQuery, $page, $limit);
    }

    /*public function getPaginationElevesPere(?Peres $peres = null)
    {
        $request = $this->requestStack->getMainRequest();
        $page = $request->query->getInt('page', 1);
        $limit = 15;
        $eleveQuery = $this->elevesRepos->findForPaginationPere($peres);
        return $this->paginator->paginate($eleveQuery, $page, $limit);
    }
    public function getPaginatedElevesMere(?Meres $meres = null)
    {
        $request = $this->requestStack->getMainRequest();
        $page = $request->query->getInt('page', 1);
        $limit = 15;
        $eleveQuery = $this->elevesRepos->findForPaginationMere($meres);
        return $this->paginator->paginate($eleveQuery, $page, $limit);
    }*/
}
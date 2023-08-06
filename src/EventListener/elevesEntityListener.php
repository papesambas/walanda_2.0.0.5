<?php

namespace App\EventListener;

use LogicException;
use App\Entity\Eleves;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class elevesEntityListener
{
    private $security;
    private $slugger;
    private $entityManager;

    public function __construct(Security $security, SluggerInterface $slugger, EntityManagerInterface $entityManager)
    {
        $this->security = $security;
        $this->slugger = $slugger;
        $this->entityManager = $entityManager;
    }

    public function prePersist(Eleves $eleves, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/
        $format = 'Y';
        $formatJour = 'd';
        $formatMois = 'm';
        $recrutem = $eleves->getDateRecrutement()->format($format);
        $dateNaissJour = $eleves->getDateNaissance()->format($formatJour);
        $dateNaissMois = $eleves->getDateNaissance()->format($formatMois);
        $nom = $eleves->getNom();
        $prenom = $eleves->getPrenom();
        $nom = substr($nom, 0, 2);
        $prenom = substr($prenom, 0, 2);

        // Générer un matricule aléatoire avec des chiffres et des lettres
        $longueurMatricule = 8;
        $caracteres = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $matricule = '';
        $isUnique = false;

        while (!$isUnique) {
            for ($i = 0; $i < $longueurMatricule; $i++) {
                $indexAleatoire = rand(0, strlen($caracteres) - 1);
                $caractereAleatoire = $caracteres[$indexAleatoire];
                $matricule .= $caractereAleatoire;
            }

            $matricules = $recrutem . ' ' . $nom . $dateNaissJour . $dateNaissMois . $prenom . $matricule . '-' . rand(10000, 99999);

            $existingEleve = $this->entityManager->getRepository(Eleves::class)->findOneBy(['matricule' => $matricules]);
            if ($existingEleve === null) {
                $isUnique = true;
            }
        }
        $eleves
            ->setCreatedAt(new \DateTimeImmutable('now'))
            ->setFullName($eleves->getNom() . ' ' . $eleves->getPrenom())
            ->setMatricule($matricules)
            ->setSlug($this->getElevesSlug($eleves));
        //->setScolarites(+$scolarite1 + $scolarite2 + $scolarite3);
        //->setTotalScolarite($eleves->getScolariteCycle1() + $eleves->getScolariteCycle2() + $eleves->getScolariteCycle3());
    }

    public function preUpdate(Eleves $eleves, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $eleves
            ->setUpdatedAt(new \DateTimeImmutable('now'))
            ->setFullName($eleves->getNom() . ' ' . $eleves->getPrenom())
            ->setSlug($this->getElevesSlug($eleves));
        //->setScolarites(+$scolarite1 + $scolarite2 + $scolarite3);
        //->setTotalScolarite($eleves->getScolariteCycle1() + $eleves->getScolariteCycle2() + $eleves->getScolariteCycle3());
    }

    private function getElevesSlug(Eleves $eleves): string
    {
        $slug = mb_strtolower($eleves->getNom() . '' . $eleves->getMatricule() . '' . $eleves->getId() . '' . $eleves->getPrenom() . '-' . time(), 'UTF-8');
        return $this->slugger->slug($slug);
    }
}

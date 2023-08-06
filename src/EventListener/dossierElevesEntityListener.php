<?php

namespace App\EventListener;

use App\Entity\AnneeScolaires;
use LogicException;
use App\Entity\DossierEleves;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class dossierElevesEntityListener
{
    private $Securty;
    private $Slugger;

    public function __construct(Security $security, SluggerInterface $Slugger)
    {
        $this->Securty = $security;
        $this->Slugger = $Slugger;
    }

    public function prePersist(DossierEleves $dossier, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/


        $dossier
            ->setCreatedAt(new \DateTimeImmutable('now'))
            ->setSlug($this->getDossierSlug($dossier));
    }

    public function preUpdate(DossierEleves $dossier, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $dossier
            ->setUpdatedAt(new \DateTimeImmutable('now'));
    }

    private function getDossierSlug(DossierEleves $dossier): string
    {
        $slug = mb_strtolower($dossier->getDesignation() . '-' . $dossier->getId() . '-' . time(), 'UTF-8');
        return $this->Slugger->slug($slug);
    }
}

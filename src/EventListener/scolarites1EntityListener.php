<?php

namespace App\EventListener;

use LogicException;
use App\Entity\Scolarites1;
use App\Entity\Statuts;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class scolarites1EntityListener
{
    private $Securty;
    private $Slugger;

    public function __construct(Security $security, SluggerInterface $Slugger)
    {
        $this->Securty = $security;
        $this->Slugger = $Slugger;
    }

    public function prePersist(Scolarites1 $scolarites1, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/


        $scolarites1
            ->setCreatedAt(new \DateTimeImmutable('now'));
    }

    public function preUpdate(Scolarites1 $scolarites1, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $scolarites1
            ->setUpdatedAt(new \DateTimeImmutable('now'));
    }


    private function getClassesSlug(Statuts $statut): string
    {
        $slug = mb_strtolower($statut->getDesignation() . '-' . $statut->getId(), 'UTF-8');
        return $this->Slugger->slug($slug);
    }
}

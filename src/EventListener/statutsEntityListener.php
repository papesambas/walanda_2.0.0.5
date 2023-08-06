<?php

namespace App\EventListener;

use LogicException;
use App\Entity\Statuts;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class statutsEntityListener
{
    private $Securty;
    private $Slugger;

    public function __construct(Security $security, SluggerInterface $Slugger)
    {
        $this->Securty = $security;
        $this->Slugger = $Slugger;
    }

    public function prePersist(Statuts $statut, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/


        $statut
            ->setCreatedAt(new \DateTimeImmutable('now'))
            ->setSlug($this->getClassesSlug($statut));
    }

    public function preUpdate(Statuts $statut, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $statut
            ->setUpdatedAt(new \DateTimeImmutable('now'));
    }


    private function getClassesSlug(Statuts $statut): string
    {
        $slug = mb_strtolower($statut->getDesignation() . '-' . $statut->getId() . '-' . time(), 'UTF-8');
        return $this->Slugger->slug($slug);
    }
}

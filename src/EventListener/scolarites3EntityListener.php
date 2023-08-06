<?php

namespace App\EventListener;

use App\Entity\Scolarites3;
use App\Entity\Statuts;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class scolarites3EntityListener
{
    private $Securty;
    private $Slugger;

    public function __construct(Security $security, SluggerInterface $Slugger)
    {
        $this->Securty = $security;
        $this->Slugger = $Slugger;
    }

    public function prePersist(Scolarites3 $scolarites3, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/


        $scolarites3
            ->setCreatedAt(new \DateTimeImmutable('now'));
    }

    public function preUpdate(Scolarites3 $scolarites3, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $scolarites3
            ->setUpdatedAt(new \DateTimeImmutable('now'));
    }


    private function getClassesSlug(Statuts $statut): string
    {
        $slug = mb_strtolower($statut->getDesignation() . '-' . $statut->getId(), 'UTF-8');
        return $this->Slugger->slug($slug);
    }
}

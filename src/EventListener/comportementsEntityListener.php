<?php

namespace App\EventListener;

use App\Entity\Cercles;
use App\Entity\Comportements;
use LogicException;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class comportementsEntityListener
{
    private $Securty;
    private $Slugger;

    public function __construct(Security $security, SluggerInterface $Slugger)
    {
        $this->Securty = $security;
        $this->Slugger = $Slugger;
    }

    public function prePersist(Comportements $comportements, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/


        $comportements
            ->setCreatedAt(new \DateTimeImmutable('now'))
            ->setSlug($this->getClassesSlug($comportements));
    }

    public function preUpdate(Comportements $comportements, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $comportements
            ->setUpdatedAt(new \DateTimeImmutable('now'));
    }


    private function getClassesSlug(Comportements $comportements): string
    {
        $slug = mb_strtolower($comportements->getNature() . '-' . $comportements->getId() . '-' . time(), 'UTF-8');
        return $this->Slugger->slug($slug);
    }
}

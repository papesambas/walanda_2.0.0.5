<?php

namespace App\EventListener;

use LogicException;
use App\Entity\Personnels;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class personnelsEntityListener
{
    private $Securty;
    private $Slugger;

    public function __construct(Security $security, SluggerInterface $Slugger)
    {
        $this->Securty = $security;
        $this->Slugger = $Slugger;
    }

    public function prePersist(Personnels $personnel, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/


        $personnel
            ->setCreatedAt(new \DateTimeImmutable('now'))
            ->setFullName($personnel->getNom() . ' ' . $personnel->getPrenom());
    }

    public function preUpdate(Personnels $personnel, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $personnel
            ->setUpdatedAt(new \DateTimeImmutable('now'))
            ->setFullName($personnel->getNom() . ' ' . $personnel->getPrenom());
    }


    private function getClassesSlug(Personnels $personnel): string
    {
        $slug = mb_strtolower($personnel->getNom() . ' ' . $personnel->getPrenom(), 'UTF-8');
        return $this->$slug;
    }
}

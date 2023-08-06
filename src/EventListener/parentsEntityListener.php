<?php

namespace App\EventListener;

use App\Entity\Cercles;
use App\Entity\Parents;
use LogicException;
use App\Entity\Peres;
use App\Entity\Personnels;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class parentsEntityListener
{


    public function prePersist(Parents $parents, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/


        $parents
            ->setCreatedAt(new \DateTimeImmutable('now'))
            ->setPereFullName($parents->getPereNom() . ' ' . $parents->getPerePrenom())
            ->setMereFullName($parents->getMereNom() . ' ' . $parents->getMerePrenom());
    }

    public function preUpdate(Parents $parents, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $parents
            ->setUpdatedAt(new \DateTimeImmutable('now'))
            ->setPereFullName($parents->getPereNom() . ' ' . $parents->getPerePrenom())
            ->setMereFullName($parents->getMereNom() . ' ' . $parents->getMerePrenom());
    }
}

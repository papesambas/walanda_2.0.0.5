<?php

namespace App\EventListener;

use App\Entity\AnneeScolaires;
use LogicException;
use App\Entity\Classes;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class anneeScolairesEntityListener
{



    public function prePersist(AnneeScolaires $annee, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/


        $annee
            ->setCreatedAt(new \DateTimeImmutable('now'));
    }

    public function preUpdate(AnneeScolaires $annee, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $annee
            ->setUpdatedAt(new \DateTimeImmutable('now'));
    }
}

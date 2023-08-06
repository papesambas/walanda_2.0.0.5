<?php

namespace App\EventListener;

use App\Entity\AnneeScolaires;
use LogicException;
use App\Entity\Classes;
use App\Entity\DossierPersonnels;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class dossierPersonnelsEntityListener
{
    public function prePersist(DossierPersonnels $dossier, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/


        $dossier
            ->setCreatedAt(new \DateTimeImmutable('now'));
    }

    public function preUpdate(DossierPersonnels $dossier, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $dossier
            ->setUpdatedAt(new \DateTimeImmutable('now'));
    }
}

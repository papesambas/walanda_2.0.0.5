<?php

namespace App\EventListener;

use App\Entity\Antecedents;
use LogicException;
use Doctrine\Persistence\Event\LifecycleEventArgs;

class antecedentsEntityListener
{



    public function prePersist(Antecedents $antecedents, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/


        $antecedents
            ->setCreatedAt(new \DateTimeImmutable('now'));
    }

    public function preUpdate(Antecedents $antecedents, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $antecedents
            ->setUpdatedAt(new \DateTimeImmutable('now'));
    }
}

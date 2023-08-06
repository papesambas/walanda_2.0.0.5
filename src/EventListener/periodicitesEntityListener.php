<?php

namespace App\EventListener;

use LogicException;
use App\Entity\Periodicites;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class periodicitesEntityListener
{
    private $Securty;
    private $Slugger;

    public function __construct(Security $security, SluggerInterface $Slugger)
    {
        $this->Securty = $security;
        $this->Slugger = $Slugger;
    }

    public function prePersist(Periodicites $periodicite, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/


        $periodicite
            ->setCreatedAt(new \DateTimeImmutable('now'))
            ->setSlug($this->getClassesSlug($periodicite));
    }

    public function preUpdate(Periodicites $periodicite, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $periodicite
            ->setUpdatedAt(new \DateTimeImmutable('now'));
    }


    private function getClassesSlug(Periodicites $periodicite): string
    {
        $slug = mb_strtolower($periodicite->getDesignation() . '-' . $periodicite->getId(), 'UTF-8');
        return $this->Slugger->slug($slug);
    }
}

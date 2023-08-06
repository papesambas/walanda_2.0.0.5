<?php

namespace App\EventListener;

use LogicException;
use App\Entity\Peres;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class peresEntityListener
{
    private $Securty;
    private $Slugger;

    public function __construct(Security $security, SluggerInterface $Slugger)
    {
        $this->Securty = $security;
        $this->Slugger = $Slugger;
    }

    public function prePersist(Peres $peres, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/


        $peres
            ->setCreatedAt(new \DateTimeImmutable('now'))
            ->setFullName($peres->getNom() . ' ' . $peres->getPrenom())
            ->setSlug($this->getPeresSlug($peres));
    }

    public function preUpdate(Peres $peres, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $peres
            ->setUpdatedAt(new \DateTimeImmutable('now'))
            ->setFullName($peres->getNom() . ' ' . $peres->getPrenom())
            ->setSlug($this->getPeresSlug($peres));
    }

    private function getPeresSlug(Peres $peres): string
    {
        $slug = mb_strtolower($peres->getFullName() . '-' . $peres->getId(), 'UTF-8');
        return $this->Slugger->slug($slug);
    }
}
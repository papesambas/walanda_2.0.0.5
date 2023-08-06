<?php

namespace App\EventListener;

use LogicException;
use App\Entity\Meres;
use App\Entity\Peres;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class meresEntityListener
{
    private $Securty;
    private $Slugger;

    public function __construct(Security $security, SluggerInterface $Slugger)
    {
        $this->Securty = $security;
        $this->Slugger = $Slugger;
    }

    public function prePersist(Meres $meres, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/


        $meres
            ->setCreatedAt(new \DateTimeImmutable('now'))
            ->setFullName($meres->getNom() . ' ' . $meres->getPrenom())
            ->setSlug($this->getMeresSlug($meres));
    }

    public function preUpdate(Meres $meres, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $meres
            ->setUpdatedAt(new \DateTimeImmutable('now'))
            ->setFullName($meres->getNom() . ' ' . $meres->getPrenom())
            ->setSlug($this->getMeresSlug($meres));
    }

    private function getMeresSlug(Meres $meres): string
    {
        $slug = mb_strtolower($meres->getFullName() . '-' . $meres->getId(), 'UTF-8');
        return $this->Slugger->slug($slug);
    }
}

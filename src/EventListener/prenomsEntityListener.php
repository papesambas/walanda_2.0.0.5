<?php

namespace App\EventListener;

use LogicException;
use App\Entity\Prenoms;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class prenomsEntityListener
{
    private $Securty;
    private $Slugger;

    public function __construct(Security $security, SluggerInterface $Slugger)
    {
        $this->Securty = $security;
        $this->Slugger = $Slugger;
    }

    public function prePersist(Prenoms $prenom, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/


        $prenom
            ->setCreatedAt(new \DateTimeImmutable('now'))
            ->setSlug($this->getClassesSlug($prenom));
    }

    public function preUpdate(Prenoms $prenom, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $prenom
            ->setUpdatedAt(new \DateTimeImmutable('now'));
    }


    private function getClassesSlug(Prenoms $prenom): string
    {
        $slug = mb_strtolower($prenom->getDesignation() . '-' . $prenom->getId() . '' . time(), 'UTF-8');
        return $this->Slugger->slug($slug);
    }
}

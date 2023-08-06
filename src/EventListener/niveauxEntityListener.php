<?php

namespace App\EventListener;

use LogicException;
use App\Entity\Niveaux;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class niveauxEntityListener
{
    private $Securty;
    private $Slugger;

    public function __construct(Security $security, SluggerInterface $Slugger)
    {
        $this->Securty = $security;
        $this->Slugger = $Slugger;
    }

    public function prePersist(Niveaux $niveau, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/


        $niveau
            ->setCreatedAt(new \DateTimeImmutable('now'))
            ->setSlug($this->getClassesSlug($niveau));
    }

    public function preUpdate(Niveaux $niveau, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $niveau
            ->setUpdatedAt(new \DateTimeImmutable('now'));
    }


    private function getClassesSlug(Niveaux $niveau): string
    {
        $slug = mb_strtolower($niveau->getDesignation() . '-' . $niveau->getId() . '' . time(), 'UTF-8');
        return $this->Slugger->slug($slug);
    }
}

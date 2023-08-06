<?php

namespace App\EventListener;

use App\Entity\Cercles;
use LogicException;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class cerclesEntityListener
{
    private $Securty;
    private $Slugger;

    public function __construct(Security $security, SluggerInterface $Slugger)
    {
        $this->Securty = $security;
        $this->Slugger = $Slugger;
    }

    public function prePersist(Cercles $cercles, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/


        $cercles
            ->setCreatedAt(new \DateTimeImmutable('now'))
            ->setSlug($this->getClassesSlug($cercles));
    }

    public function preUpdate(Cercles $cercles, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $cercles
            ->setUpdatedAt(new \DateTimeImmutable('now'));
    }


    private function getClassesSlug(Cercles $cercles): string
    {
        $slug = mb_strtolower($cercles->getDesignation() . '-' . $cercles->getId() . '-' . time(), 'UTF-8');
        return $this->Slugger->slug($slug);
    }
}
<?php

namespace App\EventListener;

use LogicException;
use App\Entity\Specialites;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class specialitesEntityListener
{
    private $Securty;
    private $Slugger;

    public function __construct(Security $security, SluggerInterface $Slugger)
    {
        $this->Securty = $security;
        $this->Slugger = $Slugger;
    }

    public function prePersist(Specialites $specialite, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/


        $specialite
            ->setCreatedAt(new \DateTimeImmutable('now'))
            ->setSlug($this->getClassesSlug($specialite));
    }

    public function preUpdate(Specialites $specialite, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $specialite
            ->setUpdatedAt(new \DateTimeImmutable('now'));
    }


    private function getClassesSlug(Specialites $specialite): string
    {
        $slug = mb_strtolower($specialite->getDesignation() . '-' . $specialite->getId(), 'UTF-8');
        return $this->Slugger->slug($slug);
    }
}

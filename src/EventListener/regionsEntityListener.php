<?php

namespace App\EventListener;

use LogicException;
use App\Entity\Regions;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class regionsEntityListener
{
    private $Securty;
    private $Slugger;

    public function __construct(Security $security, SluggerInterface $Slugger)
    {
        $this->Securty = $security;
        $this->Slugger = $Slugger;
    }

    public function prePersist(Regions $region, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/


        $region
            ->setCreatedAt(new \DateTimeImmutable('now'))
            ->setSlug($this->getClassesSlug($region));
    }

    public function preUpdate(Regions $region, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $region
            ->setUpdatedAt(new \DateTimeImmutable('now'));
    }


    private function getClassesSlug(Regions $region): string
    {
        $slug = mb_strtolower($region->getDesignation() . '-' . $region->getId() . '' . time(), 'UTF-8');
        return $this->Slugger->slug($slug);
    }
}

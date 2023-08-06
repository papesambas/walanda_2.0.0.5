<?php

namespace App\EventListener;

use LogicException;
use App\Entity\Cycles;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class cyclesEntityListener
{
    private $Securty;
    private $Slugger;

    public function __construct(Security $security, SluggerInterface $Slugger)
    {
        $this->Securty = $security;
        $this->Slugger = $Slugger;
    }

    public function prePersist(Cycles $cycle, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/


        $cycle
            ->setCreatedAt(new \DateTimeImmutable('now'))
            ->setSlug($this->getClassesSlug($cycle));
    }

    public function preUpdate(Cycles $cycle, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $cycle
            ->setUpdatedAt(new \DateTimeImmutable('now'));
    }


    private function getClassesSlug(Cycles $cycle): string
    {
        $slug = mb_strtolower($cycle->getDesignation() . '-' . $cycle->getId() . '-' . time(), 'UTF-8');
        return $this->Slugger->slug($slug);
    }
}

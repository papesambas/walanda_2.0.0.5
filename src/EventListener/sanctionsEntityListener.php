<?php

namespace App\EventListener;

use App\Entity\Cercles;
use App\Entity\Sanctions;
use LogicException;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class sanctionsEntityListener
{
    private $Securty;
    private $Slugger;

    public function __construct(Security $security, SluggerInterface $Slugger)
    {
        $this->Securty = $security;
        $this->Slugger = $Slugger;
    }

    public function prePersist(Sanctions $sanctions, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/


        $sanctions
            ->setCreatedAt(new \DateTimeImmutable('now'))
            ->setSlug($this->getClassesSlug($sanctions));
    }

    public function preUpdate(Sanctions $sanctions, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $sanctions
            ->setUpdatedAt(new \DateTimeImmutable('now'));
    }


    private function getClassesSlug(Sanctions $sanctions): string
    {
        $slug = mb_strtolower($sanctions->getNature() . '-' . $sanctions->getId(), 'UTF-8');
        return $this->Slugger->slug($slug);
    }
}

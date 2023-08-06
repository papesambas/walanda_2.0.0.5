<?php

namespace App\EventListener;

use App\Entity\Appreciations;
use LogicException;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class appreciationsEntityListener
{
    private $Securty;
    private $Slugger;

    public function __construct(Security $security, SluggerInterface $Slugger)
    {
        $this->Securty = $security;
        $this->Slugger = $Slugger;
    }

    public function prePersist(Appreciations $appreciations, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/


        $appreciations
            ->setCreatedAt(new \DateTimeImmutable('now'))
            ->setSlug($this->getClassesSlug($appreciations));
    }

    public function preUpdate(Appreciations $appreciations, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $appreciations
            ->setUpdatedAt(new \DateTimeImmutable('now'));
    }


    private function getClassesSlug(Appreciations $appreciations): string
    {
        $slug = mb_strtolower($appreciations->getDesignation() . '-' . $appreciations->getId() . '-' . time(), 'UTF-8');
        return $this->Slugger->slug($slug);
    }
}

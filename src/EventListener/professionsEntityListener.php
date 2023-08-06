<?php

namespace App\EventListener;

use LogicException;
use App\Entity\Professions;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class professionsEntityListener
{
    private $Securty;
    private $Slugger;

    public function __construct(Security $security, SluggerInterface $Slugger)
    {
        $this->Securty = $security;
        $this->Slugger = $Slugger;
    }

    public function prePersist(Professions $profession, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/


        $profession
            ->setCreatedAt(new \DateTimeImmutable('now'))
            ->setSlug($this->getClassesSlug($profession));
    }

    public function preUpdate(Professions $profession, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $profession
            ->setUpdatedAt(new \DateTimeImmutable('now'));
    }


    private function getClassesSlug(Professions $profession): string
    {
        $slug = mb_strtolower($profession->getDesignation() . '-' . $profession->getId() . '' . time(), 'UTF-8');
        return $this->Slugger->slug($slug);
    }
}

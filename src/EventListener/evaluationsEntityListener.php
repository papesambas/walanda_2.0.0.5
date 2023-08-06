<?php

namespace App\EventListener;

use App\Entity\Cercles;
use App\Entity\Evaluations;
use LogicException;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class evaluationsEntityListener
{
    private $Securty;
    private $Slugger;

    public function __construct(Security $security, SluggerInterface $Slugger)
    {
        $this->Securty = $security;
        $this->Slugger = $Slugger;
    }

    public function prePersist(Evaluations $evaluations, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/


        $evaluations
            ->setCreatedAt(new \DateTimeImmutable('now'))
            ->setSlug($this->getClassesSlug($evaluations));
    }

    public function preUpdate(Evaluations $evaluations, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $evaluations
            ->setUpdatedAt(new \DateTimeImmutable('now'));
    }


    private function getClassesSlug(Evaluations $evaluations): string
    {
        $slug = mb_strtolower($evaluations->getDesignation() . '-' . $evaluations->getId() . '-' . time(), 'UTF-8');
        return $this->Slugger->slug($slug);
    }
}

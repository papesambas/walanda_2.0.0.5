<?php

namespace App\EventListener;

use LogicException;
use App\Entity\TypeEnseignements;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class enseignementsEntityListener
{
    private $Securty;
    private $Slugger;

    public function __construct(Security $security, SluggerInterface $Slugger)
    {
        $this->Securty = $security;
        $this->Slugger = $Slugger;
    }

    public function prePersist(TypeEnseignements $enseignement, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/


        $enseignement
            ->setCreatedAt(new \DateTimeImmutable('now'))
            ->setSlug($this->getClassesSlug($enseignement));
    }

    public function preUpdate(TypeEnseignements $enseignement, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $enseignement
            ->setUpdatedAt(new \DateTimeImmutable('now'));
    }


    private function getClassesSlug(TypeEnseignements $enseignement): string
    {
        $slug = mb_strtolower($enseignement->getDesignation() . '' . $enseignement->getId() . '' . time(), 'UTF-8');
        return $this->Slugger->slug($slug);
    }
}

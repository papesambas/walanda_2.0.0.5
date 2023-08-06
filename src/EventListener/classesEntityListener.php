<?php

namespace App\EventListener;


use LogicException;
use App\Entity\Classes;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class classesEntityListener
{
    private $Securty;
    private $Slugger;

    public function __construct(Security $security, SluggerInterface $Slugger)
    {
        $this->Securty = $security;
        $this->Slugger = $Slugger;
    }

    public function prePersist(Classes $classes, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $disponibilite = $classes->getCapacite() - $classes->getEffectif();

        $classes
            ->setCreatedAt(new \DateTimeImmutable('now'))
            ->setSlug($this->getClassesSlug($classes))
            ->setEffectif(0)
            ->setDisponibilite($disponibilite);
    }

    public function preUpdate(Classes $classes, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $disponibilite = $classes->getCapacite() - $classes->getEffectif();
        $classes
            ->setUpdatedAt(new \DateTimeImmutable('now'))
            ->setDisponibilite($disponibilite);
    }


    private function getClassesSlug(Classes $classes): string
    {
        $slug = mb_strtolower($classes->getDesignation() . '-' . $classes->getId() . '-' . time(), 'UTF-8');
        return $this->Slugger->slug($slug);
    }
}

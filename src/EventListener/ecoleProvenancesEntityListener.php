<?php

namespace App\EventListener;

use App\Entity\Cercles;
use LogicException;
use App\Entity\EcoleProvenances;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class ecoleProvenancesEntityListener
{
    private $Securty;
    private $Slugger;

    public function __construct(Security $security, SluggerInterface $Slugger)
    {
        $this->Securty = $security;
        $this->Slugger = $Slugger;
    }

    public function prePersist(EcoleProvenances $ecole, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/


        $ecole
            ->setCreatedAt(new \DateTimeImmutable('now'))
            ->setSlug($this->getClassesSlug($ecole));
    }

    public function preUpdate(EcoleProvenances $ecole, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $ecole
            ->setUpdatedAt(new \DateTimeImmutable('now'));
    }


    private function getClassesSlug(EcoleProvenances $ecole): string
    {
        $slug = mb_strtolower($ecole->getDesignation() . '-' . $ecole->getId() . '-' . time(), 'UTF-8');
        return $this->Slugger->slug($slug);
    }
}

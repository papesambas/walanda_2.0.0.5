<?php

namespace App\EventListener;

use LogicException;
use App\Entity\Etablissements;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class etablissementsEntityListener
{
    private $Securty;
    private $Slugger;

    public function __construct(Security $security, SluggerInterface $Slugger)
    {
        $this->Securty = $security;
        $this->Slugger = $Slugger;
    }

    public function prePersist(Etablissements $etablissement, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/


        $etablissement
            ->setCreatedAt(new \DateTimeImmutable('now'))
            ->setSlug($this->getClassesSlug($etablissement));
    }

    public function preUpdate(Etablissements $etablissement, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $etablissement
            ->setUpdatedAt(new \DateTimeImmutable('now'));
    }


    private function getClassesSlug(Etablissements $etablissement): string
    {
        $slug = mb_strtolower($etablissement->getDesignation() . '/' . $etablissement->getId() . '/' . time(), 'UTF-8');
        return $this->Slugger->slug($slug);
    }
}

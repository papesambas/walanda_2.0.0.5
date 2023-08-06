<?php

namespace App\EventListener;

use LogicException;
use App\Entity\Noms;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class nomsEntityListener
{
    private $Securty;
    private $Slugger;

    public function __construct(Security $security, SluggerInterface $Slugger)
    {
        $this->Securty = $security;
        $this->Slugger = $Slugger;
    }

    public function prePersist(Noms $nom, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/


        $nom
            ->setCreatedAt(new \DateTimeImmutable('now'))
            ->setSlug($this->getClassesSlug($nom));
    }

    public function preUpdate(Noms $nom, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $nom
            ->setUpdatedAt(new \DateTimeImmutable('now'));
    }


    private function getClassesSlug(Noms $nom): string
    {
        $slug = mb_strtolower($nom->getDesignation() . '' . $nom->getId() . '' . time(), 'UTF-8');
        return $this->Slugger->slug($slug);
    }
}

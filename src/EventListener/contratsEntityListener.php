<?php

namespace App\EventListener;

use App\Entity\Cercles;
use LogicException;
use App\Entity\Contrats;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class contratsEntityListener
{
    private $Securty;
    private $Slugger;

    public function __construct(Security $security, SluggerInterface $Slugger)
    {
        $this->Securty = $security;
        $this->Slugger = $Slugger;
    }

    public function prePersist(Contrats $contrat, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/


        $contrat
            ->setCreatedAt(new \DateTimeImmutable('now'))
            ->setDesignation('Contrat numéro' . time())
            ->setSlug($this->getClassesSlug($contrat));
    }

    public function preUpdate(Contrats $contrat, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $contrat
            ->setUpdatedAt(new \DateTimeImmutable('now'));
    }


    private function getClassesSlug(Contrats $contrat): string
    {
        $slug = mb_strtolower($contrat->getDesignation() . '-' . $contrat->getId() . '-' . time(), 'UTF-8');
        return $this->Slugger->slug($slug);
    }
}

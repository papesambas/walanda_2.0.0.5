<?php

namespace App\EventListener;

use App\Entity\Ninas;
use LogicException;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class ninasEntityListener
{
    private $Securty;
    private $Slugger;

    public function __construct(Security $security, SluggerInterface $Slugger)
    {
        $this->Securty = $security;
        $this->Slugger = $Slugger;
    }

    public function prePersist(Ninas $ninas, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/


        $ninas
            ->setCreatedAt(new \DateTimeImmutable('now'))
            ->setSlug($this->getClassesSlug($ninas));
    }

    public function preUpdate(Ninas $ninas, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $ninas
            ->setUpdatedAt(new \DateTimeImmutable('now'));
    }


    private function getClassesSlug(Ninas $ninas): string
    {
        $slug = mb_strtolower($ninas->getDesignation() . '-' . $ninas->getId(), 'UTF-8');
        return $this->Slugger->slug($slug);
    }
}

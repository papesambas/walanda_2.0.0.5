<?php

namespace App\EventListener;

use App\Entity\Telephones;
use LogicException;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class telephonesEntityListener
{
    private $Securty;
    private $Slugger;

    public function __construct(Security $security, SluggerInterface $Slugger)
    {
        $this->Securty = $security;
        $this->Slugger = $Slugger;
    }

    public function prePersist(Telephones $telephones, LifecycleEventArgs $arg): void
    {
        $user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }


        $telephones
            ->setCreatedAt(new \DateTimeImmutable('now'))
            ->setSlug($this->getClassesSlug($telephones));
    }

    public function preUpdate(Telephones $telephones, LifecycleEventArgs $arg): void
    {
        $user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }

        $telephones
            ->setUpdatedAt(new \DateTimeImmutable('now'));
    }


    private function getClassesSlug(Telephones $telephones): string
    {
        $slug = mb_strtolower($telephones->getNumero() . '-' . $telephones->getId(), 'UTF-8');
        return $this->Slugger->slug($slug);
    }
}
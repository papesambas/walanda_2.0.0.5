<?php

namespace App\EventListener;

use LogicException;
use App\Entity\Users;
use Symfony\Bundle\SecurityBundle\Security;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\String\Slugger\SluggerInterface;

class usersEntityListener
{
    private $Securty;
    private $Slugger;

    public function __construct(Security $security, SluggerInterface $Slugger)
    {
        $this->Securty = $security;
        $this->Slugger = $Slugger;
    }
    public function prePersist(Users $user, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/


        $user
            ->setCreatedAt(new \DateTimeImmutable('now'))
            ->setFullName($user->getNom() . ' ' . $user->getPrenom())
            ->setSlug($this->getUsersSlug($user));
    }

    public function preUpdate(Users $user, LifecycleEventArgs $arg): void
    {
        /*$user = $this->Securty->getUser();
        if ($user === null) {
            throw new LogicException('User cannot be null here ...');
        }*/

        $user
            ->setUpdatedAt(new \DateTimeImmutable('now'))
            ->setFullName($user->getNom() . ' ' . $user->getPrenom())
            ->setSlug($this->getUsersSlug($user));
    }

    private function getUsersSlug(Users $users): string
    {
        $slug = mb_strtolower($users->getNom() . ' ' . $users->getPrenom() . '-' . $users->getId() . '-' . time(), 'UTF-8');
        return $this->Slugger->slug($slug);
    }
}

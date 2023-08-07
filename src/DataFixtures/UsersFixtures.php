<?php

namespace App\DataFixtures;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;
use App\Entity\Users;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsersFixtures extends Fixture implements DependentFixtureInterface
{
    private $counter = 1;
    public function __construct(
        private UserPasswordHasherInterface $passwordEncoder,
        private SluggerInterface $slugger
    ) {
    }
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        $superAdmin = new Users();
        $superAdmin->setNom($this->getReference('nom_' . $faker->numberBetween(1, 50)));
        $superAdmin->setPrenom($this->getReference('prenom_' . $faker->numberBetween(1, 100)));
        $superAdmin->setEmail('superadmin@demo.fr');
        $superAdmin->setFullName('Super Admin');
        $superAdmin->setUsername('superadmin');
        $superAdmin->setPassword(
            $this->passwordEncoder->hashPassword($superAdmin, 'superadmin')
        );
        $superAdmin->setRoles(['ROLE_SUPER_ADMIN']);
        $manager->persist($superAdmin);
        $this->addReference('user-' . $this->counter, $superAdmin);
        $this->counter++;

        $admin = new Users();
        $admin->setNom($this->getReference('nom_' . $faker->numberBetween(1, 50)));
        $admin->setPrenom($this->getReference('prenom_' . $faker->numberBetween(1, 100)));
        $admin->setEmail('admin@demo.fr');
        $admin->setFullName('Admin');
        $admin->setUsername('admin');
        $admin->setPassword(
            $this->passwordEncoder->hashPassword($admin, 'admin123')
        );
        $admin->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);
        $this->addReference('user-' . $this->counter, $admin);
        $this->counter++;

        for ($i = 1; $i <= 10; $i++) {
            $user = new Users();
            $user->setNom($this->getReference('nom_' . $faker->numberBetween(1, 50)));
            $user->setPrenom($this->getReference('prenom_' . $faker->numberBetween(1, 100)));
            $user->setEmail($faker->email);
            $user->setFullName($faker->lastName() . ' ' . $faker->firstNameMale());
            $user->setUsername('User' . ' ' . $this->counter);
            $user->setPassword(
                $this->passwordEncoder->hashPassword($user, 'secret')
            );
            $manager->persist($user);
            $this->addReference('user-' . $this->counter, $user);
            $this->counter++;
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            NinasFixtures::class,
        ];
    }
}
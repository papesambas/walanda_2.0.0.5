<?php

namespace App\DataFixtures;

use Faker;
use Faker\Factory;
use App\Entity\Meres;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class MeresFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        $usedPhoneNumbers = [];

        for ($i = 1; $i <= 120; $i++) {
            $profession = $this->getReference('profession_' . $faker->numberBetween(1, 150));
            $mere = new Meres();

            do {
                $telephone = $this->getReference('telephone_' . $faker->numberBetween(301, 600));
            } while (in_array($telephone->getId(), $usedPhoneNumbers));

            $usedPhoneNumbers[] = $telephone->getId();

            $nom = $this->getReference('nom_' . $faker->numberBetween(1, 50));
            $prenom = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
            $mere->setNom($nom);
            $mere->setPrenom($prenom);
            $mere->setProfession($profession);
            $mere->setTelephone($telephone);

            $manager->persist($mere);
            $this->addReference('mere_' . $i, $mere);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            PeresFixtures::class
        ];
    }
}

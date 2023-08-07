<?php

namespace App\DataFixtures;

use Faker;
use Faker\Factory;
use App\Entity\Peres;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class PeresFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        $usedPhoneNumbers = [];

        for ($i = 1; $i <= 100; $i++) {
            $profession = $this->getReference('profession_' . $faker->numberBetween(1, 250));
            $pere = new Peres();

            do {
                $telephone = $this->getReference('telephone_' . $faker->numberBetween(1, 300));
            } while (in_array($telephone->getId(), $usedPhoneNumbers));

            $usedPhoneNumbers[] = $telephone->getId();

            $nom = $this->getReference('nom_' . $faker->numberBetween(1, 50));
            $prenom = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
            $pere->setNom($nom);
            $pere->setPrenom($prenom);
            $pere->setProfession($profession);
            $pere->setTelephone($telephone);

            $manager->persist($pere);
            $this->addReference('pere_' . $i, $pere);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            LieuNaissancesFixtures::class,
        ];
    }
}
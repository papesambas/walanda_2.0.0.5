<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Departements;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class DepartementsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 1; $i <= 6; $i++) {
            $departement = new Departements();
            $departement->setDesignation('Département' . ' ' . $i);
            $manager->persist($departement);
            $this->addReference('departement_' . $i, $departement);
        }


        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            Classes12emeAnFixtures::class,
        ];
    }
}

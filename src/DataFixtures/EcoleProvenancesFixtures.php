<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\EcoleProvenances;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class EcoleProvenancesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 1; $i <= 200; $i++) {
            $ecole = new EcoleProvenances();
            $ecole->setDesignation($faker->unique()->company);
            $manager->persist($ecole);
            $this->addReference('ecole_' . $i, $ecole);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            DepartementsFixtures::class,
        ];
    }
}

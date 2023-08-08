<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Classes;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class Classes5emeAnFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($c5eme = 1; $c5eme <= 3; $c5eme++) {
            if ($c5eme == 1) {
                $niveau = $this->getReference('niveau5eme-' . $faker->numberBetween(5, 5));
                $classe = new Classes();
                $classe->setDesignation('5ème Année A');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe5eme-' . $c5eme, $classe);
            } elseif ($c5eme == 2) {
                $niveau = $this->getReference('niveau5eme-' . $faker->numberBetween(5, 5));
                $classe = new Classes();
                $classe->setDesignation('5ème Année B');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe5eme-' . $c5eme, $classe);
            } else {
                $niveau = $this->getReference('niveau5eme-' . $faker->numberBetween(5, 5));
                $classe = new Classes();
                $classe->setDesignation('5ème Année C');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe5eme-' . $c5eme, $classe);
            }
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            Classes4emeAnFixtures::class,

        ];
    }
}

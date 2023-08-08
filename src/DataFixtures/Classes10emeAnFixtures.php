<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Classes;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class Classes10emeAnFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($c10eme = 1; $c10eme <= 5; $c10eme++) {
            if ($c10eme == 1) {
                $niveau = $this->getReference('niveau10eme-' . $faker->numberBetween(1, 1));
                $classe = new Classes();
                $classe->setDesignation('10ème Année A');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe10eme-' . $c10eme, $classe);
            } elseif ($c10eme == 2) {
                $niveau = $this->getReference('niveau10eme-' . $faker->numberBetween(1, 1));
                $classe = new Classes();
                $classe->setDesignation('10ème Année B');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe10eme-' . $c10eme, $classe);
            } elseif ($c10eme == 3) {
                $niveau = $this->getReference('niveau10eme-' . $faker->numberBetween(1, 1));
                $classe = new Classes();
                $classe->setDesignation('10ème Année C');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe10eme-' . $c10eme, $classe);
            } elseif ($c10eme == 4) {
                $niveau = $this->getReference('niveau10eme-' . $faker->numberBetween(1, 1));
                $classe = new Classes();
                $classe->setDesignation('10ème Année D');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe10eme-' . $c10eme, $classe);
            } else {
                $niveau = $this->getReference('niveau10eme-' . $faker->numberBetween(1, 1));
                $classe = new Classes();
                $classe->setDesignation('10ème Année E');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe10eme-' . $c10eme, $classe);
            }
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            Classes9emeAnFixtures::class,

        ];
    }
}

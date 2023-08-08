<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Classes;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class Classes7emeAnFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($c7eme = 1; $c7eme <= 3; $c7eme++) {
            if ($c7eme == 1) {
                $niveau = $this->getReference('niveau7eme-' . $faker->numberBetween(1, 1));
                $classe = new Classes();
                $classe->setDesignation('7ème Année A');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe7eme-' . $c7eme, $classe);
            } elseif ($c7eme == 2) {
                $niveau = $this->getReference('niveau7eme-' . $faker->numberBetween(1, 1));
                $classe = new Classes();
                $classe->setDesignation('7ème Année B');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe7eme-' . $c7eme, $classe);
            } else {
                $niveau = $this->getReference('niveau7eme-' . $faker->numberBetween(1, 1));
                $classe = new Classes();
                $classe->setDesignation('7ème Année C');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe7eme-' . $c7eme, $classe);
            }
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            Classes6emeAnFixtures::class,

        ];
    }
}

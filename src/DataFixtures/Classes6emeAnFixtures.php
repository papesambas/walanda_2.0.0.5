<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Classes;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class Classes6emeAnFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($c6eme = 1; $c6eme <= 3; $c6eme++) {
            if ($c6eme == 1) {
                $niveau = $this->getReference('niveau6eme-' . $faker->numberBetween(6, 6));
                $classe = new Classes();
                $classe->setDesignation('6ème Année A');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe6eme-' . $c6eme, $classe);
            } elseif ($c6eme == 2) {
                $niveau = $this->getReference('niveau6eme-' . $faker->numberBetween(6, 6));
                $classe = new Classes();
                $classe->setDesignation('6ème Année B');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe6eme-' . $c6eme, $classe);
            } else {
                $niveau = $this->getReference('niveau6eme-' . $faker->numberBetween(6, 6));
                $classe = new Classes();
                $classe->setDesignation('6ème Année C');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe6eme-' . $c6eme, $classe);
            }
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            Classes5emeAnFixtures::class,
        ];
    }
}

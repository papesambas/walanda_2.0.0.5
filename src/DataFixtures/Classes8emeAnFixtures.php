<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Classes;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class Classes8emeAnFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($c8eme = 1; $c8eme <= 3; $c8eme++) {
            if ($c8eme == 1) {
                $niveau = $this->getReference('niveau8eme-' . $faker->numberBetween(2, 2));
                $classe = new Classes();
                $classe->setDesignation('8ème Année A');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe8eme-' . $c8eme, $classe);
            } elseif ($c8eme == 2) {
                $niveau = $this->getReference('niveau8eme-' . $faker->numberBetween(2, 2));
                $classe = new Classes();
                $classe->setDesignation('8ème Année B');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe8eme-' . $c8eme, $classe);
            } else {
                $niveau = $this->getReference('niveau8eme-' . $faker->numberBetween(2, 2));
                $classe = new Classes();
                $classe->setDesignation('8ème Année C');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe8eme-' . $c8eme, $classe);
            }
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            Classes7emeAnFixtures::class,
        ];
    }
}

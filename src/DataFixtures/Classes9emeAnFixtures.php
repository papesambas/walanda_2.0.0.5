<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Classes;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class Classes9emeAnFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($c9eme = 1; $c9eme <= 3; $c9eme++) {
            if ($c9eme == 1) {
                $niveau = $this->getReference('niveau9eme-' . $faker->numberBetween(3, 3));
                $classe = new Classes();
                $classe->setDesignation('9ème Année A');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe9eme-' . $c9eme, $classe);
            } elseif ($c9eme == 2) {
                $niveau = $this->getReference('niveau9eme-' . $faker->numberBetween(3, 3));
                $classe = new Classes();
                $classe->setDesignation('9ème Année B');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe9eme-' . $c9eme, $classe);
            } else {
                $niveau = $this->getReference('niveau9eme-' . $faker->numberBetween(3, 3));
                $classe = new Classes();
                $classe->setDesignation('9ème Année C');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe9eme-' . $c9eme, $classe);
            }
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            Classes8emeAnFixtures::class,

        ];
    }
}

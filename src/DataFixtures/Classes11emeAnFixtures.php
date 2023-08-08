<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Classes;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class Classes11emeAnFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($c11eme = 1; $c11eme <= 5; $c11eme++) {
            if ($c11eme == 1) {
                $niveau = $this->getReference('niveau11eme-' . $faker->numberBetween(2, 2));
                $classe = new Classes();
                $classe->setDesignation('11ème Année A');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe11eme-' . $c11eme, $classe);
            } elseif ($c11eme == 2) {
                $niveau = $this->getReference('niveau11eme-' . $faker->numberBetween(2, 2));
                $classe = new Classes();
                $classe->setDesignation('11ème Année B');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe11eme-' . $c11eme, $classe);
            } elseif ($c11eme == 3) {
                $niveau = $this->getReference('niveau11eme-' . $faker->numberBetween(2, 2));
                $classe = new Classes();
                $classe->setDesignation('11ème Année C');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe11eme-' . $c11eme, $classe);
            } elseif ($c11eme == 4) {
                $niveau = $this->getReference('niveau11eme-' . $faker->numberBetween(2, 2));
                $classe = new Classes();
                $classe->setDesignation('11ème Année D');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe11eme-' . $c11eme, $classe);
            } else {
                $niveau = $this->getReference('niveau11eme-' . $faker->numberBetween(2, 2));
                $classe = new Classes();
                $classe->setDesignation('11ème Année E');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe11eme-' . $c11eme, $classe);
            }
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            Classes10emeAnFixtures::class,
        ];
    }
}

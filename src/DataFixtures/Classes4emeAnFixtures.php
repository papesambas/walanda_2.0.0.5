<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Classes;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class Classes4emeAnFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($c4eme = 1; $c4eme <= 3; $c4eme++) {
            if ($c4eme == 1) {
                $niveau = $this->getReference('niveau4eme-' . $faker->numberBetween(4, 4));
                $classe = new Classes();
                $classe->setDesignation('4ème Année A');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe4eme-' . $c4eme, $classe);
            } elseif ($c4eme == 2) {
                $niveau = $this->getReference('niveau4eme-' . $faker->numberBetween(4, 4));
                $classe = new Classes();
                $classe->setDesignation('4ème Année B');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe4eme-' . $c4eme, $classe);
            } else {
                $niveau = $this->getReference('niveau4eme-' . $faker->numberBetween(4, 4));
                $classe = new Classes();
                $classe->setDesignation('4ème Année C');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe4eme-' . $c4eme, $classe);
            }
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            Classes3emeAnFixtures::class,
        ];
    }
}

<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Classes;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class Classes3emeAnFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($c3eme = 1; $c3eme <= 3; $c3eme++) {
            if ($c3eme == 1) {
                $niveau = $this->getReference('niveau3eme-' . $faker->numberBetween(3, 3));
                $classe = new Classes();
                $classe->setDesignation('3ème Année A');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe3eme-' . $c3eme, $classe);
            } elseif ($c3eme == 2) {
                $niveau = $this->getReference('niveau3eme-' . $faker->numberBetween(3, 3));
                $classe = new Classes();
                $classe->setDesignation('3ème Année B');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe3eme-' . $c3eme, $classe);
            } else {
                $niveau = $this->getReference('niveau3eme-' . $faker->numberBetween(3, 3));
                $classe = new Classes();
                $classe->setDesignation('3ème Année C');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe3eme-' . $c3eme, $classe);
            }
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            Classes2emeAnFixtures::class,
        ];
    }
}

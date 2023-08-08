<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Classes;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class Classes2emeAnFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($c2eme = 1; $c2eme <= 3; $c2eme++) {
            if ($c2eme == 1) {
                $niveau = $this->getReference('niveau2eme-' . $faker->numberBetween(2, 2));
                $classe = new Classes();
                $classe->setDesignation('2ème Année A');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe2eme-' . $c2eme, $classe);
            } elseif ($c2eme == 2) {
                $niveau = $this->getReference('niveau2eme-' . $faker->numberBetween(2, 2));
                $classe = new Classes();
                $classe->setDesignation('2ème Année B');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe2eme-' . $c2eme, $classe);
            } else {
                $niveau = $this->getReference('niveau2eme-' . $faker->numberBetween(2, 2));
                $classe = new Classes();
                $classe->setDesignation('2ème Année C');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe2eme-' . $c2eme, $classe);
            }
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            Classes1ereAnFixtures::class,
        ];
    }
}

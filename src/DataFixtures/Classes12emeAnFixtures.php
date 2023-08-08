<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Classes;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class Classes12emeAnFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($c12eme = 1; $c12eme <= 6; $c12eme++) {
            if ($c12eme == 1) {
                $niveau = $this->getReference('niveau12eme-' . $faker->numberBetween(3, 3));
                $classe = new Classes();
                $classe->setDesignation('12ème Année A');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe12eme-' . $c12eme, $classe);
            } elseif ($c12eme == 2) {
                $niveau = $this->getReference('niveau12eme-' . $faker->numberBetween(3, 3));
                $classe = new Classes();
                $classe->setDesignation('12ème Année B');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe12eme-' . $c12eme, $classe);
            } elseif ($c12eme == 3) {
                $niveau = $this->getReference('niveau12eme-' . $faker->numberBetween(3, 3));
                $classe = new Classes();
                $classe->setDesignation('12ème Année C');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe12eme-' . $c12eme, $classe);
            } elseif ($c12eme == 4) {
                $niveau = $this->getReference('niveau12eme-' . $faker->numberBetween(3, 3));
                $classe = new Classes();
                $classe->setDesignation('12ème Année D');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe12eme-' . $c12eme, $classe);
            } elseif ($c12eme == 5) {
                $niveau = $this->getReference('niveau12eme-' . $faker->numberBetween(3, 3));
                $classe = new Classes();
                $classe->setDesignation('12ème Année E');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe12eme-' . $c12eme, $classe);
            } else {
                $niveau = $this->getReference('niveau12eme-' . $faker->numberBetween(3, 3));
                $classe = new Classes();
                $classe->setDesignation('12ème Année F');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe12eme-' . $c12eme, $classe);
            }
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            Classes11emeAnFixtures::class,
        ];
    }
}

<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Classes;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class Classes1ereAnFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($c1er = 1; $c1er <= 3; $c1er++) {
            if ($c1er == 1) {
                $niveau = $this->getReference('niveau1er-' . $faker->numberBetween(1, 1));
                $classe = new Classes();
                $classe->setDesignation('1ère Année A');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe1ere-' . $c1er, $classe);
            } elseif ($c1er == 2) {
                $niveau = $this->getReference('niveau1er-' . $faker->numberBetween(1, 1));
                $classe = new Classes();
                $classe->setDesignation('1ère Année B');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe1ere-' . $c1er, $classe);
            } else {
                $niveau = $this->getReference('niveau1er-' . $faker->numberBetween(1, 1));
                $classe = new Classes();
                $classe->setDesignation('1ère Année C');
                $classe->setCapacite('40');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classe1ere-' . $c1er, $classe);
            }
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ClassesGrandeFixtures::class
        ];
    }
}

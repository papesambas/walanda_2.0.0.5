<?php

namespace App\DataFixtures;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;
use App\Entity\Cycles;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CyclesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($cyc = 1; $cyc <= 4; $cyc++) {
            if ($cyc == 1) {
                $enseignement = $this->getReference('enseignement-' . $faker->numberBetween(1, 1));
                $cycle = new Cycles();
                $cycle->setDesignation('Pré-Scolaire');
                $cycle->setEnseignement($enseignement);
                $manager->persist($cycle);
                $this->setReference('cycle-' . $cyc, $cycle);
            } elseif ($cyc == 2) {
                $enseignement = $this->getReference('enseignement-' . $faker->numberBetween(1, 1));
                $cycle = new Cycles();
                $cycle->setDesignation('1er Cycle');
                $cycle->setEnseignement($enseignement);
                $manager->persist($cycle);
                $this->setReference('cycle-' . $cyc, $cycle);
            } elseif ($cyc == 3) {
                $enseignement = $this->getReference('enseignement-' . $faker->numberBetween(1, 1));
                $cycle = new Cycles();
                $cycle->setDesignation('2nd Cycle');
                $cycle->setEnseignement($enseignement);
                $manager->persist($cycle);
                $this->setReference('cycle-' . $cyc, $cycle);
            } else {
                $enseignement = $this->getReference('enseignement-' . $faker->numberBetween(1, 1));
                $cycle = new Cycles();
                $cycle->setDesignation('Secondaire');
                $cycle->setEnseignement($enseignement);
                $manager->persist($cycle);
                $this->setReference('cycle-' . $cyc, $cycle);
            }
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            EnseignementsFixtures::class
        ];
    }
}
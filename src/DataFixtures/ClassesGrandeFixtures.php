<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Classes;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ClassesGrandeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($clM = 1; $clM <= 3; $clM++) {
            if ($clM == 1) {
                $niveau = $this->getReference('niveauMat-' . $faker->numberBetween(3, 3));
                $classe = new Classes();
                $classe->setDesignation('Grande Section 1');
                $classe->setCapacite('20');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classeGS-' . $clM, $classe);
            } elseif ($clM == 2) {
                $niveau = $this->getReference('niveauMat-' . $faker->numberBetween(3, 3));
                $classe = new Classes();
                $classe->setDesignation('Grande Section 2');
                $classe->setCapacite('20');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classeGS-' . $clM, $classe);
            } else {
                $niveau = $this->getReference('niveauMat-' . $faker->numberBetween(3, 3));
                $classe = new Classes();
                $classe->setDesignation('Grande Section 3');
                $classe->setCapacite('20');
                $classe->setNiveau($niveau);
                $manager->persist($classe);
                $this->setReference('classeGS-' . $clM, $classe);
            }
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ClassesMoyenneFixtures::class,
        ];
    }
}

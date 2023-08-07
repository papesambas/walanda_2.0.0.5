<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Enseignements;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class EnseignementsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($ens = 1; $ens <= 2; $ens++) {
            if ($ens == 1) {
                $faker = Faker\Factory::create('fr_FR');
                $enseignement = new Enseignements();
                $etablissement = $this->getReference('etablissement-' . $faker->numberBetween(1, 1));
                $enseignement->setDesignation('Enseignement Classique');
                $enseignement->setEtablissement($etablissement);
                $manager->persist($enseignement);
                $this->setReference('enseignement-' . $ens, $enseignement);
            } elseif ($ens == 2) {
                $faker = Faker\Factory::create('fr_FR');
                $enseignement = new Enseignements();
                $etablissement = $this->getReference('etablissement-' . $faker->numberBetween(1, 1));
                $enseignement->setDesignation('Enseignement Spécialisé');
                $enseignement->setEtablissement($etablissement);
                $manager->persist($enseignement);
                $this->setReference('enseignement-' . $ens, $enseignement);
            }
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            EtablissementsFixtures::class
        ];
    }
}
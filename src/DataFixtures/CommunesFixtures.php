<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Communes;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CommunesFixtures extends Fixture implements DependentFixtureInterface
{
    private $counteur = 1;

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 1; $i <= 175; $i++) {
            $commune = new Communes();
            $cercle = $this->getReference('cercle_' . $faker->numberBetween(1, 23));
            $commune->setCercle($cercle);
            $commune->setDesignation('commune' . ' ' . $this->counteur);
            $manager->persist($commune);
            $this->addReference('commune_' . $this->counteur, $commune);
            $this->counteur++;
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            CerclesFixtures::class,
        ];
    }
}
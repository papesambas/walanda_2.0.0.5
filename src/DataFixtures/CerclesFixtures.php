<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Cercles;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CerclesFixtures extends Fixture implements DependentFixtureInterface
{
    private $counteur = 1;

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 1; $i <= 23; $i++) {
            $cercle = new Cercles();
            $region = $this->getReference('region_' . $faker->numberBetween(1, 7));
            $cercle->setRegion($region);
            $cercle->setDesignation('cercle' . ' ' . $this->counteur);
            $manager->persist($cercle);
            $this->addReference('cercle_' . $this->counteur, $cercle);
            $this->counteur++;
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            RegionsFixtures::class
        ];
    }
}
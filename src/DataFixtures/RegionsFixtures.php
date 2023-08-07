<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Regions;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class RegionsFixtures extends Fixture implements DependentFixtureInterface
{
    private $counteur = 1;
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 7; $i++) {
            $region = new Regions();
            $region->setDesignation('region' . ' ' . $this->counteur);
            $manager->persist($region);
            $this->addReference('region_' . $this->counteur, $region);
            $this->counteur++;
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ProfessionsFixtures::class,
        ];
    }
}
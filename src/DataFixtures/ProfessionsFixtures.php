<?php

namespace App\DataFixtures;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;
use App\Entity\Professions;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProfessionsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 1; $i <= 300; $i++) {
            $profession = new Professions();
            $profession->setDesignation($faker->unique()->jobTitle);
            $manager->persist($profession);
            $this->addReference('profession_' . $i, $profession);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            TelephonesFixtures::class,
        ];
    }
}

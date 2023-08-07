<?php

namespace App\DataFixtures;

use Faker;
use Faker\Factory;
use App\Entity\Ninas;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class NinasFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 1; $i <= 1000; $i++) {
            $nina = new Ninas();
            $nina->setDesignation($faker->unique()->bothify('############ ?'));

            $manager->persist($nina);
            $this->addReference('nina_' . $i, $nina);
        };

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ProfessionsFixtures::class,
        ];
    }
}

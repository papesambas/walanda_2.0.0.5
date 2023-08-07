<?php

namespace App\DataFixtures;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;
use App\Entity\Telephones;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class TelephonesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 1; $i <= 600; $i++) {
            $telephone = new Telephones();
            $telephone->setNumero($faker->unique()->e164PhoneNumber());
            $manager->persist($telephone);
            $this->addReference('telephone_' . $i, $telephone);
        };

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            PrenomsFixtures::class,
        ];
    }
}

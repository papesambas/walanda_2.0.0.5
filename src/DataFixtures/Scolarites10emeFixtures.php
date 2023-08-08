<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Scolarites3;
use App\Entity\Redoublements1;
use App\Entity\Redoublements2;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class Scolarites10emeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($s10eme = 1; $s10eme <= 3; $s10eme++) {
            if ($s10eme == 1) {
                $niveau = $this->getReference('niveau10eme-' . $faker->numberBetween(1, 1));
                $scolarite3 = new Scolarites3();
                $scolarite3->setScolarite(1);
                $scolarite3->setNiveau($niveau);
                $manager->persist($scolarite3);
                $this->setReference('scolarite10eme-' . $s10eme, $scolarite3);
            } elseif ($s10eme == 2) {
                $niveau = $this->getReference('niveau10eme-' . $faker->numberBetween(1, 1));
                $scolarite3 = new Scolarites3();
                $scolarite3->setScolarite(2);
                $scolarite3->setNiveau($niveau);
                for ($i = 1; $i <= 1; $i++) {
                    $redoublement1 = new Redoublements1;
                    $redoublement1->setNiveau($niveau);
                    $redoublement1->setScolarite3($scolarite3);
                    $manager->persist($redoublement1);
                }
                $manager->persist($scolarite3);
                $this->setReference('scolarite10eme-' . $s10eme, $scolarite3);
            } else {
                $niveau = $this->getReference('niveau10eme-' . $faker->numberBetween(1, 1));
                $scolarite3 = new Scolarites3();
                $scolarite3->setScolarite(3);
                $scolarite3->setNiveau($niveau);
                for ($i = 1; $i <= 1; $i++) {
                    $redoublement1 = new Redoublements1;
                    $redoublement1->setNiveau($niveau);
                    $redoublement1->setScolarite3($scolarite3);
                    for ($a = 1; $a <= 1; $a++) {
                        $redoublement2 = new Redoublements2;
                        $redoublement2->setNiveau($niveau);
                        $redoublement2->setScolarite3($scolarite3);
                        $redoublement2->setRedoublement1($redoublement1);
                        $manager->persist($redoublement2);
                    }
                    $manager->persist($redoublement1);
                }

                $manager->persist($scolarite3);
                $this->setReference('scolarite10eme-' . $s10eme, $scolarite3);
            }
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            Scolarites9emeFixtures::class,
        ];
    }
}

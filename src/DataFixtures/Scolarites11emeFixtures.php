<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Scolarites3;
use App\Entity\Redoublements1;
use App\Entity\Redoublements2;
use App\Entity\Redoublements3;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class Scolarites11emeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        $niveau10eme = $this->getReference('niveau10eme-' . $faker->numberBetween(1, 1));
        $niveau = $this->getReference('niveau11eme-' . $faker->numberBetween(2, 2));
        for ($s11eme = 1; $s11eme <= 4; $s11eme++) {
            if ($s11eme == 1) {
                $scolarite3 = new Scolarites3();
                $scolarite3->setScolarite(2);
                $scolarite3->setNiveau($niveau);
                $manager->persist($scolarite3);
                $this->setReference('scolarite11eme-' . $s11eme, $scolarite3);
            } elseif ($s11eme == 2) {
                $scolarite3 = new Scolarites3();
                $scolarite3->setScolarite(3);
                $scolarite3->setNiveau($niveau);
                for ($i = 1; $i <= 2; $i++) {
                    if ($i == 1) {
                        $redoublement1 = new Redoublements1;
                        $redoublement1->setNiveau($niveau10eme);
                        $redoublement1->setScolarite3($scolarite3);
                        $manager->persist($redoublement1);
                    } elseif ($i == 2) {
                        $redoublement1 = new Redoublements1;
                        $redoublement1->setNiveau($niveau);
                        $redoublement1->setScolarite3($scolarite3);
                        $manager->persist($redoublement1);
                    }
                }

                $manager->persist($scolarite3);
                $this->setReference('scolarite11eme-' . $s11eme, $scolarite3);
            } elseif ($s11eme == 3) {
                $niveau = $this->getReference('niveau11eme-' . $faker->numberBetween(2, 2));
                $scolarite3 = new Scolarites3();
                $scolarite3->setScolarite(4);
                $scolarite3->setNiveau($niveau);
                for ($i = 1; $i <= 2; $i++) {
                    if ($i == 1) {
                        $redoublement1 = new Redoublements1;
                        $redoublement1->setNiveau($niveau10eme);
                        $redoublement1->setScolarite3($scolarite3);
                        for ($a = 1; $a <= 1; $a++) {
                            $redoublement2 = new Redoublements2;
                            $redoublement2->setNiveau($niveau);
                            $redoublement2->setRedoublement1($redoublement1);
                            $redoublement2->setScolarite3($scolarite3);
                            $manager->persist($redoublement2);
                        }
                        $manager->persist($redoublement1);
                    } elseif ($i == 2) {
                        $redoublement1 = new Redoublements1;
                        $redoublement1->setNiveau($niveau);
                        $redoublement1->setScolarite3($scolarite3);
                        for ($a = 1; $a <= 1; $a++) {
                            $redoublement2 = new Redoublements2;
                            $redoublement2->setNiveau($niveau);
                            $redoublement2->setRedoublement1($redoublement1);
                            $redoublement2->setScolarite3($scolarite3);
                            $manager->persist($redoublement2);
                        }
                        $manager->persist($redoublement1);
                    }
                }
                $manager->persist($scolarite3);
                $this->setReference('scolarite11eme-' . $s11eme, $scolarite3);
            } else {
                $scolarite3 = new Scolarites3();
                $scolarite3->setScolarite(5);
                $scolarite3->setNiveau($niveau);
                for ($i = 1; $i <= 1; $i++) {
                    if ($i == 1) {
                        $redoublement1 = new Redoublements1;
                        $redoublement1->setNiveau($niveau10eme);
                        $redoublement1->setScolarite3($scolarite3);
                        for ($a = 1; $a <= 1; $a++) {
                            $redoublement2 = new Redoublements2;
                            $redoublement2->setNiveau($niveau);
                            $redoublement2->setRedoublement1($redoublement1);
                            $redoublement2->setScolarite3($scolarite3);
                            for ($b = 1; $b <= 1; $b++) {
                                $redoublement3 = new Redoublements3;
                                $redoublement3->setNiveau($niveau);
                                $redoublement3->setRedoublement2($redoublement2);
                                $redoublement3->setScolarite3($scolarite3);
                                $manager->persist($redoublement3);
                            }
                            $manager->persist($redoublement2);
                        }
                        $manager->persist($redoublement1);
                    }
                }

                $manager->persist($scolarite3);
                $this->setReference('scolarite11eme-' . $s11eme, $scolarite3);
            }
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            Scolarites10emeFixtures::class,

        ];
    }
}

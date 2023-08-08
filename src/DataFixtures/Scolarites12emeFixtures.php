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

class Scolarites12emeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        $niveau10eme = $this->getReference('niveau10eme-' . $faker->numberBetween(1, 1));
        $niveau11eme = $this->getReference('niveau11eme-' . $faker->numberBetween(2, 2));
        $niveau = $this->getReference('niveau12eme-' . $faker->numberBetween(3, 3));

        for ($s12eme = 1; $s12eme <= 4; $s12eme++) {
            if ($s12eme == 1) {
                $niveau = $this->getReference('niveau12eme-' . $faker->numberBetween(3, 3));
                $scolarite3 = new Scolarites3();
                $scolarite3->setScolarite(3);
                $scolarite3->setNiveau($niveau);
                $manager->persist($scolarite3);
                $this->setReference('scolarite12eme-' . $s12eme, $scolarite3);
            } elseif ($s12eme == 2) {
                $niveau = $this->getReference('niveau12eme-' . $faker->numberBetween(3, 3));
                $scolarite3 = new Scolarites3();
                $scolarite3->setScolarite(4);
                $scolarite3->setNiveau($niveau);
                for ($i = 1; $i <= 3; $i++) {
                    if ($i == 1) {
                        $redoublement1 = new Redoublements1;
                        $redoublement1->setNiveau($niveau10eme);
                        $redoublement1->setScolarite3($scolarite3);
                        $manager->persist($redoublement1);
                    } elseif ($i == 2) {
                        $redoublement1 = new Redoublements1;
                        $redoublement1->setNiveau($niveau11eme);
                        $redoublement1->setScolarite3($scolarite3);
                        $manager->persist($redoublement1);
                    } elseif ($i == 3) {
                        $redoublement1 = new Redoublements1;
                        $redoublement1->setNiveau($niveau);
                        $redoublement1->setScolarite3($scolarite3);
                        $manager->persist($redoublement1);
                    }
                }
                $manager->persist($scolarite3);
                $this->setReference('scolarite12eme-' . $s12eme, $scolarite3);
            } elseif ($s12eme == 3) {
                $niveau = $this->getReference('niveau12eme-' . $faker->numberBetween(3, 3));
                $scolarite3 = new Scolarites3();
                $scolarite3->setScolarite(5);
                $scolarite3->setNiveau($niveau);
                for ($i = 1; $i <= 3; $i++) {
                    if ($i == 1) {
                        $redoublement1 = new Redoublements1;
                        $redoublement1->setNiveau($niveau10eme);
                        $redoublement1->setScolarite3($scolarite3);
                        for ($a = 1; $a <= 2; $a++) {
                            if ($a == 1) {
                                $redoublement2 = new Redoublements2;
                                $redoublement2->setScolarite3($scolarite3);
                                $redoublement2->setNiveau($niveau11eme);
                                $redoublement2->setRedoublement1($redoublement1);
                                $manager->persist($redoublement2);
                            } elseif ($a == 2) {
                                $redoublement2 = new Redoublements2;
                                $redoublement2->setScolarite3($scolarite3);
                                $redoublement2->setNiveau($niveau);
                                $redoublement2->setRedoublement1($redoublement1);
                                $manager->persist($redoublement2);
                            }
                        }
                        $manager->persist($redoublement1);
                    } elseif ($i == 2) {
                        $redoublement1 = new Redoublements1;
                        $redoublement1->setNiveau($niveau11eme);
                        $redoublement1->setScolarite3($scolarite3);
                        for ($a = 1; $a <= 1; $a++) {
                            if ($a == 1) {
                                $redoublement2 = new Redoublements2;
                                $redoublement2->setScolarite3($scolarite3);
                                $redoublement2->setNiveau($niveau);
                                $redoublement2->setRedoublement1($redoublement1);
                                $manager->persist($redoublement2);
                            }
                        }
                        $manager->persist($redoublement1);
                    } elseif ($i == 3) {
                        $redoublement1 = new Redoublements1;
                        $redoublement1->setNiveau($niveau);
                        $redoublement1->setScolarite3($scolarite3);
                        for ($a = 1; $a <= 1; $a++) {
                            if ($a == 1) {
                                $redoublement2 = new Redoublements2;
                                $redoublement2->setScolarite3($scolarite3);
                                $redoublement2->setNiveau($niveau);
                                $redoublement2->setRedoublement1($redoublement1);
                                $manager->persist($redoublement2);
                            }
                        }
                        $manager->persist($redoublement1);
                    }
                }
                $manager->persist($scolarite3);
                $this->setReference('scolarite12eme-' . $s12eme, $scolarite3);
            } else {
                $niveau = $this->getReference('niveau12eme-' . $faker->numberBetween(3, 3));
                $scolarite3 = new Scolarites3();
                $scolarite3->setScolarite(6);
                $scolarite3->setNiveau($niveau);
                for ($i = 1; $i <= 2; $i++) {
                    if ($i == 1) {
                        $redoublement1 = new Redoublements1;
                        $redoublement1->setNiveau($niveau10eme);
                        $redoublement1->setScolarite3($scolarite3);
                        for ($a = 1; $a <= 2; $a++) {
                            if ($a == 1) {
                                $redoublement2 = new Redoublements2;
                                $redoublement2->setScolarite3($scolarite3);
                                $redoublement2->setNiveau($niveau11eme);
                                $redoublement2->setRedoublement1($redoublement1);
                                for ($b = 1; $b <= 1; $b++) {
                                    $redoublement3 = new Redoublements3;
                                    $redoublement3->setScolarite3($scolarite3);
                                    $redoublement3->setNiveau($niveau);
                                    $redoublement3->setRedoublement2($redoublement2);
                                    $manager->persist($redoublement3);
                                }
                                $manager->persist($redoublement2);
                            } elseif ($a == 2) {
                                $redoublement2 = new Redoublements2;
                                $redoublement2->setScolarite3($scolarite3);
                                $redoublement2->setNiveau($niveau);
                                $redoublement2->setRedoublement1($redoublement1);
                                for ($b = 1; $b <= 1; $b++) {
                                    $redoublement3 = new Redoublements3;
                                    $redoublement3->setScolarite3($scolarite3);
                                    $redoublement3->setNiveau($niveau);
                                    $redoublement3->setRedoublement2($redoublement2);
                                    $manager->persist($redoublement3);
                                }
                                $manager->persist($redoublement2);
                            }
                        }
                        $manager->persist($redoublement1);
                    } elseif ($i == 2) {
                        $redoublement1 = new Redoublements1;
                        $redoublement1->setNiveau($niveau11eme);
                        $redoublement1->setScolarite3($scolarite3);
                        for ($a = 1; $a <= 1; $a++) {
                            if ($a == 1) {
                                $redoublement2 = new Redoublements2;
                                $redoublement2->setScolarite3($scolarite3);
                                $redoublement2->setNiveau($niveau);
                                $redoublement2->setRedoublement1($redoublement1);
                                for ($b = 1; $b <= 1; $b++) {
                                    $redoublement3 = new Redoublements3;
                                    $redoublement3->setScolarite3($scolarite3);
                                    $redoublement3->setNiveau($niveau);
                                    $redoublement3->setRedoublement2($redoublement2);
                                    $manager->persist($redoublement3);
                                }
                                $manager->persist($redoublement2);
                            }
                        }
                        $manager->persist($redoublement1);
                    }
                }

                $manager->persist($scolarite3);
                $this->setReference('scolarite12eme-' . $s12eme, $scolarite3);
            }
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            Scolarites11emeFixtures::class,
        ];
    }
}

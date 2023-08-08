<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Scolarites1;
use App\Entity\Scolarites2;
use App\Entity\Redoublements1;
use App\Entity\Redoublements2;
use App\Entity\Redoublements3;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class Scolarites2emeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        $niveau1ere = $this->getReference('niveau1er-' . $faker->numberBetween(1, 1));
        $niveau = $this->getReference('niveau2eme-' . $faker->numberBetween(2, 2));
        for ($s2eme = 1; $s2eme <= 4; $s2eme++) {
            if ($s2eme == 1) {
                $scolarites1 = new Scolarites1();
                $scolarites1->setScolarite(2);
                $scolarites1->setNiveau($niveau);
                for ($scol2nd = 1; $scol2nd <= 1; $scol2nd++) {
                    $scolarites2 = new Scolarites2();
                    $scolarites2->setNiveau($niveau);
                    $scolarites2->setScolarite(0);
                    $scolarites2->setScolarite1($scolarites1);
                    $manager->persist($scolarites2);
                }
                $manager->persist($scolarites1);
                $this->setReference('scolarite2eme-' . $s2eme, $scolarites1);
            } elseif ($s2eme == 2) {
                $scolarites1 = new Scolarites1();
                $scolarites1->setScolarite(3);
                $scolarites1->setNiveau($niveau);
                for ($scol2nd = 1; $scol2nd <= 1; $scol2nd++) {
                    $scolarites2 = new Scolarites2();
                    $scolarites2->setNiveau($niveau);
                    $scolarites2->setScolarite(0);
                    $scolarites2->setScolarite1($scolarites1);
                    for ($i = 1; $i <= 2; $i++) {
                        if ($i == 1) {
                            $redoublement1 = new Redoublements1;
                            $redoublement1->setNiveau($niveau1ere);
                            $redoublement1->setScolarite1($scolarites1);
                            $redoublement1->setScolarite2($scolarites2);
                            $manager->persist($redoublement1);
                        } elseif ($i == 2) {
                            $redoublement1 = new Redoublements1;
                            $redoublement1->setNiveau($niveau);
                            $redoublement1->setScolarite1($scolarites1);
                            $redoublement1->setScolarite2($scolarites2);
                            $manager->persist($redoublement1);
                        }
                    }
                    $manager->persist($scolarites2);
                }
                $manager->persist($scolarites1);
                $this->setReference('scolarite2eme-' . $s2eme, $scolarites1);
            } elseif ($s2eme == 3) {
                $scolarites1 = new Scolarites1();
                $scolarites1->setScolarite(4);
                $scolarites1->setNiveau($niveau);
                for ($scol2nd = 1; $scol2nd <= 1; $scol2nd++) {
                    $scolarites2 = new Scolarites2();
                    $scolarites2->setNiveau($niveau);
                    $scolarites2->setScolarite(0);
                    $scolarites2->setScolarite1($scolarites1);
                    for ($i = 1; $i <= 2; $i++) {
                        if ($i == 1) {
                            $redoublement1 = new Redoublements1;
                            $redoublement1->setNiveau($niveau1ere);
                            $redoublement1->setScolarite1($scolarites1);
                            $redoublement1->setScolarite2($scolarites2);
                            for ($a = 1; $a <= 1; $a++) {
                                $redoublement2 = new Redoublements2;
                                $redoublement2->setNiveau($niveau);
                                $redoublement2->setRedoublement1($redoublement1);
                                $redoublement2->setScolarite1($scolarites1);
                                $redoublement2->setScolarite2($scolarites2);
                                $manager->persist($redoublement2);
                            }
                            $manager->persist($redoublement1);
                        } elseif ($i == 2) {
                            $redoublement1 = new Redoublements1;
                            $redoublement1->setNiveau($niveau);
                            $redoublement1->setScolarite1($scolarites1);
                            $redoublement1->setScolarite2($scolarites2);
                            for ($a = 1; $a <= 1; $a++) {
                                $redoublement2 = new Redoublements2;
                                $redoublement2->setNiveau($niveau);
                                $redoublement2->setRedoublement1($redoublement1);
                                $redoublement2->setScolarite1($scolarites1);
                                $redoublement2->setScolarite2($scolarites2);
                                $manager->persist($redoublement2);
                            }
                            $manager->persist($redoublement1);
                        }
                    }
                    $manager->persist($scolarites2);
                }
                $manager->persist($scolarites1);
                $this->setReference('scolarite2eme-' . $s2eme, $scolarites1);
            } elseif ($s2eme == 4) {
                $scolarites1 = new Scolarites1();
                $scolarites1->setScolarite(5);
                $scolarites1->setNiveau($niveau);
                for ($scol2nd = 1; $scol2nd <= 1; $scol2nd++) {
                    $scolarites2 = new Scolarites2();
                    $scolarites2->setNiveau($niveau);
                    $scolarites2->setScolarite(0);
                    $scolarites2->setScolarite1($scolarites1);
                    for ($i = 1; $i <= 1; $i++) {
                        if ($i == 1) {
                            $redoublement1 = new Redoublements1;
                            $redoublement1->setNiveau($niveau1ere);
                            $redoublement1->setScolarite1($scolarites1);
                            $redoublement1->setScolarite2($scolarites2);
                            for ($a = 1; $a <= 1; $a++) {
                                $redoublement2 = new Redoublements2;
                                $redoublement2->setNiveau($niveau);
                                $redoublement2->setRedoublement1($redoublement1);
                                $redoublement2->setScolarite1($scolarites1);
                                $redoublement2->setScolarite2($scolarites2);
                                for ($b = 1; $b <= 1; $b++) {
                                    $redoublement3 = new Redoublements3;
                                    $redoublement3->setNiveau($niveau);
                                    $redoublement3->setRedoublement2($redoublement2);
                                    $redoublement3->setScolarite1($scolarites1);
                                    $redoublement3->setScolarite2($scolarites2);
                                    $manager->persist($redoublement3);
                                }
                                $manager->persist($redoublement2);
                            }
                            $manager->persist($redoublement1);
                        }
                    }
                    $manager->persist($scolarites2);
                }
                $manager->persist($scolarites1);
                $this->setReference('scolarite2eme-' . $s2eme, $scolarites1);
            }
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            Scolarites1ereFixtures::class,
        ];
    }
}

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

class Scolarites8emeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {

        $faker = Faker\Factory::create('fr_FR');
        for ($scol2 = 1; $scol2 < 4; $scol2++) {
            $niveau1ere = $this->getReference('niveau1er-' . $faker->numberBetween(1, 1));
            $niveau2eme = $this->getReference('niveau2eme-' . $faker->numberBetween(2, 2));
            $niveau3eme = $this->getReference('niveau3eme-' . $faker->numberBetween(3, 3));
            $niveau4eme = $this->getReference('niveau4eme-' . $faker->numberBetween(4, 4));
            $niveau5eme = $this->getReference('niveau5eme-' . $faker->numberBetween(5, 5));
            $niveau6eme = $this->getReference('niveau6eme-' . $faker->numberBetween(6, 6));
            $niveau7eme = $this->getReference('niveau7eme-' . $faker->numberBetween(1, 1));
            $niveau = $this->getReference('niveau8eme-' . $faker->numberBetween(2, 2));

            if ($scol2 == 1) {
                //1er Cycle sans redoublement
                $scolarites1 = new Scolarites1();
                $scolarites1->setScolarite(6);
                $scolarites1->setNiveau($niveau);
                for ($a = 1; $a <= 4; $a++) {
                    if ($a == 1) {
                        //sans redoublement 2nd cycle
                        $scolarites2 = new Scolarites2();
                        $scolarites2->setScolarite(2);
                        $scolarites2->setScolarite1($scolarites1);
                        $scolarites2->setNiveau($niveau);
                        $manager->persist($scolarites2);
                        $this->setReference('scolarite8eme-' . 1, $scolarites2);
                    } elseif ($a == 2) {
                        //1er redoublement en 7ème
                        $scolarites2 = new Scolarites2();
                        $scolarites2->setScolarite(3);
                        $scolarites2->setScolarite1($scolarites1);
                        $scolarites2->setNiveau($niveau);
                        for ($b = 1; $b <= 2; $b++) {
                            if ($b == 1) {
                                $redoublement1 = new Redoublements1;
                                $redoublement1->setNiveau($niveau7eme);
                                $redoublement1->setScolarite1($scolarites1);
                                $redoublement1->setScolarite2($scolarites2);
                                $manager->persist($redoublement1);
                            } elseif ($b == 2) {
                                $redoublement1 = new Redoublements1;
                                $redoublement1->setNiveau($niveau);
                                $redoublement1->setScolarite1($scolarites1);
                                $redoublement1->setScolarite2($scolarites2);
                                $manager->persist($redoublement1);
                            }
                        }
                        $manager->persist($scolarites2);
                        $this->setReference('scolarite8eme-' . 2, $scolarites2);
                    } elseif ($a == 3) {
                        //2eme redoublement en 7ème
                        $scolarites2 = new Scolarites2();
                        $scolarites2->setScolarite(4);
                        $scolarites2->setScolarite1($scolarites1);
                        $scolarites2->setNiveau($niveau);
                        for ($b = 1; $b <= 2; $b++) {
                            if ($b == 1) {
                                $redoublement1 = new Redoublements1;
                                $redoublement1->setNiveau($niveau7eme);
                                $redoublement1->setScolarite1($scolarites1);
                                $redoublement1->setScolarite2($scolarites2);
                                for ($c = 1; $c <= 1; $c++) {
                                    $redoublement2 = new Redoublements2;
                                    $redoublement2->setNiveau($niveau);
                                    $redoublement2->setScolarite1($scolarites1);
                                    $redoublement2->setScolarite2($scolarites2);
                                    $redoublement2->setRedoublement1($redoublement1);
                                    $manager->persist($redoublement2);
                                }

                                $manager->persist($redoublement1);
                            } elseif ($b == 2) {
                                $redoublement1 = new Redoublements1;
                                $redoublement1->setNiveau($niveau);
                                $redoublement1->setScolarite1($scolarites1);
                                $redoublement1->setScolarite2($scolarites2);
                                for ($c = 1; $c <= 1; $c++) {
                                    $redoublement2 = new Redoublements2;
                                    $redoublement2->setNiveau($niveau);
                                    $redoublement2->setScolarite1($scolarites1);
                                    $redoublement2->setScolarite2($scolarites2);
                                    $redoublement2->setRedoublement1($redoublement1);
                                    $manager->persist($redoublement2);
                                }
                                $manager->persist($redoublement1);
                            }
                        }
                        $manager->persist($scolarites2);
                        $this->setReference('scolarite8eme-' . 3, $scolarites2);
                    } elseif ($a == 4) {
                        //3eme redoublement en 8ème
                        $scolarites2 = new Scolarites2();
                        $scolarites2->setScolarite(5);
                        $scolarites2->setScolarite1($scolarites1);
                        $scolarites2->setNiveau($niveau);
                        for ($b = 1; $b <= 1; $b++) {
                            if ($b == 1) {
                                $redoublement1 = new Redoublements1;
                                $redoublement1->setNiveau($niveau7eme);
                                $redoublement1->setScolarite1($scolarites1);
                                $redoublement1->setScolarite2($scolarites2);
                                for ($c = 1; $c <= 1; $c++) {
                                    $redoublement2 = new Redoublements2;
                                    $redoublement2->setNiveau($niveau);
                                    $redoublement2->setScolarite1($scolarites1);
                                    $redoublement2->setScolarite2($scolarites2);
                                    $redoublement2->setRedoublement1($redoublement1);
                                    for ($d = 1; $d <= 1; $d++) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        $manager->persist($redoublement2);
                                    }
                                    $manager->persist($redoublement2);
                                }
                                $manager->persist($redoublement1);
                            }
                        }
                        $manager->persist($scolarites2);
                        $this->setReference('scolarite8eme-' . 4, $scolarites2);
                    }
                }
                $manager->persist($scolarites1);
                $this->setReference('scolarite8eme-' . $scol2, $scolarites1);
                # code...
            } elseif ($scol2 == 2) {
                //1er Cycle 1er redoublement
                $scolarites1 = new Scolarites1();
                $scolarites1->setScolarite(7);
                $scolarites1->setNiveau($niveau);
                for ($a = 1; $a <= 3; $a++) {
                    if ($a == 1) {
                        //sans redoublement au 2nd cycle
                        $scolarites2 = new Scolarites2();
                        $scolarites2->setScolarite(2);
                        $scolarites2->setScolarite1($scolarites1);
                        $scolarites2->setNiveau($niveau);
                        for ($b = 1; $b <= 6; $b++) {
                            if ($b == 1) {
                                //1er redoublement en 1ère Année
                                $redoublement1 = new Redoublements1;
                                $redoublement1->setNiveau($niveau1ere);
                                $redoublement1->setScolarite1($scolarites1);
                                $redoublement1->setScolarite2($scolarites2);
                                $manager->persist($redoublement1);
                            } elseif ($b == 2) {
                                //1er redoublement en 2eme Année
                                $redoublement1 = new Redoublements1;
                                $redoublement1->setNiveau($niveau2eme);
                                $redoublement1->setScolarite1($scolarites1);
                                $redoublement1->setScolarite2($scolarites2);
                                $manager->persist($redoublement1);
                            } elseif ($b == 3) {
                                //1er redoublement en 3eme Année
                                $redoublement1 = new Redoublements1;
                                $redoublement1->setNiveau($niveau3eme);
                                $redoublement1->setScolarite1($scolarites1);
                                $redoublement1->setScolarite2($scolarites2);
                                $manager->persist($redoublement1);
                            } elseif ($b == 4) {
                                //1er redoublement en 4eme Année
                                $redoublement1 = new Redoublements1;
                                $redoublement1->setNiveau($niveau4eme);
                                $redoublement1->setScolarite1($scolarites1);
                                $redoublement1->setScolarite2($scolarites2);
                                $manager->persist($redoublement1);
                            } elseif ($b == 5) {
                                //1er redoublement en 5eme Année
                                $redoublement1 = new Redoublements1;
                                $redoublement1->setNiveau($niveau5eme);
                                $redoublement1->setScolarite1($scolarites1);
                                $redoublement1->setScolarite2($scolarites2);
                                $manager->persist($redoublement1);
                            } elseif ($b == 6) {
                                //1er redoublement en 5eme Année
                                $redoublement1 = new Redoublements1;
                                $redoublement1->setNiveau($niveau6eme);
                                $redoublement1->setScolarite1($scolarites1);
                                $redoublement1->setScolarite2($scolarites2);
                                $manager->persist($redoublement1);
                            }
                        }
                        $manager->persist($scolarites2);
                        $this->setReference('scolarite8eme-' . 1, $scolarites2);
                    } elseif ($a == 2) {
                        //1er redoublement au 2nd cycle
                        $scolarites2 = new Scolarites2();
                        $scolarites2->setScolarite(3);
                        $scolarites2->setScolarite1($scolarites1);
                        $scolarites2->setNiveau($niveau);
                        for ($b = 1; $b <= 6; $b++) {
                            if ($b == 1) {
                                //1er redoublement en 1ère Année
                                $redoublement1 = new Redoublements1;
                                $redoublement1->setNiveau($niveau1ere);
                                $redoublement1->setScolarite1($scolarites1);
                                $redoublement1->setScolarite2($scolarites2);
                                for ($c = 1; $c <= 2; $c++) {
                                    if ($c == 1) {
                                        //1er redoublement en 7eme
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau7eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        $manager->persist($redoublement2);
                                    } elseif ($c == 2) {
                                        //1er redoublement en 7eme
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        $manager->persist($redoublement2);
                                    }
                                }
                                $manager->persist($redoublement1);
                            } elseif ($b == 2) {
                                //1er redoublement en 1ère Année
                                $redoublement1 = new Redoublements1;
                                $redoublement1->setNiveau($niveau2eme);
                                $redoublement1->setScolarite1($scolarites1);
                                $redoublement1->setScolarite2($scolarites2);
                                for ($c = 1; $c <= 2; $c++) {
                                    if ($c == 1) {
                                        //1er redoublement en 7eme
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau7eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        $manager->persist($redoublement2);
                                    } elseif ($c == 2) {
                                        //1er redoublement en 7eme
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        $manager->persist($redoublement2);
                                    }
                                }
                                $manager->persist($redoublement1);
                            } elseif ($b == 3) {
                                //1er redoublement en 1ère Année
                                $redoublement1 = new Redoublements1;
                                $redoublement1->setNiveau($niveau3eme);
                                $redoublement1->setScolarite1($scolarites1);
                                $redoublement1->setScolarite2($scolarites2);
                                for ($c = 1; $c <= 2; $c++) {
                                    if ($c == 1) {
                                        //1er redoublement en 7eme
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau7eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        $manager->persist($redoublement2);
                                    } elseif ($c == 2) {
                                        //1er redoublement en 7eme
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        $manager->persist($redoublement2);
                                    }
                                }
                                $manager->persist($redoublement1);
                            } elseif ($b == 4) {
                                //1er redoublement en 1ère Année
                                $redoublement1 = new Redoublements1;
                                $redoublement1->setNiveau($niveau4eme);
                                $redoublement1->setScolarite1($scolarites1);
                                $redoublement1->setScolarite2($scolarites2);
                                for ($c = 1; $c <= 2; $c++) {
                                    if ($c == 1) {
                                        //1er redoublement en 7eme
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau7eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        $manager->persist($redoublement2);
                                    } elseif ($c == 2) {
                                        //1er redoublement en 7eme
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        $manager->persist($redoublement2);
                                    }
                                }
                                $manager->persist($redoublement1);
                            } elseif ($b == 5) {
                                //1er redoublement en 1ère Année
                                $redoublement1 = new Redoublements1;
                                $redoublement1->setNiveau($niveau5eme);
                                $redoublement1->setScolarite1($scolarites1);
                                $redoublement1->setScolarite2($scolarites2);
                                for ($c = 1; $c <= 2; $c++) {
                                    if ($c == 1) {
                                        //1er redoublement en 7eme
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau7eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        $manager->persist($redoublement2);
                                    } elseif ($c == 2) {
                                        //1er redoublement en 7eme
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        $manager->persist($redoublement2);
                                    }
                                }
                                $manager->persist($redoublement1);
                            } elseif ($b == 6) {
                                //1er redoublement en 1ère Année
                                $redoublement1 = new Redoublements1;
                                $redoublement1->setNiveau($niveau6eme);
                                $redoublement1->setScolarite1($scolarites1);
                                $redoublement1->setScolarite2($scolarites2);
                                for ($c = 1; $c <= 2; $c++) {
                                    if ($c == 1) {
                                        //1er redoublement en 7eme
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau7eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        $manager->persist($redoublement2);
                                    } elseif ($c == 2) {
                                        //1er redoublement en 7eme
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        $manager->persist($redoublement2);
                                    }
                                }
                                $manager->persist($redoublement1);
                            }
                        }
                        $manager->persist($scolarites2);
                        $this->setReference('scolarite8eme-' . 1, $scolarites2);
                    } elseif ($a == 3) {
                        //1er redoublement au 2nd cycle
                        $scolarites2 = new Scolarites2();
                        $scolarites2->setScolarite(4);
                        $scolarites2->setScolarite1($scolarites1);
                        $scolarites2->setNiveau($niveau);
                        for ($b = 1; $b <= 6; $b++) {
                            if ($b == 1) {
                                //1er redoublement en 1ère Année
                                $redoublement1 = new Redoublements1;
                                $redoublement1->setNiveau($niveau1ere);
                                $redoublement1->setScolarite1($scolarites1);
                                $redoublement1->setScolarite2($scolarites2);
                                for ($c = 1; $c <= 2; $c++) {
                                    //1er redoublement en 7eme
                                    if ($c == 1) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau7eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        for ($d = 1; $d <= 1; $d++) {
                                            //1er redoublement en 7eme
                                            $redoublement3 = new Redoublements3;
                                            $redoublement3->setNiveau($niveau);
                                            $redoublement3->setScolarite1($scolarites1);
                                            $redoublement3->setScolarite2($scolarites2);
                                            $redoublement3->setRedoublement2($redoublement2);
                                            $manager->persist($redoublement3);
                                        }
                                        $manager->persist($redoublement2);
                                    } elseif ($c == 2) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        for ($d = 1; $d <= 1; $d++) {
                                            //1er redoublement en 7eme
                                            $redoublement3 = new Redoublements3;
                                            $redoublement3->setNiveau($niveau);
                                            $redoublement3->setScolarite1($scolarites1);
                                            $redoublement3->setScolarite2($scolarites2);
                                            $redoublement3->setRedoublement2($redoublement2);
                                            $manager->persist($redoublement3);
                                        }
                                        $manager->persist($redoublement2);
                                    }
                                }
                                $manager->persist($redoublement1);
                            } elseif ($b == 2) {
                                //1er redoublement en 1ère Année
                                $redoublement1 = new Redoublements1;
                                $redoublement1->setNiveau($niveau2eme);
                                $redoublement1->setScolarite1($scolarites1);
                                $redoublement1->setScolarite2($scolarites2);
                                for ($c = 1; $c <= 2; $c++) {
                                    //1er redoublement en 7eme
                                    if ($c == 1) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau7eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        for ($d = 1; $d <= 1; $d++) {
                                            //1er redoublement en 7eme
                                            $redoublement3 = new Redoublements3;
                                            $redoublement3->setNiveau($niveau);
                                            $redoublement3->setScolarite1($scolarites1);
                                            $redoublement3->setScolarite2($scolarites2);
                                            $redoublement3->setRedoublement2($redoublement2);
                                            $manager->persist($redoublement3);
                                        }
                                        $manager->persist($redoublement2);
                                    } elseif ($c == 2) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        for ($d = 1; $d <= 1; $d++) {
                                            //1er redoublement en 7eme
                                            $redoublement3 = new Redoublements3;
                                            $redoublement3->setNiveau($niveau);
                                            $redoublement3->setScolarite1($scolarites1);
                                            $redoublement3->setScolarite2($scolarites2);
                                            $redoublement3->setRedoublement2($redoublement2);
                                            $manager->persist($redoublement3);
                                        }
                                        $manager->persist($redoublement2);
                                    }
                                }
                                $manager->persist($redoublement1);
                            } elseif ($b == 3) {
                                //1er redoublement en 1ère Année
                                $redoublement1 = new Redoublements1;
                                $redoublement1->setNiveau($niveau3eme);
                                $redoublement1->setScolarite1($scolarites1);
                                $redoublement1->setScolarite2($scolarites2);
                                for ($c = 1; $c <= 2; $c++) {
                                    //1er redoublement en 7eme
                                    if ($c == 1) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau7eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        for ($d = 1; $d <= 1; $d++) {
                                            //1er redoublement en 7eme
                                            $redoublement3 = new Redoublements3;
                                            $redoublement3->setNiveau($niveau);
                                            $redoublement3->setScolarite1($scolarites1);
                                            $redoublement3->setScolarite2($scolarites2);
                                            $redoublement3->setRedoublement2($redoublement2);
                                            $manager->persist($redoublement3);
                                        }
                                        $manager->persist($redoublement2);
                                    } elseif ($c == 2) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        for ($d = 1; $d <= 1; $d++) {
                                            //1er redoublement en 7eme
                                            $redoublement3 = new Redoublements3;
                                            $redoublement3->setNiveau($niveau);
                                            $redoublement3->setScolarite1($scolarites1);
                                            $redoublement3->setScolarite2($scolarites2);
                                            $redoublement3->setRedoublement2($redoublement2);
                                            $manager->persist($redoublement3);
                                        }
                                        $manager->persist($redoublement2);
                                    }
                                }
                                $manager->persist($redoublement1);
                            } elseif ($b == 4) {
                                //1er redoublement en 1ère Année
                                $redoublement1 = new Redoublements1;
                                $redoublement1->setNiveau($niveau4eme);
                                $redoublement1->setScolarite1($scolarites1);
                                $redoublement1->setScolarite2($scolarites2);
                                for ($c = 1; $c <= 2; $c++) {
                                    //1er redoublement en 7eme
                                    if ($c == 1) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau7eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        for ($d = 1; $d <= 1; $d++) {
                                            //1er redoublement en 7eme
                                            $redoublement3 = new Redoublements3;
                                            $redoublement3->setNiveau($niveau);
                                            $redoublement3->setScolarite1($scolarites1);
                                            $redoublement3->setScolarite2($scolarites2);
                                            $redoublement3->setRedoublement2($redoublement2);
                                            $manager->persist($redoublement3);
                                        }
                                        $manager->persist($redoublement2);
                                    } elseif ($c == 2) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        for ($d = 1; $d <= 1; $d++) {
                                            //1er redoublement en 7eme
                                            $redoublement3 = new Redoublements3;
                                            $redoublement3->setNiveau($niveau);
                                            $redoublement3->setScolarite1($scolarites1);
                                            $redoublement3->setScolarite2($scolarites2);
                                            $redoublement3->setRedoublement2($redoublement2);
                                            $manager->persist($redoublement3);
                                        }
                                        $manager->persist($redoublement2);
                                    }
                                }
                                $manager->persist($redoublement1);
                            } elseif ($b == 5) {
                                //1er redoublement en 1ère Année
                                $redoublement1 = new Redoublements1;
                                $redoublement1->setNiveau($niveau5eme);
                                $redoublement1->setScolarite1($scolarites1);
                                $redoublement1->setScolarite2($scolarites2);
                                for ($c = 1; $c <= 2; $c++) {
                                    //1er redoublement en 7eme
                                    if ($c == 1) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau7eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        for ($d = 1; $d <= 1; $d++) {
                                            //1er redoublement en 7eme
                                            $redoublement3 = new Redoublements3;
                                            $redoublement3->setNiveau($niveau);
                                            $redoublement3->setScolarite1($scolarites1);
                                            $redoublement3->setScolarite2($scolarites2);
                                            $redoublement3->setRedoublement2($redoublement2);
                                            $manager->persist($redoublement3);
                                        }
                                        $manager->persist($redoublement2);
                                    } elseif ($c == 2) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        for ($d = 1; $d <= 1; $d++) {
                                            //1er redoublement en 7eme
                                            $redoublement3 = new Redoublements3;
                                            $redoublement3->setNiveau($niveau);
                                            $redoublement3->setScolarite1($scolarites1);
                                            $redoublement3->setScolarite2($scolarites2);
                                            $redoublement3->setRedoublement2($redoublement2);
                                            $manager->persist($redoublement3);
                                        }
                                        $manager->persist($redoublement2);
                                    }
                                }
                                $manager->persist($redoublement1);
                            } elseif ($b == 6) {
                                //1er redoublement en 1ère Année
                                $redoublement1 = new Redoublements1;
                                $redoublement1->setNiveau($niveau6eme);
                                $redoublement1->setScolarite1($scolarites1);
                                $redoublement1->setScolarite2($scolarites2);
                                for ($c = 1; $c <= 2; $c++) {
                                    //1er redoublement en 7eme
                                    if ($c == 1) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau7eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        for ($d = 1; $d <= 1; $d++) {
                                            //1er redoublement en 7eme
                                            $redoublement3 = new Redoublements3;
                                            $redoublement3->setNiveau($niveau);
                                            $redoublement3->setScolarite1($scolarites1);
                                            $redoublement3->setScolarite2($scolarites2);
                                            $redoublement3->setRedoublement2($redoublement2);
                                            $manager->persist($redoublement3);
                                        }
                                        $manager->persist($redoublement2);
                                    } elseif ($c == 2) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        for ($d = 1; $d <= 1; $d++) {
                                            //1er redoublement en 7eme
                                            $redoublement3 = new Redoublements3;
                                            $redoublement3->setNiveau($niveau);
                                            $redoublement3->setScolarite1($scolarites1);
                                            $redoublement3->setScolarite2($scolarites2);
                                            $redoublement3->setRedoublement2($redoublement2);
                                            $manager->persist($redoublement3);
                                        }
                                        $manager->persist($redoublement2);
                                    }
                                }
                                $manager->persist($redoublement1);
                            }
                        }
                        $manager->persist($scolarites2);
                        $this->setReference('scolarite8eme-' . 1, $scolarites2);
                    }
                }
                $manager->persist($scolarites1);
                $this->setReference('scolarite8eme-' . $scol2, $scolarites1);

                # code...
            } elseif ($scol2 == 3) {
                //1er Cycle 2eme redoublement
                $scolarites1 = new Scolarites1();
                $scolarites1->setScolarite(8);
                $scolarites1->setNiveau($niveau);
                for ($a = 1; $a <= 2; $a++) {
                    if ($a == 1) {
                        //sans redoublement au 2nd cycle
                        $scolarites2 = new Scolarites2();
                        $scolarites2->setScolarite(2);
                        $scolarites2->setScolarite1($scolarites1);
                        $scolarites2->setNiveau($niveau);
                        for ($b = 1; $b <= 5; $b++) {
                            if ($b == 1) {
                                //1er redoublement en 1ère Année
                                $redoublement1 = new Redoublements1;
                                $redoublement1->setNiveau($niveau1ere);
                                $redoublement1->setScolarite1($scolarites1);
                                $redoublement1->setScolarite2($scolarites2);
                                for ($c = 1; $c <= 5; $c++) {
                                    if ($c == 1) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau2eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        $manager->persist($redoublement2);
                                    } elseif ($c == 2) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau3eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        $manager->persist($redoublement2);
                                    } elseif ($c == 3) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau4eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        $manager->persist($redoublement2);
                                    } elseif ($c == 4) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau5eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        $manager->persist($redoublement2);
                                    } elseif ($c == 5) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau6eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        $manager->persist($redoublement2);
                                    }
                                }
                                $manager->persist($redoublement1);
                            } elseif ($b == 2) {
                                //1er redoublement en 2ème Année
                                $redoublement1 = new Redoublements1;
                                $redoublement1->setNiveau($niveau2eme);
                                $redoublement1->setScolarite1($scolarites1);
                                $redoublement1->setScolarite2($scolarites2);
                                for ($c = 1; $c <= 4; $c++) {
                                    if ($c == 1) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau3eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        $manager->persist($redoublement2);
                                    } elseif ($c == 2) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau4eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        $manager->persist($redoublement2);
                                    } elseif ($c == 3) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau5eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        $manager->persist($redoublement2);
                                    } elseif ($c == 4) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau6eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        $manager->persist($redoublement2);
                                    }
                                }
                                $manager->persist($redoublement1);
                            } elseif ($b == 3) {
                                //1er redoublement en 3ème Année
                                $redoublement1 = new Redoublements1;
                                $redoublement1->setNiveau($niveau3eme);
                                $redoublement1->setScolarite1($scolarites1);
                                $redoublement1->setScolarite2($scolarites2);
                                for ($c = 1; $c <= 3; $c++) {
                                    if ($c == 1) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau4eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        $manager->persist($redoublement2);
                                    } elseif ($c == 2) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau5eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        $manager->persist($redoublement2);
                                    } elseif ($c == 3) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau6eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        $manager->persist($redoublement2);
                                    }
                                }
                                $manager->persist($redoublement1);
                            } elseif ($b == 4) {
                                //1er redoublement en 4ème Année
                                $redoublement1 = new Redoublements1;
                                $redoublement1->setNiveau($niveau4eme);
                                $redoublement1->setScolarite1($scolarites1);
                                $redoublement1->setScolarite2($scolarites2);
                                for ($c = 1; $c <= 2; $c++) {
                                    if ($c == 1) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau5eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        $manager->persist($redoublement2);
                                    } elseif ($c == 2) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau6eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        $manager->persist($redoublement2);
                                    }
                                }
                                $manager->persist($redoublement1);
                            } elseif ($b == 5) {
                                //1er redoublement en 4ème Année
                                $redoublement1 = new Redoublements1;
                                $redoublement1->setNiveau($niveau5eme);
                                $redoublement1->setScolarite1($scolarites1);
                                $redoublement1->setScolarite2($scolarites2);
                                for ($c = 1; $c <= 1; $c++) {
                                    if ($c == 1) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau6eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        $manager->persist($redoublement2);
                                    }
                                }
                                $manager->persist($redoublement1);
                            }
                        }
                        $manager->persist($scolarites2);
                        $this->setReference('scolarite8eme-' . 1, $scolarites2);
                    } elseif ($a == 2) {
                        //1er redoublement au 2nd cycle
                        $scolarites2 = new Scolarites2();
                        $scolarites2->setScolarite(3);
                        $scolarites2->setScolarite1($scolarites1);
                        $scolarites2->setNiveau($niveau);
                        for ($b = 1; $b <= 5; $b++) {
                            if ($b == 1) {
                                //1er redoublement en 1ère Année
                                $redoublement1 = new Redoublements1;
                                $redoublement1->setNiveau($niveau1ere);
                                $redoublement1->setScolarite1($scolarites1);
                                $redoublement1->setScolarite2($scolarites2);
                                for ($c = 1; $c <= 5; $c++) {
                                    if ($c == 1) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau2eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        for ($d = 1; $d <= 1; $d++) {
                                            if ($d == 1) {
                                                $redoublement3 = new Redoublements3;
                                                $redoublement3->setNiveau($niveau);
                                                $redoublement3->setScolarite1($scolarites1);
                                                $redoublement3->setScolarite2($scolarites2);
                                                $redoublement3->setRedoublement2($redoublement2);
                                                $manager->persist($redoublement3);
                                            }
                                        }
                                        $manager->persist($redoublement2);
                                    } elseif ($c == 2) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau3eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        for ($d = 1; $d <= 1; $d++) {
                                            if ($d == 1) {
                                                $redoublement3 = new Redoublements3;
                                                $redoublement3->setNiveau($niveau);
                                                $redoublement3->setScolarite1($scolarites1);
                                                $redoublement3->setScolarite2($scolarites2);
                                                $redoublement3->setRedoublement2($redoublement2);
                                                $manager->persist($redoublement3);
                                            }
                                        }
                                        $manager->persist($redoublement2);
                                    } elseif ($c == 3) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau4eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        for ($d = 1; $d <= 1; $d++) {
                                            if ($d == 1) {
                                                $redoublement3 = new Redoublements3;
                                                $redoublement3->setNiveau($niveau);
                                                $redoublement3->setScolarite1($scolarites1);
                                                $redoublement3->setScolarite2($scolarites2);
                                                $redoublement3->setRedoublement2($redoublement2);
                                                $manager->persist($redoublement3);
                                            }
                                        }
                                        $manager->persist($redoublement2);
                                    } elseif ($c == 4) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau5eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        for ($d = 1; $d <= 1; $d++) {
                                            if ($d == 1) {
                                                $redoublement3 = new Redoublements3;
                                                $redoublement3->setNiveau($niveau);
                                                $redoublement3->setScolarite1($scolarites1);
                                                $redoublement3->setScolarite2($scolarites2);
                                                $redoublement3->setRedoublement2($redoublement2);
                                                $manager->persist($redoublement3);
                                            }
                                        }
                                        $manager->persist($redoublement2);
                                    } elseif ($c == 5) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau6eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        for ($d = 1; $d <= 1; $d++) {
                                            if ($d == 1) {
                                                $redoublement3 = new Redoublements3;
                                                $redoublement3->setNiveau($niveau);
                                                $redoublement3->setScolarite1($scolarites1);
                                                $redoublement3->setScolarite2($scolarites2);
                                                $redoublement3->setRedoublement2($redoublement2);
                                                $manager->persist($redoublement3);
                                            }
                                        }
                                        $manager->persist($redoublement2);
                                    }
                                }
                                $manager->persist($redoublement1);
                            } elseif ($b == 2) {
                                //1er redoublement en 2ème Année
                                $redoublement1 = new Redoublements1;
                                $redoublement1->setNiveau($niveau2eme);
                                $redoublement1->setScolarite1($scolarites1);
                                $redoublement1->setScolarite2($scolarites2);
                                for ($c = 1; $c <= 4; $c++) {
                                    if ($c == 1) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau3eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        for ($d = 1; $d <= 1; $d++) {
                                            if ($d == 1) {
                                                $redoublement3 = new Redoublements3;
                                                $redoublement3->setNiveau($niveau);
                                                $redoublement3->setScolarite1($scolarites1);
                                                $redoublement3->setScolarite2($scolarites2);
                                                $redoublement3->setRedoublement2($redoublement2);
                                                $manager->persist($redoublement3);
                                            }
                                        }
                                        $manager->persist($redoublement2);
                                    } elseif ($c == 2) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau4eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        for ($d = 1; $d <= 1; $d++) {
                                            if ($d == 1) {
                                                $redoublement3 = new Redoublements3;
                                                $redoublement3->setNiveau($niveau);
                                                $redoublement3->setScolarite1($scolarites1);
                                                $redoublement3->setScolarite2($scolarites2);
                                                $redoublement3->setRedoublement2($redoublement2);
                                                $manager->persist($redoublement3);
                                            }
                                        }
                                        $manager->persist($redoublement2);
                                    } elseif ($c == 3) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau5eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        for ($d = 1; $d <= 1; $d++) {
                                            if ($d == 1) {
                                                $redoublement3 = new Redoublements3;
                                                $redoublement3->setNiveau($niveau);
                                                $redoublement3->setScolarite1($scolarites1);
                                                $redoublement3->setScolarite2($scolarites2);
                                                $redoublement3->setRedoublement2($redoublement2);
                                                $manager->persist($redoublement3);
                                            }
                                        }
                                        $manager->persist($redoublement2);
                                    } elseif ($c == 4) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau6eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        for ($d = 1; $d <= 1; $d++) {
                                            if ($d == 1) {
                                                $redoublement3 = new Redoublements3;
                                                $redoublement3->setNiveau($niveau);
                                                $redoublement3->setScolarite1($scolarites1);
                                                $redoublement3->setScolarite2($scolarites2);
                                                $redoublement3->setRedoublement2($redoublement2);
                                                $manager->persist($redoublement3);
                                            }
                                        }
                                        $manager->persist($redoublement2);
                                    }
                                }
                                $manager->persist($redoublement1);
                            } elseif ($b == 3) {
                                //1er redoublement en 3ème Année
                                $redoublement1 = new Redoublements1;
                                $redoublement1->setNiveau($niveau3eme);
                                $redoublement1->setScolarite1($scolarites1);
                                $redoublement1->setScolarite2($scolarites2);
                                for ($c = 1; $c <= 3; $c++) {
                                    if ($c == 1) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau4eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        for ($d = 1; $d <= 1; $d++) {
                                            if ($d == 1) {
                                                $redoublement3 = new Redoublements3;
                                                $redoublement3->setNiveau($niveau);
                                                $redoublement3->setScolarite1($scolarites1);
                                                $redoublement3->setScolarite2($scolarites2);
                                                $redoublement3->setRedoublement2($redoublement2);
                                                $manager->persist($redoublement3);
                                            }
                                        }
                                        $manager->persist($redoublement2);
                                    } elseif ($c == 2) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau5eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        for ($d = 1; $d <= 1; $d++) {
                                            if ($d == 1) {
                                                $redoublement3 = new Redoublements3;
                                                $redoublement3->setNiveau($niveau);
                                                $redoublement3->setScolarite1($scolarites1);
                                                $redoublement3->setScolarite2($scolarites2);
                                                $redoublement3->setRedoublement2($redoublement2);
                                                $manager->persist($redoublement3);
                                            }
                                        }
                                        $manager->persist($redoublement2);
                                    } elseif ($c == 3) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau6eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        for ($d = 1; $d <= 1; $d++) {
                                            if ($d == 1) {
                                                $redoublement3 = new Redoublements3;
                                                $redoublement3->setNiveau($niveau);
                                                $redoublement3->setScolarite1($scolarites1);
                                                $redoublement3->setScolarite2($scolarites2);
                                                $redoublement3->setRedoublement2($redoublement2);
                                                $manager->persist($redoublement3);
                                            }
                                        }
                                        $manager->persist($redoublement2);
                                    }
                                }
                                $manager->persist($redoublement1);
                            } elseif ($b == 4) {
                                //1er redoublement en 4ème Année
                                $redoublement1 = new Redoublements1;
                                $redoublement1->setNiveau($niveau4eme);
                                $redoublement1->setScolarite1($scolarites1);
                                $redoublement1->setScolarite2($scolarites2);
                                for ($c = 1; $c <= 2; $c++) {
                                    if ($c == 1) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau5eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        for ($d = 1; $d <= 1; $d++) {
                                            if ($d == 1) {
                                                $redoublement3 = new Redoublements3;
                                                $redoublement3->setNiveau($niveau);
                                                $redoublement3->setScolarite1($scolarites1);
                                                $redoublement3->setScolarite2($scolarites2);
                                                $redoublement3->setRedoublement2($redoublement2);
                                                $manager->persist($redoublement3);
                                            }
                                        }
                                        $manager->persist($redoublement2);
                                    } elseif ($c == 2) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau6eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        for ($d = 1; $d <= 1; $d++) {
                                            if ($d == 1) {
                                                $redoublement3 = new Redoublements3;
                                                $redoublement3->setNiveau($niveau);
                                                $redoublement3->setScolarite1($scolarites1);
                                                $redoublement3->setScolarite2($scolarites2);
                                                $redoublement3->setRedoublement2($redoublement2);
                                                $manager->persist($redoublement3);
                                            }
                                        }
                                        $manager->persist($redoublement2);
                                    }
                                }
                                $manager->persist($redoublement1);
                            } elseif ($b == 5) {
                                //1er redoublement en 4ème Année
                                $redoublement1 = new Redoublements1;
                                $redoublement1->setNiveau($niveau5eme);
                                $redoublement1->setScolarite1($scolarites1);
                                $redoublement1->setScolarite2($scolarites2);
                                for ($c = 1; $c <= 1; $c++) {
                                    if ($c == 1) {
                                        $redoublement2 = new Redoublements2;
                                        $redoublement2->setNiveau($niveau6eme);
                                        $redoublement2->setScolarite1($scolarites1);
                                        $redoublement2->setScolarite2($scolarites2);
                                        $redoublement2->setRedoublement1($redoublement1);
                                        for ($d = 1; $d <= 1; $d++) {
                                            if ($d == 1) {
                                                $redoublement3 = new Redoublements3;
                                                $redoublement3->setNiveau($niveau);
                                                $redoublement3->setScolarite1($scolarites1);
                                                $redoublement3->setScolarite2($scolarites2);
                                                $redoublement3->setRedoublement2($redoublement2);
                                                $manager->persist($redoublement3);
                                            }
                                        }
                                        $manager->persist($redoublement2);
                                    }
                                }
                                $manager->persist($redoublement1);
                            }
                        }
                        $manager->persist($scolarites2);
                        $this->setReference('scolarite8eme-' . 1, $scolarites2);
                    }
                }
                $manager->persist($scolarites1);
                $this->setReference('scolarite8eme-' . $scol2, $scolarites1);

                # code...
            }
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            Scolarites7emeFixtures::class,
        ];
    }
}

<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Scolarites1;
use App\Entity\Scolarites2;
use App\Entity\Redoublements1;
use App\Entity\Redoublements2;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class Scolarites1ereFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        $niveau = $this->getReference('niveau1er-' . $faker->numberBetween(1, 1));
        for ($s1er = 1; $s1er <= 3; $s1er++) {
            if ($s1er == 1) {
                $scolarite1 = new Scolarites1();
                $scolarite1->setScolarite(1);
                $scolarite1->setNiveau($niveau);
                for ($scol2nd = 1; $scol2nd <= 1; $scol2nd++) {
                    $scolarites2 = new Scolarites2();
                    $scolarites2->setNiveau($niveau);
                    $scolarites2->setScolarite(0);
                    $scolarites2->setScolarite1($scolarite1);
                    $manager->persist($scolarites2);
                }
                $manager->persist($scolarite1);
                $this->setReference('scolarite1ere-' . $s1er, $scolarite1);
            } elseif ($s1er == 2) {
                $scolarite1 = new Scolarites1();
                $scolarite1->setScolarite(2);
                $scolarite1->setNiveau($niveau);
                for ($scol2nd = 1; $scol2nd <= 1; $scol2nd++) {
                    $scolarites2 = new Scolarites2();
                    $scolarites2->setNiveau($niveau);
                    $scolarites2->setScolarite(0);
                    $scolarites2->setScolarite1($scolarite1);
                    for ($i = 1; $i <= 1; $i++) {
                        $redoublement1 = new Redoublements1;
                        $redoublement1->setNiveau($niveau);
                        $redoublement1->setScolarite1($scolarite1);
                        $redoublement1->setScolarite2($scolarites2);
                        $manager->persist($redoublement1);
                    }
                    $manager->persist($scolarites2);
                }
                $manager->persist($scolarite1);
                $this->setReference('scolarite1ere-' . $s1er, $scolarite1);
            } elseif ($s1er == 3) {
                $scolarite1 = new Scolarites1();
                $scolarite1->setScolarite(3);
                $scolarite1->setNiveau($niveau);
                for ($scol2nd = 1; $scol2nd <= 1; $scol2nd++) {
                    $scolarites2 = new Scolarites2();
                    $scolarites2->setNiveau($niveau);
                    $scolarites2->setScolarite(0);
                    $scolarites2->setScolarite1($scolarite1);
                    for ($i = 1; $i <= 1; $i++) {
                        $redoublement1 = new Redoublements1;
                        $redoublement1->setNiveau($niveau);
                        $redoublement1->setScolarite1($scolarite1);
                        $redoublement1->setScolarite2($scolarites2);
                        for ($a = 1; $a <= 1; $a++) {
                            $redoublement2 = new Redoublements2;
                            $redoublement2->setNiveau($niveau);
                            $redoublement2->setScolarite1($scolarite1);
                            $redoublement1->setScolarite2($scolarites2);
                            $redoublement2->setRedoublement1($redoublement1);
                            $manager->persist($redoublement2);
                        }
                        $manager->persist($redoublement1);
                    }
                    $manager->persist($scolarites2);
                }
                $manager->persist($scolarite1);
                $this->setReference('scolarite1ere-' . $s1er, $scolarite1);
            }
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            Classes12emeAnFixtures::class,
        ];
    }
}

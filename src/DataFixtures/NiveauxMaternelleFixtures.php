<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Niveaux;
use App\Entity\Statuts;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class NiveauxMaternelleFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($niv = 1; $niv <= 3; $niv++) {
            if ($niv == 1) {
                $cycle = $this->getReference('cycle-' . $faker->numberBetween(1, 1));
                $niveau = new Niveaux();
                $niveau->setDesignation('Petite Section');
                $niveau->setCycle($cycle);
                for ($i = 1; $i <= 5; $i++) {
                    if ($i == 1) {
                        $statut = new Statuts();
                        $statut->setDesignation('1ère Inscription');
                        $statut->setNiveau($niveau);
                        $manager->persist($statut);
                        $this->addReference('statutPS_' . $i, $statut);
                    } elseif ($i == 2) {
                        $statut = new Statuts();
                        $statut->setDesignation('Passant');
                        $statut->setNiveau($niveau);
                        $manager->persist($statut);
                        $this->addReference('statutPS_' . $i, $statut);
                    } elseif ($i == 3) {
                        $statut = new Statuts();
                        $statut->setDesignation('Sans dossier');
                        $statut->setNiveau($niveau);
                        $manager->persist($statut);
                        $this->addReference('statutPS_' . $i, $statut);
                    } elseif ($i == 4) {
                        $statut = new Statuts();
                        $statut->setDesignation('En attente');
                        $statut->setNiveau($niveau);
                        $manager->persist($statut);
                        $this->addReference('statutPS_' . $i, $statut);
                    } elseif ($i == 5) {
                        $statut = new Statuts();
                        $statut->setDesignation('Abandon');
                        $statut->setNiveau($niveau);
                        $manager->persist($statut);
                        $this->addReference('statutPS_' . $i, $statut);
                    }
                }
                $manager->persist($niveau);
                $this->setReference('niveauMat-' . $niv, $niveau);
            } elseif ($niv == 2) {
                $cycle = $this->getReference('cycle-' . $faker->numberBetween(1, 1));
                $niveau = new Niveaux();
                $niveau->setDesignation('Moyenne Section');
                $niveau->setCycle($cycle);
                for ($i = 1; $i <= 5; $i++) {
                    if ($i == 1) {
                        $statut = new Statuts();
                        $statut->setDesignation('1ère Inscription');
                        $statut->setNiveau($niveau);
                        $manager->persist($statut);
                        $this->addReference('statutMS_' . $i, $statut);
                    } elseif ($i == 2) {
                        $statut = new Statuts();
                        $statut->setDesignation('Passant');
                        $statut->setNiveau($niveau);
                        $manager->persist($statut);
                        $this->addReference('statutMS_' . $i, $statut);
                    } elseif ($i == 3) {
                        $statut = new Statuts();
                        $statut->setDesignation('Sans dossier');
                        $statut->setNiveau($niveau);
                        $manager->persist($statut);
                        $this->addReference('statutMS_' . $i, $statut);
                    } elseif ($i == 4) {
                        $statut = new Statuts();
                        $statut->setDesignation('En attente');
                        $statut->setNiveau($niveau);
                        $manager->persist($statut);
                        $this->addReference('statutMS_' . $i, $statut);
                    } elseif ($i == 5) {
                        $statut = new Statuts();
                        $statut->setDesignation('Abandon');
                        $statut->setNiveau($niveau);
                        $manager->persist($statut);
                        $this->addReference('statutMS_' . $i, $statut);
                    }
                }
                $manager->persist($niveau);
                $this->setReference('niveauMat-' . $niv, $niveau);
            } elseif ($niv == 3) {
                $cycle = $this->getReference('cycle-' . $faker->numberBetween(1, 1));
                $niveau = new Niveaux();
                $niveau->setDesignation('Grande Section');
                $niveau->setCycle($cycle);
                for ($i = 1; $i <= 5; $i++) {
                    if ($i == 1) {
                        $statut = new Statuts();
                        $statut->setDesignation('1ère Inscription');
                        $statut->setNiveau($niveau);
                        $manager->persist($statut);
                        $this->addReference('statutGS_' . $i, $statut);
                    } elseif ($i == 2) {
                        $statut = new Statuts();
                        $statut->setDesignation('Passant');
                        $statut->setNiveau($niveau);
                        $manager->persist($statut);
                        $this->addReference('statutGS_' . $i, $statut);
                    } elseif ($i == 3) {
                        $statut = new Statuts();
                        $statut->setDesignation('Sans dossier');
                        $statut->setNiveau($niveau);
                        $manager->persist($statut);
                        $this->addReference('statutGS_' . $i, $statut);
                    } elseif ($i == 4) {
                        $statut = new Statuts();
                        $statut->setDesignation('En attente');
                        $statut->setNiveau($niveau);
                        $manager->persist($statut);
                        $this->addReference('statutGS_' . $i, $statut);
                    } elseif ($i == 5) {
                        $statut = new Statuts();
                        $statut->setDesignation('Abandon');
                        $statut->setNiveau($niveau);
                        $manager->persist($statut);
                        $this->addReference('statutGS_' . $i, $statut);
                    }
                }

                $this->setReference('niveauMat-' . $niv, $niveau);
                $manager->persist($niveau);
            }
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            CyclesFixtures::class,
        ];
    }
}
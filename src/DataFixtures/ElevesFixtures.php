<?php

namespace App\DataFixtures;

use Faker;
use Faker\Factory;
use App\Entity\Eleves;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\DataFixtures\EcoleProvenancesFixtures;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ElevesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 1; $i <= 750; $i++) {
            $ecole = $this->getReference('ecole_' . $faker->numberBetween(1, 100));
            if ($i <= 20) {
                $departement = $this->getReference('departement_' . $faker->numberBetween(1, 1));

                $classe = $this->getReference('classePS-' . $faker->numberBetween(1, 1));
                $lieu = $this->getReference('lieu_' . $faker->numberBetween(1, 100));
                $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
                $prenom  = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
                //$user  = $this->getReference('user_' . $faker->numberBetween(1, 8));
                $statut = $this->getReference('statutPS_' . $faker->numberBetween(1, 3));

                $pere = $this->getReference('pere_' . $faker->numberBetween(1, 80));
                $mere = $this->getReference('mere_' . $faker->numberBetween(1, 110));

                $ecoleProvenance = $this->getReference('ecole_' . $faker->numberBetween(1, 20));
                $eleve = new Eleves();
                $eleve->setDateNaissance($faker->dateTimeBetween('-17 years', '-7 years'));
                $eleve->setLieuNaissance($lieu);
                $eleve->setDepartement($departement);
                $eleve->setNom($nom);
                $eleve->setPrenom($prenom);
                $eleve->setSexe($faker->randomElement(['Masculin', 'Féminin']));
                $eleve->setNumExtrait($faker->randomNumber(9, true));
                $eleve->setDateExtrait(($faker->dateTimeBetween('-16 years', '-6 years')));
                $eleve->setClasse($classe);
                $eleve->setDateInscription($faker->dateTimeBetween('-12 years', '-5 months'));
                $eleve->setDateRecrutement($faker->dateTimeBetween('-12 years', '-5 years'));
                //$eleve->setUser($user);
                $eleve->setStatut($statut);
                $eleve->setEcoleAnDernier($ecoleProvenance);
                $eleve->setEcoleRecrutement($ecoleProvenance);
                //$eleve->setNina($nina);
                $eleve->setEcoleRecrutement($ecole);
                $eleve->setmere($mere);
                $eleve->setAdresse($faker->address());
                $manager->persist($eleve);
                $this->addReference('eleve_' . $i, $eleve);
            } elseif ($i > 20 && $i <= 40) {
                $departement = $this->getReference('departement_' . $faker->numberBetween(1, 1));

                $classe = $this->getReference('classePS-' . $faker->numberBetween(2, 2));
                $lieu = $this->getReference('lieu_' . $faker->numberBetween(1, 100));
                $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
                $prenom  = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
                //$user  = $this->getReference('user_' . $faker->numberBetween(1, 8));
                $statut = $this->getReference('statutPS_' . $faker->numberBetween(1, 3));

                $pere = $this->getReference('pere_' . $faker->numberBetween(1, 80));
                $mere = $this->getReference('mere_' . $faker->numberBetween(1, 110));

                $ecoleProvenance = $this->getReference('ecole_' . $faker->numberBetween(1, 20));
                $eleve = new Eleves();
                $eleve->setDateNaissance($faker->dateTimeBetween('-17 years', '-7 years'));
                $eleve->setLieuNaissance($lieu);
                $eleve->setDepartement($departement);
                $eleve->setNom($nom);
                $eleve->setPrenom($prenom);
                $eleve->setSexe($faker->randomElement(['Masculin', 'Féminin']));
                $eleve->setNumExtrait($faker->randomNumber(9, true));
                $eleve->setDateExtrait(($faker->dateTimeBetween('-16 years', '-6 years')));
                $eleve->setClasse($classe);
                $eleve->setDateInscription($faker->dateTimeBetween('-12 years', '-5 months'));
                $eleve->setDateRecrutement($faker->dateTimeBetween('-12 years', '-5 years'));
                //$eleve->setUser($user);
                $eleve->setStatut($statut);
                $eleve->setEcoleAnDernier($ecoleProvenance);
                $eleve->setEcoleRecrutement($ecoleProvenance);
                //$eleve->setNina($nina);
                $eleve->setEcoleRecrutement($ecole);
                $eleve->setmere($mere);
                $eleve->setAdresse($faker->address());

                $manager->persist($eleve);
                $this->addReference('eleve_' . $i, $eleve);
            } elseif ($i > 40 && $i <= 60) {
                $departement = $this->getReference('departement_' . $faker->numberBetween(1, 1));

                $classe = $this->getReference('classeMS-' . $faker->numberBetween(1, 1));
                $lieu = $this->getReference('lieu_' . $faker->numberBetween(1, 100));
                $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
                $prenom  = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
                //$user  = $this->getReference('user_' . $faker->numberBetween(1, 8));
                $statut = $this->getReference('statutMS_' . $faker->numberBetween(1, 3));

                $pere = $this->getReference('pere_' . $faker->numberBetween(1, 80));
                $mere = $this->getReference('mere_' . $faker->numberBetween(1, 110));

                $ecoleProvenance = $this->getReference('ecole_' . $faker->numberBetween(1, 20));
                $eleve = new Eleves();
                $eleve->setDateNaissance($faker->dateTimeBetween('-17 years', '-7 years'));
                $eleve->setLieuNaissance($lieu);
                $eleve->setDepartement($departement);
                $eleve->setNom($nom);
                $eleve->setPrenom($prenom);
                $eleve->setSexe($faker->randomElement(['Masculin', 'Féminin']));
                $eleve->setNumExtrait($faker->randomNumber(9, true));
                $eleve->setDateExtrait(($faker->dateTimeBetween('-16 years', '-6 years')));
                $eleve->setClasse($classe);
                $eleve->setDateInscription($faker->dateTimeBetween('-12 years', '-5 months'));
                $eleve->setDateRecrutement($faker->dateTimeBetween('-12 years', '-5 years'));
                //$eleve->setUser($user);
                $eleve->setStatut($statut);
                $eleve->setEcoleAnDernier($ecoleProvenance);
                $eleve->setEcoleRecrutement($ecoleProvenance);
                //$eleve->setNina($nina);
                $eleve->setEcoleRecrutement($ecole);
                $eleve->setmere($mere);
                $eleve->setAdresse($faker->address());

                $manager->persist($eleve);
                $this->addReference('eleve_' . $i, $eleve);
            } elseif ($i > 60 && $i <= 80) {
                $departement = $this->getReference('departement_' . $faker->numberBetween(1, 1));

                $classe = $this->getReference('classeMS-' . $faker->numberBetween(2, 2));
                $lieu = $this->getReference('lieu_' . $faker->numberBetween(1, 100));
                $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
                $prenom  = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
                //$user  = $this->getReference('user_' . $faker->numberBetween(1, 8));
                $statut = $this->getReference('statutMS_' . $faker->numberBetween(1, 3));

                $pere = $this->getReference('pere_' . $faker->numberBetween(1, 80));
                $mere = $this->getReference('mere_' . $faker->numberBetween(1, 110));

                $ecoleProvenance = $this->getReference('ecole_' . $faker->numberBetween(1, 20));
                $eleve = new Eleves();
                $eleve->setDateNaissance($faker->dateTimeBetween('-17 years', '-7 years'));
                $eleve->setLieuNaissance($lieu);
                $eleve->setDepartement($departement);
                $eleve->setNom($nom);
                $eleve->setPrenom($prenom);
                $eleve->setSexe($faker->randomElement(['Masculin', 'Féminin']));
                $eleve->setNumExtrait($faker->randomNumber(9, true));
                $eleve->setDateExtrait(($faker->dateTimeBetween('-16 years', '-6 years')));
                $eleve->setClasse($classe);
                $eleve->setDateInscription($faker->dateTimeBetween('-12 years', '-5 months'));
                $eleve->setDateRecrutement($faker->dateTimeBetween('-12 years', '-5 years'));
                //$eleve->setUser($user);
                $eleve->setStatut($statut);
                $eleve->setEcoleAnDernier($ecoleProvenance);
                $eleve->setEcoleRecrutement($ecoleProvenance);
                //$eleve->setNina($nina);
                $eleve->setEcoleRecrutement($ecole);
                $eleve->setmere($mere);
                $eleve->setAdresse($faker->address());

                $manager->persist($eleve);
                $this->addReference('eleve_' . $i, $eleve);
            } elseif ($i > 80 && $i <= 100) {
                $departement = $this->getReference('departement_' . $faker->numberBetween(1, 1));

                $classe = $this->getReference('classe1ere-' . $faker->numberBetween(1, 1));
                $lieu = $this->getReference('lieu_' . $faker->numberBetween(1, 100));
                $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
                $prenom  = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
                //$user  = $this->getReference('user_' . $faker->numberBetween(1, 8));
                $statut = $this->getReference('statut1ere_' . $faker->numberBetween(1, 3));

                $pere = $this->getReference('pere_' . $faker->numberBetween(1, 80));
                $mere = $this->getReference('mere_' . $faker->numberBetween(1, 110));

                $ecoleProvenance = $this->getReference('ecole_' . $faker->numberBetween(1, 20));
                $eleve = new Eleves();
                $eleve->setDateNaissance($faker->dateTimeBetween('-17 years', '-7 years'));
                $eleve->setLieuNaissance($lieu);
                $eleve->setDepartement($departement);
                $eleve->setNom($nom);
                $eleve->setPrenom($prenom);
                $eleve->setSexe($faker->randomElement(['Masculin', 'Féminin']));
                $eleve->setNumExtrait($faker->randomNumber(9, true));
                $eleve->setDateExtrait(($faker->dateTimeBetween('-16 years', '-6 years')));
                $eleve->setClasse($classe);
                $eleve->setDateInscription($faker->dateTimeBetween('-12 years', '-5 months'));
                $eleve->setDateRecrutement($faker->dateTimeBetween('-12 years', '-5 years'));
                //$eleve->setUser($user);
                $eleve->setStatut($statut);
                $eleve->setEcoleAnDernier($ecoleProvenance);
                $eleve->setEcoleRecrutement($ecoleProvenance);
                //$eleve->setNina($nina);
                $eleve->setEcoleRecrutement($ecole);
                $eleve->setmere($mere);
                $eleve->setAdresse($faker->address());

                $manager->persist($eleve);
                $this->addReference('eleve_' . $i, $eleve);
            } elseif ($i > 100 && $i <= 120) {
                $departement = $this->getReference('departement_' . $faker->numberBetween(1, 1));

                $classe = $this->getReference('classe1ere-' . $faker->numberBetween(2, 2));
                $lieu = $this->getReference('lieu_' . $faker->numberBetween(1, 100));
                $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
                $prenom  = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
                //$user  = $this->getReference('user_' . $faker->numberBetween(1, 8));
                $statut = $this->getReference('statut1ere_' . $faker->numberBetween(1, 3));

                $pere = $this->getReference('pere_' . $faker->numberBetween(1, 80));
                $mere = $this->getReference('mere_' . $faker->numberBetween(1, 110));

                $ecoleProvenance = $this->getReference('ecole_' . $faker->numberBetween(1, 20));
                $eleve = new Eleves();
                $eleve->setDateNaissance($faker->dateTimeBetween('-17 years', '-7 years'));
                $eleve->setLieuNaissance($lieu);
                $eleve->setDepartement($departement);
                $eleve->setNom($nom);
                $eleve->setPrenom($prenom);
                $eleve->setSexe($faker->randomElement(['Masculin', 'Féminin']));
                $eleve->setNumExtrait($faker->randomNumber(9, true));
                $eleve->setDateExtrait(($faker->dateTimeBetween('-16 years', '-6 years')));
                $eleve->setClasse($classe);
                $eleve->setDateInscription($faker->dateTimeBetween('-12 years', '-5 months'));
                $eleve->setDateRecrutement($faker->dateTimeBetween('-12 years', '-5 years'));
                //$eleve->setUser($user);
                $eleve->setStatut($statut);
                $eleve->setEcoleAnDernier($ecoleProvenance);
                $eleve->setEcoleRecrutement($ecoleProvenance);
                //$eleve->setNina($nina);
                $eleve->setEcoleRecrutement($ecole);
                $eleve->setmere($mere);
                $eleve->setAdresse($faker->address());

                $manager->persist($eleve);
                $this->addReference('eleve_' . $i, $eleve);
            } elseif ($i > 120 && $i <= 140) {
                $departement = $this->getReference('departement_' . $faker->numberBetween(1, 1));

                $classe = $this->getReference('classe2eme-' . $faker->numberBetween(1, 1));
                $lieu = $this->getReference('lieu_' . $faker->numberBetween(1, 100));
                $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
                $prenom  = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
                //$user  = $this->getReference('user_' . $faker->numberBetween(1, 8));
                $statut = $this->getReference('statut2eme_' . $faker->numberBetween(1, 3));

                $pere = $this->getReference('pere_' . $faker->numberBetween(1, 80));
                $mere = $this->getReference('mere_' . $faker->numberBetween(1, 110));

                $ecoleProvenance = $this->getReference('ecole_' . $faker->numberBetween(1, 20));
                $eleve = new Eleves();
                $eleve->setDateNaissance($faker->dateTimeBetween('-17 years', '-7 years'));
                $eleve->setLieuNaissance($lieu);
                $eleve->setDepartement($departement);
                $eleve->setNom($nom);
                $eleve->setPrenom($prenom);
                $eleve->setSexe($faker->randomElement(['Masculin', 'Féminin']));
                $eleve->setNumExtrait($faker->randomNumber(9, true));
                $eleve->setDateExtrait(($faker->dateTimeBetween('-16 years', '-6 years')));
                $eleve->setClasse($classe);
                $eleve->setDateInscription($faker->dateTimeBetween('-12 years', '-5 months'));
                $eleve->setDateRecrutement($faker->dateTimeBetween('-12 years', '-5 years'));
                //$eleve->setUser($user);
                $eleve->setStatut($statut);
                $eleve->setEcoleAnDernier($ecoleProvenance);
                $eleve->setEcoleRecrutement($ecoleProvenance);
                //$eleve->setNina($nina);
                $eleve->setEcoleRecrutement($ecole);
                $eleve->setmere($mere);
                $eleve->setAdresse($faker->address());

                $manager->persist($eleve);
                $this->addReference('eleve_' . $i, $eleve);
            } elseif ($i > 140 && $i <= 160) {
                $departement = $this->getReference('departement_' . $faker->numberBetween(1, 1));

                $classe = $this->getReference('classe2eme-' . $faker->numberBetween(2, 2));
                $lieu = $this->getReference('lieu_' . $faker->numberBetween(1, 100));
                $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
                $prenom  = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
                //$user  = $this->getReference('user_' . $faker->numberBetween(1, 8));
                $statut = $this->getReference('statut2eme_' . $faker->numberBetween(1, 3));

                $pere = $this->getReference('pere_' . $faker->numberBetween(1, 80));
                $mere = $this->getReference('mere_' . $faker->numberBetween(1, 110));

                $ecoleProvenance = $this->getReference('ecole_' . $faker->numberBetween(1, 20));
                $eleve = new Eleves();
                $eleve->setDateNaissance($faker->dateTimeBetween('-17 years', '-7 years'));
                $eleve->setLieuNaissance($lieu);
                $eleve->setDepartement($departement);
                $eleve->setNom($nom);
                $eleve->setPrenom($prenom);
                $eleve->setSexe($faker->randomElement(['Masculin', 'Féminin']));
                $eleve->setNumExtrait($faker->randomNumber(9, true));
                $eleve->setDateExtrait(($faker->dateTimeBetween('-16 years', '-6 years')));
                $eleve->setClasse($classe);
                $eleve->setDateInscription($faker->dateTimeBetween('-12 years', '-5 months'));
                $eleve->setDateRecrutement($faker->dateTimeBetween('-12 years', '-5 years'));
                //$eleve->setUser($user);
                $eleve->setStatut($statut);
                $eleve->setEcoleAnDernier($ecoleProvenance);
                $eleve->setEcoleRecrutement($ecoleProvenance);
                //$eleve->setNina($nina);
                $eleve->setEcoleRecrutement($ecole);
                $eleve->setmere($mere);
                $eleve->setAdresse($faker->address());

                $manager->persist($eleve);
                $this->addReference('eleve_' . $i, $eleve);
            } elseif ($i > 160 && $i <= 180) {
                $departement = $this->getReference('departement_' . $faker->numberBetween(1, 1));

                $classe = $this->getReference('classe3eme-' . $faker->numberBetween(1, 1));
                $lieu = $this->getReference('lieu_' . $faker->numberBetween(1, 100));
                $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
                $prenom  = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
                //$user  = $this->getReference('user_' . $faker->numberBetween(1, 8));
                $statut = $this->getReference('statut3eme_' . $faker->numberBetween(1, 3));

                $pere = $this->getReference('pere_' . $faker->numberBetween(1, 80));
                $mere = $this->getReference('mere_' . $faker->numberBetween(1, 110));

                $ecoleProvenance = $this->getReference('ecole_' . $faker->numberBetween(1, 20));
                $eleve = new Eleves();
                $eleve->setDateNaissance($faker->dateTimeBetween('-17 years', '-7 years'));
                $eleve->setLieuNaissance($lieu);
                $eleve->setDepartement($departement);
                $eleve->setNom($nom);
                $eleve->setPrenom($prenom);
                $eleve->setSexe($faker->randomElement(['Masculin', 'Féminin']));
                $eleve->setNumExtrait($faker->randomNumber(9, true));
                $eleve->setDateExtrait(($faker->dateTimeBetween('-16 years', '-6 years')));
                $eleve->setClasse($classe);
                $eleve->setDateInscription($faker->dateTimeBetween('-12 years', '-5 months'));
                $eleve->setDateRecrutement($faker->dateTimeBetween('-12 years', '-5 years'));
                //$eleve->setUser($user);
                $eleve->setStatut($statut);
                $eleve->setEcoleAnDernier($ecoleProvenance);
                $eleve->setEcoleRecrutement($ecoleProvenance);
                //$eleve->setNina($nina);
                $eleve->setEcoleRecrutement($ecole);
                $eleve->setmere($mere);
                $eleve->setAdresse($faker->address());

                $manager->persist($eleve);
                $this->addReference('eleve_' . $i, $eleve);
            } elseif ($i > 180 && $i <= 200) {
                $departement = $this->getReference('departement_' . $faker->numberBetween(1, 1));

                $classe = $this->getReference('classe3eme-' . $faker->numberBetween(2, 2));
                $lieu = $this->getReference('lieu_' . $faker->numberBetween(1, 100));
                $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
                $prenom  = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
                //$user  = $this->getReference('user_' . $faker->numberBetween(1, 8));
                $statut = $this->getReference('statut3eme_' . $faker->numberBetween(1, 3));

                $pere = $this->getReference('pere_' . $faker->numberBetween(1, 80));
                $mere = $this->getReference('mere_' . $faker->numberBetween(1, 110));

                $ecoleProvenance = $this->getReference('ecole_' . $faker->numberBetween(1, 20));
                $eleve = new Eleves();
                $eleve->setDateNaissance($faker->dateTimeBetween('-17 years', '-7 years'));
                $eleve->setLieuNaissance($lieu);
                $eleve->setDepartement($departement);
                $eleve->setNom($nom);
                $eleve->setPrenom($prenom);
                $eleve->setSexe($faker->randomElement(['Masculin', 'Féminin']));
                $eleve->setNumExtrait($faker->randomNumber(9, true));
                $eleve->setDateExtrait(($faker->dateTimeBetween('-16 years', '-6 years')));
                $eleve->setClasse($classe);
                $eleve->setDateInscription($faker->dateTimeBetween('-12 years', '-5 months'));
                $eleve->setDateRecrutement($faker->dateTimeBetween('-12 years', '-5 years'));
                //$eleve->setUser($user);
                $eleve->setStatut($statut);
                $eleve->setEcoleAnDernier($ecoleProvenance);
                $eleve->setEcoleRecrutement($ecoleProvenance);
                //$eleve->setNina($nina);
                $eleve->setEcoleRecrutement($ecole);
                $eleve->setmere($mere);
                $eleve->setAdresse($faker->address());

                $manager->persist($eleve);
                $this->addReference('eleve_' . $i, $eleve);
            } elseif ($i > 200 && $i <= 220) {
                $departement = $this->getReference('departement_' . $faker->numberBetween(1, 1));

                $classe = $this->getReference('classe4eme-' . $faker->numberBetween(1, 1));
                $lieu = $this->getReference('lieu_' . $faker->numberBetween(1, 100));
                $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
                $prenom  = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
                //$user  = $this->getReference('user_' . $faker->numberBetween(1, 8));
                $statut = $this->getReference('statut4eme_' . $faker->numberBetween(1, 3));

                $pere = $this->getReference('pere_' . $faker->numberBetween(1, 80));
                $mere = $this->getReference('mere_' . $faker->numberBetween(1, 110));

                $ecoleProvenance = $this->getReference('ecole_' . $faker->numberBetween(1, 20));
                $eleve = new Eleves();
                $eleve->setDateNaissance($faker->dateTimeBetween('-17 years', '-7 years'));
                $eleve->setLieuNaissance($lieu);
                $eleve->setDepartement($departement);
                $eleve->setNom($nom);
                $eleve->setPrenom($prenom);
                $eleve->setSexe($faker->randomElement(['Masculin', 'Féminin']));
                $eleve->setNumExtrait($faker->randomNumber(9, true));
                $eleve->setDateExtrait(($faker->dateTimeBetween('-16 years', '-6 years')));
                $eleve->setClasse($classe);
                $eleve->setDateInscription($faker->dateTimeBetween('-12 years', '-5 months'));
                $eleve->setDateRecrutement($faker->dateTimeBetween('-12 years', '-5 years'));
                //$eleve->setUser($user);
                $eleve->setStatut($statut);
                $eleve->setEcoleAnDernier($ecoleProvenance);
                $eleve->setEcoleRecrutement($ecoleProvenance);
                //$eleve->setNina($nina);
                $eleve->setEcoleRecrutement($ecole);
                $eleve->setmere($mere);
                $eleve->setAdresse($faker->address());

                $manager->persist($eleve);
                $this->addReference('eleve_' . $i, $eleve);
            } elseif ($i > 220 && $i <= 240) {
                $departement = $this->getReference('departement_' . $faker->numberBetween(1, 1));

                $classe = $this->getReference('classe4eme-' . $faker->numberBetween(2, 2));
                $lieu = $this->getReference('lieu_' . $faker->numberBetween(1, 100));
                $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
                $prenom  = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
                //$user  = $this->getReference('user_' . $faker->numberBetween(1, 8));
                $statut = $this->getReference('statut4eme_' . $faker->numberBetween(1, 3));

                $pere = $this->getReference('pere_' . $faker->numberBetween(1, 80));
                $mere = $this->getReference('mere_' . $faker->numberBetween(1, 110));

                $ecoleProvenance = $this->getReference('ecole_' . $faker->numberBetween(1, 20));
                $eleve = new Eleves();
                $eleve->setDateNaissance($faker->dateTimeBetween('-17 years', '-7 years'));
                $eleve->setLieuNaissance($lieu);
                $eleve->setDepartement($departement);
                $eleve->setNom($nom);
                $eleve->setPrenom($prenom);
                $eleve->setSexe($faker->randomElement(['Masculin', 'Féminin']));
                $eleve->setNumExtrait($faker->randomNumber(9, true));
                $eleve->setDateExtrait(($faker->dateTimeBetween('-16 years', '-6 years')));
                $eleve->setClasse($classe);
                $eleve->setDateInscription($faker->dateTimeBetween('-12 years', '-5 months'));
                $eleve->setDateRecrutement($faker->dateTimeBetween('-12 years', '-5 years'));
                //$eleve->setUser($user);
                $eleve->setStatut($statut);
                $eleve->setEcoleAnDernier($ecoleProvenance);
                $eleve->setEcoleRecrutement($ecoleProvenance);
                //$eleve->setNina($nina);
                $eleve->setEcoleRecrutement($ecole);
                $eleve->setmere($mere);
                $eleve->setAdresse($faker->address());

                $manager->persist($eleve);
                $this->addReference('eleve_' . $i, $eleve);
            } elseif ($i > 240 && $i <= 260) {
                $departement = $this->getReference('departement_' . $faker->numberBetween(1, 1));

                $classe = $this->getReference('classe5eme-' . $faker->numberBetween(1, 1));
                $lieu = $this->getReference('lieu_' . $faker->numberBetween(1, 100));
                $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
                $prenom  = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
                //$user  = $this->getReference('user_' . $faker->numberBetween(1, 8));
                $statut = $this->getReference('statut5eme_' . $faker->numberBetween(1, 3));

                $pere = $this->getReference('pere_' . $faker->numberBetween(1, 80));
                $mere = $this->getReference('mere_' . $faker->numberBetween(1, 110));

                $ecoleProvenance = $this->getReference('ecole_' . $faker->numberBetween(1, 20));
                $eleve = new Eleves();
                $eleve->setDateNaissance($faker->dateTimeBetween('-17 years', '-7 years'));
                $eleve->setLieuNaissance($lieu);
                $eleve->setDepartement($departement);
                $eleve->setNom($nom);
                $eleve->setPrenom($prenom);
                $eleve->setSexe($faker->randomElement(['Masculin', 'Féminin']));
                $eleve->setNumExtrait($faker->randomNumber(9, true));
                $eleve->setDateExtrait(($faker->dateTimeBetween('-16 years', '-6 years')));
                $eleve->setClasse($classe);
                $eleve->setDateInscription($faker->dateTimeBetween('-12 years', '-5 months'));
                $eleve->setDateRecrutement($faker->dateTimeBetween('-12 years', '-5 years'));
                //$eleve->setUser($user);
                $eleve->setStatut($statut);
                $eleve->setEcoleAnDernier($ecoleProvenance);
                $eleve->setEcoleRecrutement($ecoleProvenance);
                //$eleve->setNina($nina);
                $eleve->setEcoleRecrutement($ecole);
                $eleve->setmere($mere);
                $eleve->setAdresse($faker->address());

                $manager->persist($eleve);
                $this->addReference('eleve_' . $i, $eleve);
            } elseif ($i > 260 && $i <= 280) {
                $departement = $this->getReference('departement_' . $faker->numberBetween(1, 1));

                $classe = $this->getReference('classe5eme-' . $faker->numberBetween(2, 2));
                $lieu = $this->getReference('lieu_' . $faker->numberBetween(1, 100));
                $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
                $prenom  = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
                //$user  = $this->getReference('user_' . $faker->numberBetween(1, 8));
                $statut = $this->getReference('statut5eme_' . $faker->numberBetween(1, 3));

                $pere = $this->getReference('pere_' . $faker->numberBetween(1, 80));
                $mere = $this->getReference('mere_' . $faker->numberBetween(1, 110));

                $ecoleProvenance = $this->getReference('ecole_' . $faker->numberBetween(1, 20));
                $eleve = new Eleves();
                $eleve->setDateNaissance($faker->dateTimeBetween('-17 years', '-7 years'));
                $eleve->setLieuNaissance($lieu);
                $eleve->setDepartement($departement);
                $eleve->setNom($nom);
                $eleve->setPrenom($prenom);
                $eleve->setSexe($faker->randomElement(['Masculin', 'Féminin']));
                $eleve->setNumExtrait($faker->randomNumber(9, true));
                $eleve->setDateExtrait(($faker->dateTimeBetween('-16 years', '-6 years')));
                $eleve->setClasse($classe);
                $eleve->setDateInscription($faker->dateTimeBetween('-12 years', '-5 months'));
                $eleve->setDateRecrutement($faker->dateTimeBetween('-12 years', '-5 years'));
                //$eleve->setUser($user);
                $eleve->setStatut($statut);
                $eleve->setEcoleAnDernier($ecoleProvenance);
                $eleve->setEcoleRecrutement($ecoleProvenance);
                //$eleve->setNina($nina);
                $eleve->setEcoleRecrutement($ecole);
                $eleve->setmere($mere);
                $eleve->setAdresse($faker->address());

                $manager->persist($eleve);
                $this->addReference('eleve_' . $i, $eleve);
            } elseif ($i > 280 && $i <= 300) {
                $departement = $this->getReference('departement_' . $faker->numberBetween(1, 1));

                $classe = $this->getReference('classe6eme-' . $faker->numberBetween(1, 1));
                $lieu = $this->getReference('lieu_' . $faker->numberBetween(1, 100));
                $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
                $prenom  = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
                //$user  = $this->getReference('user_' . $faker->numberBetween(1, 8));
                $statut = $this->getReference('statut6eme_' . $faker->numberBetween(1, 3));

                $pere = $this->getReference('pere_' . $faker->numberBetween(1, 80));
                $mere = $this->getReference('mere_' . $faker->numberBetween(1, 110));

                $ecoleProvenance = $this->getReference('ecole_' . $faker->numberBetween(1, 20));
                $eleve = new Eleves();
                $eleve->setDateNaissance($faker->dateTimeBetween('-17 years', '-7 years'));
                $eleve->setLieuNaissance($lieu);
                $eleve->setDepartement($departement);
                $eleve->setNom($nom);
                $eleve->setPrenom($prenom);
                $eleve->setSexe($faker->randomElement(['Masculin', 'Féminin']));
                $eleve->setNumExtrait($faker->randomNumber(9, true));
                $eleve->setDateExtrait(($faker->dateTimeBetween('-16 years', '-6 years')));
                $eleve->setClasse($classe);
                $eleve->setDateInscription($faker->dateTimeBetween('-12 years', '-5 months'));
                $eleve->setDateRecrutement($faker->dateTimeBetween('-12 years', '-5 years'));
                //$eleve->setUser($user);
                $eleve->setStatut($statut);
                $eleve->setEcoleAnDernier($ecoleProvenance);
                $eleve->setEcoleRecrutement($ecoleProvenance);
                //$eleve->setNina($nina);
                $eleve->setEcoleRecrutement($ecole);
                $eleve->setmere($mere);
                $eleve->setAdresse($faker->address());

                $manager->persist($eleve);
                $this->addReference('eleve_' . $i, $eleve);
            } elseif ($i > 300 && $i <= 320) {
                $departement = $this->getReference('departement_' . $faker->numberBetween(1, 1));

                $classe = $this->getReference('classe6eme-' . $faker->numberBetween(2, 2));
                $lieu = $this->getReference('lieu_' . $faker->numberBetween(1, 100));
                $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
                $prenom  = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
                //$user  = $this->getReference('user_' . $faker->numberBetween(1, 8));
                $statut = $this->getReference('statut6eme_' . $faker->numberBetween(1, 3));

                $pere = $this->getReference('pere_' . $faker->numberBetween(1, 80));
                $mere = $this->getReference('mere_' . $faker->numberBetween(1, 110));

                $ecoleProvenance = $this->getReference('ecole_' . $faker->numberBetween(1, 20));
                $eleve = new Eleves();
                $eleve->setDateNaissance($faker->dateTimeBetween('-17 years', '-7 years'));
                $eleve->setLieuNaissance($lieu);
                $eleve->setDepartement($departement);
                $eleve->setNom($nom);
                $eleve->setPrenom($prenom);
                $eleve->setSexe($faker->randomElement(['Masculin', 'Féminin']));
                $eleve->setNumExtrait($faker->randomNumber(9, true));
                $eleve->setDateExtrait(($faker->dateTimeBetween('-16 years', '-6 years')));
                $eleve->setClasse($classe);
                $eleve->setDateInscription($faker->dateTimeBetween('-12 years', '-5 months'));
                $eleve->setDateRecrutement($faker->dateTimeBetween('-12 years', '-5 years'));
                //$eleve->setUser($user);
                $eleve->setStatut($statut);
                $eleve->setEcoleAnDernier($ecoleProvenance);
                $eleve->setEcoleRecrutement($ecoleProvenance);
                //$eleve->setNina($nina);
                $eleve->setEcoleRecrutement($ecole);
                $eleve->setmere($mere);
                $eleve->setAdresse($faker->address());

                $manager->persist($eleve);
                $this->addReference('eleve_' . $i, $eleve);
            } elseif ($i > 320 && $i <= 340) {
                $departement = $this->getReference('departement_' . $faker->numberBetween(1, 1));

                $classe = $this->getReference('classe7eme-' . $faker->numberBetween(1, 1));
                $lieu = $this->getReference('lieu_' . $faker->numberBetween(1, 100));
                $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
                $prenom  = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
                //$user  = $this->getReference('user_' . $faker->numberBetween(1, 8));
                $statut = $this->getReference('statut7eme_' . $faker->numberBetween(1, 3));

                $pere = $this->getReference('pere_' . $faker->numberBetween(1, 80));
                $mere = $this->getReference('mere_' . $faker->numberBetween(1, 110));

                $ecoleProvenance = $this->getReference('ecole_' . $faker->numberBetween(1, 20));
                $eleve = new Eleves();
                $eleve->setDateNaissance($faker->dateTimeBetween('-17 years', '-7 years'));
                $eleve->setLieuNaissance($lieu);
                $eleve->setDepartement($departement);
                $eleve->setNom($nom);
                $eleve->setPrenom($prenom);
                $eleve->setSexe($faker->randomElement(['Masculin', 'Féminin']));
                $eleve->setNumExtrait($faker->randomNumber(9, true));
                $eleve->setDateExtrait(($faker->dateTimeBetween('-16 years', '-6 years')));
                $eleve->setClasse($classe);
                $eleve->setDateInscription($faker->dateTimeBetween('-12 years', '-5 months'));
                $eleve->setDateRecrutement($faker->dateTimeBetween('-12 years', '-5 years'));
                //$eleve->setUser($user);
                $eleve->setStatut($statut);
                $eleve->setEcoleAnDernier($ecoleProvenance);
                $eleve->setEcoleRecrutement($ecoleProvenance);
                //$eleve->setNina($nina);
                $eleve->setEcoleRecrutement($ecole);
                $eleve->setmere($mere);
                $eleve->setAdresse($faker->address());

                $manager->persist($eleve);
                $this->addReference('eleve_' . $i, $eleve);
            } elseif ($i > 340 && $i <= 360) {
                $departement = $this->getReference('departement_' . $faker->numberBetween(1, 1));

                $classe = $this->getReference('classe7eme-' . $faker->numberBetween(2, 2));
                $lieu = $this->getReference('lieu_' . $faker->numberBetween(1, 100));
                $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
                $prenom  = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
                //$user  = $this->getReference('user_' . $faker->numberBetween(1, 8));
                $statut = $this->getReference('statut7eme_' . $faker->numberBetween(1, 3));

                $pere = $this->getReference('pere_' . $faker->numberBetween(1, 80));
                $mere = $this->getReference('mere_' . $faker->numberBetween(1, 110));

                $ecoleProvenance = $this->getReference('ecole_' . $faker->numberBetween(1, 20));
                $eleve = new Eleves();
                $eleve->setDateNaissance($faker->dateTimeBetween('-17 years', '-7 years'));
                $eleve->setLieuNaissance($lieu);
                $eleve->setDepartement($departement);
                $eleve->setNom($nom);
                $eleve->setPrenom($prenom);
                $eleve->setSexe($faker->randomElement(['Masculin', 'Féminin']));
                $eleve->setNumExtrait($faker->randomNumber(9, true));
                $eleve->setDateExtrait(($faker->dateTimeBetween('-16 years', '-6 years')));
                $eleve->setClasse($classe);
                $eleve->setDateInscription($faker->dateTimeBetween('-12 years', '-5 months'));
                $eleve->setDateRecrutement($faker->dateTimeBetween('-12 years', '-5 years'));
                //$eleve->setUser($user);
                $eleve->setStatut($statut);
                $eleve->setEcoleAnDernier($ecoleProvenance);
                $eleve->setEcoleRecrutement($ecoleProvenance);
                //$eleve->setNina($nina);
                $eleve->setEcoleRecrutement($ecole);
                $eleve->setmere($mere);
                $eleve->setAdresse($faker->address());

                $manager->persist($eleve);
                $this->addReference('eleve_' . $i, $eleve);
            } elseif ($i > 360 && $i <= 380) {
                $departement = $this->getReference('departement_' . $faker->numberBetween(1, 1));

                $classe = $this->getReference('classe7eme-' . $faker->numberBetween(3, 3));
                $lieu = $this->getReference('lieu_' . $faker->numberBetween(1, 100));
                $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
                $prenom  = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
                //$user  = $this->getReference('user_' . $faker->numberBetween(1, 8));
                $statut = $this->getReference('statut7eme_' . $faker->numberBetween(1, 3));

                $pere = $this->getReference('pere_' . $faker->numberBetween(1, 80));
                $mere = $this->getReference('mere_' . $faker->numberBetween(1, 110));

                $ecoleProvenance = $this->getReference('ecole_' . $faker->numberBetween(1, 20));
                $eleve = new Eleves();
                $eleve->setDateNaissance($faker->dateTimeBetween('-17 years', '-7 years'));
                $eleve->setLieuNaissance($lieu);
                $eleve->setDepartement($departement);
                $eleve->setNom($nom);
                $eleve->setPrenom($prenom);
                $eleve->setSexe($faker->randomElement(['Masculin', 'Féminin']));
                $eleve->setNumExtrait($faker->randomNumber(9, true));
                $eleve->setDateExtrait(($faker->dateTimeBetween('-16 years', '-6 years')));
                $eleve->setClasse($classe);
                $eleve->setDateInscription($faker->dateTimeBetween('-12 years', '-5 months'));
                $eleve->setDateRecrutement($faker->dateTimeBetween('-12 years', '-5 years'));
                //$eleve->setUser($user);
                $eleve->setStatut($statut);
                $eleve->setEcoleAnDernier($ecoleProvenance);
                $eleve->setEcoleRecrutement($ecoleProvenance);
                //$eleve->setNina($nina);
                $eleve->setEcoleRecrutement($ecole);
                $eleve->setmere($mere);
                $eleve->setAdresse($faker->address());

                $manager->persist($eleve);
                $this->addReference('eleve_' . $i, $eleve);
            } elseif ($i > 380 && $i <= 400) {
                $departement = $this->getReference('departement_' . $faker->numberBetween(1, 1));

                $classe = $this->getReference('classe8eme-' . $faker->numberBetween(1, 1));
                $lieu = $this->getReference('lieu_' . $faker->numberBetween(1, 100));
                $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
                $prenom  = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
                //$user  = $this->getReference('user_' . $faker->numberBetween(1, 8));
                $statut = $this->getReference('statut8eme_' . $faker->numberBetween(1, 3));

                $pere = $this->getReference('pere_' . $faker->numberBetween(1, 80));
                $mere = $this->getReference('mere_' . $faker->numberBetween(1, 110));

                $ecoleProvenance = $this->getReference('ecole_' . $faker->numberBetween(1, 20));
                $eleve = new Eleves();
                $eleve->setDateNaissance($faker->dateTimeBetween('-17 years', '-7 years'));
                $eleve->setLieuNaissance($lieu);
                $eleve->setDepartement($departement);
                $eleve->setNom($nom);
                $eleve->setPrenom($prenom);
                $eleve->setSexe($faker->randomElement(['Masculin', 'Féminin']));
                $eleve->setNumExtrait($faker->randomNumber(9, true));
                $eleve->setDateExtrait(($faker->dateTimeBetween('-16 years', '-6 years')));
                $eleve->setClasse($classe);
                $eleve->setDateInscription($faker->dateTimeBetween('-12 years', '-5 months'));
                $eleve->setDateRecrutement($faker->dateTimeBetween('-12 years', '-5 years'));
                //$eleve->setUser($user);
                $eleve->setStatut($statut);
                $eleve->setEcoleAnDernier($ecoleProvenance);
                $eleve->setEcoleRecrutement($ecoleProvenance);
                //$eleve->setNina($nina);
                $eleve->setEcoleRecrutement($ecole);
                $eleve->setmere($mere);
                $eleve->setAdresse($faker->address());

                $manager->persist($eleve);
                $this->addReference('eleve_' . $i, $eleve);
            } elseif ($i > 400 && $i <= 420) {
                $departement = $this->getReference('departement_' . $faker->numberBetween(1, 1));

                $classe = $this->getReference('classe8eme-' . $faker->numberBetween(2, 2));
                $lieu = $this->getReference('lieu_' . $faker->numberBetween(1, 100));
                $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
                $prenom  = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
                //$user  = $this->getReference('user_' . $faker->numberBetween(1, 8));
                $statut = $this->getReference('statut8eme_' . $faker->numberBetween(1, 3));

                $pere = $this->getReference('pere_' . $faker->numberBetween(1, 80));
                $mere = $this->getReference('mere_' . $faker->numberBetween(1, 110));

                $ecoleProvenance = $this->getReference('ecole_' . $faker->numberBetween(1, 20));
                $eleve = new Eleves();
                $eleve->setDateNaissance($faker->dateTimeBetween('-17 years', '-7 years'));
                $eleve->setLieuNaissance($lieu);
                $eleve->setDepartement($departement);
                $eleve->setNom($nom);
                $eleve->setPrenom($prenom);
                $eleve->setSexe($faker->randomElement(['Masculin', 'Féminin']));
                $eleve->setNumExtrait($faker->randomNumber(9, true));
                $eleve->setDateExtrait(($faker->dateTimeBetween('-16 years', '-6 years')));
                $eleve->setClasse($classe);
                $eleve->setDateInscription($faker->dateTimeBetween('-12 years', '-5 months'));
                $eleve->setDateRecrutement($faker->dateTimeBetween('-12 years', '-5 years'));
                //$eleve->setUser($user);
                $eleve->setStatut($statut);
                $eleve->setEcoleAnDernier($ecoleProvenance);
                $eleve->setEcoleRecrutement($ecoleProvenance);
                //$eleve->setNina($nina);
                $eleve->setEcoleRecrutement($ecole);
                $eleve->setmere($mere);
                $eleve->setAdresse($faker->address());

                $manager->persist($eleve);
                $this->addReference('eleve_' . $i, $eleve);
            } elseif ($i > 420 && $i <= 440) {
                $departement = $this->getReference('departement_' . $faker->numberBetween(1, 1));

                $classe = $this->getReference('classe8eme-' . $faker->numberBetween(3, 3));
                $lieu = $this->getReference('lieu_' . $faker->numberBetween(1, 100));
                $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
                $prenom  = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
                //$user  = $this->getReference('user_' . $faker->numberBetween(1, 8));
                $statut = $this->getReference('statut8eme_' . $faker->numberBetween(1, 3));

                $pere = $this->getReference('pere_' . $faker->numberBetween(1, 80));
                $mere = $this->getReference('mere_' . $faker->numberBetween(1, 110));

                $ecoleProvenance = $this->getReference('ecole_' . $faker->numberBetween(1, 20));
                $eleve = new Eleves();
                $eleve->setDateNaissance($faker->dateTimeBetween('-17 years', '-7 years'));
                $eleve->setLieuNaissance($lieu);
                $eleve->setDepartement($departement);
                $eleve->setNom($nom);
                $eleve->setPrenom($prenom);
                $eleve->setSexe($faker->randomElement(['Masculin', 'Féminin']));
                $eleve->setNumExtrait($faker->randomNumber(9, true));
                $eleve->setDateExtrait(($faker->dateTimeBetween('-16 years', '-6 years')));
                $eleve->setClasse($classe);
                $eleve->setDateInscription($faker->dateTimeBetween('-12 years', '-5 months'));
                $eleve->setDateRecrutement($faker->dateTimeBetween('-12 years', '-5 years'));
                //$eleve->setUser($user);
                $eleve->setStatut($statut);
                $eleve->setEcoleAnDernier($ecoleProvenance);
                $eleve->setEcoleRecrutement($ecoleProvenance);
                //$eleve->setNina($nina);
                $eleve->setEcoleRecrutement($ecole);
                $eleve->setmere($mere);
                $eleve->setAdresse($faker->address());

                $manager->persist($eleve);
                $this->addReference('eleve_' . $i, $eleve);
            } elseif ($i > 440 && $i <= 460) {
                $departement = $this->getReference('departement_' . $faker->numberBetween(1, 1));

                $classe = $this->getReference('classe9eme-' . $faker->numberBetween(1, 1));
                $lieu = $this->getReference('lieu_' . $faker->numberBetween(1, 100));
                $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
                $prenom  = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
                //$user  = $this->getReference('user_' . $faker->numberBetween(1, 8));
                $statut = $this->getReference('statut9eme_' . $faker->numberBetween(1, 3));

                $pere = $this->getReference('pere_' . $faker->numberBetween(1, 80));
                $mere = $this->getReference('mere_' . $faker->numberBetween(1, 110));

                $ecoleProvenance = $this->getReference('ecole_' . $faker->numberBetween(1, 20));
                $eleve = new Eleves();
                $eleve->setDateNaissance($faker->dateTimeBetween('-17 years', '-7 years'));
                $eleve->setLieuNaissance($lieu);
                $eleve->setDepartement($departement);
                $eleve->setNom($nom);
                $eleve->setPrenom($prenom);
                $eleve->setSexe($faker->randomElement(['Masculin', 'Féminin']));
                $eleve->setNumExtrait($faker->randomNumber(9, true));
                $eleve->setDateExtrait(($faker->dateTimeBetween('-16 years', '-6 years')));
                $eleve->setClasse($classe);
                $eleve->setDateInscription($faker->dateTimeBetween('-12 years', '-5 months'));
                $eleve->setDateRecrutement($faker->dateTimeBetween('-12 years', '-5 years'));
                //$eleve->setUser($user);
                $eleve->setStatut($statut);
                $eleve->setEcoleAnDernier($ecoleProvenance);
                $eleve->setEcoleRecrutement($ecoleProvenance);
                //$eleve->setNina($nina);
                $eleve->setEcoleRecrutement($ecole);
                $eleve->setmere($mere);
                $eleve->setAdresse($faker->address());

                $manager->persist($eleve);
                $this->addReference('eleve_' . $i, $eleve);
            } elseif ($i > 460 && $i <= 480) {
                $departement = $this->getReference('departement_' . $faker->numberBetween(1, 1));

                $classe = $this->getReference('classe9eme-' . $faker->numberBetween(2, 2));
                $lieu = $this->getReference('lieu_' . $faker->numberBetween(1, 100));
                $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
                $prenom  = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
                //$user  = $this->getReference('user_' . $faker->numberBetween(1, 8));
                $statut = $this->getReference('statut9eme_' . $faker->numberBetween(1, 3));

                $pere = $this->getReference('pere_' . $faker->numberBetween(1, 80));
                $mere = $this->getReference('mere_' . $faker->numberBetween(1, 110));

                $ecoleProvenance = $this->getReference('ecole_' . $faker->numberBetween(1, 20));
                $eleve = new Eleves();
                $eleve->setDateNaissance($faker->dateTimeBetween('-17 years', '-7 years'));
                $eleve->setLieuNaissance($lieu);
                $eleve->setDepartement($departement);
                $eleve->setNom($nom);
                $eleve->setPrenom($prenom);
                $eleve->setSexe($faker->randomElement(['Masculin', 'Féminin']));
                $eleve->setNumExtrait($faker->randomNumber(9, true));
                $eleve->setDateExtrait(($faker->dateTimeBetween('-16 years', '-6 years')));
                $eleve->setClasse($classe);
                $eleve->setDateInscription($faker->dateTimeBetween('-12 years', '-5 months'));
                $eleve->setDateRecrutement($faker->dateTimeBetween('-12 years', '-5 years'));
                //$eleve->setUser($user);
                $eleve->setStatut($statut);
                $eleve->setEcoleAnDernier($ecoleProvenance);
                $eleve->setEcoleRecrutement($ecoleProvenance);
                //$eleve->setNina($nina);
                $eleve->setEcoleRecrutement($ecole);
                $eleve->setmere($mere);
                $eleve->setAdresse($faker->address());

                $manager->persist($eleve);
                $this->addReference('eleve_' . $i, $eleve);
            } elseif ($i > 480 && $i <= 500) {
                $departement = $this->getReference('departement_' . $faker->numberBetween(1, 1));

                $classe = $this->getReference('classe9eme-' . $faker->numberBetween(3, 3));
                $lieu = $this->getReference('lieu_' . $faker->numberBetween(1, 100));
                $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
                $prenom  = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
                //$user  = $this->getReference('user_' . $faker->numberBetween(1, 8));
                $statut = $this->getReference('statut9eme_' . $faker->numberBetween(1, 3));

                $pere = $this->getReference('pere_' . $faker->numberBetween(1, 80));
                $mere = $this->getReference('mere_' . $faker->numberBetween(1, 110));

                $ecoleProvenance = $this->getReference('ecole_' . $faker->numberBetween(1, 20));
                $eleve = new Eleves();
                $eleve->setDateNaissance($faker->dateTimeBetween('-17 years', '-7 years'));
                $eleve->setLieuNaissance($lieu);
                $eleve->setDepartement($departement);
                $eleve->setNom($nom);
                $eleve->setPrenom($prenom);
                $eleve->setSexe($faker->randomElement(['Masculin', 'Féminin']));
                $eleve->setNumExtrait($faker->randomNumber(9, true));
                $eleve->setDateExtrait(($faker->dateTimeBetween('-16 years', '-6 years')));
                $eleve->setClasse($classe);
                $eleve->setDateInscription($faker->dateTimeBetween('-12 years', '-5 months'));
                $eleve->setDateRecrutement($faker->dateTimeBetween('-12 years', '-5 years'));
                //$eleve->setUser($user);
                $eleve->setStatut($statut);
                $eleve->setEcoleAnDernier($ecoleProvenance);
                $eleve->setEcoleRecrutement($ecoleProvenance);
                //$eleve->setNina($nina);
                $eleve->setEcoleRecrutement($ecole);
                $eleve->setmere($mere);
                $eleve->setAdresse($faker->address());

                $manager->persist($eleve);
                $this->addReference('eleve_' . $i, $eleve);
            } elseif ($i > 500 && $i <= 520) {
                $departement = $this->getReference('departement_' . $faker->numberBetween(1, 1));

                $classe = $this->getReference('classe10eme-' . $faker->numberBetween(1, 1));
                $lieu = $this->getReference('lieu_' . $faker->numberBetween(1, 100));
                $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
                $prenom  = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
                //$user  = $this->getReference('user_' . $faker->numberBetween(1, 8));
                $statut = $this->getReference('statut10eme_' . $faker->numberBetween(1, 3));

                $pere = $this->getReference('pere_' . $faker->numberBetween(1, 80));
                $mere = $this->getReference('mere_' . $faker->numberBetween(1, 110));

                $ecoleProvenance = $this->getReference('ecole_' . $faker->numberBetween(1, 20));
                $eleve = new Eleves();
                $eleve->setDateNaissance($faker->dateTimeBetween('-17 years', '-7 years'));
                $eleve->setLieuNaissance($lieu);
                $eleve->setDepartement($departement);
                $eleve->setNom($nom);
                $eleve->setPrenom($prenom);
                $eleve->setSexe($faker->randomElement(['Masculin', 'Féminin']));
                $eleve->setNumExtrait($faker->randomNumber(9, true));
                $eleve->setDateExtrait(($faker->dateTimeBetween('-16 years', '-6 years')));
                $eleve->setClasse($classe);
                $eleve->setDateInscription($faker->dateTimeBetween('-12 years', '-5 months'));
                $eleve->setDateRecrutement($faker->dateTimeBetween('-12 years', '-5 years'));
                //$eleve->setUser($user);
                $eleve->setStatut($statut);
                $eleve->setEcoleAnDernier($ecoleProvenance);
                $eleve->setEcoleRecrutement($ecoleProvenance);
                //$eleve->setNina($nina);
                $eleve->setEcoleRecrutement($ecole);
                $eleve->setmere($mere);
                $eleve->setAdresse($faker->address());

                $manager->persist($eleve);
                $this->addReference('eleve_' . $i, $eleve);
            } elseif ($i > 520 && $i <= 540) {
                $departement = $this->getReference('departement_' . $faker->numberBetween(1, 1));

                $classe = $this->getReference('classe10eme-' . $faker->numberBetween(2, 2));
                $lieu = $this->getReference('lieu_' . $faker->numberBetween(1, 100));
                $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
                $prenom  = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
                //$user  = $this->getReference('user_' . $faker->numberBetween(1, 8));
                $statut = $this->getReference('statut10eme_' . $faker->numberBetween(1, 3));

                $pere = $this->getReference('pere_' . $faker->numberBetween(1, 80));
                $mere = $this->getReference('mere_' . $faker->numberBetween(1, 110));

                $ecoleProvenance = $this->getReference('ecole_' . $faker->numberBetween(1, 20));
                $eleve = new Eleves();
                $eleve->setDateNaissance($faker->dateTimeBetween('-17 years', '-7 years'));
                $eleve->setLieuNaissance($lieu);
                $eleve->setDepartement($departement);
                $eleve->setNom($nom);
                $eleve->setPrenom($prenom);
                $eleve->setSexe($faker->randomElement(['Masculin', 'Féminin']));
                $eleve->setNumExtrait($faker->randomNumber(9, true));
                $eleve->setDateExtrait(($faker->dateTimeBetween('-16 years', '-6 years')));
                $eleve->setClasse($classe);
                $eleve->setDateInscription($faker->dateTimeBetween('-12 years', '-5 months'));
                $eleve->setDateRecrutement($faker->dateTimeBetween('-12 years', '-5 years'));
                //$eleve->setUser($user);
                $eleve->setStatut($statut);
                $eleve->setEcoleAnDernier($ecoleProvenance);
                $eleve->setEcoleRecrutement($ecoleProvenance);
                //$eleve->setNina($nina);
                $eleve->setEcoleRecrutement($ecole);
                $eleve->setmere($mere);
                $eleve->setAdresse($faker->address());

                $manager->persist($eleve);
                $this->addReference('eleve_' . $i, $eleve);
            } elseif ($i > 540 && $i <= 560) {
                $departement = $this->getReference('departement_' . $faker->numberBetween(1, 1));

                $classe = $this->getReference('classe10eme-' . $faker->numberBetween(3, 3));
                $lieu = $this->getReference('lieu_' . $faker->numberBetween(1, 100));
                $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
                $prenom  = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
                //$user  = $this->getReference('user_' . $faker->numberBetween(1, 8));
                $statut = $this->getReference('statut10eme_' . $faker->numberBetween(1, 3));

                $pere = $this->getReference('pere_' . $faker->numberBetween(1, 80));
                $mere = $this->getReference('mere_' . $faker->numberBetween(1, 110));

                $ecoleProvenance = $this->getReference('ecole_' . $faker->numberBetween(1, 20));
                $eleve = new Eleves();
                $eleve->setDateNaissance($faker->dateTimeBetween('-17 years', '-7 years'));
                $eleve->setLieuNaissance($lieu);
                $eleve->setDepartement($departement);
                $eleve->setNom($nom);
                $eleve->setPrenom($prenom);
                $eleve->setSexe($faker->randomElement(['Masculin', 'Féminin']));
                $eleve->setNumExtrait($faker->randomNumber(9, true));
                $eleve->setDateExtrait(($faker->dateTimeBetween('-16 years', '-6 years')));
                $eleve->setClasse($classe);
                $eleve->setDateInscription($faker->dateTimeBetween('-12 years', '-5 months'));
                $eleve->setDateRecrutement($faker->dateTimeBetween('-12 years', '-5 years'));
                //$eleve->setUser($user);
                $eleve->setStatut($statut);
                $eleve->setEcoleAnDernier($ecoleProvenance);
                $eleve->setEcoleRecrutement($ecoleProvenance);
                //$eleve->setNina($nina);
                $eleve->setEcoleRecrutement($ecole);
                $eleve->setmere($mere);
                $eleve->setAdresse($faker->address());

                $manager->persist($eleve);
                $this->addReference('eleve_' . $i, $eleve);
            } elseif ($i > 560 && $i <= 610) {
                $departement = $this->getReference('departement_' . $faker->numberBetween(1, 1));

                $classe = $this->getReference('classe10eme-' . $faker->numberBetween(4, 4));
                $lieu = $this->getReference('lieu_' . $faker->numberBetween(1, 100));
                $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
                $prenom  = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
                //$user  = $this->getReference('user_' . $faker->numberBetween(1, 8));
                $statut = $this->getReference('statut10eme_' . $faker->numberBetween(1, 3));

                $pere = $this->getReference('pere_' . $faker->numberBetween(1, 80));
                $mere = $this->getReference('mere_' . $faker->numberBetween(1, 110));

                $ecoleProvenance = $this->getReference('ecole_' . $faker->numberBetween(1, 20));
                $eleve = new Eleves();
                $eleve->setDateNaissance($faker->dateTimeBetween('-17 years', '-7 years'));
                $eleve->setLieuNaissance($lieu);
                $eleve->setDepartement($departement);
                $eleve->setNom($nom);
                $eleve->setPrenom($prenom);
                $eleve->setSexe($faker->randomElement(['Masculin', 'Féminin']));
                $eleve->setNumExtrait($faker->randomNumber(9, true));
                $eleve->setDateExtrait(($faker->dateTimeBetween('-16 years', '-6 years')));
                $eleve->setClasse($classe);
                $eleve->setDateInscription($faker->dateTimeBetween('-12 years', '-5 months'));
                $eleve->setDateRecrutement($faker->dateTimeBetween('-12 years', '-5 years'));
                //$eleve->setUser($user);
                $eleve->setStatut($statut);
                $eleve->setEcoleAnDernier($ecoleProvenance);
                $eleve->setEcoleRecrutement($ecoleProvenance);
                //$eleve->setNina($nina);
                $eleve->setEcoleRecrutement($ecole);
                $eleve->setmere($mere);
                $eleve->setAdresse($faker->address());

                $manager->persist($eleve);
                $this->addReference('eleve_' . $i, $eleve);
            } elseif ($i > 610 && $i <= 660) {
                $departement = $this->getReference('departement_' . $faker->numberBetween(1, 1));

                $classe = $this->getReference('classe11eme-' . $faker->numberBetween(1, 1));
                $lieu = $this->getReference('lieu_' . $faker->numberBetween(1, 100));
                $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
                $prenom  = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
                //$user  = $this->getReference('user_' . $faker->numberBetween(1, 8));
                $statut = $this->getReference('statut11eme_' . $faker->numberBetween(1, 3));

                $pere = $this->getReference('pere_' . $faker->numberBetween(1, 80));
                $mere = $this->getReference('mere_' . $faker->numberBetween(1, 110));

                $ecoleProvenance = $this->getReference('ecole_' . $faker->numberBetween(1, 20));
                $eleve = new Eleves();
                $eleve->setDateNaissance($faker->dateTimeBetween('-17 years', '-7 years'));
                $eleve->setLieuNaissance($lieu);
                $eleve->setDepartement($departement);
                $eleve->setNom($nom);
                $eleve->setPrenom($prenom);
                $eleve->setSexe($faker->randomElement(['Masculin', 'Féminin']));
                $eleve->setNumExtrait($faker->randomNumber(9, true));
                $eleve->setDateExtrait(($faker->dateTimeBetween('-16 years', '-6 years')));
                $eleve->setClasse($classe);
                $eleve->setDateInscription($faker->dateTimeBetween('-12 years', '-5 months'));
                $eleve->setDateRecrutement($faker->dateTimeBetween('-12 years', '-5 years'));
                //$eleve->setUser($user);
                $eleve->setStatut($statut);
                $eleve->setEcoleAnDernier($ecoleProvenance);
                $eleve->setEcoleRecrutement($ecoleProvenance);
                //$eleve->setNina($nina);
                $eleve->setEcoleRecrutement($ecole);
                $eleve->setmere($mere);
                $eleve->setAdresse($faker->address());

                $manager->persist($eleve);
                $this->addReference('eleve_' . $i, $eleve);
            } elseif ($i > 660 && $i <= 710) {
                $departement = $this->getReference('departement_' . $faker->numberBetween(1, 1));

                $classe = $this->getReference('classe11eme-' . $faker->numberBetween(2, 2));
                $lieu = $this->getReference('lieu_' . $faker->numberBetween(1, 100));
                $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
                $prenom  = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
                //$user  = $this->getReference('user_' . $faker->numberBetween(1, 8));
                $statut = $this->getReference('statut11eme_' . $faker->numberBetween(1, 3));

                $pere = $this->getReference('pere_' . $faker->numberBetween(1, 80));
                $mere = $this->getReference('mere_' . $faker->numberBetween(1, 110));

                $ecoleProvenance = $this->getReference('ecole_' . $faker->numberBetween(1, 20));
                $eleve = new Eleves();
                $eleve->setDateNaissance($faker->dateTimeBetween('-17 years', '-7 years'));
                $eleve->setLieuNaissance($lieu);
                $eleve->setDepartement($departement);
                $eleve->setNom($nom);
                $eleve->setPrenom($prenom);
                $eleve->setSexe($faker->randomElement(['Masculin', 'Féminin']));
                $eleve->setNumExtrait($faker->randomNumber(9, true));
                $eleve->setDateExtrait(($faker->dateTimeBetween('-16 years', '-6 years')));
                $eleve->setClasse($classe);
                $eleve->setDateInscription($faker->dateTimeBetween('-12 years', '-5 months'));
                $eleve->setDateRecrutement($faker->dateTimeBetween('-12 years', '-5 years'));
                //$eleve->setUser($user);
                $eleve->setStatut($statut);
                $eleve->setEcoleAnDernier($ecoleProvenance);
                $eleve->setEcoleRecrutement($ecoleProvenance);
                //$eleve->setNina($nina);
                $eleve->setEcoleRecrutement($ecole);
                $eleve->setmere($mere);
                $eleve->setAdresse($faker->address());

                $manager->persist($eleve);
                $this->addReference('eleve_' . $i, $eleve);
            } elseif ($i > 710 && $i <= 760) {
                $departement = $this->getReference('departement_' . $faker->numberBetween(1, 1));

                $classe = $this->getReference('classe11eme-' . $faker->numberBetween(3, 3));
                $lieu = $this->getReference('lieu_' . $faker->numberBetween(1, 100));
                $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
                $prenom  = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
                //$user  = $this->getReference('user_' . $faker->numberBetween(1, 8));
                $statut = $this->getReference('statut11eme_' . $faker->numberBetween(1, 3));

                $pere = $this->getReference('pere_' . $faker->numberBetween(1, 80));
                $mere = $this->getReference('mere_' . $faker->numberBetween(1, 110));

                $ecoleProvenance = $this->getReference('ecole_' . $faker->numberBetween(1, 20));
                $eleve = new Eleves();
                $eleve->setDateNaissance($faker->dateTimeBetween('-17 years', '-7 years'));
                $eleve->setLieuNaissance($lieu);
                $eleve->setDepartement($departement);
                $eleve->setNom($nom);
                $eleve->setPrenom($prenom);
                $eleve->setSexe($faker->randomElement(['Masculin', 'Féminin']));
                $eleve->setNumExtrait($faker->randomNumber(9, true));
                $eleve->setDateExtrait(($faker->dateTimeBetween('-16 years', '-6 years')));
                $eleve->setClasse($classe);
                $eleve->setDateInscription($faker->dateTimeBetween('-12 years', '-5 months'));
                $eleve->setDateRecrutement($faker->dateTimeBetween('-12 years', '-5 years'));
                //$eleve->setUser($user);
                $eleve->setStatut($statut);
                $eleve->setEcoleAnDernier($ecoleProvenance);
                $eleve->setEcoleRecrutement($ecoleProvenance);
                //$eleve->setNina($nina);
                $eleve->setEcoleRecrutement($ecole);
                $eleve->setmere($mere);
                $eleve->setAdresse($faker->address());

                $manager->persist($eleve);
                $this->addReference('eleve_' . $i, $eleve);
            } elseif ($i > 760 && $i <= 810) {
                $departement = $this->getReference('departement_' . $faker->numberBetween(1, 1));

                $classe = $this->getReference('classe11eme-' . $faker->numberBetween(4, 4));
                $lieu = $this->getReference('lieu_' . $faker->numberBetween(1, 100));
                $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
                $prenom  = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
                //$user  = $this->getReference('user_' . $faker->numberBetween(1, 8));
                $statut = $this->getReference('statut11eme_' . $faker->numberBetween(1, 3));

                $pere = $this->getReference('pere_' . $faker->numberBetween(1, 80));
                $mere = $this->getReference('mere_' . $faker->numberBetween(1, 110));

                $ecoleProvenance = $this->getReference('ecole_' . $faker->numberBetween(1, 20));
                $eleve = new Eleves();
                $eleve->setDateNaissance($faker->dateTimeBetween('-17 years', '-7 years'));
                $eleve->setLieuNaissance($lieu);
                $eleve->setDepartement($departement);
                $eleve->setNom($nom);
                $eleve->setPrenom($prenom);
                $eleve->setSexe($faker->randomElement(['Masculin', 'Féminin']));
                $eleve->setNumExtrait($faker->randomNumber(9, true));
                $eleve->setDateExtrait(($faker->dateTimeBetween('-16 years', '-6 years')));
                $eleve->setClasse($classe);
                $eleve->setDateInscription($faker->dateTimeBetween('-12 years', '-5 months'));
                $eleve->setDateRecrutement($faker->dateTimeBetween('-12 years', '-5 years'));
                //$eleve->setUser($user);
                $eleve->setStatut($statut);
                $eleve->setEcoleAnDernier($ecoleProvenance);
                $eleve->setEcoleRecrutement($ecoleProvenance);
                //$eleve->setNina($nina);
                $eleve->setEcoleRecrutement($ecole);
                $eleve->setmere($mere);
                $eleve->setAdresse($faker->address());

                $manager->persist($eleve);
                $this->addReference('eleve_' . $i, $eleve);
            } elseif ($i > 810 && $i <= 860) {
                $departement = $this->getReference('departement_' . $faker->numberBetween(1, 1));

                $classe = $this->getReference('classe11eme-' . $faker->numberBetween(5, 5));
                $lieu = $this->getReference('lieu_' . $faker->numberBetween(1, 100));
                $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
                $prenom  = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
                //$user  = $this->getReference('user_' . $faker->numberBetween(1, 8));
                $statut = $this->getReference('statut11eme_' . $faker->numberBetween(1, 3));

                $pere = $this->getReference('pere_' . $faker->numberBetween(1, 80));
                $mere = $this->getReference('mere_' . $faker->numberBetween(1, 110));

                $ecoleProvenance = $this->getReference('ecole_' . $faker->numberBetween(1, 20));
                $eleve = new Eleves();
                $eleve->setDateNaissance($faker->dateTimeBetween('-17 years', '-7 years'));
                $eleve->setLieuNaissance($lieu);
                $eleve->setDepartement($departement);
                $eleve->setNom($nom);
                $eleve->setPrenom($prenom);
                $eleve->setSexe($faker->randomElement(['Masculin', 'Féminin']));
                $eleve->setNumExtrait($faker->randomNumber(9, true));
                $eleve->setDateExtrait(($faker->dateTimeBetween('-16 years', '-6 years')));
                $eleve->setClasse($classe);
                $eleve->setDateInscription($faker->dateTimeBetween('-12 years', '-5 months'));
                $eleve->setDateRecrutement($faker->dateTimeBetween('-12 years', '-5 years'));
                //$eleve->setUser($user);
                $eleve->setStatut($statut);
                $eleve->setEcoleAnDernier($ecoleProvenance);
                $eleve->setEcoleRecrutement($ecoleProvenance);
                //$eleve->setNina($nina);
                $eleve->setEcoleRecrutement($ecole);
                $eleve->setmere($mere);
                $eleve->setAdresse($faker->address());

                $manager->persist($eleve);
                $this->addReference('eleve_' . $i, $eleve);
            } elseif ($i > 860 && $i <= 910) {
                $departement = $this->getReference('departement_' . $faker->numberBetween(1, 1));

                $classe = $this->getReference('classe12eme-' . $faker->numberBetween(1, 1));
                $lieu = $this->getReference('lieu_' . $faker->numberBetween(1, 100));
                $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
                $prenom  = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
                //$user  = $this->getReference('user_' . $faker->numberBetween(1, 8));
                $statut = $this->getReference('statut12eme_' . $faker->numberBetween(1, 3));

                $pere = $this->getReference('pere_' . $faker->numberBetween(1, 80));
                $mere = $this->getReference('mere_' . $faker->numberBetween(1, 110));

                $ecoleProvenance = $this->getReference('ecole_' . $faker->numberBetween(1, 20));
                $eleve = new Eleves();
                $eleve->setDateNaissance($faker->dateTimeBetween('-17 years', '-7 years'));
                $eleve->setLieuNaissance($lieu);
                $eleve->setDepartement($departement);
                $eleve->setNom($nom);
                $eleve->setPrenom($prenom);
                $eleve->setSexe($faker->randomElement(['Masculin', 'Féminin']));
                $eleve->setNumExtrait($faker->randomNumber(9, true));
                $eleve->setDateExtrait(($faker->dateTimeBetween('-16 years', '-6 years')));
                $eleve->setClasse($classe);
                $eleve->setDateInscription($faker->dateTimeBetween('-12 years', '-5 months'));
                $eleve->setDateRecrutement($faker->dateTimeBetween('-12 years', '-5 years'));
                //$eleve->setUser($user);
                $eleve->setStatut($statut);
                $eleve->setEcoleAnDernier($ecoleProvenance);
                $eleve->setEcoleRecrutement($ecoleProvenance);
                //$eleve->setNina($nina);
                $eleve->setEcoleRecrutement($ecole);
                $eleve->setmere($mere);
                $eleve->setAdresse($faker->address());

                $manager->persist($eleve);
                $this->addReference('eleve_' . $i, $eleve);
            } elseif ($i > 910 && $i <= 960) {
                $departement = $this->getReference('departement_' . $faker->numberBetween(1, 1));

                $classe = $this->getReference('classe12eme-' . $faker->numberBetween(2, 2));
                $lieu = $this->getReference('lieu_' . $faker->numberBetween(1, 100));
                $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
                $prenom  = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
                //$user  = $this->getReference('user_' . $faker->numberBetween(1, 8));
                $statut = $this->getReference('statut12eme_' . $faker->numberBetween(1, 3));

                $pere = $this->getReference('pere_' . $faker->numberBetween(1, 80));
                $mere = $this->getReference('mere_' . $faker->numberBetween(1, 110));

                $ecoleProvenance = $this->getReference('ecole_' . $faker->numberBetween(1, 20));
                $eleve = new Eleves();
                $eleve->setDateNaissance($faker->dateTimeBetween('-17 years', '-7 years'));
                $eleve->setLieuNaissance($lieu);
                $eleve->setDepartement($departement);
                $eleve->setNom($nom);
                $eleve->setPrenom($prenom);
                $eleve->setSexe($faker->randomElement(['Masculin', 'Féminin']));
                $eleve->setNumExtrait($faker->randomNumber(9, true));
                $eleve->setDateExtrait(($faker->dateTimeBetween('-16 years', '-6 years')));
                $eleve->setClasse($classe);
                $eleve->setDateInscription($faker->dateTimeBetween('-12 years', '-5 months'));
                $eleve->setDateRecrutement($faker->dateTimeBetween('-12 years', '-5 years'));
                //$eleve->setUser($user);
                $eleve->setStatut($statut);
                $eleve->setEcoleAnDernier($ecoleProvenance);
                $eleve->setEcoleRecrutement($ecoleProvenance);
                //$eleve->setNina($nina);
                $eleve->setEcoleRecrutement($ecole);
                $eleve->setmere($mere);
                $eleve->setAdresse($faker->address());

                $manager->persist($eleve);
                $this->addReference('eleve_' . $i, $eleve);
            } elseif ($i > 960 && $i <= 1010) {
                $departement = $this->getReference('departement_' . $faker->numberBetween(1, 1));

                $classe = $this->getReference('classe12eme-' . $faker->numberBetween(3, 3));
                $lieu = $this->getReference('lieu_' . $faker->numberBetween(1, 100));
                $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
                $prenom  = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
                //$user  = $this->getReference('user_' . $faker->numberBetween(1, 8));
                $statut = $this->getReference('statut12eme_' . $faker->numberBetween(1, 3));

                $pere = $this->getReference('pere_' . $faker->numberBetween(1, 80));
                $mere = $this->getReference('mere_' . $faker->numberBetween(1, 110));

                $ecoleProvenance = $this->getReference('ecole_' . $faker->numberBetween(1, 20));
                $eleve = new Eleves();
                $eleve->setDateNaissance($faker->dateTimeBetween('-17 years', '-7 years'));
                $eleve->setLieuNaissance($lieu);
                $eleve->setDepartement($departement);
                $eleve->setNom($nom);
                $eleve->setPrenom($prenom);
                $eleve->setSexe($faker->randomElement(['Masculin', 'Féminin']));
                $eleve->setNumExtrait($faker->randomNumber(9, true));
                $eleve->setDateExtrait(($faker->dateTimeBetween('-16 years', '-6 years')));
                $eleve->setClasse($classe);
                $eleve->setDateInscription($faker->dateTimeBetween('-12 years', '-5 months'));
                $eleve->setDateRecrutement($faker->dateTimeBetween('-12 years', '-5 years'));
                //$eleve->setUser($user);
                $eleve->setStatut($statut);
                $eleve->setEcoleAnDernier($ecoleProvenance);
                $eleve->setEcoleRecrutement($ecoleProvenance);
                //$eleve->setNina($nina);
                $eleve->setEcoleRecrutement($ecole);
                $eleve->setmere($mere);
                $eleve->setAdresse($faker->address());

                $manager->persist($eleve);
                $this->addReference('eleve_' . $i, $eleve);
            } elseif ($i > 1010 && $i <= 1060) {
                $departement = $this->getReference('departement_' . $faker->numberBetween(1, 1));

                $classe = $this->getReference('classe12eme-' . $faker->numberBetween(4, 4));
                $lieu = $this->getReference('lieu_' . $faker->numberBetween(1, 100));
                $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
                $prenom  = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
                //$user  = $this->getReference('user_' . $faker->numberBetween(1, 8));
                $statut = $this->getReference('statut12eme_' . $faker->numberBetween(1, 3));

                $pere = $this->getReference('pere_' . $faker->numberBetween(1, 80));
                $mere = $this->getReference('mere_' . $faker->numberBetween(1, 110));

                $ecoleProvenance = $this->getReference('ecole_' . $faker->numberBetween(1, 20));
                $eleve = new Eleves();
                $eleve->setDateNaissance($faker->dateTimeBetween('-17 years', '-7 years'));
                $eleve->setLieuNaissance($lieu);
                $eleve->setDepartement($departement);
                $eleve->setNom($nom);
                $eleve->setPrenom($prenom);
                $eleve->setSexe($faker->randomElement(['Masculin', 'Féminin']));
                $eleve->setNumExtrait($faker->randomNumber(9, true));
                $eleve->setDateExtrait(($faker->dateTimeBetween('-16 years', '-6 years')));
                $eleve->setClasse($classe);
                $eleve->setDateInscription($faker->dateTimeBetween('-12 years', '-5 months'));
                $eleve->setDateRecrutement($faker->dateTimeBetween('-12 years', '-5 years'));
                //$eleve->setUser($user);
                $eleve->setStatut($statut);
                $eleve->setEcoleAnDernier($ecoleProvenance);
                $eleve->setEcoleRecrutement($ecoleProvenance);
                //$eleve->setNina($nina);
                $eleve->setEcoleRecrutement($ecole);
                $eleve->setmere($mere);
                $eleve->setAdresse($faker->address());

                $manager->persist($eleve);
                $this->addReference('eleve_' . $i, $eleve);
            } elseif ($i > 1060 && $i <= 1110) {
                $departement = $this->getReference('departement_' . $faker->numberBetween(1, 1));

                $classe = $this->getReference('classe12eme-' . $faker->numberBetween(5, 5));
                $lieu = $this->getReference('lieu_' . $faker->numberBetween(1, 100));
                $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
                $prenom  = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
                //$user  = $this->getReference('user_' . $faker->numberBetween(1, 8));
                $statut = $this->getReference('statut12eme_' . $faker->numberBetween(1, 3));

                $pere = $this->getReference('pere_' . $faker->numberBetween(1, 80));
                $mere = $this->getReference('mere_' . $faker->numberBetween(1, 110));

                $ecoleProvenance = $this->getReference('ecole_' . $faker->numberBetween(1, 20));
                $eleve = new Eleves();
                $eleve->setDateNaissance($faker->dateTimeBetween('-17 years', '-7 years'));
                $eleve->setLieuNaissance($lieu);
                $eleve->setDepartement($departement);
                $eleve->setNom($nom);
                $eleve->setPrenom($prenom);
                $eleve->setSexe($faker->randomElement(['Masculin', 'Féminin']));
                $eleve->setNumExtrait($faker->randomNumber(9, true));
                $eleve->setDateExtrait(($faker->dateTimeBetween('-16 years', '-6 years')));
                $eleve->setClasse($classe);
                $eleve->setDateInscription($faker->dateTimeBetween('-12 years', '-5 months'));
                $eleve->setDateRecrutement($faker->dateTimeBetween('-12 years', '-5 years'));
                //$eleve->setUser($user);
                $eleve->setStatut($statut);
                $eleve->setEcoleAnDernier($ecoleProvenance);
                $eleve->setEcoleRecrutement($ecoleProvenance);
                //$eleve->setNina($nina);
                $eleve->setEcoleRecrutement($ecole);
                $eleve->setmere($mere);
                $eleve->setAdresse($faker->address());

                $manager->persist($eleve);
                $this->addReference('eleve_' . $i, $eleve);
            } elseif ($i > 1110 && $i <= 1160) {
                $departement = $this->getReference('departement_' . $faker->numberBetween(1, 1));

                $classe = $this->getReference('classe12eme-' . $faker->numberBetween(6, 6));
                $lieu = $this->getReference('lieu_' . $faker->numberBetween(1, 100));
                $nom  = $this->getReference('nom_' . $faker->numberBetween(1, 50));
                $prenom  = $this->getReference('prenom_' . $faker->numberBetween(1, 100));
                //$user  = $this->getReference('user_' . $faker->numberBetween(1, 8));
                $statut = $this->getReference('statut12eme_' . $faker->numberBetween(1, 3));

                $pere = $this->getReference('pere_' . $faker->numberBetween(1, 80));
                $mere = $this->getReference('mere_' . $faker->numberBetween(1, 110));

                $ecoleProvenance = $this->getReference('ecole_' . $faker->numberBetween(1, 20));
                $eleve = new Eleves();
                $eleve->setDateNaissance($faker->dateTimeBetween('-17 years', '-7 years'));
                $eleve->setLieuNaissance($lieu);
                $eleve->setDepartement($departement);
                $eleve->setNom($nom);
                $eleve->setPrenom($prenom);
                $eleve->setSexe($faker->randomElement(['Masculin', 'Féminin']));
                $eleve->setNumExtrait($faker->randomNumber(9, true));
                $eleve->setDateExtrait(($faker->dateTimeBetween('-16 years', '-6 years')));
                $eleve->setClasse($classe);
                $eleve->setDateInscription($faker->dateTimeBetween('-12 years', '-5 months'));
                $eleve->setDateRecrutement($faker->dateTimeBetween('-12 years', '-5 years'));
                //$eleve->setUser($user);
                $eleve->setStatut($statut);
                $eleve->setEcoleAnDernier($ecoleProvenance);
                $eleve->setEcoleRecrutement($ecoleProvenance);
                //$eleve->setNina($nina);
                $eleve->setEcoleRecrutement($ecole);
                $eleve->setmere($mere);
                $eleve->setAdresse($faker->address());

                $manager->persist($eleve);
                $this->addReference('eleve_' . $i, $eleve);
            }
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            Scolarites12emeFixtures::class,
        ];
    }
}
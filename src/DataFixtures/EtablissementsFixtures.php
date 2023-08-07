<?php

namespace App\DataFixtures;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;
use App\Entity\Etablissements;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class EtablissementsFixtures extends Fixture implements DependentFixtureInterface
{
    private $counter = 1;
    public function load(ObjectManager $manager): void
    {
        $etablissement = new Etablissements();
        $faker = Faker\Factory::create('fr_FR');
        $etablissement = new Etablissements();
        $etablissement->setDesignation('Mamadou TRAORE');
        $etablissement->setFormeJuridique('Entreprise Personneles');
        $etablissement->setAdresse('Baco Djicoroni');
        $etablissement->setCpteBancaire($faker->creditCardNumber('Visa', true, '_'));
        $etablissement->setDateOuverture($faker->dateTimeBetween('-31 years', '-1 years'));
        $etablissement->setEmail($faker->email());
        $etablissement->setNumDecisionCreation($faker->bothify('??-####-??-###'));
        $etablissement->setNumDecisionOuverture($faker->bothify('??-####-??-###'));
        $etablissement->setNumFiscal($faker->bothify('??-###-??##-?-###'));
        $etablissement->setNumSocial($faker->bothify('###-??###-??-####'));
        $etablissement->setTelephone($faker->phoneNumber());
        $etablissement->setTelephoneMobile($faker->phoneNumber());
        $this->setReference('etablissement-' . $this->counter, $etablissement);
        $manager->persist($etablissement);
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            MeresFixtures::class,
        ];
    }
}
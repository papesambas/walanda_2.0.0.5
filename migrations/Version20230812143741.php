<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230812143741 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cercles (id INT AUTO_INCREMENT NOT NULL, region_id INT NOT NULL, designation VARCHAR(150) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, INDEX IDX_45C1718D98260155 (region_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classes (id INT AUTO_INCREMENT NOT NULL, niveau_id INT NOT NULL, designation VARCHAR(150) NOT NULL, capacite INT NOT NULL, effectif INT DEFAULT NULL, disponibilite INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, INDEX IDX_2ED7EC5B3E9C81 (niveau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE communes (id INT AUTO_INCREMENT NOT NULL, cercle_id INT NOT NULL, designation VARCHAR(150) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, INDEX IDX_5C5EE2A527413AB9 (cercle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cycles (id INT AUTO_INCREMENT NOT NULL, enseignement_id INT NOT NULL, designation VARCHAR(150) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, INDEX IDX_72B88B24ABEC3B20 (enseignement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE departements (id INT AUTO_INCREMENT NOT NULL, cycle_id INT DEFAULT NULL, designation VARCHAR(150) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, INDEX IDX_CF7489B25EC1162 (cycle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dossier_eleves (id INT AUTO_INCREMENT NOT NULL, eleves_id INT NOT NULL, designation VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, INDEX IDX_D04A5D98C2140342 (eleves_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ecole_provenances (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(150) NOT NULL, adresse VARCHAR(255) DEFAULT NULL, telephone VARCHAR(25) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eleves (id INT AUTO_INCREMENT NOT NULL, nom_id INT NOT NULL, prenom_id INT NOT NULL, lieu_naissance_id INT NOT NULL, classe_id INT NOT NULL, statut_id INT NOT NULL, ecole_an_dernier_id INT DEFAULT NULL, ecole_recrutement_id INT NOT NULL, departement_id INT NOT NULL, scolarite1_id INT DEFAULT NULL, scolarite2_id INT DEFAULT NULL, scolarite3_id INT DEFAULT NULL, redoublement1_id INT DEFAULT NULL, redoublement2_id INT DEFAULT NULL, redoublement3_id INT DEFAULT NULL, user_id INT DEFAULT NULL, parent_id INT NOT NULL, matricule VARCHAR(50) NOT NULL, sexe VARCHAR(8) NOT NULL, statut_finance VARCHAR(8) NOT NULL, date_naissance DATE NOT NULL, date_extrait DATE NOT NULL, num_extrait VARCHAR(30) NOT NULL, is_admis TINYINT(1) NOT NULL, is_actif TINYINT(1) NOT NULL, is_handicap TINYINT(1) NOT NULL, nature_handicap VARCHAR(50) DEFAULT NULL, date_inscription DATE NOT NULL, date_recrutement DATE NOT NULL, fullname VARCHAR(255) NOT NULL, adresse VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, INDEX IDX_383B09B1C8121CE9 (nom_id), INDEX IDX_383B09B158819F9E (prenom_id), INDEX IDX_383B09B138C8067D (lieu_naissance_id), INDEX IDX_383B09B18F5EA509 (classe_id), INDEX IDX_383B09B1F6203804 (statut_id), INDEX IDX_383B09B18D3AF34D (ecole_an_dernier_id), INDEX IDX_383B09B180BDEBFF (ecole_recrutement_id), INDEX IDX_383B09B1CCF9E01E (departement_id), INDEX IDX_383B09B1F4C45000 (scolarite1_id), INDEX IDX_383B09B1E671FFEE (scolarite2_id), INDEX IDX_383B09B15ECD988B (scolarite3_id), INDEX IDX_383B09B16D13ADFD (redoublement1_id), INDEX IDX_383B09B17FA60213 (redoublement2_id), INDEX IDX_383B09B1C71A6576 (redoublement3_id), UNIQUE INDEX UNIQ_383B09B1A76ED395 (user_id), INDEX IDX_383B09B1727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enseignements (id INT AUTO_INCREMENT NOT NULL, etablissement_id INT NOT NULL, designation VARCHAR(150) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, INDEX IDX_89D79280FF631228 (etablissement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etablissements (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(150) NOT NULL, forme_juridique VARCHAR(150) NOT NULL, adresse VARCHAR(255) NOT NULL, num_decision_creation VARCHAR(60) NOT NULL, num_decision_ouverture VARCHAR(60) NOT NULL, date_ouverture DATE DEFAULT NULL, num_social VARCHAR(60) DEFAULT NULL, num_fiscal VARCHAR(60) NOT NULL, telephone VARCHAR(25) NOT NULL, telephone_mobile VARCHAR(25) DEFAULT NULL, cpte_bancaire VARCHAR(100) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lieu_naissances (id INT AUTO_INCREMENT NOT NULL, commune_id INT NOT NULL, designation VARCHAR(150) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, INDEX IDX_49F8927F131A4F72 (commune_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE meres (id INT AUTO_INCREMENT NOT NULL, nom_id INT NOT NULL, prenom_id INT NOT NULL, profession_id INT NOT NULL, telephone_id INT DEFAULT NULL, nina_id INT DEFAULT NULL, fullname VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, INDEX IDX_2D8B408AC8121CE9 (nom_id), INDEX IDX_2D8B408A58819F9E (prenom_id), INDEX IDX_2D8B408AFDEF8996 (profession_id), UNIQUE INDEX UNIQ_2D8B408AFE649A29 (telephone_id), UNIQUE INDEX UNIQ_2D8B408A5586F33C (nina_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ninas (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(15) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE niveaux (id INT AUTO_INCREMENT NOT NULL, cycle_id INT NOT NULL, designation VARCHAR(150) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, INDEX IDX_56F771A05EC1162 (cycle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE noms (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(100) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parents (id INT AUTO_INCREMENT NOT NULL, pere_id INT NOT NULL, mere_id INT NOT NULL, INDEX IDX_FD501D6A3FD73900 (pere_id), INDEX IDX_FD501D6A39DEC40E (mere_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE peres (id INT AUTO_INCREMENT NOT NULL, nom_id INT NOT NULL, prenom_id INT NOT NULL, profession_id INT NOT NULL, telephone_id INT NOT NULL, nina_id INT DEFAULT NULL, fullname VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, INDEX IDX_B5FB13B9C8121CE9 (nom_id), INDEX IDX_B5FB13B958819F9E (prenom_id), INDEX IDX_B5FB13B9FDEF8996 (profession_id), UNIQUE INDEX UNIQ_B5FB13B9FE649A29 (telephone_id), UNIQUE INDEX UNIQ_B5FB13B95586F33C (nina_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prenoms (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(150) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE professions (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(150) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE redoublements1 (id INT AUTO_INCREMENT NOT NULL, niveau_id INT NOT NULL, scolarite1_id INT DEFAULT NULL, scolarite2_id INT DEFAULT NULL, scolarite3_id INT DEFAULT NULL, INDEX IDX_2554EDA9B3E9C81 (niveau_id), INDEX IDX_2554EDA9F4C45000 (scolarite1_id), INDEX IDX_2554EDA9E671FFEE (scolarite2_id), INDEX IDX_2554EDA95ECD988B (scolarite3_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE redoublements2 (id INT AUTO_INCREMENT NOT NULL, niveau_id INT NOT NULL, redoublement1_id INT NOT NULL, scolarite1_id INT DEFAULT NULL, scolarite2_id INT DEFAULT NULL, scolarite3_id INT DEFAULT NULL, INDEX IDX_BC5DBC13B3E9C81 (niveau_id), INDEX IDX_BC5DBC136D13ADFD (redoublement1_id), INDEX IDX_BC5DBC13F4C45000 (scolarite1_id), INDEX IDX_BC5DBC13E671FFEE (scolarite2_id), INDEX IDX_BC5DBC135ECD988B (scolarite3_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE redoublements3 (id INT AUTO_INCREMENT NOT NULL, niveau_id INT NOT NULL, redoublement2_id INT NOT NULL, scolarite1_id INT DEFAULT NULL, scolarite2_id INT DEFAULT NULL, scolarite3_id INT DEFAULT NULL, INDEX IDX_CB5A8C85B3E9C81 (niveau_id), INDEX IDX_CB5A8C857FA60213 (redoublement2_id), INDEX IDX_CB5A8C85F4C45000 (scolarite1_id), INDEX IDX_CB5A8C85E671FFEE (scolarite2_id), INDEX IDX_CB5A8C855ECD988B (scolarite3_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE regions (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(150) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scolarites1 (id INT AUTO_INCREMENT NOT NULL, niveau_id INT NOT NULL, scolarite INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_328D2B44B3E9C81 (niveau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scolarites2 (id INT AUTO_INCREMENT NOT NULL, scolarite1_id INT NOT NULL, niveau_id INT NOT NULL, scolarite INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_AB847AFEF4C45000 (scolarite1_id), INDEX IDX_AB847AFEB3E9C81 (niveau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scolarites3 (id INT AUTO_INCREMENT NOT NULL, niveau_id INT NOT NULL, scolarite INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_DC834A68B3E9C81 (niveau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statuts (id INT AUTO_INCREMENT NOT NULL, niveau_id INT NOT NULL, designation VARCHAR(150) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, INDEX IDX_403505E6B3E9C81 (niveau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE telephones (id INT AUTO_INCREMENT NOT NULL, numero VARCHAR(25) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, nom_id INT NOT NULL, prenom_id INT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(15) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, fullname VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, reset_token VARCHAR(100) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, UNIQUE INDEX UNIQ_1483A5E9F85E0677 (username), INDEX IDX_1483A5E9C8121CE9 (nom_id), INDEX IDX_1483A5E958819F9E (prenom_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cercles ADD CONSTRAINT FK_45C1718D98260155 FOREIGN KEY (region_id) REFERENCES regions (id)');
        $this->addSql('ALTER TABLE classes ADD CONSTRAINT FK_2ED7EC5B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveaux (id)');
        $this->addSql('ALTER TABLE communes ADD CONSTRAINT FK_5C5EE2A527413AB9 FOREIGN KEY (cercle_id) REFERENCES cercles (id)');
        $this->addSql('ALTER TABLE cycles ADD CONSTRAINT FK_72B88B24ABEC3B20 FOREIGN KEY (enseignement_id) REFERENCES enseignements (id)');
        $this->addSql('ALTER TABLE departements ADD CONSTRAINT FK_CF7489B25EC1162 FOREIGN KEY (cycle_id) REFERENCES cycles (id)');
        $this->addSql('ALTER TABLE dossier_eleves ADD CONSTRAINT FK_D04A5D98C2140342 FOREIGN KEY (eleves_id) REFERENCES eleves (id)');
        $this->addSql('ALTER TABLE eleves ADD CONSTRAINT FK_383B09B1C8121CE9 FOREIGN KEY (nom_id) REFERENCES noms (id)');
        $this->addSql('ALTER TABLE eleves ADD CONSTRAINT FK_383B09B158819F9E FOREIGN KEY (prenom_id) REFERENCES prenoms (id)');
        $this->addSql('ALTER TABLE eleves ADD CONSTRAINT FK_383B09B138C8067D FOREIGN KEY (lieu_naissance_id) REFERENCES lieu_naissances (id)');
        $this->addSql('ALTER TABLE eleves ADD CONSTRAINT FK_383B09B18F5EA509 FOREIGN KEY (classe_id) REFERENCES classes (id)');
        $this->addSql('ALTER TABLE eleves ADD CONSTRAINT FK_383B09B1F6203804 FOREIGN KEY (statut_id) REFERENCES statuts (id)');
        $this->addSql('ALTER TABLE eleves ADD CONSTRAINT FK_383B09B18D3AF34D FOREIGN KEY (ecole_an_dernier_id) REFERENCES ecole_provenances (id)');
        $this->addSql('ALTER TABLE eleves ADD CONSTRAINT FK_383B09B180BDEBFF FOREIGN KEY (ecole_recrutement_id) REFERENCES ecole_provenances (id)');
        $this->addSql('ALTER TABLE eleves ADD CONSTRAINT FK_383B09B1CCF9E01E FOREIGN KEY (departement_id) REFERENCES departements (id)');
        $this->addSql('ALTER TABLE eleves ADD CONSTRAINT FK_383B09B1F4C45000 FOREIGN KEY (scolarite1_id) REFERENCES scolarites1 (id)');
        $this->addSql('ALTER TABLE eleves ADD CONSTRAINT FK_383B09B1E671FFEE FOREIGN KEY (scolarite2_id) REFERENCES scolarites2 (id)');
        $this->addSql('ALTER TABLE eleves ADD CONSTRAINT FK_383B09B15ECD988B FOREIGN KEY (scolarite3_id) REFERENCES scolarites3 (id)');
        $this->addSql('ALTER TABLE eleves ADD CONSTRAINT FK_383B09B16D13ADFD FOREIGN KEY (redoublement1_id) REFERENCES redoublements1 (id)');
        $this->addSql('ALTER TABLE eleves ADD CONSTRAINT FK_383B09B17FA60213 FOREIGN KEY (redoublement2_id) REFERENCES redoublements2 (id)');
        $this->addSql('ALTER TABLE eleves ADD CONSTRAINT FK_383B09B1C71A6576 FOREIGN KEY (redoublement3_id) REFERENCES redoublements3 (id)');
        $this->addSql('ALTER TABLE eleves ADD CONSTRAINT FK_383B09B1A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE eleves ADD CONSTRAINT FK_383B09B1727ACA70 FOREIGN KEY (parent_id) REFERENCES parents (id)');
        $this->addSql('ALTER TABLE enseignements ADD CONSTRAINT FK_89D79280FF631228 FOREIGN KEY (etablissement_id) REFERENCES etablissements (id)');
        $this->addSql('ALTER TABLE lieu_naissances ADD CONSTRAINT FK_49F8927F131A4F72 FOREIGN KEY (commune_id) REFERENCES communes (id)');
        $this->addSql('ALTER TABLE meres ADD CONSTRAINT FK_2D8B408AC8121CE9 FOREIGN KEY (nom_id) REFERENCES noms (id)');
        $this->addSql('ALTER TABLE meres ADD CONSTRAINT FK_2D8B408A58819F9E FOREIGN KEY (prenom_id) REFERENCES prenoms (id)');
        $this->addSql('ALTER TABLE meres ADD CONSTRAINT FK_2D8B408AFDEF8996 FOREIGN KEY (profession_id) REFERENCES professions (id)');
        $this->addSql('ALTER TABLE meres ADD CONSTRAINT FK_2D8B408AFE649A29 FOREIGN KEY (telephone_id) REFERENCES telephones (id)');
        $this->addSql('ALTER TABLE meres ADD CONSTRAINT FK_2D8B408A5586F33C FOREIGN KEY (nina_id) REFERENCES ninas (id)');
        $this->addSql('ALTER TABLE niveaux ADD CONSTRAINT FK_56F771A05EC1162 FOREIGN KEY (cycle_id) REFERENCES cycles (id)');
        $this->addSql('ALTER TABLE parents ADD CONSTRAINT FK_FD501D6A3FD73900 FOREIGN KEY (pere_id) REFERENCES peres (id)');
        $this->addSql('ALTER TABLE parents ADD CONSTRAINT FK_FD501D6A39DEC40E FOREIGN KEY (mere_id) REFERENCES meres (id)');
        $this->addSql('ALTER TABLE peres ADD CONSTRAINT FK_B5FB13B9C8121CE9 FOREIGN KEY (nom_id) REFERENCES noms (id)');
        $this->addSql('ALTER TABLE peres ADD CONSTRAINT FK_B5FB13B958819F9E FOREIGN KEY (prenom_id) REFERENCES prenoms (id)');
        $this->addSql('ALTER TABLE peres ADD CONSTRAINT FK_B5FB13B9FDEF8996 FOREIGN KEY (profession_id) REFERENCES professions (id)');
        $this->addSql('ALTER TABLE peres ADD CONSTRAINT FK_B5FB13B9FE649A29 FOREIGN KEY (telephone_id) REFERENCES telephones (id)');
        $this->addSql('ALTER TABLE peres ADD CONSTRAINT FK_B5FB13B95586F33C FOREIGN KEY (nina_id) REFERENCES ninas (id)');
        $this->addSql('ALTER TABLE redoublements1 ADD CONSTRAINT FK_2554EDA9B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveaux (id)');
        $this->addSql('ALTER TABLE redoublements1 ADD CONSTRAINT FK_2554EDA9F4C45000 FOREIGN KEY (scolarite1_id) REFERENCES scolarites1 (id)');
        $this->addSql('ALTER TABLE redoublements1 ADD CONSTRAINT FK_2554EDA9E671FFEE FOREIGN KEY (scolarite2_id) REFERENCES scolarites2 (id)');
        $this->addSql('ALTER TABLE redoublements1 ADD CONSTRAINT FK_2554EDA95ECD988B FOREIGN KEY (scolarite3_id) REFERENCES scolarites3 (id)');
        $this->addSql('ALTER TABLE redoublements2 ADD CONSTRAINT FK_BC5DBC13B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveaux (id)');
        $this->addSql('ALTER TABLE redoublements2 ADD CONSTRAINT FK_BC5DBC136D13ADFD FOREIGN KEY (redoublement1_id) REFERENCES redoublements1 (id)');
        $this->addSql('ALTER TABLE redoublements2 ADD CONSTRAINT FK_BC5DBC13F4C45000 FOREIGN KEY (scolarite1_id) REFERENCES scolarites1 (id)');
        $this->addSql('ALTER TABLE redoublements2 ADD CONSTRAINT FK_BC5DBC13E671FFEE FOREIGN KEY (scolarite2_id) REFERENCES scolarites2 (id)');
        $this->addSql('ALTER TABLE redoublements2 ADD CONSTRAINT FK_BC5DBC135ECD988B FOREIGN KEY (scolarite3_id) REFERENCES scolarites3 (id)');
        $this->addSql('ALTER TABLE redoublements3 ADD CONSTRAINT FK_CB5A8C85B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveaux (id)');
        $this->addSql('ALTER TABLE redoublements3 ADD CONSTRAINT FK_CB5A8C857FA60213 FOREIGN KEY (redoublement2_id) REFERENCES redoublements2 (id)');
        $this->addSql('ALTER TABLE redoublements3 ADD CONSTRAINT FK_CB5A8C85F4C45000 FOREIGN KEY (scolarite1_id) REFERENCES scolarites1 (id)');
        $this->addSql('ALTER TABLE redoublements3 ADD CONSTRAINT FK_CB5A8C85E671FFEE FOREIGN KEY (scolarite2_id) REFERENCES scolarites2 (id)');
        $this->addSql('ALTER TABLE redoublements3 ADD CONSTRAINT FK_CB5A8C855ECD988B FOREIGN KEY (scolarite3_id) REFERENCES scolarites3 (id)');
        $this->addSql('ALTER TABLE scolarites1 ADD CONSTRAINT FK_328D2B44B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveaux (id)');
        $this->addSql('ALTER TABLE scolarites2 ADD CONSTRAINT FK_AB847AFEF4C45000 FOREIGN KEY (scolarite1_id) REFERENCES scolarites1 (id)');
        $this->addSql('ALTER TABLE scolarites2 ADD CONSTRAINT FK_AB847AFEB3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveaux (id)');
        $this->addSql('ALTER TABLE scolarites3 ADD CONSTRAINT FK_DC834A68B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveaux (id)');
        $this->addSql('ALTER TABLE statuts ADD CONSTRAINT FK_403505E6B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveaux (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9C8121CE9 FOREIGN KEY (nom_id) REFERENCES noms (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E958819F9E FOREIGN KEY (prenom_id) REFERENCES prenoms (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cercles DROP FOREIGN KEY FK_45C1718D98260155');
        $this->addSql('ALTER TABLE classes DROP FOREIGN KEY FK_2ED7EC5B3E9C81');
        $this->addSql('ALTER TABLE communes DROP FOREIGN KEY FK_5C5EE2A527413AB9');
        $this->addSql('ALTER TABLE cycles DROP FOREIGN KEY FK_72B88B24ABEC3B20');
        $this->addSql('ALTER TABLE departements DROP FOREIGN KEY FK_CF7489B25EC1162');
        $this->addSql('ALTER TABLE dossier_eleves DROP FOREIGN KEY FK_D04A5D98C2140342');
        $this->addSql('ALTER TABLE eleves DROP FOREIGN KEY FK_383B09B1C8121CE9');
        $this->addSql('ALTER TABLE eleves DROP FOREIGN KEY FK_383B09B158819F9E');
        $this->addSql('ALTER TABLE eleves DROP FOREIGN KEY FK_383B09B138C8067D');
        $this->addSql('ALTER TABLE eleves DROP FOREIGN KEY FK_383B09B18F5EA509');
        $this->addSql('ALTER TABLE eleves DROP FOREIGN KEY FK_383B09B1F6203804');
        $this->addSql('ALTER TABLE eleves DROP FOREIGN KEY FK_383B09B18D3AF34D');
        $this->addSql('ALTER TABLE eleves DROP FOREIGN KEY FK_383B09B180BDEBFF');
        $this->addSql('ALTER TABLE eleves DROP FOREIGN KEY FK_383B09B1CCF9E01E');
        $this->addSql('ALTER TABLE eleves DROP FOREIGN KEY FK_383B09B1F4C45000');
        $this->addSql('ALTER TABLE eleves DROP FOREIGN KEY FK_383B09B1E671FFEE');
        $this->addSql('ALTER TABLE eleves DROP FOREIGN KEY FK_383B09B15ECD988B');
        $this->addSql('ALTER TABLE eleves DROP FOREIGN KEY FK_383B09B16D13ADFD');
        $this->addSql('ALTER TABLE eleves DROP FOREIGN KEY FK_383B09B17FA60213');
        $this->addSql('ALTER TABLE eleves DROP FOREIGN KEY FK_383B09B1C71A6576');
        $this->addSql('ALTER TABLE eleves DROP FOREIGN KEY FK_383B09B1A76ED395');
        $this->addSql('ALTER TABLE eleves DROP FOREIGN KEY FK_383B09B1727ACA70');
        $this->addSql('ALTER TABLE enseignements DROP FOREIGN KEY FK_89D79280FF631228');
        $this->addSql('ALTER TABLE lieu_naissances DROP FOREIGN KEY FK_49F8927F131A4F72');
        $this->addSql('ALTER TABLE meres DROP FOREIGN KEY FK_2D8B408AC8121CE9');
        $this->addSql('ALTER TABLE meres DROP FOREIGN KEY FK_2D8B408A58819F9E');
        $this->addSql('ALTER TABLE meres DROP FOREIGN KEY FK_2D8B408AFDEF8996');
        $this->addSql('ALTER TABLE meres DROP FOREIGN KEY FK_2D8B408AFE649A29');
        $this->addSql('ALTER TABLE meres DROP FOREIGN KEY FK_2D8B408A5586F33C');
        $this->addSql('ALTER TABLE niveaux DROP FOREIGN KEY FK_56F771A05EC1162');
        $this->addSql('ALTER TABLE parents DROP FOREIGN KEY FK_FD501D6A3FD73900');
        $this->addSql('ALTER TABLE parents DROP FOREIGN KEY FK_FD501D6A39DEC40E');
        $this->addSql('ALTER TABLE peres DROP FOREIGN KEY FK_B5FB13B9C8121CE9');
        $this->addSql('ALTER TABLE peres DROP FOREIGN KEY FK_B5FB13B958819F9E');
        $this->addSql('ALTER TABLE peres DROP FOREIGN KEY FK_B5FB13B9FDEF8996');
        $this->addSql('ALTER TABLE peres DROP FOREIGN KEY FK_B5FB13B9FE649A29');
        $this->addSql('ALTER TABLE peres DROP FOREIGN KEY FK_B5FB13B95586F33C');
        $this->addSql('ALTER TABLE redoublements1 DROP FOREIGN KEY FK_2554EDA9B3E9C81');
        $this->addSql('ALTER TABLE redoublements1 DROP FOREIGN KEY FK_2554EDA9F4C45000');
        $this->addSql('ALTER TABLE redoublements1 DROP FOREIGN KEY FK_2554EDA9E671FFEE');
        $this->addSql('ALTER TABLE redoublements1 DROP FOREIGN KEY FK_2554EDA95ECD988B');
        $this->addSql('ALTER TABLE redoublements2 DROP FOREIGN KEY FK_BC5DBC13B3E9C81');
        $this->addSql('ALTER TABLE redoublements2 DROP FOREIGN KEY FK_BC5DBC136D13ADFD');
        $this->addSql('ALTER TABLE redoublements2 DROP FOREIGN KEY FK_BC5DBC13F4C45000');
        $this->addSql('ALTER TABLE redoublements2 DROP FOREIGN KEY FK_BC5DBC13E671FFEE');
        $this->addSql('ALTER TABLE redoublements2 DROP FOREIGN KEY FK_BC5DBC135ECD988B');
        $this->addSql('ALTER TABLE redoublements3 DROP FOREIGN KEY FK_CB5A8C85B3E9C81');
        $this->addSql('ALTER TABLE redoublements3 DROP FOREIGN KEY FK_CB5A8C857FA60213');
        $this->addSql('ALTER TABLE redoublements3 DROP FOREIGN KEY FK_CB5A8C85F4C45000');
        $this->addSql('ALTER TABLE redoublements3 DROP FOREIGN KEY FK_CB5A8C85E671FFEE');
        $this->addSql('ALTER TABLE redoublements3 DROP FOREIGN KEY FK_CB5A8C855ECD988B');
        $this->addSql('ALTER TABLE scolarites1 DROP FOREIGN KEY FK_328D2B44B3E9C81');
        $this->addSql('ALTER TABLE scolarites2 DROP FOREIGN KEY FK_AB847AFEF4C45000');
        $this->addSql('ALTER TABLE scolarites2 DROP FOREIGN KEY FK_AB847AFEB3E9C81');
        $this->addSql('ALTER TABLE scolarites3 DROP FOREIGN KEY FK_DC834A68B3E9C81');
        $this->addSql('ALTER TABLE statuts DROP FOREIGN KEY FK_403505E6B3E9C81');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9C8121CE9');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E958819F9E');
        $this->addSql('DROP TABLE cercles');
        $this->addSql('DROP TABLE classes');
        $this->addSql('DROP TABLE communes');
        $this->addSql('DROP TABLE cycles');
        $this->addSql('DROP TABLE departements');
        $this->addSql('DROP TABLE dossier_eleves');
        $this->addSql('DROP TABLE ecole_provenances');
        $this->addSql('DROP TABLE eleves');
        $this->addSql('DROP TABLE enseignements');
        $this->addSql('DROP TABLE etablissements');
        $this->addSql('DROP TABLE lieu_naissances');
        $this->addSql('DROP TABLE meres');
        $this->addSql('DROP TABLE ninas');
        $this->addSql('DROP TABLE niveaux');
        $this->addSql('DROP TABLE noms');
        $this->addSql('DROP TABLE parents');
        $this->addSql('DROP TABLE peres');
        $this->addSql('DROP TABLE prenoms');
        $this->addSql('DROP TABLE professions');
        $this->addSql('DROP TABLE redoublements1');
        $this->addSql('DROP TABLE redoublements2');
        $this->addSql('DROP TABLE redoublements3');
        $this->addSql('DROP TABLE regions');
        $this->addSql('DROP TABLE scolarites1');
        $this->addSql('DROP TABLE scolarites2');
        $this->addSql('DROP TABLE scolarites3');
        $this->addSql('DROP TABLE statuts');
        $this->addSql('DROP TABLE telephones');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE messenger_messages');
    }
}

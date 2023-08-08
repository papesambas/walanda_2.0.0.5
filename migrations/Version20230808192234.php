<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230808192234 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE eleves (id INT AUTO_INCREMENT NOT NULL, nom_id INT NOT NULL, prenom_id INT NOT NULL, lieu_naissance_id INT NOT NULL, classe_id INT NOT NULL, statut_id INT NOT NULL, ecole_an_dernier_id INT DEFAULT NULL, ecole_recrutement_id INT NOT NULL, departement_id INT NOT NULL, scolarite1_id INT DEFAULT NULL, scolarite2_id INT DEFAULT NULL, scolarite3_id INT DEFAULT NULL, redoublement1_id INT DEFAULT NULL, redoublement2_id INT DEFAULT NULL, redoublement3_id INT DEFAULT NULL, mere_id INT NOT NULL, user_id INT DEFAULT NULL, matricule VARCHAR(50) NOT NULL, sexe VARCHAR(8) NOT NULL, statut_finance VARCHAR(8) NOT NULL, date_naissance DATE NOT NULL, date_extrait DATE NOT NULL, num_extrait VARCHAR(30) NOT NULL, is_admis TINYINT(1) NOT NULL, is_actif TINYINT(1) NOT NULL, is_handicap TINYINT(1) NOT NULL, nature_handicap VARCHAR(50) DEFAULT NULL, date_inscription DATE NOT NULL, date_recrutement DATE NOT NULL, fullname VARCHAR(255) NOT NULL, adresse VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, INDEX IDX_383B09B1C8121CE9 (nom_id), INDEX IDX_383B09B158819F9E (prenom_id), INDEX IDX_383B09B138C8067D (lieu_naissance_id), INDEX IDX_383B09B18F5EA509 (classe_id), INDEX IDX_383B09B1F6203804 (statut_id), INDEX IDX_383B09B18D3AF34D (ecole_an_dernier_id), INDEX IDX_383B09B180BDEBFF (ecole_recrutement_id), INDEX IDX_383B09B1CCF9E01E (departement_id), INDEX IDX_383B09B1F4C45000 (scolarite1_id), INDEX IDX_383B09B1E671FFEE (scolarite2_id), INDEX IDX_383B09B15ECD988B (scolarite3_id), INDEX IDX_383B09B16D13ADFD (redoublement1_id), INDEX IDX_383B09B17FA60213 (redoublement2_id), INDEX IDX_383B09B1C71A6576 (redoublement3_id), INDEX IDX_383B09B139DEC40E (mere_id), UNIQUE INDEX UNIQ_383B09B1A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
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
        $this->addSql('ALTER TABLE eleves ADD CONSTRAINT FK_383B09B139DEC40E FOREIGN KEY (mere_id) REFERENCES meres (id)');
        $this->addSql('ALTER TABLE eleves ADD CONSTRAINT FK_383B09B1A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE dossier_eleves ADD eleves_id INT NOT NULL');
        $this->addSql('ALTER TABLE dossier_eleves ADD CONSTRAINT FK_D04A5D98C2140342 FOREIGN KEY (eleves_id) REFERENCES eleves (id)');
        $this->addSql('CREATE INDEX IDX_D04A5D98C2140342 ON dossier_eleves (eleves_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
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
        $this->addSql('ALTER TABLE eleves DROP FOREIGN KEY FK_383B09B139DEC40E');
        $this->addSql('ALTER TABLE eleves DROP FOREIGN KEY FK_383B09B1A76ED395');
        $this->addSql('DROP TABLE eleves');
        $this->addSql('DROP INDEX IDX_D04A5D98C2140342 ON dossier_eleves');
        $this->addSql('ALTER TABLE dossier_eleves DROP eleves_id');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230808180959 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE scolarites1 (id INT AUTO_INCREMENT NOT NULL, niveau_id INT NOT NULL, scolarite INT NOT NULL, INDEX IDX_328D2B44B3E9C81 (niveau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scolarites2 (id INT AUTO_INCREMENT NOT NULL, scolarite1_id INT NOT NULL, niveau_id INT NOT NULL, scolarite INT NOT NULL, INDEX IDX_AB847AFEF4C45000 (scolarite1_id), INDEX IDX_AB847AFEB3E9C81 (niveau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scolarites3 (id INT AUTO_INCREMENT NOT NULL, niveau_id INT NOT NULL, scolarite INT NOT NULL, INDEX IDX_DC834A68B3E9C81 (niveau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE scolarites1 ADD CONSTRAINT FK_328D2B44B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveaux (id)');
        $this->addSql('ALTER TABLE scolarites2 ADD CONSTRAINT FK_AB847AFEF4C45000 FOREIGN KEY (scolarite1_id) REFERENCES scolarites1 (id)');
        $this->addSql('ALTER TABLE scolarites2 ADD CONSTRAINT FK_AB847AFEB3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveaux (id)');
        $this->addSql('ALTER TABLE scolarites3 ADD CONSTRAINT FK_DC834A68B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveaux (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE scolarites1 DROP FOREIGN KEY FK_328D2B44B3E9C81');
        $this->addSql('ALTER TABLE scolarites2 DROP FOREIGN KEY FK_AB847AFEF4C45000');
        $this->addSql('ALTER TABLE scolarites2 DROP FOREIGN KEY FK_AB847AFEB3E9C81');
        $this->addSql('ALTER TABLE scolarites3 DROP FOREIGN KEY FK_DC834A68B3E9C81');
        $this->addSql('DROP TABLE scolarites1');
        $this->addSql('DROP TABLE scolarites2');
        $this->addSql('DROP TABLE scolarites3');
    }
}

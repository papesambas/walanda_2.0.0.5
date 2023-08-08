<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230808182309 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE redoublements3 (id INT AUTO_INCREMENT NOT NULL, niveau_id INT NOT NULL, redoublement2_id INT NOT NULL, scolarite1_id INT DEFAULT NULL, scolarite2_id INT DEFAULT NULL, scolarite3_id INT DEFAULT NULL, INDEX IDX_CB5A8C85B3E9C81 (niveau_id), INDEX IDX_CB5A8C857FA60213 (redoublement2_id), INDEX IDX_CB5A8C85F4C45000 (scolarite1_id), INDEX IDX_CB5A8C85E671FFEE (scolarite2_id), INDEX IDX_CB5A8C855ECD988B (scolarite3_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE redoublements3 ADD CONSTRAINT FK_CB5A8C85B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveaux (id)');
        $this->addSql('ALTER TABLE redoublements3 ADD CONSTRAINT FK_CB5A8C857FA60213 FOREIGN KEY (redoublement2_id) REFERENCES redoublements2 (id)');
        $this->addSql('ALTER TABLE redoublements3 ADD CONSTRAINT FK_CB5A8C85F4C45000 FOREIGN KEY (scolarite1_id) REFERENCES scolarites1 (id)');
        $this->addSql('ALTER TABLE redoublements3 ADD CONSTRAINT FK_CB5A8C85E671FFEE FOREIGN KEY (scolarite2_id) REFERENCES scolarites2 (id)');
        $this->addSql('ALTER TABLE redoublements3 ADD CONSTRAINT FK_CB5A8C855ECD988B FOREIGN KEY (scolarite3_id) REFERENCES scolarites3 (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE redoublements3 DROP FOREIGN KEY FK_CB5A8C85B3E9C81');
        $this->addSql('ALTER TABLE redoublements3 DROP FOREIGN KEY FK_CB5A8C857FA60213');
        $this->addSql('ALTER TABLE redoublements3 DROP FOREIGN KEY FK_CB5A8C85F4C45000');
        $this->addSql('ALTER TABLE redoublements3 DROP FOREIGN KEY FK_CB5A8C85E671FFEE');
        $this->addSql('ALTER TABLE redoublements3 DROP FOREIGN KEY FK_CB5A8C855ECD988B');
        $this->addSql('DROP TABLE redoublements3');
    }
}

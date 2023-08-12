<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230812143512 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE eleves DROP FOREIGN KEY FK_383B09B1B706B6D3');
        $this->addSql('DROP INDEX IDX_383B09B1B706B6D3 ON eleves');
        $this->addSql('ALTER TABLE eleves DROP parents_id');
        $this->addSql('ALTER TABLE parents DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE peres CHANGE telephone_id telephone_id INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE eleves ADD parents_id INT NOT NULL');
        $this->addSql('ALTER TABLE eleves ADD CONSTRAINT FK_383B09B1B706B6D3 FOREIGN KEY (parents_id) REFERENCES parents (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_383B09B1B706B6D3 ON eleves (parents_id)');
        $this->addSql('ALTER TABLE parents ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE peres CHANGE telephone_id telephone_id INT DEFAULT NULL');
    }
}

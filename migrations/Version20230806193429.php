<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230806193429 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users ADD nom_id INT NOT NULL, ADD prenom_id INT NOT NULL, ADD email VARCHAR(255) NOT NULL, ADD telephone VARCHAR(15) DEFAULT NULL, ADD adresse VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9C8121CE9 FOREIGN KEY (nom_id) REFERENCES noms (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E958819F9E FOREIGN KEY (prenom_id) REFERENCES prenoms (id)');
        $this->addSql('CREATE INDEX IDX_1483A5E9C8121CE9 ON users (nom_id)');
        $this->addSql('CREATE INDEX IDX_1483A5E958819F9E ON users (prenom_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9C8121CE9');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E958819F9E');
        $this->addSql('DROP INDEX IDX_1483A5E9C8121CE9 ON users');
        $this->addSql('DROP INDEX IDX_1483A5E958819F9E ON users');
        $this->addSql('ALTER TABLE users DROP nom_id, DROP prenom_id, DROP email, DROP telephone, DROP adresse');
    }
}

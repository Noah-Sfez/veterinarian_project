<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250319155317 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animal ADD pictures_id INT DEFAULT NULL, ADD owner_id INT NOT NULL');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231FBC415685 FOREIGN KEY (pictures_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231F7E3C61F9 FOREIGN KEY (owner_id) REFERENCES client (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6AAB231FBC415685 ON animal (pictures_id)');
        $this->addSql('CREATE INDEX IDX_6AAB231F7E3C61F9 ON animal (owner_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231FBC415685');
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231F7E3C61F9');
        $this->addSql('DROP INDEX UNIQ_6AAB231FBC415685 ON animal');
        $this->addSql('DROP INDEX IDX_6AAB231F7E3C61F9 ON animal');
        $this->addSql('ALTER TABLE animal DROP pictures_id, DROP owner_id');
    }
}

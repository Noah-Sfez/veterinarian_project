<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250319155021 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE appointment (id INT AUTO_INCREMENT NOT NULL, animal_id INT NOT NULL, assistant_id INT NOT NULL, veterinarian_id INT NOT NULL, created_date DATETIME NOT NULL, appointment_date DATETIME NOT NULL, motif LONGTEXT NOT NULL, statut VARCHAR(255) NOT NULL, INDEX IDX_FE38F8448E962C16 (animal_id), INDEX IDX_FE38F844E05387EF (assistant_id), INDEX IDX_FE38F844804C8213 (veterinarian_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE appointment_traitement (appointment_id INT NOT NULL, traitement_id INT NOT NULL, INDEX IDX_537C5FEDE5B533F9 (appointment_id), INDEX IDX_537C5FEDDDA344B6 (traitement_id), PRIMARY KEY(appointment_id, traitement_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE appointment ADD CONSTRAINT FK_FE38F8448E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id)');
        $this->addSql('ALTER TABLE appointment ADD CONSTRAINT FK_FE38F844E05387EF FOREIGN KEY (assistant_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE appointment ADD CONSTRAINT FK_FE38F844804C8213 FOREIGN KEY (veterinarian_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE appointment_traitement ADD CONSTRAINT FK_537C5FEDE5B533F9 FOREIGN KEY (appointment_id) REFERENCES appointment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE appointment_traitement ADD CONSTRAINT FK_537C5FEDDDA344B6 FOREIGN KEY (traitement_id) REFERENCES traitement (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE appointment DROP FOREIGN KEY FK_FE38F8448E962C16');
        $this->addSql('ALTER TABLE appointment DROP FOREIGN KEY FK_FE38F844E05387EF');
        $this->addSql('ALTER TABLE appointment DROP FOREIGN KEY FK_FE38F844804C8213');
        $this->addSql('ALTER TABLE appointment_traitement DROP FOREIGN KEY FK_537C5FEDE5B533F9');
        $this->addSql('ALTER TABLE appointment_traitement DROP FOREIGN KEY FK_537C5FEDDDA344B6');
        $this->addSql('DROP TABLE appointment');
        $this->addSql('DROP TABLE appointment_traitement');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200301132928 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE piece_specifique (id INT AUTO_INCREMENT NOT NULL, piece_generale_id INT DEFAULT NULL, code VARCHAR(255) NOT NULL, designation VARCHAR(255) NOT NULL, marque VARCHAR(255) NOT NULL, INDEX IDX_6DEDB4F2A6B965F9 (piece_generale_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE piece_specifique ADD CONSTRAINT FK_6DEDB4F2A6B965F9 FOREIGN KEY (piece_generale_id) REFERENCES piece_generale (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE piece_specifique');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200301130311 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE piece_specifique (id INT AUTO_INCREMENT NOT NULL, relation_id INT DEFAULT NULL, code VARCHAR(255) NOT NULL, designation VARCHAR(255) NOT NULL, marque VARCHAR(255) NOT NULL, INDEX IDX_6DEDB4F23256915B (relation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE piece_specifique ADD CONSTRAINT FK_6DEDB4F23256915B FOREIGN KEY (relation_id) REFERENCES piece_generale (id)');
        $this->addSql('DROP TABLE mytab2');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE mytab2 (id INT AUTO_INCREMENT NOT NULL, Code VARCHAR(7) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, Désignation VARCHAR(19) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, LectureCoursemmNm VARCHAR(8) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, Section VARCHAR(17) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, Poste_de_travail VARCHAR(60) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, Fréquence_de_calibragejours INT NOT NULL, Date_du_dernier_calibrage DATE NOT NULL, Remarques VARCHAR(16) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, Prochain_calibrage_dateanneee DATE DEFAULT NULL, Date_du_1er_calibrage DATE DEFAULT NULL, Type VARCHAR(11) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, Marque VARCHAR(13) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, Date_mise_en_service VARCHAR(12) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, N_Serie VARCHAR(11) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, piece_generale_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE piece_specifique');
    }
}

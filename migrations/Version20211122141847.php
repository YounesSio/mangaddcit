<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211122141847 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, type_article_id_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, author VARCHAR(255) DEFAULT NULL, description VARCHAR(900) DEFAULT NULL, picture VARCHAR(500) DEFAULT NULL, edition VARCHAR(255) DEFAULT NULL, date DATE DEFAULT NULL, quantity INT DEFAULT NULL, matter VARCHAR(255) DEFAULT NULL, size VARCHAR(255) DEFAULT NULL, collection VARCHAR(255) DEFAULT NULL, figure VARCHAR(255) DEFAULT NULL, INDEX IDX_23A0E66781E5B73 (type_article_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66781E5B73 FOREIGN KEY (type_article_id_id) REFERENCES type_article (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE article');
    }
}

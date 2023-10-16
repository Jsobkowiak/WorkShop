<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231003080024 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE alerte (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_3AE753AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE alerte ADD CONSTRAINT FK_3AE753AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE poubelle ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE poubelle ADD CONSTRAINT FK_B5344EA3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_B5344EA3A76ED395 ON poubelle (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alerte DROP FOREIGN KEY FK_3AE753AA76ED395');
        $this->addSql('DROP TABLE alerte');
        $this->addSql('ALTER TABLE poubelle DROP FOREIGN KEY FK_B5344EA3A76ED395');
        $this->addSql('DROP INDEX IDX_B5344EA3A76ED395 ON poubelle');
        $this->addSql('ALTER TABLE poubelle DROP user_id');
    }
}

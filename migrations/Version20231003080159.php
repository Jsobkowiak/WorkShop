<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231003080159 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alerte ADD poubelle_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE alerte ADD CONSTRAINT FK_3AE753AF231B082 FOREIGN KEY (poubelle_id) REFERENCES poubelle (id)');
        $this->addSql('CREATE INDEX IDX_3AE753AF231B082 ON alerte (poubelle_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alerte DROP FOREIGN KEY FK_3AE753AF231B082');
        $this->addSql('DROP INDEX IDX_3AE753AF231B082 ON alerte');
        $this->addSql('ALTER TABLE alerte DROP poubelle_id');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220602135016 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD service_id INT NOT NULL, ADD poste_id INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649A0905086 FOREIGN KEY (poste_id) REFERENCES poste (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649ED5CA9E6 ON user (service_id)');
        $this->addSql('CREATE INDEX IDX_8D93D649A0905086 ON user (poste_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649ED5CA9E6');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649A0905086');
        $this->addSql('DROP INDEX IDX_8D93D649ED5CA9E6 ON user');
        $this->addSql('DROP INDEX IDX_8D93D649A0905086 ON user');
        $this->addSql('ALTER TABLE user DROP service_id, DROP poste_id');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210608123540 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE destination ADD author_id INT DEFAULT NULL, ADD destination VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE destination ADD CONSTRAINT FK_3EC63EAAF675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_3EC63EAAF675F31B ON destination (author_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE destination DROP FOREIGN KEY FK_3EC63EAAF675F31B');
        $this->addSql('DROP INDEX IDX_3EC63EAAF675F31B ON destination');
        $this->addSql('ALTER TABLE destination DROP author_id, DROP destination');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210927211531 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE outing ADD user_id_id INT DEFAULT NULL, DROP user');
        $this->addSql('ALTER TABLE outing ADD CONSTRAINT FK_F2A106259D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_F2A106259D86650F ON outing (user_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE outing DROP FOREIGN KEY FK_F2A106259D86650F');
        $this->addSql('DROP INDEX IDX_F2A106259D86650F ON outing');
        $this->addSql('ALTER TABLE outing ADD user INT NOT NULL, DROP user_id_id');
    }
}

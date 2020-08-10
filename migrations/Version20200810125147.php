<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200810125147 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dialogue ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE dialogue ADD CONSTRAINT FK_F18A1C39A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_F18A1C39A76ED395 ON dialogue (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dialogue DROP FOREIGN KEY FK_F18A1C39A76ED395');
        $this->addSql('DROP INDEX IDX_F18A1C39A76ED395 ON dialogue');
        $this->addSql('ALTER TABLE dialogue DROP user_id');
    }
}

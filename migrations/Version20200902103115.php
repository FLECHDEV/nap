<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200902103115 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE subscriber_groupe (subscriber_id INT NOT NULL, groupe_id INT NOT NULL, INDEX IDX_3AEC5B787808B1AD (subscriber_id), INDEX IDX_3AEC5B787A45358C (groupe_id), PRIMARY KEY(subscriber_id, groupe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE subscriber_groupe ADD CONSTRAINT FK_3AEC5B787808B1AD FOREIGN KEY (subscriber_id) REFERENCES subscriber (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE subscriber_groupe ADD CONSTRAINT FK_3AEC5B787A45358C FOREIGN KEY (groupe_id) REFERENCES groupe (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE subscriber_groupe');
    }
}

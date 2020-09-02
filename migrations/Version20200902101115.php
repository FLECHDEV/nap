<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200902101115 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE concert DROP FOREIGN KEY FK_D57C02D2EEB444CD');
        $this->addSql('DROP INDEX IDX_D57C02D2EEB444CD ON concert');
        $this->addSql('ALTER TABLE concert DROP band, CHANGE nom_groupe_id band_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE concert ADD CONSTRAINT FK_D57C02D249ABEB17 FOREIGN KEY (band_id) REFERENCES groupe (id)');
        $this->addSql('CREATE INDEX IDX_D57C02D249ABEB17 ON concert (band_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE concert DROP FOREIGN KEY FK_D57C02D249ABEB17');
        $this->addSql('DROP INDEX IDX_D57C02D249ABEB17 ON concert');
        $this->addSql('ALTER TABLE concert ADD band LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE band_id nom_groupe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE concert ADD CONSTRAINT FK_D57C02D2EEB444CD FOREIGN KEY (nom_groupe_id) REFERENCES groupe (id)');
        $this->addSql('CREATE INDEX IDX_D57C02D2EEB444CD ON concert (nom_groupe_id)');
    }
}

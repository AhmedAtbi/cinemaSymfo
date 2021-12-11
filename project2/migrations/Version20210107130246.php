<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210107130246 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849556C6E55B5');
        $this->addSql('DROP INDEX IDX_42C849556C6E55B5 ON reservation');
        $this->addSql('ALTER TABLE reservation DROP nom');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955BF396750 FOREIGN KEY (id) REFERENCES annonces (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955BF396750');
        $this->addSql('ALTER TABLE reservation ADD nom INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849556C6E55B5 FOREIGN KEY (nom) REFERENCES annonces (id)');
        $this->addSql('CREATE INDEX IDX_42C849556C6E55B5 ON reservation (nom)');
    }
}

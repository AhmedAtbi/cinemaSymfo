<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210107130319 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955BF396750');
        $this->addSql('ALTER TABLE reservation ADD id_annonce INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495528C83A95 FOREIGN KEY (id_annonce) REFERENCES annonces (id)');
        $this->addSql('CREATE INDEX IDX_42C8495528C83A95 ON reservation (id_annonce)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495528C83A95');
        $this->addSql('DROP INDEX IDX_42C8495528C83A95 ON reservation');
        $this->addSql('ALTER TABLE reservation DROP id_annonce');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955BF396750 FOREIGN KEY (id) REFERENCES annonces (id)');
    }
}

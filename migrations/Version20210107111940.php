<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210107111940 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, nom_id INT DEFAULT NULL, client_id INT DEFAULT NULL, INDEX IDX_42C84955C8121CE9 (nom_id), INDEX IDX_42C8495519EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955C8121CE9 FOREIGN KEY (nom_id) REFERENCES annonces (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495519EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE reservations DROP FOREIGN KEY FK_4DA239567F5183');
        $this->addSql('DROP INDEX IDX_4DA239567F5183 ON reservations');
        $this->addSql('ALTER TABLE reservations CHANGE film_id nom_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA239C8121CE9 FOREIGN KEY (nom_id) REFERENCES annonces (id)');
        $this->addSql('CREATE INDEX IDX_4DA239C8121CE9 ON reservations (nom_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE reservation');
        $this->addSql('ALTER TABLE reservations DROP FOREIGN KEY FK_4DA239C8121CE9');
        $this->addSql('DROP INDEX IDX_4DA239C8121CE9 ON reservations');
        $this->addSql('ALTER TABLE reservations CHANGE nom_id film_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA239567F5183 FOREIGN KEY (film_id) REFERENCES annonces (id)');
        $this->addSql('CREATE INDEX IDX_4DA239567F5183 ON reservations (film_id)');
    }
}

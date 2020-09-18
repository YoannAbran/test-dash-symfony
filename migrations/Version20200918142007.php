<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200918142007 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lieux_achat CHANGE id_livre id_livre INT NOT NULL, CHANGE ecommerce ecommerce LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE livres ADD updated_at DATETIME NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lieux_achat CHANGE ecommerce ecommerce TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE id_livre id_livre INT DEFAULT NULL');
        $this->addSql('ALTER TABLE livres DROP updated_at');
    }
}

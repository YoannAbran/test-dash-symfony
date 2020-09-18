<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200918141058 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lieux_achat DROP FOREIGN KEY lieux_achat_ibfk_1');
        $this->addSql('ALTER TABLE lieux_achat CHANGE id_livre id_livre INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lieux_achat ADD CONSTRAINT FK_2C2B969342E60EA9 FOREIGN KEY (id_livre) REFERENCES livres (id)');
        $this->addSql('ALTER TABLE livres ADD updated_at DATETIME NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lieux_achat DROP FOREIGN KEY FK_2C2B969342E60EA9');
        $this->addSql('ALTER TABLE lieux_achat CHANGE id_livre id_livre INT NOT NULL');
        $this->addSql('ALTER TABLE lieux_achat ADD CONSTRAINT lieux_achat_ibfk_1 FOREIGN KEY (id_livre) REFERENCES livres (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livres DROP updated_at');
    }
}

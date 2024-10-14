<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241014083154 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entrepot ADD les_casiers_id INT DEFAULT NULL, ADD les_colis_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE entrepot ADD CONSTRAINT FK_D805175AAA45FFAF FOREIGN KEY (les_casiers_id) REFERENCES casier (id)');
        $this->addSql('ALTER TABLE entrepot ADD CONSTRAINT FK_D805175AEF9F3FB9 FOREIGN KEY (les_colis_id) REFERENCES colis (id)');
        $this->addSql('CREATE INDEX IDX_D805175AAA45FFAF ON entrepot (les_casiers_id)');
        $this->addSql('CREATE INDEX IDX_D805175AEF9F3FB9 ON entrepot (les_colis_id)');
        $this->addSql('ALTER TABLE ville ADD les_entrepots_id INT DEFAULT NULL, ADD les_colis_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ville ADD CONSTRAINT FK_43C3D9C34928641B FOREIGN KEY (les_entrepots_id) REFERENCES entrepot (id)');
        $this->addSql('ALTER TABLE ville ADD CONSTRAINT FK_43C3D9C3EF9F3FB9 FOREIGN KEY (les_colis_id) REFERENCES colis (id)');
        $this->addSql('CREATE INDEX IDX_43C3D9C34928641B ON ville (les_entrepots_id)');
        $this->addSql('CREATE INDEX IDX_43C3D9C3EF9F3FB9 ON ville (les_colis_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entrepot DROP FOREIGN KEY FK_D805175AAA45FFAF');
        $this->addSql('ALTER TABLE entrepot DROP FOREIGN KEY FK_D805175AEF9F3FB9');
        $this->addSql('DROP INDEX IDX_D805175AAA45FFAF ON entrepot');
        $this->addSql('DROP INDEX IDX_D805175AEF9F3FB9 ON entrepot');
        $this->addSql('ALTER TABLE entrepot DROP les_casiers_id, DROP les_colis_id');
        $this->addSql('ALTER TABLE ville DROP FOREIGN KEY FK_43C3D9C34928641B');
        $this->addSql('ALTER TABLE ville DROP FOREIGN KEY FK_43C3D9C3EF9F3FB9');
        $this->addSql('DROP INDEX IDX_43C3D9C34928641B ON ville');
        $this->addSql('DROP INDEX IDX_43C3D9C3EF9F3FB9 ON ville');
        $this->addSql('ALTER TABLE ville DROP les_entrepots_id, DROP les_colis_id');
    }
}

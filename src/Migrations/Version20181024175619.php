<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181024175619 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE adresse (id INT AUTO_INCREMENT NOT NULL, relation_id INT NOT NULL, arrondissement VARCHAR(255) NOT NULL, type_voie VARCHAR(255) NOT NULL, libelle_voie VARCHAR(255) NOT NULL, numero SMALLINT NOT NULL, UNIQUE INDEX UNIQ_C35F08163256915B (relation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE artist (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, surnom VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE collection_street (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE geo_loc (id INT AUTO_INCREMENT NOT NULL, relation_id INT NOT NULL, x DOUBLE PRECISION NOT NULL, y DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_745BB95A3256915B (relation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oeuvre (id INT AUTO_INCREMENT NOT NULL, collection_street_id INT NOT NULL, artist_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_35FE2EFE2E544889 (collection_street_id), INDEX IDX_35FE2EFEB7970CF8 (artist_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adresse ADD CONSTRAINT FK_C35F08163256915B FOREIGN KEY (relation_id) REFERENCES oeuvre (id)');
        $this->addSql('ALTER TABLE geo_loc ADD CONSTRAINT FK_745BB95A3256915B FOREIGN KEY (relation_id) REFERENCES oeuvre (id)');
        $this->addSql('ALTER TABLE oeuvre ADD CONSTRAINT FK_35FE2EFE2E544889 FOREIGN KEY (collection_street_id) REFERENCES collection_street (id)');
        $this->addSql('ALTER TABLE oeuvre ADD CONSTRAINT FK_35FE2EFEB7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE oeuvre DROP FOREIGN KEY FK_35FE2EFEB7970CF8');
        $this->addSql('ALTER TABLE oeuvre DROP FOREIGN KEY FK_35FE2EFE2E544889');
        $this->addSql('ALTER TABLE adresse DROP FOREIGN KEY FK_C35F08163256915B');
        $this->addSql('ALTER TABLE geo_loc DROP FOREIGN KEY FK_745BB95A3256915B');
        $this->addSql('DROP TABLE adresse');
        $this->addSql('DROP TABLE artist');
        $this->addSql('DROP TABLE collection_street');
        $this->addSql('DROP TABLE geo_loc');
        $this->addSql('DROP TABLE oeuvre');
    }
}

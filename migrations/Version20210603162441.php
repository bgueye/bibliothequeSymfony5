<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210603162441 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE auteur (id INT AUTO_INCREMENT NOT NULL, nom_auteur VARCHAR(255) NOT NULL, prenom_auteur VARCHAR(255) DEFAULT NULL, nationalite VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE auteur_ouvrage (auteur_id INT NOT NULL, ouvrage_id INT NOT NULL, INDEX IDX_EC8A08BD60BB6FE6 (auteur_id), INDEX IDX_EC8A08BD15D884B5 (ouvrage_id), PRIMARY KEY(auteur_id, ouvrage_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE editeur (id INT AUTO_INCREMENT NOT NULL, nom_editeur VARCHAR(255) NOT NULL, adresse_editeur LONGTEXT DEFAULT NULL, tel_editeur VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre (id INT AUTO_INCREMENT NOT NULL, nom_genre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ouvrage (id INT AUTO_INCREMENT NOT NULL, genre_id INT DEFAULT NULL, editeur_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, edited_at DATETIME NOT NULL, resume LONGTEXT DEFAULT NULL, disponible TINYINT(1) NOT NULL, INDEX IDX_52A8CBD84296D31F (genre_id), INDEX IDX_52A8CBD83375BD21 (editeur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE theme (id INT AUTO_INCREMENT NOT NULL, nom_theme VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE theme_ouvrage (theme_id INT NOT NULL, ouvrage_id INT NOT NULL, INDEX IDX_BCBCEFB59027487 (theme_id), INDEX IDX_BCBCEFB15D884B5 (ouvrage_id), PRIMARY KEY(theme_id, ouvrage_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE auteur_ouvrage ADD CONSTRAINT FK_EC8A08BD60BB6FE6 FOREIGN KEY (auteur_id) REFERENCES auteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE auteur_ouvrage ADD CONSTRAINT FK_EC8A08BD15D884B5 FOREIGN KEY (ouvrage_id) REFERENCES ouvrage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ouvrage ADD CONSTRAINT FK_52A8CBD84296D31F FOREIGN KEY (genre_id) REFERENCES genre (id)');
        $this->addSql('ALTER TABLE ouvrage ADD CONSTRAINT FK_52A8CBD83375BD21 FOREIGN KEY (editeur_id) REFERENCES editeur (id)');
        $this->addSql('ALTER TABLE theme_ouvrage ADD CONSTRAINT FK_BCBCEFB59027487 FOREIGN KEY (theme_id) REFERENCES theme (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE theme_ouvrage ADD CONSTRAINT FK_BCBCEFB15D884B5 FOREIGN KEY (ouvrage_id) REFERENCES ouvrage (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE auteur_ouvrage DROP FOREIGN KEY FK_EC8A08BD60BB6FE6');
        $this->addSql('ALTER TABLE ouvrage DROP FOREIGN KEY FK_52A8CBD83375BD21');
        $this->addSql('ALTER TABLE ouvrage DROP FOREIGN KEY FK_52A8CBD84296D31F');
        $this->addSql('ALTER TABLE auteur_ouvrage DROP FOREIGN KEY FK_EC8A08BD15D884B5');
        $this->addSql('ALTER TABLE theme_ouvrage DROP FOREIGN KEY FK_BCBCEFB15D884B5');
        $this->addSql('ALTER TABLE theme_ouvrage DROP FOREIGN KEY FK_BCBCEFB59027487');
        $this->addSql('DROP TABLE auteur');
        $this->addSql('DROP TABLE auteur_ouvrage');
        $this->addSql('DROP TABLE editeur');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE ouvrage');
        $this->addSql('DROP TABLE theme');
        $this->addSql('DROP TABLE theme_ouvrage');
    }
}

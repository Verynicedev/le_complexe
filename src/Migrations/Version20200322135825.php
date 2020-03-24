<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200322135825 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE category_virtual (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag_virtual (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `virtual` (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_30B83DB712469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE virtual_tag_virtual (virtual_id INT NOT NULL, tag_virtual_id INT NOT NULL, INDEX IDX_CAC1F8C9025E95 (virtual_id), INDEX IDX_CAC1F8CAC19DCC4 (tag_virtual_id), PRIMARY KEY(virtual_id, tag_virtual_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `virtual` ADD CONSTRAINT FK_30B83DB712469DE2 FOREIGN KEY (category_id) REFERENCES category_virtual (id)');
        $this->addSql('ALTER TABLE virtual_tag_virtual ADD CONSTRAINT FK_CAC1F8C9025E95 FOREIGN KEY (virtual_id) REFERENCES `virtual` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE virtual_tag_virtual ADD CONSTRAINT FK_CAC1F8CAC19DCC4 FOREIGN KEY (tag_virtual_id) REFERENCES tag_virtual (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE `virtual` DROP FOREIGN KEY FK_30B83DB712469DE2');
        $this->addSql('ALTER TABLE virtual_tag_virtual DROP FOREIGN KEY FK_CAC1F8CAC19DCC4');
        $this->addSql('ALTER TABLE virtual_tag_virtual DROP FOREIGN KEY FK_CAC1F8C9025E95');
        $this->addSql('DROP TABLE category_virtual');
        $this->addSql('DROP TABLE tag_virtual');
        $this->addSql('DROP TABLE `virtual`');
        $this->addSql('DROP TABLE virtual_tag_virtual');
    }
}
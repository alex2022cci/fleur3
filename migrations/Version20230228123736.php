<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230228123736 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, token VARCHAR(100) NOT NULL, status SMALLINT NOT NULL, sub_total DOUBLE PRECISION NOT NULL, item_discount DOUBLE PRECISION NOT NULL, tax DOUBLE PRECISION NOT NULL, shipping DOUBLE PRECISION NOT NULL, total DOUBLE PRECISION NOT NULL, promo VARCHAR(50) DEFAULT NULL, discount DOUBLE PRECISION NOT NULL, grand_total DOUBLE PRECISION NOT NULL, first_name VARCHAR(50) NOT NULL, middle_name VARCHAR(50) NOT NULL, last_name VARCHAR(50) NOT NULL, mobile VARCHAR(15) NOT NULL, email VARCHAR(50) NOT NULL, line1 VARCHAR(50) NOT NULL, line2 VARCHAR(50) NOT NULL, city VARCHAR(50) NOT NULL, province VARCHAR(50) NOT NULL, country VARCHAR(50) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', content LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE `order`');
    }
}

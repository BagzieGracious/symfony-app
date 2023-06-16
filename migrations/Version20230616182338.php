<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230616182338 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE invoice (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, invoice_date DATETIME NOT NULL, invoice_number INTEGER NOT NULL, customer_id INTEGER NOT NULL)');
        $this->addSql('CREATE TABLE invoice_line (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, invoice_id_id INTEGER NOT NULL, description CLOB NOT NULL, quantity INTEGER NOT NULL, amount NUMERIC(10, 2) NOT NULL, vat_amount NUMERIC(10, 2) NOT NULL, total_with_vat NUMERIC(10, 2) NOT NULL, CONSTRAINT FK_D3D1D693429ECEE2 FOREIGN KEY (invoice_id_id) REFERENCES invoice (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_D3D1D693429ECEE2 ON invoice_line (invoice_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE invoice');
        $this->addSql('DROP TABLE invoice_line');
    }
}

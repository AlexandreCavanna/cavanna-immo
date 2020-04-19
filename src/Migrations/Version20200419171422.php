<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200419171422 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE lodger ADD housing_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lodger ADD CONSTRAINT FK_8ACBBC1DAD5873E3 FOREIGN KEY (housing_id) REFERENCES housing (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8ACBBC1DAD5873E3 ON lodger (housing_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE lodger DROP FOREIGN KEY FK_8ACBBC1DAD5873E3');
        $this->addSql('DROP INDEX UNIQ_8ACBBC1DAD5873E3 ON lodger');
        $this->addSql('ALTER TABLE lodger DROP housing_id');
    }
}

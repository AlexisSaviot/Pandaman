<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210422072753 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_mangas (user_id INT NOT NULL, mangas_id INT NOT NULL, INDEX IDX_E723DF12A76ED395 (user_id), INDEX IDX_E723DF12DDC4978F (mangas_id), PRIMARY KEY(user_id, mangas_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_mangas ADD CONSTRAINT FK_E723DF12A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_mangas ADD CONSTRAINT FK_E723DF12DDC4978F FOREIGN KEY (mangas_id) REFERENCES mangas (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user_mangas');
    }
}

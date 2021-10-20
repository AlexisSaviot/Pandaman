<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210420145152 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mangas (id INT AUTO_INCREMENT NOT NULL, editor_id_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, volumes INT NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_8271C42F9D1625D3 (editor_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mangas_author (mangas_id INT NOT NULL, author_id INT NOT NULL, INDEX IDX_74F29D53DDC4978F (mangas_id), INDEX IDX_74F29D53F675F31B (author_id), PRIMARY KEY(mangas_id, author_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mangas_categories (mangas_id INT NOT NULL, categories_id INT NOT NULL, INDEX IDX_CB4E36EBDDC4978F (mangas_id), INDEX IDX_CB4E36EBA21214B7 (categories_id), PRIMARY KEY(mangas_id, categories_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mangas_themes (mangas_id INT NOT NULL, themes_id INT NOT NULL, INDEX IDX_DC1F7745DDC4978F (mangas_id), INDEX IDX_DC1F774594F4A9D2 (themes_id), PRIMARY KEY(mangas_id, themes_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mangas ADD CONSTRAINT FK_8271C42F9D1625D3 FOREIGN KEY (editor_id_id) REFERENCES editors (id)');
        $this->addSql('ALTER TABLE mangas_author ADD CONSTRAINT FK_74F29D53DDC4978F FOREIGN KEY (mangas_id) REFERENCES mangas (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mangas_author ADD CONSTRAINT FK_74F29D53F675F31B FOREIGN KEY (author_id) REFERENCES author (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mangas_categories ADD CONSTRAINT FK_CB4E36EBDDC4978F FOREIGN KEY (mangas_id) REFERENCES mangas (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mangas_categories ADD CONSTRAINT FK_CB4E36EBA21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mangas_themes ADD CONSTRAINT FK_DC1F7745DDC4978F FOREIGN KEY (mangas_id) REFERENCES mangas (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mangas_themes ADD CONSTRAINT FK_DC1F774594F4A9D2 FOREIGN KEY (themes_id) REFERENCES themes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE author ADD image VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE editors ADD image VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mangas_author DROP FOREIGN KEY FK_74F29D53DDC4978F');
        $this->addSql('ALTER TABLE mangas_categories DROP FOREIGN KEY FK_CB4E36EBDDC4978F');
        $this->addSql('ALTER TABLE mangas_themes DROP FOREIGN KEY FK_DC1F7745DDC4978F');
        $this->addSql('DROP TABLE mangas');
        $this->addSql('DROP TABLE mangas_author');
        $this->addSql('DROP TABLE mangas_categories');
        $this->addSql('DROP TABLE mangas_themes');
        $this->addSql('ALTER TABLE author DROP image');
        $this->addSql('ALTER TABLE editors DROP image');
    }
}

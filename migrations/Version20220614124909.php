<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220614124909 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bestelling ADD klant_id INT NOT NULL');
        $this->addSql('ALTER TABLE bestelling ADD CONSTRAINT FK_3114F83C427B2F FOREIGN KEY (klant_id) REFERENCES klant (id)');
        $this->addSql('CREATE INDEX IDX_3114F83C427B2F ON bestelling (klant_id)');
        $this->addSql('ALTER TABLE bestelregel ADD bestelling_id INT NOT NULL, ADD pizza_id INT NOT NULL');
        $this->addSql('ALTER TABLE bestelregel ADD CONSTRAINT FK_8D814692A2E63037 FOREIGN KEY (bestelling_id) REFERENCES bestelling (id)');
        $this->addSql('ALTER TABLE bestelregel ADD CONSTRAINT FK_8D814692D41D1D42 FOREIGN KEY (pizza_id) REFERENCES pizza (id)');
        $this->addSql('CREATE INDEX IDX_8D814692A2E63037 ON bestelregel (bestelling_id)');
        $this->addSql('CREATE INDEX IDX_8D814692D41D1D42 ON bestelregel (pizza_id)');
        $this->addSql('ALTER TABLE pizza ADD category_id INT NOT NULL');
        $this->addSql('ALTER TABLE pizza ADD CONSTRAINT FK_CFDD826F12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_CFDD826F12469DE2 ON pizza (category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bestelling DROP FOREIGN KEY FK_3114F83C427B2F');
        $this->addSql('DROP INDEX IDX_3114F83C427B2F ON bestelling');
        $this->addSql('ALTER TABLE bestelling DROP klant_id');
        $this->addSql('ALTER TABLE bestelregel DROP FOREIGN KEY FK_8D814692A2E63037');
        $this->addSql('ALTER TABLE bestelregel DROP FOREIGN KEY FK_8D814692D41D1D42');
        $this->addSql('DROP INDEX IDX_8D814692A2E63037 ON bestelregel');
        $this->addSql('DROP INDEX IDX_8D814692D41D1D42 ON bestelregel');
        $this->addSql('ALTER TABLE bestelregel DROP bestelling_id, DROP pizza_id');
        $this->addSql('ALTER TABLE pizza DROP FOREIGN KEY FK_CFDD826F12469DE2');
        $this->addSql('DROP INDEX IDX_CFDD826F12469DE2 ON pizza');
        $this->addSql('ALTER TABLE pizza DROP category_id');
    }
}

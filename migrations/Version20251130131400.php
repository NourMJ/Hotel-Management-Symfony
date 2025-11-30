<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251130131400 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, check_in_at DATETIME NOT NULL, check_out_at DATETIME NOT NULL, total_price DOUBLE PRECISION NOT NULL, status VARCHAR(20) NOT NULL, number_of_guests INT NOT NULL, special_requests LONGTEXT DEFAULT NULL, client_id INT NOT NULL, room_id INT NOT NULL, INDEX IDX_42C8495519EB6921 (client_id), INDEX IDX_42C8495554177093 (room_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE review (id INT AUTO_INCREMENT NOT NULL, rating INT NOT NULL, comment LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, client_id INT NOT NULL, room_id INT NOT NULL, INDEX IDX_794381C619EB6921 (client_id), INDEX IDX_794381C654177093 (room_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495519EB6921 FOREIGN KEY (client_id) REFERENCES app_user (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495554177093 FOREIGN KEY (room_id) REFERENCES room (id)');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C619EB6921 FOREIGN KEY (client_id) REFERENCES app_user (id)');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C654177093 FOREIGN KEY (room_id) REFERENCES room (id)');
        $this->addSql('ALTER TABLE room ADD title VARCHAR(150) NOT NULL, ADD amenities JSON DEFAULT NULL, DROP name, DROP is_active, DROP created_at, DROP updated_at, CHANGE description description LONGTEXT DEFAULT NULL, CHANGE price_per_night price_per_night DOUBLE PRECISION NOT NULL, CHANGE floor floor VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE room_category DROP created_at');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495519EB6921');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495554177093');
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY FK_794381C619EB6921');
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY FK_794381C654177093');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE review');
        $this->addSql('ALTER TABLE room ADD name VARCHAR(255) NOT NULL, ADD is_active TINYINT NOT NULL, ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL, DROP title, DROP amenities, CHANGE description description LONGTEXT NOT NULL, CHANGE price_per_night price_per_night NUMERIC(10, 0) NOT NULL, CHANGE floor floor INT NOT NULL');
        $this->addSql('ALTER TABLE room_category ADD created_at DATETIME NOT NULL');
    }
}

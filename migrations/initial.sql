-- create database
CREATE DATABASE bunnoon CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

-- create genres table
CREATE TABLE `bunnoon`.`genres` (`id` INT NOT NULL AUTO_INCREMENT , `enName` VARCHAR(50) NOT NULL , `thName` VARCHAR(50) NOT NULL , `title` VARCHAR(50) NOT NULL , PRIMARY KEY (`id`), UNIQUE (`title`)) ENGINE = InnoDB;

-- initial genre records
INSERT INTO `bunnoon`.`genres` (enName, thName, title)
VALUES
    ('Action', 'ต่อสู้', 'action'),
    ('Adventure', 'ผจญภัย', 'adventure'),
    ('Comedy', 'บันเทิง', 'comedy'),
    ('Drama', 'ดราม่า', 'drama'),
    ('Slice of Life', 'ชีวิตประจำวัน', 'slice+of+life'),
    ('Fantasy', 'แฟนตาซี', 'fantasy'),
    ('Magic', 'เวทมนต์', 'magic'),
    ('Supernatural', 'เหนือธรรมชาติ', 'supernatural'),
    ('Horror', 'สยองขวัญ', 'horror'),
    ('Mystery', 'ลี้ลับ', 'mystery'),
    ('Psychological', 'จิตวิทยา', 'psychological'),
    ('Romance', 'ความรัก', 'romance'),
    ('Sci-Fi', 'ก้าวข้ามวิทยาศาต์', 'sci-fi');
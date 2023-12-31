-- create database
CREATE DATABASE bunnoon CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

-- create users table
CREATE TABLE `bunnoon`.`users` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `createdAt` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updatedAt` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP DEFAULT NULL,
    `deletedAt` TIMESTAMP DEFAULT NULL,
    `email` VARCHAR( 100 ) NOT NULL,
    `username` VARCHAR( 24 ) NOT NULL,
    `password` VARCHAR( 128 ) NOT NULL,
    `name` VARCHAR ( 50 ) NOT NULL,
    PRIMARY KEY ( `id` ),
    UNIQUE ( `email` ),
    UNIQUE ( `username` )
) ENGINE = InnoDB;

-- create sessions table
CREATE TABLE `bunnoon`.`sessions` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `createdAt` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `deletedAt` TIMESTAMP DEFAULT NULL,
    `token` VARCHAR ( 25 ) NOT NULL,
    `userId` INT NOT NULL,
    PRIMARY KEY ( `id` ),
    UNIQUE ( `token` )
) ENGINE = InnoDB;

-- create foreign key - sessions to user (ManyToOne)
ALTER TABLE `bunnoon`.`sessions` ADD CONSTRAINT `SessionsToUser`
FOREIGN KEY ( `userId` ) REFERENCES `users` ( `id` )
ON DELETE CASCADE
ON UPDATE NO ACTION;

-- create genres table
CREATE TABLE `bunnoon`.`genres` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `enName` VARCHAR( 50 ) NOT NULL,
    `thName` VARCHAR( 50 ) NOT NULL,
    `title` VARCHAR( 50 ) NOT NULL,
    PRIMARY KEY ( `id` ),
    UNIQUE ( `title` )
) ENGINE = InnoDB;

-- create animes table
CREATE TABLE `bunnoon`.`animes` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `enName` VARCHAR( 50 ) NOT NULL,
    `thName` VARCHAR( 50 ) NOT NULL,
    `title` VARCHAR( 50 ) NOT NULL,
    `season` INT NOT NULL,
    `genreId` INT,
    PRIMARY KEY ( `id` ),
    UNIQUE ( `title` )
) ENGINE = InnoDB;

-- create foreign key - genre to animes (OneToMany)
ALTER TABLE `bunnoon`.`animes` ADD CONSTRAINT `GenreToAnimes`
FOREIGN KEY ( `genreId` ) REFERENCES `genres` ( `id` )
ON DELETE SET NULL
ON UPDATE NO ACTION;

-- create anime_episodes table
CREATE TABLE `bunnoon`.`anime_episodes` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `episode` INT NOT NULL,
    `sound` ENUM ( 'JP', 'TH', 'ALL' ) NOT NULL,
    `subtitle` ENUM ( 'EN', 'TH', 'ALL' ),
    `source` VARCHAR( 36 ) NOT NULL,
    `animeId` INT NOT NULL,
    PRIMARY KEY ( `id` ),
    UNIQUE ( `source` )
) ENGINE = InnoDB;

-- create foreign key - episodes to anime (ManyToOne)
ALTER TABLE `bunnoon`.`anime_episodes` ADD CONSTRAINT `AnimeEpisodesToAnime`
FOREIGN KEY ( `animeId` ) REFERENCES `bunnoon`.`animes` ( `id` )
ON DELETE CASCADE
ON UPDATE NO ACTION;

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
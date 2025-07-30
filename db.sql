/*
* Create users TABLE
*/

CREATE TABLE
  `users` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(255) DEFAULT NULL,
    `username` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `password` text NOT NULL,
    `role` varchar(255) DEFAULT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`),
    UNIQUE KEY `EMAIL` (`email`),
    UNIQUE KEY `USERNAME` (`username`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_bin

/*
* Create security_questions TABLE
*/
CREATE TABLE
  `security_questions` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `question_1` text NOT NULL,
    `answer_1` text NOT NULL,
    `question_2` text NOT NULL,
    `answer_2` text NOT NULL,
    `question_3` text NOT NULL,
    `answer_3` text NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `user_id` int(11) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_bin

/*
 * Create articles TABLE
 */
 CREATE TABLE
  `articles` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `title` varchar(255) NOT NULL,
    `content` longtext NOT NULL CHECK (json_valid(`content`)),
    `banner` varchar(255) DEFAULT NULL,
    `tags` text DEFAULT NULL,
    `metadata` longtext DEFAULT NULL COMMENT 'Meta data of the article' CHECK (json_valid(`metadata`)),
    PRIMARY KEY (`id`)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_bin

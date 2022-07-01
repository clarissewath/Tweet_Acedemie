-- MariaDB dump 10.19  Distrib 10.7.3-MariaDB, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: twitter
-- ------------------------------------------------------
-- Server version	10.7.3-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE = @@TIME_ZONE */;
/*!40103 SET TIME_ZONE = '+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS = @@UNIQUE_CHECKS, UNIQUE_CHECKS = 0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS = 0 */;
/*!40101 SET @OLD_SQL_MODE = @@SQL_MODE, SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES = @@SQL_NOTES, SQL_NOTES = 0 */;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment`
(
    `id`           int(10) UNSIGNED                                              NOT NULL AUTO_INCREMENT,
    `user_id`      int(11) UNSIGNED                                              NOT NULL,
    `tweet_id`     int(11) UNSIGNED                                              NOT NULL,
    `comment`      varchar(140) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `date_comment` datetime                                                      NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    PRIMARY KEY (`id`),
    KEY `tweet_id` (`tweet_id`),
    KEY `user_id` (`user_id`),
    CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`tweet_id`) REFERENCES `tweet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB
  AUTO_INCREMENT = 4
  DEFAULT CHARSET = utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

/*!40000 ALTER TABLE `comment`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `comment`
    ENABLE KEYS */;

--
-- Table structure for table `follow`
--

DROP TABLE IF EXISTS `follow`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `follow`
(
    `id`          int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `follow_id`   int(11) UNSIGNED NOT NULL,
    `follower_id` int(11) UNSIGNED NOT NULL,
    `follow_date` datetime         NOT NULL,
    PRIMARY KEY (`id`),
    KEY `follow_id` (`follow_id`),
    KEY `follower_id` (`follower_id`),
    CONSTRAINT `follow_ibfk_1` FOREIGN KEY (`follow_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `follow_ibfk_2` FOREIGN KEY (`follower_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB
  AUTO_INCREMENT = 29
  DEFAULT CHARSET = utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `follow`
--

/*!40000 ALTER TABLE `follow`
    DISABLE KEYS */;
INSERT INTO `follow` (`id`, `follow_id`, `follower_id`, `follow_date`)
VALUES (15, 107, 100, '2022-03-04 15:14:02'),
       (21, 107, 111, '2022-03-10 10:25:47'),
       (22, 107, 112, '2022-03-10 10:25:59'),
       (23, 107, 113, '2022-03-10 10:25:59'),
       (24, 107, 114, '2022-03-10 10:25:59'),
       (25, 100, 111, '2022-03-10 10:58:49'),
       (26, 100, 115, '2022-03-10 10:59:24'),
       (27, 100, 107, '2022-03-10 10:25:59'),
       (28, 122, 107, '2022-03-10 10:25:59');
/*!40000 ALTER TABLE `follow`
    ENABLE KEYS */;

--
-- Table structure for table `hashtag`
--

DROP TABLE IF EXISTS `hashtag`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hashtag`
(
    `id`           int(11)                                                       NOT NULL AUTO_INCREMENT,
    `hashtag`      varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `date_hashtag` datetime                                                      NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    PRIMARY KEY (`id`),
    UNIQUE KEY `hashtag` (`hashtag`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 2
  DEFAULT CHARSET = utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hashtag`
--

/*!40000 ALTER TABLE `hashtag`
    DISABLE KEYS */;
INSERT INTO `hashtag` (`id`, `hashtag`, `date_hashtag`)
VALUES (1, '#Mamadisme', '2022-02-18 18:29:51');
/*!40000 ALTER TABLE `hashtag`
    ENABLE KEYS */;

--
-- Table structure for table `like`
--

DROP TABLE IF EXISTS `like`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `like`
(
    `id`       int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id`  int(11) UNSIGNED NOT NULL,
    `tweet_id` int(11) UNSIGNED NOT NULL,
    `date`     datetime         NOT NULL,
    PRIMARY KEY (`id`),
    KEY `id_user` (`user_id`),
    KEY `tweet_id` (`tweet_id`),
    CONSTRAINT `like_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `like_ibfk_2` FOREIGN KEY (`tweet_id`) REFERENCES `tweet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB
  AUTO_INCREMENT = 2
  DEFAULT CHARSET = utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `like`
--

/*!40000 ALTER TABLE `like`
    DISABLE KEYS */;
INSERT INTO `like` (`id`, `user_id`, `tweet_id`, `date`)
VALUES (1, 100, 57, '2022-03-01 16:51:39');
/*!40000 ALTER TABLE `like`
    ENABLE KEYS */;

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message`
(
    `id`             int(11) UNSIGNED    NOT NULL AUTO_INCREMENT,
    `content`        text                NOT NULL,
    `destination_id` int(11) UNSIGNED    NOT NULL,
    `expeditor_id`   int(11) UNSIGNED    NOT NULL,
    `view`           tinyint(1) UNSIGNED NOT NULL,
    `message_date`   datetime DEFAULT CURRENT_TIMESTAMP(),
    PRIMARY KEY (`id`),
    KEY `destinataire_id` (`destination_id`),
    KEY `expediteur_id` (`expeditor_id`),
    CONSTRAINT `message_ibfk_1` FOREIGN KEY (`destination_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `message_ibfk_2` FOREIGN KEY (`expeditor_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB
  AUTO_INCREMENT = 16
  DEFAULT CHARSET = utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

/*!40000 ALTER TABLE `message`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `message`
    ENABLE KEYS */;

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notification`
(
    `id`       int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `exped_id` int(11) UNSIGNED                                                                                          DEFAULT NULL,
    `dest_id`  int(11) UNSIGNED                                                                                          DEFAULT NULL,
    `type`     enum ('follow','like','retweet','quote','comment','reply','mention','message') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `time`     datetime         NOT NULL,
    `count`    int(11)                                                                                                   DEFAULT NULL,
    `status`   int(11)                                                                                                   DEFAULT NULL,
    `target`   int(11)          NOT NULL,
    PRIMARY KEY (`id`),
    KEY `notifications_dest` (`dest_id`),
    KEY `notifications_exped` (`exped_id`) USING BTREE,
    CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`exped_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`dest_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB
  AUTO_INCREMENT = 4
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification`
--

/*!40000 ALTER TABLE `notification`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `notification`
    ENABLE KEYS */;

--
-- Table structure for table `quote`
--

DROP TABLE IF EXISTS `quote`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quote`
(
    `id`            int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id`       int(11) UNSIGNED NOT NULL,
    `tweet_id`      int(11) UNSIGNED                                      DEFAULT NULL,
    `reply_id`      int(11) UNSIGNED                                      DEFAULT NULL,
    `quote_id`      int(11) UNSIGNED                                      DEFAULT NULL,
    `date_quote`    datetime         NOT NULL,
    `text`          text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `accessibility` int(11)          NOT NULL                             DEFAULT 1,
    `media`         text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `user_id` (`user_id`),
    KEY `tweet_id` (`tweet_id`),
    KEY `reply_id` (`reply_id`),
    KEY `quote_id` (`quote_id`),
    CONSTRAINT `quote_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `quote_ibfk_2` FOREIGN KEY (`tweet_id`) REFERENCES `tweet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `quote_ibfk_3` FOREIGN KEY (`reply_id`) REFERENCES `reply` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `quote_ibfk_4` FOREIGN KEY (`quote_id`) REFERENCES `quote` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB
  AUTO_INCREMENT = 5
  DEFAULT CHARSET = utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quote`
--

/*!40000 ALTER TABLE `quote`
    DISABLE KEYS */;
INSERT INTO `quote` (`id`, `user_id`, `tweet_id`, `reply_id`, `quote_id`, `date_quote`, `text`, `accessibility`,
                     `media`)
VALUES (4, 100, 57, 1, NULL, '2022-02-18 18:26:51', 'jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 1, NULL);
/*!40000 ALTER TABLE `quote`
    ENABLE KEYS */;

--
-- Table structure for table `reply`
--

DROP TABLE IF EXISTS `reply`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reply`
(
    `id`         int(11) UNSIGNED                                      NOT NULL AUTO_INCREMENT,
    `user_id`    int(11) UNSIGNED                                      NOT NULL,
    `tweet_id`   int(11) UNSIGNED                                      NOT NULL,
    `content`    text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `reply_date` datetime                                              NOT NULL,
    PRIMARY KEY (`id`),
    KEY `user_id` (`user_id`),
    KEY `tweet_id` (`tweet_id`),
    CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`tweet_id`) REFERENCES `tweet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `reply_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB
  AUTO_INCREMENT = 29
  DEFAULT CHARSET = utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reply`
--

/*!40000 ALTER TABLE `reply`
    DISABLE KEYS */;
INSERT INTO `reply` (`id`, `user_id`, `tweet_id`, `content`, `reply_date`)
VALUES (1, 111, 57, 'Ok Epitech, merci. Clarisse.', '2027-02-16 16:49:02'),
       (2, 107, 59, 'Oh non pas la salle sauce', '2025-03-07 12:51:59'),
       (4, 117, 61, 'Salut Cheikhna, c\'est Mamady, ça va merci, et toi ?', '2038-03-07 12:53:18'),
       (6, 111, 57, 'R : 1 | C\'est Clarisse je réponds au premier retweet !!', '2041-03-07 13:29:22');
/*!40000 ALTER TABLE `reply`
    ENABLE KEYS */;

--
-- Table structure for table `retweet`
--

DROP TABLE IF EXISTS `retweet`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `retweet`
(
    `id`            int(11) UNSIGNED                NOT NULL AUTO_INCREMENT,
    `user_id`       int(11) UNSIGNED                NOT NULL,
    `tweet_id`      int(11) UNSIGNED                NOT NULL,
    `content`       text COLLATE utf8mb4_unicode_ci NOT NULL,
    `date_retweet`  datetime                        NOT NULL,
    `visibility`    int(5)                                  DEFAULT NULL,
    `accessibility` varchar(127) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `message`       text COLLATE utf8mb4_unicode_ci         DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `user_id` (`user_id`),
    KEY `tweet_id` (`tweet_id`),
    CONSTRAINT `retweet_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `retweet_ibfk_2` FOREIGN KEY (`tweet_id`) REFERENCES `tweet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB
  AUTO_INCREMENT = 61
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `retweet`
--

/*!40000 ALTER TABLE `retweet`
    DISABLE KEYS */;
INSERT INTO `retweet` (`id`, `user_id`, `tweet_id`, `content`, `date_retweet`, `visibility`, `accessibility`, `message`)
VALUES (1, 117, 57, 'Content 117 / 57', '2022-02-16 16:50:40', 0, '1', 'Message retweet 100 / 57'),
       (2, 107, 59, 'Content 107 / 59', '2022-03-03 13:10:40', 0, '1', 'Message retweet 107 / 59'),
       (3, 107, 59, 'Content : ahah c\'est fun, salle Sauce, t\'as compris ??', '2022-03-04 11:38:10', NULL, NULL,
        NULL),
       (19, 120, 62, 'Content user_id retweet tweet_id = 62', '2022-03-04 14:46:46', NULL, NULL, NULL);
/*!40000 ALTER TABLE `retweet`
    ENABLE KEYS */;

--
-- Table structure for table `tweet`
--

DROP TABLE IF EXISTS `tweet`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tweet`
(
    `id`            int(11) UNSIGNED                                      NOT NULL AUTO_INCREMENT,
    `user_id`       int(11)                                               NOT NULL,
    `tweet_date`    datetime                                              NOT NULL,
    `content`       text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `media`         text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci         DEFAULT NULL,
    `visibility`    int(5)                                                        DEFAULT 1,
    `accessibility` varchar(127) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'everyone',
    `tag`           text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci         DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `id_user` (`user_id`),
    KEY `id_tweet` (`id`),
    KEY `id_user_2` (`user_id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 173
  DEFAULT CHARSET = utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tweet`
--

/*!40000 ALTER TABLE `tweet`
    DISABLE KEYS */;
INSERT INTO `tweet` (`id`, `user_id`, `tweet_date`, `content`, `media`, `visibility`, `accessibility`, `tag`)
VALUES (57, 100, '2022-02-26 13:19:32',
        'Ceci est un tweet, il n\'est que le seul reflet de mes opinions qui n\'engagent que moi blabla || id=57 | user_id=100',
        NULL, 1, 'everyone', NULL),
       (58, 108, '2000-01-01 00:00:00', '58 over 108 aaaaaaaaaaaaaaa', NULL, 1, 'everyone', 'W@C,Informatique'),
       (59, 100, '1990-02-17 15:43:56', 'Vous êtes en salle sauce', NULL, 1, 'everyone', 'W@C,Mamadisme'),
       (60, 107, '2022-02-21 00:07:55', 'My first tweet', NULL, 1, 'everyone', 'W@C,Twitter'),
       (61, 109, '2022-02-26 13:19:12', 'Yo c\'est Cheikhna, la forme ?', NULL, 1, 'everyone', NULL),
       (62, 110, '2022-02-26 13:19:32', 'C\'est carré mec', NULL, 1, 'everyone', NULL);
/*!40000 ALTER TABLE `tweet`
    ENABLE KEYS */;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user`
(
    `id`            int(11) UNSIGNED                                              NOT NULL AUTO_INCREMENT,
    `username`      varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `name`          varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci       DEFAULT NULL,
    `email`         varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci       DEFAULT NULL,
    `password`      varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `phone`         varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci       DEFAULT NULL,
    `birthdate`     date                                                          NOT NULL,
    `gender`        enum ('m','f','x') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `avatar`        varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci       DEFAULT NULL,
    `cover`         varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci       DEFAULT NULL,
    `website`       varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci       DEFAULT NULL,
    `register_date` datetime                                                            DEFAULT CURRENT_TIMESTAMP(),
    `visibility`    int(5)                                                              DEFAULT 1,
    `country`       varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci       DEFAULT NULL,
    `language`      varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci       DEFAULT NULL,
    `location`      varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci       DEFAULT NULL,
    `timezone`      varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci       DEFAULT NULL,
    `connect`       tinyint(1)                                                          DEFAULT NULL,
    `active`        tinyint(1)                                                          DEFAULT 1,
    `token`         varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci       DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `users_login` (`username`),
    UNIQUE KEY `users_email` (`email`),
    UNIQUE KEY `users_cell_phone` (`phone`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 186
  DEFAULT CHARSET = utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

/*!40000 ALTER TABLE `user`
    DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `name`, `email`, `password`, `phone`, `birthdate`, `gender`, `avatar`, `cover`,
                    `website`, `register_date`, `visibility`, `country`, `language`, `location`, `timezone`, `connect`,
                    `active`, `token`)
VALUES (100, 'Epitech', 'Tech', 'accueil@epitech.eu', 'f06422112049066b3db9992d08bf1a4b9ea59ae5', '0000000000',
        '1970-01-01', 'x', NULL, NULL, NULL, '2000-02-16 14:01:18', 1, 'France', NULL, '24, rue Pasteur',
        'Europe/Paris', 1, 1, 'TOKEN______'),
       (102, 'W@C', 'Académie', 'wac@epitech.eu', 'f06422112049066b3db9992d08bf1a4b9ea59ae5', NULL, '2013-02-16', NULL,
        NULL, NULL, NULL, '1856-02-16 16:39:03', 1, NULL, NULL, NULL, NULL, 0, 0, 'UUID'),
       (105, 'W@C_BAK', 'Académie', 'wac@epitech.eu_BAK', 'f06422112049066b3db9992d08bf1a4b9ea59ae5', NULL,
        '2013-02-16', NULL, NULL, NULL, NULL, '1856-02-16 16:39:03', 1, NULL, NULL, NULL, NULL, 0, 0, 'UUID'),
       (107, 'GildasLD', 'Le Drogoff', 'gildas.le-drogoff@epitech.eu', 'f06422112049066b3db9992d08bf1a4b9ea59ae5',
        '9999999999', '1994-03-13', NULL, NULL, NULL, NULL, '2002-02-20 23:57:23', 1, NULL, NULL, NULL, NULL, NULL, 1,
        NULL),
       (108, 'AndryR', 'Ramanana', 'andry.ramanana@epitech.eu', 'f06422112049066b3db9992d08bf1a4b9ea59ae5', NULL,
        '2000-01-01', NULL, NULL, NULL, NULL, '2022-02-21 00:07:13', 1, NULL, NULL, NULL, NULL, NULL, 1, NULL),
       (109, 'CheikhnaS', 'Sakho', 'cheikhna.sakho@epitech.eu', 'f06422112049066b3db9992d08bf1a4b9ea59ae5', NULL,
        '2000-01-01', NULL, NULL, NULL, NULL, '2022-02-21 00:07:13', 1, NULL, NULL, NULL, NULL, NULL, 1, NULL),
       (110, 'ChristopheF', 'Feuillard', 'christophe.feuillard@epitech.eu', 'f06422112049066b3db9992d08bf1a4b9ea59ae5',
        NULL, '2000-01-01', NULL, NULL, NULL, NULL, '2022-02-21 00:07:13', 1, NULL, NULL, NULL, NULL, NULL, 1, NULL),
       (111, 'ClarisseW', 'Wathanyuta', 'clarisse.wathanyuta@epitech.eu', 'f06422112049066b3db9992d08bf1a4b9ea59ae5',
        NULL, '2000-01-01', NULL, NULL, NULL, NULL, '2022-02-21 00:07:13', 1, NULL, NULL, NULL, NULL, NULL, 1, NULL),
       (112, 'DenisF', 'Fierens', 'denis.fierens@epitech.eu', 'f06422112049066b3db9992d08bf1a4b9ea59ae5', NULL,
        '2000-01-01', NULL, NULL, NULL, NULL, '2022-02-21 00:07:13', 1, NULL, NULL, NULL, NULL, NULL, 1, NULL),
       (113, 'DorianC', 'Cousin', 'dorian.cousin@epitech.eu', 'f06422112049066b3db9992d08bf1a4b9ea59ae5', NULL,
        '2000-01-01', NULL, NULL, NULL, NULL, '2022-02-21 00:07:13', 1, NULL, NULL, NULL, NULL, NULL, 1, NULL),
       (114, 'EvanN', 'Noubel', 'evan.noubel@epitech.eu', 'f06422112049066b3db9992d08bf1a4b9ea59ae5', NULL,
        '2000-01-01', NULL, NULL, NULL, NULL, '2022-02-21 00:07:13', 1, NULL, NULL, NULL, NULL, NULL, 1, NULL),
       (115, 'JohanO', 'Oyo', 'johan.oyo@epitech.eu', 'f06422112049066b3db9992d08bf1a4b9ea59ae5', NULL, '2000-01-01',
        NULL, NULL, NULL, NULL, '2022-02-21 00:07:13', 1, NULL, NULL, NULL, NULL, NULL, 1, NULL),
       (116, 'MajidE', 'Eltayeb', 'majid.eltayeb@epitech.eu', 'f06422112049066b3db9992d08bf1a4b9ea59ae5', NULL,
        '2000-01-01', NULL, NULL, NULL, NULL, '2022-02-21 00:07:13', 1, NULL, NULL, NULL, NULL, NULL, 1, NULL),
       (117, 'MamadyK', 'Konte', 'mamady.konte@epitech.eu', 'f06422112049066b3db9992d08bf1a4b9ea59ae5', NULL,
        '2000-01-01', NULL, NULL, NULL, NULL, '2022-02-21 00:07:13', 1, NULL, NULL, NULL, NULL, NULL, 1, NULL),
       (118, 'MariaC', 'Co', 'maria.co@epitech.eu', 'f06422112049066b3db9992d08bf1a4b9ea59ae5', NULL, '2000-01-01',
        NULL, NULL, NULL, NULL, '2022-02-21 00:07:13', 1, NULL, NULL, NULL, NULL, NULL, 1, NULL),
       (119, 'MarouaS', 'Saddiki', 'maroua.saddiki@epitech.eu', 'f06422112049066b3db9992d08bf1a4b9ea59ae5', NULL,
        '2000-01-01', NULL, NULL, NULL, NULL, '2022-02-21 00:07:13', 1, NULL, NULL, NULL, NULL, NULL, 1, NULL),
       (120, 'Mohamed-amineM', 'Merhdaoui', 'mohamed-amine.merhdaoui@epitech.eu',
        'f06422112049066b3db9992d08bf1a4b9ea59ae5', NULL, '2000-01-01', NULL, NULL, NULL, NULL, '2022-02-21 00:07:13',
        1, NULL, NULL, NULL, NULL, NULL, 1, NULL),
       (121, 'MohamedG', 'Ghoualem', 'mohamed.ghoualem@epitech.eu', 'f06422112049066b3db9992d08bf1a4b9ea59ae5', NULL,
        '2000-01-01', NULL, NULL, NULL, NULL, '2022-02-21 00:07:13', 1, NULL, NULL, NULL, NULL, NULL, 1, NULL),
       (122, 'NicolasR', 'Ren', 'nicolas.ren@epitech.eu', 'f06422112049066b3db9992d08bf1a4b9ea59ae5', NULL,
        '2000-01-01', NULL, NULL, NULL, NULL, '2022-02-21 00:07:13', 1, NULL, NULL, NULL, NULL, NULL, 1, NULL),
       (123, 'NverD', 'Davtyan', 'nver.davtyan@epitech.eu', 'f06422112049066b3db9992d08bf1a4b9ea59ae5', NULL,
        '2000-01-01', NULL, NULL, NULL, NULL, '2022-02-21 00:07:13', 1, NULL, NULL, NULL, NULL, NULL, 1, NULL),
       (124, 'SarahB', 'Bultiauw', 'sarah.bultiauw@epitech.eu', 'f06422112049066b3db9992d08bf1a4b9ea59ae5', NULL,
        '2000-01-01', NULL, NULL, NULL, NULL, '2022-02-21 00:07:13', 1, NULL, NULL, NULL, NULL, NULL, 1, NULL),
       (125, 'TeneC', 'Coulibaly', 'tene.coulibaly@epitech.eu', 'f06422112049066b3db9992d08bf1a4b9ea59ae5', NULL,
        '2000-01-01', NULL, NULL, NULL, NULL, '2022-02-21 00:07:13', 1, NULL, NULL, NULL, NULL, NULL, 1, NULL),
       (126, 'ThomasH', 'Huynh', 'thomas.huynh@epitech.eu', 'f06422112049066b3db9992d08bf1a4b9ea59ae5', NULL,
        '2000-01-01', NULL, NULL, NULL, NULL, '2022-02-21 00:07:13', 1, NULL, NULL, NULL, NULL, NULL, 1, NULL),
       (127, 'VinyC', 'Come', 'viny.come@epitech.eu', 'f06422112049066b3db9992d08bf1a4b9ea59ae5', NULL, '2000-01-01',
        NULL, NULL, NULL, NULL, '2022-02-21 00:07:13', 1, NULL, NULL, NULL, NULL, NULL, 1, NULL),
       (128, 'VirginieS', 'Semedo-cabral', 'virginie.semedo-cabral@epitech.eu',
        'f06422112049066b3db9992d08bf1a4b9ea59ae5', NULL, '2000-01-01', NULL, NULL, NULL, NULL, '2022-02-21 00:07:13',
        1, NULL, NULL, NULL, NULL, NULL, 1, NULL),
       (161, 'SsazerEpitech', NULL, 'ssazer@epitech.eu', 'f06422112049066b3db9992d08bf1a4b9ea59ae5', NULL, '2022-01-01',
        NULL, NULL, NULL, NULL, '2022-02-23 19:50:28', 1, NULL, NULL, NULL, NULL, NULL, 1, NULL),
       (162, 'GildasLDD', NULL, 'GildasLDD@epitech.eu', 'f06422112049066b3db9992d08bf1a4b9ea59ae5', NULL, '2022-01-01',
        NULL, NULL, NULL, NULL, '2022-02-26 14:57:57', 1, NULL, NULL, NULL, NULL, NULL, 1, NULL);
/*!40000 ALTER TABLE `user`
    ENABLE KEYS */;

--
-- Table structure for table `user_preference`
--

DROP TABLE IF EXISTS `user_preference`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_preference`
(
    `id`      int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id` int(11) UNSIGNED NOT NULL,
    `theme`   varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `id_user` (`user_id`),
    CONSTRAINT `user_preference_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB
  AUTO_INCREMENT = 3
  DEFAULT CHARSET = utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_preference`
--

/*!40000 ALTER TABLE `user_preference`
    DISABLE KEYS */;
INSERT INTO `user_preference` (`id`, `user_id`, `theme`)
VALUES (2, 100, 'pp^');
/*!40000 ALTER TABLE `user_preference`
    ENABLE KEYS */;
/*!40103 SET TIME_ZONE = @OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE = @OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS = @OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES = @OLD_SQL_NOTES */;

-- Dump completed on 2022-03-11 16:15:50

-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 
-- Версия на сървъра: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Структура на таблица `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(200) NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_answers_questions_idx` (`question_id`),
  KEY `fk_answers_users_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Схема на данните от таблица `answers`
--

INSERT INTO `answers` (`id`, `text`, `question_id`, `user_id`) VALUES
(19, 'Пробвал ли си да смениш int с long? Може и това да е проблема.', 29, 27),
(20, 'Аз съм за. Хайде да е в петък.', 30, 27);

-- --------------------------------------------------------

--
-- Структура на таблица `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Схема на данните от таблица `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(15, 'Level1'),
(16, 'Level2'),
(17, 'Важни съобщения'),
(18, 'Общи приказки'),
(21, 'Предложения'),
(20, 'Проблеми'),
(19, 'Събития');

-- --------------------------------------------------------

--
-- Структура на таблица `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `counter` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_questions_categories_idx` (`category_id`),
  KEY `fk_questions_users_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Схема на данните от таблица `questions`
--

INSERT INTO `questions` (`id`, `title`, `description`, `category_id`, `user_id`, `counter`) VALUES
(29, '[Exam Problems] 1.Play with cats', 'Здравейте, срещнах проблем със решаването на задачата.Не среща изискванията за време. Може ли малко помощ :)', 20, 26, 7),
(30, '[Social event] Хижа', 'Кога искате да се организираме и да направим една хижа в планината', 19, 26, 4);

-- --------------------------------------------------------

--
-- Структура на таблица `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Схема на данните от таблица `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(41, 'C#'),
(49, 'event'),
(42, 'Exam'),
(44, 'judge'),
(43, 'Problems'),
(48, 'Боровец'),
(45, 'лимит-време'),
(47, 'Пампорово'),
(46, 'Хижа');

-- --------------------------------------------------------

--
-- Структура на таблица `tags_questions`
--

CREATE TABLE IF NOT EXISTS `tags_questions` (
  `tag_id` varchar(200) NOT NULL,
  `question_id` varchar(200) NOT NULL,
  PRIMARY KEY (`tag_id`,`question_id`),
  KEY `tag_id` (`tag_id`),
  KEY `question_id` (`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `tags_questions`
--

INSERT INTO `tags_questions` (`tag_id`, `question_id`) VALUES
('41', '29'),
('42', '29'),
('43', '29'),
('44', '29'),
('45', '29'),
('46', '30'),
('47', '30'),
('48', '30'),
('49', '30');

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `pass_hash` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `username`, `pass_hash`, `email`) VALUES
(26, 'milen_d', '$2y$10$twSNlTktAkYsaz3P7UtCZO.y5Wkzbu.4ZxraGiM62168Eb/XbChR.', 'milen_d@abv.bg'),
(27, 'ivan', '$2y$10$R/9RlVcAVjEUJ9k8opwHl.nEEioNGDUmdmMrkJl1XbaLahCqSXNzC', 'ivan@abv.bg');

--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `fk_answers_questions` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_answers_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения за таблица `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `fk_questions_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_questions_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

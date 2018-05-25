-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3307
-- Время создания: Фев 24 2016 г., 12:58
-- Версия сервера: 5.5.38-log
-- Версия PHP: 5.5.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `santaway`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cabinet`
--

CREATE TABLE IF NOT EXISTS `cabinet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `body` tinytext NOT NULL,
  `price` tinytext NOT NULL,
  `picture` tinytext NOT NULL,
  `cat_id` int(11) NOT NULL,
  `vip` int(11) NOT NULL,
  `showhide` enum('show','hide') NOT NULL,
  `product_code` tinytext NOT NULL,
  `userid` int(11) NOT NULL,
  `putdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `cabinet`
--

INSERT INTO `cabinet` (`id`, `name`, `body`, `price`, `picture`, `cat_id`, `vip`, `showhide`, `product_code`, `userid`, `putdate`) VALUES
(7, 'Лимон', '<p>фрукт</p>', '8000', '1456301130.jpg', 0, 1, 'show', '001', 1, '2016-02-24'),
(8, 'Апельсин', '<p>фрукт</p>', '12000', '1456301168.jpg', 0, 1, 'show', '002', 1, '2016-02-24'),
(9, 'клубника', '<p>фрукт</p>', '20000', '1456301197.jpg', 0, 1, 'show', '003', 1, '2016-02-24');

-- --------------------------------------------------------

--
-- Структура таблицы `maintexts`
--

CREATE TABLE IF NOT EXISTS `maintexts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `body` text NOT NULL,
  `url` tinytext NOT NULL,
  `showhide` enum('show','hide') NOT NULL DEFAULT 'show',
  `long` enum('ru','en') NOT NULL DEFAULT 'ru',
  `putdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `maintexts`
--

INSERT INTO `maintexts` (`id`, `name`, `body`, `url`, `showhide`, `long`, `putdate`) VALUES
(1, 'Добро пожаловать', 'Разработка сайта в Минске это правильное решение. Отдых — это наше свободное время, и проводить его как нам нравится — цель нашей жизни. Нехватка времени и денег, вот что волнует многих. Некоторые люди настолько заняты работой, что на отдых не остается совершенно никакого времени. Баланса можно достичь во всем, в том числе между отдыхом и работой. Мы расскажем, как это сделать.\r\n		Разработка сайта в Минске это правильное решение. Отдых — это наше свободное время, и проводить его как нам нравится — цель нашей жизни. Нехватка времени и денег, вот что волнует многих. Некоторые люди настолько заняты работой, что на отдых не остается совершенно никакого времени. Баланса можно достичь во всем, в том числе между отдыхом и работой. Мы расскажем, как это сделать Разработка сайта в Минске это правильное решение. Отдых — это наше свободное время, и проводить его как нам нравится — цель нашей жизни. Нехватка времени и денег, вот что волнует многих. Некоторые люди настолько заняты работой, что на отдых не остается совершенно никакого времени. Баланса можно достичь во всем, в том числе между отдыхом и работой. Мы расскажем, как это сделать', 'index', 'show', 'ru', '2016-02-15'),
(2, 'о компании', 'Центр Обучающих технологий "Белхард" был основан в 2002 году и является ведущим компьютерным учебным центром республики Беларусь, с высоким уровнем качества обучения, сервиса, организации учебного процесса.\r\n\r\nНаша миссия заключается в содействии развитию и распространению в Республике Беларусь новейших методов обучения информационным технологиям и программы сертификации специалистов фондом ECDL.', 'about_company', 'show', 'ru', '2016-02-15'),
(3, 'Вакансии', 'Требуются разработчики ', 'jobs', 'show', 'ru', '2016-02-15'),
(4, 'Контакты', '220004, Республика Беларусь город Минск\r\nулица Мельникайте 4, офис 305\r\nЦентр Обучающих Технологий "БелХард"\r\nТелефон для связи +375293617185 ', 'contact', 'show', 'ru', '2016-02-15');

-- --------------------------------------------------------

--
-- Структура таблицы `telefon`
--

CREATE TABLE IF NOT EXISTS `telefon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `phone` tinytext NOT NULL,
  `zakaz` text NOT NULL,
  `status` tinytext NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `telefon`
--

INSERT INTO `telefon` (`id`, `name`, `email`, `phone`, `zakaz`, `status`, `user_id`) VALUES
(1, 'sa', 'santaway@mail.ru', '111', 'a:1:{i:5;i:1;}', 'new', 0),
(2, 'морковка', 'santaway@mail.ru', '1234567', 'a:1:{i:5;i:1;}', 'new', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fio` tinytext NOT NULL,
  `login` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `password` tinytext NOT NULL,
  `datereg` date NOT NULL,
  `lastvisit` datetime NOT NULL,
  `blockunblock` enum('unblock','block') NOT NULL DEFAULT 'unblock',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `fio`, `login`, `email`, `password`, `datereg`, `lastvisit`, `blockunblock`) VALUES
(1, 'santaway', 'santaway@mail.ru', 'santaway', '12', '2016-02-17', '2016-02-17 12:14:17', 'unblock'),
(2, 'ddd', 'santaway@mail.ru', 'santaway', '123456', '2016-02-19', '2016-02-19 11:44:30', 'unblock');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

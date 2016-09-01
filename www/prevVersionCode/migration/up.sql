-- phpMyAdmin SQL Dump
-- version 4.0.10.12
-- http://www.phpmyadmin.net
--
-- Хост: sichena.mysql.ukraine.com.ua
-- Час створення: Бер 05 2016 р., 12:57
-- Версія сервера: 5.1.72-cll-lve
-- Версія PHP: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База даних: `sichena_poland`
--

-- --------------------------------------------------------

--
-- Структура таблиці `pol_agents`
--

CREATE TABLE IF NOT EXISTS `pol_agents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп даних таблиці `pol_agents`
--

INSERT INTO `pol_agents` (`id`, `name`, `login`, `password`, `status`) VALUES
(1, 'Татьяна Лисна', ' t.lisna', 'qwerty', 'director'),
(2, 'Наталья Люта', 'n.luta', 'qwerty', 'agent'),
(3, 'Илона Сумец', 'i.sumets', 'qwerty', 'agent'),
(4, 'Владислав Лисный', 'synthetica', 'qwerty', 'admin');

-- --------------------------------------------------------

--
-- Структура таблиці `pol_clients`
--

CREATE TABLE IF NOT EXISTS `pol_clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `birth_date` varchar(10) NOT NULL,
  `ppva` int(11) NOT NULL,
  `purpose` int(2) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ptn` varchar(14) NOT NULL,
  `passport_num` varchar(10) NOT NULL,
  `passport_expire` varchar(10) NOT NULL,
  `back_date` varchar(10) NOT NULL,
  `nationality` int(3) NOT NULL,
  `state_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `agent_id` int(11) NOT NULL,
  `register_date` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Дамп даних таблиці `pol_clients`
--

INSERT INTO `pol_clients` (`id`, `name`, `surname`, `status`, `birth_date`, `ppva`, `purpose`, `email`, `password`, `ptn`, `passport_num`, `passport_expire`, `back_date`, `nationality`, `state_id`, `created`, `agent_id`, `register_date`) VALUES
(1, 'DMYTRO', 'TKACHENKO', 'Mr.', '21-08-1980', 12, 1, 'someemail@gmail.com', 'qwerty', '3658/9663/6699', 'FA967734', '14-05-2020', '11-05-2016', 219, 1, '2016-03-02 17:25:48', 0, '');

-- --------------------------------------------------------

--
-- Структура таблиці `pol_state`
--

CREATE TABLE IF NOT EXISTS `pol_state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп даних таблиці `pol_state`
--

INSERT INTO `pol_state` (`id`, `state`) VALUES
(1, 'Ожидает записи'),
(2, 'В работе'),
(3, 'Нерабочий PTN'),
(4, 'Записан');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

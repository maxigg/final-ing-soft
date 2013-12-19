-- phpMyAdmin SQL Dump
-- version 4.0.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-12-2013 a las 09:32:38
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `umbook`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  `id_resource` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `denouncement`
--

CREATE TABLE IF NOT EXISTS `denouncement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `friend`
--

CREATE TABLE IF NOT EXISTS `friend` (
  `id_user` int(11) NOT NULL,
  `id_friend` int(11) NOT NULL,
  PRIMARY KEY (`id_user`,`id_friend`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `friend`
--

INSERT INTO `friend` (`id_user`, `id_friend`) VALUES
(2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_resource` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `read` tinyint(1) NOT NULL,
  `write` tinyint(1) NOT NULL,
  `id_resource` int(11) DEFAULT NULL,
  `id_group` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `picture`
--

CREATE TABLE IF NOT EXISTS `picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  `path` varchar(200) NOT NULL,
  `id_album` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publication`
--

CREATE TABLE IF NOT EXISTS `publication` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_owner` int(11) NOT NULL,
  `id_publisher` int(11) NOT NULL,
  `message` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `request`
--

CREATE TABLE IF NOT EXISTS `request` (
  `id_receiver` int(11) NOT NULL,
  `id_sender` int(11) NOT NULL,
  PRIMARY KEY (`id_receiver`,`id_sender`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `request`
--

INSERT INTO `request` (`id_receiver`, `id_sender`) VALUES
(3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user` varchar(65) NOT NULL,
  `password` varchar(65) NOT NULL,
  `path_photo` varchar(200) DEFAULT NULL,
  `birthday` date NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0',
  `notifications` enum('ALL','NOTIFY','MAIL','NONE') NOT NULL DEFAULT 'ALL',
  `state` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `name`, `last_name`, `email`, `user`, `password`, `path_photo`, `birthday`, `role`, `notifications`, `state`) VALUES
(1, 'juan', 'perez', 'juanadmin@gmail.com', 'admin', '123456', '', '1990-10-18', 1, 'ALL', 1),
(2, 'Jose', 'Gomez', 'jose@hotmail.com', 'pepe', '123', '', '0000-00-00', 0, 'ALL', 1),
(3, 'dario', 'gonzalez', 'darioegb@gmail.com', 'dariobass', '123', NULL, '1987-12-12', 0, 'ALL', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_group`
--

CREATE TABLE IF NOT EXISTS `user_group` (
  `id_user` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  PRIMARY KEY (`id_user`,`id_group`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

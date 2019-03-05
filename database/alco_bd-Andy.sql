-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 05-03-2019 a las 18:58:10
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alco_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `air_conditioner_data`
--

DROP TABLE IF EXISTS `air_conditioner_data`;
CREATE TABLE IF NOT EXISTS `air_conditioner_data` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `service_description_id` int(255) DEFAULT NULL,
  `visitors_id` int(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `comments` text,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_air_conditioner_data_service_description` (`service_description_id`),
  KEY `fk_air_conditioner_data_visitors` (`visitors_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bardeados_data`
--

DROP TABLE IF EXISTS `bardeados_data`;
CREATE TABLE IF NOT EXISTS `bardeados_data` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `service_description_id` int(255) DEFAULT NULL,
  `visitors_id` int(255) DEFAULT NULL,
  `base` float DEFAULT NULL,
  `height` float DEFAULT NULL,
  `square_maters` float DEFAULT NULL,
  `price` float DEFAULT NULL,
  `comments` text,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_bardeados_data_service_description` (`service_description_id`),
  KEY `fk_bardeados_data_visitors` (`visitors_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carpentry_data`
--

DROP TABLE IF EXISTS `carpentry_data`;
CREATE TABLE IF NOT EXISTS `carpentry_data` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `service_description_id` int(255) DEFAULT NULL,
  `visitors_id` int(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_carpentry_data_service_description` (`service_description_id`),
  KEY `fk_carpentry_data_visitors` (`visitors_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `drywall_data`
--

DROP TABLE IF EXISTS `drywall_data`;
CREATE TABLE IF NOT EXISTS `drywall_data` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `service_description_id` int(255) DEFAULT NULL,
  `visitors_id` int(255) DEFAULT NULL,
  `base` float DEFAULT NULL,
  `height` float DEFAULT NULL,
  `square_maters` float DEFAULT NULL,
  `price` float DEFAULT NULL,
  `comments` text,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_drywall_data_service_description` (`service_description_id`),
  KEY `fk_drywall_data_visitors` (`visitors_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `electricity_data`
--

DROP TABLE IF EXISTS `electricity_data`;
CREATE TABLE IF NOT EXISTS `electricity_data` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `service_description_id` int(255) DEFAULT NULL,
  `visitors_id` int(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_electricity_data_service_description` (`service_description_id`),
  KEY `fk_electricity_data_visitors` (`visitors_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estimate`
--

DROP TABLE IF EXISTS `estimate`;
CREATE TABLE IF NOT EXISTS `estimate` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `service_description_id` int(255) DEFAULT NULL,
  `visitors_id` int(255) DEFAULT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `client_email` varchar(255) DEFAULT NULL,
  `client_phone` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `comments` text,
  `pdf` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_estimate_service_description` (`service_description_id`),
  KEY `fk_estimate_visitors_is` (`visitors_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estimate`
--

INSERT INTO `estimate` (`id`, `service_description_id`, `visitors_id`, `client_name`, `client_email`, `client_phone`, `location`, `comments`, `pdf`, `created_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-01 16:49:49'),
(2, 46, 12, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-01 21:33:28'),
(3, 44, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-01 21:42:12'),
(4, 45, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-01 21:42:12'),
(5, 46, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-01 21:42:12'),
(6, 71, 15, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-01 22:38:12'),
(7, 72, 15, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-01 22:38:12'),
(8, 44, 18, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-01 22:45:42'),
(9, 45, 18, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-01 22:45:42'),
(10, 46, 18, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-01 22:45:42'),
(11, 71, 19, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-01 22:46:25'),
(12, 72, 19, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-01 22:46:25'),
(13, 71, 20, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-01 22:46:58'),
(14, 72, 20, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-01 22:46:58'),
(15, 71, 20, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-01 22:46:58'),
(16, 72, 20, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-01 22:46:58'),
(17, 73, 20, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-01 22:46:58'),
(18, 71, 22, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-01 22:49:38'),
(19, 72, 22, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-01 22:49:38'),
(20, 73, 22, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-01 22:49:38'),
(21, 71, 24, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-02 13:33:14'),
(22, 72, 24, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-02 13:33:14'),
(23, 71, 25, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-02 14:00:37'),
(24, 72, 25, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-02 14:00:37'),
(25, 73, 25, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-02 14:00:37'),
(26, 71, 26, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-04 13:30:20'),
(27, 72, 26, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-04 13:30:20'),
(28, 73, 26, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-04 13:30:20'),
(29, 47, 27, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-04 14:33:33'),
(30, 48, 27, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-04 14:33:33'),
(31, 53, 27, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-04 14:33:33'),
(32, 54, 27, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-04 14:33:33'),
(33, 57, 27, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-04 14:33:33'),
(34, 58, 27, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-04 14:33:33'),
(35, 59, 27, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-04 14:33:33'),
(36, 62, 27, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-04 14:33:33'),
(37, 71, 30, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-05 16:09:13'),
(38, 73, 30, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-05 16:09:13'),
(39, 73, 31, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-05 18:44:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `floor_placement_data`
--

DROP TABLE IF EXISTS `floor_placement_data`;
CREATE TABLE IF NOT EXISTS `floor_placement_data` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `service_description_id` int(255) DEFAULT NULL,
  `visitors_id` int(255) DEFAULT NULL,
  `base` float DEFAULT NULL,
  `height` float DEFAULT NULL,
  `square_maters` float DEFAULT NULL,
  `price` float DEFAULT NULL,
  `comments` text,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_floor_placement_data_service_description` (`service_description_id`),
  KEY `fk_floor_placement_data_visitors` (`visitors_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fumigation_data`
--

DROP TABLE IF EXISTS `fumigation_data`;
CREATE TABLE IF NOT EXISTS `fumigation_data` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `service_description_id` int(255) DEFAULT NULL,
  `visitors_id` int(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fumigation_data_service_description` (`service_description_id`),
  KEY `fk_fumigation_data_visitors` (`visitors_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interior_decoration_data`
--

DROP TABLE IF EXISTS `interior_decoration_data`;
CREATE TABLE IF NOT EXISTS `interior_decoration_data` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `service_description_id` int(255) DEFAULT NULL,
  `visitors_id` int(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_interior_decoration_data_service_description` (`service_description_id`),
  KEY `fk_interior_decoration_data_visitors` (`visitors_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `masonry_data`
--

DROP TABLE IF EXISTS `masonry_data`;
CREATE TABLE IF NOT EXISTS `masonry_data` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `service_description_id` int(255) DEFAULT NULL,
  `visitors_id` int(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_masonry_data_service_description` (`service_description_id`),
  KEY `fk_masonry_data_visitors` (`visitors_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paint_data`
--

DROP TABLE IF EXISTS `paint_data`;
CREATE TABLE IF NOT EXISTS `paint_data` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `service_description_id` int(255) DEFAULT NULL,
  `visitors_id` int(255) DEFAULT NULL,
  `base` float DEFAULT NULL,
  `height` float DEFAULT NULL,
  `square_maters` float DEFAULT NULL,
  `price` float DEFAULT NULL,
  `comments` text,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_paint_data_service_description` (`service_description_id`),
  KEY `fk_paint_data_visitors` (`visitors_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paint_data`
--

INSERT INTO `paint_data` (`id`, `service_description_id`, `visitors_id`, `base`, `height`, `square_maters`, `price`, `comments`, `created_at`) VALUES
(1, 71, 23, 4, 5, 20, 1000, 'h', '2019-03-02 13:31:49'),
(2, 71, 24, 4, 5, 20, 1000, 'h', '2019-03-02 13:33:14'),
(3, 71, 25, 4, 5, 20, 500, 'p', '2019-03-02 14:00:37'),
(4, 71, 26, 4, 5, 20, 500, 'p', '2019-03-04 13:30:20'),
(5, 71, 30, 4, 5, 20, 500, 'g', '2019-03-05 16:09:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plumbing_data`
--

DROP TABLE IF EXISTS `plumbing_data`;
CREATE TABLE IF NOT EXISTS `plumbing_data` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `service_description_id` int(255) DEFAULT NULL,
  `visitors_id` int(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_plumbing_data_service_description` (`service_description_id`),
  KEY `fk_plumbing_data_visitors` (`visitors_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `service_category`
--

DROP TABLE IF EXISTS `service_category`;
CREATE TABLE IF NOT EXISTS `service_category` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `users_id` int(255) DEFAULT NULL,
  `service_category_name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_service_category_users` (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `service_category`
--

INSERT INTO `service_category` (`id`, `users_id`, `service_category_name`, `created_at`, `update_at`) VALUES
(10, 2, 'Acabados', '2019-01-21 04:00:00', '2019-01-21 04:00:00'),
(11, 2, 'Aires Acondicionados', '2019-01-21 04:00:00', '2019-01-21 04:00:00'),
(12, 2, 'Cerrajeria', '2019-01-21 04:00:00', '2019-01-21 04:00:00'),
(13, 2, 'Decoración de Interiores', '2019-01-21 04:00:00', '2019-01-21 04:00:00'),
(14, 2, 'Electricidad', '2019-01-21 04:00:00', '2019-01-21 04:00:00'),
(15, 2, 'Plomería', '2019-01-21 04:00:00', '2019-01-21 04:00:00'),
(16, 2, 'Fumigaciones', '2019-01-21 04:00:00', '2019-01-21 04:00:00'),
(17, 2, 'Carpintería', '2019-01-21 04:00:00', '2019-01-21 04:00:00'),
(18, 2, 'Albañilería', '2019-01-21 04:00:00', '2019-01-21 04:00:00'),
(24, 5, 'Pruebita', '2019-02-26 22:54:12', '2019-03-04 16:10:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `service_description`
--

DROP TABLE IF EXISTS `service_description`;
CREATE TABLE IF NOT EXISTS `service_description` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `users_id` int(255) DEFAULT NULL,
  `service_category_id` int(255) DEFAULT NULL,
  `description` text,
  `provider` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_service_description_users` (`users_id`),
  KEY `fk_service_description_service_category` (`service_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `service_description`
--

INSERT INTO `service_description` (`id`, `users_id`, `service_category_id`, `description`, `provider`, `price`, `created_at`, `update_at`) VALUES
(1, 2, 13, 'Colocación de Decoraciones y Accesorios', 'NULL', 100, '2019-01-24 05:50:00', '2019-01-24 05:50:00'),
(2, 2, 13, 'Colocación de Cuadros', 'NULL', 100, '2019-01-24 05:00:00', '2019-01-24 05:00:00'),
(3, 2, 13, 'Colocación de Espejos', 'NULL', 100, '2019-01-24 05:00:00', '2019-01-24 05:00:00'),
(4, 2, 13, 'Colocación de Repisas', 'NULL', 100, '2019-01-24 05:00:00', '2019-01-24 05:00:00'),
(5, 2, 13, 'Colocación de Inmuebles', 'NULL', 100, '2019-01-24 05:00:00', '2019-01-24 05:00:00'),
(6, 2, 14, 'Colocación de Ventiladores', 'NULL', 100, '2019-01-24 05:00:00', '2019-01-24 05:00:00'),
(7, 2, 14, 'Cambios de Focos, Drivers y Balastros', 'NULL', 100, '2019-01-24 05:00:00', '2019-01-24 05:00:00'),
(8, 2, 14, 'Cambio de Contactos (sencillos y dobles), Tapas ciegas, Soquets, Apagadores', 'NULL', 100, '2019-01-24 03:00:00', '2019-01-24 03:00:00'),
(9, 2, 14, 'Colocación de Canaleta para dos lineas (Superficial)', 'NULL', 100, '2019-01-24 05:00:00', '2019-01-24 05:00:00'),
(10, 2, 14, 'Colocación de Zumbador de Timbre', 'NULL', 100, '2019-01-24 05:00:00', '2019-01-24 05:00:00'),
(11, 2, 16, 'Fumigación en propiedad o en muebles de madera', 'NULL', 100, '2019-01-24 05:00:00', '2019-01-24 05:00:00'),
(12, 2, 17, 'Mantenimiento y Reconstrucción de Muebles', 'NULL', 100, '2019-01-24 04:00:00', '2019-01-24 04:00:00'),
(13, 2, 17, 'Fabricación de Muebles en General', 'NULL', 100, '2019-01-24 03:00:00', '2019-01-24 03:00:00'),
(44, 2, 11, 'Mantenimiento de Aires Acondicionados (hasta 18,000 BTUS)', 'NULL', 700, '2019-01-24 04:00:00', '2019-01-24 04:00:00'),
(45, 2, 11, 'Instalación básica de Aires Acondicionados - 12,000 BTUS', 'NULL', 1500, '2019-01-24 03:00:00', '2019-01-24 03:00:00'),
(46, 2, 11, 'Instalación básica de Aires Acondicionados - 18,000 BTUS', 'NULL', 1500, '2019-01-24 05:00:00', '2019-01-24 05:00:00'),
(47, 2, 15, 'Reparación de fugas en general', 'NULL', 100, '2019-02-22 09:09:00', NULL),
(48, 2, 15, 'Colocación de tarja de cocina', 'NULL', 100, '2019-02-22 09:00:00', NULL),
(49, 2, 15, 'Cambio de llave mezcladora de tarja o lavabo', 'NULL', 100, '2019-02-22 09:00:00', NULL),
(50, 2, 15, 'Cambio de contra canasta en tarja de cocina', 'NULL', 100, '2019-02-22 09:00:00', NULL),
(51, 2, 15, 'Cambio de cespol en tarja o lavabo', 'NULL', 100, '2019-02-22 09:00:00', NULL),
(52, 2, 15, 'Cambio de mangueras en tarja, lavabo y wc', 'NULL', 100, '2019-02-22 09:00:00', NULL),
(53, 2, 15, 'Colocación de llave de nariz', 'NULL', 100, '2019-02-22 09:00:00', NULL),
(54, 2, 15, 'Colocación de llave angular', 'NULL', 100, '2019-02-22 09:00:00', NULL),
(55, 2, 15, 'Colocación de lavabo y wc', 'NULL', 100, '2019-02-22 09:00:00', NULL),
(56, 2, 15, 'Mantenimiento y sustitución de sistemas hidroneumáticos', 'NULL', 100, '2019-02-22 09:00:00', NULL),
(57, 2, 15, 'Mantenimiento a cisternas', 'NULL', 100, '2019-02-22 09:00:00', NULL),
(58, 2, 15, 'Colocación de accesorios en baño (toallero, porta papel, regaderas, coladeras de rejilla etc.)', 'NULL', 100, '2019-02-22 09:00:00', NULL),
(59, 2, 15, 'Colocación de herrajes en wc (torre de llenado y torre de descarga)', 'NULL', 100, '2019-02-22 09:00:00', NULL),
(60, 2, 15, 'Mantenimiento de tanques hidroneumáticos e instalación de sistemas hidroneumáticos', 'NULL', 100, '2019-02-22 09:00:00', NULL),
(61, 2, 15, 'Mantenimiento y colocación de boiler de tanque o de paso', 'NULL', 100, '2019-02-22 09:00:00', NULL),
(62, 2, 15, 'Lavado de tinaco', 'NULL', 100, '2019-02-22 09:00:00', NULL),
(63, 2, 15, 'Sopleteo de tubería de alimentación de línea hidráulica principal', 'NULL', 100, '2019-02-22 09:00:00', NULL),
(64, 2, 15, 'Desasolve de tuberías sanitarias', 'NULL', 100, '2019-02-22 09:00:00', NULL),
(65, 2, 15, 'Colocación de electro nivel en cisterna o tinaco', 'NULL', 100, '2019-02-22 09:00:00', NULL),
(66, 2, 18, 'Construcción de casas y departamentos', 'NULL', 100, '2019-02-22 09:00:00', NULL),
(67, 2, 18, 'Remodelaciones y ampliaciones', 'NULL', 100, '2019-02-22 09:00:00', NULL),
(68, 2, 18, 'Construcción de albercas y cisternas', 'NULL', 100, '2019-02-22 09:00:00', NULL),
(69, 2, 18, 'Fabricación de pisos terrazos', 'NULL', 100, '2019-02-22 09:00:00', NULL),
(71, 5, 10, 'Pintura', 'Comex', 0, '2019-02-27 12:00:00', NULL),
(72, 5, 10, 'Impermeabilizado', 'Comex', 0, '2019-02-27 12:00:00', NULL),
(73, 5, 10, 'Precio solamente', 'Andy', 500, '2019-02-27 12:00:00', NULL),
(75, 5, 24, 'gggg', 'ffff', 565, '2019-03-04 16:13:59', '2019-03-04 16:33:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `smithy_data`
--

DROP TABLE IF EXISTS `smithy_data`;
CREATE TABLE IF NOT EXISTS `smithy_data` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `service_description_id` int(255) DEFAULT NULL,
  `visitors_id` int(255) DEFAULT NULL,
  `base` float DEFAULT NULL,
  `height` float DEFAULT NULL,
  `square_maters` float DEFAULT NULL,
  `price` float DEFAULT NULL,
  `comments` text,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_smithy_data_data_service_description` (`service_description_id`),
  KEY `fk_smithy_data_data_visitors` (`visitors_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `lastname` varchar(150) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role_user` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `password`, `role_user`, `created_at`) VALUES
(2, 'Juan Enrique', 'Amaya Ku', 'amayajuan95@gmail.com', 'adja2019', 'ROLE_ADMIN', '2019-01-21 04:00:00'),
(5, 'Andy', 'Ayala', 'andy@andy.com', '$2y$04$924eskgLxbLXoVHtztH.r.exGJT8kfhzeBxjpxoUB4gHBl63SlOGS', 'ROLE_ADMIN', '2019-02-25 22:54:15'),
(10, 'Pedro', 'Messi', 'pedro@pedro.com', '$2y$04$Vvopaxl7.nItajDRhl6qO.pvsXQOTIFC1nbIetyM75x.wIBiwMHiK', 'ROLE_USER', '2019-02-26 23:14:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitors`
--

DROP TABLE IF EXISTS `visitors`;
CREATE TABLE IF NOT EXISTS `visitors` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `visitors`
--

INSERT INTO `visitors` (`id`, `name`, `created_at`) VALUES
(1, 'visitante', '2019-03-01 11:00:00'),
(2, 'visitante', '2019-03-01 10:00:00'),
(3, 'visitante', '2019-03-01 15:46:57'),
(4, 'visitante', '2019-03-01 15:54:50'),
(5, 'visitante', '2019-03-01 16:39:42'),
(6, 'visitante', '2019-03-01 16:41:37'),
(7, 'visitante', '2019-03-01 16:42:08'),
(8, 'visitante', '2019-03-01 16:50:29'),
(9, 'visitante', '2019-03-01 21:29:00'),
(10, 'visitante', '2019-03-01 21:31:39'),
(11, 'visitante', '2019-03-01 21:32:29'),
(12, 'visitante', '2019-03-01 21:33:28'),
(13, 'visitante', '2019-03-01 21:39:58'),
(14, 'visitante', '2019-03-01 21:42:12'),
(15, 'visitante', '2019-03-01 22:38:12'),
(16, 'visitante', '2019-03-01 22:42:23'),
(17, 'visitante', '2019-03-01 22:43:10'),
(18, 'visitante', '2019-03-01 22:45:42'),
(19, 'visitante', '2019-03-01 22:46:25'),
(20, 'visitante', '2019-03-01 22:46:58'),
(21, 'visitante', '2019-03-01 22:48:42'),
(22, 'visitante', '2019-03-01 22:49:38'),
(23, 'visitante', '2019-03-02 13:31:49'),
(24, 'visitante', '2019-03-02 13:33:11'),
(25, 'visitante', '2019-03-02 14:00:37'),
(26, 'visitante', '2019-03-04 13:30:19'),
(27, 'visitante', '2019-03-04 14:33:33'),
(28, 'visitante', '2019-03-04 15:17:26'),
(29, 'visitante', '2019-03-04 15:17:44'),
(30, 'visitante', '2019-03-05 16:09:13'),
(31, 'visitante', '2019-03-05 18:44:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `waterproofing_data`
--

DROP TABLE IF EXISTS `waterproofing_data`;
CREATE TABLE IF NOT EXISTS `waterproofing_data` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `service_description_id` int(255) DEFAULT NULL,
  `visitors_id` int(255) DEFAULT NULL,
  `base` float DEFAULT NULL,
  `height` float DEFAULT NULL,
  `square_maters` float DEFAULT NULL,
  `price` float DEFAULT NULL,
  `comments` text,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_waterproofing_data_service_description` (`service_description_id`),
  KEY `fk_waterproofing_data_visitors` (`visitors_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `waterproofing_data`
--

INSERT INTO `waterproofing_data` (`id`, `service_description_id`, `visitors_id`, `base`, `height`, `square_maters`, `price`, `comments`, `created_at`) VALUES
(1, 72, 23, 10, 5, 50, 5000, 'k', '2019-03-02 13:31:50'),
(2, 72, 24, 10, 5, 50, 5000, 'k', '2019-03-02 13:33:14'),
(3, 72, 25, 12, 12, 144, 1000, 'g', '2019-03-02 14:00:37'),
(4, 72, 26, 10, 5, 50, 1000, 'g', '2019-03-04 13:30:20');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `air_conditioner_data`
--
ALTER TABLE `air_conditioner_data`
  ADD CONSTRAINT `fk_air_conditioner_data_service_description` FOREIGN KEY (`service_description_id`) REFERENCES `service_description` (`id`),
  ADD CONSTRAINT `fk_air_conditioner_data_visitors` FOREIGN KEY (`visitors_id`) REFERENCES `visitors` (`id`);

--
-- Filtros para la tabla `bardeados_data`
--
ALTER TABLE `bardeados_data`
  ADD CONSTRAINT `fk_bardeados_data_service_description` FOREIGN KEY (`service_description_id`) REFERENCES `service_description` (`id`),
  ADD CONSTRAINT `fk_bardeados_data_visitors` FOREIGN KEY (`visitors_id`) REFERENCES `visitors` (`id`);

--
-- Filtros para la tabla `carpentry_data`
--
ALTER TABLE `carpentry_data`
  ADD CONSTRAINT `fk_carpentry_data_service_description` FOREIGN KEY (`service_description_id`) REFERENCES `service_description` (`id`),
  ADD CONSTRAINT `fk_carpentry_data_visitors` FOREIGN KEY (`visitors_id`) REFERENCES `visitors` (`id`);

--
-- Filtros para la tabla `drywall_data`
--
ALTER TABLE `drywall_data`
  ADD CONSTRAINT `fk_drywall_data_service_description` FOREIGN KEY (`service_description_id`) REFERENCES `service_description` (`id`),
  ADD CONSTRAINT `fk_drywall_data_visitors` FOREIGN KEY (`visitors_id`) REFERENCES `visitors` (`id`);

--
-- Filtros para la tabla `electricity_data`
--
ALTER TABLE `electricity_data`
  ADD CONSTRAINT `fk_electricity_data_service_description` FOREIGN KEY (`service_description_id`) REFERENCES `service_description` (`id`),
  ADD CONSTRAINT `fk_electricity_data_visitors` FOREIGN KEY (`visitors_id`) REFERENCES `visitors` (`id`);

--
-- Filtros para la tabla `estimate`
--
ALTER TABLE `estimate`
  ADD CONSTRAINT `fk_estimate_service_description` FOREIGN KEY (`service_description_id`) REFERENCES `service_description` (`id`),
  ADD CONSTRAINT `fk_estimate_visitors_is` FOREIGN KEY (`visitors_id`) REFERENCES `visitors` (`id`);

--
-- Filtros para la tabla `floor_placement_data`
--
ALTER TABLE `floor_placement_data`
  ADD CONSTRAINT `fk_floor_placement_data_service_description` FOREIGN KEY (`service_description_id`) REFERENCES `service_description` (`id`),
  ADD CONSTRAINT `fk_floor_placement_data_visitors` FOREIGN KEY (`visitors_id`) REFERENCES `visitors` (`id`);

--
-- Filtros para la tabla `fumigation_data`
--
ALTER TABLE `fumigation_data`
  ADD CONSTRAINT `fk_fumigation_data_service_description` FOREIGN KEY (`service_description_id`) REFERENCES `service_description` (`id`),
  ADD CONSTRAINT `fk_fumigation_data_visitors` FOREIGN KEY (`visitors_id`) REFERENCES `visitors` (`id`);

--
-- Filtros para la tabla `interior_decoration_data`
--
ALTER TABLE `interior_decoration_data`
  ADD CONSTRAINT `fk_interior_decoration_data_service_description` FOREIGN KEY (`service_description_id`) REFERENCES `service_description` (`id`),
  ADD CONSTRAINT `fk_interior_decoration_data_visitors` FOREIGN KEY (`visitors_id`) REFERENCES `visitors` (`id`);

--
-- Filtros para la tabla `masonry_data`
--
ALTER TABLE `masonry_data`
  ADD CONSTRAINT `fk_masonry_data_service_description` FOREIGN KEY (`service_description_id`) REFERENCES `service_description` (`id`),
  ADD CONSTRAINT `fk_masonry_data_visitors` FOREIGN KEY (`visitors_id`) REFERENCES `visitors` (`id`);

--
-- Filtros para la tabla `paint_data`
--
ALTER TABLE `paint_data`
  ADD CONSTRAINT `fk_paint_data_service_description` FOREIGN KEY (`service_description_id`) REFERENCES `service_description` (`id`),
  ADD CONSTRAINT `fk_paint_data_visitors` FOREIGN KEY (`visitors_id`) REFERENCES `visitors` (`id`);

--
-- Filtros para la tabla `plumbing_data`
--
ALTER TABLE `plumbing_data`
  ADD CONSTRAINT `fk_plumbing_data_service_description` FOREIGN KEY (`service_description_id`) REFERENCES `service_description` (`id`),
  ADD CONSTRAINT `fk_plumbing_data_visitors` FOREIGN KEY (`visitors_id`) REFERENCES `visitors` (`id`);

--
-- Filtros para la tabla `service_category`
--
ALTER TABLE `service_category`
  ADD CONSTRAINT `fk_service_category_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `service_description`
--
ALTER TABLE `service_description`
  ADD CONSTRAINT `fk_service_description_service_category` FOREIGN KEY (`service_category_id`) REFERENCES `service_category` (`id`),
  ADD CONSTRAINT `fk_service_description_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `smithy_data`
--
ALTER TABLE `smithy_data`
  ADD CONSTRAINT `fk_smithy_data_data_service_description` FOREIGN KEY (`service_description_id`) REFERENCES `service_description` (`id`),
  ADD CONSTRAINT `fk_smithy_data_data_visitors` FOREIGN KEY (`visitors_id`) REFERENCES `visitors` (`id`);

--
-- Filtros para la tabla `waterproofing_data`
--
ALTER TABLE `waterproofing_data`
  ADD CONSTRAINT `fk_waterproofing_data_service_description` FOREIGN KEY (`service_description_id`) REFERENCES `service_description` (`id`),
  ADD CONSTRAINT `fk_waterproofing_data_visitors` FOREIGN KEY (`visitors_id`) REFERENCES `visitors` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

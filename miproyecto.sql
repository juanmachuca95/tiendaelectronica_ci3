-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: mariadb
-- Tiempo de generación: 16-06-2021 a las 23:50:18
-- Versión del servidor: 10.5.9-MariaDB-1:10.5.9+maria~focal
-- Versión de PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `miproyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(5) NOT NULL,
  `categoria` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `created_at`, `updated_at`) VALUES
(3, 'Remeras', '2021-06-08 17:43:16', NULL),
(4, 'Pastelitos', '2021-06-08 17:53:05', NULL),
(5, 'Calendarios', '2021-06-08 21:55:25', NULL),
(6, 'Tazas', '2021-06-16 16:04:32', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comercios`
--

CREATE TABLE `comercios` (
  `id` int(11) NOT NULL,
  `comercio` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mercadopago_key` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comercios`
--

INSERT INTO `comercios` (`id`, `comercio`, `descripcion`, `direccion`, `telefono`, `email`, `mercadopago_key`, `imagen`, `created_at`, `updated_at`) VALUES
(1, 'SouvenirsZN', 'Tienda de regalos dedicado a la venta de productos personalizados de todo tipo.', 'Castelli 1198 Corrientes, Capital.', '03794 690474', 'info@souvenirszn.com', 'TEST-4090271750620604-060403-e7a5c21fc7bdb369d779393cee8f4109-536258140', 'http://machucajuan.test/assets/img/logos/logo.png', '2021-06-11 23:24:20', '2021-06-14 12:07:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `leido` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `leido` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles`
--

CREATE TABLE `detalles` (
  `id` int(11) NOT NULL,
  `orden_id` int(11) NOT NULL,
  `productos_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalles`
--

INSERT INTO `detalles` (`id`, `orden_id`, `productos_id`, `cantidad`, `precio_unitario`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, '180.00', '180.00', '2021-06-12 14:47:07', NULL),
(2, 2, 3, 1, '180.00', '180.00', '2021-06-12 15:02:36', NULL),
(3, 3, 3, 1, '180.00', '180.00', '2021-06-12 15:04:42', NULL),
(4, 4, 3, 1, '180.00', '180.00', '2021-06-12 16:04:42', NULL),
(5, 5, 3, 2, '180.00', '360.00', '2021-06-12 16:21:19', NULL),
(6, 6, 3, 1, '180.00', '220.00', '2021-06-12 22:42:10', NULL),
(7, 6, 10, 1, '40.00', '220.00', '2021-06-12 22:42:11', NULL),
(8, 7, 3, 2, '180.00', '360.00', '2021-06-12 22:58:28', NULL),
(9, 7, 10, 2, '40.00', '80.00', '2021-06-12 22:58:28', NULL),
(10, 8, 3, 1, '180.00', '180.00', '2021-06-12 23:28:17', NULL),
(11, 8, 10, 3, '40.00', '120.00', '2021-06-12 23:28:17', NULL),
(12, 9, 10, 3, '40.00', '120.00', '2021-06-13 14:05:12', NULL),
(13, 10, 10, 3, '40.00', '120.00', '2021-06-13 14:06:00', NULL),
(14, 11, 3, 1, '180.00', '180.00', '2021-06-13 22:06:54', NULL),
(15, 12, 10, 2, '40.00', '80.00', '2021-06-14 17:03:13', NULL),
(16, 13, 10, 3, '40.00', '120.00', '2021-06-14 17:20:13', NULL),
(17, 14, 3, 1, '180.00', '180.00', '2021-06-15 22:57:41', NULL),
(18, 15, 10, 1, '40.00', '40.00', '2021-06-15 22:58:25', NULL),
(19, 16, 10, 2, '40.00', '80.00', '2021-06-15 23:02:32', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `users_id` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `status` enum('pendiente','pagado','impago') NOT NULL DEFAULT 'pendiente',
  `tipopago` enum('contraentrega','online') NOT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`id`, `total`, `users_id`, `activo`, `status`, `tipopago`, `payment_id`, `created_at`, `updated_at`) VALUES
(1, '180.00', 63, 1, 'impago', 'online', NULL, '2021-06-12 14:47:07', NULL),
(2, '180.00', 64, 1, 'impago', 'online', NULL, '2021-06-12 15:02:36', NULL),
(3, '180.00', 65, 1, 'pagado', 'online', 1237523178, '2021-06-12 15:04:42', NULL),
(4, '180.00', 66, 1, 'pagado', 'online', 1237523316, '2021-06-12 16:04:42', NULL),
(5, '360.00', 67, 1, 'pendiente', 'contraentrega', NULL, '2021-06-12 16:21:19', NULL),
(6, '220.00', 68, 1, 'pendiente', 'online', 1237524398, '2021-06-12 22:42:10', NULL),
(7, '440.00', 2, 1, 'pendiente', 'contraentrega', NULL, '2021-06-12 22:58:28', NULL),
(8, '300.00', 2, 1, 'pagado', 'online', 1237526234, '2021-06-12 23:28:17', NULL),
(9, '120.00', 2, 1, 'pendiente', 'online', NULL, '2021-06-13 14:05:12', NULL),
(10, '120.00', 2, 1, 'pendiente', 'contraentrega', NULL, '2021-06-13 14:05:58', NULL),
(11, '180.00', 69, 1, 'pendiente', 'online', 1237531243, '2021-06-13 22:06:54', NULL),
(12, '80.00', 2, 1, 'pendiente', 'contraentrega', NULL, '2021-06-14 17:03:12', NULL),
(13, '120.00', 70, 1, 'pendiente', 'contraentrega', NULL, '2021-06-14 17:20:13', NULL),
(14, '180.00', 77, 1, 'pendiente', 'contraentrega', NULL, '2021-06-15 22:57:41', NULL),
(15, '40.00', 78, 1, 'pendiente', 'online', 1237601072, '2021-06-15 22:58:25', NULL),
(16, '80.00', 2, 1, 'pendiente', 'contraentrega', NULL, '2021-06-15 23:02:32', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `producto` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `categorias_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `producto`, `imagen`, `descripcion`, `precio`, `stock`, `activo`, `categorias_id`, `created_at`, `updated_at`) VALUES
(12, 'Calendarios 2021', 'http://machucajuan.test/assets/productos/calendarios_2021.png', 'Calendarios 2021 para regalar.', '250.00', 100, 1, 5, '2021-06-16 16:08:07', NULL),
(13, 'Calendarios para regalar', 'http://machucajuan.test/assets/productos/calendarios_añonuevo.jpg', 'Calendarios para regalar a tus amigos o familiares.', '150.00', 100, 1, 5, '2021-06-16 16:13:21', NULL),
(15, 'Calendarios personalizados', 'http://machucajuan.test/assets/productos/calendarios_popular.jpg', 'Calendarios personalizados para regalar a amigos y familiares.', '200.00', 120, 0, 5, '2021-06-16 16:26:04', NULL),
(16, 'Tazas personalizadas', 'http://machucajuan.test/assets/productos/tazas_personalizada.jpg', 'Tazas personalizadas para regalar', '150.00', 99, 1, 6, '2021-06-16 16:34:58', NULL),
(17, 'Tazas con tematica', 'http://machucajuan.test/assets/productos/tazas_homero.jpg', 'Tazas tematicas de homero.', '200.00', 100, 1, 6, '2021-06-16 16:37:21', NULL),
(18, 'Tazas ', 'http://machucajuan.test/assets/productos/tazas_fortnite.jpg', 'Tazas tematicas estilo fortnite.', '19.99', 250, 1, 6, '2021-06-16 16:39:02', NULL),
(19, 'Tazas con marca', 'http://machucajuan.test/assets/productos/tazas_marca.jpg', 'Tazas con la marca que más te gusta. ', '200.00', 200, 1, 6, '2021-06-16 16:41:02', NULL),
(20, 'Tazas con tu nombre', 'http://machucajuan.test/assets/productos/tazas_nombre.jpg', 'Tazas con tu nombre', '190.00', 100, 1, 6, '2021-06-16 16:42:57', NULL),
(21, 'Tazas de regalo', 'http://machucajuan.test/assets/productos/tazas_regalo.jpg', 'Tazas para regalar.', '80.00', 100, 1, 6, '2021-06-16 16:45:32', NULL),
(22, 'Pastelitos para chicos', 'http://machucajuan.test/assets/productos/pastelitos_regalos.jpg', 'Pastelitos de meregue para chicos.', '190.00', 93, 1, 4, '2021-06-16 16:48:38', NULL),
(23, 'Pastelitos para cumpleaños', 'http://machucajuan.test/assets/productos/pastelitos_merengue.jpg', 'Pastelitos para regalar en cumpleaños.', '50.00', 180, 1, 4, '2021-06-16 16:50:57', NULL),
(24, 'Pastelitos emojis', 'http://machucajuan.test/assets/productos/pastelitos_emojis.jpg', 'Pastelitos de emojis de todas las caras.', '400.00', 10, 1, 4, '2021-06-16 16:52:37', NULL),
(25, 'Pastelitos tematicos', 'http://machucajuan.test/assets/productos/pasteles_emojis_regalo.jpg', 'Pasteles tematicos, con tema de emojis.', '300.00', 10, 1, 4, '2021-06-16 16:57:22', NULL),
(26, 'Remeras negras', 'http://machucajuan.test/assets/productos/remera_negra.jpg', 'Remeras negras para hombre.', '500.00', 100, 1, 3, '2021-06-16 16:58:30', NULL),
(27, 'Remeras con marca', 'http://machucajuan.test/assets/productos/remera_marca.jpg', 'Remeras con marca para regalar.', '870.00', 100, 1, 3, '2021-06-16 17:01:09', NULL),
(28, 'Remeras para papá', 'http://machucajuan.test/assets/productos/remera_papa.jpg', 'Remeras para regalar a papá.', '900.00', 4, 1, 3, '2021-06-16 17:03:26', NULL),
(29, 'Remeras para mamá', 'http://machucajuan.test/assets/productos/remera_mama.jpg', 'Remeras para el día de la madre.', '540.00', 96, 1, 3, '2021-06-16 17:04:42', NULL),
(30, 'Remeras de river', 'http://machucajuan.test/assets/productos/remera_river.jpg', 'Remeras con logo de river y frase.', '800.00', 100, 1, 3, '2021-06-16 17:10:26', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `roles_id` int(11) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellido`, `email`, `password`, `roles_id`, `direccion`, `telefono`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'Juan', 'Machuca', 'admin@gmail.com', '$2y$10$23TmQeYLAKNiYQrpaSduOOigCGgOUP/UyWyu4CkyT2swqtVRtj5/O', 1, NULL, NULL, 1, '2021-06-04 00:50:31', '2021-06-04 00:49:36'),
(2, 'Juan Usuario', 'Machuca', 'usuario@gmail.com', '$2y$10$23TmQeYLAKNiYQrpaSduOOigCGgOUP/UyWyu4CkyT2swqtVRtj5/O', 2, 'Castelli 1198', '3794690474', 1, '2021-06-04 01:28:03', '2021-06-04 01:27:18'),
(14, 'Eoma', 'Tybakthtmaratakaah', 'ju@otna.mp', '$2y$10$VCTplnaQNLpFhHpy76u2reJFbdlYgQlr3UaogL2SoVZMxM9AB0/D2', 2, NULL, NULL, 1, '2021-06-11 14:24:38', NULL),
(15, 'N', 'Hkhnvlma', NULL, NULL, 2, '\'lmgg Ra\'ortgr', 'Ku naD \'', 1, '2021-06-11 14:42:47', NULL),
(16, 'HKa', 'Inw hh', NULL, NULL, 2, 'Yhab', 'R u pbl alh', 1, '2021-06-11 14:44:59', NULL),
(20, 'Nkauea', 'B ghC', NULL, NULL, 2, 'AtaUn', 'Ioauak', 1, '2021-06-11 18:47:04', NULL),
(21, 'puv@cumi.aw', 'AgaaeOtgah  \'n', 'puv@cumi.aw', NULL, 2, 'Bigiaervm w', 'Tmoubalaath', 1, '2021-06-11 19:22:29', NULL),
(22, 'rudatfus@ur.td', 'UDlhheanmai', 'rudatfus@ur.td', NULL, 2, 'Rhg', 'Mysula', 1, '2021-06-11 22:33:06', NULL),
(23, 'av@wug.sj', 'Ytupnnmmeh', 'av@wug.sj', NULL, 2, 'T ba', 'Au', 1, '2021-06-11 23:01:07', NULL),
(24, 'cu@ufcujhun.mk', 'Apu', 'cu@ufcujhun.mk', NULL, 2, 'Gl a ll', 'Omm', 1, '2021-06-11 23:03:06', NULL),
(27, 'gedzehog@zawam.nz', 'Yahaa at r', 'gedzehog@zawam.nz', NULL, 2, 'Kafuol u', 'Tmn UytaaUhg', 1, '2021-06-11 23:07:40', NULL),
(28, 'pinihaku@hi.gu', 'Cv vanmChm', 'pinihaku@hi.gu', NULL, 2, 'Ehrw', 'GawCnvaaat', 1, '2021-06-11 23:28:31', NULL),
(29, 'givi@zac.jm', 'A n inaaoetop', 'givi@zac.jm', NULL, 2, 'Aompnaianeagaev', 'TfUabauh stD', 1, '2021-06-12 00:06:43', NULL),
(30, 'boj@fo.eh', 'Aaau', 'boj@fo.eh', NULL, 2, 'S', 'Sughnh tn', 1, '2021-06-12 00:50:22', NULL),
(32, 'boj@fo.eh', 'Aaau', 'boj@fo.eh', NULL, 2, 'S', 'Sughnh tn', 1, '2021-06-12 01:06:23', NULL),
(33, 'boj@fo.eh', 'Aaau', 'boj@fo.eh', NULL, 2, 'S', 'Sughnh tn', 1, '2021-06-12 01:06:58', NULL),
(34, 'boj@fo.eh', 'Aaau', 'boj@fo.eh', NULL, 2, 'S', 'Sughnh tn', 1, '2021-06-12 01:07:35', NULL),
(35, 'boj@fo.eh', 'Aaau', 'boj@fo.eh', NULL, 2, 'S', 'Sughnh tn', 1, '2021-06-12 01:08:12', NULL),
(36, 'boj@fo.eh', 'Aaau', 'boj@fo.eh', NULL, 2, 'S', 'Sughnh tn', 1, '2021-06-12 01:08:26', NULL),
(37, 'boj@fo.eh', 'Aaau', 'boj@fo.eh', NULL, 2, 'S', 'Sughnh tn', 1, '2021-06-12 01:09:44', NULL),
(38, 'boj@fo.eh', 'Aaau', 'boj@fo.eh', NULL, 2, 'S', 'Sughnh tn', 1, '2021-06-12 01:10:09', NULL),
(39, 'boj@fo.eh', 'Aaau', 'boj@fo.eh', NULL, 2, 'S', 'Sughnh tn', 1, '2021-06-12 01:11:45', NULL),
(40, 'faafa@afpumoga.sh', 'A g\' s a', 'faafa@afpumoga.sh', NULL, 2, 'Abat aott', 'Aknohamra Ks', 1, '2021-06-12 01:13:02', NULL),
(41, 'faafa@afpumoga.sh', 'A g\' s a', 'faafa@afpumoga.sh', NULL, 2, 'Abat aott', 'Aknohamra Ks', 1, '2021-06-12 01:13:57', NULL),
(42, 'faafa@afpumoga.sh', 'A g\' s a', 'faafa@afpumoga.sh', NULL, 2, 'Abat aott', 'Aknohamra Ks', 1, '2021-06-12 01:15:44', NULL),
(43, 'faafa@afpumoga.sh', 'A g\' s a', 'faafa@afpumoga.sh', NULL, 2, 'Abat aott', 'Aknohamra Ks', 1, '2021-06-12 01:16:37', NULL),
(44, 'faafa@afpumoga.sh', 'A g\' s a', 'faafa@afpumoga.sh', NULL, 2, 'Abat aott', 'Aknohamra Ks', 1, '2021-06-12 01:17:29', NULL),
(45, 'faafa@afpumoga.sh', 'A g\' s a', 'faafa@afpumoga.sh', NULL, 2, 'Abat aott', 'Aknohamra Ks', 1, '2021-06-12 01:18:26', NULL),
(46, 'faafa@afpumoga.sh', 'A g\' s a', 'faafa@afpumoga.sh', NULL, 2, 'Abat aott', 'Aknohamra Ks', 1, '2021-06-12 01:19:23', NULL),
(47, 'faafa@afpumoga.sh', 'A g\' s a', 'faafa@afpumoga.sh', NULL, 2, 'Abat aott', 'Aknohamra Ks', 1, '2021-06-12 01:19:26', NULL),
(48, 'faafa@afpumoga.sh', 'A g\' s a', 'faafa@afpumoga.sh', NULL, 2, 'Abat aott', 'Aknohamra Ks', 1, '2021-06-12 01:19:41', NULL),
(49, 'faafa@afpumoga.sh', 'A g\' s a', 'faafa@afpumoga.sh', NULL, 2, 'Abat aott', 'Aknohamra Ks', 1, '2021-06-12 01:20:01', NULL),
(50, 'zeefaha@do.nc', 'Aa wa', 'zeefaha@do.nc', NULL, 2, 'Ea htblanao', 'Aatye hy h', 1, '2021-06-12 01:21:57', NULL),
(51, 'cido@wemwag.ye', 'Klkg hnuun', 'cido@wemwag.ye', NULL, 2, 'EhayrhOaw', 'Sp fatnayta', 1, '2021-06-12 11:59:23', NULL),
(52, 'defjufij@naf.bm', 'TamgA tbuta', 'defjufij@naf.bm', NULL, 2, 'Uak', 'Att elaau', 1, '2021-06-12 12:08:37', NULL),
(53, 'hebwo@pi.sz', 'Nno', 'hebwo@pi.sz', NULL, 2, 'E Ragaiun', 'Starb', 1, '2021-06-12 12:22:45', NULL),
(54, 'anmami@huvazeca.bi', 'Hhhuyah', 'anmami@huvazeca.bi', NULL, 2, 'Oluem  vhananma', 'At iaawah', 1, '2021-06-12 12:23:17', NULL),
(55, 'wiji@pep.yt', 'Pm wCay bane', 'wiji@pep.yt', NULL, 2, 'Ry\' eeraah', 'A', 1, '2021-06-12 12:25:02', NULL),
(56, 'wu@ovforuc.py', 'Awtoaphaaa', 'wu@ovforuc.py', NULL, 2, 'H', 'AtaghOltaat', 1, '2021-06-12 13:07:03', NULL),
(57, 'wu@tepife.aq', 'Ueum ag hw C', 'wu@tepife.aq', NULL, 2, 'Ha  a aiaphre', 'N a n', 1, '2021-06-12 13:07:24', NULL),
(58, 'wu@tepife.aq', 'Ueum ag hw C', 'wu@tepife.aq', NULL, 2, 'Ha  a aiaphre', 'N a n', 1, '2021-06-12 13:25:46', NULL),
(59, 'tugihe@tabemida.eu', 'Alkft', 'tugihe@tabemida.eu', NULL, 2, 'Sr', 'Tkauui wmnbfu', 1, '2021-06-12 13:31:18', NULL),
(60, 'jazag@evu.tv', 'Yasr\'lm', 'jazag@evu.tv', NULL, 2, 'HOahh', 'Vaa e', 1, '2021-06-12 13:54:45', NULL),
(61, 'jazag@evu.tv', 'Yasr\'lm', 'jazag@evu.tv', NULL, 2, 'HOahh', 'Vaa e', 1, '2021-06-12 14:01:37', NULL),
(62, 'pup@suzhada.af', 'Ttui a ana', 'pup@suzhada.af', NULL, 2, 'Om\'uiahsCrnmb', 'Unnautg nn gn', 1, '2021-06-12 14:02:38', NULL),
(63, 'vogig@bojniwebo.jm', 'Gn e natyK', 'admin@gmail.com', NULL, 2, 'Totap Kialnl', 'K aa DCi laa', 1, '2021-06-12 14:47:07', NULL),
(64, 'akpuzi@hakzucu.gt', 'Amagifhm n', 'admin@gmail.com', NULL, 2, 'T', 'Eha', 1, '2021-06-12 15:02:36', NULL),
(65, 'buwrumdet@inko.br', '\'gAphytr kmos', 'admin@gmail.com', NULL, 2, 'T', 'Raa g', 1, '2021-06-12 15:04:42', NULL),
(66, 'tininfe@pumut.eg', 'Tlepp', 'admin@gmail.com', NULL, 2, 'A ata', 'Piuh', 1, '2021-06-12 16:04:42', NULL),
(67, 'bejoso@ki.cw', 'BuhatgahU m', 'admin@gmail.com', NULL, 2, 'Hbla thklpo hha', 'Waa raot', 1, '2021-06-12 16:21:19', NULL),
(68, 'cunel@opmaowi.ni', 'IgtgloDaU', 'admin@gmail.com', NULL, 2, 'Hbaaa', 'Lkt a', 1, '2021-06-12 22:42:10', NULL),
(69, 'laura', 'ifran', 'laura@gmail.com', NULL, 2, 'Castelli 1198', '3794089841', 1, '2021-06-13 22:06:54', NULL),
(81, 'Em fhittn  iaahlalatKektangbkr', 'Ntaf  gpe uk', 'vi@fasno.ac', '$2y$10$GveYcU/J24gjcIae7W66e.CSph2xi9/IA.4RPvmgHAX2a4iuGIE3C', 2, NULL, NULL, 1, '2021-06-16 18:34:46', NULL),
(82, 'Em fhittn  iaahlalatKektangbkr', 'Ntaf  gpe uk', 'vi@fasno.ac', '$2y$10$gjP2fw8kLt8TILCiJzhXweWByTux935fav/Llz99zkR7eztfEoP92', 2, NULL, NULL, 1, '2021-06-16 18:35:17', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comercios`
--
ALTER TABLE `comercios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `comercio` (`comercio`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalles`
--
ALTER TABLE `detalles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rol` (`rol`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `comercios`
--
ALTER TABLE `comercios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detalles`
--
ALTER TABLE `detalles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

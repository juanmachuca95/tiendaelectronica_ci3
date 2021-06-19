-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 19-06-2021 a las 17:05:44
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

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
(1, 'SouvenirsZN', 'Tienda de regalos dedicado a la venta de productos personalizados de todo tipo.', 'Castelli 1198 Corrientes, Capital.', '03794 690474', 'info@souvenirszn.com', 'TEST-4090271750620604-060403-e7a5c21fc7bdb369d779393cee8f4109-536258140', 'http://localhost/machucajuan/assets/img/logos/logo.png', '2021-06-11 23:24:20', '2021-06-14 12:07:25');

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

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id`, `nombre`, `email`, `descripcion`, `leido`, `created_at`, `update_at`) VALUES
(21, 'Nahuel Almeida', 'nahuel@gmail.com', 'Buenas tardes. Me gustaria saber si hacen bolsas con logo de empresa. ', 1, '2021-06-18 14:55:58', NULL);

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
(1, 1, 26, 1, '500.00', '500.00', '2021-06-18 14:16:16', NULL),
(2, 1, 27, 3, '870.00', '2610.00', '2021-06-18 14:16:16', NULL),
(3, 2, 29, 2, '540.00', '1080.00', '2021-06-18 14:46:50', NULL),
(4, 3, 25, 1, '300.00', '300.00', '2021-06-18 15:15:41', NULL),
(5, 4, 22, 1, '190.00', '190.00', '2021-06-18 16:31:20', NULL),
(6, 4, 27, 4, '870.00', '3480.00', '2021-06-18 16:31:20', NULL),
(7, 5, 26, 3, '500.00', '1500.00', '2021-06-19 11:34:43', NULL),
(8, 6, 26, 1, '500.00', '500.00', '2021-06-19 11:38:53', NULL),
(9, 7, 17, 2, '200.00', '400.00', '2021-06-19 11:46:16', NULL),
(10, 8, 20, 2, '190.00', '380.00', '2021-06-19 11:48:30', NULL);

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
(1, '3110.00', 5, 1, 'pagado', 'online', 1237695841, '2021-06-18 14:16:16', NULL),
(2, '1080.00', 7, 1, 'pendiente', 'contraentrega', NULL, '2021-06-18 14:46:49', NULL),
(3, '300.00', 12, 1, 'pagado', 'online', 1237699605, '2021-06-18 15:15:40', NULL),
(4, '3670.00', 7, 1, 'pagado', 'online', 1237704027, '2021-06-18 16:31:19', NULL),
(5, '1500.00', 13, 1, 'pagado', 'online', 1237718975, '2021-06-19 11:34:43', NULL),
(6, '500.00', 14, 1, 'pagado', 'online', 1237718991, '2021-06-19 11:38:53', NULL),
(7, '400.00', 15, 1, 'pendiente', 'contraentrega', NULL, '2021-06-19 11:46:15', NULL),
(8, '380.00', 16, 1, 'pendiente', 'contraentrega', NULL, '2021-06-19 11:48:30', NULL);

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
(12, 'Calendarios 2021', 'http://localhost/machucajuan/assets/productos/calendarios_2021.png', 'Calendarios 2021 para regalar.', '250.00', 98, 1, 5, '2021-06-16 16:08:07', NULL),
(13, 'Calendarios para regalar', 'http://localhost/machucajuan/assets/productos/calendarios_añonuevo.jpg', 'Calendarios para regalar a tus amigos o familiares.', '150.00', 100, 1, 5, '2021-06-16 16:13:21', NULL),
(15, 'Calendarios personalizados', 'http://localhost/machucajuan/assets/productos/calendarios_popular.jpg', 'Calendarios personalizados para regalar a amigos y familiares.', '200.00', 120, 0, 5, '2021-06-16 16:26:04', NULL),
(16, 'Tazas personalizadas', 'http://localhost/machucajuan/assets/productos/tazas_personalizada.jpg', 'Tazas personalizadas para regalar', '150.00', 99, 1, 6, '2021-06-16 16:34:58', NULL),
(17, 'Tazas con tematica', 'http://localhost/machucajuan/assets/productos/tazas_homero.jpg', 'Tazas tematicas de homero.', '200.00', 98, 1, 6, '2021-06-16 16:37:21', NULL),
(18, 'Tazas ', 'http://localhost/machucajuan/assets/productos/tazas_fortnite.jpg', 'Tazas tematicas estilo fortnite.', '19.99', 250, 1, 6, '2021-06-16 16:39:02', NULL),
(19, 'Tazas con marca', 'http://localhost/machucajuan/assets/productos/tazas_marca.jpg', 'Tazas con la marca que más te gusta. ', '200.00', 200, 1, 6, '2021-06-16 16:41:02', NULL),
(20, 'Tazas con tu nombre', 'http://localhost/machucajuan/assets/productos/tazas_nombre.jpg', 'Tazas con tu nombre', '190.00', 98, 1, 6, '2021-06-16 16:42:57', NULL),
(21, 'Tazas de regalo', 'http://localhost/machucajuan/assets/productos/tazas_regalo.jpg', 'Tazas para regalar.', '80.00', 100, 1, 6, '2021-06-16 16:45:32', NULL),
(22, 'Pastelitos para chicos', 'http://localhost/machucajuan/assets/productos/pastelitos_regalos.jpg', 'Pastelitos de meregue para chicos.', '190.00', 92, 1, 4, '2021-06-16 16:48:38', NULL),
(23, 'Pastelitos para cumpleaños', 'http://localhost/machucajuan/assets/productos/pastelitos_merengue.jpg', 'Pastelitos para regalar en cumpleaños.', '50.00', 180, 1, 4, '2021-06-16 16:50:57', NULL),
(24, 'Pastelitos emojis', 'http://localhost/machucajuan/assets/productos/pastelitos_emojis.jpg', 'Pastelitos de emojis de todas las caras.', '400.00', 10, 1, 4, '2021-06-16 16:52:37', NULL),
(25, 'Pastelitos tematicos', 'http://localhost/machucajuan/assets/productos/pasteles_emojis_regalo.jpg', 'Pasteles tematicos, con tema de emojis.', '300.00', 6, 1, 4, '2021-06-16 16:57:22', NULL),
(26, 'Remeras negras', 'http://localhost/machucajuan/assets/productos/remera_negra.jpg', 'Remeras negras para hombre.', '500.00', 95, 1, 3, '2021-06-16 16:58:30', NULL),
(27, 'Remeras con marca', 'http://localhost/machucajuan/assets/productos/remera_marca.jpg', 'Remeras con marca para regalar.', '870.00', 93, 1, 3, '2021-06-16 17:01:09', NULL),
(28, 'Remeras para papá', 'http://localhost/machucajuan/assets/productos/remera_papa.jpg', 'Remeras para regalar a papá.', '900.00', 0, 1, 3, '2021-06-16 17:03:26', '2021-06-18 02:20:53'),
(29, 'Remeras para mamá', 'http://localhost/machucajuan/assets/productos/remera_mama.jpg', 'Remeras para el día de la madre.', '540.00', 0, 1, 3, '2021-06-16 17:04:42', '2021-06-18 19:36:45'),
(30, 'Remeras de river', 'http://localhost/machucajuan/assets/productos/remera_river.jpg', 'Remeras con logo de river y frase.', '800.00', 100, 0, 3, '2021-06-16 17:10:26', '2021-06-18 01:43:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2021-06-18 13:56:32', '2021-06-18 18:56:24'),
(2, 'usuario', '2021-06-18 13:57:07', '2021-06-18 18:56:59');

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
(1, 'Juan', 'Machuca', 'admin@gmail.com', '$2y$10$XSmse8nolkcVO69V0NvFbuqHoB.orI99NUPkMUhy6zKSKaAOX11m2', 1, NULL, NULL, 1, '2021-06-18 13:59:11', NULL),
(2, 'Miguel', 'Alfonzo', 'miguel@gmail.com', '$2y$10$Ac3bxW9C7K5yCQSHnUdtkOi1x9ucaD7Li7j2zAdy1BOym9.QOCufW', 2, NULL, NULL, 1, '2021-06-18 14:01:22', NULL),
(3, 'Laura', 'Ifran', 'laura@gmail.com', '$2y$10$t/P/E4QIWCWt.gLYPXjcfeXpLDMe6IbiYkNe6LeUEa.PIarCl9W1G', 2, NULL, NULL, 1, '2021-06-18 14:02:41', NULL),
(4, 'Soledad', 'Rodriguez', 'sol@gmail.com', '$2y$10$ApCk9wOZRMj7rolptKynWOefAPsZT8.zY/fqBtEvuN5iVkctzSct2', 2, NULL, NULL, 1, '2021-06-18 14:03:15', NULL),
(5, 'Mariano', 'Sanchez', 'mariano@gmail.com', '$2y$10$827aAg7JJ7o1FgwRWW1A3.i3w4kpM3uRdVutrNDTT/0Mr2VUz13Ae', 2, 'Molina Punta 8989', '3794089841', 1, '2021-06-18 14:04:14', NULL),
(6, 'Jose', 'Perez', 'jose@gmail.com', '$2y$10$7qB.k79O8ihY7QcxmO/QU.Oj9nSrdxLzg7jFyJ/9Qm5yMiKrAD/Qm', 2, NULL, NULL, 1, '2021-06-18 14:05:00', NULL),
(7, 'Luciana', 'Molina', 'luciana@gmail.com', '$2y$10$913RkJiBaPHZptCdJsluBO02MQt056x2X0fSUAvQOrVk/KsEf0Jqu', 2, 'Centenario 1233', '3794508744', 1, '2021-06-18 14:07:16', NULL),
(8, 'Carolina', 'Linares', 'carolina@gmail.com', '$2y$10$VUqY0uL/V1S7H9OAVwqt0.j4WhabQRtcH9krJnohaz6Qp7Xxz8XFy', 2, NULL, NULL, 1, '2021-06-18 14:07:58', NULL),
(9, 'Natalia', 'Benitez', 'natalia@gmail.com', '$2y$10$ypWUTqeSoxI78GIumRW3cOVGKpJVV3AP6R4A3fYhfBtEL32QSBJl2', 2, NULL, NULL, 1, '2021-06-18 14:08:35', NULL),
(10, 'Josefina', 'Marquez', 'josefina@gmail.com', '$2y$10$xQc.nylxI3nphOgWugXh4.WeiRihRaQADVbYoscWtkn38gXMCTdQq', 2, NULL, NULL, 0, '2021-06-18 14:10:38', NULL),
(11, 'Diego', 'Milan', 'diego@gmail.com', '$2y$10$EsoA2iux5BrLcOI7S4EBKet1bxie.cJQ.KCtKQtX458qe7o19okEu', 2, NULL, NULL, 1, '2021-06-18 14:12:11', NULL),
(12, 'Marcos', 'Martinez', 'marcos@gmail.com', NULL, 2, 'Gobernador Virasoro 3433', '3794779844', 1, '2021-06-18 15:15:39', NULL),
(13, 'Martin', 'Fernandez', 'martin@gmail.com', NULL, 2, 'Olivares 988', '3794874433', 1, '2021-06-19 11:34:43', NULL),
(14, 'Luciano', 'Beltran', 'luciano@gmail.com', NULL, 2, 'Torres 322', '3794883322', 1, '2021-06-19 11:38:53', NULL),
(15, 'Juan', 'Machuca', 'machucajuangabriel@gmail.com', NULL, 2, 'Castelli 1198', '3794690474', 1, '2021-06-19 11:46:14', NULL),
(16, 'Jenifer', 'Barrios', 'jenifer@gmail.com', NULL, 2, 'Av. 3 de abril 1233', '3794690474', 1, '2021-06-19 11:48:29', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detalles`
--
ALTER TABLE `detalles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

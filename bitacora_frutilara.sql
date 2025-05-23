-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-05-2025 a las 19:19:35
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bitacora_frutilara`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `modulo` varchar(100) DEFAULT NULL,
  `accion` text DEFAULT NULL,
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`id`, `usuario`, `modulo`, `accion`, `fecha`) VALUES
(6, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:35'),
(7, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:35'),
(8, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:35'),
(9, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:35'),
(10, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:35'),
(11, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:35'),
(12, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:35'),
(13, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:35'),
(14, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:35'),
(15, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:35'),
(16, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:35'),
(17, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:35'),
(18, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:35'),
(19, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:35'),
(20, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:35'),
(21, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:35'),
(22, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:35'),
(23, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:35'),
(24, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:35'),
(25, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:35'),
(26, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:37'),
(27, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:37'),
(28, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:37'),
(29, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:37'),
(30, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:37'),
(31, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:37'),
(32, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:37'),
(33, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:37'),
(34, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:37'),
(35, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:37'),
(36, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:37'),
(37, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:37'),
(38, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:37'),
(39, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:37'),
(40, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:37'),
(41, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:37'),
(42, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:37'),
(43, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:37'),
(44, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:37'),
(45, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:37'),
(46, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:42'),
(47, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:42'),
(48, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:43'),
(49, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:43'),
(50, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:43'),
(51, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:43'),
(52, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:43'),
(53, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:43'),
(54, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:43'),
(55, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:43'),
(56, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:43'),
(57, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:43'),
(58, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:43'),
(59, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:43'),
(60, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:43'),
(61, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:43'),
(62, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:43'),
(63, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:43'),
(64, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:43'),
(65, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:01:43'),
(66, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:07:54'),
(67, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:07:54'),
(68, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:07:54'),
(69, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:07:55'),
(70, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:07:55'),
(71, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:07:55'),
(72, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:07:55'),
(73, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:07:55'),
(74, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:07:55'),
(75, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:07:55'),
(76, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:07:55'),
(77, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:07:55'),
(78, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:07:55'),
(79, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:07:55'),
(80, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:07:55'),
(81, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:07:55'),
(82, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:07:55'),
(83, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:07:55'),
(84, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:07:55'),
(85, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:07:55'),
(86, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:07:56'),
(87, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:07:56'),
(88, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:07:56'),
(89, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:07:56'),
(90, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:07:56'),
(91, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:07:56'),
(92, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:07:56'),
(93, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:07:56'),
(94, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:07:56'),
(95, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:07:56'),
(96, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:07:56'),
(97, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:07:56'),
(98, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:07:56'),
(99, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:07:57'),
(100, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:07:57'),
(101, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:07:57'),
(102, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:07:57'),
(103, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:07:57'),
(104, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:07:57'),
(105, '12345678', 'Principal', 'Ingresó al Sistema Principal', '2025-05-23 03:07:57');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2024 a las 04:51:44
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `protofrutilara`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `cedula` varchar(8) NOT NULL,
  `nombre_apellido` varchar(50) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `telefono` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`cedula`, `nombre_apellido`, `ciudad`, `telefono`) VALUES
('29896041', 'Adrian Duin', 'Barquisimeto', '04245550211');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_producto`
--

CREATE TABLE `ingreso_producto` (
  `codigo_ingreso` int(11) NOT NULL,
  `rif_proveedor` varchar(50) NOT NULL,
  `codigo_producto` int(50) NOT NULL,
  `cantidad` varchar(30) NOT NULL,
  `cifra` varchar(30) NOT NULL,
  `fecha_entrega` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `codigo` int(50) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `minimo` varchar(50) NOT NULL,
  `maximo` varchar(50) NOT NULL,
  `porcentaje` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codigo`, `nombre`, `tipo`, `minimo`, `maximo`, `porcentaje`) VALUES
(1234567, 'Zarahoria', 'Hortalizas', '20', '700', '12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `rif` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `direccion` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`rif`, `nombre`, `telefono`, `direccion`) VALUES
('29896041', 'Adrixian', '04245550211', 'aqui');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida_producto`
--

CREATE TABLE `salida_producto` (
  `codigo_salida` int(11) NOT NULL,
  `cedula_cliente` varchar(8) NOT NULL,
  `codigo_producto_salida` varchar(50) NOT NULL,
  `cifra` varchar(50) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `tipo_usuario` varchar(50) NOT NULL,
  `cedula` int(8) NOT NULL,
  `clave` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cedula`),
  ADD UNIQUE KEY `cedula` (`cedula`);

--
-- Indices de la tabla `ingreso_producto`
--
ALTER TABLE `ingreso_producto`
  ADD PRIMARY KEY (`codigo_ingreso`),
  ADD UNIQUE KEY `rif_proveedor` (`rif_proveedor`),
  ADD UNIQUE KEY `codigo_producto` (`codigo_producto`),
  ADD UNIQUE KEY `cifra` (`cifra`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`rif`),
  ADD UNIQUE KEY `rif` (`rif`);

--
-- Indices de la tabla `salida_producto`
--
ALTER TABLE `salida_producto`
  ADD PRIMARY KEY (`codigo_salida`),
  ADD UNIQUE KEY `cedula_cliente` (`cedula_cliente`),
  ADD UNIQUE KEY `cifra` (`cifra`),
  ADD UNIQUE KEY `codigo_producto_salida` (`codigo_producto_salida`) USING BTREE;

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cedula`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ingreso_producto`
--
ALTER TABLE `ingreso_producto`
  ADD CONSTRAINT `ingreso_producto_ibfk_1` FOREIGN KEY (`rif_proveedor`) REFERENCES `proveedores` (`rif`),
  ADD CONSTRAINT `ingreso_producto_ibfk_2` FOREIGN KEY (`codigo_producto`) REFERENCES `producto` (`codigo`);

--
-- Filtros para la tabla `salida_producto`
--
ALTER TABLE `salida_producto`
  ADD CONSTRAINT `salida_producto_ibfk_3` FOREIGN KEY (`cifra`) REFERENCES `ingreso_producto` (`cifra`),
  ADD CONSTRAINT `salida_producto_ibfk_4` FOREIGN KEY (`cedula_cliente`) REFERENCES `clientes` (`cedula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

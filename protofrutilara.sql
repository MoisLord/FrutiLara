-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-07-2024 a las 23:53:46
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
-- Base de datos: `protofrutilara`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `codigo_categoria` varchar(40) NOT NULL,
  `descripcion_categoria` varchar(20) NOT NULL,
  `unidadMedNormal` varchar(20) NOT NULL,
  `unidadMedAlt` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`codigo_categoria`, `descripcion_categoria`, `unidadMedNormal`, `unidadMedAlt`) VALUES
('0023467', 'viveres', 'kgr', 'sdf'),
('12345678', 'viveres', 'kilos', 'caja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `cedula` varchar(10) NOT NULL,
  `nombre_apellido` varchar(30) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`cedula`, `nombre_apellido`, `telefono`, `direccion`) VALUES
('29896041', 'adriano', '0424-0248961', 'por alla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_entrada`
--

CREATE TABLE `detalle_entrada` (
  `id_entrada` varchar(30) NOT NULL,
  `rif_proveedores` varchar(50) NOT NULL,
  `codigo_producto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_salida`
--

CREATE TABLE `detalle_salida` (
  `id_salida` varchar(40) NOT NULL,
  `cedula_empleado` varchar(10) NOT NULL,
  `cedula_cliente` varchar(50) NOT NULL,
  `codigo_producto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `cedula` varchar(10) NOT NULL,
  `nombre_apellido` varchar(30) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `correo` varchar(25) NOT NULL,
  `direccion` varchar(40) NOT NULL,
  `fechaNacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`cedula`, `nombre_apellido`, `telefono`, `correo`, `direccion`, `fechaNacimiento`) VALUES
('11898335', 'Eduardo Carreros', '0412-0581988', 'eduardovenega@hotmail.com', 'zona Oeste', '1980-03-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada`
--

CREATE TABLE `entrada` (
  `id_entrada` varchar(30) NOT NULL,
  `codigo_producto` varchar(50) NOT NULL,
  `Cantidad_producto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_marca` varchar(20) NOT NULL,
  `descripcion_marca` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_marca`, `descripcion_marca`) VALUES
('00002345', 'polar'),
('12345678', 'mavesa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE `modelo` (
  `id_modelo` varchar(30) NOT NULL,
  `descripcion_Modelo` varchar(50) NOT NULL,
  `id_marca` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `codigo` varchar(50) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `cantidad_total` varchar(50) NOT NULL,
  `minimo` varchar(50) NOT NULL,
  `maximo` varchar(50) NOT NULL,
  `id_modelo` varchar(50) NOT NULL,
  `id_categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `rif` varchar(50) NOT NULL,
  `documento` varchar(5) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `direccion` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida`
--

CREATE TABLE `salida` (
  `id_salida` varchar(30) NOT NULL,
  `codigo_producto` varchar(50) NOT NULL,
  `Cantidad_producto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuarios` int(11) NOT NULL,
  `tipo_usuario` varchar(50) NOT NULL,
  `cedula` varchar(8) NOT NULL,
  `clave` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuarios`, `tipo_usuario`, `cedula`, `clave`) VALUES
(1, 'dueño', '30405571', '12345678');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`codigo_categoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `detalle_entrada`
--
ALTER TABLE `detalle_entrada`
  ADD PRIMARY KEY (`id_entrada`),
  ADD KEY `rif_proveedores` (`rif_proveedores`),
  ADD KEY `codigo_producto` (`codigo_producto`);

--
-- Indices de la tabla `detalle_salida`
--
ALTER TABLE `detalle_salida`
  ADD PRIMARY KEY (`id_salida`),
  ADD KEY `cedula_empleado` (`cedula_empleado`),
  ADD KEY `codigo_producto` (`codigo_producto`),
  ADD KEY `cedula_cliente` (`cedula_cliente`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD UNIQUE KEY `cedula` (`cedula`);

--
-- Indices de la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD KEY `codigo_producto` (`codigo_producto`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`id_modelo`),
  ADD KEY `id_marca` (`id_marca`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD UNIQUE KEY `codigo` (`codigo`) USING BTREE,
  ADD KEY `id_marca` (`id_modelo`) USING BTREE,
  ADD KEY `id_categoria` (`id_categoria`) USING BTREE,
  ADD KEY `id_modelo` (`id_modelo`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`rif`);

--
-- Indices de la tabla `salida`
--
ALTER TABLE `salida`
  ADD KEY `codigo_producto` (`codigo_producto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_entrada`
--
ALTER TABLE `detalle_entrada`
  ADD CONSTRAINT `detalle_entrada_ibfk_1` FOREIGN KEY (`rif_proveedores`) REFERENCES `proveedores` (`rif`),
  ADD CONSTRAINT `detalle_entrada_ibfk_2` FOREIGN KEY (`codigo_producto`) REFERENCES `entrada` (`codigo_producto`);

--
-- Filtros para la tabla `detalle_salida`
--
ALTER TABLE `detalle_salida`
  ADD CONSTRAINT `detalle_salida_ibfk_1` FOREIGN KEY (`cedula_empleado`) REFERENCES `empleados` (`cedula`),
  ADD CONSTRAINT `detalle_salida_ibfk_2` FOREIGN KEY (`cedula_cliente`) REFERENCES `cliente` (`cedula`),
  ADD CONSTRAINT `detalle_salida_ibfk_3` FOREIGN KEY (`codigo_producto`) REFERENCES `salida` (`codigo_producto`);

--
-- Filtros para la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD CONSTRAINT `entrada_ibfk_1` FOREIGN KEY (`codigo_producto`) REFERENCES `producto` (`codigo`);

--
-- Filtros para la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD CONSTRAINT `modelo_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`codigo_categoria`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`id_modelo`) REFERENCES `modelo` (`id_modelo`);

--
-- Filtros para la tabla `salida`
--
ALTER TABLE `salida`
  ADD CONSTRAINT `salida_ibfk_1` FOREIGN KEY (`codigo_producto`) REFERENCES `producto` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

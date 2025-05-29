-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2025 a las 09:23:17
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
  `id_categoria` int(11) NOT NULL,
  `codigo_categoria` varchar(40) NOT NULL,
  `descripcion_categoria` varchar(45) NOT NULL,
  `estado_registro` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `cedula` varchar(45) NOT NULL,
  `nombre_apellido` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `estado_registro` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conciliacion_bancaria`
--

CREATE TABLE `conciliacion_bancaria` (
  `id_bancaria` int(11) NOT NULL,
  `documento` varchar(45) NOT NULL,
  `gasto_banco` varchar(45) NOT NULL,
  `total_banco` varchar(45) NOT NULL,
  `comparativa` varchar(45) NOT NULL,
  `filtrar_fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_entrada`
--

CREATE TABLE `detalle_entrada` (
  `id_detalle_entrada` int(11) NOT NULL,
  `id_entrada` int(11) NOT NULL,
  `codigo_producto` varchar(45) NOT NULL,
  `Cantidad_producto` varchar(45) NOT NULL,
  `precio_producto` varchar(45) NOT NULL,
  `tasa_precio` varchar(45) NOT NULL,
  `metodo_pago` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_salida`
--

CREATE TABLE `detalle_salida` (
  `id_detalle_salida` int(11) NOT NULL,
  `codigo_producto` varchar(45) NOT NULL,
  `id_salida` int(11) NOT NULL,
  `Cantidad_producto` varchar(45) NOT NULL,
  `precio_producto` varchar(45) NOT NULL,
  `tasa_precio` varchar(45) NOT NULL,
  `metodo_pago` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `cedula` varchar(45) NOT NULL,
  `nombre_apellido` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `fechaNacimiento` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos_generales`
--

CREATE TABLE `gastos_generales` (
  `id_gastos_generales` int(11) NOT NULL,
  `nota_entrada_datos_entrada` int(11) NOT NULL,
  `prefacturacion_datos_salida` int(11) NOT NULL,
  `pago_servicios_datos_servicios` int(11) NOT NULL,
  `pago_empleados_datos_pago_empleados` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos_generales_has_conciliacion_bancaria`
--

CREATE TABLE `gastos_generales_has_conciliacion_bancaria` (
  `gastos_generales_has_conciliacion_bancaria_id` int(11) NOT NULL,
  `gastos_generales_id_gastos_generales` int(11) NOT NULL,
  `conciliacion_bancaria_id_bancaria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `codigo_marca` varchar(45) NOT NULL,
  `descripcion_marca` varchar(45) NOT NULL,
  `estado_registro` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_marca`, `codigo_marca`, `descripcion_marca`, `estado_registro`) VALUES
(1, '4883477', 'Arroz Mary', 1),
(2, '9277743', 'Bebida Toddy', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_entrada`
--

CREATE TABLE `nota_entrada` (
  `id_entrada` int(11) NOT NULL,
  `rif_proveedores` varchar(45) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_empleados`
--

CREATE TABLE `pago_empleados` (
  `id_pago_empleados` int(11) NOT NULL,
  `fecha_pago` date NOT NULL,
  `empleados_cedula` varchar(45) NOT NULL,
  `pago_empleados` varchar(45) NOT NULL,
  `estado_registro` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_servicios`
--

CREATE TABLE `pago_servicios` (
  `id_servicios` int(11) NOT NULL,
  `servicios_codigo_servicio` int(11) NOT NULL,
  `costo` varchar(45) NOT NULL,
  `pago` varchar(45) NOT NULL,
  `fecha_pago_servicio` date NOT NULL,
  `estado_registro` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prefacturacion`
--

CREATE TABLE `prefacturacion` (
  `id_salida` int(11) NOT NULL,
  `cedula_empleado` varchar(50) NOT NULL,
  `cedula_cliente` varchar(45) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `codigo` varchar(45) NOT NULL,
  `id_modelo` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `marca_id_marca` int(11) NOT NULL,
  `unidades_de_medida_id_medidas` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `cantidad_total` varchar(45) NOT NULL,
  `minimo` varchar(45) NOT NULL,
  `maximo` varchar(45) NOT NULL,
  `nacionalidad_producto` varchar(45) NOT NULL,
  `estado_registro` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `rif` varchar(45) NOT NULL,
  `documento` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `estado_registro` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `codigo_servicio` int(11) NOT NULL,
  `descripcion_servicio` varchar(45) NOT NULL,
  `estado_registro` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades_de_medida`
--

CREATE TABLE `unidades_de_medida` (
  `id_medidas` int(11) NOT NULL,
  `codigo_medida` varchar(40) NOT NULL,
  `unidadMedNormal` varchar(45) NOT NULL,
  `unidadMedAlt` varchar(45) NOT NULL,
  `estado_registro` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuarios` int(11) NOT NULL,
  `tipo_usuario` varchar(45) NOT NULL,
  `cedula` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuarios`, `tipo_usuario`, `cedula`, `clave`) VALUES
(1, 'ADMINISTRADOR', '12345678', '12345678'),
(2, 'EMPLEADO', '87654321', '87654321');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `conciliacion_bancaria`
--
ALTER TABLE `conciliacion_bancaria`
  ADD PRIMARY KEY (`id_bancaria`);

--
-- Indices de la tabla `detalle_entrada`
--
ALTER TABLE `detalle_entrada`
  ADD PRIMARY KEY (`id_detalle_entrada`),
  ADD KEY `fk_entrada_has_producto_producto1_idx` (`codigo_producto`),
  ADD KEY `fk_entrada_has_producto_entrada_idx` (`id_entrada`);

--
-- Indices de la tabla `detalle_salida`
--
ALTER TABLE `detalle_salida`
  ADD PRIMARY KEY (`id_detalle_salida`),
  ADD KEY `fk_producto_has_salida_salida1_idx` (`id_salida`),
  ADD KEY `fk_producto_has_salida_producto1_idx` (`codigo_producto`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `gastos_generales`
--
ALTER TABLE `gastos_generales`
  ADD PRIMARY KEY (`id_gastos_generales`),
  ADD KEY `fk_gastos_generales_nota_entrada1_idx` (`nota_entrada_datos_entrada`),
  ADD KEY `fk_gastos_generales_prefacturacion1_idx` (`prefacturacion_datos_salida`),
  ADD KEY `fk_gastos_generales_pago_servicios1_idx` (`pago_servicios_datos_servicios`),
  ADD KEY `fk_gastos_generales_pago_empleados1_idx` (`pago_empleados_datos_pago_empleados`);

--
-- Indices de la tabla `gastos_generales_has_conciliacion_bancaria`
--
ALTER TABLE `gastos_generales_has_conciliacion_bancaria`
  ADD PRIMARY KEY (`gastos_generales_has_conciliacion_bancaria_id`),
  ADD KEY `fk_gastos_generales_has_conciliacion_bancaria_conciliacion__idx` (`conciliacion_bancaria_id_bancaria`),
  ADD KEY `fk_gastos_generales_has_conciliacion_bancaria_gastos_genera_idx` (`gastos_generales_id_gastos_generales`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `nota_entrada`
--
ALTER TABLE `nota_entrada`
  ADD PRIMARY KEY (`id_entrada`),
  ADD KEY `fk_entrada_proveedores1_idx` (`rif_proveedores`);

--
-- Indices de la tabla `pago_empleados`
--
ALTER TABLE `pago_empleados`
  ADD PRIMARY KEY (`id_pago_empleados`),
  ADD KEY `fk_pago_empleados_empleados1_idx` (`empleados_cedula`);

--
-- Indices de la tabla `pago_servicios`
--
ALTER TABLE `pago_servicios`
  ADD PRIMARY KEY (`id_servicios`),
  ADD KEY `fk_pago_servicios_servicios1_idx` (`servicios_codigo_servicio`);

--
-- Indices de la tabla `prefacturacion`
--
ALTER TABLE `prefacturacion`
  ADD PRIMARY KEY (`id_salida`),
  ADD KEY `fk_salida_cliente1_idx` (`cedula_empleado`),
  ADD KEY `fk_salida_empleados1_idx` (`cedula_cliente`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `fk_producto_categoria1_idx` (`id_categoria`),
  ADD KEY `fk_producto_unidades_de_medida1_idx` (`unidades_de_medida_id_medidas`),
  ADD KEY `fk_producto_marca1_idx` (`marca_id_marca`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`rif`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`codigo_servicio`);

--
-- Indices de la tabla `unidades_de_medida`
--
ALTER TABLE `unidades_de_medida`
  ADD PRIMARY KEY (`id_medidas`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `nota_entrada`
--
ALTER TABLE `nota_entrada`
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `prefacturacion`
--
ALTER TABLE `prefacturacion`
  MODIFY `id_salida` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `unidades_de_medida`
--
ALTER TABLE `unidades_de_medida`
  MODIFY `id_medidas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_entrada`
--
ALTER TABLE `detalle_entrada`
  ADD CONSTRAINT `fk_entrada_has_producto_entrada` FOREIGN KEY (`id_entrada`) REFERENCES `nota_entrada` (`id_entrada`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_entrada_has_producto_producto1` FOREIGN KEY (`codigo_producto`) REFERENCES `producto` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_salida`
--
ALTER TABLE `detalle_salida`
  ADD CONSTRAINT `fk_producto_has_salida_producto1` FOREIGN KEY (`codigo_producto`) REFERENCES `producto` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_has_salida_salida1` FOREIGN KEY (`id_salida`) REFERENCES `prefacturacion` (`id_salida`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `gastos_generales`
--
ALTER TABLE `gastos_generales`
  ADD CONSTRAINT `fk_gastos_generales_nota_entrada1` FOREIGN KEY (`nota_entrada_datos_entrada`) REFERENCES `nota_entrada` (`id_entrada`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_gastos_generales_pago_empleados1` FOREIGN KEY (`pago_empleados_datos_pago_empleados`) REFERENCES `pago_empleados` (`id_pago_empleados`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_gastos_generales_pago_servicios1` FOREIGN KEY (`pago_servicios_datos_servicios`) REFERENCES `pago_servicios` (`id_servicios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_gastos_generales_prefacturacion1` FOREIGN KEY (`prefacturacion_datos_salida`) REFERENCES `prefacturacion` (`id_salida`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `gastos_generales_has_conciliacion_bancaria`
--
ALTER TABLE `gastos_generales_has_conciliacion_bancaria`
  ADD CONSTRAINT `fk_gastos_generales_has_conciliacion_bancaria_conciliacion_ba1` FOREIGN KEY (`conciliacion_bancaria_id_bancaria`) REFERENCES `conciliacion_bancaria` (`id_bancaria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_gastos_generales_has_conciliacion_bancaria_gastos_generales1` FOREIGN KEY (`gastos_generales_id_gastos_generales`) REFERENCES `gastos_generales` (`id_gastos_generales`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `nota_entrada`
--
ALTER TABLE `nota_entrada`
  ADD CONSTRAINT `fk_entrada_proveedores1` FOREIGN KEY (`rif_proveedores`) REFERENCES `proveedores` (`rif`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pago_empleados`
--
ALTER TABLE `pago_empleados`
  ADD CONSTRAINT `fk_pago_empleados_empleados1` FOREIGN KEY (`empleados_cedula`) REFERENCES `empleados` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pago_servicios`
--
ALTER TABLE `pago_servicios`
  ADD CONSTRAINT `fk_pago_servicios_servicios1` FOREIGN KEY (`servicios_codigo_servicio`) REFERENCES `servicios` (`codigo_servicio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `prefacturacion`
--
ALTER TABLE `prefacturacion`
  ADD CONSTRAINT `fk_salida_cliente1` FOREIGN KEY (`cedula_empleado`) REFERENCES `cliente` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_salida_empleados1` FOREIGN KEY (`cedula_cliente`) REFERENCES `empleados` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_categoria1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_marca1` FOREIGN KEY (`marca_id_marca`) REFERENCES `marca` (`id_marca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_unidades_de_medida1` FOREIGN KEY (`unidades_de_medida_id_medidas`) REFERENCES `unidades_de_medida` (`id_medidas`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

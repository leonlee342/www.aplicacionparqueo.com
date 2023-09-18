-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-09-2023 a las 00:04:44
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aplicacionparqueo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_clientes`
--

CREATE TABLE `tb_clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nit_ci_cliente` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `placa_auto` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_clientes`
--

INSERT INTO `tb_clientes` (`id_cliente`, `nombre_cliente`, `nit_ci_cliente`, `placa_auto`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(1, 'LETICIA BLANCO COCA', '5189584', '1233TYU', '2023-05-29 12:44:07', NULL, NULL, '1'),
(2, 'AMERICO FIORILLO', '5050504', '1233TYI', '2023-05-29 01:52:13', NULL, NULL, '1'),
(3, 'SANTIAGO RELOJ', '23568974', '5555IUI', '2023-06-01 01:39:58', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_facturaciones`
--

CREATE TABLE `tb_facturaciones` (
  `id_facturacion` int(11) NOT NULL,
  `id_informacion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nro_factura` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_cliente` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_factura` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_ingreso` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `hora_ingreso` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_salida` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `hora_salida` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tiempo` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cuviculo` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `detalle` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `precio` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cantidad` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `monto_total` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `monto_literal` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_sesion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `qr` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_facturaciones`
--

INSERT INTO `tb_facturaciones` (`id_facturacion`, `id_informacion`, `nro_factura`, `id_cliente`, `fecha_factura`, `fecha_ingreso`, `hora_ingreso`, `fecha_salida`, `hora_salida`, `tiempo`, `cuviculo`, `detalle`, `precio`, `cantidad`, `total`, `monto_total`, `monto_literal`, `user_sesion`, `qr`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(1, '1', '1', '1', 'COCHABAMBA, 31 de Mayo de 2023', '2023-05-29', '20:07', '2023-05-31', '18:48', '1 dias con 22 horas con 41 minutos ', '5', 'Servicio de parqueo de 1 dias con 22 horas con 41 minutos ', '72', '1', '72', '72', 'SETENTA Y DOS CON 00/100 Bs.', 'leonlee342@gmail.com', 'Factura realizada por el sistema de parqueo, al cliente LETICIA BLANCO COCA con CI/NIT:\r\n5189584 con el vehiculo con número de placa 1233TYU y esta factura se genero en\r\nCOCHABAMBA, 31 de Mayo de 2023 a hr: 18:48', '2023-05-31 06:48:44', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_informaciones`
--

CREATE TABLE `tb_informaciones` (
  `id_informacion` int(11) NOT NULL,
  `nombre_parqueo` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `actividad_empresa` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sucursal` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `zona` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `departamento_ciudad` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pais` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_informaciones`
--

INSERT INTO `tb_informaciones` (`id_informacion`, `nombre_parqueo`, `actividad_empresa`, `sucursal`, `direccion`, `zona`, `telefono`, `departamento_ciudad`, `pais`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(1, 'SISTEMA DE PARQUEO - FCYT', 'SERVICIO DE PARQUEO', '1', 'AV. OQUENDO NRO 444', 'LAS CUADRAS', '4888843-4888842', 'COCHABAMBA', 'BOLIVIA', '2023-05-17 07:21:55', '2023-05-19 12:41:09', NULL, '1'),
(2, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', '2023-05-17 09:03:48', NULL, '2023-05-17 09:03:52', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_mapeos`
--

CREATE TABLE `tb_mapeos` (
  `id_map` int(11) NOT NULL,
  `nro_espacio` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado_espacio` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `obs` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_mapeos`
--

INSERT INTO `tb_mapeos` (`id_map`, `nro_espacio`, `estado_espacio`, `obs`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(1, '1', 'LIBRE', NULL, '2023-05-12 22:28:57', '2023-05-29 12:44:28', NULL, '1'),
(2, '2', 'LIBRE', '', '2023-05-13 03:24:08', '2023-05-28 02:30:03', NULL, '1'),
(3, '3', 'LIBRE', '', '2023-05-13 03:25:30', '2023-05-28 12:23:52', NULL, '1'),
(4, '4', 'LIBRE', '', '2023-05-13 03:27:40', NULL, NULL, '1'),
(5, '5', 'OCUPADO', '', '2023-05-13 03:28:03', '2023-05-31 06:54:00', NULL, '1'),
(6, '6', 'LIBRE', '', '2023-05-13 03:28:24', '2023-05-29 11:58:19', NULL, '1'),
(7, '7', 'LIBRE', '', '2023-05-13 03:28:44', '2023-05-29 11:58:10', NULL, '1'),
(8, '8', 'LIBRE', '', '2023-05-13 03:29:05', '2023-05-29 11:58:30', NULL, '1'),
(9, '9', 'LIBRE', '', '2023-05-13 03:29:25', '2023-05-29 11:58:39', NULL, '1'),
(10, '10', 'OCUPADO', '', '2023-05-13 03:29:44', '2023-05-31 12:59:29', NULL, '1'),
(11, '11', 'LIBRE', '', '2023-05-13 05:17:13', NULL, NULL, '1'),
(12, '12', 'LIBRE', '', '2023-05-14 02:56:07', NULL, NULL, '1'),
(13, '13', 'LIBRE', '', '2023-05-14 02:56:32', NULL, NULL, '1'),
(14, '14', 'LIBRE', '', '2023-05-16 10:57:49', NULL, NULL, '1'),
(15, '15', 'OCUPADO', '', '2023-05-16 09:18:53', '2023-06-01 01:39:58', NULL, '1'),
(16, '16', 'LIBRE', '', '2023-05-16 09:37:48', '2023-05-19 12:48:18', NULL, '1'),
(17, '17', 'LIBRE', '', '2023-05-16 09:38:20', NULL, NULL, '1'),
(18, '18', 'LIBRE', '', '2023-05-16 10:18:54', NULL, NULL, '1'),
(19, '19', 'LIBRE', '', '2023-05-16 11:44:41', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_precios`
--

CREATE TABLE `tb_precios` (
  `id_precio` int(11) NOT NULL,
  `cantidad` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `detalle` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `precio` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_precios`
--

INSERT INTO `tb_precios` (`id_precio`, `cantidad`, `detalle`, `precio`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(1, '1', 'HORAS', '3', '2023-05-26 16:52:34', NULL, NULL, '1'),
(2, '2', 'HORAS', '6', '2023-05-27 12:21:17', NULL, NULL, '1'),
(3, '3', 'HORAS', '9', '2023-05-27 12:23:58', NULL, NULL, '1'),
(4, '4', 'HORAS', '12', '2023-05-27 04:48:39', NULL, NULL, '1'),
(5, '5', 'HORAS', '15', '2023-05-27 04:48:56', NULL, NULL, '1'),
(6, '6', 'HORAS', '12', '2023-05-27 04:49:22', NULL, NULL, '1'),
(7, '7', 'HORAS', '14', '2023-05-27 04:49:40', NULL, NULL, '1'),
(8, '8', 'HORAS', '16', '2023-05-27 04:50:11', NULL, NULL, '1'),
(9, '9', 'HORAS', '18', '2023-05-27 04:50:31', NULL, NULL, '1'),
(10, '10', 'HORAS', '20', '2023-05-27 04:50:55', NULL, NULL, '1'),
(11, '11', 'HORAS', '21', '2023-05-27 04:51:55', NULL, NULL, '1'),
(12, '12', 'HORAS', '22', '2023-05-27 04:53:57', NULL, NULL, '1'),
(13, '13', 'HORAS', '23', '2023-05-27 04:54:09', NULL, NULL, '1'),
(14, '14', 'HORAS', '24', '2023-05-27 04:54:24', NULL, NULL, '1'),
(15, '15', 'HORAS', '25', '2023-05-27 04:55:22', NULL, NULL, '1'),
(16, '16', 'HORAS', '26', '2023-05-27 04:55:36', NULL, NULL, '1'),
(17, '17', 'HORAS', '27', '2023-05-27 04:55:54', NULL, NULL, '1'),
(18, '18', 'HORAS', '28', '2023-05-27 04:56:13', NULL, NULL, '1'),
(19, '19', 'HORAS', '29', '2023-05-27 04:56:27', NULL, NULL, '1'),
(20, '20', 'HORAS', '30', '2023-05-27 04:56:43', NULL, NULL, '1'),
(21, '21', 'HORAS', '31', '2023-05-27 04:56:58', NULL, NULL, '1'),
(22, '22', 'HORAS', '32', '2023-05-27 04:57:10', NULL, NULL, '1'),
(23, '23', 'HORAS', '33', '2023-05-27 04:57:25', NULL, NULL, '1'),
(24, '1', 'DIAS', '40', '2023-05-27 05:02:06', NULL, NULL, '1'),
(25, '2', 'DIAS', '60', '2023-05-27 05:03:27', NULL, NULL, '1'),
(26, '3', 'DIAS', '80', '2023-05-27 05:04:30', NULL, NULL, '1'),
(27, '4', 'DIAS', '100', '2023-05-27 05:04:46', NULL, NULL, '1'),
(28, '5', 'DIAS', '120', '2023-05-27 05:04:56', NULL, NULL, '1'),
(29, '6', 'HORAS', '140', '2023-05-27 05:05:07', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_roles`
--

CREATE TABLE `tb_roles` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_roles`
--

INSERT INTO `tb_roles` (`id_rol`, `nombre`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(1, 'ADMINISTRADOR', '2023-05-10 10:02:16', NULL, NULL, '1'),
(2, 'CONTADOR', '2023-05-11 01:16:36', NULL, NULL, '1'),
(3, 'CONTADOR', '2023-05-11 04:39:26', NULL, '2023-05-11 04:41:21', '0'),
(4, 'OPERADOR', '2023-05-11 04:44:15', NULL, NULL, '1'),
(5, 'OPERADOR', '2023-05-11 04:46:25', NULL, '2023-05-11 04:46:49', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tickets`
--

CREATE TABLE `tb_tickets` (
  `id_ticket` int(11) NOT NULL,
  `placa_auto` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_cliente` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nit_ci` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cuviculo` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_ingreso` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `hora_ingreso` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado_ticket` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `user_sesion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_tickets`
--

INSERT INTO `tb_tickets` (`id_ticket`, `placa_auto`, `nombre_cliente`, `nit_ci`, `cuviculo`, `fecha_ingreso`, `hora_ingreso`, `estado_ticket`, `user_sesion`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(1, '1233TYI', 'AMERICO FIORILLO', '5050504', '10', '2023-05-31', '12:59', 'OCUPADO', 'leonlee342@gmail.com', '2023-05-31 12:59:29', NULL, NULL, '1'),
(2, '1233TYU', 'LETICIA BLANCO COCA', '5189584', '5', '2023-05-29', '20:07', 'LIBRE', 'leonlee342@gmail.com', '2023-05-31 03:07:30', NULL, NULL, '1'),
(3, '1233TYU', 'LETICIA BLANCO COCA', '5189584', '5', '2023-05-31', '18:48', 'OCUPADO', 'leonlee342@gmail.com', '2023-05-31 06:54:00', NULL, NULL, '1'),
(4, '5555IUI', 'SANTIAGO RELOJ', '23568974', '15', '2023-06-01', '13:39', 'OCUPADO', 'leonlee342@gmail.com', '2023-06-01 01:39:58', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rol` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email_verificado` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `password_user` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id`, `nombres`, `rol`, `email`, `email_verificado`, `password_user`, `token`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(1, 'EDDY CONDORI GUZMAN', 'ADMINISTRADOR', 'leonlee342@gmail.com', NULL, '12345', NULL, '2023-05-29 12:41:57', NULL, NULL, '1'),
(2, 'LOIDA CANO CUCHO', 'OPERADOR', 'loida@gmail.com', NULL, '12345', NULL, '2023-06-01 07:24:48', NULL, NULL, '1'),
(3, 'ALVARO', 'CONTADOR', 'alvaro@gmail.com', NULL, '12345', NULL, '2023-06-05 10:36:01', NULL, NULL, '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `tb_facturaciones`
--
ALTER TABLE `tb_facturaciones`
  ADD PRIMARY KEY (`id_facturacion`);

--
-- Indices de la tabla `tb_informaciones`
--
ALTER TABLE `tb_informaciones`
  ADD PRIMARY KEY (`id_informacion`);

--
-- Indices de la tabla `tb_mapeos`
--
ALTER TABLE `tb_mapeos`
  ADD PRIMARY KEY (`id_map`);

--
-- Indices de la tabla `tb_precios`
--
ALTER TABLE `tb_precios`
  ADD PRIMARY KEY (`id_precio`);

--
-- Indices de la tabla `tb_roles`
--
ALTER TABLE `tb_roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tb_tickets`
--
ALTER TABLE `tb_tickets`
  ADD PRIMARY KEY (`id_ticket`);

--
-- Indices de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_clientes`
--
ALTER TABLE `tb_clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_facturaciones`
--
ALTER TABLE `tb_facturaciones`
  MODIFY `id_facturacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tb_informaciones`
--
ALTER TABLE `tb_informaciones`
  MODIFY `id_informacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tb_mapeos`
--
ALTER TABLE `tb_mapeos`
  MODIFY `id_map` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tb_precios`
--
ALTER TABLE `tb_precios`
  MODIFY `id_precio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `tb_roles`
--
ALTER TABLE `tb_roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tb_tickets`
--
ALTER TABLE `tb_tickets`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

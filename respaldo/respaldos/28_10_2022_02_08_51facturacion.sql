-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-10-2022 a las 08:01:32
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `facturacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `analisis`
--

CREATE TABLE `analisis` (
  `id_an` bigint(40) NOT NULL,
  `cod_an` bigint(6) UNSIGNED ZEROFILL NOT NULL,
  `des_an` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `tipo_an` bigint(40) NOT NULL,
  `pre_an` double NOT NULL,
  `nom_an` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `estado_an` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `analisis`
--

INSERT INTO `analisis` (`id_an`, `cod_an`, `des_an`, `tipo_an`, `pre_an`, `nom_an`, `estado_an`) VALUES
(2, 231232, 'WQEWQE', 2, 231.23, 'QEWQEWQ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE `auditoria` (
  `id_au` bigint(20) NOT NULL,
  `id_us_au` bigint(40) NOT NULL,
  `registro` varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `accion` varchar(80) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `codigo` varchar(40) DEFAULT NULL,
  `campo` varchar(140) DEFAULT NULL,
  `hora` time NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `auditoria`
--

INSERT INTO `auditoria` (`id_au`, `id_us_au`, `registro`, `accion`, `codigo`, `campo`, `hora`, `fecha`) VALUES
(8, 1, 'sección', 'Ha Cerrado sección', '', '', '19:44:11', '2022-10-27'),
(9, 1, 'sección', 'Ha Iniciado sección', '', '', '19:44:16', '2022-10-27'),
(10, 1, 'sección', 'Ha Cerrado sección', '', '', '19:46:02', '2022-10-27'),
(11, 1, 'sección', 'Ha Cerrado sección', '', '', '19:46:04', '2022-10-27'),
(12, 1, 'sección', 'Ha Cerrado sección', '', '', '19:46:07', '2022-10-27'),
(13, 1, 'sección', 'Ha Iniciado sección', '', '', '19:46:16', '2022-10-27'),
(14, 1, 'sección', 'Ha Iniciado sección', '', '', '19:47:20', '2022-10-27'),
(15, 1, 'sección', 'Ha Iniciado sección', '', '', '20:08:13', '2022-10-27'),
(16, 1, 'sección', 'Ha Cerrado sección', '', '', '20:16:32', '2022-10-27'),
(17, 1, 'sección', 'Ha Iniciado sección', '', '', '20:16:35', '2022-10-27'),
(18, 1, 'sección', 'Ha Cerrado sección', '', '', '20:51:06', '2022-10-27'),
(19, 1, 'sección', 'Ha Iniciado sección', '', '', '20:51:08', '2022-10-27'),
(21, 1, 'sección', 'Ha Cerrado sección', '', '', '23:21:01', '2022-10-27'),
(22, 1, 'sección', 'Ha Iniciado sección', '', '', '23:21:25', '2022-10-27'),
(23, 1, 'sección', 'Ha Cerrado sección', '', '', '23:38:10', '2022-10-27'),
(24, 1, 'sección', 'Ha Iniciado sección', '', '', '23:38:12', '2022-10-27'),
(25, 1, 'sección', 'Ha Cerrado sección', '', '', '23:42:43', '2022-10-27'),
(26, 1, 'sección', 'Ha Iniciado sección', '', '', '23:42:44', '2022-10-27'),
(27, 1, 'sección', 'Ha Cerrado sección', '', '', '23:45:32', '2022-10-27'),
(28, 1, 'sección', 'Ha Iniciado sección', '', '', '23:45:34', '2022-10-27'),
(29, 1, 'Respaldo', 'Un respaldo ha sido Creado', 'Codigo:2', 'Nombre del respaldo:facturacion_28_10_2022_00_07_32.sql', '00:07:33', '2022-10-28'),
(30, 1, 'Respaldo', 'Un respaldo ha sido Creado', 'Codigo:3', 'Nombre del respaldo:respaldosfacturacion_28_10_2022_00_10_59.sql', '00:11:00', '2022-10-28'),
(31, 1, 'Respaldo', 'Un respaldo ha sido Creado', 'Codigo:4', 'Nombre del respaldo:facturacion_28_10_2022_00_12_47.sql', '00:12:48', '2022-10-28'),
(32, 1, 'Respaldo', 'Un respaldo ha sido Creado', 'Codigo:5', 'Nombre del respaldo:facturacion_28_10_2022_00_13_01.sql', '00:13:01', '2022-10-28'),
(33, 1, 'Respaldo', 'Un respaldo ha sido agregado', 'Codigo:6', 'Nombre del respaldo:28_10_2022_00_19_351234.sql', '00:19:35', '2022-10-28'),
(34, 1, 'Respaldo', 'Un respaldo ha sido agregado', 'Codigo:7', 'Nombre del respaldo:28_10_2022_00_20_0302-10-15_11-10-2022_facturacion.sql', '00:20:03', '2022-10-28'),
(35, 1, 'Análisis', 'Ha sido registrado', 'Codigo:123213', '', '00:29:57', '2022-10-28'),
(36, 1, 'Insumos', 'Ha sido registrado', 'Codigo:132131', '', '00:30:10', '2022-10-28'),
(37, 1, 'Análisis', 'Ha sido asignado un consumo', 'Codigo:123213', 'Insumo asignado:132131', '00:31:15', '2022-10-28'),
(38, 1, 'Insumos', 'Ha sido registrado', 'Codigo:212231', '', '00:32:20', '2022-10-28'),
(39, 1, 'Análisis', 'Ha sido eliminado un consumo', 'Codigo:123213', 'Insumo retirado:132131', '00:32:42', '2022-10-28'),
(40, 1, 'sección', 'Ha Cerrado sección', '', '', '00:33:03', '2022-10-28'),
(41, 1, 'sección', 'Ha Iniciado sección', '', '', '00:33:06', '2022-10-28'),
(42, 1, 'sección', 'Ha Cerrado sección', '', '', '00:39:17', '2022-10-28'),
(43, 1, 'sección', 'Ha Iniciado sección', '', '', '00:39:20', '2022-10-28'),
(44, 1, 'Análisis', 'Ha sido registrado', 'Codigo:231232', '', '00:39:30', '2022-10-28'),
(45, 1, 'Insumos', 'Ha sido registrado', 'Codigo:123212', '', '00:40:05', '2022-10-28'),
(46, 1, 'Análisis', 'Ha sido asignado un consumo', 'Codigo:231232', 'Insumo asignado:123212', '00:40:57', '2022-10-28'),
(47, 1, 'Análisis', 'Ha sido eliminado un consumo', 'Codigo:231232', 'Insumo retirado:123212', '00:41:10', '2022-10-28'),
(48, 1, 'Insumos', 'Ha sido registrado', 'Codigo:132312', '', '00:41:59', '2022-10-28'),
(49, 1, 'Análisis', 'Ha sido asignado un consumo', 'Codigo:231232', 'Insumo asignado:123212', '00:42:10', '2022-10-28'),
(50, 1, 'Análisis', 'Ha sido asignado un consumo', 'Codigo:231232', 'Insumo asignado:132312', '00:42:21', '2022-10-28'),
(51, 1, 'Análisis', 'Ha sido actualizado un consumo', 'Codigo:231232', 'Insumo actualizado:123212', '00:42:28', '2022-10-28'),
(52, 1, 'Análisis', 'Ha sido actualizado un consumo', 'Codigo:231232', 'Insumo actualizado:123212', '00:42:32', '2022-10-28'),
(53, 1, 'Análisis', 'Ha sido actualizado un consumo', 'Codigo:231232', 'Insumo actualizado:132312', '00:42:36', '2022-10-28'),
(54, 1, 'Análisis', 'Ha sido eliminado un consumo', 'Codigo:231232', 'Insumo retirado:123212', '00:42:40', '2022-10-28'),
(55, 1, 'sección', 'Ha Cerrado sección', '', '', '00:45:07', '2022-10-28'),
(56, 1, 'sección', 'Ha Iniciado sección', '', '', '00:45:09', '2022-10-28'),
(57, 1, 'Análisis', 'Ha sido eliminado un consumo', 'Codigo:231232', 'Insumo retirado:132312', '00:45:36', '2022-10-28'),
(58, 1, 'Análisis', 'Ha sido asignado un consumo', 'Codigo:231232', 'Insumo asignado:132312', '00:45:47', '2022-10-28'),
(59, 1, 'Análisis', 'Ha sido asignado un consumo', 'Codigo:231232', 'Insumo asignado:123212', '00:45:55', '2022-10-28'),
(60, 1, 'Análisis', 'Ha sido actualizado un consumo', 'Codigo:231232', 'Insumo actualizado:123212', '00:46:05', '2022-10-28'),
(61, 1, 'Análisis', 'Ha sido actualizado un consumo', 'Codigo:231232', 'Insumo actualizado:123212', '00:46:24', '2022-10-28'),
(62, 1, 'Análisis', 'Ha sido actualizado un consumo', 'Codigo:231232', 'Insumo actualizado:123212', '00:50:45', '2022-10-28'),
(63, 1, 'Análisis', 'Ha sido actualizado un consumo', 'Codigo:231232', 'Insumo actualizado:123212', '00:50:52', '2022-10-28'),
(64, 1, 'Análisis', 'Ha sido eliminado un consumo', 'Codigo:231232', 'Insumo retirado:123212', '00:50:57', '2022-10-28'),
(65, 1, 'Análisis', 'Ha sido eliminado un consumo', 'Codigo:231232', 'Insumo retirado:132312', '00:51:01', '2022-10-28'),
(66, 1, 'Análisis', 'Ha sido asignado un consumo', 'Codigo:231232', 'Insumo asignado:132312', '00:51:08', '2022-10-28'),
(67, 1, 'Análisis', 'Ha sido asignado un consumo', 'Codigo:231232', 'Insumo asignado:123212', '00:51:12', '2022-10-28'),
(68, 1, 'Análisis', 'Ha sido eliminado un consumo', 'Codigo:231232', 'Insumo retirado:123212', '00:59:46', '2022-10-28'),
(69, 1, 'Análisis', 'Ha sido eliminado un consumo', 'Codigo:231232', 'Insumo retirado:132312', '00:59:50', '2022-10-28'),
(70, 1, 'sección', 'Ha Cerrado sección', '', '', '01:03:49', '2022-10-28'),
(71, 1, 'sección', 'Ha Cerrado sección', '', '', '01:03:49', '2022-10-28'),
(72, 1, 'sección', 'Ha Iniciado sección', '', '', '01:03:52', '2022-10-28'),
(73, 1, 'Análisis', 'Ha sido asignado un consumo', 'Codigo:231232', 'Insumo asignado:132312', '01:04:20', '2022-10-28'),
(74, 1, 'Análisis', 'Ha sido actualizado un consumo', 'Codigo:231232', 'Insumo actualizado:132312', '01:04:31', '2022-10-28'),
(75, 1, 'Análisis', 'Ha sido asignado un consumo', 'Codigo:231232', 'Insumo asignado:123212', '01:04:37', '2022-10-28'),
(76, 1, 'Análisis', 'Ha sido actualizado un consumo', 'Codigo:231232', 'Insumo actualizado:123212', '01:04:43', '2022-10-28'),
(77, 1, 'Análisis', 'Ha sido eliminado un consumo', 'Codigo:231232', 'Insumo retirado:132312', '01:04:46', '2022-10-28'),
(78, 1, 'Análisis', 'Ha sido asignado un consumo', 'Codigo:231232', 'Insumo asignado:132312', '01:04:54', '2022-10-28'),
(79, 1, 'Análisis', 'Ha sido eliminado un consumo', 'Codigo:231232', 'Insumo retirado:123212', '01:04:59', '2022-10-28'),
(80, 1, 'Análisis', 'Ha sido eliminado un consumo', 'Codigo:231232', 'Insumo retirado:132312', '01:05:05', '2022-10-28'),
(81, 1, 'Análisis', 'Ha sido asignado un consumo', 'Codigo:231232', 'Insumo asignado:132312', '01:05:09', '2022-10-28'),
(82, 1, 'Análisis', 'Ha sido asignado un consumo', 'Codigo:231232', 'Insumo asignado:123212', '01:05:15', '2022-10-28'),
(83, 1, 'sección', 'Ha Cerrado sección', '', '', '01:27:56', '2022-10-28'),
(84, 1, 'sección', 'Ha Iniciado sección', '', '', '01:27:59', '2022-10-28'),
(85, 1, 'sección', 'Ha Cerrado sección', '', '', '01:28:34', '2022-10-28'),
(86, 1, 'sección', 'Ha Iniciado sección', '', '', '01:28:36', '2022-10-28'),
(87, 1, 'sección', 'Ha Cerrado sección', '', '', '01:29:37', '2022-10-28'),
(88, 1, 'sección', 'Ha Iniciado sección', '', '', '01:29:39', '2022-10-28'),
(89, 1, 'sección', 'Ha Cerrado sección', '', '', '01:37:10', '2022-10-28'),
(90, 1, 'sección', 'Ha Iniciado sección', '', '', '01:37:12', '2022-10-28'),
(91, 1, 'Respaldo', 'Un respaldo ha sido Creado', 'Codigo:8', 'Nombre del respaldo:facturacion_28_10_2022_01_37_20.sql', '01:37:22', '2022-10-28'),
(92, 1, 'sección', 'Ha Cerrado sección', '', '', '01:49:07', '2022-10-28'),
(93, 1, 'sección', 'Ha Iniciado sección', '', '', '01:49:09', '2022-10-28'),
(94, 1, 'sección', 'Ha Cerrado sección', '', '', '01:51:32', '2022-10-28'),
(95, 1, 'sección', 'Ha Iniciado sección', '', '', '01:51:34', '2022-10-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_car` bigint(40) NOT NULL,
  `id_cli_car` bigint(40) NOT NULL,
  `id_an_car` bigint(40) NOT NULL,
  `can_car` bigint(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cli` bigint(40) NOT NULL,
  `cedula_rif` bigint(40) NOT NULL,
  `tipo_cli` tinyint(1) NOT NULL,
  `cedula_2` tinyint(1) NOT NULL,
  `nom_cli` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `tlf_num_cli` bigint(11) UNSIGNED ZEROFILL NOT NULL,
  `di_cli` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `estado_cli` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id_compra` bigint(20) NOT NULL,
  `id_pro_com` bigint(20) NOT NULL,
  `gasto_t` double NOT NULL,
  `fecha_com` date NOT NULL,
  `hora_com` time NOT NULL,
  `estado_compra` tinyint(1) NOT NULL,
  `iva_compra` varchar(5) NOT NULL,
  `id_us_compra` bigint(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consumo`
--

CREATE TABLE `consumo` (
  `id_co` bigint(20) NOT NULL,
  `id_an_co` bigint(20) NOT NULL,
  `id_in_co` bigint(20) NOT NULL,
  `ca_co` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `consumo`
--

INSERT INTO `consumo` (`id_co`, `id_an_co`, `id_in_co`, `ca_co`) VALUES
(12, 2, 104, 12.31),
(13, 2, 103, 12312);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_compra`
--

CREATE TABLE `detalles_compra` (
  `id_det_com` bigint(20) NOT NULL,
  `id_com_det` bigint(20) NOT NULL,
  `id_in_com` bigint(20) NOT NULL,
  `can_in_det` float NOT NULL,
  `costo_unidad` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_factura`
--

CREATE TABLE `detalles_factura` (
  `id_det_fac` bigint(20) NOT NULL,
  `id_co_det_fac` bigint(20) NOT NULL,
  `id_an_det_fac` bigint(20) NOT NULL,
  `can_det_fac` bigint(40) NOT NULL,
  `precio_unidad` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_fac` bigint(20) NOT NULL,
  `id_cli_fac` bigint(40) NOT NULL,
  `id_usd_fac` bigint(20) NOT NULL,
  `fecha_fac` date NOT NULL,
  `precio_total` double NOT NULL,
  `hora_fac` time NOT NULL,
  `estado_fac` tinyint(1) NOT NULL,
  `iva_factura` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_pago`
--

CREATE TABLE `forma_pago` (
  `id_forma_pago` bigint(40) NOT NULL,
  `nom_forma_pago` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `forma_pago`
--

INSERT INTO `forma_pago` (`id_forma_pago`, `nom_forma_pago`) VALUES
(1, 'Pago Movil'),
(2, 'Efectivo'),
(3, 'Transferencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE `gastos` (
  `id_gastos` bigint(40) NOT NULL,
  `insumos_id` bigint(40) NOT NULL,
  `can_ins_gasto` float NOT NULL,
  `id_fac_gas` bigint(40) NOT NULL,
  `fecha_gas` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informe`
--

CREATE TABLE `informe` (
  `id_info` bigint(40) NOT NULL,
  `id_us_info` bigint(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumos`
--

CREATE TABLE `insumos` (
  `id_in` bigint(40) NOT NULL,
  `cod_in` bigint(6) UNSIGNED ZEROFILL NOT NULL,
  `nom_in` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `tipo_in` bigint(20) NOT NULL,
  `cantidad_in` double NOT NULL,
  `unidad_medicion` int(1) NOT NULL,
  `stockmax` double NOT NULL,
  `stockmin` double NOT NULL,
  `estado_in` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `insumos`
--

INSERT INTO `insumos` (`id_in`, `cod_in`, `nom_in`, `tipo_in`, `cantidad_in`, `unidad_medicion`, `stockmax`, `stockmin`, `estado_in`) VALUES
(103, 123212, 'WQEWQ', 5, 0, 1, 12321, 11, 1),
(104, 132312, 'WQEWQEQW', 5, 0, 2, 12312.31, 1.11, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumos_temp`
--

CREATE TABLE `insumos_temp` (
  `id_ins_temp` bigint(40) NOT NULL,
  `id_ins_id` bigint(40) NOT NULL,
  `can_ins_temp` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intentos`
--

CREATE TABLE `intentos` (
  `id_intentos` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_hora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iva`
--

CREATE TABLE `iva` (
  `id_iva` int(40) NOT NULL,
  `cantidad_iva` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `iva`
--

INSERT INTO `iva` (`id_iva`, `cantidad_iva`) VALUES
(1, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_compra`
--

CREATE TABLE `lista_compra` (
  `id_lista_compra` bigint(40) NOT NULL,
  `id_pro_com_det` bigint(40) NOT NULL,
  `id_in_com` bigint(40) NOT NULL,
  `can_in_com` double NOT NULL,
  `costo_in_com` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_mercancia`
--

CREATE TABLE `lista_mercancia` (
  `id_lista_mercancia` bigint(20) NOT NULL,
  `id_proveedor_mercancia` bigint(20) NOT NULL,
  `id_insumo_mercancia` bigint(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_compra`
--

CREATE TABLE `pago_compra` (
  `id_pago_compra` bigint(20) NOT NULL,
  `id_compra_pago` bigint(20) NOT NULL,
  `id_forma_pago` bigint(20) NOT NULL,
  `cantidad_pago` double NOT NULL,
  `referencia` bigint(13) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_factura`
--

CREATE TABLE `pago_factura` (
  `id_pago_fac` bigint(20) NOT NULL,
  `id_forma_pago` bigint(20) NOT NULL,
  `id_fac_pago` bigint(20) NOT NULL,
  `cantidad_pago` double NOT NULL,
  `referencia` bigint(13) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedidos` bigint(20) NOT NULL,
  `id_in_pe` bigint(20) NOT NULL,
  `cantidad_pe` double NOT NULL,
  `id_compra_pe` bigint(20) NOT NULL,
  `estado_pe` tinyint(1) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `id_us_pe` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id_pregunta` bigint(40) NOT NULL,
  `id_us_pre` bigint(20) NOT NULL,
  `pregunta` varchar(40) NOT NULL,
  `respuesta` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id_pregunta`, `id_us_pre`, `pregunta`, `respuesta`) VALUES
(1, 1, 'cumpleaños', 'b9546d413031495e48d697484185b9fb'),
(2, 1, 'nombre de mis hijos', '3c9c03d6008a5adf42c2a55dd4a1a9f2'),
(3, 1, '¿escuela?', '2690ef9d0ac4fb1d072eec496e292e9a'),
(4, 13, 'nombre de mi madre', 'e8b129f85d154480f40cbb0ffe177766'),
(5, 13, '¿nombre de mi primer perrito?', '33bd686f94c0c42b4ec2219ffdcf11c6'),
(6, 13, '¿película favorita?', 'bef27466a245ce3ec692bd25409c2549');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_pro` bigint(40) NOT NULL,
  `rif_pro` bigint(8) UNSIGNED ZEROFILL NOT NULL,
  `tipo_pro` tinyint(1) NOT NULL,
  `rif_2` tinyint(1) NOT NULL,
  `nom_pro` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `tlf_num_pro` bigint(11) UNSIGNED ZEROFILL NOT NULL,
  `dir_pro` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `correo_pro` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `estado_pro` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respaldo`
--

CREATE TABLE `respaldo` (
  `id_respaldo` bigint(20) NOT NULL,
  `ruta` text NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `respaldo`
--

INSERT INTO `respaldo` (`id_respaldo`, `ruta`, `fecha`, `hora`) VALUES
(1, 'facturacion_27_10_2022_21_13_44.sql', '2022-10-27', '21:13:44'),
(2, 'facturacion_28_10_2022_00_07_32.sql', '2022-10-28', '00:07:32'),
(3, 'facturacion_28_10_2022_00_10_59.sql', '2022-10-28', '00:10:59'),
(4, 'facturacion_28_10_2022_00_12_47.sql', '2022-10-28', '00:12:47'),
(5, 'facturacion_28_10_2022_00_13_01.sql', '2022-10-28', '00:13:01'),
(6, '28_10_2022_00_19_351234.sql', '2022-10-28', '00:19:35'),
(7, '28_10_2022_00_20_0302-10-15_11-10-2022_facturacion.sql', '2022-10-28', '00:20:03'),
(8, 'facturacion_28_10_2022_01_37_20.sql', '2022-10-28', '01:37:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_an_in`
--

CREATE TABLE `tipo_an_in` (
  `id_tipo` bigint(20) NOT NULL,
  `nombre_tipo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_an_in`
--

INSERT INTO `tipo_an_in` (`id_tipo`, `nombre_tipo`) VALUES
(1, 'Química sanguínea'),
(2, 'hematología'),
(3, 'Serología'),
(4, 'orina y heces'),
(5, 'mixtos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_us` bigint(20) NOT NULL,
  `nom_us` varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `nick_us` varchar(40) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pass_us` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `cedula_us` bigint(20) NOT NULL,
  `apellido_us` varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `num_tlf_us` bigint(11) UNSIGNED ZEROFILL NOT NULL,
  `nivel_us` bigint(20) NOT NULL,
  `estado_us` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_us`, `nom_us`, `nick_us`, `pass_us`, `cedula_us`, `apellido_us`, `num_tlf_us`, `nivel_us`, `estado_us`) VALUES
(1, 'Heilyn', 'heilin', '21232f297a57a5a743894a0e4a801fc3', 13770546, 'Cabreras', 02312312312, 1, 1),
(13, 'marifelix', 'lanene1972', '827ccb0eea8a706c4c34a16891f84e7b', 31234432, 'lanene', 04124544457, 2, 1),
(17, 'trabajador', 'trabajador', '082dd3179733e3e716a58eb90f418a78', 23233344, 'trabajador', 01242344567, 3, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `analisis`
--
ALTER TABLE `analisis`
  ADD PRIMARY KEY (`id_an`),
  ADD KEY `tipo_an` (`tipo_an`);

--
-- Indices de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD PRIMARY KEY (`id_au`),
  ADD KEY `id_us_au` (`id_us_au`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_car`),
  ADD KEY `id_cli_car` (`id_cli_car`),
  ADD KEY `id_an_car` (`id_an_car`),
  ADD KEY `can_car` (`can_car`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cli`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id_pro_com` (`id_pro_com`),
  ADD KEY `id_us_compra` (`id_us_compra`);

--
-- Indices de la tabla `consumo`
--
ALTER TABLE `consumo`
  ADD PRIMARY KEY (`id_co`),
  ADD KEY `id_an_co` (`id_an_co`),
  ADD KEY `id_in_co` (`id_in_co`);

--
-- Indices de la tabla `detalles_compra`
--
ALTER TABLE `detalles_compra`
  ADD PRIMARY KEY (`id_det_com`),
  ADD KEY `id_com_det` (`id_com_det`),
  ADD KEY `id_in_com` (`id_in_com`);

--
-- Indices de la tabla `detalles_factura`
--
ALTER TABLE `detalles_factura`
  ADD PRIMARY KEY (`id_det_fac`),
  ADD KEY `id_co_det_fac` (`id_co_det_fac`),
  ADD KEY `id_an_det_fac` (`id_an_det_fac`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_fac`),
  ADD KEY `id_cli_fac` (`id_cli_fac`),
  ADD KEY `id_usd_fac` (`id_usd_fac`),
  ADD KEY `iva_factura` (`iva_factura`);

--
-- Indices de la tabla `forma_pago`
--
ALTER TABLE `forma_pago`
  ADD PRIMARY KEY (`id_forma_pago`);

--
-- Indices de la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`id_gastos`),
  ADD KEY `id_fac_gas` (`id_fac_gas`),
  ADD KEY `insumos_id` (`insumos_id`);

--
-- Indices de la tabla `informe`
--
ALTER TABLE `informe`
  ADD PRIMARY KEY (`id_info`),
  ADD KEY `id_us_info` (`id_us_info`);

--
-- Indices de la tabla `insumos`
--
ALTER TABLE `insumos`
  ADD PRIMARY KEY (`id_in`),
  ADD KEY `tipo_in` (`tipo_in`);

--
-- Indices de la tabla `insumos_temp`
--
ALTER TABLE `insumos_temp`
  ADD PRIMARY KEY (`id_ins_temp`),
  ADD KEY `id_ins_id` (`id_ins_id`);

--
-- Indices de la tabla `intentos`
--
ALTER TABLE `intentos`
  ADD PRIMARY KEY (`id_intentos`);

--
-- Indices de la tabla `iva`
--
ALTER TABLE `iva`
  ADD PRIMARY KEY (`id_iva`);

--
-- Indices de la tabla `lista_compra`
--
ALTER TABLE `lista_compra`
  ADD PRIMARY KEY (`id_lista_compra`),
  ADD KEY `id_pro_en` (`id_pro_com_det`),
  ADD KEY `id_en_in` (`id_in_com`);

--
-- Indices de la tabla `lista_mercancia`
--
ALTER TABLE `lista_mercancia`
  ADD PRIMARY KEY (`id_lista_mercancia`),
  ADD KEY `id_proveedor_mercancia` (`id_proveedor_mercancia`),
  ADD KEY `id_insumo_mercancia` (`id_insumo_mercancia`);

--
-- Indices de la tabla `pago_compra`
--
ALTER TABLE `pago_compra`
  ADD PRIMARY KEY (`id_pago_compra`),
  ADD KEY `id_compra_pago` (`id_compra_pago`),
  ADD KEY `id_forma_pago` (`id_forma_pago`);

--
-- Indices de la tabla `pago_factura`
--
ALTER TABLE `pago_factura`
  ADD PRIMARY KEY (`id_pago_fac`),
  ADD KEY `id_fac_pago` (`id_fac_pago`),
  ADD KEY `id_forma_pago` (`id_forma_pago`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedidos`),
  ADD KEY `id_us_pe` (`id_us_pe`),
  ADD KEY `id_compra_pe` (`id_compra_pe`),
  ADD KEY `id_in_pe` (`id_in_pe`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id_pregunta`),
  ADD KEY `id_us_pre` (`id_us_pre`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_pro`);

--
-- Indices de la tabla `respaldo`
--
ALTER TABLE `respaldo`
  ADD PRIMARY KEY (`id_respaldo`);

--
-- Indices de la tabla `tipo_an_in`
--
ALTER TABLE `tipo_an_in`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_us`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `analisis`
--
ALTER TABLE `analisis`
  MODIFY `id_an` bigint(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `id_au` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_car` bigint(40) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cli` bigint(40) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT de la tabla `consumo`
--
ALTER TABLE `consumo`
  MODIFY `id_co` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `detalles_compra`
--
ALTER TABLE `detalles_compra`
  MODIFY `id_det_com` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalles_factura`
--
ALTER TABLE `detalles_factura`
  MODIFY `id_det_fac` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_fac` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `forma_pago`
--
ALTER TABLE `forma_pago`
  MODIFY `id_forma_pago` bigint(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `gastos`
--
ALTER TABLE `gastos`
  MODIFY `id_gastos` bigint(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `informe`
--
ALTER TABLE `informe`
  MODIFY `id_info` bigint(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `insumos`
--
ALTER TABLE `insumos`
  MODIFY `id_in` bigint(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT de la tabla `insumos_temp`
--
ALTER TABLE `insumos_temp`
  MODIFY `id_ins_temp` bigint(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT de la tabla `intentos`
--
ALTER TABLE `intentos`
  MODIFY `id_intentos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `iva`
--
ALTER TABLE `iva`
  MODIFY `id_iva` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `lista_compra`
--
ALTER TABLE `lista_compra`
  MODIFY `id_lista_compra` bigint(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT de la tabla `lista_mercancia`
--
ALTER TABLE `lista_mercancia`
  MODIFY `id_lista_mercancia` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `pago_compra`
--
ALTER TABLE `pago_compra`
  MODIFY `id_pago_compra` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `pago_factura`
--
ALTER TABLE `pago_factura`
  MODIFY `id_pago_fac` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedidos` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id_pregunta` bigint(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_pro` bigint(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `respaldo`
--
ALTER TABLE `respaldo`
  MODIFY `id_respaldo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tipo_an_in`
--
ALTER TABLE `tipo_an_in`
  MODIFY `id_tipo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_us` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `analisis`
--
ALTER TABLE `analisis`
  ADD CONSTRAINT `analisis_ibfk_1` FOREIGN KEY (`tipo_an`) REFERENCES `tipo_an_in` (`id_tipo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD CONSTRAINT `auditoria_ibfk_1` FOREIGN KEY (`id_us_au`) REFERENCES `usuario` (`id_us`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`id_an_car`) REFERENCES `analisis` (`id_an`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`id_cli_car`) REFERENCES `cliente` (`id_cli`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`id_pro_com`) REFERENCES `proveedor` (`id_pro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compra_ibfk_4` FOREIGN KEY (`id_us_compra`) REFERENCES `usuario` (`id_us`);

--
-- Filtros para la tabla `consumo`
--
ALTER TABLE `consumo`
  ADD CONSTRAINT `consumo_ibfk_1` FOREIGN KEY (`id_in_co`) REFERENCES `insumos` (`id_in`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consumo_ibfk_2` FOREIGN KEY (`id_an_co`) REFERENCES `analisis` (`id_an`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalles_compra`
--
ALTER TABLE `detalles_compra`
  ADD CONSTRAINT `detalles_compra_ibfk_1` FOREIGN KEY (`id_com_det`) REFERENCES `compra` (`id_compra`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalles_compra_ibfk_2` FOREIGN KEY (`id_in_com`) REFERENCES `insumos` (`id_in`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalles_factura`
--
ALTER TABLE `detalles_factura`
  ADD CONSTRAINT `detalles_factura_ibfk_2` FOREIGN KEY (`id_co_det_fac`) REFERENCES `factura` (`id_fac`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalles_factura_ibfk_3` FOREIGN KEY (`id_an_det_fac`) REFERENCES `analisis` (`id_an`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`id_usd_fac`) REFERENCES `usuario` (`id_us`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`id_cli_fac`) REFERENCES `cliente` (`id_cli`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD CONSTRAINT `gastos_ibfk_1` FOREIGN KEY (`id_fac_gas`) REFERENCES `factura` (`id_fac`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gastos_ibfk_2` FOREIGN KEY (`insumos_id`) REFERENCES `insumos` (`id_in`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `informe`
--
ALTER TABLE `informe`
  ADD CONSTRAINT `informe_ibfk_1` FOREIGN KEY (`id_us_info`) REFERENCES `usuario` (`id_us`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `insumos`
--
ALTER TABLE `insumos`
  ADD CONSTRAINT `insumos_ibfk_1` FOREIGN KEY (`tipo_in`) REFERENCES `tipo_an_in` (`id_tipo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `insumos_temp`
--
ALTER TABLE `insumos_temp`
  ADD CONSTRAINT `insumos_temp_ibfk_1` FOREIGN KEY (`id_ins_id`) REFERENCES `insumos` (`id_in`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `lista_compra`
--
ALTER TABLE `lista_compra`
  ADD CONSTRAINT `lista_compra_ibfk_1` FOREIGN KEY (`id_in_com`) REFERENCES `insumos` (`id_in`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lista_compra_ibfk_2` FOREIGN KEY (`id_pro_com_det`) REFERENCES `proveedor` (`id_pro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `lista_mercancia`
--
ALTER TABLE `lista_mercancia`
  ADD CONSTRAINT `lista_mercancia_ibfk_1` FOREIGN KEY (`id_proveedor_mercancia`) REFERENCES `proveedor` (`id_pro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lista_mercancia_ibfk_2` FOREIGN KEY (`id_insumo_mercancia`) REFERENCES `insumos` (`id_in`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pago_compra`
--
ALTER TABLE `pago_compra`
  ADD CONSTRAINT `pago_compra_ibfk_1` FOREIGN KEY (`id_compra_pago`) REFERENCES `compra` (`id_compra`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pago_compra_ibfk_2` FOREIGN KEY (`id_forma_pago`) REFERENCES `forma_pago` (`id_forma_pago`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pago_factura`
--
ALTER TABLE `pago_factura`
  ADD CONSTRAINT `pago_factura_ibfk_1` FOREIGN KEY (`id_fac_pago`) REFERENCES `factura` (`id_fac`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pago_factura_ibfk_2` FOREIGN KEY (`id_forma_pago`) REFERENCES `forma_pago` (`id_forma_pago`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_in_pe`) REFERENCES `insumos` (`id_in`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`id_compra_pe`) REFERENCES `compra` (`id_compra`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_ibfk_3` FOREIGN KEY (`id_us_pe`) REFERENCES `usuario` (`id_us`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `preguntas_ibfk_1` FOREIGN KEY (`id_us_pre`) REFERENCES `usuario` (`id_us`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2022 a las 03:35:29
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 7.4.30

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
(1, 213213, 'de sangre', 2, 123.21, 'hematologia', 1),
(2, 777776, 'Para tomar el ph', 4, 23.38, 'Prueba de pH', 1),
(3, 775565, 'para saber si tiene vih', 4, 66, 'prueba de VIH', 1),
(4, 415416, 'para embarazadas y embarazados', 3, 55.14, 'Prueba de embarzo', 1),
(5, 545554, 'Análisis de uria', 1, 85.55, 'Análisis de uria', 1),
(6, 744654, 'Análsis de Colesterol', 1, 54.42, 'Análsis de Colesterol', 1);

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
(31, 1, 'Respaldo', 'Un respaldo ha sido Creado', 'Codigo:4', 'Nombre del respaldo:facturacion_28_10_2022_03_06_02.sql', '03:06:05', '2022-10-28'),
(32, 1, 'sección', 'Ha Cerrado sección', '', '', '07:16:47', '2022-10-28'),
(33, 1, 'sección', 'Ha Iniciado sección', '', '', '07:17:07', '2022-10-28'),
(34, 1, 'Usuario', 'Ha sido actualizado', 'Cedula:31234432', 'El usuario fue actualizado', '07:17:32', '2022-10-28'),
(35, 1, 'Usuario', 'Ha sido actualizado', 'Cedula:31234432', 'La clave fue actualizada', '07:17:53', '2022-10-28'),
(36, 1, 'sección', 'Ha Cerrado sección', '', '', '07:18:04', '2022-10-28'),
(37, 13, 'sección', 'Ha Iniciado sección', '', '', '07:18:16', '2022-10-28'),
(38, 13, 'Usuario', 'Ha sido actualizado', 'Cedula:31234432', 'La clave fue actualizada', '07:18:51', '2022-10-28'),
(39, 13, 'Usuario', 'Ha sido actualizado', 'Cedula:31234432', 'La clave fue actualizada', '07:22:03', '2022-10-28'),
(40, 13, 'Usuario', 'Ha sido actualizado', 'Cedula:31234432', 'La clave fue actualizada', '07:25:08', '2022-10-28'),
(41, 13, 'Cliente', 'Ha sido registrado', 'Cedula/rif:21321312', '', '07:26:28', '2022-10-28'),
(42, 13, 'Cliente', 'Ha sido registrado', 'Cedula/rif:13232132', '', '07:27:16', '2022-10-28'),
(43, 13, 'sección', 'Ha Cerrado sección', '', '', '07:29:24', '2022-10-28'),
(44, 1, 'sección', 'Ha Iniciado sección', '', '', '07:29:38', '2022-10-28'),
(45, 1, 'sección', 'Ha Cerrado sección', '', '', '07:32:38', '2022-10-28'),
(46, 1, 'sección', 'Ha Iniciado sección', '', '', '07:33:19', '2022-10-28'),
(47, 1, 'Usuario', 'Ha sido actualizado', 'Cedula:23233344', 'La clave fue actualizada', '07:33:34', '2022-10-28'),
(48, 1, 'Usuario', 'Ha sido asignada una pregunta de seguridad', 'Cedula:23233344', '', '07:33:59', '2022-10-28'),
(49, 1, 'Usuario', 'Ha sido asignada una pregunta de seguridad', 'Cedula:23233344', '', '07:34:20', '2022-10-28'),
(50, 1, 'Usuario', 'Ha sido asignada una pregunta de seguridad', 'Cedula:23233344', '', '07:34:39', '2022-10-28'),
(51, 1, 'Usuario', 'Ha sido asignada una pregunta de seguridad', 'Cedula:23233344', '', '07:34:57', '2022-10-28'),
(52, 1, 'sección', 'Ha Cerrado sección', '', '', '07:35:02', '2022-10-28'),
(53, 17, 'Usuario', 'Ha sido actualizado', 'Cedula:23233344', 'La clave fue actualizada', '07:35:17', '2022-10-28'),
(54, 17, 'sección', 'Ha Iniciado sección', '', '', '07:35:24', '2022-10-28'),
(55, 17, 'Cliente', 'Ha sido registrado', 'Cedula/rif:02921321', '', '07:36:13', '2022-10-28'),
(56, 17, 'sección', 'Ha Cerrado sección', '', '', '07:36:44', '2022-10-28'),
(57, 17, 'sección', 'Ha Iniciado sección', '', '', '07:39:29', '2022-10-28'),
(58, 17, 'sección', 'Ha Cerrado sección', '', '', '07:39:35', '2022-10-28'),
(59, 17, 'sección', 'Ha Iniciado sección', '', '', '07:40:43', '2022-10-28'),
(60, 17, 'sección', 'Ha Cerrado sección', '', '', '07:40:59', '2022-10-28'),
(61, 1, 'sección', 'Ha Iniciado sección', '', '', '07:41:02', '2022-10-28'),
(62, 1, 'Insumos', 'Ha sido registrado', 'Codigo:322132', '', '07:42:04', '2022-10-28'),
(63, 1, 'Proveedor', 'Ha sido registrado', 'RIF:56655465', '', '07:44:44', '2022-10-28'),
(64, 1, 'Análisis', 'Ha sido registrado', 'Codigo:213213', '', '07:45:06', '2022-10-28'),
(65, 1, 'Proveedor', 'Ha sido registrado', 'RIF:13213213', '', '07:51:37', '2022-10-28'),
(66, 1, 'Proveedor', 'Ha sido registrado', 'RIF:21321321', '', '07:55:25', '2022-10-28'),
(67, 1, 'Proveedor', 'Ha sido registrado', 'RIF:34234234', '', '07:57:05', '2022-10-28'),
(68, 1, 'Insumos', 'Ha sido registrado', 'Codigo:232132', '', '08:06:13', '2022-10-28'),
(69, 1, 'Análisis', 'Ha sido registrado', 'Codigo:564664', '', '08:07:09', '2022-10-28'),
(70, 1, 'Análisis', 'Ha sido registrado', 'Codigo:775565', '', '08:09:28', '2022-10-28'),
(71, 1, 'Cliente', 'Ha sido registrado', 'Cedula/rif:23123213', '', '08:09:58', '2022-10-28'),
(73, 1, 'Cliente', 'Ha sido actualizado', 'Cedula/RIF:', 'El Nombre fue actualizado', '08:10:55', '2022-10-28'),
(74, 1, 'Cliente', 'Ha sido actualizado', 'Cedula/RIF:', 'El Numero Telefonico fue actualizado', '08:10:55', '2022-10-28'),
(75, 1, 'Cliente', 'Ha sido actualizado', 'Cedula/RIF:', 'La Dirección fue actualizada', '08:10:55', '2022-10-28'),
(77, 1, 'Cliente', 'Ha sido actualizado', 'Cedula/RIF:', 'El Numero Telefonico fue actualizado', '08:13:00', '2022-10-28'),
(78, 1, 'Cliente', 'Ha sido actualizado', 'Cedula/RIF:', 'La Dirección fue actualizada', '08:13:00', '2022-10-28'),
(79, 1, 'Cliente', 'Ha sido actualizado', 'Cedula/RIF:E-23123218-7', 'Cedula/RIF fue actualizada; Cedula/RIF anterior:J-23123217-7, Cedula/RIF actual:E-23123218-7', '08:14:54', '2022-10-28'),
(80, 1, 'Cliente', 'Ha sido actualizado', 'Cedula/RIF:E-23123218-7', 'El Numero Telefonico fue actualizado', '08:14:54', '2022-10-28'),
(81, 1, 'Cliente', 'Ha sido actualizado', 'Cedula/RIF:E-23123218-7', 'La Dirección fue actualizada', '08:14:54', '2022-10-28'),
(82, 1, 'Cliente', 'Ha sido actualizado', 'Cedula/RIF:23123218', 'Cedula/RIF fue actualizada; Cedula/RIF anterior:E-23123218-7, Cedula/RIF actual:23123218', '08:15:04', '2022-10-28'),
(83, 1, 'Cliente', 'Ha sido actualizado', 'Cedula/RIF:23123218', 'La Dirección fue actualizada', '08:15:04', '2022-10-28'),
(84, 1, 'Cliente', 'Ha sido actualizado', 'Cedula/RIF:V-23123218-7', 'Cedula/RIF fue actualizada; Cedula/RIF anterior:23123218, Cedula/RIF actual:V-23123218-7', '08:18:42', '2022-10-28'),
(85, 1, 'Cliente', 'Ha sido actualizado', 'Cedula/RIF:V-23123218-7', 'El Numero Telefonico fue actualizado', '08:18:42', '2022-10-28'),
(86, 1, 'Cliente', 'Ha sido actualizado', 'Cedula/RIF:V-23123218-7', 'La Dirección fue actualizada', '08:18:42', '2022-10-28'),
(87, 1, 'Cliente', 'Ha sido actualizado', 'Cedula/RIF:23123218', 'Cedula/RIF fue actualizada; Cedula/RIF anterior:V-23123218-7, Cedula/RIF actual:23123218', '08:18:47', '2022-10-28'),
(88, 1, 'Cliente', 'Ha sido desactivado', 'Cedula/rif:23123218', 'Estado Cliente: desactivado', '08:18:56', '2022-10-28'),
(89, 1, 'Cliente', 'Ha sido activado', 'Cedula/rif:23123218', 'Estado Cliente: activo', '08:18:58', '2022-10-28'),
(90, 1, 'Cliente', 'Ha sido desactivado', 'Cedula/rif:V-13232132-4', 'Estado Cliente: desactivado', '08:19:04', '2022-10-28'),
(91, 1, 'Cliente', 'Ha sido activado', 'Cedula/rif:V-13232132-4', 'Estado Cliente: activo', '08:19:06', '2022-10-28'),
(92, 1, 'Análisis', 'Ha sido actualizado', 'Codigo:777777', 'El Tipo de análisis fue actualizado', '08:22:09', '2022-10-28'),
(93, 1, 'Análisis', 'Ha sido actualizado', 'Codigo:777777', 'El Codigo fue actualizado; Codigo anterior:564664, actual:777777', '08:22:09', '2022-10-28'),
(94, 1, 'Análisis', 'Ha sido actualizado', 'Codigo:777777', 'El Nombre fue actualizado', '08:22:09', '2022-10-28'),
(95, 1, 'Análisis', 'Ha sido actualizado', 'Codigo:777777', 'La Descripción fue actualizada', '08:22:09', '2022-10-28'),
(96, 1, 'Análisis', 'Ha sido actualizado', 'Codigo:777777', 'El Precio fue actualizado', '08:22:09', '2022-10-28'),
(97, 1, 'Análisis', 'Ha sido actualizado', 'Codigo:775565', 'El Tipo de análisis fue actualizado', '08:22:20', '2022-10-28'),
(98, 1, 'Análisis', 'Ha sido desactivado', 'Codigo:775565', 'Estado Análisis: desactivado', '08:22:28', '2022-10-28'),
(99, 1, 'Análisis', 'Ha sido activado', 'Codigo:775565', 'Estado Análisis: activo', '08:22:30', '2022-10-28'),
(100, 1, 'Análisis', 'Ha sido asignado un consumo', 'Codigo:775565', 'Insumo asignado:232132', '08:22:53', '2022-10-28'),
(101, 1, 'Análisis', 'Ha sido actualizado un consumo', 'Codigo:775565', 'Insumo actualizado:232132', '08:22:57', '2022-10-28'),
(102, 1, 'Análisis', 'Ha sido eliminado un consumo', 'Codigo:775565', 'Insumo retirado:232132', '08:23:01', '2022-10-28'),
(103, 1, 'Análisis', 'Ha sido asignado un consumo', 'Codigo:775565', 'Insumo asignado:232132', '08:23:05', '2022-10-28'),
(104, 1, 'Análisis', 'Ha sido asignado un consumo', 'Codigo:775565', 'Insumo asignado:322132', '08:23:08', '2022-10-28'),
(105, 1, 'Insumos', 'Ha sido actualizado', 'Codigo:322137', 'El Codigo fue actualizado; Codigo anterior:322132, actual:322137', '08:23:53', '2022-10-28'),
(106, 1, 'Insumos', 'Ha sido actualizado', 'Codigo:322137', 'El Nombre fue actualizado', '08:23:53', '2022-10-28'),
(107, 1, 'Insumos', 'Ha sido actualizado', 'Codigo:322137', 'El Stock maxímo fue actualizado', '08:23:53', '2022-10-28'),
(108, 1, 'Insumos', 'Ha sido actualizado', 'Codigo:322137', 'El Stock minimo fue actualizado', '08:23:53', '2022-10-28'),
(109, 1, 'Insumos', 'Ha sido registrado', 'Codigo:885867', '', '08:24:32', '2022-10-28'),
(110, 1, 'Análisis', 'Ha sido actualizado', 'Codigo:777776', 'El Codigo fue actualizado; Codigo anterior:777777, actual:777776', '08:25:03', '2022-10-28'),
(111, 1, 'Insumos', 'Ha sido actualizado', 'Codigo:885868', 'El Tipo de insumo fue actualizado', '08:25:26', '2022-10-28'),
(112, 1, 'Insumos', 'Ha sido actualizado', 'Codigo:885868', 'El Codigo fue actualizado; Codigo anterior:885867, actual:885868', '08:25:26', '2022-10-28'),
(113, 1, 'Insumos', 'Ha sido actualizado', 'Codigo:885868', 'El Nombre fue actualizado', '08:25:26', '2022-10-28'),
(114, 1, 'Insumos', 'Ha sido actualizado', 'Codigo:885868', 'La Unidad de medición fue actualizada', '08:25:26', '2022-10-28'),
(115, 1, 'Insumos', 'Ha sido actualizado', 'Codigo:885868', 'El Stock maxímo fue actualizado', '08:25:26', '2022-10-28'),
(116, 1, 'Insumos', 'Ha sido actualizado', 'Codigo:885868', 'El Stock minimo fue actualizado', '08:25:26', '2022-10-28'),
(117, 1, 'Insumos', 'Ha sido actualizado', 'Codigo:885868', 'La Unidad de medición fue actualizada', '08:25:37', '2022-10-28'),
(118, 1, 'Insumos', 'Ha sido actualizado', 'Codigo:885868', 'El Stock maxímo fue actualizado', '08:25:37', '2022-10-28'),
(119, 1, 'Insumos', 'Ha sido actualizado', 'Codigo:885868', 'El Stock minimo fue actualizado', '08:25:37', '2022-10-28'),
(120, 1, 'Análisis', 'Ha sido asignado un consumo', 'Codigo:777776', 'Insumo asignado:232132', '08:25:57', '2022-10-28'),
(121, 1, 'Análisis', 'Ha sido asignado un consumo', 'Codigo:777776', 'Insumo asignado:885868', '08:26:12', '2022-10-28'),
(122, 1, 'Análisis', 'Ha sido actualizado un consumo', 'Codigo:777776', 'Insumo actualizado:232132', '08:26:18', '2022-10-28'),
(123, 1, 'Análisis', 'Ha sido eliminado un consumo', 'Codigo:777776', 'Insumo retirado:232132', '08:26:23', '2022-10-28'),
(124, 1, 'Análisis', 'Ha sido asignado un consumo', 'Codigo:777776', 'Insumo asignado:232132', '08:26:32', '2022-10-28'),
(125, 1, 'Análisis', 'Ha sido asignado un consumo', 'Codigo:777776', 'Insumo asignado:322137', '08:26:36', '2022-10-28'),
(126, 1, 'Insumos', 'Ha sido registrado', 'Codigo:785352', '', '08:27:24', '2022-10-28'),
(127, 1, 'Insumos', 'Ha sido registrado', 'Codigo:556435', '', '08:29:00', '2022-10-28'),
(128, 1, 'Insumos', 'Ha sido registrado', 'Codigo:998778', '', '08:29:39', '2022-10-28'),
(129, 1, 'Insumos', 'Ha sido registrado', 'Codigo:588556', '', '08:30:27', '2022-10-28'),
(130, 1, 'Insumos', 'Ha sido registrado', 'Codigo:528848', '', '08:32:07', '2022-10-28'),
(131, 1, 'Insumos', 'Ha sido registrado', 'Codigo:958949', '', '08:32:51', '2022-10-28'),
(132, 1, 'Insumos', 'Ha sido registrado', 'Codigo:658849', '', '08:33:33', '2022-10-28'),
(133, 1, 'Insumos', 'Ha sido registrado', 'Codigo:144854', '', '08:34:21', '2022-10-28'),
(134, 1, 'Insumos', 'Ha sido registrado', 'Codigo:655596', '', '08:35:29', '2022-10-28'),
(135, 1, 'Análisis', 'Ha sido registrado', 'Codigo:415416', '', '08:44:10', '2022-10-28'),
(136, 1, 'Análisis', 'Ha sido registrado', 'Codigo:545554', '', '08:46:48', '2022-10-28'),
(137, 1, 'Análisis', 'Ha sido registrado', 'Codigo:744654', '', '08:47:40', '2022-10-28'),
(138, 1, 'Insumos', 'Ha sido registrado', 'Codigo:988468', '', '08:48:32', '2022-10-28'),
(139, 1, 'Insumos', 'Ha sido registrado', 'Codigo:875999', '', '08:52:21', '2022-10-28'),
(140, 1, 'Análisis', 'Ha sido asignado un consumo', 'Codigo:213213', 'Insumo asignado:556435', '08:52:48', '2022-10-28'),
(141, 1, 'Análisis', 'Ha sido actualizado un consumo', 'Codigo:213213', 'Insumo actualizado:556435', '08:53:03', '2022-10-28'),
(142, 1, 'Análisis', 'Ha sido eliminado un consumo', 'Codigo:213213', 'Insumo retirado:556435', '08:53:06', '2022-10-28'),
(143, 1, 'Análisis', 'Ha sido asignado un consumo', 'Codigo:213213', 'Insumo asignado:556435', '08:53:15', '2022-10-28'),
(144, 1, 'Análisis', 'Ha sido asignado un consumo', 'Codigo:213213', 'Insumo asignado:875999', '08:53:43', '2022-10-28'),
(145, 1, 'Análisis', 'Ha sido eliminado un consumo', 'Codigo:213213', 'Insumo retirado:875999', '08:53:47', '2022-10-28'),
(146, 1, 'Análisis', 'Ha sido asignado un consumo', 'Codigo:213213', 'Insumo asignado:875999', '08:53:54', '2022-10-28'),
(147, 1, 'Análisis', 'Ha sido asignado un consumo', 'Codigo:213213', 'Insumo asignado:988468', '08:54:08', '2022-10-28'),
(148, 1, 'Análisis', 'Ha sido asignado un consumo', 'Codigo:213213', 'Insumo asignado:785352', '08:54:33', '2022-10-28'),
(149, 1, 'Análisis', 'Ha sido asignado un consumo', 'Codigo:213213', 'Insumo asignado:232132', '08:54:38', '2022-10-28'),
(150, 1, 'Análisis', 'Ha sido asignado un consumo', 'Codigo:213213', 'Insumo asignado:322137', '08:54:47', '2022-10-28'),
(151, 1, 'Análisis', 'Ha sido eliminado un consumo', 'Codigo:777776', 'Insumo retirado:885868', '08:56:05', '2022-10-28'),
(152, 1, 'Análisis', 'Ha sido eliminado un consumo', 'Codigo:777776', 'Insumo retirado:232132', '08:56:13', '2022-10-28'),
(153, 1, 'Análisis', 'Ha sido eliminado un consumo', 'Codigo:777776', 'Insumo retirado:322137', '08:56:16', '2022-10-28'),
(154, 1, 'Análisis', 'Ha sido actualizado', 'Codigo:777776', 'El Tipo de análisis fue actualizado', '08:56:43', '2022-10-28'),
(155, 1, 'Insumos', 'Ha sido actualizado', 'Codigo:885868', 'El Tipo de insumo fue actualizado', '08:56:59', '2022-10-28'),
(156, 1, 'Análisis', 'Ha sido asignado un consumo', 'Codigo:777776', 'Insumo asignado:885868', '08:57:40', '2022-10-28'),
(157, 1, 'Insumos', 'Ha sido registrado', 'Codigo:989845', '', '08:58:12', '2022-10-28'),
(158, 1, 'Análisis', 'Ha sido asignado un consumo', 'Codigo:213213', 'Insumo asignado:989845', '08:58:29', '2022-10-28'),
(159, 1, 'Análisis', 'Ha sido eliminado un consumo', 'Codigo:213213', 'Insumo retirado:989845', '08:58:34', '2022-10-28'),
(160, 1, 'Análisis', 'Ha sido asignado un consumo', 'Codigo:213213', 'Insumo asignado:989845', '08:58:43', '2022-10-28'),
(161, 1, 'Análisis', 'Ha sido actualizado un consumo', 'Codigo:213213', 'Insumo actualizado:989845', '08:58:58', '2022-10-28'),
(162, 1, 'Análisis', 'Ha sido actualizado un consumo', 'Codigo:213213', 'Insumo actualizado:989845', '08:59:03', '2022-10-28'),
(163, 1, 'Análisis', 'Ha sido asignado un consumo', 'Codigo:744654', 'Insumo asignado:588556', '09:00:01', '2022-10-28'),
(164, 1, 'Análisis', 'Ha sido asignado un consumo', 'Codigo:744654', 'Insumo asignado:785352', '09:00:31', '2022-10-28'),
(165, 1, 'Análisis', 'Ha sido asignado un consumo', 'Codigo:744654', 'Insumo asignado:322137', '09:00:35', '2022-10-28'),
(166, 1, 'Análisis', 'Ha sido asignado un consumo', 'Codigo:744654', 'Insumo asignado:232132', '09:00:41', '2022-10-28'),
(167, 1, 'Proveedor', 'Ha sido actualizado', 'RIF:J-56655465-8', 'El RIF fue actualizado; RIF anterior:E-56655468-8, RIF actual:J-56655465-8', '09:01:26', '2022-10-28'),
(168, 1, 'Proveedor', 'Ha sido actualizado', 'RIF:J-56655465-8', 'El Nombre/Razon social fue actualizado', '09:01:26', '2022-10-28'),
(169, 1, 'Proveedor', 'Ha sido actualizado', 'RIF:J-56655465-8', 'El Correo fue actualizado', '09:01:26', '2022-10-28'),
(170, 1, 'Proveedor', 'Ha sido actualizado', 'RIF:J-56655465-8', 'La Dirección fue actualizada', '09:01:26', '2022-10-28'),
(171, 1, 'Proveedor', 'Ha sido actualizado', 'RIF:J-56655465-8', 'El Numero Telefonico fue actualizado', '09:01:26', '2022-10-28'),
(172, 1, 'Proveedor', 'Ha sido desactivado', 'RIF:E-56655468-8', 'Estado Proveedor: desactivado', '09:01:30', '2022-10-28'),
(173, 1, 'Proveedor', 'Ha sido activado', 'RIF:E-56655468-8', 'Estado Proveedor: activo', '09:01:31', '2022-10-28'),
(174, 1, 'Proveedor', 'Ha sido actualizado', 'RIF:P-34234234-2', 'El RIF fue actualizado; RIF anterior:E-34234235-2, RIF actual:P-34234234-2', '09:05:39', '2022-10-28'),
(175, 1, 'Proveedor', 'Ha sido actualizado', 'RIF:P-34234234-2', 'El Nombre/Razon social fue actualizado', '09:05:39', '2022-10-28'),
(176, 1, 'Proveedor', 'Ha sido actualizado', 'RIF:P-34234234-2', 'El Correo fue actualizado', '09:05:39', '2022-10-28'),
(177, 1, 'Proveedor', 'Ha sido actualizado', 'RIF:P-34234234-2', 'La Dirección fue actualizada', '09:05:39', '2022-10-28'),
(178, 1, 'Proveedor', 'Ha sido actualizado', 'RIF:P-34234234-2', 'El Numero Telefonico fue actualizado', '09:05:40', '2022-10-28'),
(179, 1, 'Proveedor', 'Se ha agregar un insumo a la lista del proveedor', 'RIF:34234235', 'insumo agregardo:144854', '09:05:52', '2022-10-28'),
(180, 1, 'Proveedor', 'Se ha agregar un insumo a la lista del proveedor', 'RIF:34234235', 'insumo agregardo:232132', '09:05:54', '2022-10-28'),
(181, 1, 'Proveedor', 'Se ha agregar un insumo a la lista del proveedor', 'RIF:34234235', 'insumo agregardo:322137', '09:05:58', '2022-10-28'),
(182, 1, 'Proveedor', 'Se ha removido un insumo a la lista del proveedor', 'RIF:34234235', 'insumo removido:322137', '09:06:01', '2022-10-28'),
(183, 1, 'Proveedor', 'Se ha agregar un insumo a la lista del proveedor', 'RIF:34234235', 'insumo agregardo:988468', '09:06:07', '2022-10-28'),
(184, 1, 'Proveedor', 'Se ha agregar un insumo a la lista del proveedor', 'RIF:34234235', 'insumo agregardo:958949', '09:06:09', '2022-10-28'),
(185, 1, 'Proveedor', 'Se ha agregar un insumo a la lista del proveedor', 'RIF:34234235', 'insumo agregardo:875999', '09:06:13', '2022-10-28'),
(186, 1, 'Proveedor', 'Se ha agregar un insumo a la lista del proveedor', 'RIF:34234235', 'insumo agregardo:989845', '09:06:15', '2022-10-28'),
(187, 1, 'Proveedor', 'Se ha agregar un insumo a la lista del proveedor', 'RIF:34234235', 'insumo agregardo:785352', '09:06:17', '2022-10-28'),
(188, 1, 'Proveedor', 'Se ha agregar un insumo a la lista del proveedor', 'RIF:34234235', 'insumo agregardo:658849', '09:06:19', '2022-10-28'),
(189, 1, 'Proveedor', 'Se ha agregar un insumo a la lista del proveedor', 'RIF:34234235', 'insumo agregardo:655596', '09:06:22', '2022-10-28'),
(190, 1, 'Proveedor', 'Se ha agregar un insumo a la lista del proveedor', 'RIF:34234235', 'insumo agregardo:588556', '09:06:24', '2022-10-28'),
(191, 1, 'Proveedor', 'Se ha agregar un insumo a la lista del proveedor', 'RIF:34234235', 'insumo agregardo:556435', '09:06:27', '2022-10-28'),
(192, 1, 'Proveedor', 'Se ha agregar un insumo a la lista del proveedor', 'RIF:34234235', 'insumo agregardo:528848', '09:06:29', '2022-10-28'),
(193, 1, 'Proveedor', 'Se ha agregar un insumo a la lista del proveedor', 'RIF:34234235', 'insumo agregardo:885868', '09:06:32', '2022-10-28'),
(194, 1, 'Proveedor', 'Se ha agregar un insumo a la lista del proveedor', 'RIF:34234235', 'insumo agregardo:322137', '09:06:34', '2022-10-28'),
(195, 1, 'Proveedor', 'Se ha agregar un insumo a la lista del proveedor', 'RIF:34234235', 'insumo agregardo:998778', '09:06:36', '2022-10-28'),
(196, 1, 'Proveedor', 'Se ha removido un insumo a la lista del proveedor', 'RIF:34234235', 'insumo removido:322137', '09:06:38', '2022-10-28'),
(197, 1, 'Proveedor', 'Se ha agregar un insumo a la lista del proveedor', 'RIF:34234235', 'insumo agregardo:322137', '09:06:42', '2022-10-28'),
(198, 1, 'Compra', 'Se ha creado una Orden de compra', 'Codigo:162', '', '09:13:37', '2022-10-28'),
(199, 1, 'Pedidos', 'Han sido actualizado', 'Codigo de Orden de compra:162', 'Codigo del pedido:162', '09:14:34', '2022-10-28'),
(200, 1, 'Pedidos', 'Han sido actualizado', 'Codigo de Orden de compra:162', 'Codigo del pedido:162', '09:14:50', '2022-10-28'),
(201, 1, 'Pedidos', 'Han sido actualizado', 'Codigo de Orden de compra:162', 'Codigo del pedido:162', '09:17:00', '2022-10-28'),
(202, 1, 'Pedidos', 'Han sido recibido', 'Codigo de insumo:322137', 'Cantidad:2000.mililitro/s', '09:17:29', '2022-10-28'),
(203, 1, 'Insumos', 'Han sido aumentado el stock', 'Codigo:322137', 'Cantidad:2000.mililitro/s', '09:17:29', '2022-10-28'),
(204, 1, 'Pedidos', 'Han sido recibido', 'Codigo de insumo:232132', 'Cantidad:1000.mililitro/s', '09:17:29', '2022-10-28'),
(205, 1, 'Insumos', 'Han sido aumentado el stock', 'Codigo:232132', 'Cantidad:1000.mililitro/s', '09:17:29', '2022-10-28'),
(206, 1, 'Pedidos', 'Han sido recibido', 'Codigo de insumo:885868', 'Cantidad:900.mililitro/s', '09:17:29', '2022-10-28'),
(207, 1, 'Insumos', 'Han sido aumentado el stock', 'Codigo:885868', 'Cantidad:900.mililitro/s', '09:17:29', '2022-10-28'),
(208, 1, 'Pedidos', 'Han sido recibido', 'Codigo de insumo:785352', 'Cantidad:500.mililitro/s', '09:17:30', '2022-10-28'),
(209, 1, 'Insumos', 'Han sido aumentado el stock', 'Codigo:785352', 'Cantidad:500.mililitro/s', '09:17:30', '2022-10-28'),
(210, 1, 'Pedidos', 'Han sido recibido', 'Codigo de insumo:556435', 'Cantidad:5000.mililitro/s', '09:17:30', '2022-10-28'),
(211, 1, 'Insumos', 'Han sido aumentado el stock', 'Codigo:556435', 'Cantidad:5000.mililitro/s', '09:17:30', '2022-10-28'),
(212, 1, 'Pedidos', 'Han sido recibido', 'Codigo de insumo:998778', 'Cantidad:25000.mililitro/s', '09:17:30', '2022-10-28'),
(213, 1, 'Insumos', 'Han sido aumentado el stock', 'Codigo:998778', 'Cantidad:25000.mililitro/s', '09:17:30', '2022-10-28'),
(214, 1, 'Pedidos', 'Han sido recibido', 'Codigo de insumo:588556', 'Cantidad:5000.mililitro/s', '09:17:30', '2022-10-28'),
(215, 1, 'Insumos', 'Han sido aumentado el stock', 'Codigo:588556', 'Cantidad:5000.mililitro/s', '09:17:31', '2022-10-28'),
(216, 1, 'Pedidos', 'Han sido recibido', 'Codigo de insumo:528848', 'Cantidad:10000.mililitro/s', '09:17:31', '2022-10-28'),
(217, 1, 'Insumos', 'Han sido aumentado el stock', 'Codigo:528848', 'Cantidad:10000.mililitro/s', '09:17:31', '2022-10-28'),
(218, 1, 'Pedidos', 'Han sido recibido', 'Codigo de insumo:958949', 'Cantidad:10000.mililitro/s', '09:17:31', '2022-10-28'),
(219, 1, 'Insumos', 'Han sido aumentado el stock', 'Codigo:958949', 'Cantidad:10000.mililitro/s', '09:17:31', '2022-10-28'),
(220, 1, 'Pedidos', 'Han sido recibido', 'Codigo de insumo:658849', 'Cantidad:4000.mililitro/s', '09:17:32', '2022-10-28'),
(221, 1, 'Insumos', 'Han sido aumentado el stock', 'Codigo:658849', 'Cantidad:4000.mililitro/s', '09:17:32', '2022-10-28'),
(222, 1, 'Pedidos', 'Han sido recibido', 'Codigo de insumo:144854', 'Cantidad:10000.mililitro/s', '09:17:32', '2022-10-28'),
(223, 1, 'Insumos', 'Han sido aumentado el stock', 'Codigo:144854', 'Cantidad:10000.mililitro/s', '09:17:32', '2022-10-28'),
(224, 1, 'Pedidos', 'Han sido recibido', 'Codigo de insumo:655596', 'Cantidad:1000.mililitro/s', '09:17:32', '2022-10-28'),
(225, 1, 'Insumos', 'Han sido aumentado el stock', 'Codigo:655596', 'Cantidad:1000.mililitro/s', '09:17:32', '2022-10-28'),
(226, 1, 'Pedidos', 'Han sido recibido', 'Codigo de insumo:988468', 'Cantidad:5000.mililitro/s', '09:17:32', '2022-10-28'),
(227, 1, 'Insumos', 'Han sido aumentado el stock', 'Codigo:988468', 'Cantidad:5000.mililitro/s', '09:17:32', '2022-10-28'),
(228, 1, 'Pedidos', 'Han sido recibido', 'Codigo de insumo:875999', 'Cantidad:3000.mililitro/s', '09:17:33', '2022-10-28'),
(229, 1, 'Insumos', 'Han sido aumentado el stock', 'Codigo:875999', 'Cantidad:3000.mililitro/s', '09:17:33', '2022-10-28'),
(230, 1, 'Pedidos', 'Han sido recibido', 'Codigo de insumo:989845', 'Cantidad:1000.mililitro/s', '09:17:33', '2022-10-28'),
(231, 1, 'Insumos', 'Han sido aumentado el stock', 'Codigo:989845', 'Cantidad:1000.mililitro/s', '09:17:33', '2022-10-28'),
(232, 1, 'Pedidos', 'Han sido actualizado', 'Codigo de Orden de compra:162', 'Codigo del pedido:162', '09:18:06', '2022-10-28'),
(233, 1, 'Pedidos', 'Han sido actualizado', 'Codigo de Orden de compra:162', 'Codigo del pedido:162', '09:18:16', '2022-10-28'),
(234, 1, 'Pedidos', 'Han sido recibido', 'Codigo de insumo:885868', 'Cantidad:950.mililitro/s', '09:18:19', '2022-10-28'),
(235, 1, 'Insumos', 'Han sido aumentado el stock', 'Codigo:885868', 'Cantidad:950.mililitro/s', '09:18:19', '2022-10-28'),
(236, 1, 'Pedidos', 'Han sido recibido', 'Codigo de insumo:658849', 'Cantidad:4500.mililitro/s', '09:18:19', '2022-10-28'),
(237, 1, 'Insumos', 'Han sido aumentado el stock', 'Codigo:658849', 'Cantidad:4500.mililitro/s', '09:18:19', '2022-10-28'),
(238, 1, 'Pedidos', 'Han sido recibido', 'Codigo de insumo:885868', 'Cantidad:1000.mililitro/s', '09:18:25', '2022-10-28'),
(239, 1, 'Insumos', 'Han sido aumentado el stock', 'Codigo:885868', 'Cantidad:1000.mililitro/s', '09:18:25', '2022-10-28'),
(240, 1, 'Pedidos', 'Han sido recibido', 'Codigo de insumo:658849', 'Cantidad:5000.mililitro/s', '09:18:25', '2022-10-28'),
(241, 1, 'Insumos', 'Han sido aumentado el stock', 'Codigo:658849', 'Cantidad:5000.mililitro/s', '09:18:25', '2022-10-28'),
(242, 1, 'Compra', 'Han sido confirmada una Orden de compra', 'Codigo:162', '', '09:18:25', '2022-10-28'),
(243, 1, 'sección', 'Ha Cerrado sección', '', '', '09:18:47', '2022-10-28'),
(244, 17, 'sección', 'Ha Iniciado sección', '', '', '09:19:06', '2022-10-28'),
(245, 17, 'Factura', 'Se ha creado una factura', 'Codigo:73', '', '09:24:17', '2022-10-28'),
(246, 17, 'sección', 'Ha Cerrado sección', '', '', '09:26:21', '2022-10-28'),
(247, 13, 'sección', 'Ha Iniciado sección', '', '', '09:26:44', '2022-10-28'),
(248, 13, 'Factura', 'Han sido confirmada una factura', 'Codigo:73', '', '09:28:04', '2022-10-28'),
(249, 13, 'Consumo', 'Han sido Confirmado', 'Codigo insumo:322137', 'Cantidad:21.mililitro/s', '09:28:04', '2022-10-28'),
(250, 13, 'Insumos', 'Han sido reducido el stock', 'Codigo:322137', 'Cantidad:21.mililitro/s', '09:28:04', '2022-10-28'),
(251, 13, 'Consumo', 'Han sido Confirmado', 'Codigo insumo:232132', 'Cantidad:17.mililitro/s', '09:28:04', '2022-10-28'),
(252, 13, 'Insumos', 'Han sido reducido el stock', 'Codigo:232132', 'Cantidad:17.mililitro/s', '09:28:04', '2022-10-28'),
(253, 13, 'Consumo', 'Han sido Confirmado', 'Codigo insumo:885868', 'Cantidad:48.mililitro/s', '09:28:04', '2022-10-28'),
(254, 13, 'Insumos', 'Han sido reducido el stock', 'Codigo:885868', 'Cantidad:48.mililitro/s', '09:28:04', '2022-10-28'),
(255, 13, 'Consumo', 'Han sido Confirmado', 'Codigo insumo:785352', 'Cantidad:25.mililitro/s', '09:28:04', '2022-10-28'),
(256, 13, 'Insumos', 'Han sido reducido el stock', 'Codigo:785352', 'Cantidad:25.mililitro/s', '09:28:04', '2022-10-28'),
(257, 13, 'Consumo', 'Han sido Confirmado', 'Codigo insumo:556435', 'Cantidad:1500.mililitro/s', '09:28:04', '2022-10-28'),
(258, 13, 'Insumos', 'Han sido reducido el stock', 'Codigo:556435', 'Cantidad:1500.mililitro/s', '09:28:04', '2022-10-28'),
(259, 13, 'Consumo', 'Han sido Confirmado', 'Codigo insumo:588556', 'Cantidad:300.mililitro/s', '09:28:05', '2022-10-28'),
(260, 13, 'Insumos', 'Han sido reducido el stock', 'Codigo:588556', 'Cantidad:300.mililitro/s', '09:28:05', '2022-10-28'),
(261, 13, 'Consumo', 'Han sido Confirmado', 'Codigo insumo:988468', 'Cantidad:300.mililitro/s', '09:28:05', '2022-10-28'),
(262, 13, 'Insumos', 'Han sido reducido el stock', 'Codigo:988468', 'Cantidad:300.mililitro/s', '09:28:05', '2022-10-28'),
(263, 13, 'Consumo', 'Han sido Confirmado', 'Codigo insumo:875999', 'Cantidad:750.mililitro/s', '09:28:05', '2022-10-28'),
(264, 13, 'Insumos', 'Han sido reducido el stock', 'Codigo:875999', 'Cantidad:750.mililitro/s', '09:28:05', '2022-10-28'),
(265, 13, 'Consumo', 'Han sido Confirmado', 'Codigo insumo:989845', 'Cantidad:4.mililitro/s', '09:28:05', '2022-10-28'),
(266, 13, 'Insumos', 'Han sido reducido el stock', 'Codigo:989845', 'Cantidad:4.mililitro/s', '09:28:05', '2022-10-28'),
(267, 13, 'Usuario', 'Ha sido actualizado', 'Cedula:31234432', 'La clave fue actualizada', '09:29:23', '2022-10-28'),
(268, 13, 'Cliente', 'Ha sido registrado', 'Cedula/rif:15465354', '', '09:29:48', '2022-10-28'),
(269, 13, 'sección', 'Ha Cerrado sección', '', '', '09:29:58', '2022-10-28'),
(270, 1, 'sección', 'Ha Iniciado sección', '', '', '09:30:01', '2022-10-28'),
(271, 1, 'Respaldo', 'Un respaldo ha sido Creado', 'Codigo:5', 'Nombre del respaldo:facturacion_28_10_2022_09_30_11.sql', '09:30:14', '2022-10-28'),
(272, 1, 'Usuario', 'Ha sido actualizado', 'Cedula:13770547', 'El Nombre fue actualizado', '09:32:35', '2022-10-28'),
(273, 1, 'Usuario', 'Ha sido actualizado', 'Cedula:13770547', 'El Apellido fue actualizado', '09:32:35', '2022-10-28'),
(274, 1, 'Usuario', 'Ha sido actualizado', 'Cedula:13770547', 'El Numero Telefonico fue actualizado', '09:32:35', '2022-10-28'),
(275, 1, 'Usuario', 'Ha sido actualizado', 'Cedula:13770547', 'La cedula fue actualizada; Cedula anterior:13770546, Cedula actual:13770547', '09:32:35', '2022-10-28'),
(276, 1, 'Usuario', 'Ha sido desactivado', 'Cedula:31234432', 'Estado Usuario: desactivado', '09:32:46', '2022-10-28'),
(277, 1, 'Usuario', 'Ha sido activado', 'Cedula:31234432', 'Estado Usuario: activo', '09:32:50', '2022-10-28'),
(278, 1, 'Usuario', 'Ha sido actualizado', 'Cedula:23233344', 'La clave fue actualizada', '09:33:04', '2022-10-28'),
(279, 1, 'Usuario', 'Ha sido actualizado', 'Cedula:13770547', 'La clave fue actualizada', '09:33:17', '2022-10-28'),
(280, 1, 'Usuario', 'Ha sido eliminada una pregunta de seguridad', 'Cedula:31234432', '', '09:39:33', '2022-10-28'),
(281, 1, 'Usuario', 'Ha sido asignada una pregunta de seguridad', 'Cedula:31234432', '', '09:39:54', '2022-10-28'),
(282, 1, 'Factura', 'Se ha anulado una factura', 'Codigo:73', '', '09:41:29', '2022-10-28'),
(283, 1, 'Insumos', 'Han sido devuelto al inventario', 'Codigo:556435', 'Cantidad:1500', '09:41:29', '2022-10-28'),
(284, 1, 'Insumos', 'Han sido devuelto al inventario', 'Codigo:875999', 'Cantidad:750', '09:41:29', '2022-10-28'),
(285, 1, 'Insumos', 'Han sido devuelto al inventario', 'Codigo:988468', 'Cantidad:300', '09:41:29', '2022-10-28'),
(286, 1, 'Insumos', 'Han sido devuelto al inventario', 'Codigo:785352', 'Cantidad:25', '09:41:30', '2022-10-28'),
(287, 1, 'Insumos', 'Han sido devuelto al inventario', 'Codigo:232132', 'Cantidad:17', '09:41:30', '2022-10-28'),
(288, 1, 'Insumos', 'Han sido devuelto al inventario', 'Codigo:322137', 'Cantidad:21', '09:41:30', '2022-10-28'),
(289, 1, 'Insumos', 'Han sido devuelto al inventario', 'Codigo:989845', 'Cantidad:4', '09:41:30', '2022-10-28'),
(290, 1, 'Insumos', 'Han sido devuelto al inventario', 'Codigo:885868', 'Cantidad:48', '09:41:30', '2022-10-28'),
(291, 1, 'Insumos', 'Han sido devuelto al inventario', 'Codigo:588556', 'Cantidad:300', '09:41:30', '2022-10-28'),
(292, 1, 'Factura', 'Han sido confirmada una factura', 'Codigo:73', '', '09:43:58', '2022-10-28'),
(293, 1, 'Consumo', 'Han sido Confirmado', 'Codigo insumo:322137', 'Cantidad:21.mililitro/s', '09:43:58', '2022-10-28'),
(294, 1, 'Insumos', 'Han sido reducido el stock', 'Codigo:322137', 'Cantidad:21.mililitro/s', '09:43:58', '2022-10-28'),
(295, 1, 'Consumo', 'Han sido Confirmado', 'Codigo insumo:232132', 'Cantidad:17.mililitro/s', '09:43:58', '2022-10-28'),
(296, 1, 'Insumos', 'Han sido reducido el stock', 'Codigo:232132', 'Cantidad:17.mililitro/s', '09:43:58', '2022-10-28'),
(297, 1, 'Consumo', 'Han sido Confirmado', 'Codigo insumo:885868', 'Cantidad:48.mililitro/s', '09:43:58', '2022-10-28'),
(298, 1, 'Insumos', 'Han sido reducido el stock', 'Codigo:885868', 'Cantidad:48.mililitro/s', '09:43:58', '2022-10-28'),
(299, 1, 'Consumo', 'Han sido Confirmado', 'Codigo insumo:785352', 'Cantidad:25.mililitro/s', '09:43:58', '2022-10-28'),
(300, 1, 'Insumos', 'Han sido reducido el stock', 'Codigo:785352', 'Cantidad:25.mililitro/s', '09:43:58', '2022-10-28'),
(301, 1, 'Consumo', 'Han sido Confirmado', 'Codigo insumo:556435', 'Cantidad:1500.mililitro/s', '09:43:59', '2022-10-28'),
(302, 1, 'Insumos', 'Han sido reducido el stock', 'Codigo:556435', 'Cantidad:1500.mililitro/s', '09:43:59', '2022-10-28'),
(303, 1, 'Consumo', 'Han sido Confirmado', 'Codigo insumo:588556', 'Cantidad:300.mililitro/s', '09:43:59', '2022-10-28'),
(304, 1, 'Insumos', 'Han sido reducido el stock', 'Codigo:588556', 'Cantidad:300.mililitro/s', '09:43:59', '2022-10-28'),
(305, 1, 'Consumo', 'Han sido Confirmado', 'Codigo insumo:988468', 'Cantidad:300.mililitro/s', '09:43:59', '2022-10-28'),
(306, 1, 'Insumos', 'Han sido reducido el stock', 'Codigo:988468', 'Cantidad:300.mililitro/s', '09:43:59', '2022-10-28'),
(307, 1, 'Consumo', 'Han sido Confirmado', 'Codigo insumo:875999', 'Cantidad:750.mililitro/s', '09:43:59', '2022-10-28'),
(308, 1, 'Insumos', 'Han sido reducido el stock', 'Codigo:875999', 'Cantidad:750.mililitro/s', '09:44:00', '2022-10-28'),
(309, 1, 'Consumo', 'Han sido Confirmado', 'Codigo insumo:989845', 'Cantidad:4.mililitro/s', '09:44:00', '2022-10-28'),
(310, 1, 'Insumos', 'Han sido reducido el stock', 'Codigo:989845', 'Cantidad:4.mililitro/s', '09:44:00', '2022-10-28'),
(311, 1, 'Factura', 'Se ha anulado una factura', 'Codigo:73', '', '09:44:12', '2022-10-28'),
(312, 1, 'Insumos', 'Han sido devuelto al inventario', 'Codigo:556435', 'Cantidad:1500.mililitro/s', '09:44:12', '2022-10-28'),
(313, 1, 'Insumos', 'Han sido devuelto al inventario', 'Codigo:875999', 'Cantidad:750.mililitro/s', '09:44:12', '2022-10-28'),
(314, 1, 'Insumos', 'Han sido devuelto al inventario', 'Codigo:988468', 'Cantidad:300.mililitro/s', '09:44:12', '2022-10-28'),
(315, 1, 'Insumos', 'Han sido devuelto al inventario', 'Codigo:785352', 'Cantidad:25.unidad/s', '09:44:12', '2022-10-28'),
(316, 1, 'Insumos', 'Han sido devuelto al inventario', 'Codigo:232132', 'Cantidad:17.unidad/s', '09:44:12', '2022-10-28'),
(317, 1, 'Insumos', 'Han sido devuelto al inventario', 'Codigo:322137', 'Cantidad:21.unidad/s', '09:44:12', '2022-10-28'),
(318, 1, 'Insumos', 'Han sido devuelto al inventario', 'Codigo:989845', 'Cantidad:4.unidad/s', '09:44:13', '2022-10-28'),
(319, 1, 'Insumos', 'Han sido devuelto al inventario', 'Codigo:885868', 'Cantidad:48.unidad/s', '09:44:13', '2022-10-28'),
(320, 1, 'Insumos', 'Han sido devuelto al inventario', 'Codigo:588556', 'Cantidad:300.mililitro/s', '09:44:13', '2022-10-28'),
(321, 1, 'sección', 'Ha Cerrado sección', '', '', '20:20:30', '2022-11-04'),
(322, 1, 'sección', 'Ha Cerrado sección', '', '', '22:33:15', '2022-11-07');

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

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cli`, `cedula_rif`, `tipo_cli`, `cedula_2`, `nom_cli`, `tlf_num_cli`, `di_cli`, `estado_cli`) VALUES
(1, 21321312, 6, 0, 'pablo coelo', 02321312321, 'palo negro', 1),
(2, 13232132, 1, 4, 'michel jordan', 04124055017, 'usa para negros', 1),
(3, 2921321, 2, 1, 'luis alva', 04121420525, 'maracay', 1),
(4, 23123218, 6, 0, 'Carlos sambrano', 02435644586, 'Trumero', 1),
(5, 15465354, 6, 0, 'juan carlos bodoque', 04125154555, 'chile', 1);

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

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id_compra`, `id_pro_com`, `gasto_t`, `fecha_com`, `hora_com`, `estado_compra`, `iva_compra`, `id_us_compra`) VALUES
(162, 30, 343050, '2022-10-28', '09:13:37', 2, '16', 1);

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
(2, 3, 102, 1),
(3, 3, 101, 2),
(9, 1, 105, 500),
(11, 1, 114, 250),
(12, 1, 113, 100),
(13, 1, 104, 3),
(14, 1, 102, 1),
(15, 1, 101, 1),
(16, 2, 103, 5),
(18, 1, 115, 2),
(19, 6, 107, 600),
(20, 6, 104, 3),
(21, 6, 101, 2),
(22, 6, 102, 2);

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

--
-- Volcado de datos para la tabla `detalles_compra`
--

INSERT INTO `detalles_compra` (`id_det_com`, `id_com_det`, `id_in_com`, `can_in_det`, `costo_unidad`) VALUES
(1, 162, 101, 2000, 3.4),
(2, 162, 102, 1000, 7),
(3, 162, 103, 1000, 2.5),
(4, 162, 104, 500, 6),
(5, 162, 105, 5000, 2),
(6, 162, 106, 25000, 3.45),
(7, 162, 107, 5000, 7),
(8, 162, 108, 10000, 2.05),
(9, 162, 109, 10000, 3.5),
(10, 162, 110, 5000, 2),
(11, 162, 111, 10000, 6),
(12, 162, 112, 1000, 7),
(13, 162, 113, 5000, 6),
(14, 162, 114, 5000, 5),
(15, 162, 115, 1000, 5);

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

--
-- Volcado de datos para la tabla `detalles_factura`
--

INSERT INTO `detalles_factura` (`id_det_fac`, `id_co_det_fac`, `id_an_det_fac`, `can_det_fac`, `precio_unidad`) VALUES
(1, 73, 1, 3, 123.21),
(2, 73, 6, 5, 54.42),
(3, 73, 2, 10, 23.38),
(4, 73, 3, 4, 66);

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

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id_fac`, `id_cli_fac`, `id_usd_fac`, `fecha_fac`, `precio_total`, `hora_fac`, `estado_fac`, `iva_factura`) VALUES
(73, 1, 17, '2022-10-28', 1139.53, '09:24:17', 0, '16');

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

--
-- Volcado de datos para la tabla `gastos`
--

INSERT INTO `gastos` (`id_gastos`, `insumos_id`, `can_ins_gasto`, `id_fac_gas`, `fecha_gas`) VALUES
(24, 105, 1500, 73, '2022-10-28'),
(25, 114, 750, 73, '2022-10-28'),
(26, 113, 300, 73, '2022-10-28'),
(27, 104, 25, 73, '2022-10-28'),
(28, 102, 17, 73, '2022-10-28'),
(29, 101, 21, 73, '2022-10-28'),
(30, 115, 4, 73, '2022-10-28'),
(31, 103, 48, 73, '2022-10-28'),
(32, 107, 300, 73, '2022-10-28');

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
(101, 322137, 'Tapas rojaS', 5, 2000, 1, 5000, 23, 1),
(102, 232132, 'tapas azulez', 5, 1000, 1, 1222, 33, 1),
(103, 885868, 'Tiras de PH', 4, 1000, 1, 10000, 100, 1),
(104, 785352, 'tubos de ensayo', 5, 500, 1, 500, 20, 1),
(105, 556435, 'wright colorante', 2, 5000, 2, 50000, 500, 1),
(106, 998778, 'Urea', 1, 25000, 2, 50000, 500, 1),
(107, 588556, 'cinética mono reactivo', 1, 5000, 2, 50000, 500, 1),
(108, 528848, 'PSA libre', 3, 10000, 1, 10000, 100, 1),
(109, 958949, 'Uroanálisis', 4, 10000, 1, 10000, 100, 1),
(110, 658849, 'Tiras reactivas para eces', 4, 5000, 1, 10000, 100, 1),
(111, 144854, 'Prueba rápida para hepatitis B', 3, 10000, 1, 10000, 100, 1),
(112, 655596, 'Pruebas de Embarazo', 3, 1000, 1, 10000, 100, 1),
(113, 988468, 'lizante', 2, 5000, 2, 50000, 500, 1),
(114, 875999, 'Diluyente dilvent', 2, 3000, 2, 50000, 500, 1),
(115, 989845, 'Guantes', 5, 1000, 1, 1000, 10, 1);

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

--
-- Volcado de datos para la tabla `intentos`
--

INSERT INTO `intentos` (`id_intentos`, `tipo`, `cantidad`, `fecha_hora`) VALUES
(29, 1, 1, '2022-11-07 22:38:22');

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

--
-- Volcado de datos para la tabla `lista_mercancia`
--

INSERT INTO `lista_mercancia` (`id_lista_mercancia`, `id_proveedor_mercancia`, `id_insumo_mercancia`) VALUES
(40, 30, 111),
(41, 30, 102),
(43, 30, 113),
(44, 30, 109),
(45, 30, 114),
(46, 30, 115),
(47, 30, 104),
(48, 30, 110),
(49, 30, 112),
(50, 30, 107),
(51, 30, 105),
(52, 30, 108),
(53, 30, 103),
(55, 30, 106),
(56, 30, 101);

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

--
-- Volcado de datos para la tabla `pago_compra`
--

INSERT INTO `pago_compra` (`id_pago_compra`, `id_compra_pago`, `id_forma_pago`, `cantidad_pago`, `referencia`) VALUES
(18, 162, 2, 108213.12, 0000000000000),
(19, 162, 1, 50000, 0025445455555),
(20, 162, 3, 239724.88, 0312123213222);

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

--
-- Volcado de datos para la tabla `pago_factura`
--

INSERT INTO `pago_factura` (`id_pago_fac`, `id_forma_pago`, `id_fac_pago`, `cantidad_pago`, `referencia`) VALUES
(18, 3, 73, 608.64, 0300607000000),
(19, 3, 73, 213.21, 0262522229222),
(20, 2, 73, 500, 0000000000000);

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

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id_pedidos`, `id_in_pe`, `cantidad_pe`, `id_compra_pe`, `estado_pe`, `fecha_pedido`, `id_us_pe`) VALUES
(41, 101, 2000, 162, 2, '2022-10-28', 1),
(42, 102, 1000, 162, 2, '2022-10-28', 1),
(43, 103, 900, 162, 2, '2022-10-28', 1),
(44, 104, 500, 162, 2, '2022-10-28', 1),
(45, 105, 5000, 162, 2, '2022-10-28', 1),
(46, 106, 25000, 162, 2, '2022-10-28', 1),
(47, 107, 5000, 162, 2, '2022-10-28', 1),
(48, 108, 10000, 162, 2, '2022-10-28', 1),
(49, 109, 10000, 162, 2, '2022-10-28', 1),
(50, 110, 4000, 162, 2, '2022-10-28', 1),
(51, 111, 10000, 162, 2, '2022-10-28', 1),
(52, 112, 1000, 162, 2, '2022-10-28', 1),
(53, 113, 5000, 162, 2, '2022-10-28', 1),
(54, 114, 3000, 162, 2, '2022-10-28', 1),
(55, 115, 1000, 162, 2, '2022-10-28', 1),
(56, 103, 50, 162, 2, '2022-10-28', 1),
(57, 110, 500, 162, 2, '2022-10-28', 1),
(58, 103, 50, 162, 2, '2022-10-28', 1),
(59, 110, 500, 162, 2, '2022-10-28', 1);

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
(7, 17, 'fechas de siempre', 'c4de8ced6214345614d33fb0b16a8acd'),
(8, 17, 'lacaba', '843539834f1a329ce2b49b64a9e25f0f'),
(9, 17, 'bigote', 'd076034fc50c31703f08f4053ef01f8a'),
(10, 17, 'nft', 'ede820104bebba9aaabd1a8346c21591'),
(11, 13, 'pelicula favorita', '350ea648581acde22bd10c5fe7416e45');

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

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_pro`, `rif_pro`, `tipo_pro`, `rif_2`, `nom_pro`, `tlf_num_pro`, `dir_pro`, `correo_pro`, `estado_pro`) VALUES
(27, 56655468, 3, 8, 'distribuidora santa maria', 04125585526, 'La jualia', 'asdsh@gmail.com', 1),
(28, 13213213, 3, 6, 'Científica santa luz 3', 02145125254, 'santa cruz de aragua', 'asda@asd.com', 1),
(29, 21321321, 2, 6, 'sdaasd1', 02210454145, 'sadsadasd', 'sadsa@sad.com', 1),
(30, 34234235, 3, 2, 'Distribuidora salud del gallo', 02154445668, 'Cagua inter comunal', 'Distribuidorasaluddelgallo@gmail.com', 1);

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
(4, 'facturacion_28_10_2022_03_06_02.sql', '2022-10-28', '03:06:02'),
(5, 'facturacion_28_10_2022_09_30_11.sql', '2022-10-28', '09:30:11');

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
(1, 'Heilyn suyin', 'heilin', '21232f297a57a5a743894a0e4a801fc3', 13770547, 'Cabreras herrera', 02412312312, 1, 1),
(13, 'marifelix', 'lanene', '740d9c49b11f3ada7b9112614a54be41', 31234432, 'lanene', 04124544457, 2, 1),
(17, 'trabajador', 'trabajador', '0500724a5d2b3eec8fd4a48771d7d576', 23233344, 'trabajador', 01242344567, 3, 1);

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
  MODIFY `id_an` bigint(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `id_au` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=323;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_car` bigint(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cli` bigint(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT de la tabla `consumo`
--
ALTER TABLE `consumo`
  MODIFY `id_co` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `detalles_compra`
--
ALTER TABLE `detalles_compra`
  MODIFY `id_det_com` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `detalles_factura`
--
ALTER TABLE `detalles_factura`
  MODIFY `id_det_fac` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_fac` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `forma_pago`
--
ALTER TABLE `forma_pago`
  MODIFY `id_forma_pago` bigint(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `gastos`
--
ALTER TABLE `gastos`
  MODIFY `id_gastos` bigint(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `informe`
--
ALTER TABLE `informe`
  MODIFY `id_info` bigint(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `insumos`
--
ALTER TABLE `insumos`
  MODIFY `id_in` bigint(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT de la tabla `insumos_temp`
--
ALTER TABLE `insumos_temp`
  MODIFY `id_ins_temp` bigint(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=324;

--
-- AUTO_INCREMENT de la tabla `intentos`
--
ALTER TABLE `intentos`
  MODIFY `id_intentos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `iva`
--
ALTER TABLE `iva`
  MODIFY `id_iva` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `lista_compra`
--
ALTER TABLE `lista_compra`
  MODIFY `id_lista_compra` bigint(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;

--
-- AUTO_INCREMENT de la tabla `lista_mercancia`
--
ALTER TABLE `lista_mercancia`
  MODIFY `id_lista_mercancia` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `pago_compra`
--
ALTER TABLE `pago_compra`
  MODIFY `id_pago_compra` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `pago_factura`
--
ALTER TABLE `pago_factura`
  MODIFY `id_pago_fac` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedidos` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id_pregunta` bigint(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_pro` bigint(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `respaldo`
--
ALTER TABLE `respaldo`
  MODIFY `id_respaldo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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

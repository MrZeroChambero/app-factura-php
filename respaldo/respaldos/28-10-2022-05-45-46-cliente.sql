-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-06-2022 a las 03:50:33
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
-- Base de datos: `facturacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cli` bigint(40) NOT NULL,
  `cedula_rif` bigint(40) NOT NULL,
  `nom_cli` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `tlf_num_cli` bigint(11) UNSIGNED ZEROFILL NOT NULL,
  `di_cli` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `estado_cli` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cli`, `cedula_rif`, `nom_cli`, `tlf_num_cli`, `di_cli`, `estado_cli`) VALUES
(18, 5271074, 'Diaz P Eliecer', 04123422152, 'Palo Negro San Antonio', 1),
(19, 5525277, 'Escalona Olivo', 04123422152, 'Palo Negro San Antonio', 1),
(20, 8714272, 'Pereira Carolina', 04123422152, 'Palo Negro San Antonio', 1),
(21, 8733045, 'HERNANDEZ G', 04123422152, 'Palo Negro San Antonio', 1),
(22, 10753456, 'GIL M', 04123422152, 'Palo Negro San Antonio', 1),
(23, 11090829, 'PINTO DE M', 04123422152, 'Palo Negro San Antonio', 1),
(24, 11976078, 'PADILLA A', 04123422152, 'Palo Negro San Antonio', 1),
(25, 13869256, 'MORALES DE G', 04123422152, 'Palo Negro San Antonio', 1),
(26, 14944123, 'MEZA', 04123422152, 'Palo Negro San Antonio', 1),
(27, 17016789, 'CONDE S', 04123422152, 'Palo Negro San Antonio', 1),
(28, 17968944, 'MARQUEZ M', 04123422152, 'Palo Negro Santa Cruz', 1),
(29, 17968945, 'CABRERA V', 04123422152, 'Palo Negro Santa Cruz', 1),
(30, 10753752, 'YNGRID ASCANIO', 04123422152, 'Palo Negro San Antonio', 1),
(31, 10757439, 'NORAIMA', 04123422152, 'Palo Negro Santa Cruz', 1),
(32, 24685025, 'MARIA URQUIOLA B', 04123422152, 'Palo Negro San Antonio', 1),
(33, 7175276, 'CESAR BRAVO CH', 04123422152, 'Palo Negro San Antonio', 1),
(34, 7183468, 'JOSE PACHECO C', 04123422152, 'Palo Negro Santa Cruz', 1),
(35, 9873505, 'WILMEN FALCON T', 04123422152, 'Palo Negro Santa Cruz', 1),
(36, 13199972, 'SONIA RUIZ', 04123422152, 'Palo Negro Santa Cruz', 1),
(37, 15129202, 'DIMA DIAZ A', 04123422152, 'Palo Negro Santa Cruz', 1),
(38, 16101970, 'CESAR BOLIVAR E', 04123422152, 'Palo Negro Santa Cruz', 1),
(39, 18854424, 'CARLOS DE LA CRUZ P', 04123422152, 'Palo Negro Santa Cruz', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cli`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cli` bigint(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

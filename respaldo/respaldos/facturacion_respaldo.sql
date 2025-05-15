-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: facturacion
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `analisis`
--

DROP TABLE IF EXISTS `analisis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `analisis` (
  `id_an` bigint(40) NOT NULL AUTO_INCREMENT,
  `cod_an` bigint(6) unsigned zerofill NOT NULL,
  `des_an` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `tipo_an` bigint(40) NOT NULL,
  `pre_an` double NOT NULL,
  `nom_an` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `estado_an` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_an`),
  KEY `tipo_an` (`tipo_an`),
  CONSTRAINT `analisis_ibfk_1` FOREIGN KEY (`tipo_an`) REFERENCES `tipo_an_in` (`id_tipo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `analisis`
--

LOCK TABLES `analisis` WRITE;
/*!40000 ALTER TABLE `analisis` DISABLE KEYS */;
/*!40000 ALTER TABLE `analisis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auditoria`
--

DROP TABLE IF EXISTS `auditoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auditoria` (
  `id_au` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_us_au` bigint(40) NOT NULL,
  `registro` varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `accion` varchar(80) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `codigo` varchar(40) DEFAULT NULL,
  `campo` varchar(140) DEFAULT NULL,
  `hora` time NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_au`),
  KEY `id_us_au` (`id_us_au`),
  CONSTRAINT `auditoria_ibfk_1` FOREIGN KEY (`id_us_au`) REFERENCES `usuario` (`id_us`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auditoria`
--

LOCK TABLES `auditoria` WRITE;
/*!40000 ALTER TABLE `auditoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `auditoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrito`
--

DROP TABLE IF EXISTS `carrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carrito` (
  `id_car` bigint(40) NOT NULL AUTO_INCREMENT,
  `id_cli_car` bigint(40) NOT NULL,
  `id_an_car` bigint(40) NOT NULL,
  `can_car` bigint(40) NOT NULL,
  PRIMARY KEY (`id_car`),
  KEY `id_cli_car` (`id_cli_car`),
  KEY `id_an_car` (`id_an_car`),
  KEY `can_car` (`can_car`),
  CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`id_an_car`) REFERENCES `analisis` (`id_an`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`id_cli_car`) REFERENCES `cliente` (`id_cli`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrito`
--

LOCK TABLES `carrito` WRITE;
/*!40000 ALTER TABLE `carrito` DISABLE KEYS */;
/*!40000 ALTER TABLE `carrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id_cli` bigint(40) NOT NULL AUTO_INCREMENT,
  `cedula_rif` bigint(40) NOT NULL,
  `tipo_cli` tinyint(1) NOT NULL,
  `cedula_2` tinyint(1) NOT NULL,
  `nom_cli` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `tlf_num_cli` bigint(11) unsigned zerofill NOT NULL,
  `di_cli` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `estado_cli` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_cli`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compra`
--

DROP TABLE IF EXISTS `compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compra` (
  `id_compra` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_pro_com` bigint(20) NOT NULL,
  `gasto_t` double NOT NULL,
  `fecha_com` date NOT NULL,
  `hora_com` time NOT NULL,
  `estado_compra` tinyint(1) NOT NULL,
  `iva_compra` varchar(5) NOT NULL,
  `id_us_compra` bigint(40) NOT NULL,
  PRIMARY KEY (`id_compra`),
  KEY `id_pro_com` (`id_pro_com`),
  KEY `id_us_compra` (`id_us_compra`),
  CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`id_pro_com`) REFERENCES `proveedor` (`id_pro`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `compra_ibfk_4` FOREIGN KEY (`id_us_compra`) REFERENCES `usuario` (`id_us`)
) ENGINE=InnoDB AUTO_INCREMENT=162 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra`
--

LOCK TABLES `compra` WRITE;
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consumo`
--

DROP TABLE IF EXISTS `consumo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consumo` (
  `id_co` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_an_co` bigint(20) NOT NULL,
  `id_in_co` bigint(20) NOT NULL,
  `ca_co` float NOT NULL,
  PRIMARY KEY (`id_co`),
  KEY `id_an_co` (`id_an_co`),
  KEY `id_in_co` (`id_in_co`),
  CONSTRAINT `consumo_ibfk_1` FOREIGN KEY (`id_in_co`) REFERENCES `insumos` (`id_in`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `consumo_ibfk_2` FOREIGN KEY (`id_an_co`) REFERENCES `analisis` (`id_an`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consumo`
--

LOCK TABLES `consumo` WRITE;
/*!40000 ALTER TABLE `consumo` DISABLE KEYS */;
/*!40000 ALTER TABLE `consumo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalles_compra`
--

DROP TABLE IF EXISTS `detalles_compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalles_compra` (
  `id_det_com` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_com_det` bigint(20) NOT NULL,
  `id_in_com` bigint(20) NOT NULL,
  `can_in_det` float NOT NULL,
  `costo_unidad` double NOT NULL,
  PRIMARY KEY (`id_det_com`),
  KEY `id_com_det` (`id_com_det`),
  KEY `id_in_com` (`id_in_com`),
  CONSTRAINT `detalles_compra_ibfk_1` FOREIGN KEY (`id_com_det`) REFERENCES `compra` (`id_compra`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detalles_compra_ibfk_2` FOREIGN KEY (`id_in_com`) REFERENCES `insumos` (`id_in`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalles_compra`
--

LOCK TABLES `detalles_compra` WRITE;
/*!40000 ALTER TABLE `detalles_compra` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalles_compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalles_factura`
--

DROP TABLE IF EXISTS `detalles_factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalles_factura` (
  `id_det_fac` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_co_det_fac` bigint(20) NOT NULL,
  `id_an_det_fac` bigint(20) NOT NULL,
  `can_det_fac` bigint(40) NOT NULL,
  `precio_unidad` double NOT NULL,
  PRIMARY KEY (`id_det_fac`),
  KEY `id_co_det_fac` (`id_co_det_fac`),
  KEY `id_an_det_fac` (`id_an_det_fac`),
  CONSTRAINT `detalles_factura_ibfk_2` FOREIGN KEY (`id_co_det_fac`) REFERENCES `factura` (`id_fac`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detalles_factura_ibfk_3` FOREIGN KEY (`id_an_det_fac`) REFERENCES `analisis` (`id_an`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalles_factura`
--

LOCK TABLES `detalles_factura` WRITE;
/*!40000 ALTER TABLE `detalles_factura` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalles_factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `factura`
--

DROP TABLE IF EXISTS `factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `factura` (
  `id_fac` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_cli_fac` bigint(40) NOT NULL,
  `id_usd_fac` bigint(20) NOT NULL,
  `fecha_fac` date NOT NULL,
  `precio_total` double NOT NULL,
  `hora_fac` time NOT NULL,
  `estado_fac` tinyint(1) NOT NULL,
  `iva_factura` varchar(11) NOT NULL,
  PRIMARY KEY (`id_fac`),
  KEY `id_cli_fac` (`id_cli_fac`),
  KEY `id_usd_fac` (`id_usd_fac`),
  KEY `iva_factura` (`iva_factura`),
  CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`id_usd_fac`) REFERENCES `usuario` (`id_us`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`id_cli_fac`) REFERENCES `cliente` (`id_cli`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `factura`
--

LOCK TABLES `factura` WRITE;
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forma_pago`
--

DROP TABLE IF EXISTS `forma_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forma_pago` (
  `id_forma_pago` bigint(40) NOT NULL AUTO_INCREMENT,
  `nom_forma_pago` varchar(40) NOT NULL,
  PRIMARY KEY (`id_forma_pago`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forma_pago`
--

LOCK TABLES `forma_pago` WRITE;
/*!40000 ALTER TABLE `forma_pago` DISABLE KEYS */;
INSERT INTO `forma_pago` VALUES (1,'Pago Movil'),(2,'Efectivo'),(3,'Transferencia');
/*!40000 ALTER TABLE `forma_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gastos`
--

DROP TABLE IF EXISTS `gastos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gastos` (
  `id_gastos` bigint(40) NOT NULL AUTO_INCREMENT,
  `insumos_id` bigint(40) NOT NULL,
  `can_ins_gasto` float NOT NULL,
  `id_fac_gas` bigint(40) NOT NULL,
  `fecha_gas` date NOT NULL,
  PRIMARY KEY (`id_gastos`),
  KEY `id_fac_gas` (`id_fac_gas`),
  KEY `insumos_id` (`insumos_id`),
  CONSTRAINT `gastos_ibfk_1` FOREIGN KEY (`id_fac_gas`) REFERENCES `factura` (`id_fac`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `gastos_ibfk_2` FOREIGN KEY (`insumos_id`) REFERENCES `insumos` (`id_in`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gastos`
--

LOCK TABLES `gastos` WRITE;
/*!40000 ALTER TABLE `gastos` DISABLE KEYS */;
/*!40000 ALTER TABLE `gastos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `informe`
--

DROP TABLE IF EXISTS `informe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `informe` (
  `id_info` bigint(40) NOT NULL AUTO_INCREMENT,
  `id_us_info` bigint(40) NOT NULL,
  PRIMARY KEY (`id_info`),
  KEY `id_us_info` (`id_us_info`),
  CONSTRAINT `informe_ibfk_1` FOREIGN KEY (`id_us_info`) REFERENCES `usuario` (`id_us`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `informe`
--

LOCK TABLES `informe` WRITE;
/*!40000 ALTER TABLE `informe` DISABLE KEYS */;
/*!40000 ALTER TABLE `informe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insumos`
--

DROP TABLE IF EXISTS `insumos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `insumos` (
  `id_in` bigint(40) NOT NULL AUTO_INCREMENT,
  `cod_in` bigint(6) unsigned zerofill NOT NULL,
  `nom_in` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `tipo_in` bigint(20) NOT NULL,
  `cantidad_in` double NOT NULL,
  `unidad_medicion` int(1) NOT NULL,
  `stockmax` double NOT NULL,
  `stockmin` double NOT NULL,
  `estado_in` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_in`),
  KEY `tipo_in` (`tipo_in`),
  CONSTRAINT `insumos_ibfk_1` FOREIGN KEY (`tipo_in`) REFERENCES `tipo_an_in` (`id_tipo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insumos`
--

LOCK TABLES `insumos` WRITE;
/*!40000 ALTER TABLE `insumos` DISABLE KEYS */;
/*!40000 ALTER TABLE `insumos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insumos_temp`
--

DROP TABLE IF EXISTS `insumos_temp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `insumos_temp` (
  `id_ins_temp` bigint(40) NOT NULL AUTO_INCREMENT,
  `id_ins_id` bigint(40) NOT NULL,
  `can_ins_temp` double NOT NULL,
  PRIMARY KEY (`id_ins_temp`),
  KEY `id_ins_id` (`id_ins_id`),
  CONSTRAINT `insumos_temp_ibfk_1` FOREIGN KEY (`id_ins_id`) REFERENCES `insumos` (`id_in`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=225 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insumos_temp`
--

LOCK TABLES `insumos_temp` WRITE;
/*!40000 ALTER TABLE `insumos_temp` DISABLE KEYS */;
/*!40000 ALTER TABLE `insumos_temp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `intentos`
--

DROP TABLE IF EXISTS `intentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `intentos` (
  `id_intentos` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  PRIMARY KEY (`id_intentos`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `intentos`
--

LOCK TABLES `intentos` WRITE;
/*!40000 ALTER TABLE `intentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `intentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `iva`
--

DROP TABLE IF EXISTS `iva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `iva` (
  `id_iva` int(40) NOT NULL AUTO_INCREMENT,
  `cantidad_iva` float NOT NULL,
  PRIMARY KEY (`id_iva`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `iva`
--

LOCK TABLES `iva` WRITE;
/*!40000 ALTER TABLE `iva` DISABLE KEYS */;
INSERT INTO `iva` VALUES (1,16);
/*!40000 ALTER TABLE `iva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lista_compra`
--

DROP TABLE IF EXISTS `lista_compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lista_compra` (
  `id_lista_compra` bigint(40) NOT NULL AUTO_INCREMENT,
  `id_pro_com_det` bigint(40) NOT NULL,
  `id_in_com` bigint(40) NOT NULL,
  `can_in_com` double NOT NULL,
  `costo_in_com` float NOT NULL,
  PRIMARY KEY (`id_lista_compra`),
  KEY `id_pro_en` (`id_pro_com_det`),
  KEY `id_en_in` (`id_in_com`),
  CONSTRAINT `lista_compra_ibfk_1` FOREIGN KEY (`id_in_com`) REFERENCES `insumos` (`id_in`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `lista_compra_ibfk_2` FOREIGN KEY (`id_pro_com_det`) REFERENCES `proveedor` (`id_pro`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=246 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lista_compra`
--

LOCK TABLES `lista_compra` WRITE;
/*!40000 ALTER TABLE `lista_compra` DISABLE KEYS */;
/*!40000 ALTER TABLE `lista_compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lista_mercancia`
--

DROP TABLE IF EXISTS `lista_mercancia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lista_mercancia` (
  `id_lista_mercancia` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_proveedor_mercancia` bigint(20) NOT NULL,
  `id_insumo_mercancia` bigint(40) NOT NULL,
  PRIMARY KEY (`id_lista_mercancia`),
  KEY `id_proveedor_mercancia` (`id_proveedor_mercancia`),
  KEY `id_insumo_mercancia` (`id_insumo_mercancia`),
  CONSTRAINT `lista_mercancia_ibfk_1` FOREIGN KEY (`id_proveedor_mercancia`) REFERENCES `proveedor` (`id_pro`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `lista_mercancia_ibfk_2` FOREIGN KEY (`id_insumo_mercancia`) REFERENCES `insumos` (`id_in`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lista_mercancia`
--

LOCK TABLES `lista_mercancia` WRITE;
/*!40000 ALTER TABLE `lista_mercancia` DISABLE KEYS */;
/*!40000 ALTER TABLE `lista_mercancia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pago_compra`
--

DROP TABLE IF EXISTS `pago_compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pago_compra` (
  `id_pago_compra` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_compra_pago` bigint(20) NOT NULL,
  `id_forma_pago` bigint(20) NOT NULL,
  `cantidad_pago` double NOT NULL,
  `referencia` bigint(13) unsigned zerofill DEFAULT NULL,
  PRIMARY KEY (`id_pago_compra`),
  KEY `id_compra_pago` (`id_compra_pago`),
  KEY `id_forma_pago` (`id_forma_pago`),
  CONSTRAINT `pago_compra_ibfk_1` FOREIGN KEY (`id_compra_pago`) REFERENCES `compra` (`id_compra`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pago_compra_ibfk_2` FOREIGN KEY (`id_forma_pago`) REFERENCES `forma_pago` (`id_forma_pago`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pago_compra`
--

LOCK TABLES `pago_compra` WRITE;
/*!40000 ALTER TABLE `pago_compra` DISABLE KEYS */;
/*!40000 ALTER TABLE `pago_compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pago_factura`
--

DROP TABLE IF EXISTS `pago_factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pago_factura` (
  `id_pago_fac` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_forma_pago` bigint(20) NOT NULL,
  `id_fac_pago` bigint(20) NOT NULL,
  `cantidad_pago` double NOT NULL,
  `referencia` bigint(13) unsigned zerofill DEFAULT NULL,
  PRIMARY KEY (`id_pago_fac`),
  KEY `id_fac_pago` (`id_fac_pago`),
  KEY `id_forma_pago` (`id_forma_pago`),
  CONSTRAINT `pago_factura_ibfk_1` FOREIGN KEY (`id_fac_pago`) REFERENCES `factura` (`id_fac`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pago_factura_ibfk_2` FOREIGN KEY (`id_forma_pago`) REFERENCES `forma_pago` (`id_forma_pago`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pago_factura`
--

LOCK TABLES `pago_factura` WRITE;
/*!40000 ALTER TABLE `pago_factura` DISABLE KEYS */;
/*!40000 ALTER TABLE `pago_factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedidos` (
  `id_pedidos` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_in_pe` bigint(20) NOT NULL,
  `cantidad_pe` double NOT NULL,
  `id_compra_pe` bigint(20) NOT NULL,
  `estado_pe` tinyint(1) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `id_us_pe` bigint(20) NOT NULL,
  PRIMARY KEY (`id_pedidos`),
  KEY `id_us_pe` (`id_us_pe`),
  KEY `id_compra_pe` (`id_compra_pe`),
  KEY `id_in_pe` (`id_in_pe`),
  CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_in_pe`) REFERENCES `insumos` (`id_in`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`id_compra_pe`) REFERENCES `compra` (`id_compra`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pedidos_ibfk_3` FOREIGN KEY (`id_us_pe`) REFERENCES `usuario` (`id_us`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preguntas`
--

DROP TABLE IF EXISTS `preguntas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preguntas` (
  `id_pregunta` bigint(40) NOT NULL AUTO_INCREMENT,
  `id_us_pre` bigint(20) NOT NULL,
  `pregunta` varchar(40) NOT NULL,
  `respuesta` varchar(40) NOT NULL,
  PRIMARY KEY (`id_pregunta`),
  KEY `id_us_pre` (`id_us_pre`),
  CONSTRAINT `preguntas_ibfk_1` FOREIGN KEY (`id_us_pre`) REFERENCES `usuario` (`id_us`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preguntas`
--

LOCK TABLES `preguntas` WRITE;
/*!40000 ALTER TABLE `preguntas` DISABLE KEYS */;
INSERT INTO `preguntas` VALUES (1,1,'cumpleaños','b9546d413031495e48d697484185b9fb'),(2,1,'nombre de mis hijos','3c9c03d6008a5adf42c2a55dd4a1a9f2'),(3,1,'¿escuela?','2690ef9d0ac4fb1d072eec496e292e9a'),(4,13,'nombre de mi madre','e8b129f85d154480f40cbb0ffe177766'),(5,13,'¿nombre de mi primer perrito?','33bd686f94c0c42b4ec2219ffdcf11c6'),(6,13,'¿película favorita?','bef27466a245ce3ec692bd25409c2549');
/*!40000 ALTER TABLE `preguntas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedor` (
  `id_pro` bigint(40) NOT NULL AUTO_INCREMENT,
  `rif_pro` bigint(8) unsigned zerofill NOT NULL,
  `tipo_pro` tinyint(1) NOT NULL,
  `rif_2` tinyint(1) NOT NULL,
  `nom_pro` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `tlf_num_pro` bigint(11) unsigned zerofill NOT NULL,
  `dir_pro` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `correo_pro` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `estado_pro` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_pro`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor`
--

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_an_in`
--

DROP TABLE IF EXISTS `tipo_an_in`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_an_in` (
  `id_tipo` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre_tipo` varchar(40) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_an_in`
--

LOCK TABLES `tipo_an_in` WRITE;
/*!40000 ALTER TABLE `tipo_an_in` DISABLE KEYS */;
INSERT INTO `tipo_an_in` VALUES (1,'Química sanguínea'),(2,'hematología'),(3,'Serología'),(4,'orina y heces'),(5,'mixtos');
/*!40000 ALTER TABLE `tipo_an_in` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_us` bigint(20) NOT NULL AUTO_INCREMENT,
  `nom_us` varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `nick_us` varchar(40) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pass_us` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `cedula_us` bigint(20) NOT NULL,
  `apellido_us` varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `num_tlf_us` bigint(11) unsigned zerofill NOT NULL,
  `nivel_us` bigint(20) NOT NULL,
  `estado_us` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_us`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Heilyn','heilin','21232f297a57a5a743894a0e4a801fc3',13770546,'Cabreras',02312312312,1,1),(13,'marifelix','lanene1972','827ccb0eea8a706c4c34a16891f84e7b',31234432,'lanene',04124544457,2,1),(17,'trabajador','trabajador','082dd3179733e3e716a58eb90f418a78',23233344,'trabajador',01242344567,3,1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-10-26 16:57:52

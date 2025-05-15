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
) ENGINE=InnoDB AUTO_INCREMENT=606 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `analisis`
--

LOCK TABLES `analisis` WRITE;
/*!40000 ALTER TABLE `analisis` DISABLE KEYS */;
INSERT INTO `analisis` VALUES (581,123456,'completa',2,10,'hematologia',1),(582,234567,'completa',1,25,'bacteriologia',1),(583,365478,'completa',1,65,'coproparasitologia',1),(584,654789,'pap',1,45,'patologia',1),(585,456123,'completa',1,25,'prueba de embarazo',1),(586,456285,'completa',3,85,'hepatitis',1),(587,369852,'completa',3,75,'vih',1),(588,147852,'completo',1,0.1,'ptt',1),(589,789520,'normal',1,45,'plasma patologico',1),(590,215487,'normal',1,45,'plasma',1),(591,169263,'normall',4,26,'horina',1),(592,748159,'normal',1,25,'glucosa',1),(593,159487,'normal',1,35,'colesterol',1),(594,658472,'normal',1,15,'calcio',1),(595,685423,'totales',1,50,'proteinas',1),(603,321321,'para el ph',4,11.22,'tiras de ph',1),(604,888888,'1232132121',2,223.23,'etesech',1),(605,989999,'99999999',1,33.34,'9999999',1);
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
) ENGINE=InnoDB AUTO_INCREMENT=230 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrito`
--

LOCK TABLES `carrito` WRITE;
/*!40000 ALTER TABLE `carrito` DISABLE KEYS */;
INSERT INTO `carrito` VALUES (229,39,581,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (23,5271074,6,0,'Diaz Eliecer',04123422152,'C plaza nro 7',1),(24,5525277,6,0,'ESCALONA CAROLÍNA',04123422153,'BAEL NRO 6',1),(25,8714272,6,0,'PEREIRA EUSTACIO',04123422154,'LOS HORNOS CALLE E NRO 9',1),(26,8733045,2,0,'HERNÁNDEZ ORLANDO',04123422155,'CALLE ANDRES E BLANCO NRO 3',1),(27,10753456,4,0,'GIL MILCA',04123422156,'SAN ANTONIO CALLE 9 NRO 36',1),(28,11090829,5,0,'PINTO ANA',04123422157,'CALLE PRINCIPAL LA PICA NRO 45',1),(29,11976078,3,0,'PADILLA ROSA',04123422158,'TERCERA CALLE URB LOS LIBERTADORES',1),(30,13869256,1,0,'MORALES PATRICIA',04123422159,'LOS NARANJOS NRO 23',1),(31,14944123,2,0,'MEZA MIRTHA',04123422160,'BELLO MONTE NRO 15',1),(32,17016789,3,0,'CONDE NANYEIDI',04123422161,'CIUDAD SOCIALISTA LIBERTADOR NRO 3',1),(33,17968944,2,0,'MARQUEZ JISEL',04123422162,'SANTA ANA NRPO 15',1),(34,17968945,1,0,'CABRERA MARIFELIX',04123422164,'CALLE MONAGAS SANTA ANA 36',1),(35,10753752,5,0,'ASCANIO YNGRID',04123422152,'DIEZ DE DICIEMBRE NRO 13',1),(36,10757439,4,0,'NORAIMA BASTIDAS',04123422168,'SAN ANTONIO CALLE 3N CASA 2',1),(37,7196351,2,0,'HÉCTOR GONZÁLEZ',04243724665,'DIEZ DE DICIEMBRE CASA NRO 13',1),(38,19608154,1,0,'JEAN CARLOS GONZÁLEZ',04243724665,'CALLE CEDEÑO CASA 13',1),(39,4460721,1,0,'FREDDY GUERRERO',02432673365,'CALLE 24 DE JULIO CASA 44',1),(40,123213213,1,4,'1321321321',02321321321,'1231qwewqewq',1),(41,127777777,6,0,'miguel',02321321312,'123213213213213213213213',1),(42,444444444,6,0,'jose migue',02300000000,'uuuuuuu',1),(43,32132132,4,0,'juan carlos bodoque',04122333444,'asdsadsasasads',1),(44,33333888,4,8,'e44434',04421321321,'21dsdfasda',1);
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
INSERT INTO `compra` VALUES (153,12,75759.5,'2022-10-11','08:33:45',2,'16.33',1),(154,11,350858.64,'2022-10-11','10:27:51',2,'16.33',1),(155,11,1.1,'2022-10-11','11:35:22',2,'16.33',18),(156,12,567.82,'2022-10-20','00:07:13',1,'16',1),(157,11,122.21,'2022-10-23','20:37:47',1,'15',1),(158,12,879.69,'2022-10-24','18:24:24',1,'15',1),(159,12,70237.69,'2022-10-25','15:27:05',1,'15',1),(160,13,4949.04,'2022-10-26','00:32:34',1,'15',1),(161,12,333,'2022-10-26','01:34:33',1,'15',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consumo`
--

LOCK TABLES `consumo` WRITE;
/*!40000 ALTER TABLE `consumo` DISABLE KEYS */;
INSERT INTO `consumo` VALUES (74,581,75,1.11),(75,591,75,1.11),(77,588,65,2.11),(78,588,79,3.22),(79,588,75,1.11),(80,592,69,1.11),(81,592,73,1.11),(82,592,75,1.11);
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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalles_compra`
--

LOCK TABLES `detalles_compra` WRITE;
/*!40000 ALTER TABLE `detalles_compra` DISABLE KEYS */;
INSERT INTO `detalles_compra` VALUES (1,153,64,1000,12.61),(2,153,65,1000,45.55),(3,153,78,450,30),(4,153,91,90,45.55),(5,154,63,1234.56,34.44),(6,154,66,2650,55),(7,154,69,1240,66),(8,154,70,1420,17.77),(9,154,78,800,5.55),(10,154,79,1200,12.11),(11,154,81,1800,12.22),(12,154,85,250,44),(13,154,88,1450,2.22),(14,154,91,30,11),(15,155,81,10,0.11),(16,156,65,1.11,1.11),(17,156,91,25,22.22),(18,156,64,3.33,3.33),(19,157,81,11.11,11),(20,158,65,59.5,3.12),(21,158,91,64,4.55),(22,158,64,56.66,7.11),(23,159,64,56.79,1231.29),(24,159,65,7,34.66),(25,159,91,3,23.37),(26,160,66,60,22.22),(27,160,68,30,44.44),(28,160,98,5,55.55),(29,160,99,45,44),(30,160,75,22.22,1.12),(31,161,91,60,5.55);
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
  CONSTRAINT `detalles_factura_ibfk_1` FOREIGN KEY (`id_an_det_fac`) REFERENCES `analisis` (`id_an`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detalles_factura_ibfk_2` FOREIGN KEY (`id_co_det_fac`) REFERENCES `factura` (`id_fac`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalles_factura`
--

LOCK TABLES `detalles_factura` WRITE;
/*!40000 ALTER TABLE `detalles_factura` DISABLE KEYS */;
INSERT INTO `detalles_factura` VALUES (1,61,588,4,0.1),(2,62,588,1,0.1),(3,63,588,1,0.1),(4,64,588,1,0.1),(5,65,581,1,10),(6,66,581,1,10),(7,66,591,1,25),(8,67,581,33,10),(9,67,591,11,25),(10,68,581,1,10),(11,69,581,2,10),(12,69,588,3,0.1),(13,69,591,1,25),(14,70,588,44,0.1),(15,70,581,12,10),(16,70,591,4,25),(17,71,588,22,0.1),(18,71,591,13,25),(19,72,581,4,10),(20,72,588,100,0.1);
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
INSERT INTO `factura` VALUES (61,39,17,'2022-10-11',0.4,'11:06:06',2,'16.33'),(62,23,17,'2022-10-11',0.1,'11:11:32',2,'16.33'),(63,23,1,'2022-10-11',0.1,'11:48:18',2,'16.33'),(64,39,1,'2022-10-11',0.1,'15:34:29',2,'16'),(65,39,1,'2022-10-19',10,'06:50:30',2,'16'),(66,39,1,'2022-10-19',35,'08:27:09',2,'16'),(67,39,1,'2022-10-19',605,'09:52:37',2,'16'),(68,39,1,'2022-10-23',10,'17:53:13',1,'15'),(69,23,1,'2022-10-23',45.3,'19:03:58',2,'15'),(70,39,1,'2022-10-23',224.4,'19:30:07',2,'15'),(71,24,1,'2022-10-23',327.2,'20:09:21',0,'15'),(72,39,1,'2022-10-26',50,'00:25:35',0,'15');
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
INSERT INTO `gastos` VALUES (1,81,53.5,61,'2022-10-11'),(2,91,4,61,'2022-10-11'),(3,81,15,62,'2022-10-11'),(4,91,1,62,'2022-10-11'),(5,81,15.5,63,'2022-10-11'),(6,91,1,63,'2022-10-11'),(7,81,15.5,64,'2022-10-11'),(8,91,1,64,'2022-10-11'),(9,75,1,65,'2022-10-19'),(10,75,1,66,'2022-10-19'),(11,75,48.84,67,'2022-10-19'),(12,75,1.11,68,'2022-10-23'),(13,75,3.33,69,'2022-10-23'),(14,65,6.33,69,'2022-10-23'),(15,75,66.6,70,'2022-10-23'),(16,65,92.84,70,'2022-10-23'),(17,79,141.68,70,'2022-10-23'),(18,65,36.42,71,'2022-10-23'),(19,79,60.84,71,'2022-10-23'),(20,75,38.85,71,'2022-10-23'),(21,75,32.21,72,'2022-10-26'),(22,65,22.22,72,'2022-10-26'),(23,79,32,72,'2022-10-26');
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
INSERT INTO `insumos` VALUES (63,323100,'wright',1,1234.56,2,1234.56,21.5,1),(64,214100,'EDTA',1,1056.66,2,1580,52.41,1),(65,234515,'azul crecil brillante',1,948.71,2,1750,65.2,1),(66,511532,'solucion de truk',1,80,2,2650,56,1),(67,515151,'oxalato de amonio',2,0,2,1450,45.2,1),(68,413241,'safranina',2,50,2,1450,21.5,1),(69,512511,'yodo de gram',1,1240,2,1240,35.2,1),(70,515152,'cristal violeta',3,1420,2,1420,35.2,1),(72,156125,'alcohol acido0',3,0,1,222,2,1),(73,512410,'carbol fucsina',1,0,2,1350,50,1),(74,545523,'azul de metileno',1,0,2,1580,75,1),(75,785632,'lugol',5,889.45,2,1890,75,1),(76,562367,'hematoloxilina',1,0,2,123.21,22.21,1),(77,523523,'orange',1,0,2,1560,65,1),(78,151798,'ea 65',1,800,2,111.11,11,1),(79,685346,'eosina',1,1058.32,2,1200,55,1),(80,785332,'ferol',1,0,2,1500,56.2,1),(81,586400,'inmuno cromatografia',1,1716.55,2,1800,30.2,1),(85,997652,'200 ml',3,250,1,13231,22,1),(86,567687,'tiras reactibas',1,0,1,200,25,1),(88,555555,'colormetrico',1,1450,2,1450,55,1),(91,173121,'Par de guantes',1,140,1,122222,11,1),(98,213213,'1232132113213',3,5,1,111,11,1),(99,213215,'ultimo',3,45,1,111,11,1),(100,565465,'uuuuuuu',1,0,1,23222,333,1);
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
INSERT INTO `insumos_temp` VALUES (224,75,888.34);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `iva`
--

LOCK TABLES `iva` WRITE;
/*!40000 ALTER TABLE `iva` DISABLE KEYS */;
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
INSERT INTO `lista_mercancia` VALUES (16,12,91),(18,12,65),(19,12,64),(20,11,78),(21,11,91),(22,11,63),(23,11,66),(24,11,70),(25,11,81),(26,11,85),(27,11,79),(28,11,88),(29,11,69),(31,13,75),(34,13,68),(35,13,66),(36,13,98),(37,13,99);
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
INSERT INTO `pago_compra` VALUES (1,156,1,433.1099853515625,0997777777777),(2,156,3,213.2100067138672,0123213211321),(3,156,1,12.350000381469727,0999777745777),(4,153,2,88131.03,0000000000000),(5,154,2,204076.9375,0000000000000),(6,155,3,1.2799999713897705,0867767667566),(7,154,1,204076.93,0563434543544),(8,157,2,100,0000000000000),(9,157,3,40.54,0232113213213),(10,158,2,122.77,0000000000000),(11,158,3,888.88,0232113213213),(12,159,2,80773.342465,0000000000000),(13,160,2,433.04,0000000000000),(14,160,3,1147.22,0232113213213),(15,160,3,4111.13,0312123213222),(16,161,2,196,0000000000000),(17,161,3,186.95,0200000000000);
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
INSERT INTO `pago_factura` VALUES (1,1,61,0.47,0000000000000),(2,2,65,11.6,0000000000000),(3,1,66,12.489999771118164,0300000000000),(4,1,66,11.109999656677246,0200000000000),(5,1,66,17,0030050000000),(6,2,67,268.2200012207031,0000000000000),(7,3,67,234.47000122070312,0705008090000),(8,3,67,199.11,0900700504000),(9,2,68,11.5,0000000000000),(10,2,69,52.1,0000000000000),(11,2,70,100,0000000000000),(12,1,70,158.06,0060708009000),(13,2,71,300,0000000000000),(14,3,71,76.28,0222222222222),(15,2,72,16,0000000000000),(16,1,72,2,0200000000000),(17,3,72,39.5,0430050000000);
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
INSERT INTO `pedidos` VALUES (1,64,500.5,153,2,'2022-10-30',1),(2,65,1000,153,2,'2022-10-30',1),(3,78,450,153,0,'2022-10-30',1),(4,91,50,153,2,'2022-10-30',1),(5,64,499.5,153,2,'2022-10-30',1),(6,91,40,153,2,'2022-10-30',1),(7,63,1234.56,154,2,'2022-10-22',1),(8,66,2650,154,2,'2022-10-22',1),(9,69,1240,154,2,'2022-10-22',1),(10,70,1420,154,2,'2022-10-22',1),(11,78,800,154,2,'2022-10-22',1),(12,79,1200,154,2,'2022-10-22',1),(13,81,1800,154,2,'2022-10-22',1),(14,85,250,154,2,'2022-10-22',1),(15,88,1450,154,2,'2022-10-22',1),(16,91,30,154,2,'2022-10-22',1),(17,81,10,155,2,'2022-10-12',18),(18,65,1.11,156,1,'2022-10-20',1),(19,91,25,156,1,'2022-10-20',1),(20,64,3.33,156,1,'2022-10-20',1),(21,81,2.22,157,2,'2022-10-23',1),(22,65,47.88,158,2,'2022-10-24',1),(23,91,27,158,2,'2022-10-24',1),(24,64,56.66,158,2,'2022-10-24',1),(25,91,37,158,1,'2022-10-24',1),(26,81,2.22,157,2,'2022-10-23',1),(27,81,1.11,157,2,'2022-10-23',1),(28,81,0.5,157,2,'2022-10-23',1),(29,81,5.06,157,1,'2022-10-23',1),(30,64,56.79,159,1,'2022-10-25',1),(31,65,7,159,1,'2022-10-25',1),(32,91,3,159,1,'2022-10-25',1),(33,66,20,160,2,'2022-10-26',1),(34,68,50,160,2,'2022-10-26',1),(35,98,5,160,2,'2022-10-26',1),(36,99,45,160,2,'2022-10-26',1),(37,75,12.22,160,2,'2022-10-26',1),(38,66,40,160,1,'2022-10-26',1),(39,75,10,160,1,'2022-10-26',1),(40,91,60,161,1,'2022-10-26',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=210 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preguntas`
--

LOCK TABLES `preguntas` WRITE;
/*!40000 ALTER TABLE `preguntas` DISABLE KEYS */;
INSERT INTO `preguntas` VALUES (4,1,'fecha importante','81dc9bdb52d04dc20036dbd8313ed055'),(7,18,'fecha importanteññ','d68a18275455ae3eaa2c291eebb46e6d'),(9,17,'cumpleaños','c4de8ced6214345614d33fb0b16a8acd'),(11,1,'lolsito6','982aca433f12fd61895f366a4b39f0fa');
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
INSERT INTO `proveedor` VALUES (10,22332331,4,0,'DistribuidoresdeInstrumentosCientífico',04121234565,'palo negro calle bolivar','DistribuidoresdeInstrumentos@gmail.com',1),(11,55543352,2,4,'DISTRIBUCIONESLEMERCKE',04141234564,'palo negro calle tamanaco','DistribucionesLemercke@gmail.com',1),(12,45678857,3,7,'Científica Vela Quin S de RL de CV',04121234867,'palo negro calle Rondon','cientifixavEla@gmail.com',1),(13,45678957,5,8,'Abastecedora Científica Roumer',02121345117,'palo negro caye simepre viva','Abastekedora@gmail.com',1),(24,54321232,1,6,'juan jose',02432132137,'palo negro','juanjose@qw.com',1),(25,99999999,3,5,'fffffffffffffffffffffffff',02623213212,'wsewqeqw','aaj@qw.com',1),(26,66666666,2,8,'21321321',04123123213,'sadsadsadas','aas@asas.com',1);
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
INSERT INTO `usuario` VALUES (1,'Heilyn','heilin','21232f297a57a5a743894a0e4a801fc3',13770546,'Cabreras',02312312312,1,1),(13,'marifelix','lanene1972','827ccb0eea8a706c4c34a16891f84e7b',31234432,'lanene',04124544457,2,1),(17,'trabajador','trabajador','082dd3179733e3e716a58eb90f418a78',23233344,'trabajador',01242344567,3,1),(18,'mari sol','gerente','740d9c49b11f3ada7b9112614a54be41',23234564,'Villegas',02443223331,2,1),(21,'Mari Felix','marifelix','c4de8ced6214345614d33fb0b16a8acd',9876568,'cabreras',04265321501,2,1),(22,'prueba','prueba','81dc9bdb52d04dc20036dbd8313ed055',21321333,'prueba',04124055017,3,1),(23,'wqewq','wqewqwqewwq','827ccb0eea8a706c4c34a16891f84e7b',12312321,'wqewqe',04125122222,2,1),(24,'carlos','carlosvivas','e10adc3949ba59abbe56e057f20f883e',23456765,'rodrigues',02445152157,3,1),(25,'Jose antonio','esotilin','0807f9409fabbca17a5f62c97c200b3c',12312367,'Colmenarez',04241232131,3,1),(26,'sdsadsaas','ewqweqw','54b41d6ea92d22f189fb5555185b4b01',21312312,'sadsadasd',02231232132,2,1);
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

-- Dump completed on 2022-10-26 14:57:57

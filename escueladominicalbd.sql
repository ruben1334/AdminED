-- MySQL dump 10.13  Distrib 5.6.24, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: escueladominicalbd
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.25-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cdetalle`
--

DROP TABLE IF EXISTS `cdetalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cdetalle` (
  `idCompra` int(11) NOT NULL,
  `idMaterial` tinyint(4) NOT NULL,
  `detalleCompra` varchar(200) NOT NULL,
  `cantidad` smallint(6) NOT NULL,
  PRIMARY KEY (`idCompra`,`idMaterial`),
  KEY `fk_Compra_has_Material_Material2_idx` (`idMaterial`),
  KEY `fk_Compra_has_Material_Compra2_idx` (`idCompra`),
  CONSTRAINT `fk_Compra_has_Material_Compra2` FOREIGN KEY (`idCompra`) REFERENCES `compra` (`idCompra`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Compra_has_Material_Material2` FOREIGN KEY (`idMaterial`) REFERENCES `material` (`idMaterial`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cdetalle`
--

LOCK TABLES `cdetalle` WRITE;
/*!40000 ALTER TABLE `cdetalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `cdetalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clase`
--

DROP TABLE IF EXISTS `clase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clase` (
  `idClase` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombreClase` varchar(50) NOT NULL,
  `cantNuevos` tinyint(4) NOT NULL,
  `cantAsistencia` tinyint(4) NOT NULL,
  `cantBiblia` tinyint(4) NOT NULL,
  `cantOfrenda` decimal(10,0) NOT NULL,
  `gestion` year(4) NOT NULL,
  `habilitado` char(1) NOT NULL DEFAULT '2',
  `idUsuario` tinyint(4) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechaActualizacion` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idClase`),
  KEY `fk_clase_usuario1_idx` (`idUsuario`),
  CONSTRAINT `fk_clase_usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clase`
--

LOCK TABLES `clase` WRITE;
/*!40000 ALTER TABLE `clase` DISABLE KEYS */;
INSERT INTO `clase` VALUES (1,'cunitas',1,10,3,3,2022,'3',1,'1','2022-11-06 03:01:21','2022-11-06 03:01:21'),(2,'parvulos',1,15,14,10,2022,'3',1,'1','2022-11-06 03:02:22','2022-11-06 03:02:22'),(3,'estrellitas',1,18,14,13,2022,'3',1,'1','2022-11-06 03:06:55','2022-11-06 03:06:55'),(4,'principiantes',0,12,12,11,2022,'3',1,'1','2022-11-06 03:06:55','2022-11-06 03:06:55'),(5,'mensajeros',0,13,13,10,2020,'3',1,'1','2022-11-06 03:06:55','2022-11-06 03:06:55'),(6,'adolescentes',1,15,13,12,2022,'3',1,'1','2022-11-06 03:06:55','2022-11-06 03:06:55'),(7,'jóvenes',1,15,14,12,2022,'3',1,'0','2022-11-06 03:10:11','2022-11-06 03:10:11'),(8,' cunitas',1,12,5,4,2022,'5',1,'5','2022-11-06 04:28:08','2022-11-06 04:28:08'),(9,' parvulos',1,16,16,14,2022,'2',1,'0','2022-11-06 04:30:24','2022-11-06 04:30:24');
/*!40000 ALTER TABLE `clase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compra`
--

DROP TABLE IF EXISTS `compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compra` (
  `idCompra` int(11) NOT NULL AUTO_INCREMENT,
  `fechaCompra` datetime NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechaActualizacion` timestamp NULL DEFAULT current_timestamp(),
  `idUsuario` tinyint(4) NOT NULL,
  PRIMARY KEY (`idCompra`),
  KEY `fk_Compra_Usuario1_idx` (`idUsuario`),
  CONSTRAINT `fk_Compra_Usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra`
--

LOCK TABLES `compra` WRITE;
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudiante`
--

DROP TABLE IF EXISTS `estudiante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estudiante` (
  `idEstudiante` tinyint(4) NOT NULL AUTO_INCREMENT,
  `foto` varchar(45) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `primerApellido` varchar(60) NOT NULL,
  `segundoApellido` varchar(60) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `bautizado` varchar(2) NOT NULL,
  `padres` varchar(300) DEFAULT NULL,
  `NumeroReferencia` int(11) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechaActualizacion` timestamp NULL DEFAULT current_timestamp(),
  `idUsuario` tinyint(4) NOT NULL,
  `idClase` tinyint(4) NOT NULL,
  PRIMARY KEY (`idEstudiante`),
  KEY `fk_estudiante_usuario1_idx` (`idUsuario`),
  KEY `fk_estudiante_clase1_idx` (`idClase`),
  CONSTRAINT `fk_estudiante_clase1` FOREIGN KEY (`idClase`) REFERENCES `clase` (`idClase`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_estudiante_usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiante`
--

LOCK TABLES `estudiante` WRITE;
/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
INSERT INTO `estudiante` VALUES (1,'','lidia','lara','ferrel','2003-03-15','no','gabriel lara',75489612,'5','2022-10-07 00:00:00','2022-11-06 12:22:51',1,1),(2,'','adrian','gomez','jimenez','2004-11-26','no','fidel gomez',66997541,'1','2022-10-07 00:00:00','2022-10-08 02:02:52',1,2),(3,'3.jpg','alvaro','mamani','fuentes','2005-12-23','No','juan mamani',71458968,'1','2022-10-07 00:00:00','2022-11-06 12:44:56',1,3),(4,'','alicia','perez','alcon','2003-03-26','no','martha perez',68974213,'1','2022-10-07 00:00:00','2022-11-09 00:51:23',1,3),(5,'','camila','flores','acha','2006-04-03','no','victor flores',69541257,'1','2022-10-07 00:00:00','2022-11-09 00:51:29',1,2),(6,'6.jpg','sara','calle','lara','2008-09-09','No','fernando calle',65487632,'1','2022-10-07 00:00:00','2022-11-06 12:44:08',1,2),(11,'','mauro','vincenty','tola','2005-07-08','Si','pablo vincenty',67890321,'0','2022-11-02 04:51:01',NULL,1,2),(12,'','josue','guzman','toro','2011-06-28','No','victor guzman',67894523,'0','2022-11-02 05:43:26',NULL,1,2),(13,'1.jpg','miki','portugal','flores','2002-03-22','No','carlos portugal',68997734,'1','2022-11-06 07:21:50','2022-11-06 07:21:50',1,6);
/*!40000 ALTER TABLE `estudiante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material`
--

DROP TABLE IF EXISTS `material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material` (
  `idMaterial` tinyint(4) NOT NULL AUTO_INCREMENT,
  `imagen` varchar(45) NOT NULL,
  `nombreMaterial` varchar(200) NOT NULL,
  `stock` int(11) NOT NULL,
  `unidadMedida` varchar(45) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `precio` float NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechaActualizacion` timestamp NULL DEFAULT current_timestamp(),
  `idUsuario` smallint(6) NOT NULL,
  PRIMARY KEY (`idMaterial`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material`
--

LOCK TABLES `material` WRITE;
/*!40000 ALTER TABLE `material` DISABLE KEYS */;
INSERT INTO `material` VALUES (1,'1.jpg','tijeras',16,'unidad','dos docenas',3,'1','2022-10-08 22:56:52','2022-11-15 03:43:32',0),(2,'2.jpg','lapiz',23,'unidad','cuatro docenas',1,'1','2022-10-08 22:57:25','2022-11-14 10:56:29',0),(3,'3.jpg','isocola',39,'unidad','cuatro docenas',3,'1','2022-10-12 02:11:17','2022-11-14 10:59:02',0),(4,'material.png','cartulina pliego',6,'pliego','media docena',3,'0','2022-10-12 03:37:37','2022-11-04 18:33:56',0),(5,'material.png','goma eva',11,'pliego','una docena',7,'1','2022-10-12 03:38:37','2022-11-15 03:43:32',0),(6,'material.png','boligrafo(azul)',16,'unidad','cinco docenas ',2,'1','2022-10-12 03:39:53','2022-11-09 04:55:57',0),(7,'material.png','hojas bond blanco',420,'hoja','un paquete',0.1,'1','2022-10-12 03:41:14','2022-11-14 19:51:18',0),(8,'material.png','borrador',14,'unidad','dos docenas',1,'1','2022-10-12 03:44:31','2022-11-14 10:56:29',0),(9,'.jpg','tajador',33,'unidad','5 docenas',1,'1','2022-11-06 07:56:05','2022-11-09 04:55:57',0),(10,'.jpg','regla',49,'unidad','dos docenas',3,'1','2022-11-06 20:13:19','2022-11-14 11:00:38',0),(11,'.jpg','marcador (12colores)',4,'caja','una docena',3,'1','2022-11-06 20:24:55','2022-11-14 19:51:18',0),(12,'.jpg','silicona en barra',36,'unidad','tres docenas',1,'0','2022-11-06 20:29:38','2022-11-07 01:39:50',0),(13,'.jpg','pincel',12,'unidad','una docena',2,'0','2022-11-06 20:34:49','2022-11-07 01:39:40',0),(14,'.jpg','acrilex',24,'unidad','dos docenas',5,'0','2022-11-06 20:38:56','2022-11-07 01:39:32',0);
/*!40000 ALTER TABLE `material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pdetalle`
--

DROP TABLE IF EXISTS `pdetalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pdetalle` (
  `idPedido` int(11) NOT NULL,
  `idMaterial` tinyint(4) NOT NULL,
  `cantidad` tinyint(4) NOT NULL,
  `razonSocial` varchar(300) NOT NULL,
  `nombreMaestro` varchar(45) NOT NULL,
  `precioUnitario` float NOT NULL,
  PRIMARY KEY (`idPedido`,`idMaterial`),
  KEY `fk_PedidoMaterial_has_Material_Material1_idx` (`idMaterial`),
  KEY `fk_PedidoMaterial_has_Material_PedidoMaterial1_idx` (`idPedido`),
  CONSTRAINT `fk_PedidoMaterial_has_Material_Material1` FOREIGN KEY (`idMaterial`) REFERENCES `material` (`idMaterial`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_PedidoMaterial_has_Material_PedidoMaterial1` FOREIGN KEY (`idPedido`) REFERENCES `pedido` (`idPedido`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pdetalle`
--

LOCK TABLES `pdetalle` WRITE;
/*!40000 ALTER TABLE `pdetalle` DISABLE KEYS */;
INSERT INTO `pdetalle` VALUES (1,1,6,'principiantes','laura vera carrasco',3),(2,2,2,'cunitas','daniela torrico gonzales',1),(3,3,6,'adolescentes','dayana franco cortes',3),(10,3,1,'parvulos','willy villanueva soto',3),(10,5,1,'adolescentes','ruddy marca rivas',7),(11,5,1,'parvulos','willy villanueva soto',7),(11,8,2,'mensajeros','luis paz figueroa',1),(12,5,1,'parvulos','willy villanueva soto',7),(12,8,2,'adolescentes','ruddy marca rivas',1),(13,2,1,'mensajeros','luis paz figueroa',1),(13,5,2,'adolescentes','ruddy marca rivas',7),(14,6,2,'cunitas','armando tapia soto',2),(14,10,1,'cunitas','armando tapia soto',0),(15,3,3,'adolescentes','dayana franco cortez',3),(15,9,1,'adolescentes','dayana franco cortez',0),(16,6,2,'mensajeros','luis paz figueroa',2),(17,6,2,'mensajeros','luis paz figueroa',2),(18,2,2,'estrellitas','alex mamani cortez',1),(18,5,1,'estrellitas','alex mamani cortez',7),(19,2,2,'estrellitas','alex mamani cortez',1),(19,5,1,'estrellitas','alex mamani cortez',7),(20,5,2,'mensajeros','miguel lima gonzales',7),(21,1,2,'estrellitas','limbert cespedes mendoza',3),(21,3,2,'estrellitas','limbert cespedes mendoza',3),(21,7,10,'estrellitas','limbert cespedes mendoza',0.1),(22,6,1,'cunitas','aracely campos tapia',2),(22,10,1,'cunitas','aracely campos tapia',3),(23,6,1,'cunitas','aracely campos tapia',2),(23,10,1,'cunitas','aracely campos tapia',3),(24,6,1,'cunitas','aracely campos tapia',2),(24,10,1,'cunitas','aracely campos tapia',3),(25,6,1,'cunitas','aracely campos tapia',2),(25,10,1,'cunitas','aracely campos tapia',3),(26,6,1,'cunitas','aracely campos tapia',2),(26,10,1,'cunitas','aracely campos tapia',3),(27,6,1,'cunitas','aracely campos tapia',2),(27,10,1,'cunitas','aracely campos tapia',3),(28,6,1,'cunitas','aracely campos tapia',2),(28,10,1,'cunitas','aracely campos tapia',3),(29,6,1,'cunitas','aracely campos tapia',2),(29,10,1,'cunitas','aracely campos tapia',3),(30,6,1,'cunitas','aracely campos tapia',2),(30,10,1,'cunitas','aracely campos tapia',3),(31,6,1,'cunitas','aracely campos tapia',2),(31,10,1,'cunitas','aracely campos tapia',3),(32,6,1,'cunitas','aracely campos tapia',2),(32,10,1,'cunitas','aracely campos tapia',3),(33,6,1,'cunitas','aracely campos tapia',2),(33,10,1,'cunitas','aracely campos tapia',3),(34,6,1,'cunitas','aracely campos tapia',2),(34,10,1,'cunitas','aracely campos tapia',3),(35,6,1,'cunitas','aracely campos tapia',2),(35,10,1,'cunitas','aracely campos tapia',3),(36,6,1,'cunitas','aracely campos tapia',2),(36,10,1,'cunitas','aracely campos tapia',3),(37,6,1,'cunitas','aracely campos tapia',2),(37,10,1,'cunitas','aracely campos tapia',3),(38,6,1,'cunitas','aracely campos tapia',2),(38,10,1,'cunitas','aracely campos tapia',3),(39,6,1,'cunitas','aracely campos tapia',2),(39,10,1,'cunitas','aracely campos tapia',3),(40,6,1,'cunitas','aracely campos tapia',2),(40,10,1,'cunitas','aracely campos tapia',3),(41,6,1,'cunitas','aracely campos tapia',2),(41,10,1,'cunitas','aracely campos tapia',3),(42,6,1,'cunitas','aracely campos tapia',2),(42,10,1,'cunitas','aracely campos tapia',3),(43,6,1,'cunitas','aracely campos tapia',2),(43,10,1,'cunitas','aracely campos tapia',3),(44,6,1,'cunitas','aracely campos tapia',2),(44,10,1,'cunitas','aracely campos tapia',3),(45,6,1,'cunitas','aracely campos tapia',2),(45,10,1,'cunitas','aracely campos tapia',3),(46,6,1,'cunitas','aracely campos tapia',2),(46,10,1,'cunitas','aracely campos tapia',3),(47,6,1,'cunitas','aracely campos tapia',2),(47,10,1,'cunitas','aracely campos tapia',3),(48,6,1,'cunitas','aracely campos tapia',2),(48,10,1,'cunitas','aracely campos tapia',3),(49,6,1,'cunitas','aracely campos tapia',2),(49,10,1,'cunitas','aracely campos tapia',3),(50,6,1,'cunitas','aracely campos tapia',2),(50,10,1,'cunitas','aracely campos tapia',3),(51,6,1,'cunitas','aracely campos tapia',2),(51,10,1,'cunitas','aracely campos tapia',3),(52,6,1,'cunitas','aracely campos tapia',2),(52,10,1,'cunitas','aracely campos tapia',3),(53,6,1,'cunitas','aracely campos tapia',2),(53,10,1,'cunitas','aracely campos tapia',3),(54,6,1,'cunitas','aracely campos tapia',2),(54,10,1,'cunitas','aracely campos tapia',3),(55,6,1,'cunitas','aracely campos tapia',2),(55,10,1,'cunitas','aracely campos tapia',3),(56,6,1,'cunitas','aracely campos tapia',2),(56,10,1,'cunitas','aracely campos tapia',3),(57,6,1,'cunitas','aracely campos tapia',2),(57,10,1,'cunitas','aracely campos tapia',3),(58,2,2,'parvulos','pedro canedo garcia',1),(58,9,2,'parvulos','pedro canedo garcia',1),(59,2,2,'parvulos','pedro canedo garcia',1),(59,9,2,'parvulos','pedro canedo garcia',1),(60,2,2,'parvulos','pedro canedo garcia',1),(60,9,2,'parvulos','pedro canedo garcia',1),(61,2,2,'parvulos','pedro canedo garcia',1),(61,9,2,'parvulos','pedro canedo garcia',1),(62,2,2,'parvulos','pedro canedo garcia',1),(62,9,2,'parvulos','pedro canedo garcia',1),(63,2,2,'parvulos','pedro canedo garcia',1),(63,9,2,'parvulos','pedro canedo garcia',1),(64,2,2,'parvulos','pedro canedo garcia',1),(64,9,2,'parvulos','pedro canedo garcia',1),(65,2,2,'parvulos','pedro canedo garcia',1),(65,9,2,'parvulos','pedro canedo garcia',1),(66,2,2,'parvulos','pedro canedo garcia',1),(66,9,2,'parvulos','pedro canedo garcia',1),(67,2,2,'parvulos','pedro canedo garcia',1),(67,9,2,'parvulos','pedro canedo garcia',1),(68,2,2,'parvulos','pedro canedo garcia',1),(68,9,2,'parvulos','pedro canedo garcia',1),(69,2,2,'parvulos','pedro canedo garcia',1),(69,9,2,'parvulos','pedro canedo garcia',1),(70,7,10,'principiantes','jhon figueroa dominguez',0.1),(70,11,1,'principiantes','jhon figueroa dominguez',3),(71,7,10,'principiantes','jhon figueroa dominguez',0.1),(71,11,1,'principiantes','jhon figueroa dominguez',3),(72,7,10,'principiantes','jhon figueroa dominguez',0.1),(72,11,1,'principiantes','jhon figueroa dominguez',3),(73,6,2,'parvulos','vanesa cayo romero',2),(73,9,2,'parvulos','vanesa cayo romero',1),(74,1,2,'mensajeros','luis paz figueroa',3),(74,5,1,'mensajeros','luis paz figueroa',7),(74,7,10,'mensajeros','luis paz figueroa',0.1),(74,8,2,'mensajeros','luis paz figueroa',1),(75,2,4,'cunitas','aracely campos tapia',1),(75,7,10,'cunitas','aracely campos tapia',0.1),(75,8,2,'cunitas','aracely campos tapia',1),(75,11,2,'cunitas','aracely campos tapia',3),(76,2,4,'cunitas','aracely campos tapia',1),(76,7,10,'cunitas','aracely campos tapia',0.1),(76,8,2,'cunitas','aracely campos tapia',1),(76,11,2,'cunitas','aracely campos tapia',3),(77,3,3,'mensajeros','saul paco vela',3),(81,7,10,'Parvulos','vanesa cayo romero',0.1),(81,11,1,'Parvulos','vanesa cayo romero',3),(82,1,3,'cunitas','bertha mendez aguirre',3),(82,5,2,'cunitas','bertha mendez aguirre',7);
/*!40000 ALTER TABLE `pdetalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido` (
  `idPedido` int(11) NOT NULL AUTO_INCREMENT,
  `nroComprobante` varchar(45) DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `fechaActualizacion` timestamp NULL DEFAULT current_timestamp(),
  `idUsuario` tinyint(4) NOT NULL,
  `total` float NOT NULL,
  `idMaestro` smallint(6) NOT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idPedido`),
  KEY `fk_PedidoMaterial_Usuario1_idx` (`idUsuario`),
  CONSTRAINT `fk_PedidoMaterial_Usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` VALUES (1,'1001','0','2022-10-19','2022-11-15 01:13:43',1,18,4,'2022-11-14 15:29:02'),(2,'1002','1','2022-10-19','2022-10-19 19:20:48',1,2,6,'2022-11-14 15:29:02'),(3,'1003','1','2022-09-19','2022-11-07 05:12:48',1,18,12,'2022-11-14 15:29:02'),(10,'1009','1','2022-11-08','2022-11-08 02:54:27',1,10,21,'2022-11-14 15:29:02'),(11,'1010','1','2022-11-08','2022-11-08 03:01:26',1,9,12,'2022-11-14 15:29:02'),(12,'1010','1','2022-11-08','2022-11-08 03:07:59',1,9,12,'2022-11-14 15:29:02'),(13,'1012','1','2022-11-08','2022-11-08 04:14:31',1,15,10,'2022-11-14 15:29:02'),(14,'1013','1','2022-11-08','2022-11-08 04:16:13',1,4,18,'2022-11-14 15:29:02'),(15,'1014','1','2022-11-08','2022-11-08 04:21:16',1,9,12,'2022-11-14 15:29:02'),(16,'1015','1','2022-11-08','2022-11-08 04:24:56',1,4,21,'2022-11-14 15:29:02'),(17,'1015','1','2022-11-08','2022-11-08 04:25:04',1,4,21,'2022-11-14 15:29:02'),(18,'1017','1','2022-11-08','2022-11-08 04:39:05',1,9,9,'2022-11-14 15:29:02'),(19,'1017','1','2022-11-08','2022-11-08 04:40:56',1,9,9,'2022-11-14 15:29:02'),(20,'1019','1','2022-11-08','2022-11-08 04:46:50',1,14,11,'2022-11-14 15:29:02'),(21,'1020','1','2022-11-08','2022-11-08 05:30:31',1,13,5,'2022-11-14 15:29:02'),(22,'1021','1','2022-11-08','2022-11-08 05:50:03',1,5,28,'2022-11-14 15:29:02'),(23,'1021','1','2022-11-08','2022-11-08 05:56:36',1,5,28,'2022-11-14 15:29:02'),(24,'1021','1','2022-11-08','2022-11-08 05:58:17',1,5,28,'2022-11-14 15:29:02'),(25,'1021','1','2022-11-08','2022-11-08 06:01:56',1,5,28,'2022-11-14 15:29:02'),(26,'1021','1','2022-11-08','2022-11-08 06:02:32',1,5,28,'2022-11-14 15:29:02'),(27,'1021','1','2022-11-08','2022-11-08 06:21:34',1,5,28,'2022-11-14 15:29:02'),(28,'1021','1','2022-11-08','2022-11-08 06:45:07',1,5,28,'2022-11-14 15:29:02'),(29,'1021','1','2022-11-08','2022-11-08 06:47:39',1,5,28,'2022-11-14 15:29:02'),(30,'1021','1','2022-11-08','2022-11-08 06:49:33',1,5,28,'2022-11-14 15:29:02'),(31,'1021','1','2022-11-08','2022-11-08 06:50:09',1,5,28,'2022-11-14 15:29:02'),(32,'1021','1','2022-11-08','2022-11-08 06:53:09',1,5,28,'2022-11-14 15:29:02'),(33,'1021','1','2022-11-08','2022-11-08 06:53:58',1,5,28,'2022-11-14 15:29:02'),(34,'1021','1','2022-11-08','2022-11-08 06:55:12',1,5,28,'2022-11-14 15:29:02'),(35,'1021','1','2022-11-08','2022-11-08 06:56:39',1,5,28,'2022-11-14 15:29:02'),(36,'1021','1','2022-11-08','2022-11-08 06:57:31',1,5,28,'2022-11-14 15:29:02'),(37,'1021','1','2022-11-08','2022-11-08 06:57:47',1,5,28,'2022-11-14 15:29:02'),(38,'1021','1','2022-11-08','2022-11-08 06:59:04',1,5,28,'2022-11-14 15:29:02'),(39,'1021','1','2022-11-08','2022-11-08 06:59:52',1,5,28,'2022-11-14 15:29:02'),(40,'1021','1','2022-11-08','2022-11-08 07:00:21',1,5,28,'2022-11-14 15:29:02'),(41,'1021','1','2022-11-08','2022-11-08 07:03:11',1,5,28,'2022-11-14 15:29:02'),(42,'1021','1','2022-11-08','2022-11-08 07:06:44',1,5,28,'2022-11-14 15:29:02'),(43,'1021','1','2022-11-08','2022-11-08 07:07:48',1,5,28,'2022-11-14 15:29:02'),(44,'1021','1','2022-11-08','2022-11-08 07:08:36',1,5,28,'2022-11-14 15:29:02'),(45,'1021','1','2022-11-08','2022-11-08 07:11:13',1,5,28,'2022-11-14 15:29:02'),(46,'1021','1','2022-11-08','2022-11-08 07:16:25',1,5,28,'2022-11-14 15:29:02'),(47,'1021','1','2022-11-08','2022-11-08 07:16:55',1,5,28,'2022-11-14 15:29:02'),(48,'1021','1','2022-11-08','2022-11-08 07:18:03',1,5,28,'2022-11-14 15:29:02'),(49,'1021','1','2022-11-08','2022-11-08 07:20:33',1,5,28,'2022-11-14 15:29:02'),(50,'1021','1','2022-11-08','2022-11-08 07:22:09',1,5,28,'2022-11-14 15:29:02'),(51,'1021','1','2022-11-08','2022-11-08 07:23:00',1,5,28,'2022-11-14 15:29:02'),(52,'1021','1','2022-11-08','2022-11-08 07:23:44',1,5,28,'2022-11-14 15:29:02'),(53,'1021','1','2022-11-08','2022-11-08 07:24:37',1,5,28,'2022-11-14 15:29:02'),(54,'1021','1','2022-11-08','2022-11-08 07:25:06',1,5,28,'2022-11-14 15:29:02'),(55,'1021','1','2022-11-08','2022-11-08 07:26:38',1,5,28,'2022-11-14 15:29:02'),(56,'1021','1','2022-11-08','2022-11-08 07:27:36',1,5,28,'2022-11-14 15:29:02'),(57,'1021','1','2022-11-08','2022-11-08 07:28:44',1,5,28,'2022-11-14 15:29:02'),(58,'1057','1','2022-11-08','2022-11-08 07:31:19',1,4,3,'2022-11-14 15:29:02'),(59,'1057','1','2022-11-08','2022-11-08 07:32:39',1,4,3,'2022-11-14 15:29:02'),(60,'1057','1','2022-11-08','2022-11-08 07:33:41',1,4,3,'2022-11-14 15:29:02'),(61,'1057','1','2022-11-08','2022-11-08 07:34:47',1,4,3,'2022-11-14 15:29:02'),(62,'1057','1','2022-11-08','2022-11-08 07:36:01',1,4,3,'2022-11-14 15:29:02'),(63,'1057','1','2022-11-08','2022-11-08 07:39:40',1,4,3,'2022-11-14 15:29:02'),(64,'1057','1','2022-11-08','2022-11-08 08:13:50',1,4,3,'2022-11-14 15:29:02'),(65,'1057','1','2022-11-08','2022-11-08 08:15:33',1,4,3,'2022-11-14 15:29:02'),(66,'1057','1','2022-11-08','2022-11-08 08:17:24',1,4,3,'2022-11-14 15:29:02'),(67,'1057','1','2022-11-08','2022-11-08 08:18:38',1,4,3,'2022-11-14 15:29:02'),(68,'1057','1','2022-11-08','2022-11-08 08:19:24',1,4,3,'2022-11-14 15:29:02'),(69,'1057','1','2022-11-08','2022-11-08 08:20:01',1,4,3,'2022-11-14 15:29:02'),(70,'1069','1','2022-11-08','2022-11-08 08:29:49',1,4,10,'2022-11-14 15:29:02'),(71,'1069','1','2022-11-08','2022-11-08 08:30:49',1,4,10,'2022-11-14 15:29:02'),(72,'1069','1','2022-11-08','2022-11-08 08:31:19',1,4,10,'2022-11-14 15:29:02'),(73,'1072','1','2022-11-09','2022-11-08 23:55:57',1,6,17,'2022-11-14 15:29:02'),(74,'1073','1','2022-11-11','2022-11-11 03:24:51',1,16,21,'2022-11-14 15:29:02'),(75,'1074','1','2022-11-14','2022-11-14 05:39:55',1,13,28,'2022-11-14 15:29:02'),(76,'1074','1','2022-11-14','2022-11-14 05:56:29',1,13,28,'2022-11-14 15:29:02'),(77,'1076','1','2022-11-14','2022-11-14 05:59:02',1,9,18,'2022-11-14 15:29:02'),(81,'1077','1','2022-11-14','2022-11-14 14:51:18',1,4,17,'2022-11-14 15:29:02'),(82,'1073','1','2022-11-14','2022-11-14 22:43:32',1,23,25,'2022-11-14 22:43:32');
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idUsuario` tinyint(4) NOT NULL AUTO_INCREMENT,
  `foto` varchar(45) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `primerApellido` varchar(60) NOT NULL,
  `segundoApellido` varchar(60) NOT NULL,
  `ci` int(11) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `bautizado` varchar(2) NOT NULL,
  `acceso` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `aula` varchar(50) DEFAULT NULL,
  `telefono` int(11) NOT NULL,
  `habilitado` char(1) NOT NULL DEFAULT '3',
  `estado` char(1) NOT NULL DEFAULT '1',
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechaActualizacion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'1.jpg','ruben','alcazar','ajata',4578563,'1997-04-04','Si','aruben','1dc90e80c77fe245a82ea7ed30d1f849','admin',NULL,66594578,'3','1','2022-09-17 04:00:00','2022-09-17 17:02:02'),(2,'2.jpg','juan','perez','achá',4578921,'2000-09-02','Si','pjuan','3b29ba53c507b00a745ca7e2cbfd6acf','directorio',NULL,71458923,'3','1','2022-09-17 04:00:00','2022-09-17 17:02:02'),(3,'3.jpg','pedro','canedo','garcia',1548796,'1992-10-07','Si','cpedro','46bf36a7193438f81fccc9c4bcc8343e','maestro','Parvulos ',65487942,'3','1','2022-09-17 04:00:00','2022-09-17 17:02:02'),(4,'4.jpg','laura','vera','carrasco',1345781,'1997-07-12','Si','vlaura','l123','directorio','Principiantes ',65487912,'2','2','2022-10-08 00:36:02','2022-10-08 00:36:02'),(5,'5.jpg','limbert','cespedes','mendoza',1345785,'2003-07-13','Si','climbert','l123','maestro','Estrellitas ',62653245,'2','1','2022-10-08 01:46:57','2022-10-08 01:46:57'),(6,'6.jpg','daniela','torrico','gonzales',1345785,'1996-06-19','Si','tdaniela','d123','directorio','Cunitas ',65487912,'2','1','2022-10-19 13:45:52','2022-10-19 13:45:52'),(7,'7.jpg','pamela','calle','ramos',1545789,'1994-09-09','Si','','','maestro','Parvulos ',62653245,'5','5','2022-10-19 15:29:56','2022-10-19 15:29:56'),(9,'9.jpg','alex','mamani','cortez',13458923,'1992-07-25','Si','','','maestro','Estrellitas ',66789924,'2','1','2022-10-21 15:58:50','2022-10-21 15:58:50'),(10,'10.jpg','jhon','figueroa','dominguez',8945631,'1995-09-12','Si','','','maestro','Principiantes ',62653245,'2','1','2022-10-21 16:07:01','2022-10-21 16:07:01'),(11,'11.jpg','miguel','lima','gonzales',4578563,'1998-06-26','Si','','','maestro','Mensajeros ',62457813,'2','1','2022-10-24 21:03:43','2022-10-24 21:03:43'),(12,'12.jpg','dayana','franco','cortez',6358948,'1998-10-28','Si','','','maestro','Adolescentes ',65487925,'2','1','2022-10-24 21:11:43','2022-10-24 21:11:43'),(13,'13.jpg','carolina','quena','acha',4578563,'1998-10-22','Si','','','maestro','Mensajeros ',62457813,'2','1','2022-10-24 21:23:43','2022-10-24 21:23:43'),(14,'14.jpg','jenny','pardo','claros',2645872,'1995-04-15','Si','','','maestro','Adolescentes ',65124589,'2','1','2022-10-24 21:26:21','2022-10-24 21:26:21'),(15,'15.jpg','armando','tapia','soto',4589632,'1999-12-12','Si','','','maestro','Cunitas ',64785912,'2','0','2022-10-24 21:29:04','2022-10-24 21:29:04'),(16,'16.jpg','karina','ricaldez','rocha',2356789,'1996-03-15','No','','','maestro','mensajeros ',62653245,'2','1','2022-10-21 15:49:58','2022-10-21 15:49:58'),(17,'17.jpg','vanesa','cayo','romero',13456787,'2001-06-27','No','','','maestro','Parvulos ',65485567,'2','1','2022-10-30 11:33:03','2022-11-06 11:06:04'),(18,'18.jpg','saul','paco','vela',5634782,'2003-03-02','Si','','','maestro','mensajeros ',65678943,'2','1','2022-11-02 06:15:59','2022-11-06 10:54:58'),(19,'19.jpg','jose','chavez','rocha',3456278,'2005-04-12','Si','','','maestro','jóvenes ',67890122,'2','1','2022-11-02 06:23:17','2022-11-11 00:11:16'),(21,'21.jpg','luis','paz','figueroa',4567823,'2002-07-12','Si','','','maestro','mensajeros ',65678943,'2','1','2022-11-02 07:34:41','2022-11-06 11:14:45'),(22,'22.jpg','reynaldo','casano','aspeti',4598120,'2003-07-23','Si','','','maestro','estrellitas ',65678943,'5','5','2022-11-02 20:01:09','2022-11-06 10:51:46'),(23,'23.jpg','david','santibañez','rios',2367901,'2002-09-12','Si','','','maestro','adolescentes ',77349812,'2','1','2022-11-02 20:05:43','2022-11-06 11:23:45'),(24,'24.jpg','ruddy','marca','rivas',18456729,'1994-09-12','Si','','','maestro','adolescentes ',67894321,'5','5','2022-11-05 23:01:56','2022-11-06 10:41:51'),(25,'.jpg','bertha','mendez','aguirre',3452133,'1999-12-12','Si','','','maestro','cunitas',68997732,'3','1','2022-11-06 11:51:33',NULL),(26,'.jpg','sheyla','mollo','arispe',2435643,'2005-07-24','No','','','maestro','estrellitas',65678943,'3','1','2022-11-06 11:55:25',NULL),(27,'.jpg','andres','blanco','condori',5678231,'2000-04-12','Si','','','maestro',' parvulos',79889950,'3','1','2022-11-06 11:58:34',NULL),(28,'.jpg','aracely','campos','tapia',5634782,'1998-01-12','Si','','','maestro','cunitas',67890122,'3','1','2022-11-06 12:07:50',NULL),(29,'1.jpg','willy','villanueva','soto',2334567,'2000-09-09','No','','','maestro',' parvulos',67456789,'3','1','2022-11-06 12:10:47',NULL);
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

-- Dump completed on 2022-11-15 12:36:51

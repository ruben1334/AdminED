-- MySQL dump 10.13  Distrib 5.6.24, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: escueladominical
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.38-MariaDB
CREATE DATABASE escueladominical;
USE escueladominical;

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
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrador` (
  `idAdministrador` tinyint(4) NOT NULL AUTO_INCREMENT,
  `estado` char(1) NOT NULL DEFAULT '1',
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaActualizacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idAdministrador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asistencia`
--

DROP TABLE IF EXISTS `asistencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asistencia` (
  `idAsistencia` int(11) NOT NULL AUTO_INCREMENT,
  `clase` varchar(20) NOT NULL,
  `cantAlumnos` tinyint(4) NOT NULL DEFAULT '0',
  `cantMestrosAula` tinyint(4) NOT NULL DEFAULT '0',
  `fecha` date NOT NULL,
  PRIMARY KEY (`idAsistencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asistencia`
--

LOCK TABLES `asistencia` WRITE;
/*!40000 ALTER TABLE `asistencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `asistencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clase`
--

DROP TABLE IF EXISTS `clase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clase` (
  `idClase` tinyint(4) NOT NULL,
  `nombreClase` varchar(20) NOT NULL,
  `idMaestro` tinyint(4) NOT NULL,
  `idEstudiante` tinyint(4) NOT NULL,
  PRIMARY KEY (`idClase`),
  KEY `fk_Clase_Maestro1_idx` (`idMaestro`),
  KEY `fk_Clase_Estudiante1_idx` (`idEstudiante`),
  CONSTRAINT `fk_Clase_Estudiante1` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiante` (`idEstudiante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Clase_Maestro1` FOREIGN KEY (`idMaestro`) REFERENCES `maestro` (`idMaestro`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clase`
--

LOCK TABLES `clase` WRITE;
/*!40000 ALTER TABLE `clase` DISABLE KEYS */;
/*!40000 ALTER TABLE `clase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compra`
--

DROP TABLE IF EXISTS `compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compra` (
  `idCompra` int(11) NOT NULL,
  `detalleCompra` varchar(100) NOT NULL,
  `cantidad` smallint(6) NOT NULL,
  `fechaCompra` date NOT NULL,
  `idDirectorio` tinyint(4) NOT NULL,
  `idMateriales` tinyint(4) NOT NULL,
  PRIMARY KEY (`idCompra`),
  KEY `fk_Compra_Direcctorio1_idx` (`idDirectorio`),
  KEY `fk_Compra_Materiales1_idx` (`idMateriales`),
  CONSTRAINT `fk_Compra_Direcctorio1` FOREIGN KEY (`idDirectorio`) REFERENCES `direcctorio` (`idDirectorio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Compra_Materiales1` FOREIGN KEY (`idMateriales`) REFERENCES `material` (`idMateriales`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
-- Table structure for table `direcctorio`
--

DROP TABLE IF EXISTS `direcctorio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `direcctorio` (
  `idDirectorio` tinyint(4) NOT NULL AUTO_INCREMENT,
  `foto` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) NOT NULL,
  `primerApellido` varchar(45) NOT NULL,
  `segundoApellido` varchar(45) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `bautizado` varchar(4) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaActualizacion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idDirectorio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direcctorio`
--

LOCK TABLES `direcctorio` WRITE;
/*!40000 ALTER TABLE `direcctorio` DISABLE KEYS */;
/*!40000 ALTER TABLE `direcctorio` ENABLE KEYS */;
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
  `nombre` varchar(45) NOT NULL,
  `primerApellido` varchar(45) NOT NULL,
  `segundoApellido` varchar(45) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `bautizado` varchar(4) NOT NULL,
  `padres` varchar(300) NOT NULL,
  `NumeroReferencia` int(11) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaActualizacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idEstudiante`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiante`
--

LOCK TABLES `estudiante` WRITE;
/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
INSERT INTO `estudiante` VALUES (1,'','ruben','alcazar','ajata','1999-02-01','Si','pedro alcazar',77445932,'1','2022-09-08 20:03:28','2022-09-08 20:03:28');
/*!40000 ALTER TABLE `estudiante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maestro`
--

DROP TABLE IF EXISTS `maestro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maestro` (
  `idMaestro` tinyint(4) NOT NULL AUTO_INCREMENT,
  `foto` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `primerApellido` varchar(45) NOT NULL,
  `segundoApellido` varchar(45) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `bautizado` varchar(4) NOT NULL,
  `estado` char(2) NOT NULL DEFAULT '1',
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaActualizacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idMaestro`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maestro`
--

LOCK TABLES `maestro` WRITE;
/*!40000 ALTER TABLE `maestro` DISABLE KEYS */;
INSERT INTO `maestro` VALUES (1,'','ruben','alcazar','ajata','1996-05-05','Si','1','2022-09-08 20:06:15','2022-09-08 20:06:15');
/*!40000 ALTER TABLE `maestro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material`
--

DROP TABLE IF EXISTS `material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material` (
  `idMateriales` tinyint(4) NOT NULL AUTO_INCREMENT,
  `tipoMaterial` varchar(100) NOT NULL,
  `stock` smallint(6) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaActualizacion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idMateriales`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material`
--

LOCK TABLES `material` WRITE;
/*!40000 ALTER TABLE `material` DISABLE KEYS */;
/*!40000 ALTER TABLE `material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nuevo`
--

DROP TABLE IF EXISTS `nuevo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nuevo` (
  `idOfrendas` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` tinyint(4) DEFAULT NULL,
  `clase` varchar(30) DEFAULT NULL,
  `fechaRecojo` datetime DEFAULT NULL,
  PRIMARY KEY (`idOfrendas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nuevo`
--

LOCK TABLES `nuevo` WRITE;
/*!40000 ALTER TABLE `nuevo` DISABLE KEYS */;
/*!40000 ALTER TABLE `nuevo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ofrenda`
--

DROP TABLE IF EXISTS `ofrenda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ofrenda` (
  `idOfrendas` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` tinyint(4) NOT NULL,
  `clase` varchar(30) NOT NULL,
  `fechaRecojo` datetime NOT NULL,
  PRIMARY KEY (`idOfrendas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ofrenda`
--

LOCK TABLES `ofrenda` WRITE;
/*!40000 ALTER TABLE `ofrenda` DISABLE KEYS */;
/*!40000 ALTER TABLE `ofrenda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permiso`
--

DROP TABLE IF EXISTS `permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permiso` (
  `idPermiso` tinyint(4) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `idDirectorio` tinyint(4) NOT NULL,
  `idAdministrador` tinyint(4) NOT NULL,
  `idMaestro` tinyint(4) NOT NULL,
  PRIMARY KEY (`idPermiso`),
  KEY `fk_Administrador_has_Direcctorio_Administrador_idx` (`idPermiso`),
  KEY `fk_permisosadministrador_direcctorio1_idx` (`idDirectorio`),
  KEY `fk_permisosadministrador_administrador1_idx` (`idAdministrador`),
  KEY `fk_permisos_maestro1_idx` (`idMaestro`),
  CONSTRAINT `fk_permisos_maestro1` FOREIGN KEY (`idMaestro`) REFERENCES `maestro` (`idMaestro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_permisosadministrador_administrador1` FOREIGN KEY (`idAdministrador`) REFERENCES `administrador` (`idAdministrador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_permisosadministrador_direcctorio1` FOREIGN KEY (`idDirectorio`) REFERENCES `direcctorio` (`idDirectorio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permiso`
--

LOCK TABLES `permiso` WRITE;
/*!40000 ALTER TABLE `permiso` DISABLE KEYS */;
/*!40000 ALTER TABLE `permiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salida`
--

DROP TABLE IF EXISTS `salida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salida` (
  `idSalida` mediumint(9) NOT NULL,
  `fecha` datetime NOT NULL,
  `idMaestro` tinyint(4) NOT NULL,
  PRIMARY KEY (`idSalida`),
  KEY `fk_Salida_Maestro1_idx` (`idMaestro`),
  CONSTRAINT `fk_Salida_Maestro1` FOREIGN KEY (`idMaestro`) REFERENCES `maestro` (`idMaestro`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salida`
--

LOCK TABLES `salida` WRITE;
/*!40000 ALTER TABLE `salida` DISABLE KEYS */;
/*!40000 ALTER TABLE `salida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salidadetalle`
--

DROP TABLE IF EXISTS `salidadetalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salidadetalle` (
  `idMateriales` tinyint(4) NOT NULL,
  `idSalida` mediumint(9) NOT NULL,
  `cantidad` tinyint(4) NOT NULL,
  PRIMARY KEY (`idMateriales`,`idSalida`),
  KEY `fk_Maestro_has_Materiales_Materiales1_idx` (`idMateriales`),
  KEY `fk_SalidaDetalle_Salida1_idx` (`idSalida`),
  CONSTRAINT `fk_Maestro_has_Materiales_Materiales1` FOREIGN KEY (`idMateriales`) REFERENCES `material` (`idMateriales`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_SalidaDetalle_Salida1` FOREIGN KEY (`idSalida`) REFERENCES `salida` (`idSalida`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salidadetalle`
--

LOCK TABLES `salidadetalle` WRITE;
/*!40000 ALTER TABLE `salidadetalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `salidadetalle` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-08 17:24:36

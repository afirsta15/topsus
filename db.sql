-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: topsus_frs
-- ------------------------------------------------------
-- Server version	5.7.17

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
-- Table structure for table `frs_dosen`
--

DROP TABLE IF EXISTS `frs_dosen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `frs_dosen` (
  `id_dosen` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(20) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_edit` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_dosen`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frs_dosen`
--

LOCK TABLES `frs_dosen` WRITE;
/*!40000 ALTER TABLE `frs_dosen` DISABLE KEYS */;
INSERT INTO `frs_dosen` VALUES (1,'1988010120070101001','Pak A','Surabaya',1,0),(2,'111111111','Pak B','Surabaya',1,0),(3,'','','',0,0);
/*!40000 ALTER TABLE `frs_dosen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `frs_frs_mhs`
--

DROP TABLE IF EXISTS `frs_frs_mhs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `frs_frs_mhs` (
  `id_frs` int(11) NOT NULL AUTO_INCREMENT,
  `id_tajar` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `id_matkul` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_edit` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_frs`),
  KEY `id_tajar` (`id_tajar`),
  KEY `id_mhs` (`id_mhs`),
  KEY `id_matkul` (`id_matkul`),
  CONSTRAINT `frs_frs_mhs_ibfk_1` FOREIGN KEY (`id_tajar`) REFERENCES `frs_tajar` (`id_tajar`),
  CONSTRAINT `frs_frs_mhs_ibfk_2` FOREIGN KEY (`id_mhs`) REFERENCES `frs_mahasiswa` (`id_mhs`),
  CONSTRAINT `frs_frs_mhs_ibfk_3` FOREIGN KEY (`id_matkul`) REFERENCES `frs_matkul` (`id_matkul`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frs_frs_mhs`
--

LOCK TABLES `frs_frs_mhs` WRITE;
/*!40000 ALTER TABLE `frs_frs_mhs` DISABLE KEYS */;
INSERT INTO `frs_frs_mhs` VALUES (5,1,1,1,1,0),(6,4,1,3,1,0),(7,4,3,1,1,0),(8,4,3,3,1,0),(9,4,1,3,1,0);
/*!40000 ALTER TABLE `frs_frs_mhs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `frs_kurikulum`
--

DROP TABLE IF EXISTS `frs_kurikulum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `frs_kurikulum` (
  `id_kurikulum` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kurikulum` varchar(50) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `is_edit` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_kurikulum`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frs_kurikulum`
--

LOCK TABLES `frs_kurikulum` WRITE;
/*!40000 ALTER TABLE `frs_kurikulum` DISABLE KEYS */;
INSERT INTO `frs_kurikulum` VALUES (1,'KUR-20082012',0,0),(2,'KUR-20122016',1,0),(3,'KUR-20162020',0,0);
/*!40000 ALTER TABLE `frs_kurikulum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `frs_mahasiswa`
--

DROP TABLE IF EXISTS `frs_mahasiswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `frs_mahasiswa` (
  `id_mhs` int(11) NOT NULL AUTO_INCREMENT,
  `nrp` varchar(10) NOT NULL,
  `nama_mhs` varchar(50) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `dosen_wali` varchar(50) NOT NULL,
  `spp` varchar(100) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_edit` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_mhs`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frs_mahasiswa`
--

LOCK TABLES `frs_mahasiswa` WRITE;
/*!40000 ALTER TABLE `frs_mahasiswa` DISABLE KEYS */;
INSERT INTO `frs_mahasiswa` VALUES (1,'2215205001','Mhs B','Surabaya','2017-03-20','Surabaya','Pak A','1000',1,0),(2,'2215205002','Mhs C','Surabaya','2017-04-12','Surabaya','Pak B','1000',1,0),(3,'003','Mhs 4','Surabaya','1998-06-24','Surabaya','Pak A','1000',1,0),(4,'','','','2018-01-15','','Pak A','',0,0);
/*!40000 ALTER TABLE `frs_mahasiswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `frs_matkul`
--

DROP TABLE IF EXISTS `frs_matkul`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `frs_matkul` (
  `id_matkul` int(11) NOT NULL AUTO_INCREMENT,
  `kode_matkul` varchar(4) NOT NULL,
  `nama_matkul` varchar(50) NOT NULL,
  `jml_sks` int(11) NOT NULL,
  `id_kurikulum` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_edit` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_matkul`),
  KEY `id_kurikulum` (`id_kurikulum`),
  CONSTRAINT `frs_matkul_ibfk_1` FOREIGN KEY (`id_kurikulum`) REFERENCES `frs_kurikulum` (`id_kurikulum`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frs_matkul`
--

LOCK TABLES `frs_matkul` WRITE;
/*!40000 ALTER TABLE `frs_matkul` DISABLE KEYS */;
INSERT INTO `frs_matkul` VALUES (1,'TE01','Basis Data',4,1,1,0),(3,'TE01','Manajemen Basis Data',4,2,1,0);
/*!40000 ALTER TABLE `frs_matkul` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `frs_matrikulasi`
--

DROP TABLE IF EXISTS `frs_matrikulasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `frs_matrikulasi` (
  `id_matrikulasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_matkul_old` int(11) NOT NULL,
  `id_matkul_new` int(11) NOT NULL,
  PRIMARY KEY (`id_matrikulasi`),
  KEY `id_matkul_old` (`id_matkul_old`),
  KEY `id_matkul_new` (`id_matkul_new`),
  CONSTRAINT `frs_matrikulasi_ibfk_1` FOREIGN KEY (`id_matkul_old`) REFERENCES `frs_matkul` (`id_matkul`),
  CONSTRAINT `frs_matrikulasi_ibfk_2` FOREIGN KEY (`id_matkul_new`) REFERENCES `frs_matkul` (`id_matkul`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frs_matrikulasi`
--

LOCK TABLES `frs_matrikulasi` WRITE;
/*!40000 ALTER TABLE `frs_matrikulasi` DISABLE KEYS */;
INSERT INTO `frs_matrikulasi` VALUES (1,1,3);
/*!40000 ALTER TABLE `frs_matrikulasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `frs_tajar`
--

DROP TABLE IF EXISTS `frs_tajar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `frs_tajar` (
  `id_tajar` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tajar` varchar(6) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `is_edit` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_tajar`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frs_tajar`
--

LOCK TABLES `frs_tajar` WRITE;
/*!40000 ALTER TABLE `frs_tajar` DISABLE KEYS */;
INSERT INTO `frs_tajar` VALUES (1,'GS2015',0,0),(2,'GN2015',0,0),(3,'GS2016',0,0),(4,'GN2016',1,0),(5,'GS2017',0,0),(6,'GN2017',0,0),(7,'GS2018',0,0),(8,'GN2018',0,0),(9,'GS2019',0,0),(10,'GN2019',0,0);
/*!40000 ALTER TABLE `frs_tajar` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-19 19:01:54

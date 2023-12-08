-- MySQL dump 10.13  Distrib 5.7.12, for Win32 (AMD64)
--
-- Host: localhost    Database: clementina_tcc
-- ------------------------------------------------------
-- Server version	5.7.20-log

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
-- Table structure for table `aluno`
--

DROP TABLE IF EXISTS `aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aluno` (
  `cod_cad_aluno` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `data_nasc` date NOT NULL,
  `sexo` enum('masculino','feminino') NOT NULL,
  `estado` varchar(200) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `rua` varchar(200) NOT NULL,
  `numero` varchar(4) NOT NULL,
  PRIMARY KEY (`cod_cad_aluno`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aluno`
--

LOCK TABLES `aluno` WRITE;
/*!40000 ALTER TABLE `aluno` DISABLE KEYS */;
INSERT INTO `aluno` VALUES (1,'Gustavo Moreira','2002-02-04','masculino','SC','Porto União','Centro','Felipe Schimid','375'),(4,'Victor Tidre','2002-02-04','masculino','SC','Porto União','Centro','Felipe Schimid','375'),(5,'Leu saturi','2002-02-04','masculino','PR','União da Vitória','Centro','abc','124'),(6,'Roger Gotinho','2018-10-01','masculino','AC','Rio Branco','Centro','virso','1234'),(15,'Carlos Eduardo','2000-12-12','masculino','PA','paaaa','apapap','asdkaskd','123'),(16,'José pega no meu ','2018-10-18','masculino','SC','Porto União','Centro','Jolson santana','1111'),(17,'gustavoooooooooooooooo','2002-02-04','masculino','SC','Porto União','asd','fasf','1015'),(18,'teste1','1990-02-02','masculino','SC','Porto União','Centro','Dom Pedro 2','1015'),(19,'teste2','1999-11-11','masculino','AM','asdasd','Centro','skamf','123'),(20,'teste3','1999-02-25','masculino','SC','Porto União','asfas','Felipe Schimid','375'),(21,'Leonard Gomes Filho','1988-01-19','masculino','SC','Porto União','Cidade nova','agenor de paulo bueno','44'),(22,'Thelemaco','2018-11-03','masculino','PR','União da Vitória','Rocio','lala','1');
/*!40000 ALTER TABLE `aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aluno_turma`
--

DROP TABLE IF EXISTS `aluno_turma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aluno_turma` (
  `cod_aluno_turma` int(11) NOT NULL AUTO_INCREMENT,
  `aluno` int(11) NOT NULL,
  `turma` int(11) NOT NULL,
  PRIMARY KEY (`cod_aluno_turma`),
  KEY `fk_turma_aluno_idx` (`aluno`),
  KEY `fk_aluno_turma_idx` (`turma`),
  CONSTRAINT `fk_aluno_turma` FOREIGN KEY (`turma`) REFERENCES `turma` (`cod_turma`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_turma_aluno` FOREIGN KEY (`aluno`) REFERENCES `aluno` (`cod_cad_aluno`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aluno_turma`
--

LOCK TABLES `aluno_turma` WRITE;
/*!40000 ALTER TABLE `aluno_turma` DISABLE KEYS */;
INSERT INTO `aluno_turma` VALUES (3,4,2),(11,6,1),(15,18,5),(27,22,18),(30,1,2);
/*!40000 ALTER TABLE `aluno_turma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensagem`
--

DROP TABLE IF EXISTS `mensagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mensagem` (
  `cod_mensagem` int(11) NOT NULL AUTO_INCREMENT,
  `destinatario` int(11) NOT NULL,
  `remetente` int(11) NOT NULL,
  `mensagem` text NOT NULL,
  `data` datetime NOT NULL,
  `professor_cod_professor` int(11) NOT NULL,
  `responsavel_cod_responsavel` int(11) NOT NULL,
  `visualizado` enum('sim','nao') DEFAULT 'nao',
  `tipo` enum('P','R') NOT NULL DEFAULT 'P',
  PRIMARY KEY (`cod_mensagem`),
  KEY `fk_mensagem_professor1_idx` (`professor_cod_professor`),
  KEY `fk_mensagem_responsavel1_idx` (`responsavel_cod_responsavel`),
  CONSTRAINT `fk_mensagem_professor1` FOREIGN KEY (`professor_cod_professor`) REFERENCES `professor` (`cod_professor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_mensagem_responsavel1` FOREIGN KEY (`responsavel_cod_responsavel`) REFERENCES `responsavel` (`cod_responsavel`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensagem`
--

LOCK TABLES `mensagem` WRITE;
/*!40000 ALTER TABLE `mensagem` DISABLE KEYS */;
INSERT INTO `mensagem` VALUES (1,2,2,'sadasf','2002-12-12 00:00:00',2,2,'nao','P'),(2,2,2,'Olá','2018-10-30 14:01:37',2,2,'nao','R'),(3,2,2,'Olá','2018-10-30 14:46:48',2,2,'nao','P'),(4,2,2,'Olá','2018-10-30 14:46:53',2,2,'nao','P'),(5,2,2,'yfytfyfytftyf','2018-10-30 14:50:02',2,2,'nao','P'),(6,2,2,'yfytfyfytftyfkkkkkkkkkk','2018-10-30 14:50:12',2,2,'nao','P'),(9,2,2,'aaaa','2018-10-30 14:59:38',2,2,'nao','P'),(10,3,2,'olá','2018-10-31 13:47:09',2,3,'nao','P'),(11,2,3,'Olá','2018-10-31 14:16:45',2,3,'nao','P'),(12,2,3,'Olá','2018-10-31 14:16:47',2,3,'nao','P'),(13,2,3,'Oi','2018-10-31 14:17:04',2,3,'nao','P'),(14,2,3,'bananinha','2018-10-31 14:18:02',2,3,'nao','R'),(15,1,2,'Olá','2018-11-04 22:35:54',1,2,'nao','R'),(16,3,2,'Olá','2018-11-05 16:07:13',3,2,'nao','R'),(17,2,3,'Olá','2018-11-05 16:07:26',3,2,'nao','P'),(18,3,2,'Tudo bem?','2018-11-05 16:07:43',3,2,'nao','R'),(19,1,2,'afasfas','2018-11-13 14:32:49',1,2,'nao','R'),(20,1,2,'afasfas','2018-11-13 14:36:50',1,2,'nao','R'),(21,1,2,'afasfas','2018-11-13 14:36:58',1,2,'nao','R'),(22,1,2,'afasga','2018-11-13 14:42:14',1,2,'nao','R'),(23,1,2,'afasga','2018-11-13 14:42:20',1,2,'nao','R'),(24,1,2,'afasga','2018-11-13 14:42:21',1,2,'nao','R'),(25,1,2,'afasga','2018-11-13 14:42:28',1,2,'nao','R'),(26,2,2,'afasf','2018-11-13 14:55:23',2,2,'nao','R'),(27,2,2,'afasf','2018-11-13 14:55:24',2,2,'nao','R'),(28,2,2,'afasf','2018-11-13 14:55:24',2,2,'nao','R'),(29,2,2,'afasf','2018-11-13 14:55:25',2,2,'nao','R'),(30,2,2,'afasf','2018-11-13 14:55:25',2,2,'nao','R'),(31,2,2,'afasf','2018-11-13 14:55:25',2,2,'nao','R'),(32,2,2,'asdasdasd','2018-11-13 15:12:01',2,2,'nao','R'),(33,2,2,'ashdaoshdaiosdh','2018-11-13 15:37:19',2,2,'nao','R'),(34,2,2,'ashdaoshdaiosdh','2018-11-13 15:39:03',2,2,'nao','R'),(35,2,2,'ashdaoshdaiosdh','2018-11-13 15:40:10',2,2,'nao','R'),(36,2,2,'ashdaoshdaiosdh','2018-11-13 15:41:09',2,2,'nao','R'),(37,2,2,'ashdaoshdaiosdh','2018-11-13 15:41:19',2,2,'nao','R'),(38,3,2,'ashdaoshdaiosdh','2018-11-13 15:41:52',3,2,'nao','R'),(39,3,2,'ashdaoshdaiosdh','2018-11-13 15:42:15',3,2,'nao','R'),(40,3,2,'ashdaoshdaiosdh','2018-11-13 15:43:02',3,2,'nao','R'),(41,2,2,'','2018-11-13 15:46:14',2,2,'nao','R'),(42,2,2,'asdasd','2018-11-13 15:46:24',2,2,'nao','R'),(43,2,2,'Olá','2018-11-13 15:47:09',2,2,'nao','R'),(44,2,2,'ola thresh deitei','2018-11-13 15:49:59',2,2,'nao','R'),(45,2,2,'ola  thresh ddeitei 2','2018-11-13 15:50:41',2,2,'nao','R'),(46,2,2,'sadasdasdasd','2018-11-13 15:50:57',2,2,'nao','R'),(48,2,2,'saasdadasdasd','2018-11-13 15:51:06',2,2,'nao','R'),(49,2,2,'deitei','2018-11-13 15:51:11',2,2,'nao','R'),(50,2,2,'fasfas','2018-11-13 15:52:10',2,2,'nao','R'),(51,2,2,'a','2018-11-13 21:17:50',2,2,'nao','R'),(52,2,2,'b','2018-11-13 21:17:57',2,2,'nao','R'),(53,1,2,'saaaa','2018-11-13 21:22:51',1,2,'nao','R'),(54,2,1,'aaaa','2018-11-13 21:30:22',1,2,'nao','P'),(55,2,1,'aaaa','2018-11-13 21:30:29',1,2,'nao','P'),(56,2,1,'asdas','2018-11-13 21:30:43',1,2,'nao','P'),(57,2,1,'safasf','2018-11-13 21:30:56',1,2,'nao','P'),(58,1,2,'asdasd','2018-11-13 21:31:19',1,2,'nao','R'),(59,1,2,'asdasd','2018-11-13 21:31:29',1,2,'nao','R'),(60,1,2,'asdasd','2018-11-13 21:31:33',1,2,'nao','R'),(61,1,2,'a','2018-11-17 20:23:44',1,2,'nao','R'),(62,1,2,'a','2018-11-17 20:23:51',1,2,'nao','R'),(63,1,2,'b','2018-11-17 20:23:55',1,2,'nao','R'),(64,1,2,'c','2018-11-17 20:24:00',1,2,'nao','R'),(65,3,2,'s','2018-11-17 20:24:09',3,2,'nao','R'),(66,3,2,'c','2018-11-17 20:24:10',3,2,'nao','R'),(67,2,1,'a','2018-11-17 20:24:47',1,2,'nao','P'),(68,2,1,'b','2018-11-17 20:26:45',1,2,'nao','P'),(69,2,1,'a','2018-11-17 20:26:51',1,2,'nao','P'),(70,2,1,'b','2018-11-17 20:26:52',1,2,'nao','P'),(71,2,1,'c','2018-11-17 20:26:53',1,2,'nao','P'),(72,2,1,'gustavo','2018-11-17 20:27:02',1,2,'nao','P'),(73,2,1,'aaaa','2018-11-17 20:27:31',1,2,'nao','P'),(74,2,1,'bbbbb','2018-11-17 20:27:34',1,2,'nao','P'),(75,2,2,'aaaa','2018-11-17 20:27:47',2,2,'nao','R'),(76,2,2,'bbbb','2018-11-17 20:27:50',2,2,'nao','R'),(77,2,2,'cccc','2018-11-17 20:27:52',2,2,'nao','R'),(78,2,2,'dddd','2018-11-17 20:28:09',2,2,'nao','R'),(79,2,2,'eeee','2018-11-17 20:28:12',2,2,'nao','R'),(80,17,9,'Olá','2018-11-19 13:56:01',9,17,'nao','P'),(81,17,9,'Tudo bem?','2018-11-19 13:56:10',9,17,'nao','P'),(82,9,17,'Olá meu Consagrado','2018-11-19 13:57:09',9,17,'nao','R'),(83,9,17,'Tudo','2018-11-19 13:57:20',9,17,'nao','R'),(84,6,2,'aaaa','2018-11-20 02:00:51',6,2,'nao','R'),(85,6,2,'bbb','2018-11-20 02:01:03',6,2,'nao','R'),(86,2,6,'ccc','2018-11-20 02:01:26',6,2,'nao','P'),(87,3,6,'aaa','2018-11-20 02:01:35',6,3,'nao','P'),(88,6,3,'bbb','2018-11-20 02:01:50',6,3,'nao','R'),(89,3,6,'ccc','2018-11-20 02:02:07',6,3,'nao','P'),(90,3,6,'','2018-11-20 02:02:08',6,3,'nao','P'),(91,10,18,'oi','2018-11-20 17:03:48',10,18,'nao','R'),(92,18,10,'oi','2018-11-20 17:04:02',10,18,'nao','P'),(93,18,10,'','2018-11-20 17:04:03',10,18,'nao','P');
/*!40000 ALTER TABLE `mensagem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `mensagem_nome`
--

DROP TABLE IF EXISTS `mensagem_nome`;
/*!50001 DROP VIEW IF EXISTS `mensagem_nome`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `mensagem_nome` AS SELECT 
 1 AS `nome`,
 1 AS `cod_responsavel`,
 1 AS `nome_professor`,
 1 AS `cod_professor`,
 1 AS `cod_mensagem`,
 1 AS `destinatario`,
 1 AS `remetente`,
 1 AS `mensagem`,
 1 AS `professor_cod_professor`,
 1 AS `data`,
 1 AS `responsavel_cod_responsavel`,
 1 AS `visualizado`,
 1 AS `tipo`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `numero_aluno`
--

DROP TABLE IF EXISTS `numero_aluno`;
/*!50001 DROP VIEW IF EXISTS `numero_aluno`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `numero_aluno` AS SELECT 
 1 AS `alunos`,
 1 AS `nome`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `parecer`
--

DROP TABLE IF EXISTS `parecer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parecer` (
  `cod_parecer` int(11) NOT NULL AUTO_INCREMENT,
  `texto` text NOT NULL,
  `aluno_cod_cad_aluno` int(11) NOT NULL,
  `professor_cod_professor` int(11) NOT NULL,
  `bimestre` enum('1','2','3','4') NOT NULL,
  `visualizado` enum('sim','não') NOT NULL DEFAULT 'não',
  `turma` int(11) NOT NULL,
  PRIMARY KEY (`cod_parecer`),
  KEY `fk_parecer_aluno1_idx` (`aluno_cod_cad_aluno`),
  KEY `fk_parecer_professor1_idx` (`professor_cod_professor`),
  KEY `fk_turma_aluno_idx` (`turma`),
  CONSTRAINT `fk_parecer_aluno1` FOREIGN KEY (`aluno_cod_cad_aluno`) REFERENCES `aluno` (`cod_cad_aluno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_parecer_professor1` FOREIGN KEY (`professor_cod_professor`) REFERENCES `professor` (`cod_professor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_parecer_turmaparecer` FOREIGN KEY (`turma`) REFERENCES `turma` (`cod_turma`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parecer`
--

LOCK TABLES `parecer` WRITE;
/*!40000 ALTER TABLE `parecer` DISABLE KEYS */;
INSERT INTO `parecer` VALUES (16,'Gustavo 1º bimestre',1,1,'1','não',2),(17,'Gustavo 2º bimestre',1,1,'2','não',2),(19,'Gustavo Moreira 3º Bimestre',1,1,'3','não',2),(20,'Teu filho é chato',21,9,'2','não',17),(21,'NOta 10!',22,10,'1','não',18);
/*!40000 ALTER TABLE `parecer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professor`
--

DROP TABLE IF EXISTS `professor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `professor` (
  `cod_professor` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `data_nasc` date NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(9) NOT NULL,
  `estado` varchar(200) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `rua` varchar(200) NOT NULL,
  `numero` varchar(4) NOT NULL,
  `login_primeira` varchar(45) DEFAULT '1',
  `email` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`cod_professor`),
  UNIQUE KEY `usuario_UNIQUE` (`usuario`),
  UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  UNIQUE KEY `rg_UNIQUE` (`rg`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professor`
--

LOCK TABLES `professor` WRITE;
/*!40000 ALTER TABLE `professor` DISABLE KEYS */;
INSERT INTO `professor` VALUES (1,'Victor Tigre','victor','81dc9bdb52d04dc20036dbd8313ed055','2002-01-17','(42) 8854-5353','99999999999999','999999999','SC','asd','asd','999999999999','123','2','asgwege@gmail.com'),(2,'aaaa','a','202cb962ac59075b964b07152d234b70','2002-02-02','4124124','214124','12412','sc','as','as','14221','1231','2','asfqf@gmail.com'),(3,'Juju Meiota','juju','202cb962ac59075b964b07152d234b70','2000-12-12','42999999999999','1248120948','412412515','Sc','safmaçs','asfmasklfm','afasfas','123','2','asdas@gmail.com'),(6,'Daniel Paladino','daniel','81dc9bdb52d04dc20036dbd8313ed055','2000-03-03','(12) 8412-94810','098.124.812-40','412-04821','PR','asfasf','xzfasf','Dom Pedro 2','123','2','ashash@gmail.com'),(9,'dudu','dudu','e10adc3949ba59abbe56e057f20f883e','1990-02-20','(12) 4091-84092','098.912.804-90','098410928','SC','asf','asfas','asf','23','2','gusmoreira02@gmail.com'),(10,'Godofredo','godo','81dc9bdb52d04dc20036dbd8313ed055','1980-11-11','(42) 8126-81265','333.333.333-33','00932','SC','União da Vitória','Santa rosa','da Fé','333','2','godo@gmail.com');
/*!40000 ALTER TABLE `professor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `professor_responsavel`
--

DROP TABLE IF EXISTS `professor_responsavel`;
/*!50001 DROP VIEW IF EXISTS `professor_responsavel`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `professor_responsavel` AS SELECT 
 1 AS `cod_professor`,
 1 AS `nome`,
 1 AS `cod_responsavel`,
 1 AS `nome_responsavel`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `relatorio_aluno`
--

DROP TABLE IF EXISTS `relatorio_aluno`;
/*!50001 DROP VIEW IF EXISTS `relatorio_aluno`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `relatorio_aluno` AS SELECT 
 1 AS `cod_cad_aluno`,
 1 AS `nome`,
 1 AS `data_nasc`,
 1 AS `sexo`,
 1 AS `estado`,
 1 AS `cidade`,
 1 AS `bairro`,
 1 AS `rua`,
 1 AS `numero`,
 1 AS `cod_responsavel`,
 1 AS `nome_responsavel`,
 1 AS `email`,
 1 AS `rg`,
 1 AS `cpf`,
 1 AS `grau_parentesco`,
 1 AS `aluno_cod_cad_aluno`,
 1 AS `responsavel_cod_responsavel`,
 1 AS `cod_responsavel_aluno`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `relatorio_responsavel`
--

DROP TABLE IF EXISTS `relatorio_responsavel`;
/*!50001 DROP VIEW IF EXISTS `relatorio_responsavel`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `relatorio_responsavel` AS SELECT 
 1 AS `cod_responsvel`,
 1 AS `nome_aluno`,
 1 AS `estado`,
 1 AS `cidade`,
 1 AS `bairro`,
 1 AS `rua`,
 1 AS `numero`,
 1 AS `nome`,
 1 AS `data_nasc`,
 1 AS `rg`,
 1 AS `cpf`,
 1 AS `telefone`,
 1 AS `grau_parentesco`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `relatorio_turma`
--

DROP TABLE IF EXISTS `relatorio_turma`;
/*!50001 DROP VIEW IF EXISTS `relatorio_turma`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `relatorio_turma` AS SELECT 
 1 AS `cod_turma`,
 1 AS `nome`,
 1 AS `ano`,
 1 AS `cod_turma_professor`,
 1 AS `turma`,
 1 AS `professor`,
 1 AS `horario`,
 1 AS `cod_professor`,
 1 AS `nome_professor`,
 1 AS `cod_aluno_turma`,
 1 AS `aluno`,
 1 AS `cod_cad_aluno`,
 1 AS `nome_aluno`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `responsavel`
--

DROP TABLE IF EXISTS `responsavel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `responsavel` (
  `cod_responsavel` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `data_nasc` date NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(12) NOT NULL,
  `login_primeira` tinyint(4) DEFAULT '1',
  `email` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`cod_responsavel`),
  UNIQUE KEY `usuario_UNIQUE` (`usuario`),
  UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  UNIQUE KEY `rg_UNIQUE` (`rg`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `responsavel`
--

LOCK TABLES `responsavel` WRITE;
/*!40000 ALTER TABLE `responsavel` DISABLE KEYS */;
INSERT INTO `responsavel` VALUES (2,'Leonardo Sarturi','leo','202cb962ac59075b964b07152d234b70','1990-12-12','(42) 8847-6103','99999999999999','999999998',2,'eee@gmail.com'),(3,'Luiz Henning','luiz','202cb962ac59075b964b07152d234b70','1990-12-12','4120491','12498120948','12412412',2,'ddd@gmail.com'),(10,'joao lotek','lotek','67a74306b06d0c01624fe0d0249a570f4d093747','1999-12-19','1239120902490','01294012940912','090129401',1,'ccc@gmail.com'),(11,'ricardo','ricardinho','202cb962ac59075b964b07152d234b70','2018-12-31','(42) 3523-3401','078.270.519-79','999999999',2,'bbb@gmail.com'),(15,'Daniel Paladino','daniel','e10adc3949ba59abbe56e057f20f883e','2000-03-03','(12) 3812-09481','012.841.848-12','124812812',2,'aaa@gmail.com'),(16,'Gustavoooooooooooooooooooo','gustavo','81dc9bdb52d04dc20036dbd8313ed055','2002-02-04','(42) 9999-11980','102.940.128-40','12058-120',1,'col.gustavo.moreira@uniuv.edu.br'),(17,'Leonard Gomes Pai','leo66','827ccb0eea8a706c4c34a16891f84e7b','1933-11-19','(42) 8866-5700','238.057.927-20','0958-2385',2,'utergames@gmail.com'),(18,'Telemaco neto','tele','81dc9bdb52d04dc20036dbd8313ed055','1970-11-03','(99) 9999-99999','676.767.676-76','00932',2,'prof.sergio.guill@uniuv.edu.br');
/*!40000 ALTER TABLE `responsavel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `responsavel_has_aluno`
--

DROP TABLE IF EXISTS `responsavel_has_aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `responsavel_has_aluno` (
  `cod_responsavel_aluno` int(11) NOT NULL AUTO_INCREMENT,
  `responsavel_cod_responsavel` int(11) NOT NULL,
  `aluno_cod_cad_aluno` int(11) NOT NULL,
  `grau_parentesco` enum('pai','mãe','tio','avô','padrinho','tia','madrinha') NOT NULL,
  PRIMARY KEY (`cod_responsavel_aluno`),
  KEY `fk_responsavel_has_aluno_aluno1_idx` (`aluno_cod_cad_aluno`),
  KEY `fk_responsavel_has_aluno_responsavel_idx` (`responsavel_cod_responsavel`),
  CONSTRAINT `fk_responsavel_has_aluno_aluno1` FOREIGN KEY (`aluno_cod_cad_aluno`) REFERENCES `aluno` (`cod_cad_aluno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_responsavel_has_aluno_responsavel` FOREIGN KEY (`responsavel_cod_responsavel`) REFERENCES `responsavel` (`cod_responsavel`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `responsavel_has_aluno`
--

LOCK TABLES `responsavel_has_aluno` WRITE;
/*!40000 ALTER TABLE `responsavel_has_aluno` DISABLE KEYS */;
INSERT INTO `responsavel_has_aluno` VALUES (1,2,1,'pai'),(3,3,4,'avô'),(8,11,6,'padrinho'),(9,16,17,'pai'),(10,17,21,'pai'),(11,18,22,'pai');
/*!40000 ALTER TABLE `responsavel_has_aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turma`
--

DROP TABLE IF EXISTS `turma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turma` (
  `cod_turma` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `ano` year(4) NOT NULL,
  PRIMARY KEY (`cod_turma`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turma`
--

LOCK TABLES `turma` WRITE;
/*!40000 ALTER TABLE `turma` DISABLE KEYS */;
INSERT INTO `turma` VALUES (1,'Jardim A',2018),(2,'Jardim B',2018),(3,'Jardim C',2018),(5,'Jardim D',2018),(17,'Jardim E',2018),(18,'Jardim 1',2018);
/*!40000 ALTER TABLE `turma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turma_has_professor`
--

DROP TABLE IF EXISTS `turma_has_professor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turma_has_professor` (
  `cod_turma_professor` int(11) NOT NULL AUTO_INCREMENT,
  `turma` int(11) NOT NULL,
  `professor` int(11) NOT NULL,
  `horario` enum('manhã','tarde') NOT NULL,
  PRIMARY KEY (`cod_turma_professor`),
  UNIQUE KEY `turma_UNIQUE` (`turma`),
  KEY `fk_turma_has_professor_professor1_idx` (`professor`),
  KEY `fk_turma_has_professor_turma1_idx` (`turma`),
  CONSTRAINT `fk_turma_has_professor_professor1` FOREIGN KEY (`professor`) REFERENCES `professor` (`cod_professor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_turma_has_professor_turma1` FOREIGN KEY (`turma`) REFERENCES `turma` (`cod_turma`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turma_has_professor`
--

LOCK TABLES `turma_has_professor` WRITE;
/*!40000 ALTER TABLE `turma_has_professor` DISABLE KEYS */;
INSERT INTO `turma_has_professor` VALUES (1,2,1,'manhã'),(14,1,2,'manhã'),(15,3,3,'manhã'),(16,5,6,'manhã'),(17,17,9,'manhã'),(18,18,10,'manhã');
/*!40000 ALTER TABLE `turma_has_professor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `turma_professor`
--

DROP TABLE IF EXISTS `turma_professor`;
/*!50001 DROP VIEW IF EXISTS `turma_professor`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `turma_professor` AS SELECT 
 1 AS `cod_professor`,
 1 AS `nome`,
 1 AS `cod_turma`,
 1 AS `nome_turma`,
 1 AS `cod_turma_professor`,
 1 AS `ano`,
 1 AS `horario`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `cod_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(200) NOT NULL,
  `senha` varchar(2002) NOT NULL,
  `login_primeira` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`cod_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'thresh','1234',2);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'clementina_tcc'
--

--
-- Dumping routines for database 'clementina_tcc'
--

--
-- Final view structure for view `mensagem_nome`
--

/*!50001 DROP VIEW IF EXISTS `mensagem_nome`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `mensagem_nome` AS select `responsavel`.`nome` AS `nome`,`responsavel`.`cod_responsavel` AS `cod_responsavel`,`professor`.`nome` AS `nome_professor`,`professor`.`cod_professor` AS `cod_professor`,`mensagem`.`cod_mensagem` AS `cod_mensagem`,`mensagem`.`destinatario` AS `destinatario`,`mensagem`.`remetente` AS `remetente`,`mensagem`.`mensagem` AS `mensagem`,`mensagem`.`professor_cod_professor` AS `professor_cod_professor`,`mensagem`.`data` AS `data`,`mensagem`.`responsavel_cod_responsavel` AS `responsavel_cod_responsavel`,`mensagem`.`visualizado` AS `visualizado`,`mensagem`.`tipo` AS `tipo` from ((`mensagem` join `responsavel` on((`mensagem`.`responsavel_cod_responsavel` = `responsavel`.`cod_responsavel`))) join `professor` on((`mensagem`.`professor_cod_professor` = `professor`.`cod_professor`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `numero_aluno`
--

/*!50001 DROP VIEW IF EXISTS `numero_aluno`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `numero_aluno` AS select count(0) AS `alunos`,`turma`.`nome` AS `nome` from (`aluno_turma` join `turma` on((`aluno_turma`.`turma` = `turma`.`cod_turma`))) group by `aluno_turma`.`turma` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `professor_responsavel`
--

/*!50001 DROP VIEW IF EXISTS `professor_responsavel`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `professor_responsavel` AS select `professor`.`cod_professor` AS `cod_professor`,`professor`.`nome` AS `nome`,`responsavel`.`cod_responsavel` AS `cod_responsavel`,`responsavel`.`nome` AS `nome_responsavel` from (`professor` join `responsavel`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `relatorio_aluno`
--

/*!50001 DROP VIEW IF EXISTS `relatorio_aluno`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `relatorio_aluno` AS select `aluno`.`cod_cad_aluno` AS `cod_cad_aluno`,`aluno`.`nome` AS `nome`,`aluno`.`data_nasc` AS `data_nasc`,`aluno`.`sexo` AS `sexo`,`aluno`.`estado` AS `estado`,`aluno`.`cidade` AS `cidade`,`aluno`.`bairro` AS `bairro`,`aluno`.`rua` AS `rua`,`aluno`.`numero` AS `numero`,`responsavel`.`cod_responsavel` AS `cod_responsavel`,`responsavel`.`nome` AS `nome_responsavel`,`responsavel`.`email` AS `email`,`responsavel`.`rg` AS `rg`,`responsavel`.`cpf` AS `cpf`,`responsavel_has_aluno`.`grau_parentesco` AS `grau_parentesco`,`responsavel_has_aluno`.`aluno_cod_cad_aluno` AS `aluno_cod_cad_aluno`,`responsavel_has_aluno`.`responsavel_cod_responsavel` AS `responsavel_cod_responsavel`,`responsavel_has_aluno`.`cod_responsavel_aluno` AS `cod_responsavel_aluno` from ((`aluno` join `responsavel_has_aluno` on((`responsavel_has_aluno`.`aluno_cod_cad_aluno` = `aluno`.`cod_cad_aluno`))) join `responsavel` on((`responsavel_has_aluno`.`responsavel_cod_responsavel` = `responsavel`.`cod_responsavel`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `relatorio_responsavel`
--

/*!50001 DROP VIEW IF EXISTS `relatorio_responsavel`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `relatorio_responsavel` AS select `responsavel`.`cod_responsavel` AS `cod_responsvel`,`aluno`.`nome` AS `nome_aluno`,`aluno`.`estado` AS `estado`,`aluno`.`cidade` AS `cidade`,`aluno`.`bairro` AS `bairro`,`aluno`.`rua` AS `rua`,`aluno`.`numero` AS `numero`,`responsavel`.`nome` AS `nome`,`responsavel`.`data_nasc` AS `data_nasc`,`responsavel`.`rg` AS `rg`,`responsavel`.`cpf` AS `cpf`,`responsavel`.`telefone` AS `telefone`,`responsavel_has_aluno`.`grau_parentesco` AS `grau_parentesco` from ((`aluno` join `responsavel`) join `responsavel_has_aluno`) where ((`responsavel_has_aluno`.`aluno_cod_cad_aluno` = `aluno`.`cod_cad_aluno`) and (`responsavel_has_aluno`.`responsavel_cod_responsavel` = `responsavel`.`cod_responsavel`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `relatorio_turma`
--

/*!50001 DROP VIEW IF EXISTS `relatorio_turma`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `relatorio_turma` AS select `turma`.`cod_turma` AS `cod_turma`,`turma`.`nome` AS `nome`,`turma`.`ano` AS `ano`,`turma_has_professor`.`cod_turma_professor` AS `cod_turma_professor`,`turma_has_professor`.`turma` AS `turma`,`turma_has_professor`.`professor` AS `professor`,`turma_has_professor`.`horario` AS `horario`,`professor`.`cod_professor` AS `cod_professor`,`professor`.`nome` AS `nome_professor`,`aluno_turma`.`cod_aluno_turma` AS `cod_aluno_turma`,`aluno_turma`.`aluno` AS `aluno`,`aluno`.`cod_cad_aluno` AS `cod_cad_aluno`,`aluno`.`nome` AS `nome_aluno` from ((((`aluno` join `aluno_turma` on((`aluno_turma`.`aluno` = `aluno`.`cod_cad_aluno`))) join `turma` on((`aluno_turma`.`turma` = `turma`.`cod_turma`))) join `turma_has_professor` on((`turma_has_professor`.`turma` = `turma`.`cod_turma`))) join `professor` on((`turma_has_professor`.`professor` = `professor`.`cod_professor`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `turma_professor`
--

/*!50001 DROP VIEW IF EXISTS `turma_professor`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `turma_professor` AS select `professor`.`cod_professor` AS `cod_professor`,`professor`.`nome` AS `nome`,`turma`.`cod_turma` AS `cod_turma`,`turma`.`nome` AS `nome_turma`,`turma_has_professor`.`cod_turma_professor` AS `cod_turma_professor`,`turma`.`ano` AS `ano`,`turma_has_professor`.`horario` AS `horario` from ((`turma` join `turma_has_professor` on((`turma_has_professor`.`turma` = `turma`.`cod_turma`))) join `professor` on((`turma_has_professor`.`professor` = `professor`.`cod_professor`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-28 13:00:23

CREATE DATABASE  IF NOT EXISTS `registrovital` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `registrovital`;
-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: localhost    Database: registrovital
-- ------------------------------------------------------
-- Server version	8.4.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `administradores`
--

DROP TABLE IF EXISTS `administradores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `administradores` (
  `id_usuario` int NOT NULL,
  `cargo` varchar(40) DEFAULT NULL,
  `data_criacao` datetime DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  CONSTRAINT `fk_id_administrador` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administradores`
--

LOCK TABLES `administradores` WRITE;
/*!40000 ALTER TABLE `administradores` DISABLE KEYS */;
INSERT INTO `administradores` VALUES (7,NULL,'2024-10-07 21:50:12');
/*!40000 ALTER TABLE `administradores` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `cadastro_administrador` BEFORE INSERT ON `administradores` FOR EACH ROW BEGIN
    INSERT INTO logs (tipo_log, tabela_afetada, coluna_afetada, valor_anterior, valor_atual, data_acao, usuario) 
    VALUES ('CADASTRO USUARIO', 'ADMINISTRADORES', '', '', '', NOW(), CURRENT_USER());
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `agendamentos`
--

DROP TABLE IF EXISTS `agendamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agendamentos` (
  `id_agendamento` int NOT NULL AUTO_INCREMENT,
  `paciente` int NOT NULL,
  `profissional` int NOT NULL,
  `area_atuacao` varchar(20) NOT NULL,
  `especializacao` varchar(30) DEFAULT NULL,
  `data_agendamento` date NOT NULL,
  `situacao_paciente` int NOT NULL,
  `situacao_profissional` int NOT NULL,
  `endereco_consulta` int NOT NULL,
  PRIMARY KEY (`id_agendamento`),
  KEY `fk_enderecos_atuacao` (`area_atuacao`),
  CONSTRAINT `fk_enderecos_atuacao` FOREIGN KEY (`area_atuacao`) REFERENCES `profissionais` (`area_atuacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agendamentos`
--

LOCK TABLES `agendamentos` WRITE;
/*!40000 ALTER TABLE `agendamentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `agendamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agendas_profissionais`
--

DROP TABLE IF EXISTS `agendas_profissionais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agendas_profissionais` (
  `id_agenda` int NOT NULL AUTO_INCREMENT,
  `id_profissional` int NOT NULL,
  `id_consulta` int NOT NULL,
  `area_atuacao` varchar(20) NOT NULL,
  `id_paciente` int NOT NULL,
  `endereco_consulta` int NOT NULL,
  PRIMARY KEY (`id_agenda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agendas_profissionais`
--

LOCK TABLES `agendas_profissionais` WRITE;
/*!40000 ALTER TABLE `agendas_profissionais` DISABLE KEYS */;
/*!40000 ALTER TABLE `agendas_profissionais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anotacoes`
--

DROP TABLE IF EXISTS `anotacoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `anotacoes` (
  `id_anotacao` int NOT NULL AUTO_INCREMENT,
  `id_paciente` int NOT NULL,
  `tipo_anotacao` int NOT NULL,
  `descricao_anotacao` varchar(100) NOT NULL,
  `tipo_visibilidade` char(1) NOT NULL,
  `possui_documento` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_anotacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anotacoes`
--

LOCK TABLES `anotacoes` WRITE;
/*!40000 ALTER TABLE `anotacoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `anotacoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `areas_atuacao`
--

DROP TABLE IF EXISTS `areas_atuacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `areas_atuacao` (
  `id_area_atuacao` int NOT NULL AUTO_INCREMENT,
  `descricao_area` varchar(20) NOT NULL,
  PRIMARY KEY (`id_area_atuacao`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `areas_atuacao`
--

LOCK TABLES `areas_atuacao` WRITE;
/*!40000 ALTER TABLE `areas_atuacao` DISABLE KEYS */;
INSERT INTO `areas_atuacao` VALUES (1,'MEDICINA'),(2,'ODONTOLOGIA'),(3,'NUTRICAO'),(4,'PSICOLOGIA'),(5,'FISIOTERAPIA'),(6,'FARMÁCIA');
/*!40000 ALTER TABLE `areas_atuacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consultas`
--

DROP TABLE IF EXISTS `consultas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `consultas` (
  `id_consulta` int NOT NULL AUTO_INCREMENT,
  `paciente` int NOT NULL,
  `profissional` int NOT NULL,
  `id_agendamento` int NOT NULL,
  `id_area_atuacao` int NOT NULL,
  `id_especializacao` int DEFAULT NULL,
  `situacao` int NOT NULL,
  `data` date NOT NULL,
  `valor` decimal(5,2) DEFAULT NULL,
  `endereco_consulta` int NOT NULL,
  PRIMARY KEY (`id_consulta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consultas`
--

LOCK TABLES `consultas` WRITE;
/*!40000 ALTER TABLE `consultas` DISABLE KEYS */;
/*!40000 ALTER TABLE `consultas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dicas`
--

DROP TABLE IF EXISTS `dicas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dicas` (
  `id_dica` int NOT NULL AUTO_INCREMENT,
  `descricao_dica` varchar(100) NOT NULL,
  PRIMARY KEY (`id_dica`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dicas`
--

LOCK TABLES `dicas` WRITE;
/*!40000 ALTER TABLE `dicas` DISABLE KEYS */;
/*!40000 ALTER TABLE `dicas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documentos`
--

DROP TABLE IF EXISTS `documentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `documentos` (
  `id_documento` int NOT NULL AUTO_INCREMENT,
  `id_anotacao` int NOT NULL,
  `tipo_documeto` varchar(3) DEFAULT NULL,
  `path_documento` varchar(100) NOT NULL,
  `tamanho_documento_kb` int NOT NULL,
  PRIMARY KEY (`id_documento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documentos`
--

LOCK TABLES `documentos` WRITE;
/*!40000 ALTER TABLE `documentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `documentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enderecos_atuacao`
--

DROP TABLE IF EXISTS `enderecos_atuacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enderecos_atuacao` (
  `id_endereco` int NOT NULL AUTO_INCREMENT,
  `id_profissional` int NOT NULL,
  `area_atuacao` varchar(20) NOT NULL,
  `situacao_endereco` int NOT NULL,
  `endereco` varchar(30) NOT NULL,
  `numero_endereco` varchar(10) NOT NULL,
  `cep` varchar(8) NOT NULL,
  `cidade` varchar(32) NOT NULL,
  `estado` varchar(2) NOT NULL,
  PRIMARY KEY (`id_endereco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enderecos_atuacao`
--

LOCK TABLES `enderecos_atuacao` WRITE;
/*!40000 ALTER TABLE `enderecos_atuacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `enderecos_atuacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especializacoes`
--

DROP TABLE IF EXISTS `especializacoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `especializacoes` (
  `id_especializacao` int NOT NULL AUTO_INCREMENT,
  `descricao_especializacao` varchar(30) NOT NULL,
  `area_atuacao` varchar(20) NOT NULL,
  PRIMARY KEY (`id_especializacao`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especializacoes`
--

LOCK TABLES `especializacoes` WRITE;
/*!40000 ALTER TABLE `especializacoes` DISABLE KEYS */;
INSERT INTO `especializacoes` VALUES (1,'CARDIOLOGIA','MEDICINA'),(2,'DERMATOLOGIA','MEDICINA'),(3,'GERIATRIA','MEDICINA'),(4,'ORTOPEDIA','MEDICINA'),(5,'GINECOLOGIA','MEDICINA'),(6,'MEDICINA GERAL','MEDICINA'),(7,'GASTROENTEROLOGIA','MEDICINA'),(8,'PSIQUIATRIA','MEDICINA'),(9,'ONCOLOGIA','MEDICINA'),(10,'NEUROLOGIA','MEDICINA'),(11,'ORTODONTIA','ODONTOLOGIA'),(12,'ENDODONTIA','ODONTOLOGIA'),(13,'PERIODONTIA','ODONTOLOGIA'),(14,'PROSTODONTIA','ODONTOLOGIA'),(15,'CIRURGIA BUCOMAXILOFACIAL','ODONTOLOGIA'),(16,'CLÍNICA','PSICOLOGIA'),(17,'NEUROPSICOLOGIA','PSICOLOGIA'),(18,'PSICOTERAPIA','PSICOLOGIA');
/*!40000 ALTER TABLE `especializacoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estados_civis`
--

DROP TABLE IF EXISTS `estados_civis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estados_civis` (
  `id_estado_civil` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(15) NOT NULL,
  PRIMARY KEY (`id_estado_civil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estados_civis`
--

LOCK TABLES `estados_civis` WRITE;
/*!40000 ALTER TABLE `estados_civis` DISABLE KEYS */;
/*!40000 ALTER TABLE `estados_civis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedbacks`
--

DROP TABLE IF EXISTS `feedbacks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedbacks` (
  `id_feedback` int NOT NULL AUTO_INCREMENT,
  `id_consulta` int NOT NULL,
  `usuario_avaliador` int NOT NULL,
  `usuario_avaliado` int NOT NULL,
  `nota_feedback` tinyint NOT NULL,
  `observacao` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_feedback`),
  CONSTRAINT `feedbacks_chk_1` CHECK ((`nota_feedback` between 0 and 10))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedbacks`
--

LOCK TABLES `feedbacks` WRITE;
/*!40000 ALTER TABLE `feedbacks` DISABLE KEYS */;
/*!40000 ALTER TABLE `feedbacks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `logs` (
  `id_log` int NOT NULL AUTO_INCREMENT,
  `tipo_log` varchar(20) NOT NULL,
  `tabela_afetada` varchar(20) DEFAULT NULL,
  `coluna_afetada` varchar(20) DEFAULT NULL,
  `valor_anterior` varchar(100) DEFAULT NULL,
  `valor_atual` varchar(100) DEFAULT NULL,
  `data_acao` date NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (5,'CADASTRO USUARIO','USUARIOS','','','','2024-10-07','root@localhost'),(6,'CADASTRO USUARIO','USUARIOS','','','','2024-10-07','root@localhost'),(23,'CADASTRO USUARIO','ADMINISTRADORES','','','','2024-10-07','root@localhost');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `metas`
--

DROP TABLE IF EXISTS `metas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `metas` (
  `id_meta` int NOT NULL AUTO_INCREMENT,
  `id_paciente` int NOT NULL,
  `titulo_meta` varchar(20) NOT NULL,
  `descricao_meta` varchar(80) DEFAULT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date DEFAULT NULL,
  `situacao` int NOT NULL,
  `notificacao_diaria` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_meta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `metas`
--

LOCK TABLES `metas` WRITE;
/*!40000 ALTER TABLE `metas` DISABLE KEYS */;
/*!40000 ALTER TABLE `metas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pacientes` (
  `id_usuario` int NOT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `rg` varchar(15) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `rua_endereco` varchar(30) DEFAULT NULL,
  `numero_endereco` varchar(10) DEFAULT NULL,
  `cep` varchar(8) DEFAULT NULL,
  `cidade` varchar(32) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `genero` char(1) DEFAULT NULL,
  `estado_civil` int DEFAULT NULL,
  `tipo_sanguineo` varchar(2) DEFAULT NULL,
  `data_criacao` datetime DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  CONSTRAINT `fk_id_paciente` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pacientes`
--

LOCK TABLES `pacientes` WRITE;
/*!40000 ALTER TABLE `pacientes` DISABLE KEYS */;
INSERT INTO `pacientes` VALUES (10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-10-07 21:51:01'),(11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-10-07 22:33:13');
/*!40000 ALTER TABLE `pacientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profissionais`
--

DROP TABLE IF EXISTS `profissionais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profissionais` (
  `id_usuario` int NOT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `cnpj` varchar(14) DEFAULT NULL,
  `registro_profissional` varchar(30) DEFAULT NULL,
  `area_atuacao` varchar(30) DEFAULT NULL,
  `especializacao` varchar(30) DEFAULT NULL,
  `genero` char(1) DEFAULT NULL,
  `tempo_experiencia` int DEFAULT NULL,
  `data_criacao` datetime DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `area_atuacao` (`area_atuacao`),
  CONSTRAINT `fk_id_profissional` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profissionais`
--

LOCK TABLES `profissionais` WRITE;
/*!40000 ALTER TABLE `profissionais` DISABLE KEYS */;
INSERT INTO `profissionais` VALUES (3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-10-07 21:47:36'),(8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-10-07 21:50:30');
/*!40000 ALTER TABLE `profissionais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profissional_geral`
--

DROP TABLE IF EXISTS `profissional_geral`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profissional_geral` (
  `categoria_usuario` int NOT NULL,
  `descricao` varchar(35) DEFAULT NULL,
  `endereco_trabalho` varchar(60) DEFAULT NULL,
  `telefone_profissional` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`categoria_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profissional_geral`
--

LOCK TABLES `profissional_geral` WRITE;
/*!40000 ALTER TABLE `profissional_geral` DISABLE KEYS */;
/*!40000 ALTER TABLE `profissional_geral` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recomendacoes`
--

DROP TABLE IF EXISTS `recomendacoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `recomendacoes` (
  `id_recomendacao` int NOT NULL AUTO_INCREMENT,
  `id_consulta` int NOT NULL,
  `id_profissional` int NOT NULL,
  `id_paciente` int NOT NULL,
  `tipo_recomendacao` int NOT NULL,
  `descricao_recomendacao` varchar(100) NOT NULL,
  PRIMARY KEY (`id_recomendacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recomendacoes`
--

LOCK TABLES `recomendacoes` WRITE;
/*!40000 ALTER TABLE `recomendacoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `recomendacoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status` (
  `id_status` int NOT NULL,
  `descricao` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'CONCLUÍDO'),(2,'PENDENTE'),(3,'CANCELADO'),(4,'INVÁLIDO'),(5,'EXPIRADO'),(6,'RECUSADO'),(7,'FALHA(ERRO)');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_anotacao`
--

DROP TABLE IF EXISTS `tipos_anotacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipos_anotacao` (
  `id_tipo_anotacao` int NOT NULL AUTO_INCREMENT,
  `descricao_tipo` varchar(20) NOT NULL,
  PRIMARY KEY (`id_tipo_anotacao`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_anotacao`
--

LOCK TABLES `tipos_anotacao` WRITE;
/*!40000 ALTER TABLE `tipos_anotacao` DISABLE KEYS */;
INSERT INTO `tipos_anotacao` VALUES (1,'SAUDE FISICA'),(2,'SAUDE EMOCIONAL'),(3,'ACIDENTE'),(4,'GERAL'),(5,'MEDICACAO'),(6,'EXERCÍCIOS'),(7,'ALIMENTACAO');
/*!40000 ALTER TABLE `tipos_anotacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_documento`
--

DROP TABLE IF EXISTS `tipos_documento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipos_documento` (
  `id_tipo_documento` int NOT NULL AUTO_INCREMENT,
  `extensao_documento` varchar(3) DEFAULT NULL,
  `tamanho_maximo_kb` int NOT NULL,
  PRIMARY KEY (`id_tipo_documento`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_documento`
--

LOCK TABLES `tipos_documento` WRITE;
/*!40000 ALTER TABLE `tipos_documento` DISABLE KEYS */;
INSERT INTO `tipos_documento` VALUES (1,'PDF',5000),(2,'TXT',5000),(4,'PNG',5000),(5,'JPG',5000);
/*!40000 ALTER TABLE `tipos_documento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_log`
--

DROP TABLE IF EXISTS `tipos_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipos_log` (
  `id_tipo` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_log`
--

LOCK TABLES `tipos_log` WRITE;
/*!40000 ALTER TABLE `tipos_log` DISABLE KEYS */;
INSERT INTO `tipos_log` VALUES (1,'CADASTRO USUARIO'),(2,'CADASTRO PARÂMETRO'),(3,'ATUALIZACAO CADASTRO'),(4,'DELETE'),(5,'INSERCAO DADO');
/*!40000 ALTER TABLE `tipos_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_recomendacao`
--

DROP TABLE IF EXISTS `tipos_recomendacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipos_recomendacao` (
  `id_tipo_recomendacao` int NOT NULL AUTO_INCREMENT,
  `DESCRICAO` varchar(40) DEFAULT NULL,
  `GERA_NOTIFICACAO` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_recomendacao`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_recomendacao`
--

LOCK TABLES `tipos_recomendacao` WRITE;
/*!40000 ALTER TABLE `tipos_recomendacao` DISABLE KEYS */;
INSERT INTO `tipos_recomendacao` VALUES (1,'ENCAMINHAMENTO','S'),(2,'DICA','S'),(3,'OBSERVACAO','S'),(4,'DOCUMENTO','S');
/*!40000 ALTER TABLE `tipos_recomendacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_usuarios`
--

DROP TABLE IF EXISTS `tipos_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipos_usuarios` (
  `id_tipo` int NOT NULL,
  `descricao` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_usuarios`
--

LOCK TABLES `tipos_usuarios` WRITE;
/*!40000 ALTER TABLE `tipos_usuarios` DISABLE KEYS */;
INSERT INTO `tipos_usuarios` VALUES (1,'ADMINISTRADOR'),(2,'PACIENTE'),(3,'PROFISSIONAL DE SAUDE');
/*!40000 ALTER TABLE `tipos_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_visibilidade`
--

DROP TABLE IF EXISTS `tipos_visibilidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipos_visibilidade` (
  `id_tipo_visibilidade` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_visibilidade`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_visibilidade`
--

LOCK TABLES `tipos_visibilidade` WRITE;
/*!40000 ALTER TABLE `tipos_visibilidade` DISABLE KEYS */;
INSERT INTO `tipos_visibilidade` VALUES (1,'VISIVEL'),(2,'OCULTO');
/*!40000 ALTER TABLE `tipos_visibilidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nome_completo` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `situacao_cadastro` int NOT NULL,
  `tipo_usuario` int NOT NULL,
  `telefone_1` varchar(11) DEFAULT NULL,
  `telefone_2` varchar(11) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (3,'Luan Cubas','luan@gmail.com','hash',1,3,'','','2024-10-07 21:47:36'),(7,'Luan teste','luan@gmail.com','hash',1,1,'','','2024-10-07 21:50:12'),(8,'Luan teste','luan@gmail.com','hash',1,3,'','','2024-10-07 21:50:30'),(10,'Luan teste','luan@gmail.com','hash',1,2,'','','2024-10-07 21:51:01'),(11,'Luan teste','luan@gmail.com','hash',1,2,'','','2024-10-07 22:33:13');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `cadastro_usuario` AFTER INSERT ON `usuarios` FOR EACH ROW BEGIN
    if (new.tipo_usuario = 1) then
        INSERT INTO administradores (id_usuario, data_criacao) 
        VALUES (new.id_usuario, now());
    end if;
    if (new.tipo_usuario = 2) then
        INSERT INTO pacientes (id_usuario, data_criacao) 
        VALUES (new.id_usuario, now());
    end if;
    if (new.tipo_usuario = 3) then
        INSERT INTO profissionais (id_usuario, data_criacao) 
        VALUES (new.id_usuario, now());
    end if;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `insere_log_cadastro` AFTER INSERT ON `usuarios` FOR EACH ROW begin

    if (new.tipo_usuario = 1) then
    insert into logs(tipo_log, tabela_afetada, valor_atual) values
    ('CADASTRO ADMINISTRADOR', 'ADMINISTRADORES', new.id_usuario);
    end if;

    if (new.tipo_usuario = 2) then
    insert into logs(tipo_log, tabela_afetada, valor_atual) values
    ('CADASTRO PACIENTE', 'PACIENTES', new.id_usuario);
    end if;

    if (new.tipo_usuario = 3) then
    insert into logs(tipo_log, tabela_afetada, valor_atual) values
    ('CADASTRO PROFISSIONAL', 'PROFISSIONAIS', new.id_usuario);
    end if;


end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Dumping events for database 'registrovital'
--

--
-- Dumping routines for database 'registrovital'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-10-07 23:40:47

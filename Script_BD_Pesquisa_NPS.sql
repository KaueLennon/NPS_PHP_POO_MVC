CREATE DATABASE  IF NOT EXISTS `formulario-kaue` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `formulario-kaue`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: formulario-kaue
-- ------------------------------------------------------
-- Server version	8.0.34

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
-- Table structure for table `pergunta`
--

DROP TABLE IF EXISTS `pergunta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pergunta` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `pergunta` varchar(350) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `sequencia` int NOT NULL,
  `tipo` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pergunta`
--

LOCK TABLES `pergunta` WRITE;
/*!40000 ALTER TABLE `pergunta` DISABLE KEYS */;
INSERT INTO `pergunta` VALUES (1,'Você recomendaria nosso restaurante a um amigo ou colega?',3,'S/N'),(2,'Como você avaliaria sua experiência no restaurante, em uma escala de 1 a 5, sendo 5 muito satisfeito e 1 muito insatisfeito?',1,'FECHADA'),(3,'Qual o motivo da sua insatisfação? Por favor, escreva detalhadamente sua experiência para que possamos entender e melhorar.',2,'ABERTA'),(16,'Na sua última visita, qual a nota (de 1 a 5) para os pratos servidos? (5: Muito Satisfeito, 1: Muito Insatisfeito)',4,'FECHADA'),(40,'Nova Pergunta',5,'S/N');
/*!40000 ALTER TABLE `pergunta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regra`
--

DROP TABLE IF EXISTS `regra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `regra` (
  `idregra` int NOT NULL AUTO_INCREMENT,
  `pergunta` int NOT NULL,
  `resposta` varchar(5) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `omite` int NOT NULL,
  PRIMARY KEY (`idregra`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regra`
--

LOCK TABLES `regra` WRITE;
/*!40000 ALTER TABLE `regra` DISABLE KEYS */;
INSERT INTO `regra` VALUES (1,1,'5',2);
/*!40000 ALTER TABLE `regra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resposta`
--

DROP TABLE IF EXISTS `resposta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `resposta` (
  `id` int NOT NULL AUTO_INCREMENT,
  `resposta` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `user` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `data_pesquisa` datetime NOT NULL,
  `fk_pergunta` bigint NOT NULL DEFAULT '0',
  `cod_pesquisa` varchar(50) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id` (`fk_pergunta`) USING BTREE,
  CONSTRAINT `fk_pergunta` FOREIGN KEY (`fk_pergunta`) REFERENCES `pergunta` (`id`) ON DELETE CASCADE,
  CONSTRAINT `id` FOREIGN KEY (`fk_pergunta`) REFERENCES `pergunta` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=190 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resposta`
--

LOCK TABLES `resposta` WRITE;
/*!40000 ALTER TABLE `resposta` DISABLE KEYS */;
INSERT INTO `resposta` VALUES (3,'1','kaue@gmail.com','2023-10-28 23:51:57',1,'1698551517'),(4,'2','kaue@gmail.com','2023-10-28 23:51:57',2,'1698551517'),(5,'3','kaue@gmail.com','2023-10-28 23:51:57',3,'1698551517'),(173,'5','mayra@gmail.com','2023-12-03 19:22:49',2,'1701645769'),(174,'teste','mayra@gmail.com','2023-12-03 19:22:49',3,'1701645769'),(175,'Sim','mayra@gmail.com','2023-12-03 19:22:49',1,'1701645769'),(176,'4','mayra@gmail.com','2023-12-03 19:22:49',16,'1701645769'),(177,'5','joaosouza@gmail.com','2023-12-03 19:23:44',2,'1701645824'),(178,'Sem motivos para reclamar.','joaosouza@gmail.com','2023-12-03 19:23:44',3,'1701645824'),(179,'Sim','joaosouza@gmail.com','2023-12-03 19:23:44',1,'1701645824'),(180,'4','joaosouza@gmail.com','2023-12-03 19:23:44',16,'1701645824'),(181,'1','caua@gmail.com','2023-12-03 19:24:57',2,'1701645897'),(182,'Pratos frios e atendimento ruim.','caua@gmail.com','2023-12-03 19:24:57',3,'1701645897'),(183,'Não','caua@gmail.com','2023-12-03 19:24:57',1,'1701645897'),(184,'2','caua@gmail.com','2023-12-03 19:24:57',16,'1701645897'),(185,'5','leonardo@gmail.com','2023-12-03 19:48:42',2,'1701647322'),(186,'N/A','leonardo@gmail.com','2023-12-03 19:48:42',3,'1701647322'),(187,'Sim','leonardo@gmail.com','2023-12-03 19:48:42',1,'1701647322'),(188,'5','leonardo@gmail.com','2023-12-03 19:48:42',16,'1701647322');
/*!40000 ALTER TABLE `resposta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `idusuario` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `senha` varchar(8) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `telefone` varchar(15) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `sexo` varchar(15) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `data_nasc` date NOT NULL,
  `cidade` varchar(45) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `estado` varchar(45) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `endereco` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `perfil` varchar(45) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Kaue Lennon','1234','kaue@gmail.com','67984095110','masculino','1993-04-29','Campo Grande','Mato Grosso do Sul','Rua Marco Feliz, 101','administrador'),(5,'Joao de Souza','1234','joaosouza@gmail.com','67994949588','masculino','2006-01-03','Campo Grande','Mato Grosso do Sul','Av Afonso Pena, 101','usuario'),(6,'Mayra Ortega','1234','mayra@gmail.com','67998979897','feminino','1989-10-02','Dourados','Mato Grosso do Sul','Rua Sebastião, 30','usuario'),(7,'Izza Beatriz','1234','izza@gmail.com','67995956535','feminino','2005-11-23','Campo Grande','Mato Grosso do Sul','Rua Marco Feliz 101','usuario'),(10,'Luiz Henrique','1234','luiz@gmail.com','679995956262','masculino','1990-01-01','Campo Grande','Mato Grosso do Sul','Rua João Candelario, 57','usuario'),(11,'Angelita de Souza','1234','angelita@gmail.com','41965653232','feminino','1970-01-11','Campo Grande','Mato Grosso do Sul','Rua Valdivino Bastos de Jesus, 500','usuario'),(12,'Thabata Cerozino','1234','thabata@gmail.com','67995324651','feminino','1999-01-01','Dourados','Rio Grande do Sul','Rua Candelario, 95','administrador'),(13,'Matheus Vinicius Silva','1234','matheus@gmail.com','91996563232','masculino','1994-05-29','Jardim','Mato Grosso do Sul','Afonso Pena, 987','usuario'),(14,'Mariana','1234','marianasouza@gmail.com','21994653567','feminino','1990-01-20','Rio de Janeiro','Rio de Janeiro','Santa Luzia, 40','usuario'),(35,'Valdir Mendoza','1234','valdirm@gmail.com','67995986565','masculino','1977-08-29','Campo Grande','Mato Grosso do Sul','Av Afonso Pena, 2200','usuario'),(36,'Ana Clara Souza','1234','clarasouza@gmail.com','66998656478','feminino','2000-05-05','Cuiaba','Mato Grosso','Rua Conde Dracula, 500','usuario'),(37,'Elineu Junior','1234','elineujr@gmail.com','67995986564','masculino','2001-11-01','Dourados','Mato Grosso do Sul','Rua Floripa, 565','usuario'),(61,'Cauã','1234','caua@gmail.com','67996935285','masculino','1990-10-01','Campo Grande','Rio de Janeiro','Rua Jose, 500','usuario');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `visao_pesquisa`
--

DROP TABLE IF EXISTS `visao_pesquisa`;
/*!50001 DROP VIEW IF EXISTS `visao_pesquisa`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `visao_pesquisa` AS SELECT 
 1 AS `cod_pesquisa`,
 1 AS `numero_questao`,
 1 AS `pergunta`,
 1 AS `resposta`,
 1 AS `nome`,
 1 AS `user`,
 1 AS `data_pesquisa`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `visao_pesquisa`
--

/*!50001 DROP VIEW IF EXISTS `visao_pesquisa`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `visao_pesquisa` AS select `r`.`cod_pesquisa` AS `cod_pesquisa`,`p`.`sequencia` AS `numero_questao`,`p`.`pergunta` AS `pergunta`,`r`.`resposta` AS `resposta`,`u`.`nome` AS `nome`,`u`.`email` AS `user`,`r`.`data_pesquisa` AS `data_pesquisa` from ((`resposta` `r` join `pergunta` `p` on((`r`.`fk_pergunta` = `p`.`id`))) join `usuario` `u` on((`r`.`user` = `u`.`email`))) */;
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

-- Dump completed on 2023-12-03 22:14:28

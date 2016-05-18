CREATE DATABASE  IF NOT EXISTS `widet532_animetoys` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `widet532_animetoys`;-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: widet532_animetoys
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.9-MariaDB

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
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (3,'Sem Categoria',''),(4,'Categoria 1',''),(5,'Categoria 2','');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(255) DEFAULT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `pontos` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (2,'Guilherme Panayotou','42610183810','15996936586','guilherme.it@live.com','Av. General Carneiro, 1427',150);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fornecedor`
--

DROP TABLE IF EXISTS `fornecedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fornecedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fornecedor`
--

LOCK TABLES `fornecedor` WRITE;
/*!40000 ALTER TABLE `fornecedor` DISABLE KEYS */;
INSERT INTO `fornecedor` VALUES (1,'Sem Fornecedor','','','',''),(2,'fornecedor 1','','','',''),(3,'fornecedor 2','','','','');
/*!40000 ALTER TABLE `fornecedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagina`
--

DROP TABLE IF EXISTS `pagina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagina` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `texto` mediumtext NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `mais` mediumtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagina`
--

LOCK TABLES `pagina` WRITE;
/*!40000 ALTER TABLE `pagina` DISABLE KEYS */;
INSERT INTO `pagina` VALUES (1,'PÃ¡gina inicial','<p>pronto, modifiquei</p>\r\n','','<p>aqui voce encontra muitas novidades!</p>\r\n'),(2,'PÃ¡gina Sobre','<p><span style=\"font-family:comic sans ms,cursive\"><span style=\"font-size:14px\"><span style=\"color:rgb(165, 42, 42)\">Ol&aacute; somos a empresa mais legal do mundo</span></span></span></p>\r\n','',''),(3,'Produtos','',NULL,NULL),(4,'Contato','',NULL,NULL);
/*!40000 ALTER TABLE `pagina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `descricao` mediumtext,
  `preco` float DEFAULT NULL,
  `idcategoria` tinyint(4) DEFAULT NULL,
  `estoque` int(11) DEFAULT NULL,
  `pontos` int(11) DEFAULT NULL,
  `idfornecedor` int(11) DEFAULT '1',
  `ativo` tinyint(4) NOT NULL,
  `img1` varchar(255) DEFAULT NULL,
  `img2` varchar(255) DEFAULT NULL,
  `img3` varchar(255) DEFAULT NULL,
  `img4` varchar(255) DEFAULT NULL,
  
  PRIMARY KEY (`id`),
  KEY `fk_produto_fornecedor_idx` (`idfornecedor`),
  CONSTRAINT `fk_produto_fornecedor` FOREIGN KEY (`idfornecedor`) REFERENCES `fornecedor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` VALUES (11,'Produto 1','',50,3,74,1,1,'','','',''),(12,'Produto2 ','',0,4,0,1,1,'','','',''),(13,'produto 5','',0,5,0,3,0,'','','',''),(14,'Produto 3','<p>um grande presente para seus amigos</p>\r\n',25.5,5,30,3,1,'','','','');
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `tipo` tinyint(4) NOT NULL,
  `descontomaximo` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario_UNIQUE` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'admin','d033e22ae348aeb5660fc2140aec35850c4da997','Admin','admin@admin.com','15992837463',1,100),(2,'vendedor','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','Vendedor','email@vendedor.com','',4,12),(3,'gustavo','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','Gustavo Martins','','',3,0),(4,'bloqueado','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','bloqueado','','',4,0);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venda`
--

DROP TABLE IF EXISTS `venda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idproduto` int(11) NOT NULL,
  `idcliente` int(11) DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  `desconto` float DEFAULT '0',
  `idusuario` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_venda_produto_idx` (`idproduto`),
  KEY `fk_produto_cliente_idx` (`idcliente`),
  KEY `fk_venda_usuario_idx` (`idusuario`),
  CONSTRAINT `fk_venda_cliente` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_venda_produto` FOREIGN KEY (`idproduto`) REFERENCES `produto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_venda_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=187 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venda`
--

LOCK TABLES `venda` WRITE;
/*!40000 ALTER TABLE `venda` DISABLE KEYS */;
INSERT INTO `venda` VALUES (170,11,NULL,'2016-04-20 06:05:22',0,1),(171,11,NULL,'2016-04-20 06:09:39',0,1),(172,11,NULL,'2016-04-20 06:10:09',0,1),(173,11,NULL,'2016-04-20 06:10:09',0,1),(174,11,NULL,'2016-04-20 06:10:09',0,1),(175,11,NULL,'2016-04-20 06:10:09',0,1),(176,11,NULL,'2016-04-20 06:10:09',0,1),(177,11,NULL,'2016-04-20 06:10:09',0,1),(178,11,NULL,'2016-04-20 06:10:09',0,1),(179,11,NULL,'2016-04-20 06:10:09',0,1),(180,11,NULL,'2016-04-20 06:10:09',0,1),(181,11,NULL,'2016-04-20 06:10:09',0,1),(182,11,2,'2016-04-20 06:12:45',0,1),(183,11,2,'2016-04-20 06:24:17',10,1),(184,14,2,'2016-04-20 17:25:44',10,1),(185,14,2,'2016-04-20 17:25:44',10,1),(186,14,2,'2016-04-20 17:25:44',10,1);
/*!40000 ALTER TABLE `venda` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-20 12:32:12

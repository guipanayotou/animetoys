-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: widet532_animetoys
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.13-MariaDB

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (3,'Sem Categoria',''),(7,'MangÃ¡',''),(8,'Trading Card Game',''),(9,'Quadrinhos','');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (2,'Guilherme Panayotou','42610183810','15996936586','guilherme.it@live.com','Av. General Carneiro, 1427',440),(3,'gustavo martins','10883263312','15 991422226','martinsgustavo275@gmail.com','',900);
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fornecedor`
--

LOCK TABLES `fornecedor` WRITE;
/*!40000 ALTER TABLE `fornecedor` DISABLE KEYS */;
INSERT INTO `fornecedor` VALUES (1,'Sem Fornecedor','','','',''),(3,'fornecedor 2','','','',''),(4,'Copag Brasil','(xx)xxxx-xxxx','av.xxxxx xxxxx','','copag@copag.com'),(5,'Dc Comics','(xx)xxxx-xxxx','xxxxxxxxx','','dc@dc.com'),(6,'Marvel Comics','11 9999999999','av.xxxxxxxxxxxxxxxx','<p>produtor de quadrinhos marvel</p>\r\n','marvel@marvel.com');
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
INSERT INTO `pagina` VALUES (1,'ConheÃ§a o novo mundo Nerd','','','<p>aqui voce encontra muitas novidades!</p>\r\n'),(2,'PÃ¡gina Sobre','<p><span style=\"font-size:14px\">&nbsp;A Anime Toys conta com v&aacute;rios tipos de produtos, tais como: action figures, quadrinhos, mang&aacute;s, board games, card games, luderia ( aluguel de jogos de tabuleiro ), acess&oacute;rios para card game e board game, camisetas de seus her&oacute;is preferidos, tudo voltado a cultura nerd and geek e com um &uacute;nico objetivo: divertir as pessoas com coisas nost&aacute;lgicas e maneiras !!!</span></p>\r\n','',''),(3,'Produtos','',NULL,NULL),(4,'Contato','','','');
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
  `idfornecedor` int(11) DEFAULT '1',
  `ativo` tinyint(4) NOT NULL,
  `img1` varchar(255) DEFAULT NULL,
  `img2` varchar(255) DEFAULT NULL,
  `img3` varchar(255) DEFAULT NULL,
  `img4` varchar(255) DEFAULT NULL,
  `pontos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_produto_fornecedor_idx` (`idfornecedor`),
  CONSTRAINT `fk_produto_fornecedor` FOREIGN KEY (`idfornecedor`) REFERENCES `fornecedor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` VALUES (20,'Box Magic The Gathering 1','<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n',299.99,8,106,4,1,'14628211175730e0fd82b6a.jpg','','','',150),(21,'Deck Magic The Gathering','<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n',49.99,8,10,4,1,'14628097755730b4afc478f.jpg','','','',NULL),(22,'Deck PokÃ©mon','<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n',39.99,8,10,4,1,'14628096915730b45b4a603.jpg','','','',NULL),(23,'Deck Darkrai PokÃ©mon','<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n',69.99,8,10,4,1,'14628098175730b4d946b96.jpg','','','',NULL),(24,'Quadrinho Captain America','<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n',39.99,9,5,6,1,'14628099095730b5355a4e5.jpg','','','',NULL),(25,'Quadrinho Dc Universe','<div id=\"lipsum\">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ultrices metus eu massa tempor vestibulum. Fusce sagittis mi non magna mattis, ut volutpat tellus cursus. Duis ac rutrum justo, sed fermentum ligula. Proin quis justo fringilla, ullamcorper eros ut, fringilla mi. Quisque dictum pretium justo, at pharetra nisl lacinia at. Aliquam nibh magna, volutpat quis mauris sit amet, congue ullamcorper leo. Praesent a lacinia massa. Sed commodo mattis orci. Phasellus in sodales nisi, non imperdiet ex. Aliquam ac nulla nibh. Donec ut vulputate ligula. Nunc venenatis interdum nisl at rutrum. Vivamus dignissim nunc justo, at ornare justo lacinia sit amet.</p>\r\n\r\n<p>Donec vulputate volutpat facilisis. Praesent et felis leo. Mauris rhoncus id diam iaculis vehicula. Maecenas eleifend, enim a interdum molestie, lectus turpis auctor ipsum, et semper lectus odio ut dui. Proin efficitur leo massa, vel tempor turpis commodo id. Phasellus eget neque et massa posuere varius eu a velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque auctor purus id aliquam ullamcorper. Etiam tortor enim, pellentesque eu mauris non, sollicitudin euismod quam. Proin eu mi sit amet sem vestibulum tincidunt. Nunc mollis ex urna, id ornare est porta non. Etiam sed semper sem. Phasellus vel quam elit. Donec ornare, ex eget suscipit venenatis, erat ligula accumsan lectus, eu hendrerit nunc lacus eget libero. Suspendisse et consequat massa, eu fermentum nunc.</p>\r\n\r\n<p>Donec non justo quis arcu faucibus pulvinar. Mauris egestas sed quam vel fermentum. Pellentesque vel gravida libero. Nunc rutrum augue nibh, non vestibulum dui ultricies sit amet. Curabitur dignissim rutrum velit, et molestie augue sollicitudin a. Ut augue odio, viverra non orci vitae, condimentum maximus dolor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse potenti.</p>\r\n\r\n<p>Proin et suscipit nibh. Nunc rhoncus tincidunt venenatis. Mauris aliquam finibus urna ut placerat. Mauris imperdiet, dui at fringilla accumsan, ex nisl sodales tortor, eu venenatis nisi dolor eget odio. Etiam efficitur sit amet nibh quis hendrerit. Pellentesque aliquet ac nunc eu elementum. Praesent eget ante eleifend ante auctor blandit. Aliquam erat volutpat. Praesent placerat eros arcu, at condimentum libero efficitur et. Cras id justo urna. Curabitur eget ante sit amet sem rutrum dictum elementum ut nisl. Quisque lobortis, arcu sed ullamcorper tempus, elit risus aliquam leo, nec convallis tortor ipsum id arcu. Sed posuere lacus nisi, ut ultrices lorem vestibulum id. Suspendisse vestibulum, risus ut consectetur convallis, velit arcu efficitur libero, id fermentum tellus sapien a sem. Pellentesque rutrum dui nunc, vel lobortis justo commodo sed. Vestibulum sed neque id odio tincidunt molestie ac non magna.</p>\r\n\r\n<p>Nulla tincidunt, elit in suscipit varius, sapien nisi venenatis velit, ultrices tincidunt leo sem sed quam. Nulla vel ligula nec turpis facilisis lobortis ut ut ligula. Donec nec tellus ut metus fermentum euismod. Suspendisse non diam vestibulum, posuere purus vitae, accumsan lectus. Quisque convallis nunc a ligula posuere vehicula. Sed ut ex pharetra, consequat mi quis, auctor orci. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam eu felis aliquet, ultrices odio et, ullamcorper lorem. Sed enim nulla, interdum eu malesuada id, dapibus eget ipsum.</p>\r\n</div>\r\n',49.99,9,2,1,1,'14628099565730b564d6a05.jpg','','','',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=204 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venda`
--

LOCK TABLES `venda` WRITE;
/*!40000 ALTER TABLE `venda` DISABLE KEYS */;
INSERT INTO `venda` VALUES (199,25,3,'2016-05-10 02:43:41',10,1),(200,25,3,'2016-05-10 02:43:41',10,1),(201,25,3,'2016-05-10 02:43:41',10,1),(202,20,2,'2016-05-18 04:55:39',0,1),(203,20,NULL,'2016-05-18 04:56:39',0,1);
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

-- Dump completed on 2016-05-18  0:40:42

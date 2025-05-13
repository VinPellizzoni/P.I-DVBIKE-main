CREATE TABLE `clientes` (
  `idCli` int(11) NOT NULL AUTO_INCREMENT,
  `nomeCli` varchar(45) NOT NULL,
  `cpfCli` varchar(45) NOT NULL,
  `enderecoCli` varchar(45) NOT NULL,
  `telefoneCli` varchar(45) NOT NULL,
  `senhaCli` varchar(255) NOT NULL,
  `emailCli` varchar(100) NOT NULL,
  PRIMARY KEY (`idCli`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

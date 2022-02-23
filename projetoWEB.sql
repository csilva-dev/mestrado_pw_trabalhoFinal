CREATE DATABASE `projetoWEB` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;

-- projetoWEB.cliente definition

CREATE TABLE `cliente` (
  `uuid` binary(16) NOT NULL COMMENT 'Chave primária, necessário converter para uuid e binario\nFunções:\n	- UUID_TO_BIN/BIN_TO_UUID',
  `nome` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `morada` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `cod_postal` varchar(8) DEFAULT NULL,
  `localidade` varchar(254) DEFAULT NULL,
  `nif` decimal(10,0) DEFAULT NULL,
  `pais` varchar(25) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `role` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `data_registo` datetime DEFAULT (now()),
  `tel` int DEFAULT NULL,
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- projetoWEB.config definition

CREATE TABLE `config` (
  `uuid` binary(16) NOT NULL,
  `max_mesas` int DEFAULT (0),
  `max_take_away` int DEFAULT (0),
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


-- projetoWEB.contato definition

CREATE TABLE `contato` (
  `uuid` binary(16) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mensagem` text,
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


-- projetoWEB.newsletter definition

CREATE TABLE `newsletter` (
  `uuid` binary(16) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `data` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


-- projetoWEB.prato definition

CREATE TABLE `prato` (
  `uuid` binary(16) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text,
  `img` varchar(100) DEFAULT NULL,
  `preco` decimal(5,2) DEFAULT NULL,
  `disponivel_take` tinyint(1) DEFAULT '0',
  `tipo` varchar(50) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `destaque` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- projetoWEB.trafego definition

CREATE TABLE `trafego` (
  `uuid` binary(16) NOT NULL,
  `origem` varchar(255) DEFAULT NULL,
  `origem_ip` varchar(20) DEFAULT NULL,
  `data` timestamp NULL DEFAULT (now()),
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


-- projetoWEB.campanhas definition

CREATE TABLE `campanhas` (
  `uuid` binary(16) NOT NULL,
  `nome` varchar(254) DEFAULT NULL,
  `inicio` date DEFAULT (curdate()),
  `fim` date DEFAULT (curdate()),
  `desconto` decimal(5,2) DEFAULT (0.00),
  `oferta` tinyint(1) DEFAULT (false),
  `oferta_prato_uuid` binary(16) DEFAULT NULL,
  `oferta_prato_preco` decimal(5,2) DEFAULT (0.00),
  PRIMARY KEY (`uuid`),
  KEY `fk_campanhas_prato` (`oferta_prato_uuid`),
  CONSTRAINT `fk_campanhas_prato` FOREIGN KEY (`oferta_prato_uuid`) REFERENCES `prato` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


-- projetoWEB.marketing definition

CREATE TABLE `marketing` (
  `uuid` binary(16) NOT NULL,
  `campanha_uuid` binary(16) DEFAULT NULL,
  `email_template` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`uuid`),
  KEY `fk_marketing_campanhas` (`campanha_uuid`),
  CONSTRAINT `fk_marketing_campanhas` FOREIGN KEY (`campanha_uuid`) REFERENCES `campanhas` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


-- projetoWEB.menu definition

CREATE TABLE `menu` (
  `uuid` binary(16) NOT NULL,
  `prato_uuid` binary(16) DEFAULT NULL,
  `dia_semana` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`uuid`),
  KEY `fk_menu_prato` (`prato_uuid`),
  CONSTRAINT `fk_menu_prato` FOREIGN KEY (`prato_uuid`) REFERENCES `prato` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


-- projetoWEB.reservas definition

CREATE TABLE `reservas` (
  `uuid` binary(16) NOT NULL,
  `data` date NOT NULL,
  `periodo` time NOT NULL,
  `pessoas` int NOT NULL,
  `cliente_uuid` binary(16) DEFAULT NULL,
  `num` int DEFAULT NULL,
  PRIMARY KEY (`uuid`),
  KEY `fk_reservas_cliente` (`cliente_uuid`),
  CONSTRAINT `fk_reservas_cliente` FOREIGN KEY (`cliente_uuid`) REFERENCES `cliente` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- projetoWEB.take_away definition

CREATE TABLE `take_away` (
  `uuid` binary(16) NOT NULL,
  `data` datetime NOT NULL,
  `cliente_uuid` binary(16) DEFAULT NULL,
  `modo_pag` varchar(100) NOT NULL,
  `num` int DEFAULT '0',
  PRIMARY KEY (`uuid`),
  KEY `fk_take_away_cliente` (`cliente_uuid`),
  CONSTRAINT `fk_take_away_cliente` FOREIGN KEY (`cliente_uuid`) REFERENCES `cliente` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- projetoWEB.take_away_linhas definition

CREATE TABLE `take_away_linhas` (
  `uuid` binary(16) NOT NULL,
  `prato_uuid` binary(16) DEFAULT NULL,
  `qtt` decimal(10,0) DEFAULT NULL,
  `take_away_uuid` binary(16) DEFAULT NULL,
  PRIMARY KEY (`uuid`),
  KEY `fk_take_away_linhas_prato` (`prato_uuid`),
  KEY `fk_take_away_linhas_take_away` (`take_away_uuid`),
  CONSTRAINT `fk_take_away_linhas_prato` FOREIGN KEY (`prato_uuid`) REFERENCES `prato` (`uuid`),
  CONSTRAINT `fk_take_away_linhas_take_away` FOREIGN KEY (`take_away_uuid`) REFERENCES `take_away` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
CREATE DATABASE `projetoWEB` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;

Use projetoWEB
-- projetoWEB.cliente definition

CREATE TABLE `cliente` (
  `uuid` binary(16) NOT NULL COMMENT 'Chave primária, necessário converter para uuid e binario\nFunções:\n	- UUID_TO_BIN/BIN_TO_UUID',
  `nome` varchar(254) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `morada` varchar(254) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `cod_postal` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `localidade` varchar(254) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `nif` decimal(10,0) DEFAULT NULL,
  `pais` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `email` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `role` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `data_registo` datetime DEFAULT (now()),
  `tel` int DEFAULT NULL,
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- projetoWEB.config definition

CREATE TABLE `config` (
  `uuid` binary(16) NOT NULL,
  `max_mesas` int DEFAULT (0),
  `max_take_away` int DEFAULT (0),
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- projetoWEB.contato definition

CREATE TABLE `contato` (
  `uuid` binary(16) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mensagem` text,
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- projetoWEB.newsletter definition

CREATE TABLE `newsletter` (
  `uuid` binary(16) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `data` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- projetoWEB.take_away definition

CREATE TABLE `take_away` (
  `uuid` binary(16) NOT NULL,
  `data` datetime NOT NULL,
  `cliente_uuid` binary(16) DEFAULT NULL,
  `modo_pag` varchar(100) NOT NULL,
  `num` int DEFAULT '0',
  `valor` decimal(7,2) DEFAULT (0),
  PRIMARY KEY (`uuid`),
  KEY `fk_take_away_cliente` (`cliente_uuid`),
  CONSTRAINT `fk_take_away_cliente` FOREIGN KEY (`cliente_uuid`) REFERENCES `cliente` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO projetoWEB.cliente (uuid,nome,morada,cod_postal,localidade,nif,pais,email,`role`,username,password,data_registo,tel) VALUES
	 (0x0161CC7DDB804CD28D26F187A58837E2,'Nome de Cliente','Morada do Cliente','1234-485','Localidade',123456789,'Portugal','mail@mail.com','Utilizador','user','password',now(),741258963),
	 (0x5CA5233091A911EC8FEC0242AC120002,'Nome de Admin','Morada de Admin','0000-000','Localidade',123456789,'Portugal','admin@admin.pt','Administrador','admin','password',now(),963258741)

INSERT INTO projetoWEB.config (uuid,max_mesas,max_take_away) VALUES
	 (0x72765AF8923E11ECB8430242AC120002,15,10);

INSERT INTO projetoWEB.contato (uuid,nome,email,mensagem) VALUES
	 (0x6ED651872DD84BD39D7C5BB93977B322,'Nome de Contato','mail@mail.com','Teste de envio de mensagem'),
	 (0xC9B93DBCDFB34F268F25C8A28A0D65B2,'Nome Novo','mail@mail.com','Gosto muito do site!');

INSERT INTO projetoWEB.newsletter (uuid,email,`data`) VALUES
	 (0xED954AF8C50E4038956A7445396B5950,'mail@mail.com','2022-02-20 23:24:46');

INSERT INTO projetoWEB.prato (uuid,nome,descricao,img,preco,disponivel_take,tipo,categoria,destaque) VALUES
	 (0x0A88E945C6684A6CBFD3C7EC831FD777,'Salada Fresca','Salada de Legumes com fruta e vinagrete','anna-pelzer-IGfIGP5ONV0-unsplash.jpg',5.00,1,'Vegan','Entradas',1),
	 (0x283B60382C4840E081B6E15E3493B541,'Variado','Escolha o que deseja','dan-gold-4_jhDO54BYg-unsplash.jpg',3.00,1,'Vegan','Entradas',1),
	 (0x2D53921C798B4709908734AE01F4511B,'Pizza','Pizza em forno de lenha','chad-montano-MqT0asuoIcU-unsplash.jpg',5.00,1,'Pizza','Prato Principal',1);

INSERT INTO projetoWEB.reservas (uuid,`data`,periodo,pessoas,cliente_uuid,num) VALUES
	 (0x3408435CF3C54786800758049147793D,'2022-10-15','05:00:00',0,0x0161CC7DDB804CD28D26F187A58837E2,1),
	 (0xC9717646758A4C9990F31D8AA030BD59,'2022-10-15','15:25:00',5,0x0161CC7DDB804CD28D26F187A58837E2,2);

INSERT INTO projetoWEB.take_away (uuid,`data`,cliente_uuid,modo_pag,num) VALUES
	 (0x0FFB5893270B4357A94DE63D846012E5,'2022-02-22 23:20:58',0x0161CC7DDB804CD28D26F187A58837E2,'MBWay',18, 33.00),
	 (0x1473A411769A42E49B41FAFF55DD8276,'2022-02-22 23:20:16',0x0161CC7DDB804CD28D26F187A58837E2,'Ato de Entrega',17, 10.00);

INSERT INTO projetoWEB.take_away_linhas (uuid,prato_uuid,qtt,take_away_uuid) VALUES
	 (0x476380719A874AD293B307CEDC31A820,0x283B60382C4840E081B6E15E3493B541,1,0x1473A411769A42E49B41FAFF55DD8276),
	 (0x742125BDEFED4A87BA7FDFC117D897AB,0x2D53921C798B4709908734AE01F4511B,6,0x1473A411769A42E49B41FAFF55DD8276),
	 (0x92B56B2EBC3E4851B83329421AD0BB05,0x0A88E945C6684A6CBFD3C7EC831FD777,1,0x0FFB5893270B4357A94DE63D846012E5),
	 (0xE0559E9070E04435B06B72C9E2273804,0x2D53921C798B4709908734AE01F4511B,1,0x0FFB5893270B4357A94DE63D846012E5);

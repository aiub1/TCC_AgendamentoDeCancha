-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 28-Nov-2020 às 02:09
-- Versão do servidor: 8.0.18
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `chute_e_gol`
--
CREATE DATABASE IF NOT EXISTS `chute_e_gol` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_as_cs;
USE `chute_e_gol`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluguel`
--

DROP TABLE IF EXISTS `aluguel`;
CREATE TABLE IF NOT EXISTS `aluguel` (
  `CodCancha` int(11) NOT NULL,
  `CodFunc` int(60) NOT NULL,
  `CodCliente` int(11) NOT NULL,
  `Data_Age` date NOT NULL,
  `Hora_Age` time NOT NULL,
  `CodAgend` int(11) NOT NULL AUTO_INCREMENT,
  `Status` int(1) NOT NULL,
  `Tempo` int(3) NOT NULL,
  PRIMARY KEY (`CodAgend`),
  KEY `fk_CodCanchaAluguel` (`CodCancha`) USING BTREE,
  KEY `fk_CodFuncAluguel` (`CodFunc`),
  KEY `fk_CodClienteAluguel` (`CodCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_as_cs;

--
-- Extraindo dados da tabela `aluguel`
--

INSERT INTO `aluguel` (`CodCancha`, `CodFunc`, `CodCliente`, `Data_Age`, `Hora_Age`, `CodAgend`, `Status`, `Tempo`) VALUES
(1, 1, 4, '2020-11-30', '15:00:00', 3, 1, 0),
(2, 1, 4, '2020-11-20', '14:00:00', 4, 1, 0),
(1, 1, 4, '2020-11-19', '19:00:00', 5, 1, 0),
(2, 1, 4, '2020-11-20', '19:00:00', 6, 1, 0),
(14, 1, 4, '2020-11-21', '13:00:00', 9, 1, 0),
(9, 1, 4, '2020-11-21', '13:00:00', 10, 1, 0),
(15, 1, 4, '2020-11-20', '13:00:00', 11, 1, 0),
(7, 1, 4, '2020-11-20', '16:00:00', 12, 1, 0),
(1, 1, 4, '2020-11-20', '14:00:00', 13, 1, 60),
(14, 1, 4, '2020-11-20', '12:00:00', 14, 1, 60),
(16, 1, 4, '2020-11-21', '17:00:00', 15, 1, 120),
(18, 1, 6, '2020-11-24', '08:00:00', 16, 1, 60),
(1, 1, 4, '2020-11-26', '10:00:00', 17, 1, 60),
(1, 1, 4, '2020-11-27', '10:00:00', 18, 1, 60),
(1, 1, 4, '2020-11-27', '16:00:00', 19, 1, 120),
(1, 1, 4, '2020-11-28', '13:00:00', 20, 1, 180),
(17, 1, 1, '2020-11-29', '11:00:00', 21, 1, 60),
(14, 1, 4, '2020-11-27', '14:00:00', 22, 1, 60),
(15, 1, 13, '2020-11-28', '15:00:00', 23, 1, 60);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cancha`
--

DROP TABLE IF EXISTS `cancha`;
CREATE TABLE IF NOT EXISTS `cancha` (
  `CodCancha` int(11) NOT NULL AUTO_INCREMENT,
  `DescCancha` varchar(300) COLLATE utf8mb4_0900_as_cs NOT NULL,
  `Tempo` int(11) DEFAULT NULL,
  PRIMARY KEY (`CodCancha`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_as_cs;

--
-- Extraindo dados da tabela `cancha`
--

INSERT INTO `cancha` (`CodCancha`, `DescCancha`, `Tempo`) VALUES
(1, 'Futsal 1', 60),
(2, 'Futsal 2', 120),
(7, 'Futsal 3', NULL),
(9, 'Futsal 4', NULL),
(10, 'Futsal 5', NULL),
(11, 'Futsal 6', NULL),
(12, 'Futsal 7', NULL),
(13, 'Futsal 8', NULL),
(14, 'Sintetico 1', NULL),
(15, 'Sintetico 2', NULL),
(16, 'Volei/Basquete 1', NULL),
(17, 'Volei/Basquete 2', NULL),
(18, 'Volei/Basquete 3', NULL),
(19, 'Volei/Basquete 4', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

DROP TABLE IF EXISTS `cargo`;
CREATE TABLE IF NOT EXISTS `cargo` (
  `CodCargo` varchar(30) COLLATE utf8mb4_0900_as_cs NOT NULL,
  `Cargo` varchar(30) COLLATE utf8mb4_0900_as_cs NOT NULL,
  `Salario` float NOT NULL,
  PRIMARY KEY (`CodCargo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_as_cs;

--
-- Extraindo dados da tabela `cargo`
--

INSERT INTO `cargo` (`CodCargo`, `Cargo`, `Salario`) VALUES
('DMT', 'Demitido', 0),
('DNO', 'Dono', 6000),
('FNC', 'Funcionário', 2000),
('GNT', 'Gerente', 3000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `CodCliente` int(11) NOT NULL AUTO_INCREMENT,
  `Cpf` bigint(11) NOT NULL,
  `Nome` varchar(60) COLLATE utf8mb4_0900_as_cs NOT NULL,
  `CodTel` int(11) NOT NULL,
  `CodEnd` bigint(20) NOT NULL,
  PRIMARY KEY (`CodCliente`),
  KEY `fk_CodTelCliente` (`CodTel`),
  KEY `fk_CodEndCliente` (`CodEnd`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_as_cs;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`CodCliente`, `Cpf`, `Nome`, `CodTel`, `CodEnd`) VALUES
(1, 57062298999, 'Isabella Fabiana Gabrielly Pires', 2, 2),
(4, 77777777777, 'Yasser Aiub Salomão', 28, 28),
(5, 74111547923, 'Yuri Oliver Pietro Melo', 30, 30),
(6, 20957779721, 'Marcelo Leandro Nicolas Costa', 31, 31),
(7, 51106309928, 'Pietro Rodrigo Silva', 32, 32),
(8, 18374588985, 'Melissa Aurora Marina Santos', 37, 37),
(9, 24126010971, 'Anderson Renato Fogaça', 38, 38),
(10, 18655877964, 'Sebastião José Caleb Rodrigues', 39, 39),
(11, 47370716929, 'Diogo Sebastião Assis', 40, 40),
(12, 44538024988, 'Cecília Marcela Sueli Aragão', 41, 41),
(13, 11838050964, 'Naime Aiub', 44, 44);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE IF NOT EXISTS `empresa` (
  `Cnpj` bigint(14) NOT NULL,
  `CodTel` int(11) NOT NULL,
  `CodEnd` bigint(20) NOT NULL,
  `CodFunc` int(60) NOT NULL,
  PRIMARY KEY (`Cnpj`),
  KEY `fk_CodTelEmpresa` (`CodTel`),
  KEY `fk_CodEndEmprea` (`CodEnd`),
  KEY `fk_CodFuncEmpresa` (`CodFunc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_as_cs;

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

DROP TABLE IF EXISTS `endereco`;
CREATE TABLE IF NOT EXISTS `endereco` (
  `Tipo` varchar(60) COLLATE utf8mb4_0900_as_cs NOT NULL,
  `Lougradouro` varchar(60) COLLATE utf8mb4_0900_as_cs NOT NULL,
  `Num` varchar(60) COLLATE utf8mb4_0900_as_cs NOT NULL,
  `Complemento` varchar(60) COLLATE utf8mb4_0900_as_cs NOT NULL,
  `Bairro` varchar(60) COLLATE utf8mb4_0900_as_cs NOT NULL,
  `Cidade` varchar(60) COLLATE utf8mb4_0900_as_cs NOT NULL,
  `UF` varchar(2) COLLATE utf8mb4_0900_as_cs NOT NULL,
  `Cep` int(8) NOT NULL,
  `CodEnd` bigint(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`CodEnd`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_as_cs;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`Tipo`, `Lougradouro`, `Num`, `Complemento`, `Bairro`, `Cidade`, `UF`, `Cep`, `CodEnd`) VALUES
('Rua', 'Arlindo Francez        ', '177', 'casa', 'Parque da Fonte', 'São José dos Pinhais', 'PR', 83050125, 1),
('Rua', 'Alice Pereira de Andrade Fernandes     ', '724', 'Casa', 'Jardim Neman Sahyun', 'Londrina', 'PR', 86041283, 2),
('Rua', 'Arlindo Francez', '641', 'Casa', 'Parque da Fonte', 'São José dos Pinhais', 'PR', 83050125, 17),
('Rua', 'Arlindo Francez', '641', 'Casa', 'Parque da Fonte', 'São José dos Pinhais', 'PR', 83050125, 18),
('Rua', 'Arlindo Francez', '641', 'Casa', 'Parque da Fonte', 'São José dos Pinhais', 'PR', 83050125, 19),
('Rua', 'Arlindo Francez', '641', 'Casa', 'Parque da Fonte', 'São José dos Pinhais', 'PR', 83050125, 20),
('Rua', 'Arlindo Francez', '641', 'Casa', 'Parque da Fonte', 'São José dos Pinhais', 'PR', 83050125, 21),
('Rua', 'Arlindo Francez', '641', 'Casa', 'Parque da Fonte', 'São José dos Pinhais', 'PR', 83050125, 22),
('Rua', 'Arlindo Francez', '641', 'Casa', 'Parque da Fonte', 'São José dos Pinhais', 'PR', 83050125, 23),
('Rua', 'Arlindo Francez', '641', 'Casa', 'Parque da Fonte', 'São José dos Pinhais', 'PR', 83050125, 24),
('Av', 'Rui Barbosa', '43234', 'Apt 304', 'Sítio Cercado', 'Curitiba', 'PR', 66026082, 25),
('Rua', 'Marechal Deodoro da Fonseca', '5678', 'Apt 406', 'Afonso Pena', 'São José dos Pinhais', 'PR', 2147483647, 28),
('Rua', 'Professora Ernestina de Macedo Souza Cortes', '606', 'Casa', 'Parque da Fonte', 'São José dos Pinhais', 'PR', 83050150, 29),
('Rua', 'das Funcionárias', '604', 'casa', 'Costeira', 'São José dos Pinhais', 'PR', 83015320, 30),
('Rua', 'dos Cedros', '635', 'casa', 'Rio Pequeno', 'São José dos Pinhais', 'PR', 83085545, 31),
('Rua', 'Doutor Mário Jorge', '103', 'Apt 201', 'São Marcos', 'São José dos Pinhais', 'PR', 83090180, 32),
('Rua', 'Alegina dos Santos Batista', '206', 'casa', 'Rio Pequeno', 'São José dos Pinhais', 'PR', 83085625, 33),
('Rua', 'Regina Berton Moletta', '774', 'casa', 'Cruzeiro', 'São José dos Pinhais', 'PR', 83010120, 34),
('Rua', 'Alzira Miranda Koerbel', '749', 'Apt 201', 'Aviação', 'São José dos Pinhais', 'PR', 83045390, 35),
('Rua', 'Augusto Adão', '457', 'Apt 403', 'Costeira', 'São José dos Pinhais', 'PR', 83055310, 36),
('Rua', 'Cleide Gozzi Shivinski', '444', 'casa', 'Costeira', 'São José dos Pinhais', 'PR', 83020120, 37),
('Rua', 'Vereador Ary Hoff', '979', 'casa', 'São Marcos', 'São José dos Pinhais', 'PR', 83090505, 38),
('Rua', 'Elvira Zagonel Kozlovski', '953', 'Apt 102', 'Aviação', 'São José dos Pinhais', 'PR', 83020234, 39),
('Rua', 'Wanda Kuss Salata', '298', 'casa', 'Santo Antônio', 'São José dos Pinhais', 'PR', 83020645, 40),
('Rua', 'das Nações Unidas', '523', 'Apt 201', 'Cidade Jardim', 'São José dos Pinhais', 'PR', 83035310, 41),
('Rua', 'Dracarys ', '42', '102 - Residencial da Muralha', 'Peter Parker', 'São José dos Pinhais', 'PR', 83085625, 42),
('Rua', 'Professor João da Costa Viana', '543', 'casa', 'Cidade Jardim', 'São José dos Pinhais', 'PR', 83035000, 43),
('Rua', 'Wolfgang Ammon ', '215', 'Apto 301', 'Centro', 'São Bento do Sul', 'SC', 89289169, 44);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `Senha` varchar(32) COLLATE utf8mb4_0900_as_cs NOT NULL,
  `CodEnd` bigint(20) NOT NULL,
  `CodTel` int(60) NOT NULL,
  `Cpf` bigint(11) NOT NULL,
  `CodFunc` int(60) NOT NULL AUTO_INCREMENT,
  `Pis` bigint(11) NOT NULL,
  `RG` bigint(10) NOT NULL,
  `CodCargo` varchar(30) COLLATE utf8mb4_0900_as_cs NOT NULL,
  `Nome` varchar(60) COLLATE utf8mb4_0900_as_cs NOT NULL,
  `DataNasc` date NOT NULL,
  PRIMARY KEY (`CodFunc`),
  KEY `fk_CodEndFunc` (`CodEnd`),
  KEY `fk_CodTelFunc` (`CodTel`),
  KEY `fk_CodCargoFunc` (`CodCargo`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_as_cs;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`Senha`, `CodEnd`, `CodTel`, `Cpf`, `CodFunc`, `Pis`, `RG`, `CodCargo`, `Nome`, `DataNasc`) VALUES
('698dc19d489c4e4db73e28a713eab07b', 1, 1, 12434873995, 1, 50936186360, 457481274, 'DNO', 'João Aiub Ribeiro', '2003-08-05'),
('d8578edf8458ce06fbc5bb76a58c5ca4', 24, 24, 11111111111, 15, 11111111111, 11111111, 'GNT', 'Rafi Camille Aiub', '2003-01-30'),
('81dc9bdb52d04dc20036dbd8313ed055', 25, 25, 22222222222, 16, 22222222222, 22222222, 'FNC', 'Riyad Aiub', '2005-09-02'),
('698dc19d489c4e4db73e28a713eab07b', 33, 33, 13405004934, 18, 91815633088, 311817063, 'FNC', 'Juliana Jaqueline Isis Baptista', '2002-03-04'),
('698dc19d489c4e4db73e28a713eab07b', 34, 34, 30286407914, 19, 25530209794, 441393305, 'FNC', 'Sophia Carolina Dias', '2002-05-13'),
('698dc19d489c4e4db73e28a713eab07b', 35, 35, 17638514947, 20, 86818703307, 354344298, 'FNC', 'Vitor Theo Dias', '2002-08-21'),
('698dc19d489c4e4db73e28a713eab07b', 36, 36, 31986180964, 21, 71343436069, 484499348, 'FNC', 'Marcos Vinicius Augusto Otávio Fernandes', '2002-02-14'),
('698dc19d489c4e4db73e28a713eab07b', 42, 42, 93485591920, 22, 30472420986, 445338398, 'DNO', 'Moreninho de Sarado XXIII', '1997-04-12'),
('698dc19d489c4e4db73e28a713eab07b', 43, 43, 45770674989, 23, 67629410012, 447656636, 'FNC', 'Marcos Roberto Costa', '1997-08-12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `horario`
--

DROP TABLE IF EXISTS `horario`;
CREATE TABLE IF NOT EXISTS `horario` (
  `Turno` int(11) NOT NULL,
  `Dia` int(11) NOT NULL,
  `CodCancha` int(11) NOT NULL,
  KEY `fk_CodCanchaHorario` (`CodCancha`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_as_cs;

--
-- Extraindo dados da tabela `horario`
--

INSERT INTO `horario` (`Turno`, `Dia`, `CodCancha`) VALUES
(1, 6, 2),
(2, 6, 2),
(1, 2, 2),
(2, 2, 2),
(1, 3, 2),
(2, 3, 2),
(1, 4, 2),
(2, 4, 2),
(1, 5, 2),
(2, 5, 2),
(1, 6, 2),
(2, 6, 2),
(1, 2, 9),
(2, 2, 9),
(1, 3, 9),
(2, 3, 9),
(1, 4, 9),
(2, 4, 9),
(1, 5, 9),
(2, 5, 9),
(1, 6, 9),
(2, 6, 9),
(1, 7, 9),
(2, 7, 9),
(1, 2, 10),
(2, 2, 10),
(1, 3, 10),
(2, 3, 10),
(1, 4, 10),
(2, 4, 10),
(1, 5, 10),
(2, 5, 10),
(1, 6, 10),
(2, 6, 10),
(1, 7, 10),
(2, 7, 10),
(1, 2, 11),
(2, 2, 11),
(1, 3, 11),
(2, 3, 11),
(1, 4, 11),
(2, 4, 11),
(1, 5, 11),
(2, 5, 11),
(1, 6, 11),
(2, 6, 11),
(1, 7, 11),
(2, 7, 11),
(1, 2, 12),
(2, 2, 12),
(1, 3, 12),
(2, 3, 12),
(1, 4, 12),
(2, 4, 12),
(1, 5, 12),
(2, 5, 12),
(1, 6, 12),
(2, 6, 12),
(1, 7, 12),
(2, 7, 12),
(1, 2, 13),
(2, 2, 13),
(1, 3, 13),
(2, 3, 13),
(1, 4, 13),
(2, 4, 13),
(1, 5, 13),
(2, 5, 13),
(1, 6, 13),
(2, 6, 13),
(1, 7, 13),
(2, 7, 13),
(1, 2, 14),
(2, 2, 14),
(1, 3, 14),
(2, 3, 14),
(1, 4, 14),
(2, 4, 14),
(1, 5, 14),
(2, 5, 14),
(1, 6, 14),
(2, 6, 14),
(1, 7, 14),
(2, 7, 14),
(1, 2, 15),
(2, 2, 15),
(1, 3, 15),
(2, 3, 15),
(1, 4, 15),
(2, 4, 15),
(1, 5, 15),
(2, 5, 15),
(1, 6, 15),
(2, 6, 15),
(1, 7, 15),
(2, 7, 15),
(1, 2, 16),
(2, 2, 16),
(1, 3, 16),
(2, 3, 16),
(1, 4, 16),
(2, 4, 16),
(1, 5, 16),
(2, 5, 16),
(1, 6, 16),
(2, 6, 16),
(1, 7, 16),
(2, 7, 16),
(1, 2, 17),
(2, 2, 17),
(1, 3, 17),
(2, 3, 17),
(1, 4, 17),
(2, 4, 17),
(1, 5, 17),
(2, 5, 17),
(1, 6, 17),
(2, 6, 17),
(1, 7, 17),
(2, 7, 17),
(1, 2, 18),
(2, 2, 18),
(1, 3, 18),
(2, 3, 18),
(1, 4, 18),
(2, 4, 18),
(1, 5, 18),
(2, 5, 18),
(1, 6, 18),
(2, 6, 18),
(1, 7, 18),
(2, 7, 18),
(1, 2, 19),
(2, 2, 19),
(1, 3, 19),
(2, 3, 19),
(1, 4, 19),
(2, 4, 19),
(1, 5, 19),
(2, 5, 19),
(1, 6, 19),
(2, 6, 19),
(1, 7, 19),
(2, 7, 19),
(1, 7, 2),
(1, 7, 2),
(1, 2, 2),
(2, 2, 2),
(1, 3, 2),
(2, 3, 2),
(1, 4, 2),
(2, 4, 2),
(1, 5, 2),
(2, 5, 2),
(1, 6, 2),
(2, 6, 2),
(1, 7, 2),
(2, 7, 2),
(1, 2, 1),
(2, 2, 1),
(1, 3, 1),
(2, 3, 1),
(1, 4, 1),
(2, 4, 1),
(1, 5, 1),
(2, 5, 1),
(1, 6, 1),
(2, 6, 1),
(1, 7, 1),
(2, 7, 1),
(1, 2, 7),
(2, 2, 7),
(1, 3, 7),
(2, 3, 7),
(1, 4, 7),
(2, 4, 7),
(1, 5, 7),
(2, 5, 7),
(1, 6, 7),
(2, 6, 7),
(1, 7, 7),
(2, 7, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

DROP TABLE IF EXISTS `pagamento`;
CREATE TABLE IF NOT EXISTS `pagamento` (
  `CodPagamento` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(60) COLLATE utf8mb4_0900_as_cs NOT NULL,
  `Info` varchar(3) COLLATE utf8mb4_0900_as_cs NOT NULL,
  PRIMARY KEY (`CodPagamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_as_cs;

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone`
--

DROP TABLE IF EXISTS `telefone`;
CREATE TABLE IF NOT EXISTS `telefone` (
  `Telefone` int(9) NOT NULL,
  `Ddd` int(2) NOT NULL,
  `CodTel` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`CodTel`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_as_cs;

--
-- Extraindo dados da tabela `telefone`
--

INSERT INTO `telefone` (`Telefone`, `Ddd`, `CodTel`) VALUES
(998193658, 41, 1),
(983214772, 43, 2),
(923455422, 41, 17),
(923455422, 41, 18),
(923455422, 41, 19),
(923455422, 41, 20),
(923455422, 41, 21),
(923455422, 41, 22),
(923455422, 41, 23),
(923455422, 41, 24),
(934567653, 41, 25),
(987544567, 41, 28),
(996283781, 41, 30),
(992174422, 41, 31),
(991993397, 41, 32),
(995521192, 41, 33),
(983187503, 41, 34),
(988819362, 41, 35),
(986610381, 41, 36),
(989299358, 41, 37),
(984711261, 41, 38),
(985333461, 41, 39),
(994626684, 41, 40),
(988552521, 41, 41),
(996534969, 41, 42),
(991549231, 41, 43),
(996285954, 47, 44);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tempo`
--

DROP TABLE IF EXISTS `tempo`;
CREATE TABLE IF NOT EXISTS `tempo` (
  `Tempo` int(3) NOT NULL,
  PRIMARY KEY (`Tempo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_as_cs;

--
-- Extraindo dados da tabela `tempo`
--

INSERT INTO `tempo` (`Tempo`) VALUES
(60),
(120),
(180),
(240);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `aluguel`
--
ALTER TABLE `aluguel`
  ADD CONSTRAINT `fk_` FOREIGN KEY (`CodCancha`) REFERENCES `cancha` (`CodCancha`),
  ADD CONSTRAINT `fk_CodClienteAluguel` FOREIGN KEY (`CodCliente`) REFERENCES `cliente` (`CodCliente`),
  ADD CONSTRAINT `fk_CodFuncAluguel` FOREIGN KEY (`CodFunc`) REFERENCES `funcionario` (`CodFunc`);

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_CodEndCliente` FOREIGN KEY (`CodEnd`) REFERENCES `endereco` (`CodEnd`),
  ADD CONSTRAINT `fk_CodTelCliente` FOREIGN KEY (`CodTel`) REFERENCES `telefone` (`CodTel`);

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `fk_CodCargoFunc` FOREIGN KEY (`CodCargo`) REFERENCES `cargo` (`CodCargo`),
  ADD CONSTRAINT `fk_CodEndFunc` FOREIGN KEY (`CodEnd`) REFERENCES `endereco` (`CodEnd`),
  ADD CONSTRAINT `fk_CodTelFunc` FOREIGN KEY (`CodTel`) REFERENCES `telefone` (`CodTel`);

--
-- Limitadores para a tabela `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `fk_CodCanchaHorario` FOREIGN KEY (`CodCancha`) REFERENCES `cancha` (`CodCancha`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

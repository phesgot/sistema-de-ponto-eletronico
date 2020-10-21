-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08-Dez-2018 às 18:17
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistema_de_pontos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `id_adm` int(11) NOT NULL,
  `nome_adm` varchar(80) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `senha` varchar(80) NOT NULL,
  `status_adm` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`id_adm`, `nome_adm`, `cpf`, `usuario`, `senha`, `status_adm`) VALUES
(1, 'Pedro Henrique do Espirito Santo Gonçalves Torress', '70240508106', 'pedro.torres', 'e10adc3949ba59abbe56e057f20f883e', 1),
(2, 'Lucas Gonçalves Torres', '70240508110', 'lucas.torress', 'c8837b23ff8aaa8a2dde915473ce0991', 1),
(3, 'Joao Torres', '70240508107', 'joao.torres', 'e10adc3949ba59abbe56e057f20f883e', 2),
(4, 'Victor Torres', '70240508108', 'victor.torres', 'e10adc3949ba59abbe56e057f20f883e', 2),
(5, 'Atilla Torres', '70240508109', 'atilla.torres', 'e10adc3949ba59abbe56e057f20f883e', 2),
(6, 'Victoria Torres', '70240508104', 'victoria.torres', 'e10adc3949ba59abbe56e057f20f883e', 1),
(7, 'Nathalia Bueno', '70240508103', 'nathalia.bueno', 'e10adc3949ba59abbe56e057f20f883e', 2),
(8, 'Claudia Torres', '70240508102', 'claudia.torres', '25d55ad283aa400af464c76d713c07ad', 1),
(9, 'Rayane dos Santos', '70240508101', 'rayane.santos', 'e10adc3949ba59abbe56e057f20f883e', 1),
(10, 'Erika dos Santos', '70240508100', 'erika.santos', 'e10adc3949ba59abbe56e057f20f883e', 1),
(11, 'Adimin master', '70240508111', 'admin.master', 'e10adc3949ba59abbe56e057f20f883e', 1),
(12, 'Salvador ', '70230405065', 'salvador.melo', 'e10adc3949ba59abbe56e057f20f883e', 2),
(13, 'luis inacio', '111.111.111-11', 'luis.inacio', 'e10adc3949ba59abbe56e057f20f883e', 1),
(14, 'joaquim barbosa', '863.454.710-89', 'joaquim.barbosa', 'e10adc3949ba59abbe56e057f20f883e', 1),
(16, 'pedro lucas', '64208446064', 'pedro.lucas', 'e10adc3949ba59abbe56e057f20f883e', 1),
(17, 'Lucas Pedro', '54498297016', 'lucas.pedro', 'e10adc3949ba59abbe56e057f20f883e', 1),
(18, 'Thiago P', '44921298041', 'thiago.p', '8d70d8ab2768f232ebe874175065ead3', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id_emp` int(11) NOT NULL,
  `nome_emp` varchar(45) DEFAULT NULL,
  `email_emp` varchar(80) DEFAULT NULL,
  `cnpj` varchar(18) DEFAULT NULL,
  `telefone_emp` varchar(45) DEFAULT NULL,
  `senha_emp` varchar(80) DEFAULT NULL,
  `cep_emp` varchar(9) DEFAULT NULL,
  `uf_emp` varchar(2) DEFAULT NULL,
  `cidade_emp` varchar(20) DEFAULT NULL,
  `bairro_emp` varchar(20) DEFAULT NULL,
  `endereco_emp` varchar(40) DEFAULT NULL,
  `status_emp` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id_emp`, `nome_emp`, `email_emp`, `cnpj`, `telefone_emp`, `senha_emp`, `cep_emp`, `uf_emp`, `cidade_emp`, `bairro_emp`, `endereco_emp`, `status_emp`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Girafas', 'girafas@gmail.com', '42782017000198', '6135912456', 'e10adc3949ba59abbe56e057f20f883e', '73000000', 'DF', 'Brasília', 'SOBRADINHO', 'Quadra 08 Cl 20', 1),
(13, 'Dominos', 'dominos@gmail.com', '96002006000177', '6135918788', 'e10adc3949ba59abbe56e057f20f883e', '73000111', 'DF', 'Brasília', 'SOBRADINHO', 'Quadra Cl 21', 1),
(14, 'mcdonalds', 'mcdolnads@gmail.com', '83092899000147', '6135916565', 'e10adc3949ba59abbe56e057f20f883e', '73050111', 'DF', 'Brasília', 'SOBRADINHO', 'quadra 10 cl 23', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `folga`
--

CREATE TABLE `folga` (
  `id_folga` int(11) NOT NULL,
  `data_inicial` varchar(10) NOT NULL,
  `data_final` varchar(10) NOT NULL,
  `quant_dias` int(4) NOT NULL,
  `observacao` varchar(45) NOT NULL,
  `fk_funcionario_folga` int(11) NOT NULL,
  `status_folga` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `folga`
--

INSERT INTO `folga` (`id_folga`, `data_inicial`, `data_final`, `quant_dias`, `observacao`, `fk_funcionario_folga`, `status_folga`) VALUES
(5, '2018-12-04', '2018-12-07', 4, 'Atestado', 10, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `folha`
--

CREATE TABLE `folha` (
  `id_folha` int(11) NOT NULL,
  `data` varchar(10) NOT NULL,
  `fk_empresa_folha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `folha`
--

INSERT INTO `folha` (`id_folha`, `data`, `fk_empresa_folha`) VALUES
(11, '01/12/2018', 12),
(12, '02/12/2018', 12),
(13, '01/12/2018', 13),
(14, '02/12/2018', 13),
(15, '01/12/2018', 14),
(16, '02/12/2018', 14),
(17, '03/12/2018', 12),
(18, '03/12/2018', 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id_fun` int(11) NOT NULL,
  `nome_fun` varchar(80) NOT NULL,
  `email_fun` varchar(80) NOT NULL,
  `cpf_fun` varchar(14) NOT NULL,
  `jornada` varchar(40) NOT NULL,
  `telefone_fun` varchar(14) NOT NULL,
  `status_fun` int(1) NOT NULL DEFAULT '1',
  `fk_empresa_fun` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id_fun`, `nome_fun`, `email_fun`, `cpf_fun`, `jornada`, `telefone_fun`, `status_fun`, `fk_empresa_fun`) VALUES
(10, 'Pedro Henrique ', 'pedro@gmail.com', '70240508106', 'SEG - SAB - 19H às 00H', '70240508106', 1, 12),
(11, 'Lucas Thiago', 'lucas@gmail.com', '57221785007', 'SEG - SAB - 13H às 19H', '57221785007', 1, 12),
(12, 'Matheus Jorge', 'matheus@gmail.com', '99484850090', 'TER - DOM - 19H às 00H', '99484850090', 1, 12),
(13, 'João Henrique ', 'joao@gmail.com', '32287913009', 'SEG - SAB - 19H às 00H', '32287913009', 1, 13),
(14, 'Jorge Henrique', 'jorge@gmail.com', '07246266038', 'SEG - SAB - 13H às 19H', '07246266038', 1, 13),
(15, 'Renato Henrique', 'renato@gmail.com', '50060538015', 'TER - DOM - 19H às 00H', '50060538015', 1, 13),
(16, 'Marcos Henrique ', 'marcos@gmail.com', '73223165096', 'TER - DOM - 13H às 19H', '73223165096', 1, 13),
(17, 'Bernado Henrique ', 'bernado@gmail.com', '98743210082', 'TER - DOM - 13H às 19H', '98743210082', 1, 13),
(18, 'Lucas Matheus', 'luc@gmail.com', '26106337004', 'SEG - SAB - 19H às 00H', '26106337004', 1, 14),
(19, 'Fernando Henrique', 'fernando@gmail.com', '47609174033', 'SEG - SAB - 13H às 19H', '47609174033', 1, 14),
(20, 'Jorge Paulo', 'paulo@gmail.com', '55748163004', 'TER - DOM - 19H às 00H', '55748163004', 1, 14);

-- --------------------------------------------------------

--
-- Estrutura da tabela `presenca`
--

CREATE TABLE `presenca` (
  `id_presenca` int(11) NOT NULL,
  `status_presenca` int(1) NOT NULL DEFAULT '1',
  `entrada` varchar(5) NOT NULL,
  `saida` varchar(5) NOT NULL,
  `fk_folha_presenca` int(11) NOT NULL,
  `fk_funcionario_presenca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `presenca`
--

INSERT INTO `presenca` (`id_presenca`, `status_presenca`, `entrada`, `saida`, `fk_folha_presenca`, `fk_funcionario_presenca`) VALUES
(16, 4, '', '', 11, 10),
(17, 4, '', '', 11, 10),
(18, 3, '08:41', '08:41', 11, 12),
(24, 2, '08:45', '', 17, 10),
(25, 2, '08:45', '', 17, 11),
(26, 2, '08:45', '', 17, 12),
(27, 3, '13:00', '19:00', 12, 10),
(28, 3, '13:00', '19:00', 12, 11),
(29, 3, '13:00', '19:00', 12, 12),
(30, 3, '13:00', '19:00', 12, 13),
(31, 3, '13:00', '19:00', 13, 14),
(32, 3, '13:00', '19:00', 13, 15),
(33, 3, '13:00', '19:00', 13, 16),
(34, 3, '13:00', '19:00', 13, 17),
(35, 3, '13:00', '19:00', 14, 14),
(36, 3, '13:00', '19:00', 14, 15),
(37, 3, '13:00', '19:00', 14, 16),
(38, 3, '13:00', '19:00', 14, 17),
(39, 4, '', '', 18, 13),
(40, 3, '09:46', '09:46', 18, 14),
(41, 2, '09:46', '', 18, 15),
(42, 2, '09:46', '', 18, 16),
(43, 2, '09:46', '', 18, 17);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_adm`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_emp`);

--
-- Indexes for table `folga`
--
ALTER TABLE `folga`
  ADD PRIMARY KEY (`id_folga`),
  ADD KEY `fk_funcionario_folga` (`fk_funcionario_folga`);

--
-- Indexes for table `folha`
--
ALTER TABLE `folha`
  ADD PRIMARY KEY (`id_folha`),
  ADD KEY `fk_empresa_folha` (`fk_empresa_folha`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id_fun`),
  ADD KEY `fk_empresa` (`fk_empresa_fun`);

--
-- Indexes for table `presenca`
--
ALTER TABLE `presenca`
  ADD PRIMARY KEY (`id_presenca`),
  ADD KEY `fk_funcionario_presenca` (`fk_funcionario_presenca`),
  ADD KEY `fk_folha_presenca` (`fk_folha_presenca`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_emp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `folga`
--
ALTER TABLE `folga`
  MODIFY `id_folga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `folha`
--
ALTER TABLE `folha`
  MODIFY `id_folha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_fun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `presenca`
--
ALTER TABLE `presenca`
  MODIFY `id_presenca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `folga`
--
ALTER TABLE `folga`
  ADD CONSTRAINT `folga_ibfk_1` FOREIGN KEY (`fk_funcionario_folga`) REFERENCES `funcionario` (`id_fun`);

--
-- Limitadores para a tabela `folha`
--
ALTER TABLE `folha`
  ADD CONSTRAINT `folha_ibfk_1` FOREIGN KEY (`fk_empresa_folha`) REFERENCES `empresa` (`id_emp`);

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`fk_empresa_fun`) REFERENCES `empresa` (`id_emp`);

--
-- Limitadores para a tabela `presenca`
--
ALTER TABLE `presenca`
  ADD CONSTRAINT `presenca_ibfk_1` FOREIGN KEY (`fk_funcionario_presenca`) REFERENCES `funcionario` (`id_fun`),
  ADD CONSTRAINT `presenca_ibfk_2` FOREIGN KEY (`fk_folha_presenca`) REFERENCES `folha` (`id_folha`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

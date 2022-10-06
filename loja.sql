-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06-Out-2022 às 04:51
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loja`
--
CREATE DATABASE IF NOT EXISTS `loja` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `loja`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idcliente`, `nome`, `telefone`, `email`, `senha`) VALUES
(1, 'admin', '96969-6969', 'admin', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE `pedido` (
  `idpedido` int(11) NOT NULL,
  `idcliente` int(11) DEFAULT NULL,
  `totalpedido` decimal(8,2) DEFAULT NULL,
  `datapedido` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `situacao` varchar(50) DEFAULT 'Espera',
  `entrega` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`idpedido`, `idcliente`, `totalpedido`, `datapedido`, `situacao`, `entrega`) VALUES
(1, 1, '6.00', '2022-10-06 00:58:35', 'Espera', NULL),
(2, 1, '6.00', '2022-10-06 02:48:29', 'Espera', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `imagem` varchar(50) DEFAULT NULL,
  `valor` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `descricao`, `tipo`, `imagem`, `valor`) VALUES
(4, 'Coca-Cola', 'Bebida gelada sabor cola ', 'Bebida', 'coca.png', '6.00'),
(5, 'Coxinha', 'Salgado frito recheado de frango ', 'Salgado', 'coxinha.png', '6.00'),
(6, 'Café', 'Bebida quente de grãos torrados do fruto do cafeeiro', 'Bebida', 'café.png', '2.00'),
(7, 'Salgadinho', 'Snack nos sabores (Churrasco, cebola, presunto, queijos, pimenta, pão de alho, costela com limão, pastel de carne, camarão com pimenta, bacon e calabresa)', 'Petisco', 'salgadinho.png', '5.00'),
(9, 'Bauru', 'Salgado assado recheado com presunto e queijo', 'Salgado', 'bauru.png', '5.00'),
(10, 'Hamburgão', 'Salgado assado recheada de hambúrguer e queijo cheddar', 'Salgado', 'burguer.png', '5.00'),
(11, 'Guaraná', 'Bebida gaseificada gelada sabor guaraná', 'Bebida', 'guarana.png', '5.00'),
(12, 'Folhado de frango', 'Salgado assado sabor frango', 'Salgado', 'folhado.png', '5.00'),
(13, 'Croissant', 'Salgado assado com sabores (quatro queijos, frango, presunto e queijo e chocolate)', 'Salgado', 'saint.png', '5.00'),
(14, 'Risole', 'Salgado sabor presunto e queijo', 'Salgado', 'risole.png', '5.00'),
(15, 'Suco DelVale', 'Suco nos sabores (Maracujá, uva, morango, caju, laranja, abacaxi, limão e pêssego)', 'Bebida', 'delvale.png', '5.00'),
(16, 'Pastel', 'Salgado frito nos sabores (Carne, queijo, carne com queijo, pizza, frango, bauru e banana com nutella) ', 'Salgado', 'pastel.png', '5.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

DROP TABLE IF EXISTS `venda`;
CREATE TABLE `venda` (
  `idvenda` int(11) NOT NULL,
  `idpedido` int(11) DEFAULT NULL,
  `idproduto` int(11) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `preco` float DEFAULT NULL,
  `total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`idvenda`, `idpedido`, `idproduto`, `quantidade`, `preco`, `total`) VALUES
(1, 1, 5, 1, 6, 6),
(2, 2, 4, 1, 6, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idpedido`),
  ADD KEY `fk_cliente` (`idcliente`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`idvenda`),
  ADD KEY `fk_produto` (`idproduto`),
  ADD KEY `fk_pedido` (`idpedido`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idpedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `idvenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_cliente` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`);

--
-- Limitadores para a tabela `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `fk_pedido` FOREIGN KEY (`idpedido`) REFERENCES `pedido` (`idpedido`),
  ADD CONSTRAINT `fk_produto` FOREIGN KEY (`idproduto`) REFERENCES `produto` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

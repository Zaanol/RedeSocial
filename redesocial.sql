-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: 11-Jul-2020 às 00:14
-- Versão do servidor: 10.1.39-MariaDB
-- versão do PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `redesocial`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `amizades`
--

CREATE TABLE `amizades` (
  `id` int(11) NOT NULL,
  `de` varchar(200) NOT NULL,
  `para` varchar(200) NOT NULL,
  `aceite` varchar(3) NOT NULL DEFAULT 'nao',
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `amizades`
--

INSERT INTO `amizades` (`id`, `de`, `para`, `aceite`, `data`) VALUES
(1, 'lili@gmail.com', 'rodrigo.dellagnolo@gmail.com', 'sim', '2020-06-20'),
(59, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', 'sim', '2020-06-27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `user` varchar(200) NOT NULL,
  `texto` text NOT NULL,
  `post` text NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `comentarios`
--

INSERT INTO `comentarios` (`id`, `user`, `texto`, `post`, `data`) VALUES
(1, 'cleiton@email.com', 'Muito boa a publicaÃ§Ã£o', '2', '2020-06-12'),
(2, 'willianzano@gmail.com', 'Ã“tima foto ', '4', '2020-06-20'),
(3, 'willianzano@gmail.com', 'Show de comment', '4', '2020-07-09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `loves`
--

CREATE TABLE `loves` (
  `id` int(11) NOT NULL,
  `user` varchar(200) NOT NULL,
  `pub` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `loves`
--

INSERT INTO `loves` (`id`, `user`, `pub`, `date`) VALUES
(2, 'lili@gmail.com', '4', '2020-06-20'),
(3, 'rodrigo.dellagnolo@gmail.com', '6', '2020-06-20'),
(4, 'rodrigo.dellagnolo@gmail.com', '1', '2020-06-20'),
(7, 'willianzano@gmail.com', '3', '2020-06-27'),
(21, 'cleiton@email.com', '2', '2020-06-27'),
(22, 'cleiton@email.com', '1', '2020-06-27'),
(23, 'rodrigo.dellagnolo@gmail.com', '2', '2020-06-27'),
(25, 'willianzano@gmail.com', '4', '2020-07-10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

CREATE TABLE `mensagens` (
  `id` int(11) NOT NULL,
  `de` varchar(200) NOT NULL,
  `para` varchar(200) NOT NULL,
  `texto` text NOT NULL,
  `imagem` text NOT NULL,
  `data` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `mensagens`
--

INSERT INTO `mensagens` (`id`, `de`, `para`, `texto`, `imagem`, `data`, `status`) VALUES
(1, 'cleiton@email.com', 'willianzano@gmail.com', '', '4773299produto5.jpg', '2020-06-12', 1),
(5, 'willianzano@gmail.com', 'cleiton@email.com', 'asdasd', '', '2020-06-12', 1),
(6, 'cleiton@email.com', 'willianzano@gmail.com', 'Ã‰ mensagem teste', '', '2020-06-12', 1),
(7, 'willianzano@gmail.com', 'cleiton@email.com', '89456', '', '2020-06-12', 1),
(8, 'cleiton@email.com', 'willianzano@gmail.com', 'sdsad', '', '2020-06-12', 1),
(9, 'lili@gmail.com', 'rodrigo.dellagnolo@gmail.com', 'OlÃ¡ amigo', '', '2020-06-20', 1),
(10, 'rodrigo.dellagnolo@gmail.com', 'lili@gmail.com', 'Oi tudo bem ?', '', '2020-06-20', 1),
(11, 'rodrigo.dellagnolo@gmail.com', 'lili@gmail.com', '', '6466132E.G.jpg', '2020-06-20', 1),
(12, 'rodrigo.dellagnolo@gmail.com', 'lili@gmail.com', 'Olha essa imagem', '', '2020-06-20', 1),
(13, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', 'OlÃ¡ amigo', '', '2020-06-20', 1),
(14, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', 'Tudo bem?', '', '2020-06-20', 1),
(15, 'willianzano@gmail.com', 'rodrigo.dellagnolo@gmail.com', 'OlÃ¡', '', '2020-06-20', 1),
(16, 'willianzano@gmail.com', 'rodrigo.dellagnolo@gmail.com', 'Tudo bem ?', '', '2020-06-20', 1),
(17, 'willianzano@gmail.com', 'rodrigo.dellagnolo@gmail.com', '', '1521889Briefing.pdf', '2020-06-20', 1),
(18, 'willianzano@gmail.com', 'rodrigo.dellagnolo@gmail.com', '', '2244082produto1.jpg', '2020-06-20', 1),
(19, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', 'Bonito esse not', '', '2020-06-20', 1),
(20, 'willianzano@gmail.com', 'rodrigo.dellagnolo@gmail.com', 'KKKKKKKKK', '', '2020-06-20', 1),
(21, 'willianzano@gmail.com', 'rodrigo.dellagnolo@gmail.com', 'Topzera, vamos ter que converter o chat pra AJAX, pq ', '', '2020-06-20', 1),
(22, 'willianzano@gmail.com', 'rodrigo.dellagnolo@gmail.com', 'Pq se nao ele fica atualizando sozinho', '', '2020-06-20', 1),
(25, 'willianzano@gmail.com', 'cleiton@email.com', 'aaaa', '', '2020-06-20', 1),
(26, 'cleiton@email.com', 'willianzano@gmail.com', 'aaaa', '', '2020-06-20', 1),
(27, 'cleiton@email.com', 'willianzano@gmail.com', 'bbbb', '', '2020-06-20', 1),
(28, 'cleiton@email.com', 'willianzano@gmail.com', 'ccccccc', '', '2020-06-20', 1),
(29, 'cleiton@email.com', 'willianzano@gmail.com', 'asdsadas', '', '2020-06-20', 1),
(30, 'cleiton@email.com', 'willianzano@gmail.com', 'aa', '', '2020-06-20', 1),
(31, 'cleiton@email.com', 'willianzano@gmail.com', 'adsadsa', '', '2020-06-20', 1),
(32, 'cleiton@email.com', 'willianzano@gmail.com', 'asdsad', '', '2020-06-20', 1),
(33, 'cleiton@email.com', 'willianzano@gmail.com', 'asdsa', '', '2020-06-20', 1),
(34, 'cleiton@email.com', 'willianzano@gmail.com', 'asdasd', '', '2020-06-20', 1),
(35, 'cleiton@email.com', 'willianzano@gmail.com', 'asdsad', '', '2020-06-20', 1),
(36, 'cleiton@email.com', 'willianzano@gmail.com', 'aaaa', '', '2020-06-20', 1),
(37, 'cleiton@email.com', 'willianzano@gmail.com', 'asdsad', '', '2020-06-20', 1),
(38, 'cleiton@email.com', 'willianzano@gmail.com', 'asddsa', '', '2020-06-20', 1),
(39, 'cleiton@email.com', 'willianzano@gmail.com', 'adsadsad', '', '2020-06-27', 1),
(40, 'cleiton@email.com', 'willianzano@gmail.com', 'sadsad', '', '2020-06-27', 1),
(41, 'cleiton@email.com', 'willianzano@gmail.com', 'sdas', '', '2020-06-27', 1),
(42, 'cleiton@email.com', 'willianzano@gmail.com', 'asdasdsad', '', '2020-07-05', 1),
(43, 'willianzano@gmail.com', 'cleiton@email.com', 'asdsa', '', '2020-07-05', 1),
(44, 'cleiton@email.com', 'willianzano@gmail.com', 'sadasd', '', '2020-07-05', 1),
(45, 'cleiton@email.com', 'willianzano@gmail.com', 'sdasd', '', '2020-07-05', 1),
(46, 'cleiton@email.com', 'willianzano@gmail.com', 'asdasd', '', '2020-07-05', 1),
(47, 'cleiton@email.com', 'willianzano@gmail.com', 'sdasd', '', '2020-07-05', 1),
(48, 'cleiton@email.com', 'willianzano@gmail.com', 'asdasd', '', '2020-07-05', 1),
(49, 'cleiton@email.com', 'willianzano@gmail.com', 'asdas', '', '2020-07-05', 1),
(50, 'cleiton@email.com', 'willianzano@gmail.com', 'asdasdas', '', '2020-07-05', 1),
(51, 'cleiton@email.com', 'willianzano@gmail.com', 'asdas', '', '2020-07-05', 1),
(52, 'cleiton@email.com', 'willianzano@gmail.com', 'asdasd', '', '2020-07-05', 1),
(53, 'cleiton@email.com', 'willianzano@gmail.com', 'asdasd', '', '2020-07-06', 1),
(54, 'cleiton@email.com', 'willianzano@gmail.com', 'asdsasdsa', '', '2020-07-06', 1),
(55, 'cleiton@email.com', 'willianzano@gmail.com', 'sdfdsfsd', '', '2020-07-06', 1),
(56, 'cleiton@email.com', 'willianzano@gmail.com', 'Teste de msg', '', '2020-07-06', 1),
(57, 'willianzano@gmail.com', 'cleiton@email.com', 'sdsa', '', '2020-07-06', 1),
(58, 'cleiton@email.com', 'willianzano@gmail.com', 'sdasd', '', '2020-07-06', 1),
(59, 'willianzano@gmail.com', 'cleiton@email.com', '', '3700406BPM TO BE.png', '2020-07-06', 1),
(60, 'cleiton@email.com', 'willianzano@gmail.com', 'asdas', '', '2020-07-06', 1),
(61, 'willianzano@gmail.com', '', ' teste de mensagem', '', '2020-07-07', 0),
(62, 'willianzano@gmail.com', '', ' aaaa', '', '2020-07-07', 0),
(63, 'willianzano@gmail.com', '', ' aaaa', '', '2020-07-07', 0),
(64, 'willianzano@gmail.com', '', ' aaaa', '', '2020-07-07', 0),
(65, 'willianzano@gmail.com', '', ' aaaa', '', '2020-07-07', 0),
(66, 'willianzano@gmail.com', 'rodrigo.dellagnolo@gmail.com', ' teste', '', '2020-07-07', 0),
(67, 'willianzano@gmail.com', 'rodrigo.dellagnolo@gmail.com', ' teste', '', '2020-07-07', 0),
(68, 'willianzano@gmail.com', 'rodrigo.dellagnolo@gmail.com', ' teste 123', '', '2020-07-07', 0),
(69, 'willianzano@gmail.com', 'rodrigo.dellagnolo@gmail.com', ' teste mensagem', '', '2020-07-07', 0),
(70, 'willianzano@gmail.com', 'rodrigo.dellagnolo@gmail.com', ' aaaa', '', '2020-07-07', 0),
(71, 'willianzano@gmail.com', 'rodrigo.dellagnolo@gmail.com', ' aaaa', '', '2020-07-07', 0),
(72, 'willianzano@gmail.com', 'rodrigo.dellagnolo@gmail.com', ' aaaa', '', '2020-07-07', 0),
(73, 'willianzano@gmail.com', 'rodrigo.dellagnolo@gmail.com', ' aaaa', '', '2020-07-07', 0),
(74, 'willianzano@gmail.com', 'rodrigo.dellagnolo@gmail.com', ' aaaa', '', '2020-07-07', 0),
(75, 'willianzano@gmail.com', 'rodrigo.dellagnolo@gmail.com', ' aaaa', '', '2020-07-07', 0),
(76, 'willianzano@gmail.com', 'rodrigo.dellagnolo@gmail.com', ' aaaa', '', '2020-07-07', 0),
(77, 'willianzano@gmail.com', 'rodrigo.dellagnolo@gmail.com', ' aaaa', '', '2020-07-07', 0),
(78, 'willianzano@gmail.com', 'rodrigo.dellagnolo@gmail.com', ' aaaa', '', '2020-07-07', 0),
(79, 'willianzano@gmail.com', 'cleiton@email.com', ' teste', '', '2020-07-07', 1),
(80, 'willianzano@gmail.com', 'rodrigo.dellagnolo@gmail.com', ' BB', '', '2020-07-07', 0),
(81, 'willianzano@gmail.com', 'rodrigo.dellagnolo@gmail.com', ' BB', '', '2020-07-07', 0),
(82, 'willianzano@gmail.com', 'cleiton@email.com', ' 123', '', '2020-07-07', 1),
(83, 'willianzano@gmail.com', 'cleiton@email.com', ' 123', '', '2020-07-07', 1),
(84, 'willianzano@gmail.com', 'cleiton@email.com', ' 123', '', '2020-07-07', 1),
(85, 'willianzano@gmail.com', 'cleiton@email.com', ' 123', '', '2020-07-07', 1),
(86, 'willianzano@gmail.com', 'cleiton@email.com', ' a', '', '2020-07-07', 1),
(87, 'willianzano@gmail.com', 'cleiton@email.com', ' a', '', '2020-07-07', 1),
(88, 'willianzano@gmail.com', 'cleiton@email.com', ' 1', '', '2020-07-07', 1),
(89, 'willianzano@gmail.com', 'cleiton@email.com', '123123123123123', '', '2020-07-07', 1),
(90, 'willianzano@gmail.com', 'cleiton@email.com', ' \'-__-\'', '', '2020-07-07', 1),
(91, 'willianzano@gmail.com', 'cleiton@email.com', ' 1', '', '2020-07-07', 1),
(92, 'willianzano@gmail.com', 'cleiton@email.com', ' 1', '', '2020-07-07', 1),
(93, 'willianzano@gmail.com', 'cleiton@email.com', ' 123123', '', '2020-07-07', 1),
(94, 'willianzano@gmail.com', 'cleiton@email.com', 'aaaaaa', '', '2020-07-07', 1),
(95, 'willianzano@gmail.com', 'cleiton@email.com', ' 1', '', '2020-07-07', 1),
(96, 'willianzano@gmail.com', 'cleiton@email.com', ' 205', '', '2020-07-07', 1),
(97, 'willianzano@gmail.com', 'cleiton@email.com', ' asdsadsa', '', '2020-07-07', 1),
(98, 'willianzano@gmail.com', 'cleiton@email.com', ' asdsadsa', '', '2020-07-07', 1),
(99, 'willianzano@gmail.com', 'cleiton@email.com', ' asdsadsa', '', '2020-07-07', 1),
(100, 'willianzano@gmail.com', 'cleiton@email.com', ' asdsadsa', '', '2020-07-07', 1),
(101, 'willianzano@gmail.com', 'cleiton@email.com', ' asdsadsa', '', '2020-07-07', 1),
(102, 'willianzano@gmail.com', 'cleiton@email.com', ' asdsadsa', '', '2020-07-07', 1),
(103, 'willianzano@gmail.com', 'cleiton@email.com', 'aaa', '', '2020-07-07', 1),
(104, 'willianzano@gmail.com', 'cleiton@email.com', '123', '', '2020-07-07', 1),
(105, 'willianzano@gmail.com', 'cleiton@email.com', ' a', '', '2020-07-07', 1),
(106, 'willianzano@gmail.com', 'cleiton@email.com', ' a', '', '2020-07-07', 1),
(107, 'willianzano@gmail.com', 'cleiton@email.com', ' a', '', '2020-07-07', 1),
(108, 'willianzano@gmail.com', 'cleiton@email.com', ' a', '', '2020-07-07', 1),
(109, 'willianzano@gmail.com', 'cleiton@email.com', ' a', '', '2020-07-07', 1),
(110, 'willianzano@gmail.com', 'cleiton@email.com', ' a', '', '2020-07-07', 1),
(111, 'willianzano@gmail.com', 'cleiton@email.com', '11', '', '2020-07-07', 1),
(112, 'willianzano@gmail.com', 'cleiton@email.com', ' 123456789', '', '2020-07-07', 1),
(113, 'willianzano@gmail.com', 'cleiton@email.com', ' 1', '', '2020-07-07', 1),
(114, 'cleiton@email.com', 'willianzano@gmail.com', ' aaa mano', '', '2020-07-07', 1),
(115, 'willianzano@gmail.com', 'cleiton@email.com', ' AAAA', '', '2020-07-07', 1),
(116, 'cleiton@email.com', 'willianzano@gmail.com', ' BBB', '', '2020-07-07', 1),
(117, 'willianzano@gmail.com', 'cleiton@email.com', ' asdsad', '', '2020-07-09', 0),
(118, 'willianzano@gmail.com', 'cleiton@email.com', ' aaa', '3700406BPM TO BE.png', '2020-07-09', 0),
(119, 'willianzano@gmail.com', 'cleiton@email.com', ' ', '', '2020-07-10', 0),
(120, 'willianzano@gmail.com', 'cleiton@email.com', ' ', '', '2020-07-10', 0),
(121, 'willianzano@gmail.com', 'cleiton@email.com', ' aa', '', '2020-07-10', 0),
(122, 'willianzano@gmail.com', 'cleiton@email.com', ' a', '', '2020-07-10', 0),
(123, 'willianzano@gmail.com', 'cleiton@email.com', ' a', '', '2020-07-10', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacoes`
--

CREATE TABLE `notificacoes` (
  `id` int(11) NOT NULL,
  `userde` varchar(200) NOT NULL,
  `userpara` varchar(200) NOT NULL,
  `tipo` varchar(1) NOT NULL DEFAULT '1',
  `post` text NOT NULL,
  `data` date NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `notificacoes`
--

INSERT INTO `notificacoes` (`id`, `userde`, `userpara`, `tipo`, `post`, `data`, `status`) VALUES
(1, 'cleiton@email.com', 'willianzano@gmail.com', '2', '2', '2020-06-12', 1),
(2, 'cleiton@email.com', 'willianzano@gmail.com', '1', '2', '2020-06-12', 1),
(3, 'lili@gmail.com', 'rodrigo.dellagnolo@gmail.com', '1', '4', '2020-06-20', 1),
(4, 'rodrigo.dellagnolo@gmail.com', 'lili@gmail.com', '1', '6', '2020-06-20', 0),
(5, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '1', '1', '2020-06-20', 1),
(6, 'willianzano@gmail.com', 'rodrigo.dellagnolo@gmail.com', '1', '4', '2020-06-20', 1),
(7, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '1', '2', '2020-06-20', 1),
(8, 'willianzano@gmail.com', 'rodrigo.dellagnolo@gmail.com', '2', '4', '2020-06-20', 1),
(9, 'willianzano@gmail.com', 'rodrigo.dellagnolo@gmail.com', '1', '3', '2020-06-27', 1),
(10, 'cleiton@email.com', 'willianzano@gmail.com', '1', '2', '2020-06-27', 1),
(11, 'cleiton@email.com', 'willianzano@gmail.com', '1', '2', '2020-06-27', 1),
(12, 'cleiton@email.com', 'willianzano@gmail.com', '1', '2', '2020-06-27', 1),
(13, 'cleiton@email.com', 'willianzano@gmail.com', '1', '1', '2020-06-27', 1),
(14, 'cleiton@email.com', 'willianzano@gmail.com', '1', '2', '2020-06-27', 1),
(15, 'cleiton@email.com', 'willianzano@gmail.com', '1', '1', '2020-06-27', 1),
(16, 'cleiton@email.com', 'willianzano@gmail.com', '1', '2', '2020-06-27', 1),
(17, 'cleiton@email.com', 'willianzano@gmail.com', '1', '1', '2020-06-27', 1),
(18, 'cleiton@email.com', 'willianzano@gmail.com', '1', '2', '2020-06-27', 1),
(19, 'cleiton@email.com', 'willianzano@gmail.com', '1', '1', '2020-06-27', 1),
(20, 'cleiton@email.com', 'willianzano@gmail.com', '1', '2', '2020-06-27', 1),
(21, 'cleiton@email.com', 'willianzano@gmail.com', '1', '2', '2020-06-27', 1),
(22, 'cleiton@email.com', 'willianzano@gmail.com', '1', '2', '2020-06-27', 1),
(23, 'cleiton@email.com', 'willianzano@gmail.com', '1', '2', '2020-06-27', 1),
(24, 'cleiton@email.com', 'willianzano@gmail.com', '1', '1', '2020-06-27', 1),
(25, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '1', '2', '2020-06-27', 1),
(26, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(27, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(28, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(29, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(30, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(31, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(32, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(33, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(34, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(35, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(36, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(37, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(38, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(39, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(40, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(41, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(42, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(43, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(44, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(45, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(46, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(47, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(48, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(49, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(50, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(51, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(52, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(53, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(54, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(55, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(56, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(57, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(58, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(59, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(60, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(61, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(62, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(63, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(64, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(65, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(66, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(67, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(68, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(69, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(70, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(71, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(72, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(73, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(74, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(75, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(76, 'rodrigo.dellagnolo@gmail.com', 'willianzano@gmail.com', '3', '', '2020-06-27', 1),
(77, 'cleiton@email.com', 'willianzano@gmail.com', '3', '', '2020-07-09', 1),
(78, 'cleiton@email.com', 'willianzano@gmail.com', '3', '', '2020-07-09', 1),
(79, 'willianzano@gmail.com', 'rodrigo.dellagnolo@gmail.com', '2', '4', '2020-07-09', 0),
(80, 'willianzano@gmail.com', 'cleiton@email.com', '3', '', '2020-07-09', 1),
(81, 'willianzano@gmail.com', 'rodrigo.dellagnolo@gmail.com', '1', '4', '2020-07-10', 0),
(82, 'willianzano@gmail.com', 'rodrigo.dellagnolo@gmail.com', '1', '4', '2020-07-10', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pubs`
--

CREATE TABLE `pubs` (
  `id` int(11) NOT NULL,
  `user` varchar(200) NOT NULL,
  `texto` text NOT NULL,
  `imagem` text NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pubs`
--

INSERT INTO `pubs` (`id`, `user`, `texto`, `imagem`, `data`) VALUES
(1, 'willianzano@gmail.com', 'Teste publicaxao', '909509banner.png', '2020-06-12'),
(2, 'willianzano@gmail.com', 'Teste de publicaÃ§Ã£o', '', '2020-06-12'),
(3, 'rodrigo.dellagnolo@gmail.com', 'OlÃ¡ boa noite', '', '2020-06-20'),
(4, 'rodrigo.dellagnolo@gmail.com', 'OlÃ¡ boa noite', '1801739c981ea2768d0bc6c0da15fd3712806b.jpg', '2020-06-20'),
(5, 'lili@gmail.com', 'Minha vida Ã© programar, sem programador a vida anda ao contrÃ¡rio!!!', '', '2020-06-20'),
(6, 'lili@gmail.com', 'Bela foto ', '274077caac7292447df0f7a4bb5e29c4492bb5.jpg', '2020-06-20'),
(7, 'willianzano@gmail.com', 'Imagem show', '920469BPM TO BE.png', '2020-07-09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `apelido` varchar(50) NOT NULL,
  `img` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(30) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `apelido`, `img`, `email`, `password`, `data`) VALUES
(4, 'Willian Zanol', 'Zanol', '2450426produto1.jpg', 'willianzano@gmail.com', '123456789', '2020-06-06'),
(5, 'Cleiton Rasta', 'Creito', '', 'cleiton@email.com', '123456789', '2020-06-12'),
(6, 'Rodrigo', 'Ro', '9901795WIN_20200214_14_00_47_Pro.jpg', 'rodrigo.dellagnolo@gmail.com', '99707526', '2020-06-20'),
(7, 'Lilia', 'Li', '', 'lili@gmail.com', '99707526', '2020-06-20'),
(8, 'Carlos Souza', 'Carlinhos', '', 'email@email.com', '123456789', '2020-06-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amizades`
--
ALTER TABLE `amizades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loves`
--
ALTER TABLE `loves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notificacoes`
--
ALTER TABLE `notificacoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pubs`
--
ALTER TABLE `pubs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amizades`
--
ALTER TABLE `amizades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `loves`
--
ALTER TABLE `loves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `notificacoes`
--
ALTER TABLE `notificacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `pubs`
--
ALTER TABLE `pubs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21/10/2023 às 22:21
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_fivestars`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cargo`
--

CREATE TABLE `cargo` (
  `Id_Cargo` int(11) NOT NULL,
  `Nome_Cargo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `cargo`
--

INSERT INTO `cargo` (`Id_Cargo`, `Nome_Cargo`) VALUES
(5, 'Ajudante Geral'),
(3, 'Balconista'),
(2, 'Caixa'),
(6, 'Garçom'),
(1, 'Gerente'),
(4, 'Pizzaiolo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `Id_Categoria` int(11) NOT NULL,
  `Nome_Categoria` varchar(20) DEFAULT NULL,
  `Comentario` varchar(100) DEFAULT NULL,
  `Imagem` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`Id_Categoria`, `Nome_Categoria`, `Comentario`, `Imagem`) VALUES
(1, 'Pizza Salgada', 'Nossa finalidade e levar para nossos cliente uma boa experiência com nossas pizzas.', 'pizza.jpg'),
(2, 'Pizza Doce', 'A pizza doce é um convite irresistível para os amantes de sabores ousados', 'pizzadoce.jpg'),
(3, 'Esfiha', ' As esfihas são uma explosão de sabores.', 'Esfiha.jpg'),
(4, 'Esfiha Doce', 'As esfihas doces são como abraços açucarados em forma de comida.', 'esfihadoce.png'),
(5, 'Bebidas', 'A parceria entre bebida e pizza é um casamento delicioso.', 'bebidas.jpeg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cep`
--

CREATE TABLE `cep` (
  `Id` int(11) NOT NULL,
  `Cep` varchar(9) DEFAULT NULL,
  `Cidade` varchar(30) DEFAULT NULL,
  `Logradouro` varchar(30) DEFAULT NULL,
  `Bairro` varchar(30) DEFAULT NULL,
  `Tipo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `cep`
--

INSERT INTO `cep` (`Id`, `Cep`, `Cidade`, `Logradouro`, `Bairro`, `Tipo`) VALUES
(1, '8253001', 'São Paulo', 'Virginia Ferni', 'Itaquera', 'Rua');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `Id_Cliente` int(11) NOT NULL,
  `Referencia` varchar(40) DEFAULT NULL,
  `Usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`Id_Cliente`, `Referencia`, `Usuario`) VALUES
(3, NULL, 27),
(7, NULL, 31),
(8, NULL, 32),
(31, 'bla bla bla', 55);

-- --------------------------------------------------------

--
-- Estrutura para tabela `configuracao`
--

CREATE TABLE `configuracao` (
  `Id_Config` int(11) NOT NULL,
  `Data` date DEFAULT NULL,
  `Abre` time DEFAULT NULL,
  `Fecha` time DEFAULT NULL,
  `NrPedido` int(11) DEFAULT NULL,
  `Mensagem` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `configuracao`
--

INSERT INTO `configuracao` (`Id_Config`, `Data`, `Abre`, `Fecha`, `NrPedido`, `Mensagem`) VALUES
(1, '2023-10-13', '18:00:00', '23:40:00', 1, 'Bla bl jjjjjssddddfc');

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresa`
--

CREATE TABLE `empresa` (
  `Id_Empresa` int(11) NOT NULL,
  `Nome_Empresa` varchar(60) DEFAULT NULL,
  `Fantasia` varchar(20) DEFAULT NULL,
  `Cnpj` varchar(18) DEFAULT NULL,
  `Ie` varchar(15) DEFAULT NULL,
  `Cep` varchar(9) DEFAULT NULL,
  `Endereco` varchar(50) DEFAULT NULL,
  `Numero` varchar(10) DEFAULT NULL,
  `Bairro` varchar(40) DEFAULT NULL,
  `Cidade` varchar(40) DEFAULT NULL,
  `Uf` varchar(2) DEFAULT NULL,
  `Telefone` varchar(15) DEFAULT NULL,
  `Site` varchar(50) DEFAULT NULL,
  `Data` date DEFAULT NULL,
  `Logo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `empresa`
--

INSERT INTO `empresa` (`Id_Empresa`, `Nome_Empresa`, `Fantasia`, `Cnpj`, `Ie`, `Cep`, `Endereco`, `Numero`, `Bairro`, `Cidade`, `Uf`, `Telefone`, `Site`, `Data`, `Logo`) VALUES
(1, 'Pizzaria Five Stars', 'Five Stars', '34.094.488/0001-85', '419.405.659.082', '08253-000', 'Rua Virgínia Ferni', '400', 'José Bonifácio', 'São Paulo', 'SP', '(11) 22547-627', 'fivestars.com.br', '2023-10-14', 'logoPizzaria1.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `entregador`
--

CREATE TABLE `entregador` (
  `Id_Entregador` int(11) NOT NULL,
  `Veiculo` varchar(10) DEFAULT NULL,
  `Identificacao` varchar(45) DEFAULT NULL,
  `Usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `entregador`
--

INSERT INTO `entregador` (`Id_Entregador`, `Veiculo`, `Identificacao`, `Usuario`) VALUES
(1, 'Carro', 'BRA2A23', 20);

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `Id_Funcionario` int(11) NOT NULL,
  `Cargo` int(11) DEFAULT NULL,
  `Perfil` int(11) DEFAULT NULL,
  `Salario` float DEFAULT NULL,
  `Usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`Id_Funcionario`, `Cargo`, `Perfil`, `Salario`, `Usuario`) VALUES
(1, 1, 1, 15000, 1),
(2, 1, 1, 3000, 15),
(8, 5, 2, 110, 24);

-- --------------------------------------------------------

--
-- Estrutura para tabela `perfil`
--

CREATE TABLE `perfil` (
  `Id_Perfil` int(11) NOT NULL,
  `Acessa_Cliente` tinyint(1) DEFAULT NULL,
  `Acessa_Funcionario` tinyint(1) DEFAULT NULL,
  `Acessa_Produto` tinyint(1) DEFAULT NULL,
  `Acessa_Entregador` tinyint(1) DEFAULT NULL,
  `Acessa_Status` tinyint(1) DEFAULT NULL,
  `Acessa_Venda` tinyint(1) DEFAULT NULL,
  `Acessa_Carrinho` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `perfil`
--

INSERT INTO `perfil` (`Id_Perfil`, `Acessa_Cliente`, `Acessa_Funcionario`, `Acessa_Produto`, `Acessa_Entregador`, `Acessa_Status`, `Acessa_Venda`, `Acessa_Carrinho`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1),
(2, 1, 0, 1, 0, 1, 1, 1),
(3, 0, 0, 1, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `Id_Produto` int(11) NOT NULL,
  `Cod_Produto` varchar(13) DEFAULT NULL,
  `Nome_Produto` varchar(35) DEFAULT NULL,
  `Desc_Produto` varchar(100) DEFAULT NULL,
  `Estoque` int(11) DEFAULT NULL,
  `Estoque_Min` int(11) DEFAULT NULL,
  `Estoque_Max` int(11) DEFAULT NULL,
  `Valor` float DEFAULT NULL,
  `Status_Produto` varchar(1) DEFAULT NULL,
  `Imagem` varchar(50) DEFAULT NULL,
  `Categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`Id_Produto`, `Cod_Produto`, `Nome_Produto`, `Desc_Produto`, `Estoque`, `Estoque_Min`, `Estoque_Max`, `Valor`, `Status_Produto`, `Imagem`, `Categoria`) VALUES
(1, '1001', 'Pizza Alho', 'Alho, Molho de tomate e mussarela        ', 0, 0, 0, 50.99, '1', 'pizzaAtum.jpg', 1),
(2, '1002', 'Pizza Atum          ', 'Atum e cebola                                                       ', 0, 0, 0, 31.99, '1', 'pizzaAtum.jpg                ', 1),
(3, '1003', 'Pizza Bacon         ', 'Bacon e mussarela                                                   ', 0, 0, 0, 39.99, '1', 'pizzaBacon.png', 1),
(4, '1004', 'Pizza Baiana        ', 'Calabresa moída, ovo, cebola e pimenta                              ', 0, 0, 0, 31.99, '1', 'pizzaBaiana.png', 1),
(5, '1005', 'Pizza Bauru         ', 'Presunto, mussarela e rodelas de tomate                             ', 0, 0, 0, 29.99, '1', 'pizzaBauru.png               ', 1),
(6, '1006', 'Pizza Brasileira    ', 'Atum, ovo, palmito, mussarela, bacon e camarão                      ', 0, 0, 0, 41, '1', 'pizzaBrasileira.png          ', 1),
(7, '1007', 'Pizza Brócolis      ', 'Brócolis, ovo, cebola, bacon e mussarela                            ', 0, 0, 0, 41.99, '1', 'pizzaBrocolis.png', 1),
(8, '1008', 'Pizza Caipira       ', 'Frango desfiado,milho verde com cobertura de catupiry               ', 0, 0, 0, 39.99, '1', 'pizzaCaipira.png             ', 1),
(9, '1009', 'Pizza Calabacon     ', 'Calabresa fatiada, catupiry e bacon                                 ', 0, 0, 0, 39.99, '1', 'pizzaCalabacon.png', 1),
(10, '1010', 'Pizza Calabresa     ', 'Calabresa e cebola                                                  ', 0, 0, 0, 29.99, '1', 'pizzaCalabresa.png', 1),
(11, '1011', 'Pizza Calamussa     ', 'Calabresa e mussarela                                               ', 0, 0, 0, 41.99, '1', 'pizzaCalabresaMussarela.png  ', 1),
(12, '1012', 'Pizza Camarão       ', 'Camarão temperado, com mussarela ou catupiry                        ', 0, 0, 0, 64.99, '1', 'pizzaCamarao.png', 1),
(13, '1013', 'Pizza Carne Seca    ', 'Carne seca,catupiry e mussarela                                     ', 0, 0, 0, 57.99, '1', 'pizzaCarneSeca.png', 1),
(14, '1014', 'Pizza Champignom    ', 'Champignom coberto com mussarela                                    ', 0, 0, 0, 39.99, '1', 'pizzaChampignon.png', 1),
(15, '1015', 'Pizza Dois Queijos  ', 'Mussarela e catupiry                                                ', 0, 0, 0, 37.99, '1', 'pizzaDoisQueijos.png', 1),
(16, '1016', 'Pizza Escarola      ', 'Escarola, mussarela e bacon                                         ', 0, 0, 0, 29.99, '1', 'pizzaEscarola.png            ', 1),
(17, '1017', 'Pizza Frango        ', 'Frango desfiado temperado e cheddar                                 ', 0, 0, 0, 35, '1', 'pizzaFrango.png              ', 1),
(18, '1018', 'Pizza Frango com Catupiry', 'Frango desfiado temperado com catupiry                              ', 0, 0, 0, 41.99, '1', 'pizzaFrangoCatupiry.png', 1),
(19, '1019', 'Pizza Italiana      ', 'Calabresa, Salame, Pimentão Verde e Azeitonas Pretas Fatiadas       ', 0, 0, 0, 35.99, '1', 'pizzaItaliana.png', 1),
(20, '1020', 'Pizza Lombo', 'Lombo fatiado, mussarela e bacon                                    ', 0, 0, 0, 41.99, '1', 'pizzaLombo.png               ', 1),
(21, '1021', 'Pizza Marguerita    ', 'Mussarela, parmesão e manjericão                                    ', 0, 0, 0, 41.99, '1', 'pizzaMarguerita.png', 1),
(22, '1022', 'Pizza Mexicana      ', 'Milho verde, bacon e azeitona                                       ', 0, 0, 0, 36.99, '1', 'pizzaMexicana.png            ', 1),
(23, '1023', 'Pizza Milho', 'Milho verde e catupiry                                              ', 0, 0, 0, 29.99, '1', 'pizzaMilho.png               ', 1),
(24, '1024', 'Pizza Modinha       ', 'Presunto, mussarela e ovo                                           ', 0, 0, 0, 41.99, '1', 'pizzaModinha.png', 1),
(25, '1025', 'Pizza Mussarela     ', 'Mussarela e azeitonas                                               ', 0, 0, 0, 34.99, '1', 'pizzaMussarela.png', 1),
(26, '1026', 'Pizza Napolitana    ', 'Mussarela, rodelas de tomate e parmesão ralada                      ', 0, 0, 0, 31.99, '1', 'pizzaNapolitana.png', 1),
(27, '1027', 'Pizza Pepperone     ', 'Queijo Pepperone                                                    ', 0, 0, 0, 41.99, '1', 'pizzaPeperrone.png', 1),
(28, '1028', 'Pizza Portuguesa ', 'Mussarela, presunto, ovo cozido e cebola ', 0, 0, 0, 39.99, '1', 'pizzaPortuguesa.png', 1),
(29, '1029', 'Pizza Toscana ', 'Calabresa moída e mussarela                                         ', 0, 0, 0, 29.99, '1', 'pizzaToscana.png', 1),
(30, '1030', 'Pizza Vegetariana ', 'Mussarela, tomates, champignon, pimentão, cebola e azeitonas verdes ', 0, 0, 0, 54.99, '1', 'pizzaVegetariana.png', 1),
(31, '2031', 'Pizza Banana        ', 'Banana, leite condesado e canela em pó                              ', 0, 0, 0, 42.99, '1', 'pizzaBanana.png              ', 2),
(32, '2032', 'Pizza Brigadeiro    ', 'Chocolate ao leite e chocolate granulado                            ', 0, 0, 0, 44.99, '1', 'pizzaBrigadeiro.png          ', 2),
(33, '2033', 'Pizza Romeu e Julieta', 'Goiabada e mussarela                                                ', 0, 0, 0, 44.99, '1', 'pizzaRomeuJulieita.png', 2),
(34, '2034', 'Pizza Sensação      ', 'Morango, chocolate e leite condesado                                ', 0, 0, 0, 35, '1', 'pizzaSensacao.png', 2),
(35, '2035', 'Pizza Prestígio     ', 'Chocolate, coco ralado e leite condesado                            ', 0, 0, 0, 35, '1', 'pizzaPrestigio.png           ', 2),
(36, '2036', 'Pizza BIS           ', 'Chocolate e Bis                                                     ', 0, 0, 0, 35, '1', 'pizzaBIS.png', 2),
(37, '2037', 'Pizza M&M´s         ', 'Chocolate M&M´s                                                     ', 0, 0, 0, 35, '1', 'pizzaMM.png                  ', 2),
(38, '3038', 'Esfiha Atum         ', 'Atum                                                                ', 0, 0, 0, 4, '1', 'esfihaAtum.png               ', 3),
(39, '3039', 'Esfiha Atum com Queijo', 'Atum com queijo                                                     ', 0, 0, 0, 4, '1', 'esfihaAtumQueijo.png         ', 3),
(40, '3040', 'Esfiha Calabresa com Catupiry', 'Calabresa moída e catupity                                          ', 0, 0, 0, 4, '1', 'espihaCalabresaCatupiry.png  ', 3),
(41, '3041', 'Esfiha Calabresa com Queijo', 'Calabresa moída e queijo                                            ', 0, 0, 0, 4, '1', 'espihaCalabresaQueijo.png    ', 3),
(42, '3042', 'Esfiha Carne        ', 'Carne moída                                                         ', 0, 0, 0, 4, '1', 'espihaCarne.png', 3),
(43, '3043', 'Esfiha Escarola e Queijo', 'Escarola e queijo mussarela                                         ', 0, 0, 0, 4, '1', 'espihaEscarolaQueijo.png', 3),
(44, '3044', 'Esfiha Frango       ', 'Frango desfiado                                                     ', 0, 0, 0, 4, '1', 'espihaFrango.png', 3),
(45, '3045', 'Esfiha Frango  com Catupiry', 'Frango desfiado e catupiry                                          ', 0, 0, 0, 4, '1', 'espihaFrangoCatupiry.png     ', 3),
(46, '3046', 'Esfiha Queijo       ', 'Queijo mussarela                                                    ', 0, 0, 0, 4, '1', 'esfihaQueijo.png', 3),
(47, '4047', 'Esfiha Banana       ', 'Banana, leite condesado e canela em pó                              ', 0, 0, 0, 5, '1', 'espihaBanana.png             ', 4),
(48, '4048', 'Esfiha Brigadeiro   ', 'Chocolate e granulado                                               ', 0, 0, 0, 5, '1', 'espihaBrigadeiro.png', 4),
(49, '4049', 'Esfiha Chocolate com M&M´s', 'Chocolate e m&m´s                                                   ', 0, 0, 0, 5, '1', 'espihaMM.png                 ', 4),
(51, '4051', 'Esfiha Prestígio    ', 'Chocolate, coco ralado e leite condesado                            ', 0, 0, 0, 5, '1', 'espihaPrestigio.png          ', 4),
(52, '4052', 'Esfiha Romeu e Julieta', 'Goiabada e mussarela                                                ', 0, 0, 0, 5, '1', 'espihaRomeuJulieta.png', 4),
(53, '5053', 'Coca-Cola 350ml     ', 'Coca-Cola 350ml                                                     ', 0, 0, 0, 9, '1', 'Coca350ml.png', 5),
(54, '5054', 'Coca-Cola 2 litros  ', 'Coca-Cola 2 litros                                                  ', 0, 0, 0, 15, '1', 'Coca2litros.png              ', 5),
(55, '5055', 'Coca-Cola Zero 350ml', 'Coca-Cola Zero 350ml                                                ', 0, 0, 0, 9, '1', 'Cocazero350ml.png            ', 5),
(56, '5056', 'Coca-Cola  Zero 2 litros', 'Coca-Cola  Zero 2 Litros                                            ', 0, 0, 0, 15, '1', 'Cocazero2litros.png          ', 5),
(57, '5057', 'Fanta Laranja 350 ml', 'Fanta Laranja 350 ml                                                ', 0, 0, 0, 9, '1', 'Fantalaranja350ml.png', 5),
(58, '5058', 'Fanta Laranja 2 litros', 'Fanta Laranja 2 litros                                              ', 0, 0, 0, 15, '1', 'Fanta2litros.png             ', 5),
(59, '5059', 'Fanta Uva 350ml     ', 'Fanta Uva 350 ml                                                    ', 0, 0, 0, 9, '1', 'FantaUva350ml.png', 5),
(60, '5060', 'Fanta Uva 2 litros  ', 'Fanta Uva 2 litros                                                  ', 0, 0, 0, 15, '1', 'FantaUva2litros.png          ', 5),
(61, '5061', 'Guaraná Antartica 350ml ', 'Guaraná Antartica 350ml                                             ', 0, 0, 0, 9, '1', 'Guarana350ml.png', 5),
(62, '5062', 'Guaraná Antártica 2 litros     ', 'Guaraná Antártica 2 litros                                          ', 0, 0, 0, 15, '1', 'Guarana2litros.png', 5),
(63, '5063', 'Sprite 350ml        ', 'Sprite 350ml                                                        ', 0, 0, 0, 9, '1', 'Sprite350ml.png', 5),
(64, '5064', 'Sprite 2 litros     ', 'Sprite 2 litros                                                     ', 0, 0, 0, 15, '1', 'sprite2litros.png', 5),
(65, '5065', 'Pepsi 350ml         ', 'Pepsi 350ml                                                         ', 0, 0, 0, 9, '1', 'pepsi350ml.png', 5),
(66, '5066', 'Pepsi 2 litros      ', 'Pepsi 2 litros                                                      ', 0, 0, 0, 15, '1', 'Pepsi2litros.png', 5),
(67, '5067', 'Pepsi Zero 350ml    ', 'Pepsi Zero 350ml                                                    ', 0, 0, 0, 9, '1', 'PepsiZero.png', 5),
(68, '5068', 'Água Mineral 350ml  ', 'Água Mineral 350ml                                                  ', 0, 0, 0, 5, '1', 'aguaMineral.png', 5),
(69, '5069', 'Água com Gás 350ml  ', 'Água com Gás 350ml                                                  ', 0, 0, 0, 6, '1', 'AguacomGas.png               ', 5),
(70, '5070', 'Água Tônica Schweppes 350ml       ', 'Água Tônica Schweppes 350ml                                         ', 0, 0, 0, 7, '1', 'AguaTonica.jpg               ', 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `Id_Usuario` int(11) NOT NULL,
  `Nome_Usuario` varchar(45) DEFAULT NULL,
  `Senha` varchar(100) DEFAULT NULL,
  `Sexo` varchar(1) DEFAULT NULL,
  `Cep` int(11) DEFAULT NULL,
  `Numero` varchar(10) DEFAULT NULL,
  `Complemento` varchar(45) DEFAULT NULL,
  `Telefone` varchar(15) DEFAULT NULL,
  `Email` varchar(60) DEFAULT NULL,
  `Nascimento` date DEFAULT NULL,
  `Foto` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`Id_Usuario`, `Nome_Usuario`, `Senha`, `Sexo`, `Cep`, `Numero`, `Complemento`, `Telefone`, `Email`, `Nascimento`, `Foto`) VALUES
(1, 'Felipe Cerqueira', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'm', 1, '400', 'Escola', '(11) 99593-7887', 'felipe@pizza.com', '2005-09-02', 'semfoto.jpg'),
(15, 'Ingrid Passos', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'f', 1, '400', 'Escola', '(11) 11111-1111', 'ingrid@pizza.com', '2003-02-14', 'semfoto.jpg'),
(20, 'Pedro Henrique', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'n', 1, '9', 'Escola', '(11) 11111-1111', 'pedro@pizza.com', '2023-09-07', NULL),
(24, 'Matheus', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'm', 1, '07', '505', '(11) 11111-1111', 'matheus@pizza.com', '2023-08-28', ''),
(27, NULL, '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', NULL, NULL, NULL, NULL, NULL, 'Lucas@gmail.com', NULL, NULL),
(31, NULL, '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', NULL, NULL, NULL, NULL, NULL, 'Bruno@gmail.com', NULL, NULL),
(32, NULL, '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', NULL, NULL, NULL, NULL, NULL, 'Murilo@gmail.com', NULL, NULL),
(55, 'Leandro', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'm', 1, '4', 'Escola', '(22) 22222-2222', 'leandro@gmail.com', '2020-01-14', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`Id_Cargo`),
  ADD UNIQUE KEY `Nome_Cargo` (`Nome_Cargo`);

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`Id_Categoria`);

--
-- Índices de tabela `cep`
--
ALTER TABLE `cep`
  ADD PRIMARY KEY (`Id`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Id_Cliente`),
  ADD KEY `Usuario` (`Usuario`);

--
-- Índices de tabela `configuracao`
--
ALTER TABLE `configuracao`
  ADD PRIMARY KEY (`Id_Config`);

--
-- Índices de tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`Id_Empresa`);

--
-- Índices de tabela `entregador`
--
ALTER TABLE `entregador`
  ADD PRIMARY KEY (`Id_Entregador`),
  ADD KEY `Usuario` (`Usuario`);

--
-- Índices de tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`Id_Funcionario`),
  ADD KEY `Cargo` (`Cargo`),
  ADD KEY `Perfil` (`Perfil`),
  ADD KEY `Usuario` (`Usuario`);

--
-- Índices de tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`Id_Perfil`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`Id_Produto`),
  ADD UNIQUE KEY `Cod_Produto` (`Cod_Produto`),
  ADD KEY `Categoria` (`Categoria`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id_Usuario`),
  ADD UNIQUE KEY `Nome_Usuario` (`Nome_Usuario`),
  ADD KEY `Cep` (`Cep`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cargo`
--
ALTER TABLE `cargo`
  MODIFY `Id_Cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `Id_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `cep`
--
ALTER TABLE `cep`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `Id_Cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `configuracao`
--
ALTER TABLE `configuracao`
  MODIFY `Id_Config` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `Id_Empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `entregador`
--
ALTER TABLE `entregador`
  MODIFY `Id_Entregador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `Id_Funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `Id_Perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `Id_Produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`Usuario`) REFERENCES `usuario` (`Id_Usuario`);

--
-- Restrições para tabelas `entregador`
--
ALTER TABLE `entregador`
  ADD CONSTRAINT `entregador_ibfk_1` FOREIGN KEY (`Usuario`) REFERENCES `usuario` (`Id_Usuario`);

--
-- Restrições para tabelas `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`Cargo`) REFERENCES `cargo` (`Id_Cargo`),
  ADD CONSTRAINT `funcionario_ibfk_2` FOREIGN KEY (`Perfil`) REFERENCES `perfil` (`Id_Perfil`),
  ADD CONSTRAINT `funcionario_ibfk_3` FOREIGN KEY (`Usuario`) REFERENCES `usuario` (`Id_Usuario`);

--
-- Restrições para tabelas `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`Categoria`) REFERENCES `categoria` (`Id_Categoria`);

--
-- Restrições para tabelas `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`Cep`) REFERENCES `cep` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

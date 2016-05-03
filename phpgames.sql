-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 03-Maio-2016 às 06:46
-- Versão do servidor: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phpgames`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE IF NOT EXISTS `avaliacao` (
  `ava_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario_id` int(10) unsigned NOT NULL,
  `avaliacao` int(10) unsigned NOT NULL,
  `noticia_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ava_id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `noticia_id` (`noticia_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `avaliacao`
--

INSERT INTO `avaliacao` (`ava_id`, `usuario_id`, `avaliacao`, `noticia_id`) VALUES
(1, 3, 1, 2),
(2, 4, 2, 2),
(4, 3, 2, 1),
(5, 0, 1, 2),
(9, 4, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `categoria_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categoria` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`categoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`categoria_id`, `categoria`) VALUES
(1, 'Android'),
(2, 'PC');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `comentario_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario_id` int(10) unsigned NOT NULL,
  `mensagem` text NOT NULL,
  `noticia_id` int(10) unsigned NOT NULL,
  `data_coment` datetime NOT NULL,
  PRIMARY KEY (`comentario_id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `noticia_id` (`noticia_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `comentarios`
--

INSERT INTO `comentarios` (`comentario_id`, `usuario_id`, `mensagem`, `noticia_id`, `data_coment`) VALUES
(3, 3, 'testando', 2, '2016-04-01 14:12:32'),
(4, 3, 'OIE', 2, '2016-05-01 20:31:18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel_usuario`
--

CREATE TABLE IF NOT EXISTS `nivel_usuario` (
  `nivel_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nivel_usuario` int(10) unsigned NOT NULL,
  `nome_nivel` varchar(15) NOT NULL,
  PRIMARY KEY (`nivel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `nivel_usuario`
--

INSERT INTO `nivel_usuario` (`nivel_id`, `nivel_usuario`, `nome_nivel`) VALUES
(1, 0, 'Leitor comum'),
(2, 1, 'Moderador'),
(3, 2, 'Administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `noticia_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `corpo` mediumtext NOT NULL,
  `data_noticia` datetime NOT NULL,
  `thumbnail` varchar(40) NOT NULL,
  `categoria_id` int(10) unsigned NOT NULL,
  `usuario_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`noticia_id`),
  KEY `categoria_id` (`categoria_id`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`noticia_id`, `titulo`, `corpo`, `data_noticia`, `thumbnail`, `categoria_id`, `usuario_id`) VALUES
(1, 'Minecraft estÃ¡ sendo jogado por uma inteligÃªncia artificial', 'Depois de uma versÃ£o educacional de Minecraft para humanos, a Microsoft anunciou que seus cientistas de computaÃ§Ã£o de seu laboratÃ³rio de pesquisas estÃ£o usando o game da Mojang como ferramenta de aprendizado para uma InteligÃªncia Artificial, usando a sua plataforma recÃ©m anunciada, a Project AIX.\r\n\r\nClaramente nÃ£o contente com os mais de 100 milhÃµes de jogadores registrados apenas no PC, a plataforma coloca Ãªnfase nÃ£o em programar a IA para realizar tarefas, mas para "aprender" a realizÃ¡-las de forma orgÃ¢nica. Em um post no blog da Microsoft sobre o projeto, um exemplo dado foi o da IA aprendendo a escalar atÃ© o ponto mais alto em um mapa de Minecraft, da mesma forma que um jogador humano inexperiente faria -- fazendo a leitura do mundo a sua volta e encontrando lugares por onde ele pode ou nÃ£o viajar. Ela descobre isso, por exemplo, morrendo repetidas vezes ao cair nos veios de lava do game.', '2016-03-15 01:07:22', '20160315minecraft.jpg', 2, 3),
(2, 'Clash Royale: Dicas com os Melhores decks para iniciantes', 'Clash Royale, o game de cartas e estratÃ©gia da Supercell estÃ¡ bombando. Entretanto, muita gente nÃ£o sabe como jogar direito e toma um couro dos adversÃ¡rios nas primeiras partidas depois do treinamento. Confira os melhores decks para avanÃ§ar rapidamente no jogo.\r\n\r\nAviso: vale lembrar que as dicas aqui Ã© para as Arenas Iniciais (de 1 a 3), muitos combos e estratÃ©gias podem nÃ£o funcionar se vocÃª jÃ¡ estÃ¡ na Arena 4 e possui cartas melhores.\r\n\r\nDeck de Iniciante NÂ° 1\r\nCerto, vocÃª terminou o treinamento inicial de Clash Royale e estÃ¡ na sua primeira arena. Vamos supor que vocÃª ganhou o PrÃ­ncipe e jÃ¡ possua tambÃ©m o Gigante e a Mosqueteira. O deck a seguir Ã© ideal para utilizar o combo â€œGigante+PrÃ­ncipeâ€œ. A estratÃ©gia funciona da seguinte forma: vocÃª irÃ¡ fingir defender um lado do campo, colocando tropas de baixo custo de elixir. Assim que o oponente colocar uma tropa de custo alto em um lado do campo (um gigante, por exemplo), vocÃª ataca pelo outro.\r\n\r\nEspere atÃ© ter 9 de mana para lanÃ§ar o Gigante e em seguida o PrÃ­ncipe (Durante a invocaÃ§Ã£o do gigante, vocÃª ganha o elixir restante para invocar o PrÃ­ncipe).\r\n\r\nO que irÃ¡ acontecer Ã© que o adversÃ¡rio precisarÃ¡ esperar alguns segundos atÃ© seu elixir encher para ele lanÃ§ar uma tropa forte para conter o ataque. AtÃ© aÃ­, jÃ¡ serÃ¡ tarde demais. Pois o PrÃ­ncipe e o Gigante conseguem destruir a primeira torre de modo muito fÃ¡cil (quando se estÃ¡ nos nÃ­veis de XP iniciais, do 1 ao 3).\r\n\r\nEm seguida, eles partem para o castelo e vocÃª jÃ¡ estarÃ¡ com a vitÃ³ria praticamente nas mÃ£os. Esse combo Ã© ainda mais surpreendente quando falta menos de um minuto para encerrar a partida e o jogo dobra a velocidade do Elixir.\r\n\r\nA condiÃ§Ã£o de vitÃ³ria desse deck Ã© o combo. Portanto Ã© preciso treinar para executÃ¡-lo com maestria. VocÃª pode fazer algumas substituiÃ§Ãµes, mas nÃ£o fique sem cartas que enfrentem inimigos no ar. SÃ£o essenciais: Arqueiras, Goblin Lanceiro ou cabana de Goblins. Se vocÃª jÃ¡ tiver DragÃ£o ou Servos, melhor ainda.\r\n\r\nCounter: Esse ataque pode ser perfeitamente defendido por tropas aÃ©reas e pela carta ExÃ©rcito de Esqueletos. Fique atento para nÃ£o cair na armadilha do inimigo que possuir essa carta. Se possÃ­vel, coloque no deck a carta Flechas e fique com ela apontada para o Gigante, esperando o ExÃ©rcito de Esqueletos.\r\n\r\nDeck de Iniciante NÂ° 2\r\nBom, como gostamos de ver o circo, ou melhor, o torneio de Clash Royale pegar fogo, nosso prÃ³ximo deck de iniciante serÃ¡ justamente o que â€œcounteraâ€ o combo â€œGigante+PrÃ­ncipeâ€. No deck a seguir, a estrela Ã© justamente a carta mais odiada pelo Gigante e pelo PrÃ­ncipe: ExÃ©rcito de Esqueletos.\r\n\r\nA estratÃ©gia do deck Ã© o contra-ataque com um uso massivo de tropas. No comeÃ§o, vocÃª irÃ¡ lanÃ§ar tropas de baixo custo para defender suas torres como Arqueiras e Goblins Lanceiros. Depois de algum tempo o oponente pode tentar o combo â€œGigante+PrÃ­ncipeâ€. Neste momento lance o ExÃ©rcito de Esqueletos e tropas aÃ©reas se vocÃª tiver. Ambos o Gigante e o PrÃ­ncipe serÃ£o derrotados em segundos e suas tropas excedentes vÃ£o partir para o ataque.\r\n\r\nO conceito do deck consiste em floodar a mesa com muitas tropas em ambos os lados. A ideia por trÃ¡s disso, Ã© evitar que todas as suas tropas sejam destruÃ­das por feitiÃ§os com dano em Ã¡rea como Bolas de Fogo e Flechas. Se o oponente tiver a carta ValquÃ­ria, espere ele usÃ¡-la, e lance o ExÃ©rcito de Esqueletos do outro lado do campo. Acredite, eles nÃ£o tÃªm a menor chance contra essa guerreira. VocÃª pode substituir BebÃª DragÃ£o por Servos e BÃ¡rbaros pela Bruxa.\r\n\r\nCounter: O grande perigo desse deck sÃ£o magias e a ValquÃ­ria, TambÃ©m Ã© preciso dar suporte aÃ©reo com o BebÃª DragÃ£o ou Servos.', '2016-03-15 15:42:49', 'maxresdefault-12.jpg', 1, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuario_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `sobrenome` varchar(40) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `pass` char(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `nivel_usuario` int(11) NOT NULL,
  `data_registro` datetime NOT NULL,
  `user_img` varchar(40) NOT NULL,
  PRIMARY KEY (`usuario_id`),
  UNIQUE KEY `apelido` (`usuario`),
  UNIQUE KEY `email` (`email`),
  KEY `login` (`usuario`,`pass`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `nome`, `sobrenome`, `usuario`, `pass`, `email`, `nivel_usuario`, `data_registro`, `user_img`) VALUES
(1, 'Yago', 'Gomes', 'yagamii', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'yagamii@teste.com', 2, '2016-03-08 17:08:25', 'WOBBUFFET.jpg'),
(2, 'Alexandre', 'de Freitas', 'mike', 'e10adc3949ba59abbe56e057f20f883e', 'mike@teste.com', 0, '2016-03-08 17:11:59', ''),
(3, 'teste', 'teste', 'teste', 'aa1bf4646de67fd9086cf6c79007026c', 'teste@teste.com', 2, '2016-03-09 17:29:01', ''),
(4, 'Joao', 'Zica', 'joao123', 'e10adc3949ba59abbe56e057f20f883e', 'joao123@teste.com', 0, '2016-03-17 00:40:11', 'images.jpg'),
(5, 'Kenzo', 'Yagamii', 'kenzo', 'e10adc3949ba59abbe56e057f20f883e', 'kenzo@teste.com', 0, '2016-04-22 19:39:20', ''),
(6, 'teste2', 'teste2', 'teste2', 'e10adc3949ba59abbe56e057f20f883e', 'teste2@teste.com', 0, '2016-04-22 22:26:09', ''),
(7, 'teste3', 'teste3', 'teste3', 'e10adc3949ba59abbe56e057f20f883e', 'teste3@teste.com', 0, '2016-04-22 22:41:39', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

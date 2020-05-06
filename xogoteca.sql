-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 06-05-2020 a las 16:33:32
-- Versión del servidor: 5.7.30-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.24-0ubuntu0.18.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `xogoteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `a4_categorias`
--

CREATE TABLE `a4_categorias` (
  `codactividade` varchar(4) COLLATE latin1_general_ci NOT NULL,
  `codcategoria` int(100) NOT NULL,
  `nome` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `imaxeprincipal` varchar(45) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `a4_categorias`
--

INSERT INTO `a4_categorias` (`codactividade`, `codcategoria`, `nome`, `imaxeprincipal`) VALUES
('a4', 1, 'Animais', 'actividades/actividade4/Imaxes/animais.png'),
('a4', 2, 'Arboles', 'actividades/actividade4/Imaxes/arboles.png'),
('a4', 3, 'Bebidas', 'actividades/actividade4/Imaxes/bebidas.png'),
('a4', 4, 'Calzado', 'actividades/actividade4/Imaxes/calzado.png'),
('a4', 5, 'Comida', 'actividades/actividade4/Imaxes/comidas.jpg'),
('a4', 6, 'Comprar', 'actividades/actividade4/Imaxes/comprar.png'),
('a4', 7, 'Deporte', 'actividades/actividade4/Imaxes/deportes.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `a4_imaxes`
--

CREATE TABLE `a4_imaxes` (
  `a4_idimaxe` int(11) NOT NULL,
  `rutaimaxe` varchar(45) NOT NULL,
  `a4_categorias_codcategoria` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `a4_imaxes`
--

INSERT INTO `a4_imaxes` (`a4_idimaxe`, `rutaimaxe`, `a4_categorias_codcategoria`) VALUES
(1, 'actividades/actividade4/Imaxes/animal1.jpeg', 1),
(2, 'actividades/actividade4/Imaxes/animal2.jpeg', 1),
(3, 'actividades/actividade4/Imaxes/animal3.jpeg', 1),
(4, 'actividades/actividade4/Imaxes/animal4.jpeg', 1),
(5, 'actividades/actividade4/Imaxes/animal5.jpeg', 1),
(6, 'actividades/actividade4/Imaxes/animal6.jpeg', 1),
(7, 'actividades/actividade4/Imaxes/animal7.jpeg', 1),
(8, 'actividades/actividade4/Imaxes/animal8.jpeg', 1),
(9, 'actividades/actividade4/Imaxes/animal9.jpeg', 1),
(10, 'actividades/actividade4/Imaxes/animal10.jpeg', 1),
(11, 'actividades/actividade4/Imaxes/animal11.jpeg', 1),
(12, 'actividades/actividade4/Imaxes/animal12.jpeg', 1),
(13, 'actividades/actividade4/Imaxes/animal13.jpeg', 1),
(14, 'actividades/actividade4/Imaxes/animal14.jpeg', 1),
(15, 'actividades/actividade4/Imaxes/animal15.jpeg', 1),
(16, 'actividades/actividade4/Imaxes/animal16.jpeg', 1),
(17, 'actividades/actividade4/Imaxes/animal17.jpeg', 1),
(18, 'actividades/actividade4/Imaxes/animal18.jpeg', 1),
(19, 'actividades/actividade4/Imaxes/arbol1.png', 2),
(20, 'actividades/actividade4/Imaxes/arbol2.png', 2),
(21, 'actividades/actividade4/Imaxes/arbol3.png', 2),
(22, 'actividades/actividade4/Imaxes/arbol4.png', 2),
(23, 'actividades/actividade4/Imaxes/arbol5.png', 2),
(24, 'actividades/actividade4/Imaxes/arbol6.png', 2),
(25, 'actividades/actividade4/Imaxes/arbol7.png', 2),
(26, 'actividades/actividade4/Imaxes/arbol8.png', 2),
(27, 'actividades/actividade4/Imaxes/arbol9.png', 2),
(28, 'actividades/actividade4/Imaxes/arbol10.png', 2),
(29, 'actividades/actividade4/Imaxes/arbol11.png', 2),
(30, 'actividades/actividade4/Imaxes/bebida1.png', 3),
(31, 'actividades/actividade4/Imaxes/bebida2.png', 3),
(32, 'actividades/actividade4/Imaxes/bebida3.png', 3),
(33, 'actividades/actividade4/Imaxes/bebida4.png', 3),
(34, 'actividades/actividade4/Imaxes/bebida5.png', 3),
(35, 'actividades/actividade4/Imaxes/bebida6.png', 3),
(36, 'actividades/actividade4/Imaxes/bebida7.png', 3),
(37, 'actividades/actividade4/Imaxes/bebida8.png', 3),
(38, 'actividades/actividade4/Imaxes/bebida9.png', 3),
(39, 'actividades/actividade4/Imaxes/bebida10.png', 3),
(40, 'actividades/actividade4/Imaxes/bebida11.png', 3),
(41, 'actividades/actividade4/Imaxes/bebida12.png', 3),
(42, 'actividades/actividade4/Imaxes/calzado1.png', 4),
(43, 'actividades/actividade4/Imaxes/calzado2.png', 4),
(44, 'actividades/actividade4/Imaxes/calzado3.png', 4),
(45, 'actividades/actividade4/Imaxes/calzado4.png', 4),
(46, 'actividades/actividade4/Imaxes/calzado5.png', 4),
(47, 'actividades/actividade4/Imaxes/calzado6.png', 4),
(48, 'actividades/actividade4/Imaxes/calzado7.png', 4),
(49, 'actividades/actividade4/Imaxes/calzado8.png', 4),
(50, 'actividades/actividade4/Imaxes/calzado9.png', 4),
(51, 'actividades/actividade4/Imaxes/calzado10.png', 4),
(52, 'actividades/actividade4/Imaxes/calzado11.png', 4),
(53, 'actividades/actividade4/Imaxes/calzado12.png', 4),
(54, 'actividades/actividade4/Imaxes/comida1.png', 5),
(55, 'actividades/actividade4/Imaxes/comida2.png', 5),
(56, 'actividades/actividade4/Imaxes/comida3.png', 5),
(57, 'actividades/actividade4/Imaxes/comida4.png', 5),
(58, 'actividades/actividade4/Imaxes/comida5.png', 5),
(59, 'actividades/actividade4/Imaxes/comida6.png', 5),
(60, 'actividades/actividade4/Imaxes/comida7.png', 5),
(61, 'actividades/actividade4/Imaxes/comida8.png', 5),
(62, 'actividades/actividade4/Imaxes/comida9.png', 5),
(63, 'actividades/actividade4/Imaxes/comida10.png', 5),
(64, 'actividades/actividade4/Imaxes/comida11.png', 5),
(65, 'actividades/actividade4/Imaxes/comida12.png', 5),
(66, 'actividades/actividade4/Imaxes/comprar1.png', 6),
(67, 'actividades/actividade4/Imaxes/comprar2.png', 6),
(68, 'actividades/actividade4/Imaxes/comprar3.png', 6),
(69, 'actividades/actividade4/Imaxes/comprar4.png', 6),
(70, 'actividades/actividade4/Imaxes/comprar5.png', 6),
(71, 'actividades/actividade4/Imaxes/comprar6.png', 6),
(72, 'actividades/actividade4/Imaxes/comprar7.png', 6),
(73, 'actividades/actividade4/Imaxes/comprar8.png', 6),
(74, 'actividades/actividade4/Imaxes/comprar9.png', 6),
(75, 'actividades/actividade4/Imaxes/comprar10.png', 6),
(76, 'actividades/actividade4/Imaxes/comprar11.png', 6),
(77, 'actividades/actividade4/Imaxes/comprar12.png', 6),
(78, 'actividades/actividade4/Imaxes/deporte1.png', 7),
(79, 'actividades/actividade4/Imaxes/deporte2.png', 7),
(80, 'actividades/actividade4/Imaxes/deporte7.png', 7),
(81, 'actividades/actividade4/Imaxes/deporte4.png', 7),
(82, 'actividades/actividade4/Imaxes/deporte5.png', 7),
(83, 'actividades/actividade4/Imaxes/deporte6.png', 7),
(84, 'actividades/actividade4/Imaxes/deporte7.png', 7),
(85, 'actividades/actividade4/Imaxes/deporte8.png', 7),
(86, 'actividades/actividade4/Imaxes/deporte9.png', 7),
(87, 'actividades/actividade4/Imaxes/deporte10.png', 7),
(88, 'actividades/actividade4/Imaxes/deporte11.png', 7),
(89, 'actividades/actividade4/Imaxes/deporte12.png', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividade10`
--

CREATE TABLE `actividade10` (
  `nombre` varchar(20) NOT NULL,
  `tipo` varchar(8) NOT NULL,
  `valores` varchar(255) NOT NULL,
  `palabra_correcta` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `actividade10`
--

INSERT INTO `actividade10` (`nombre`, `tipo`, `valores`, `palabra_correcta`) VALUES
('amable', 'antonimo', 'desagradable,realista,espabilado,enamorado', 'desagradable'),
('desordeado', 'sinonimo', 'desorganizado,arisco,listo,tenaz', 'desorganizado'),
('despierto', 'sinonimo', 'avispado,alegre,veloz,flojo', 'avispado'),
('empatia', 'sinonimo', 'compasion,fuerte,despistado,lento', 'compasion'),
('imaxinativo', 'antonimo', 'realista,triste,confuso,pobre', 'realista'),
('luminoso', 'antonimo', 'oscuro,indeciso,indiferente,rico', 'oscuro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadisticas`
--

CREATE TABLE `estadisticas` (
  `codactividade` varchar(4) COLLATE latin1_general_ci NOT NULL,
  `nomexogador` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `data` datetime NOT NULL,
  `puntos` int(11) NOT NULL,
  `dificultade` enum('baixa','media','dificil') COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `estadisticas`
--

INSERT INTO `estadisticas` (`codactividade`, `nomexogador`, `data`, `puntos`, `dificultade`) VALUES
('10', 'juan', '2020-05-06 16:24:07', 1, 'media');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nome` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `contrasinal` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `rol` tinyint(1) NOT NULL,
  `dataAlta` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `bloqueado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nome`, `contrasinal`, `rol`, `dataAlta`, `bloqueado`) VALUES
('juan', '$1$2LTvNwN/$jfGnEtKp4317w7qqzUGfz1', 0, '2020-2-12', 0),
('pedro', '$1$YThRmKS7$VSD5BKwG2dtU9evxtDbfp.', 1, '2020-3-2', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `a4_categorias`
--
ALTER TABLE `a4_categorias`
  ADD PRIMARY KEY (`codcategoria`),
  ADD UNIQUE KEY `imaxeprincipal_UNIQUE` (`imaxeprincipal`),
  ADD UNIQUE KEY `nome_UNIQUE` (`nome`);

--
-- Indices de la tabla `a4_imaxes`
--
ALTER TABLE `a4_imaxes`
  ADD PRIMARY KEY (`a4_idimaxe`),
  ADD KEY `fk_a4_imaxes_a4_categorias_idx` (`a4_categorias_codcategoria`);

--
-- Indices de la tabla `actividade10`
--
ALTER TABLE `actividade10`
  ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `estadisticas`
--
ALTER TABLE `estadisticas`
  ADD PRIMARY KEY (`codactividade`,`nomexogador`,`data`),
  ADD KEY `nomexogador` (`nomexogador`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`nome`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `a4_categorias`
--
ALTER TABLE `a4_categorias`
  MODIFY `codcategoria` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `a4_imaxes`
--
ALTER TABLE `a4_imaxes`
  MODIFY `a4_idimaxe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `a4_imaxes`
--
ALTER TABLE `a4_imaxes`
  ADD CONSTRAINT `fk_a4_imaxes_a4_categorias` FOREIGN KEY (`a4_categorias_codcategoria`) REFERENCES `a4_categorias` (`codcategoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estadisticas`
--
ALTER TABLE `estadisticas`
  ADD CONSTRAINT `estadisticas_ibfk_1` FOREIGN KEY (`nomexogador`) REFERENCES `usuarios` (`nome`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

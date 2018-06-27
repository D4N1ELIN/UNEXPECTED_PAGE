-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2018 a las 05:43:26
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mesadeayuda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `idTicket` int(11) NOT NULL,
  `Asunto_tick` varchar(20) DEFAULT NULL,
  `Descripcion_tick` varchar(200) DEFAULT NULL,
  `Fecha_tick` date DEFAULT NULL,
  `categoria_idCategoria` int(11) DEFAULT NULL,
  `usuario_idUsuario` int(11) DEFAULT NULL,
  `tecnico_idTecnico` int(11) DEFAULT NULL,
  `SubCategoria_idSubCategoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ticket`
--

INSERT INTO `ticket` (`idTicket`, `Asunto_tick`, `Descripcion_tick`, `Fecha_tick`, `categoria_idCategoria`, `usuario_idUsuario`, `tecnico_idTecnico`, `SubCategoria_idSubCategoria`) VALUES
(1, 'pantalla', 'la pantalla molesta regularmente y aveces se apaga sola', '2018-05-16', 2, 1, 3, 2),
(2, 'ejemplo1', 'solo ejemplo', '2018-07-13', 2, 1, 4, 2),
(3, 'ejemplo2', 'solo ejemplo2', '2018-05-13', 1, 2, 2, 4),
(4, 'bla bla bla', 'sdasxsacasxcs', '2018-05-17', 2, 2, 4, 3),
(5, 'cpu', 'no prende el pc', '2018-05-24', 2, 2, 2, 2),
(6, 'daño teclado', 'ejemplo 6', '2018-06-13', 2, 2, 3, 2),
(7, 'Altavoces', 'ejemplo 7', '2018-06-14', 1, 2, 4, 3),
(8, 'Monitor', 'no enciende', '2018-04-16', 1, 2, 2, 5),
(9, 'No imprime', 'la impresora no sirve', '2018-05-16', 2, 2, 2, 5),
(10, 'no da sonido', 'la grabadora no sirve', '2018-08-22', 2, 2, 3, 3),
(11, 'señal', 'el televisor no genera señal', '2018-06-10', 2, 1, 3, 4),
(12, 'mouse', 'el mouse no se mueve', '2018-03-19', 2, 1, 4, 2),
(13, 'altavoces', 'la grabadora no suena', '2018-06-22', 1, 1, 1, 3),
(14, 'no se mueve', 'la camara se queda estatica', '2018-06-30', 1, 1, 3, 5),
(15, 'pantalla', 'la pantalla tiene imperfecciones', '2018-07-11', 2, 1, 2, 2),
(16, 'señal', 'la pantalla molesta regularmente y aveces se apaga sola', '2018-02-16', 2, 1, 3, 2),
(17, 'ejemplo 17', 'solo ejemplo', '2018-03-13', 2, 1, 4, 2),
(18, 'mouse', 'solo ejemplo2', '2018-04-19', 1, 1, 2, 4),
(19, 'cpu', 'solo ejemplo19', '2018-05-13', 2, 1, 4, 3),
(20, 'no prende', 'solo ejemplo20', '2018-05-24', 2, 1, 2, 2),
(21, 'internet', 'solo ejemplo21', '2018-04-13', 2, 1, 3, 2),
(22, 'imagen', 'solo ejemplo22', '2018-06-19', 1, 1, 4, 3),
(23, 'Monitor', 'solo ejemplo23', '2018-08-16', 1, 1, 2, 5),
(24, 'No imprime', 'solo ejemplo24', '2018-05-30', 2, 2, 2, 5),
(25, 'no da sonido', 'solo ejemplo25', '2018-11-22', 2, 2, 3, 3),
(26, 'teclado', 'solo ejemplo26', '2018-04-19', 2, 2, 3, 4),
(27, 'no deja instalar', 'solo ejemplo27', '2018-03-21', 2, 2, 4, 2),
(28, 'no graba', 'solo ejemplo28', '2018-06-15', 1, 2, 1, 3),
(29, 'no se mueve', 'solo ejemplo29', '2018-06-24', 2, 1, 3, 5),
(30, 'se quemo', 'la pantalla tiene imperfecciones', '2018-07-21', 2, 2, 2, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`idTicket`),
  ADD KEY `fk_ticket_categoria_idx` (`categoria_idCategoria`),
  ADD KEY `fk_ticket_usuario1_idx` (`usuario_idUsuario`),
  ADD KEY `fk_ticket_tecnico1_idx` (`tecnico_idTecnico`),
  ADD KEY `fk_ticket_SubCategoria1_idx` (`SubCategoria_idSubCategoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `idTicket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `fk_ticket_SubCategoria1` FOREIGN KEY (`SubCategoria_idSubCategoria`) REFERENCES `subcategoria` (`idSubCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ticket_categoria` FOREIGN KEY (`categoria_idCategoria`) REFERENCES `categoria` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ticket_tecnico1` FOREIGN KEY (`tecnico_idTecnico`) REFERENCES `tecnico` (`idTecnico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ticket_usuario1` FOREIGN KEY (`usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

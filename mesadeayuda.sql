-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-06-2018 a las 06:23:29
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
-- Estructura de tabla para la tabla `atencion`
--

CREATE TABLE `atencion` (
  `idAtencion` int(11) NOT NULL,
  `Descripcion_atencion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `atencion`
--

INSERT INTO `atencion` (`idAtencion`, `Descripcion_atencion`) VALUES
(1, 'Excelente'),
(2, 'Buena'),
(3, 'Regular'),
(4, 'Mala'),
(5, 'Pesima');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `idCalificacion` int(11) NOT NULL,
  `atencion_idAtencion` int(11) DEFAULT NULL,
  `ticket_idTicket` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `Descripcion_cate` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `Descripcion_cate`) VALUES
(1, 'Software'),
(2, 'Hardware');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `idEstado` int(11) NOT NULL,
  `tip_estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idEstado`, `tip_estado`) VALUES
(1, 'Resuelto'),
(2, 'En proceso'),
(3, 'En espera'),
(4, 'Cancelado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `idGenero` int(11) NOT NULL,
  `Descripcion_gen` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`idGenero`, `Descripcion_gen`) VALUES
(1, 'Masculino'),
(2, 'Femenino'),
(3, 'Indefinido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `idSede` int(11) NOT NULL,
  `Nombre_sede` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`idSede`, `Nombre_sede`) VALUES
(1, 'Belmira'),
(2, 'Suba'),
(3, 'Chapinero'),
(4, 'Restrepo'),
(5, 'Normandia'),
(6, 'Plaza De Las Americas'),
(7, 'Chia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria`
--

CREATE TABLE `subcategoria` (
  `idSubCategoria` int(11) NOT NULL,
  `Descripcion_Sub` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `subcategoria`
--

INSERT INTO `subcategoria` (`idSubCategoria`, `Descripcion_Sub`) VALUES
(1, 'Impresora'),
(2, 'Computador'),
(3, 'Grabadora'),
(4, 'Televisor'),
(5, 'Camara');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnico`
--

CREATE TABLE `tecnico` (
  `idTecnico` int(11) NOT NULL,
  `NombreTec` varchar(45) DEFAULT NULL,
  `Telefono` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tecnico`
--

INSERT INTO `tecnico` (`idTecnico`, `NombreTec`, `Telefono`) VALUES
(1, 'Alberto Villalva', '3105879134'),
(2, 'Kevin Rodriguez', '3204893286'),
(3, 'Erick Sanchez', '3103034878'),
(4, 'David Arias', '3124562154');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `idTicket` int(11) NOT NULL,
  `Asunto_tick` varchar(20) DEFAULT NULL,
  `Descripcion_tick` varchar(100) DEFAULT NULL,
  `Fecha_tick` date DEFAULT NULL,
  `categoria_idCategoria` int(11) DEFAULT NULL,
  `usuario_idUsuario` int(11) DEFAULT NULL,
  `tecnico_idTecnico` int(11) DEFAULT NULL,
  `SubCategoria_idSubCategoria` int(11) DEFAULT NULL,
  `Estado_idEstado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ticket`
--

INSERT INTO `ticket` (`idTicket`, `Asunto_tick`, `Descripcion_tick`, `Fecha_tick`, `categoria_idCategoria`, `usuario_idUsuario`, `tecnico_idTecnico`, `SubCategoria_idSubCategoria`, `Estado_idEstado`) VALUES
(1, 'asdasd', 'dsadsas', '2018-06-13', 1, 1, 4, 2, 1),
(2, 'Pantalla', 'no enciende', '2018-05-01', 2, 1, 3, 2, 3),
(3, 'CPU', 'hace ruidos extraños', '2018-06-06', 2, 1, 2, 4, 3),
(4, 'no enciende', 'el televisor no enciende', '2018-06-14', 1, 1, 1, 3, 3),
(5, 'No imprime', 'la impresora dejo de servir', '2018-06-22', 1, 1, 4, 1, 3),
(6, 'No suena', 'la grabadora dejo de sonar', '2018-05-22', 2, 1, 2, 3, 3),
(7, 'no da señal', 'la camara dejo de servir', '2018-04-02', 1, 1, 4, 5, 3),
(8, 'no hay tinta', 'la impresora no deja imprimir', '2018-06-06', 1, 2, 1, 1, 3),
(9, 'no enciende', 'el computador no enciende', '2018-06-20', 2, 2, 2, 2, 3),
(10, 'No suena', 'la grabadora dejo de funcionar', '2018-05-08', 1, 2, 3, 3, 3),
(11, 'No hay señal', 'genera error de señal', '2018-06-30', 2, 2, 4, 4, 3),
(12, 'no graba', 'la camara dejo de grabar', '2018-05-02', 1, 2, 1, 5, 3),
(13, 'Pantalla', 'se quebro la pantalla', '2018-04-10', 2, 2, 2, 4, 3),
(14, 'No suena', 'la grabadora no suena por bluetooh', '2018-05-23', 1, 2, 3, 3, 3),
(15, 'Se realentiza', 'el pc esta muy lento', '2018-06-21', 2, 2, 4, 2, 3),
(16, 'Ã±Ã±Ã±Ã±Ã±', 'Ã±Ã±Ã±Ã±Ã±Ã±Ã±', '2018-06-23', 1, 4, 1, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `idTipoUsuario` int(11) NOT NULL,
  `Descripcion_user` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`idTipoUsuario`, `Descripcion_user`) VALUES
(1, 'Administrador'),
(2, 'Tecnico'),
(3, 'Estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `Documento` varchar(25) DEFAULT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Apellidos` varchar(45) DEFAULT NULL,
  `Correo` varchar(45) DEFAULT NULL,
  `Contrasena` varchar(30) DEFAULT NULL,
  `Direccion` varchar(45) DEFAULT NULL,
  `Telefono` varchar(15) DEFAULT NULL,
  `genero_idGenero` int(11) DEFAULT NULL,
  `tipousuario_idTipoUsuario` int(11) DEFAULT NULL,
  `sede_idSede` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `Documento`, `Nombre`, `Apellidos`, `Correo`, `Contrasena`, `Direccion`, `Telefono`, `genero_idGenero`, `tipousuario_idTipoUsuario`, `sede_idSede`) VALUES
(1, '6666666666', 'markos', 'Reyes', 'm@m.com', 'markos', 'Enrique Segoviano', '3195058880', 1, 3, 2),
(2, '1000717997', 'Dan', 'mourinho', 'mdani@gmail.com', 'daniel', 'calle 45', '3123196589', 1, 3, 7),
(3, '52300064', 'Camilo', 'Torres', 'camilo@camilo.com', 'camilo', 'calle 30 #15', '3214253220', 1, 1, NULL),
(4, '32012065212', 'Maicol', 'Rodriguez', 'maicol@maicol.com', 'maicol', 'av 70', '3104652010', 3, 3, 5),
(5, '30020064', 'Alberto ', 'Villalva', 'AlberVil@gmail.com', 'tecnico', NULL, NULL, NULL, 2, NULL),
(6, '3002010561', 'Kevin ', 'Rodriguez', 'kevrod@gmail.com', 'tecnico', NULL, NULL, NULL, 2, NULL),
(7, '3200156332', 'Erick ', 'Sanchez', 'erisan@gmail.com', 'tecnico', NULL, NULL, NULL, 2, NULL),
(8, '2100459565', 'David ', 'Arias', 'davari@gmail.com', 'tecnico', NULL, NULL, NULL, 2, NULL),
(9, '12339082310', 'santiago', 'garcia', 's@s.com', 'santiago', 'calle 6542136', '3215632002', 1, 3, 7),
(10, '569002015', 'john', 'lozano', 'johnmarkos@gmail.com', 'reyesaurio', 'calle 50 # 41b sur', '302102210', 2, 3, 5),
(12, '12354621', 'yesid', 'ratis', 'y@y.com', 'yesid', 'av puente', '2651452010', 3, 1, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `atencion`
--
ALTER TABLE `atencion`
  ADD PRIMARY KEY (`idAtencion`);

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`idCalificacion`),
  ADD KEY `fk_calificacion_atencion1_idx` (`atencion_idAtencion`),
  ADD KEY `fk_calificacion_ticket1_idx` (`ticket_idTicket`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idEstado`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`idGenero`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`idSede`);

--
-- Indices de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD PRIMARY KEY (`idSubCategoria`);

--
-- Indices de la tabla `tecnico`
--
ALTER TABLE `tecnico`
  ADD PRIMARY KEY (`idTecnico`);

--
-- Indices de la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`idTicket`),
  ADD KEY `fk_ticket_categoria_idx` (`categoria_idCategoria`),
  ADD KEY `fk_ticket_usuario1_idx` (`usuario_idUsuario`),
  ADD KEY `fk_ticket_tecnico1_idx` (`tecnico_idTecnico`),
  ADD KEY `fk_ticket_SubCategoria1_idx` (`SubCategoria_idSubCategoria`),
  ADD KEY `fk_ticket_Estado1_idx` (`Estado_idEstado`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`idTipoUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_usuario_genero1_idx` (`genero_idGenero`),
  ADD KEY `fk_usuario_tipousuario1_idx` (`tipousuario_idTipoUsuario`),
  ADD KEY `fk_usuario_sede1_idx` (`sede_idSede`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `atencion`
--
ALTER TABLE `atencion`
  MODIFY `idAtencion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `idCalificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `idEstado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `idGenero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sede`
--
ALTER TABLE `sede`
  MODIFY `idSede` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  MODIFY `idSubCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tecnico`
--
ALTER TABLE `tecnico`
  MODIFY `idTecnico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `idTicket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `idTipoUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD CONSTRAINT `fk_calificacion_atencion1` FOREIGN KEY (`atencion_idAtencion`) REFERENCES `atencion` (`idAtencion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_calificacion_ticket1` FOREIGN KEY (`ticket_idTicket`) REFERENCES `ticket` (`idTicket`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `fk_ticket_Estado1` FOREIGN KEY (`Estado_idEstado`) REFERENCES `estado` (`idEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ticket_SubCategoria1` FOREIGN KEY (`SubCategoria_idSubCategoria`) REFERENCES `subcategoria` (`idSubCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ticket_categoria` FOREIGN KEY (`categoria_idCategoria`) REFERENCES `categoria` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ticket_tecnico1` FOREIGN KEY (`tecnico_idTecnico`) REFERENCES `tecnico` (`idTecnico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ticket_usuario1` FOREIGN KEY (`usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_genero1` FOREIGN KEY (`genero_idGenero`) REFERENCES `genero` (`idGenero`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_sede1` FOREIGN KEY (`sede_idSede`) REFERENCES `sede` (`idSede`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_tipousuario1` FOREIGN KEY (`tipousuario_idTipoUsuario`) REFERENCES `tipousuario` (`idTipoUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

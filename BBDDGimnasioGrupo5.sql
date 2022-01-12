-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-01-2022 a las 18:20:13
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gimnasio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id_registro` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `fecha` date NOT NULL,
  `nota_evaluacion` int(2) DEFAULT NULL,
  `comentario` varchar(255) NOT NULL,
  `reserva` tinyint(1) NOT NULL,
  `asistencia` tinyint(1) NOT NULL,
  `id_sala` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `id_socio` int(11) NOT NULL,
  `id_monitor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id_registro`, `nombre`, `fecha`, `nota_evaluacion`, `comentario`, `reserva`, `asistencia`, `id_sala`, `id_actividad`, `id_socio`, `id_monitor`) VALUES
(1, 'Body Pump', '2022-04-01', 10, 'Buena clase', 0, 1, 2, 1, 2, 3),
(2, 'Body Pump', '2022-01-12', 1, ' aaa', 0, 1, 2, 2, 2, 3),
(3, 'Yoga', '2022-01-02', -1, ' ', 0, 1, 1, 1, 2, 2),
(4, 'Body Combat', '2022-01-04', -1, ' ', 0, 0, 2, 3, 2, 3),
(5, 'Yoga', '2021-12-15', -1, ' ', 0, 0, 1, 1, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendarioactividades`
--

CREATE TABLE `calendarioactividades` (
  `id_registro` int(11) NOT NULL,
  `id_actividad` int(11) DEFAULT NULL,
  `id_sala` int(11) NOT NULL,
  `id_monitor` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `horario` varchar(150) NOT NULL,
  `ocupacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `calendarioactividades`
--

INSERT INTO `calendarioactividades` (`id_registro`, `id_actividad`, `id_sala`, `id_monitor`, `fecha`, `horario`, `ocupacion`) VALUES
(1, 1, 1, 2, '2021-12-15', '16h-17h', 34),
(2, 3, 2, 3, '2021-12-31', '10h-11:30h', 1),
(3, 4, 2, 3, '2021-12-30', '09h-10h', 1),
(4, 5, 2, 3, '2022-01-04', '19h-20h', 0),
(5, 1, 1, 2, '2022-08-08', '18h-19h', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centros`
--

CREATE TABLE `centros` (
  `id_centro` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `id_sede` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `centros`
--

INSERT INTO `centros` (`id_centro`, `nombre`, `telefono`, `direccion`, `id_sede`) VALUES
(1, 'Getafe', '960606060', 'C/ Estrella nº 12', 1),
(2, 'Alcalá de Henares', '914525456', 'C/ Mayor nº 11', 1),
(3, 'Barcelona', '979624212', 'C/ Prueba nº 14', 2),
(4, 'Valencia', '966321317', 'C/ Camino de playa nº 3', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citasentrenador`
--

CREATE TABLE `citasentrenador` (
  `id_registro` int(11) NOT NULL,
  `id_socio` int(11) NOT NULL,
  `id_entrenador` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `citasentrenador`
--

INSERT INTO `citasentrenador` (`id_registro`, `id_socio`, `id_entrenador`, `fecha`, `hora`) VALUES
(1, 2, 2, '2022-01-04', '17:00:00'),
(2, 2, 3, '2022-01-11', '17:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuotas`
--

CREATE TABLE `cuotas` (
  `id_cuota` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directores`
--

CREATE TABLE `directores` (
  `id_director` int(11) NOT NULL,
  `nombre` varchar(155) DEFAULT NULL,
  `salario` decimal(10,2) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `id_rol` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `directores`
--

INSERT INTO `directores` (`id_director`, `nombre`, `salario`, `telefono`, `fecha_nacimiento`, `id_rol`, `usuario`) VALUES
(3, 'Alfredo Gutierrez', '25000.00', 684564645, '1982-07-12', 1, 'SSC-8-D');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenadores`
--

CREATE TABLE `entrenadores` (
  `id_entrenador` int(11) NOT NULL,
  `nombre` varchar(155) DEFAULT NULL,
  `salario` decimal(10,2) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `id_rol` int(11) NOT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `horas_libres` varchar(10) NOT NULL,
  `horas_reservadas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `entrenadores`
--

INSERT INTO `entrenadores` (`id_entrenador`, `nombre`, `salario`, `telefono`, `fecha_nacimiento`, `id_rol`, `usuario`, `horas_libres`, `horas_reservadas`) VALUES
(2, 'Pepe López', '15000.00', 695959596, '1981-05-04', 3, 'SSC-3-E', '9', '1'),
(3, 'Julio Sanz', '12111.00', 633211245, '1992-12-05', 3, 'SSC-9-E', '9', '1'),
(4, 'Raúl González', '15000.00', 694141445, '1978-05-05', 3, 'SSC-10-E', '8', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id_factura` int(11) NOT NULL,
  `id_socio` int(11) NOT NULL,
  `matricula` tinyint(1) NOT NULL,
  `importe` double NOT NULL,
  `tipo_cuota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `limpiadores`
--

CREATE TABLE `limpiadores` (
  `id_limpiador` int(11) NOT NULL,
  `nombre` varchar(155) DEFAULT NULL,
  `salario` decimal(10,2) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `id_rol` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `turno` varchar(10) NOT NULL,
  `zona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `limpiadores`
--

INSERT INTO `limpiadores` (`id_limpiador`, `nombre`, `salario`, `telefono`, `fecha_nacimiento`, `id_rol`, `usuario`, `turno`, `zona`) VALUES
(1, 'Juan Manzano', '14000.00', 688956565, '1968-04-12', 5, 'SSC-5-L', '1', 1),
(2, 'Sofia Lopez', '14000.00', 678954312, '1988-05-08', 5, 'SSC-11-L', '2', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monitores`
--

CREATE TABLE `monitores` (
  `id_monitor` int(11) NOT NULL,
  `nombre` varchar(155) DEFAULT NULL,
  `salario` decimal(10,2) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `id_rol` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `turno` int(11) NOT NULL,
  `actividad_especialista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `monitores`
--

INSERT INTO `monitores` (`id_monitor`, `nombre`, `salario`, `telefono`, `fecha_nacimiento`, `id_rol`, `usuario`, `turno`, `actividad_especialista`) VALUES
(2, 'Miriam Lopez', '20000.00', 646564515, '1993-11-04', 2, 'SSC-2-M', 2, 4),
(3, 'Pedro', '12121.00', 666633354, '1979-05-14', 2, 'SSC-7-M', 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacionescitas`
--

CREATE TABLE `notificacionescitas` (
  `id_notificacion` int(11) NOT NULL,
  `id_entrenador` varchar(120) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `notificacion` varchar(255) NOT NULL,
  `leida` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `notificacionescitas`
--

INSERT INTO `notificacionescitas` (`id_notificacion`, `id_entrenador`, `id_actividad`, `notificacion`, `leida`) VALUES
(2, '3', 2, 'Visita al médico', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recepcionistas`
--

CREATE TABLE `recepcionistas` (
  `id_recepcionista` int(11) NOT NULL,
  `nombre` varchar(155) DEFAULT NULL,
  `salario` decimal(10,2) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `id_rol` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `recepcionistas`
--

INSERT INTO `recepcionistas` (`id_recepcionista`, `nombre`, `salario`, `telefono`, `fecha_nacimiento`, `id_rol`, `usuario`) VALUES
(3, 'Lola Suarez', '13000.00', 641716212, '1987-07-07', 4, 'SSC-4-R'),
(4, 'aaa', '1111.00', 121212121, '2022-01-06', 4, 'SSC-12-R');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre`) VALUES
(1, 'Director'),
(2, 'Monitor'),
(3, 'Entrenador'),
(4, 'Recepcionista'),
(5, 'Limpiador'),
(6, 'Socio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salas`
--

CREATE TABLE `salas` (
  `id_sala` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `aforo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `salas`
--

INSERT INTO `salas` (`id_sala`, `nombre`, `aforo`) VALUES
(1, 'Sala Iron Man', 34),
(2, 'Sala Hulk', 55);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE `sedes` (
  `id_sede` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `direccion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serviciosadicionales`
--

CREATE TABLE `serviciosadicionales` (
  `id_servicio` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `precio` varchar(20) NOT NULL,
  `id_centro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `serviciosadicionales`
--

INSERT INTO `serviciosadicionales` (`id_servicio`, `nombre`, `precio`, `id_centro`) VALUES
(1, 'Spa', '10', 2),
(2, 'Aguas termales', '7', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socios`
--

CREATE TABLE `socios` (
  `id_socio` int(11) NOT NULL,
  `nombre` varchar(155) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `tipo_cuenta` varchar(50) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_entrenador` int(11) DEFAULT NULL,
  `suspendido` tinyint(1) NOT NULL,
  `cuenta_banco` varchar(50) NOT NULL,
  `usuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `socios`
--

INSERT INTO `socios` (`id_socio`, `nombre`, `telefono`, `email`, `tipo_cuenta`, `id_rol`, `id_entrenador`, `suspendido`, `cuenta_banco`, `usuario`) VALUES
(2, 'Fernando Alonso', 999999999, 'fernando@gmail.com', 'Premium', 6, 0, 0, 'XXXXXXXXXXXXXXXXXXXXXX', 'SSC-6-S');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sociosserviciosadicionales`
--

CREATE TABLE `sociosserviciosadicionales` (
  `id_registro` int(11) NOT NULL,
  `id_socio` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sociosserviciosadicionales`
--

INSERT INTO `sociosserviciosadicionales` (`id_registro`, `id_socio`, `id_servicio`, `fecha`) VALUES
(3, 2, 2, '2022-01-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoactividades`
--

CREATE TABLE `tipoactividades` (
  `id_actividad` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `tipo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipoactividades`
--

INSERT INTO `tipoactividades` (`id_actividad`, `nombre`, `tipo`) VALUES
(1, 'Yoga', 'Respiración'),
(2, 'Spinning', 'Cardio'),
(3, 'Body Pump', 'Cardio'),
(4, 'Body Combat', 'Cardio'),
(5, 'Sentadillas', 'Resistencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `id_centro` int(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_usuario`, `usuario`, `id_rol`, `id_centro`, `password`) VALUES
(2, 'SSC-2-M', 2, 2, '$2y$10$JVCWgFtq.SKH09jESrZy/OBmnCXwtxiN0iFzE5pfxCZtMzfEC/W2u'),
(3, 'SSC-3-E', 3, 3, '$2y$10$owMUgmc.BAVZh3ayXU9vkuJn4Kf/vnIMuHowKszy3QvgvkaJ62W8C'),
(4, 'SSC-4-R', 4, 1, '$2y$10$rhNY7fzBfp4oIrMdEaaPW.XurE7nhrc61/MqRS8BulRACnk2kFa5W'),
(5, 'SSC-5-L', 5, 1, '$2y$10$ueyKb9D2R//BMp4.7A03QuS/QlieavhV.Pyijze6x6Cmbd/ma/ocW'),
(6, 'SSC-6-S', 6, 1, '$2y$10$xGymL3APaphCNmDQcB5jnOux1zz9AtuX/Y5jT2UIOxrLxYh/NZ5Re'),
(7, 'SSC-7-M', 2, 1, '$2y$10$Z9B/T1wTZh4.jCAbiIIhfOvsBO9kr1GML6RCGtuSJ1t.pm5javBxO'),
(8, 'SSC-8-D', 1, 1, '$2y$10$Hn.uuxDkHAvOO8Hl1I07i..gaXBOL02a93KLZxX0FtvAxMa8FjSt.'),
(9, 'SSC-9-E', 3, 2, '$2y$10$FyaVgooEJz20gXXDHcibxOvTRemh8XBDDSn0m10XS9T0MPT3JnMpK'),
(10, 'SSC-10-E', 3, 1, '$2y$10$bqKVgJWqyHv9jaZeJXi/vOHX5SU6J/NUnqi.jgi5/L43xCqwGpq8e'),
(11, 'SSC-11-L', 5, 1, '$2y$10$jJvxCEvsMVOBPHQDrQJ1Hu1McSrxR8wnx3Qs32F2HHyUOWvEU8irC'),
(12, 'SSC-12-R', 4, 1, '$2y$10$NzSlTzxWMdVAT/s7k6nJl.u7CYMURdMMpFvY/DraThzZeLOk06wP6');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id_registro`);

--
-- Indices de la tabla `calendarioactividades`
--
ALTER TABLE `calendarioactividades`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `tiene` (`id_actividad`);

--
-- Indices de la tabla `centros`
--
ALTER TABLE `centros`
  ADD PRIMARY KEY (`id_centro`);

--
-- Indices de la tabla `citasentrenador`
--
ALTER TABLE `citasentrenador`
  ADD PRIMARY KEY (`id_registro`);

--
-- Indices de la tabla `cuotas`
--
ALTER TABLE `cuotas`
  ADD PRIMARY KEY (`id_cuota`);

--
-- Indices de la tabla `directores`
--
ALTER TABLE `directores`
  ADD PRIMARY KEY (`id_director`),
  ADD KEY `users_directores` (`usuario`);

--
-- Indices de la tabla `entrenadores`
--
ALTER TABLE `entrenadores`
  ADD PRIMARY KEY (`id_entrenador`),
  ADD KEY `tiene un` (`usuario`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id_factura`);

--
-- Indices de la tabla `limpiadores`
--
ALTER TABLE `limpiadores`
  ADD PRIMARY KEY (`id_limpiador`);

--
-- Indices de la tabla `monitores`
--
ALTER TABLE `monitores`
  ADD PRIMARY KEY (`id_monitor`);

--
-- Indices de la tabla `notificacionescitas`
--
ALTER TABLE `notificacionescitas`
  ADD PRIMARY KEY (`id_notificacion`);

--
-- Indices de la tabla `recepcionistas`
--
ALTER TABLE `recepcionistas`
  ADD PRIMARY KEY (`id_recepcionista`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`id_sala`);

--
-- Indices de la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`id_sede`);

--
-- Indices de la tabla `serviciosadicionales`
--
ALTER TABLE `serviciosadicionales`
  ADD PRIMARY KEY (`id_servicio`);

--
-- Indices de la tabla `socios`
--
ALTER TABLE `socios`
  ADD PRIMARY KEY (`id_socio`);

--
-- Indices de la tabla `sociosserviciosadicionales`
--
ALTER TABLE `sociosserviciosadicionales`
  ADD PRIMARY KEY (`id_registro`);

--
-- Indices de la tabla `tipoactividades`
--
ALTER TABLE `tipoactividades`
  ADD PRIMARY KEY (`id_actividad`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `calendarioactividades`
--
ALTER TABLE `calendarioactividades`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `centros`
--
ALTER TABLE `centros`
  MODIFY `id_centro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `citasentrenador`
--
ALTER TABLE `citasentrenador`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cuotas`
--
ALTER TABLE `cuotas`
  MODIFY `id_cuota` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `directores`
--
ALTER TABLE `directores`
  MODIFY `id_director` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `entrenadores`
--
ALTER TABLE `entrenadores`
  MODIFY `id_entrenador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `limpiadores`
--
ALTER TABLE `limpiadores`
  MODIFY `id_limpiador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `monitores`
--
ALTER TABLE `monitores`
  MODIFY `id_monitor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `notificacionescitas`
--
ALTER TABLE `notificacionescitas`
  MODIFY `id_notificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `recepcionistas`
--
ALTER TABLE `recepcionistas`
  MODIFY `id_recepcionista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `salas`
--
ALTER TABLE `salas`
  MODIFY `id_sala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sedes`
--
ALTER TABLE `sedes`
  MODIFY `id_sede` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `serviciosadicionales`
--
ALTER TABLE `serviciosadicionales`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `socios`
--
ALTER TABLE `socios`
  MODIFY `id_socio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sociosserviciosadicionales`
--
ALTER TABLE `sociosserviciosadicionales`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipoactividades`
--
ALTER TABLE `tipoactividades`
  MODIFY `id_actividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calendarioactividades`
--
ALTER TABLE `calendarioactividades`
  ADD CONSTRAINT `tiene` FOREIGN KEY (`id_actividad`) REFERENCES `tipoactividades` (`id_actividad`);

--
-- Filtros para la tabla `directores`
--
ALTER TABLE `directores`
  ADD CONSTRAINT `users_directores` FOREIGN KEY (`usuario`) REFERENCES `users` (`usuario`);

--
-- Filtros para la tabla `entrenadores`
--
ALTER TABLE `entrenadores`
  ADD CONSTRAINT `tiene un` FOREIGN KEY (`usuario`) REFERENCES `users` (`usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

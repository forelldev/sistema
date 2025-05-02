-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-05-2025 a las 02:59:33
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_ambiental`
--

CREATE TABLE `datos_ambiental` (
  `id_doc` int(11) NOT NULL,
  `propiedad` varchar(25) NOT NULL,
  `propiedad_est` varchar(25) NOT NULL,
  `observacion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datos_ambiental`
--

INSERT INTO `datos_ambiental` (`id_doc`, `propiedad`, `propiedad_est`, `observacion`) VALUES
(10, 'Apartamento', 'Prestada', 'pues ni idea'),
(11, 'Rancho', 'Prestada', 'qweqweqwe'),
(12, 'Casa', 'Propia', 'la verdad es que no sé'),
(14, 'Casa', 'Propia', 'qweqweqwe'),
(15, 'Casa', 'Propia', 'la verdad es que no sé'),
(16, 'Casa', 'Propia', 'la verdad es que no sé');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_economicos`
--

CREATE TABLE `datos_economicos` (
  `id_doc` int(11) NOT NULL,
  `nivel_ingreso` varchar(20) NOT NULL,
  `trabajo` varchar(20) NOT NULL,
  `pension` varchar(5) NOT NULL,
  `bono` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datos_economicos`
--

INSERT INTO `datos_economicos` (`id_doc`, `nivel_ingreso`, `trabajo`, `pension`, `bono`) VALUES
(10, '1000', 'developer', 'Si', 'No'),
(11, '33333', 'jerjerjejr', 'Si', 'Si'),
(12, '50033', 'No tiene', 'Si', 'Si'),
(14, '2323', 'qweqwe', 'Si', 'Si'),
(15, '50033', 'Developer', 'Si', 'Si'),
(16, '50033', 'Developer', 'Si', 'Si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_extra`
--

CREATE TABLE `datos_extra` (
  `id_doc` int(11) NOT NULL,
  `nivel_instruc` varchar(20) NOT NULL,
  `profesion` varchar(40) NOT NULL,
  `comunidad` varchar(25) NOT NULL,
  `direc_habita` varchar(11) NOT NULL,
  `estruc_base` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datos_extra`
--

INSERT INTO `datos_extra` (`id_doc`, `nivel_instruc`, `profesion`, `comunidad`, `direc_habita`, `estruc_base`) VALUES
(10, 'Secundaria', 'ingeniero', 'no me acuerdo', 'calle kekek', 'bueno estructura no hay'),
(11, 'Universidad', 'ingeniero en secretaeria', 'qweqweqw', 'qweqwe', 'qqweqweqwe'),
(12, 'Primaria', 'Ingeniero En Medicina', 'barrio altamira', 'calle 13', 'sector 4'),
(14, 'Primaria', 'Ingeniero En Medicina', 'qweqweqwe', 'wqeqweqwe', 'qweqweqwe'),
(15, 'Primaria', 'Ingeniero En Medicina', 'barrio altamira', 'calle 13', 'sector 4'),
(16, 'Primaria', 'Ingeniero En Medicina', 'barrio altamira', 'calle 13', 'sector 4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_import`
--

CREATE TABLE `datos_import` (
  `id_doc` int(11) NOT NULL,
  `ci_perso` int(11) NOT NULL,
  `telefono` int(40) NOT NULL,
  `codigo_patria` int(20) NOT NULL,
  `serial_patria` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datos_import`
--

INSERT INTO `datos_import` (`id_doc`, `ci_perso`, `telefono`, `codigo_patria`, `serial_patria`) VALUES
(10, 34343434, 2147483647, 2147483647, 2147483647),
(11, 232323, 4242323, 2147483647, 2147483647),
(12, 324032, 4242323, 34234234, 2147483647),
(14, 324032, 4242323, 2147483647, 2147483647),
(15, 324032, 4242323, 2147483647, 2147483647),
(16, 324032, 2147483647, 34234234, 2147483647);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_medicos`
--

CREATE TABLE `datos_medicos` (
  `id_doc` int(11) NOT NULL,
  `patologia` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datos_medicos`
--

INSERT INTO `datos_medicos` (`id_doc`, `patologia`) VALUES
(10, 'Sin familiares con patología'),
(11, 'Hereditarias'),
(11, 'Hereditarias'),
(11, 'Hereditarias'),
(12, 'Sin familiares con patología'),
(14, 'Congénitas'),
(15, 'Sin familiares con patología'),
(16, 'Hereditarias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_personales`
--

CREATE TABLE `datos_personales` (
  `id_doc` int(11) NOT NULL,
  `nombres_apellidos` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `lugar_nacimiento` varchar(25) NOT NULL,
  `edad` int(11) NOT NULL,
  `estado_civil` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datos_personales`
--

INSERT INTO `datos_personales` (`id_doc`, `nombres_apellidos`, `fecha_nacimiento`, `lugar_nacimiento`, `edad`, `estado_civil`) VALUES
(10, 'PEDRO ELIAS AKINO', '1997-02-05', 'KARAKAS', 28, 'Viudo/a'),
(11, 'markitos navaja trabaja', '1998-06-16', 'karakas', 26, 'Soltero/a'),
(12, 'Pedro Elias Aquino', '2025-04-02', 'carakas', 0, 'Soltero/a'),
(14, 'Pedro Elias Aquino', '2025-04-10', 'Karakas Yaracuy', 0, 'Soltero/a'),
(15, 'Pedro Elias Aquino', '2025-04-01', 'Karakas Yaracuy', 0, 'Soltero/a'),
(16, 'Pedro Elias Aquino', '2025-05-09', 'carakas', 0, 'Soltero/a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_docs`
--

CREATE TABLE `registro_docs` (
  `id` int(11) NOT NULL,
  `tipo_doc` varchar(30) NOT NULL,
  `ci` int(25) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `asunto` text NOT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes_entradas`
--

CREATE TABLE `reportes_entradas` (
  `id` int(11) NOT NULL,
  `ci` int(11) NOT NULL,
  `fecha_entrada` datetime NOT NULL,
  `fecha_salida` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reportes_entradas`
--

INSERT INTO `reportes_entradas` (`id`, `ci`, `fecha_entrada`, `fecha_salida`) VALUES
(1, 123, '2025-04-22 21:33:04', '2025-04-22 21:33:11'),
(2, 123, '2025-04-22 21:33:17', '2025-04-22 21:47:09'),
(3, 123123, '2025-04-22 21:47:21', '2025-04-22 21:50:32'),
(4, 10, '2025-04-22 21:50:38', '2025-04-22 22:28:57'),
(5, 123, '2025-04-22 22:29:07', '2025-04-22 22:30:02'),
(6, 23, '2025-04-22 22:30:08', '2025-04-22 22:36:39'),
(7, 10, '2025-04-22 22:36:50', '2025-04-22 22:37:10'),
(8, 123, '2025-04-22 22:37:16', '2025-04-22 22:37:24'),
(9, 123123, '2025-04-22 22:37:31', '2025-04-22 22:37:45'),
(10, 23, '2025-04-22 22:38:03', '2025-04-22 22:41:25'),
(11, 123, '2025-04-23 12:28:03', '2025-04-24 11:17:55'),
(12, 123, '2025-04-24 11:17:55', '2025-04-26 14:12:56'),
(13, 123, '2025-04-26 14:12:56', '2025-04-30 20:02:18'),
(14, 123, '2025-04-30 20:02:18', '2025-04-30 23:02:49'),
(15, 23, '2025-04-30 23:09:46', '2025-04-30 23:20:11'),
(16, 10, '2025-04-30 23:20:36', '2025-04-30 23:22:31'),
(17, 123123, '2025-04-30 23:22:46', '2025-04-30 23:39:44'),
(18, 123, '2025-04-30 23:44:48', '2025-05-01 12:46:01'),
(19, 23, '2025-05-01 12:46:01', '2025-05-01 13:50:00'),
(20, 10, '2025-05-01 13:50:20', '2025-05-01 20:54:58'),
(21, 123, '2025-05-01 20:55:11', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `system_despacho`
--

CREATE TABLE `system_despacho` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `ci` int(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `asunto` text NOT NULL,
  `estado` varchar(45) NOT NULL,
  `razon` text NOT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `system_despacho`
--

INSERT INTO `system_despacho` (`id`, `nombre`, `apellido`, `ci`, `telefono`, `direccion`, `asunto`, `estado`, `razon`, `fecha`) VALUES
(1, 'MARCO', 'CHIMENEA', 123, 4242323, 'WENO Q TE PASA', 'pues que te importa', 'En Espera...', '', '2025-05-01 15:11:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `system_help`
--

CREATE TABLE `system_help` (
  `id_doc` int(10) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `fecha_solicitud` datetime DEFAULT NULL,
  `visto` int(2) NOT NULL,
  `promotor` varchar(20) NOT NULL,
  `remitente` varchar(20) NOT NULL,
  `observaciones_ayuda` text NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `system_help`
--

INSERT INTO `system_help` (`id_doc`, `titulo`, `estado`, `fecha_solicitud`, `visto`, `promotor`, `remitente`, `observaciones_ayuda`, `descripcion`) VALUES
(10, 'AHORA PA VER', 'Proceso Finalizado 3/3', '2025-04-22 18:49:23', 1, '', 'maria palasios', 'no me quiten el perreo', ''),
(11, 'markitosnavaja', 'Documento inválido', '2025-04-22 22:40:42', 1, '', 'qweqwe', 'qweqwe', 'porque si wn xd'),
(12, 'Ejemplo1', 'En espera del documento físico para ser procesado 0/3', '2025-04-30 20:08:24', 1, '', 'Jose Gonzalez', 'no me quiten el perreo', ''),
(14, 'Ejemplo2', 'En espera del documento físico para ser procesado 0/3', '2025-04-30 22:55:38', 1, '', 'qweqwe', 'qwqweqwe', ''),
(15, 'AHORA PA VER', 'En espera del documento físico para ser procesado 0/3', '2025-04-30 23:18:33', 1, 'secretario gonzalez', 'maria palasios', 'Tiene que ser 1 patologia porque sino imaginate', ''),
(16, 'AHORA PA VER', 'En espera del documento físico para ser procesado 0/3', '2025-05-01 20:59:18', 0, 'Carl Johnson', 'maria alejandra', 'ni idea', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_ayuda`
--

CREATE TABLE `tipo_ayuda` (
  `id_doc` int(11) NOT NULL,
  `tip_ayuda` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_ayuda`
--

INSERT INTO `tipo_ayuda` (`id_doc`, `tip_ayuda`) VALUES
(10, 'medicinal para la locura'),
(11, 'qweqwe'),
(12, 'medicinal para la locura'),
(14, 'qweqwe'),
(15, 'medicinal para la locura'),
(16, 'medicinal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajo`
--

CREATE TABLE `trabajo` (
  `id_doc` int(11) NOT NULL,
  `trabaja_public` varchar(10) NOT NULL,
  `trabajo` varchar(15) NOT NULL,
  `direc_trabajo` varchar(25) NOT NULL,
  `nombre_insti` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `trabajo`
--

INSERT INTO `trabajo` (`id_doc`, `trabaja_public`, `trabajo`, `direc_trabajo`, `nombre_insti`) VALUES
(10, 'Si', 'developer', 'direksion x', 'sisas'),
(11, 'Si', 'jerjerjejr', 'oewrjqowe', 'qweqweqwe'),
(12, 'No', 'No tiene', 'N/A', 'N/A'),
(14, 'Si', 'qweqwe', 'qweqweqwe', 'qweqwe'),
(15, 'Si', 'Developer', 'USA', 'Alcaldia de peña'),
(16, 'Si', 'Developer', 'USA', 'Alcaldia de peña');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `ci` int(11) NOT NULL,
  `contraseña` varchar(50) NOT NULL,
  `rango` int(11) NOT NULL,
  `sesion` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`ci`, `contraseña`, `rango`, `sesion`) VALUES
(10, '10', 1, 'False'),
(23, '23', 0, 'False'),
(123, '123', 3, 'True'),
(333, '333', 0, 'False'),
(123123, '123123', 2, 'False');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_info`
--

CREATE TABLE `user_info` (
  `ci` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user_info`
--

INSERT INTO `user_info` (`ci`, `nombre`, `apellido`) VALUES
(123, 'Carl', 'Johnson'),
(123123, 'peperoni', 'cardellino'),
(10, 'despachador', 'despachado'),
(23, 'secretario', 'gonzalez'),
(333, 'qweqw', 'eee');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos_ambiental`
--
ALTER TABLE `datos_ambiental`
  ADD KEY `id_doc` (`id_doc`);

--
-- Indices de la tabla `datos_economicos`
--
ALTER TABLE `datos_economicos`
  ADD KEY `id_doc` (`id_doc`);

--
-- Indices de la tabla `datos_extra`
--
ALTER TABLE `datos_extra`
  ADD KEY `id_doc` (`id_doc`);

--
-- Indices de la tabla `datos_import`
--
ALTER TABLE `datos_import`
  ADD KEY `id_doc` (`id_doc`);

--
-- Indices de la tabla `datos_medicos`
--
ALTER TABLE `datos_medicos`
  ADD KEY `id_doc` (`id_doc`);

--
-- Indices de la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
  ADD KEY `id_doc` (`id_doc`);

--
-- Indices de la tabla `registro_docs`
--
ALTER TABLE `registro_docs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reportes_entradas`
--
ALTER TABLE `reportes_entradas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci` (`ci`);

--
-- Indices de la tabla `system_despacho`
--
ALTER TABLE `system_despacho`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `system_help`
--
ALTER TABLE `system_help`
  ADD PRIMARY KEY (`id_doc`);

--
-- Indices de la tabla `tipo_ayuda`
--
ALTER TABLE `tipo_ayuda`
  ADD KEY `id_doc` (`id_doc`);

--
-- Indices de la tabla `trabajo`
--
ALTER TABLE `trabajo`
  ADD KEY `id_doc` (`id_doc`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ci`);

--
-- Indices de la tabla `user_info`
--
ALTER TABLE `user_info`
  ADD KEY `ci` (`ci`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registro_docs`
--
ALTER TABLE `registro_docs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reportes_entradas`
--
ALTER TABLE `reportes_entradas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `system_despacho`
--
ALTER TABLE `system_despacho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `system_help`
--
ALTER TABLE `system_help`
  MODIFY `id_doc` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `datos_ambiental`
--
ALTER TABLE `datos_ambiental`
  ADD CONSTRAINT `datos_ambiental_ibfk_1` FOREIGN KEY (`id_doc`) REFERENCES `system_help` (`id_doc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datos_economicos`
--
ALTER TABLE `datos_economicos`
  ADD CONSTRAINT `datos_economicos_ibfk_1` FOREIGN KEY (`id_doc`) REFERENCES `system_help` (`id_doc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datos_extra`
--
ALTER TABLE `datos_extra`
  ADD CONSTRAINT `datos_extra_ibfk_1` FOREIGN KEY (`id_doc`) REFERENCES `system_help` (`id_doc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datos_import`
--
ALTER TABLE `datos_import`
  ADD CONSTRAINT `datos_import_ibfk_1` FOREIGN KEY (`id_doc`) REFERENCES `system_help` (`id_doc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datos_medicos`
--
ALTER TABLE `datos_medicos`
  ADD CONSTRAINT `datos_medicos_ibfk_1` FOREIGN KEY (`id_doc`) REFERENCES `system_help` (`id_doc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
  ADD CONSTRAINT `datos_personales_ibfk_1` FOREIGN KEY (`id_doc`) REFERENCES `system_help` (`id_doc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tipo_ayuda`
--
ALTER TABLE `tipo_ayuda`
  ADD CONSTRAINT `tipo_ayuda_ibfk_1` FOREIGN KEY (`id_doc`) REFERENCES `system_help` (`id_doc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `trabajo`
--
ALTER TABLE `trabajo`
  ADD CONSTRAINT `trabajo_ibfk_1` FOREIGN KEY (`id_doc`) REFERENCES `system_help` (`id_doc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `user_info_ibfk_1` FOREIGN KEY (`ci`) REFERENCES `user` (`ci`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

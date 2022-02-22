-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2020 a las 00:48:16
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Estructura de tabla para la tabla `amonestaciones`
--

CREATE TABLE `amonestaciones` (
  `Cod_amon` int(100) NOT NULL,
  `Fecha_amon` varchar(20) NOT NULL,
  `Num_amon` varchar(20) NOT NULL,
  `Motivo_amon` varchar(20) NOT NULL,
  `Tipo_amon` varchar(20) NOT NULL,
  `Emisor_amon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `asistencia_id` int(11) NOT NULL,
  `Cod_hor_asist` int(100) NOT NULL,
  `total` int(11) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`asistencia_id`, `Cod_hor_asist`, `total`, `Fecha`) VALUES
(2, 7, 1, '2020-02-13 04:00:00'),
(3, 8, 1, '2020-02-11 04:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correo`
--

CREATE TABLE `correo` (
  `ID_correo` int(100) NOT NULL,
  `Tipo_correo` varchar(200) NOT NULL,
  `C_I` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `correo`
--

INSERT INTO `correo` (`ID_correo`, `Tipo_correo`, `C_I`) VALUES
(2, 'marielysjaraujof@gmail.com', 27592227),
(3, 'servio7@gmail.com', 26237838),
(4, 'sebas335@gmail.com', 27578118);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deuda`
--

CREATE TABLE `deuda` (
  `Cod_deuda` int(11) NOT NULL,
  `monto_deuda_total` int(11) NOT NULL,
  `cod_pago` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `Calle` varchar(250) NOT NULL,
  `Cod_dir` int(100) NOT NULL,
  `Cod_postal` int(100) NOT NULL,
  `Num_calle` varchar(100) NOT NULL,
  `Num_casa` varchar(250) NOT NULL,
  `Sector` varchar(200) NOT NULL,
  `Urb` varchar(200) NOT NULL,
  `C_I` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`Calle`, `Cod_dir`, `Cod_postal`, `Num_calle`, `Num_casa`, `Sector`, `Urb`, `C_I`) VALUES
('Calle Caracas', 21, 6064, '', '', 'La Floresta', '', 27592227),
('', 22, 0, '01', '15', '', 'Los Cocales', 26237838),
('', 23, 0, '01', 'B2', '', 'Santa Agata', 27578118);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencia_laboral`
--

CREATE TABLE `experiencia_laboral` (
  `id_exp` int(11) NOT NULL,
  `C_I` int(100) NOT NULL,
  `exp_lab` int(11) NOT NULL,
  `oficial_exp_lab` varchar(200) NOT NULL,
  `priv_exp_lab` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `experiencia_laboral`
--

INSERT INTO `experiencia_laboral` (`id_exp`, `C_I`, `exp_lab`, `oficial_exp_lab`, `priv_exp_lab`) VALUES
(2, 27592227, 0, '', ''),
(3, 26237838, 0, '', ''),
(4, 27578118, 0, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `descuento` varchar(90) NOT NULL,
  `IVA` varchar(90) NOT NULL,
  `monto_completo` varchar(90) NOT NULL,
  `cod_factura` int(90) NOT NULL,
  `num_factura` varchar(90) NOT NULL,
  `cod_pago` int(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formacion_academica`
--

CREATE TABLE `formacion_academica` (
  `Cod_for_a` int(100) NOT NULL,
  `Titulo` varchar(20) DEFAULT NULL,
  `Grado_actual_instruc` varchar(20) DEFAULT NULL,
  `Año_for_a` varchar(20) DEFAULT NULL,
  `credencial_titulo` varchar(80) DEFAULT NULL,
  `Actual_instruct` varchar(20) DEFAULT NULL,
  `titulo_fecha` date NOT NULL DEFAULT '2011-01-01',
  `C_I` int(100) NOT NULL,
  `nivel_curso` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `formacion_academica`
--

INSERT INTO `formacion_academica` (`Cod_for_a`, `Titulo`, `Grado_actual_instruc`, `Año_for_a`, `credencial_titulo`, `Actual_instruct`, `titulo_fecha`, `C_I`, `nivel_curso`) VALUES
(12, 'Bachiller', NULL, '2016', 'AKL658SF5HW6', 'No', '0000-00-00', 27592227, 'Bachiller'),
(13, 'Bachiller', NULL, '2016', 'gjhgjfgv', 'No', '0000-00-00', 26237838, 'Bachiller'),
(14, 'Bachiller', NULL, '2016', 'gkldk4534', 'No', '0000-00-00', 27578118, 'Bachiller');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hijos_personal`
--

CREATE TABLE `hijos_personal` (
  `id_hijos` int(11) NOT NULL,
  `C_I` int(100) NOT NULL,
  `exihijos` enum('No tiene','Tiene') NOT NULL,
  `gradoCursoHijos` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hijos_personal`
--

INSERT INTO `hijos_personal` (`id_hijos`, `C_I`, `exihijos`, `gradoCursoHijos`) VALUES
(2, 27592227, '', ''),
(3, 26237838, '', '2do Grado'),
(4, 27578118, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `horario_id` int(11) NOT NULL,
  `horas_trab` varchar(200) NOT NULL,
  `C_I` int(100) NOT NULL,
  `turno` enum('Mañana','Tarde','Ambos') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`horario_id`, `horas_trab`, `C_I`, `turno`) VALUES
(18, '8:00 AM - 12:00PM', 27592227, 'Mañana'),
(19, '1:30 PM - 5:00PM', 26237838, 'Tarde'),
(20, '8:00 AM - 12:00 PM', 27578118, 'Ambos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inasistencia`
--

CREATE TABLE `inasistencia` (
  `inasistencia_id` int(11) NOT NULL,
  `Cod_inasist` int(100) NOT NULL,
  `total_inasist` int(11) NOT NULL,
  `fecha_inasist` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tipo_inasist` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inasistencia`
--

INSERT INTO `inasistencia` (`inasistencia_id`, `Cod_inasist`, `total_inasist`, `fecha_inasist`, `tipo_inasist`) VALUES
(5, 5, 4, '2020-02-13 04:00:00', 'No Justificado'),
(6, 6, 3, '2020-02-12 01:00:28', 'No Justificado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instituto`
--

CREATE TABLE `instituto` (
  `Cod_inst` int(100) NOT NULL,
  `Cod_dir` int(100) NOT NULL,
  `Nombre_inst` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `instituto`
--

INSERT INTO `instituto` (`Cod_inst`, `Cod_dir`, `Nombre_inst`) VALUES
(2, 21, 'José Gil Fortoul'),
(3, 22, 'Churum Merú'),
(4, 23, 'Churum Meru');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `justificacion`
--

CREATE TABLE `justificacion` (
  `Cod_just` int(100) NOT NULL,
  `Num_just` int(100) NOT NULL,
  `Motivo_just` varchar(20) NOT NULL,
  `Fecha_just` date NOT NULL,
  `Cod_perm` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `justificacion`
--

INSERT INTO `justificacion` (`Cod_just`, `Num_just`, `Motivo_just`, `Fecha_just`, `Cod_perm`) VALUES
(4, 123, 'Salud', '2020-02-12', 0),
(5, 123, 'Prueba', '2020-02-11', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `moroso`
--
CREATE TABLE `moroso` (
  `tiempo_retraso` varchar(90) NOT NULL,
  `monto_mora` varchar(90) NOT NULL,
  `nro_factura_mora` varchar(90) NOT NULL,
  `cod_moroso` int(90) NOT NULL,
  `cod_representante` int(90) NOT NULL,
  `cod_personal` int(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `num_pago` varchar(90) NOT NULL,
  `cod_pago` int(11) NOT NULL,
  `control_pago` varchar(90) NOT NULL,
  `cod_representante` int(90) NOT NULL,
  `abono` varchar(25) DEFAULT NULL,
  `cod_personal` int(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_genera factura`
--

CREATE TABLE `pago_genera factura` (
  `cod_pago` int(90) NOT NULL,
  `cod_factura` int(90) NOT NULL,
  `fecha_titulo_fac` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `Cod_perm` int(100) NOT NULL,
  `Fecha_perm` date NOT NULL,
  `Tipo_perm` varchar(20) NOT NULL,
  `Observ_perm` varchar(20) NOT NULL,
  `dias_perm` int(100) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_culm` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `P_nombre` varchar(20) NOT NULL,
  `P_apellido` varchar(20) NOT NULL,
  `C_I` int(100) NOT NULL,
  `Sexo` varchar(20) NOT NULL,
  `S_nombre` varchar(20) NOT NULL,
  `S_apellido` varchar(20) NOT NULL,
  `Estado_civil` varchar(20) NOT NULL,
  `Edad` int(100) NOT NULL,
  `Fecha_n` date NOT NULL,
  `Tipo_pers` char(20) NOT NULL,
  `habilidades` varchar(300) NOT NULL,
  `ocupacion_2` varchar(200) NOT NULL,
  `fecha_ingreso` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`P_nombre`, `P_apellido`, `C_I`, `Sexo`, `S_nombre`, `S_apellido`, `Estado_civil`, `Edad`, `Fecha_n`, `Tipo_pers`, `habilidades`, `ocupacion_2`, `fecha_ingreso`) VALUES
('Servio', 'Wright', 26237838, 'Masculino', 'Lee', 'Chan', 'Soltero', 27, '1993-05-02', 'Docente', '', '', '2020-02-12 04:02:53'),
('Sebastian', 'Zerpa', 27578118, 'Masculino', 'Ernesto', 'Rosal', 'Soltero', 26, '1994-08-14', 'Obrero', '', '', '2020-02-12 04:11:22'),
('Marielys', 'Araujo', 27592227, 'Femenino', 'Jackeline', 'Franco', 'Soltero', 26, '1994-09-30', 'Administrativo', 'Bilingue', 'No ocupa', '2020-02-12 03:48:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_cumple_inasistencia`
--

CREATE TABLE `personal_cumple_inasistencia` (
  `horario_id` int(11) NOT NULL,
  `Cod_inasist` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personal_cumple_inasistencia`
--

INSERT INTO `personal_cumple_inasistencia` (`horario_id`, `Cod_inasist`) VALUES
(19, 5),
(20, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_genera_amonestacion`
--

CREATE TABLE `personal_genera_amonestacion` (
  `C_I` int(100) NOT NULL,
  `Cod_amon` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_lleva_horario`
--

CREATE TABLE `personal_lleva_horario` (
  `horario_id` int(11) NOT NULL,
  `Cod_hor_asist` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personal_lleva_horario`
--

INSERT INTO `personal_lleva_horario` (`horario_id`, `Cod_hor_asist`) VALUES
(18, 8),
(20, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_solicita_permiso`
--

CREATE TABLE `personal_solicita_permiso` (
  `C_I` int(100) NOT NULL,
  `Cod_perm` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_tiene_formacion_acad`
--

CREATE TABLE `personal_tiene_formacion_acad` (
  `C_I` int(100) NOT NULL,
  `Cod_for_a` int(100) NOT NULL,
  `Fecha_for` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_tiene_justificacion`
--

CREATE TABLE `personal_tiene_justificacion` (
  `C_I` int(100) NOT NULL,
  `Cod_just` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personal_tiene_justificacion`
--

INSERT INTO `personal_tiene_justificacion` (`C_I`, `Cod_just`) VALUES
(27592227, 4),
(26237838, 5),
(27592227, 4),
(26237838, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `representante`
--

CREATE TABLE `representante` (
  `cod_representante` int(90) NOT NULL,
  `Tipo_representante` varchar(90) NOT NULL,
  `parentesco` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `representante_puede_ser_moroso`
--

CREATE TABLE `representante_puede_ser_moroso` (
  `fecha_pago_mora` int(90) NOT NULL,
  `cod_representante` int(90) NOT NULL,
  `cod_moroso` int(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono`
--

CREATE TABLE `telefono` (
  `Cod_telf` int(100) NOT NULL,
  `Tipo_telf` varchar(20) NOT NULL,
  `Area_telf` varchar(20) NOT NULL,
  `Num_telf` int(100) NOT NULL,
  `C_I` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `telefono`
--

INSERT INTO `telefono` (`Cod_telf`, `Tipo_telf`, `Area_telf`, `Num_telf`, `C_I`) VALUES
(2, 'Casa', '0283', 2552079, 27592227),
(3, 'Celular', '0416', 5813646, 27592227),
(4, 'Casa', '424', 545, 26237838),
(5, 'Celular', '56464', 46565, 26237838),
(6, 'Casa', '456', 4123659, 27578118),
(7, 'Celular', '0424', 4698123, 27578118);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pago`
--

CREATE TABLE `tipo_pago` (
  `Cod_tipo_pago` int(11) NOT NULL,
  `Tipo_pago` enum('Solvente','Moroso','','') NOT NULL,
  `cod_pago` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--

CREATE TABLE `trabajador` (
  `ID_trabajador` int(11) NOT NULL,
  `C_I` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Nom_usuario` varchar(20) NOT NULL,
  `ID_usuario` int(100) NOT NULL,
  `Tipo_cuenta` varchar(20) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Intento` int(20) NOT NULL,
  `Preg_1` varchar(20) NOT NULL,
  `Preg_2` varchar(20) NOT NULL,
  `Preg_3` varchar(20) NOT NULL,
  `Res_1` varchar(20) NOT NULL,
  `Res_2` varchar(20) NOT NULL,
  `Res_3` varchar(20) NOT NULL,
  `C_I` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
  `data` blob NOT NULL,
  PRIMARY KEY (id),
  KEY `ci_sessions_timestamp` (`timestamp`)
);


--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Nom_usuario`, `ID_usuario`, `Tipo_cuenta`, `Password`, `Intento`, `Preg_1`, `Preg_2`, `Preg_3`, `Res_1`, `Res_2`, `Res_3`, `C_I`) VALUES
('marielys', 2, 'Administrador', "27592227", 0, 'Color', 'Edad ', 'Animal', 'azul', '20', 'gato', 27592227),
('servio', 3, 'Administrador', "1234", 0, 'hjjgkg', 'kgkh', 'kgkhl', 'gkkih', 'khkihikh', 'khkhik', 26237838),
('sebas', 4, 'Usuario', "123456", 0, 'Edad', 'Hermano', 'Mes', '21', 'carlos', 'febrero', 27578118);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `amonestaciones`
--
ALTER TABLE `amonestaciones`
  ADD PRIMARY KEY (`Cod_amon`);

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`asistencia_id`),
  ADD KEY `Cod_hor_asist` (`Cod_hor_asist`);

--
-- Indices de la tabla `correo`
--
ALTER TABLE `correo`
  ADD PRIMARY KEY (`ID_correo`),
  ADD KEY `C_I` (`C_I`) USING BTREE;

--
-- Indices de la tabla `deuda`
--
ALTER TABLE `deuda`
  ADD PRIMARY KEY (`Cod_deuda`),
  ADD KEY `cod_pago` (`cod_pago`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`Cod_dir`),
  ADD KEY `C_I` (`C_I`);

--
-- Indices de la tabla `experiencia_laboral`
--
ALTER TABLE `experiencia_laboral`
  ADD PRIMARY KEY (`id_exp`),
  ADD KEY `C_I` (`C_I`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`cod_factura`),
  ADD KEY `cod_pago` (`cod_pago`);

--
-- Indices de la tabla `formacion_academica`
--
ALTER TABLE `formacion_academica`
  ADD PRIMARY KEY (`Cod_for_a`),
  ADD KEY `C.I` (`C_I`);

--
-- Indices de la tabla `hijos_personal`
--
ALTER TABLE `hijos_personal`
  ADD PRIMARY KEY (`id_hijos`),
  ADD KEY `C_I` (`C_I`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`horario_id`),
  ADD KEY `C_I` (`C_I`);

--
-- Indices de la tabla `inasistencia`
--
ALTER TABLE `inasistencia`
  ADD PRIMARY KEY (`inasistencia_id`),
  ADD KEY `Cod_inasist` (`Cod_inasist`);

--
-- Indices de la tabla `instituto`
--
ALTER TABLE `instituto`
  ADD PRIMARY KEY (`Cod_inst`),
  ADD KEY `Cod_dir` (`Cod_dir`);

--
-- Indices de la tabla `justificacion`
--
ALTER TABLE `justificacion`
  ADD PRIMARY KEY (`Cod_just`),
  ADD KEY `Cod_perm` (`Cod_perm`);

--
-- Indices de la tabla `moroso`
--
ALTER TABLE `moroso`
  ADD PRIMARY KEY (`cod_moroso`),
  ADD KEY `cod_representante` (`cod_representante`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`cod_pago`),
  ADD KEY `cod_representante` (`cod_representante`);

--
-- Indices de la tabla `pago_genera factura`
--
ALTER TABLE `pago_genera factura`
  ADD KEY `cod_pago` (`cod_pago`,`cod_factura`),
  ADD KEY `cod_factura` (`cod_factura`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`Cod_perm`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`C_I`);

--
-- Indices de la tabla `personal_cumple_inasistencia`
--
ALTER TABLE `personal_cumple_inasistencia`
  ADD PRIMARY KEY (`Cod_inasist`),
  ADD KEY `horario_id` (`horario_id`);

--
-- Indices de la tabla `personal_genera_amonestacion`
--
ALTER TABLE `personal_genera_amonestacion`
  ADD KEY `C.I` (`C_I`,`Cod_amon`),
  ADD KEY `Cod_amon` (`Cod_amon`);

--
-- Indices de la tabla `personal_lleva_horario`
--
ALTER TABLE `personal_lleva_horario`
  ADD PRIMARY KEY (`Cod_hor_asist`),
  ADD KEY `horario_id` (`horario_id`);

--
-- Indices de la tabla `personal_solicita_permiso`
--
ALTER TABLE `personal_solicita_permiso`
  ADD KEY `C.I` (`C_I`,`Cod_perm`),
  ADD KEY `Cod_perm` (`Cod_perm`);

--
-- Indices de la tabla `personal_tiene_formacion_acad`
--
ALTER TABLE `personal_tiene_formacion_acad`
  ADD KEY `C.I` (`C_I`,`Cod_for_a`,`Fecha_for`),
  ADD KEY `Cod_for_a` (`Cod_for_a`);

--
-- Indices de la tabla `personal_tiene_justificacion`
--
ALTER TABLE `personal_tiene_justificacion`
  ADD KEY `C_I` (`C_I`),
  ADD KEY `Cod_just` (`Cod_just`);

--
-- Indices de la tabla `representante`
--
ALTER TABLE `representante`
  ADD PRIMARY KEY (`cod_representante`),
  ADD KEY `cod_representante` (`cod_representante`);

--
-- Indices de la tabla `representante_puede_ser_moroso`
--
ALTER TABLE `representante_puede_ser_moroso`
  ADD KEY `cod_representante` (`cod_representante`,`cod_moroso`),
  ADD KEY `cod_moroso` (`cod_moroso`);

--
-- Indices de la tabla `telefono`
--
ALTER TABLE `telefono`
  ADD PRIMARY KEY (`Cod_telf`),
  ADD KEY `C.I` (`C_I`);

--
-- Indices de la tabla `tipo_pago`
--
ALTER TABLE `tipo_pago`
  ADD KEY `cod_pago` (`cod_pago`);

--
-- Indices de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD KEY `C_I` (`C_I`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_usuario`),
  ADD UNIQUE KEY `Nom_usuario` (`Nom_usuario`),
  ADD KEY `C_I` (`C_I`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `amonestaciones`
--
ALTER TABLE `amonestaciones`
  MODIFY `Cod_amon` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `asistencia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `correo`
--
ALTER TABLE `correo`
  MODIFY `ID_correo` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `deuda`
--
ALTER TABLE `deuda`
  MODIFY `Cod_deuda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `direccion`
--
ALTER TABLE `direccion`
  MODIFY `Cod_dir` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `experiencia_laboral`
--
ALTER TABLE `experiencia_laboral`
  MODIFY `id_exp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `formacion_academica`
--
ALTER TABLE `formacion_academica`
  MODIFY `Cod_for_a` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `hijos_personal`
--
ALTER TABLE `hijos_personal`
  MODIFY `id_hijos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `horario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `inasistencia`
--
ALTER TABLE `inasistencia`
  MODIFY `inasistencia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `instituto`
--
ALTER TABLE `instituto`
  MODIFY `Cod_inst` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `justificacion`
--
ALTER TABLE `justificacion`
  MODIFY `Cod_just` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `cod_pago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `Cod_perm` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_cumple_inasistencia`
--
ALTER TABLE `personal_cumple_inasistencia`
  MODIFY `Cod_inasist` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `personal_lleva_horario`
--
ALTER TABLE `personal_lleva_horario`
  MODIFY `Cod_hor_asist` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `telefono`
--
ALTER TABLE `telefono`
  MODIFY `Cod_telf` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_usuario` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`Cod_hor_asist`) REFERENCES `personal_lleva_horario` (`Cod_hor_asist`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `correo`
--
ALTER TABLE `correo`
  ADD CONSTRAINT `correo_ibfk_1` FOREIGN KEY (`C_I`) REFERENCES `personal` (`C_I`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `deuda`
--
ALTER TABLE `deuda`
  ADD CONSTRAINT `deuda_ibfk_1` FOREIGN KEY (`cod_pago`) REFERENCES `pago` (`cod_pago`);

--
-- Filtros para la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD CONSTRAINT `direccion_ibfk_1` FOREIGN KEY (`C_I`) REFERENCES `personal` (`C_I`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `experiencia_laboral`
--
ALTER TABLE `experiencia_laboral`
  ADD CONSTRAINT `experiencia_laboral_ibfk_1` FOREIGN KEY (`C_I`) REFERENCES `personal` (`C_I`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`cod_pago`) REFERENCES `pago` (`cod_pago`);

--
-- Filtros para la tabla `formacion_academica`
--
ALTER TABLE `formacion_academica`
  ADD CONSTRAINT `formacion_academica_ibfk_1` FOREIGN KEY (`C_I`) REFERENCES `personal` (`C_I`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hijos_personal`
--
ALTER TABLE `hijos_personal`
  ADD CONSTRAINT `hijos_personal_ibfk_1` FOREIGN KEY (`C_I`) REFERENCES `personal` (`C_I`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `horario_ibfk_1` FOREIGN KEY (`C_I`) REFERENCES `personal` (`C_I`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inasistencia`
--
ALTER TABLE `inasistencia`
  ADD CONSTRAINT `inasistencia_ibfk_1` FOREIGN KEY (`Cod_inasist`) REFERENCES `personal_cumple_inasistencia` (`Cod_inasist`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `instituto`
--
ALTER TABLE `instituto`
  ADD CONSTRAINT `instituto_ibfk_1` FOREIGN KEY (`Cod_dir`) REFERENCES `direccion` (`Cod_dir`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `moroso`
--
ALTER TABLE `moroso`
  ADD CONSTRAINT `moroso_ibfk_1` FOREIGN KEY (`cod_representante`) REFERENCES `representante` (`cod_representante`);

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`cod_representante`) REFERENCES `representante` (`cod_representante`);

--
-- Filtros para la tabla `pago_genera factura`
--
ALTER TABLE `pago_genera factura`
  ADD CONSTRAINT `pago_genera factura_ibfk_1` FOREIGN KEY (`cod_factura`) REFERENCES `factura` (`cod_factura`),
  ADD CONSTRAINT `pago_genera factura_ibfk_2` FOREIGN KEY (`cod_pago`) REFERENCES `pago` (`cod_pago`);

--
-- Filtros para la tabla `personal_cumple_inasistencia`
--
ALTER TABLE `personal_cumple_inasistencia`
  ADD CONSTRAINT `personal_cumple_inasistencia_ibfk_1` FOREIGN KEY (`horario_id`) REFERENCES `horario` (`horario_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `personal_genera_amonestacion`
--
ALTER TABLE `personal_genera_amonestacion`
  ADD CONSTRAINT `personal_genera_amonestacion_ibfk_1` FOREIGN KEY (`Cod_amon`) REFERENCES `amonestaciones` (`Cod_amon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_genera_amonestacion_ibfk_2` FOREIGN KEY (`C_I`) REFERENCES `personal` (`C_I`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `personal_lleva_horario`
--
ALTER TABLE `personal_lleva_horario`
  ADD CONSTRAINT `personal_lleva_horario_ibfk_1` FOREIGN KEY (`horario_id`) REFERENCES `horario` (`horario_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `personal_solicita_permiso`
--
ALTER TABLE `personal_solicita_permiso`
  ADD CONSTRAINT `personal_solicita_permiso_ibfk_1` FOREIGN KEY (`C_I`) REFERENCES `personal` (`C_I`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_solicita_permiso_ibfk_2` FOREIGN KEY (`Cod_perm`) REFERENCES `permiso` (`Cod_perm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `personal_tiene_formacion_acad`
--
ALTER TABLE `personal_tiene_formacion_acad`
  ADD CONSTRAINT `personal_tiene_formacion_acad_ibfk_1` FOREIGN KEY (`Cod_for_a`) REFERENCES `formacion_academica` (`Cod_for_a`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_tiene_formacion_acad_ibfk_2` FOREIGN KEY (`C_I`) REFERENCES `personal` (`C_I`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `personal_tiene_justificacion`
--
ALTER TABLE `personal_tiene_justificacion`
  ADD CONSTRAINT `personal_tiene_justificacion_ibfk_1` FOREIGN KEY (`Cod_just`) REFERENCES `justificacion` (`Cod_just`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_tiene_justificacion_ibfk_2` FOREIGN KEY (`C_I`) REFERENCES `personal` (`C_I`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `representante_puede_ser_moroso`
--
ALTER TABLE `representante_puede_ser_moroso`
  ADD CONSTRAINT `representante_puede_ser_moroso_ibfk_1` FOREIGN KEY (`cod_representante`) REFERENCES `representante` (`cod_representante`),
  ADD CONSTRAINT `representante_puede_ser_moroso_ibfk_2` FOREIGN KEY (`cod_moroso`) REFERENCES `moroso` (`cod_moroso`);

--
-- Filtros para la tabla `telefono`
--
ALTER TABLE `telefono`
  ADD CONSTRAINT `telefono_ibfk_1` FOREIGN KEY (`C_I`) REFERENCES `personal` (`C_I`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tipo_pago`
--
ALTER TABLE `tipo_pago`
  ADD CONSTRAINT `tipo_pago_ibfk_1` FOREIGN KEY (`cod_pago`) REFERENCES `pago` (`cod_pago`);

--
-- Filtros para la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD CONSTRAINT `trabajador_ibfk_1` FOREIGN KEY (`C_I`) REFERENCES `personal` (`C_I`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`C_I`) REFERENCES `personal` (`C_I`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

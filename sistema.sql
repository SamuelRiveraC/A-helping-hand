-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-06-2019 a las 01:33:52
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
  `Cod_amon` varchar(20) NOT NULL,
  `Fecha_amon` varchar(20) NOT NULL,
  `Num_amon` varchar(20) NOT NULL,
  `Motivo_amon` varchar(20) NOT NULL,
  `Tipo_amon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `ID_ciudad` varchar(20) NOT NULL,
  `nombre_ciudad` varchar(20) NOT NULL,
  `Cod_dir` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correo`
--

CREATE TABLE `correo` (
  `ID_correo` varchar(20) NOT NULL,
  `Tipo_correo` varchar(20) NOT NULL,
  `C_I` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `Nom_depart` varchar(20) NOT NULL,
  `ID_depart` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`Nom_depart`, `ID_depart`) VALUES
('oficina', '001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `Calle` varchar(20) NOT NULL,
  `Cod_dir` varchar(20) NOT NULL,
  `Cod_portal` varchar(20) NOT NULL,
  `Num_calle` varchar(20) NOT NULL,
  `Num_casa` varchar(20) NOT NULL,
  `Sector` varchar(20) NOT NULL,
  `Urb` varchar(20) NOT NULL,
  `ID_estado` varchar(20) NOT NULL,
  `ID_pais` varchar(20) NOT NULL,
  `ID_ciudad` varchar(20) NOT NULL,
  `ID_municipio` varchar(20) NOT NULL,
  `ID_parroquia` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`Calle`, `Cod_dir`, `Cod_portal`, `Num_calle`, `Num_casa`, `Sector`, `Urb`, `ID_estado`, `ID_pais`, `ID_ciudad`, `ID_municipio`, `ID_parroquia`) VALUES
('12', '012', '102', '10', '1', 'morichal', 'santa agata', '02', '03', '04', '05', '06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `ID_estado` varchar(20) NOT NULL,
  `mombre_estado` varchar(20) NOT NULL,
  `Cod_dir` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha_n`
--

CREATE TABLE `fecha_n` (
  `Cod_fec_nac` varchar(20) NOT NULL,
  `Año_nac` varchar(20) NOT NULL,
  `Mes_nac` varchar(20) NOT NULL,
  `Dia_nac` varchar(20) NOT NULL,
  `Lugar_nac` varchar(20) NOT NULL,
  `C_I` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formacion_academica`
--

CREATE TABLE `formacion_academica` (
  `Cod_for_a` varchar(20) NOT NULL,
  `Titulo` varchar(20) NOT NULL,
  `Grado` varchar(20) NOT NULL,
  `Año_for_a` varchar(20) NOT NULL,
  `Nivel_curso` varchar(20) NOT NULL,
  `Nivel_instruct` varchar(20) NOT NULL,
  `Fecha_for` varchar(20) NOT NULL,
  `C_I` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_asistencia`
--

CREATE TABLE `horario_asistencia` (
  `Cod_hor_asist` varchar(20) NOT NULL,
  `Hora_e` varchar(20) NOT NULL,
  `Hora_s` varchar(20) NOT NULL,
  `Turno_asist` varchar(20) NOT NULL,
  `Fecha_asist` varchar(20) NOT NULL,
  `Total_asist` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inasistencia`
--

CREATE TABLE `inasistencia` (
  `Cod_inasist` varchar(20) NOT NULL,
  `Fecha_inasist` varchar(20) NOT NULL,
  `Num_inasist` varchar(20) NOT NULL,
  `Tipo_inasist` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instituto`
--

CREATE TABLE `instituto` (
  `Cod_inst` varchar(20) NOT NULL,
  `Cod_dir` varchar(20) NOT NULL,
  `Nombre_inst` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `justificacion`
--

CREATE TABLE `justificacion` (
  `Cod_just` varchar(20) NOT NULL,
  `Num_just` varchar(20) NOT NULL,
  `Motivo_just` varchar(20) NOT NULL,
  `Fecha_just` varchar(20) NOT NULL,
  `Cod_perm` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `ID_municipio` varchar(20) NOT NULL,
  `nombre_municipio` varchar(20) NOT NULL,
  `Cod_dir` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `ID_pais` varchar(20) NOT NULL,
  `nombre_pais` varchar(20) NOT NULL,
  `Cod_dir` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parroquia`
--

CREATE TABLE `parroquia` (
  `ID_parroquia` varchar(20) NOT NULL,
  `nombre_parroquia` varchar(20) NOT NULL,
  `Cod_dir` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `Cod_perm` varchar(20) NOT NULL,
  `Fecha_perm` varchar(20) NOT NULL,
  `Tipo_perm` varchar(20) NOT NULL,
  `Observ_perm` varchar(20) NOT NULL,
  `dias_perm` varchar(100) NOT NULL,
  `fecha_inicio` varchar(100) NOT NULL,
  `fecha_culm` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `P_nombre` varchar(20) NOT NULL,
  `P_apellido` varchar(20) NOT NULL,
  `C_I` varchar(20) NOT NULL,
  `Sexo` varchar(20) NOT NULL,
  `Nacionalidad` varchar(20) NOT NULL,
  `Cod_dir` varchar(20) NOT NULL,
  `S_nombre` varchar(20) NOT NULL,
  `S_apellido` varchar(20) NOT NULL,
  `ID_depart` varchar(20) NOT NULL,
  `Estado_civil` varchar(20) NOT NULL,
  `Edad` varchar(20) NOT NULL,
  `Fecha_n` varchar(20) NOT NULL,
  `Tipo_pers` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`P_nombre`, `P_apellido`, `C_I`, `Sexo`, `Nacionalidad`, `Cod_dir`, `S_nombre`, `S_apellido`, `ID_depart`, `Estado_civil`, `Edad`, `Fecha_n`, `Tipo_pers`) VALUES
('sebastian', 'zerpa', '26384339', 'masculino', 'venezolano', '012', 'ernesto', 'rosal', '001', 'soltero', '21', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_cumple_inasistencia`
--

CREATE TABLE `personal_cumple_inasistencia` (
  `C_I` varchar(20) NOT NULL,
  `Cod_inasist` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_genera_amonestacion`
--

CREATE TABLE `personal_genera_amonestacion` (
  `C_I` varchar(20) NOT NULL,
  `Cod_amon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_lleva_horario`
--

CREATE TABLE `personal_lleva_horario` (
  `C_I` varchar(20) NOT NULL,
  `Cod_hor_asist` varchar(20) NOT NULL,
  `Fecha_T_I` varchar(20) NOT NULL,
  `Fecha_culm` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_solicita_permiso`
--

CREATE TABLE `personal_solicita_permiso` (
  `C_I` varchar(20) NOT NULL,
  `Cod_perm` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_tiene_formacion_acad`
--

CREATE TABLE `personal_tiene_formacion_acad` (
  `C_I` varchar(20) NOT NULL,
  `Cod_for_a` varchar(20) NOT NULL,
  `Fecha_for` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono`
--

CREATE TABLE `telefono` (
  `Cod_telf` varchar(20) NOT NULL,
  `Tipo_telf` varchar(20) NOT NULL,
  `Area_telf` varchar(20) NOT NULL,
  `Num_telf` varchar(20) NOT NULL,
  `C_I` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_personal`
--

CREATE TABLE `tipo_personal` (
  `Cod_tip_pers` varchar(20) NOT NULL,
  `Tipo_pers` varchar(20) NOT NULL,
  `C_I` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Nom_usuario` varchar(20) NOT NULL,
  `ID_usuario` varchar(20) NOT NULL,
  `Tipo_cuenta` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Activo` varchar(20) NOT NULL,
  `C.I` varchar(20) NOT NULL,
  `Intento` varchar(20) NOT NULL,
  `Preg_1` varchar(20) NOT NULL,
  `Preg_2` varchar(20) NOT NULL,
  `Preg_3` varchar(20) NOT NULL,
  `Res_1` varchar(20) NOT NULL,
  `Res_2` varchar(20) NOT NULL,
  `Res_3` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Nom_usuario`, `ID_usuario`, `Tipo_cuenta`, `Password`, `Activo`, `C.I`, `Intento`, `Preg_1`, `Preg_2`, `Preg_3`, `Res_1`, `Res_2`, `Res_3`) VALUES
('sebas', '01', 'asistente', '1234', 'ocasional', '26384339', '3', '', '', '', '', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `amonestaciones`
--
ALTER TABLE `amonestaciones`
  ADD PRIMARY KEY (`Cod_amon`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`ID_ciudad`),
  ADD KEY `Cod_dir` (`Cod_dir`),
  ADD KEY `Cod_dir_2` (`Cod_dir`) USING BTREE;

--
-- Indices de la tabla `correo`
--
ALTER TABLE `correo`
  ADD PRIMARY KEY (`ID_correo`),
  ADD KEY `C.I` (`C_I`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`ID_depart`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`Cod_dir`),
  ADD KEY `ID_estado` (`ID_estado`,`ID_pais`,`ID_ciudad`,`ID_municipio`,`ID_parroquia`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`ID_estado`),
  ADD KEY `Cod_dir` (`Cod_dir`);

--
-- Indices de la tabla `fecha_n`
--
ALTER TABLE `fecha_n`
  ADD PRIMARY KEY (`Cod_fec_nac`),
  ADD KEY `C.I` (`C_I`);

--
-- Indices de la tabla `formacion_academica`
--
ALTER TABLE `formacion_academica`
  ADD PRIMARY KEY (`Cod_for_a`),
  ADD KEY `C.I` (`C_I`);

--
-- Indices de la tabla `horario_asistencia`
--
ALTER TABLE `horario_asistencia`
  ADD PRIMARY KEY (`Cod_hor_asist`);

--
-- Indices de la tabla `inasistencia`
--
ALTER TABLE `inasistencia`
  ADD PRIMARY KEY (`Cod_inasist`);

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
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`ID_municipio`),
  ADD KEY `Cod_dir` (`Cod_dir`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`ID_pais`),
  ADD KEY `Cod_dir` (`Cod_dir`);

--
-- Indices de la tabla `parroquia`
--
ALTER TABLE `parroquia`
  ADD PRIMARY KEY (`ID_parroquia`),
  ADD KEY `Cod_dir` (`Cod_dir`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`Cod_perm`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`C_I`),
  ADD KEY `Cod_dir` (`Cod_dir`),
  ADD KEY `ID_depart` (`ID_depart`);

--
-- Indices de la tabla `personal_cumple_inasistencia`
--
ALTER TABLE `personal_cumple_inasistencia`
  ADD KEY `C.I` (`C_I`,`Cod_inasist`),
  ADD KEY `Cod_inasist` (`Cod_inasist`);

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
  ADD KEY `C.I` (`C_I`,`Cod_hor_asist`,`Fecha_T_I`,`Fecha_culm`),
  ADD KEY `Cod_hor_asist` (`Cod_hor_asist`);

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
-- Indices de la tabla `telefono`
--
ALTER TABLE `telefono`
  ADD PRIMARY KEY (`Cod_telf`),
  ADD KEY `C.I` (`C_I`);

--
-- Indices de la tabla `tipo_personal`
--
ALTER TABLE `tipo_personal`
  ADD PRIMARY KEY (`Cod_tip_pers`),
  ADD KEY `C.I` (`C_I`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_usuario`),
  ADD KEY `C.I` (`C.I`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `ciudad_ibfk_1` FOREIGN KEY (`Cod_dir`) REFERENCES `direccion` (`Cod_dir`);

--
-- Filtros para la tabla `estado`
--
ALTER TABLE `estado`
  ADD CONSTRAINT `estado_ibfk_1` FOREIGN KEY (`Cod_dir`) REFERENCES `direccion` (`Cod_dir`);

--
-- Filtros para la tabla `instituto`
--
ALTER TABLE `instituto`
  ADD CONSTRAINT `instituto_ibfk_1` FOREIGN KEY (`Cod_dir`) REFERENCES `direccion` (`Cod_dir`);

--
-- Filtros para la tabla `justificacion`
--
ALTER TABLE `justificacion`
  ADD CONSTRAINT `justificacion_ibfk_1` FOREIGN KEY (`Cod_perm`) REFERENCES `permiso` (`Cod_perm`);

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `municipio_ibfk_1` FOREIGN KEY (`Cod_dir`) REFERENCES `direccion` (`Cod_dir`);

--
-- Filtros para la tabla `pais`
--
ALTER TABLE `pais`
  ADD CONSTRAINT `pais_ibfk_1` FOREIGN KEY (`Cod_dir`) REFERENCES `direccion` (`Cod_dir`);

--
-- Filtros para la tabla `parroquia`
--
ALTER TABLE `parroquia`
  ADD CONSTRAINT `parroquia_ibfk_1` FOREIGN KEY (`Cod_dir`) REFERENCES `direccion` (`Cod_dir`);

--
-- Filtros para la tabla `personal_cumple_inasistencia`
--
ALTER TABLE `personal_cumple_inasistencia`
  ADD CONSTRAINT `personal_cumple_inasistencia_ibfk_2` FOREIGN KEY (`Cod_inasist`) REFERENCES `inasistencia` (`Cod_inasist`);

--
-- Filtros para la tabla `personal_genera_amonestacion`
--
ALTER TABLE `personal_genera_amonestacion`
  ADD CONSTRAINT `personal_genera_amonestacion_ibfk_2` FOREIGN KEY (`Cod_amon`) REFERENCES `amonestaciones` (`Cod_amon`);

--
-- Filtros para la tabla `personal_lleva_horario`
--
ALTER TABLE `personal_lleva_horario`
  ADD CONSTRAINT `personal_lleva_horario_ibfk_2` FOREIGN KEY (`Cod_hor_asist`) REFERENCES `horario_asistencia` (`Cod_hor_asist`);

--
-- Filtros para la tabla `personal_solicita_permiso`
--
ALTER TABLE `personal_solicita_permiso`
  ADD CONSTRAINT `personal_solicita_permiso_ibfk_2` FOREIGN KEY (`Cod_perm`) REFERENCES `permiso` (`Cod_perm`);

--
-- Filtros para la tabla `personal_tiene_formacion_acad`
--
ALTER TABLE `personal_tiene_formacion_acad`
  ADD CONSTRAINT `personal_tiene_formacion_acad_ibfk_2` FOREIGN KEY (`Cod_for_a`) REFERENCES `formacion_academica` (`Cod_for_a`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

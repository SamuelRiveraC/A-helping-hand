-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 03, 2019 at 04:54 PM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistema`
--

-- --------------------------------------------------------

--
-- Table structure for table `amonestaciones`
--

CREATE TABLE `amonestaciones` (
  `Cod_amon` int(100) NOT NULL,
  `Fecha_amon` varchar(20) NOT NULL,
  `Num_amon` varchar(20) NOT NULL,
  `Motivo_amon` varchar(20) NOT NULL,
  `Tipo_amon` varchar(20) NOT NULL,
  `Emisor_amon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `amonestaciones`
--

INSERT INTO `amonestaciones` (`Cod_amon`, `Fecha_amon`, `Num_amon`, `Motivo_amon`, `Tipo_amon`, `Emisor_amon`) VALUES
(2, '2019-11-27', '1', 'Salud\r\n', 'Escrita', ''),
(3, '2019-12-03', '1', 'ME cae mal', 'Escrita', 'Coordinador');

-- --------------------------------------------------------

--
-- Table structure for table `asistencia`
--

CREATE TABLE `asistencia` (
  `asistencia_id` int(11) NOT NULL,
  `Cod_hor_asist` int(100) NOT NULL,
  `total` int(11) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `correo`
--

CREATE TABLE `correo` (
  `ID_correo` int(100) NOT NULL,
  `Tipo_correo` varchar(200) NOT NULL,
  `C_I` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `correo`
--

INSERT INTO `correo` (`ID_correo`, `Tipo_correo`, `C_I`) VALUES
(10, 'marielysaraujof@gmail.com', 27592227);

-- --------------------------------------------------------

--
-- Table structure for table `direccion`
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
-- Dumping data for table `direccion`
--

INSERT INTO `direccion` (`Calle`, `Cod_dir`, `Cod_postal`, `Num_calle`, `Num_casa`, `Sector`, `Urb`, `C_I`) VALUES
('calle', 12, 0, '', '', 'nose', '', 27592227);

-- --------------------------------------------------------

--
-- Table structure for table `formacion_academica`
--

CREATE TABLE `formacion_academica` (
  `Cod_for_a` int(100) NOT NULL,
  `Titulo` varchar(20) DEFAULT NULL,
  `Grado_actual_instruc` varchar(20) DEFAULT NULL,
  `Año_for_a` varchar(20) DEFAULT NULL,
  `credencial_titulo` varchar(80) DEFAULT NULL,
  `Actual_instruct` varchar(20) DEFAULT NULL,
  `titulo_fecha` date NOT NULL DEFAULT '2011-01-01',
  `C_I` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `formacion_academica`
--

INSERT INTO `formacion_academica` (`Cod_for_a`, `Titulo`, `Grado_actual_instruc`, `Año_for_a`, `credencial_titulo`, `Actual_instruct`, `titulo_fecha`, `C_I`) VALUES
(6, 'Bachiller en Ciencia', NULL, '2016', 'EKFGRF4S345S', 'No', '0000-00-00', 27592227);

-- --------------------------------------------------------

--
-- Table structure for table `horario`
--

CREATE TABLE `horario` (
  `horario_id` int(11) NOT NULL,
  `horas_trab` varchar(200) NOT NULL,
  `C_I` int(100) NOT NULL,
  `turno` enum('Mañana','Tarde','Ambos') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `horario`
--

INSERT INTO `horario` (`horario_id`, `horas_trab`, `C_I`, `turno`) VALUES
(9, '8:00 AM - 12:00PM', 27592227, 'Mañana');

-- --------------------------------------------------------

--
-- Table structure for table `inasistencia`
--

CREATE TABLE `inasistencia` (
  `inasistencia_id` int(11) NOT NULL,
  `Cod_inasist` int(100) NOT NULL,
  `total_inasist` int(11) NOT NULL,
  `fecha_inasist` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tipo_inasist` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inasistencia`
--

INSERT INTO `inasistencia` (`inasistencia_id`, `Cod_inasist`, `total_inasist`, `fecha_inasist`, `tipo_inasist`) VALUES
(1, 1, 1, '2019-12-03 04:00:00', 'No Justificado');

-- --------------------------------------------------------

--
-- Table structure for table `instituto`
--

CREATE TABLE `instituto` (
  `Cod_inst` int(100) NOT NULL,
  `Cod_dir` int(100) NOT NULL,
  `Nombre_inst` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instituto`
--

INSERT INTO `instituto` (`Cod_inst`, `Cod_dir`, `Nombre_inst`) VALUES
(12, 12, 'Lya Imber del Coroni');

-- --------------------------------------------------------

--
-- Table structure for table `justificacion`
--

CREATE TABLE `justificacion` (
  `Cod_just` int(100) NOT NULL,
  `Num_just` int(100) NOT NULL,
  `Motivo_just` varchar(20) NOT NULL,
  `Fecha_just` date NOT NULL,
  `Cod_perm` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `justificacion`
--

INSERT INTO `justificacion` (`Cod_just`, `Num_just`, `Motivo_just`, `Fecha_just`, `Cod_perm`) VALUES
(1, 123, 'Salud', '2019-11-27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `permiso`
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
-- Table structure for table `personal`
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
  `exp_lab` int(11) NOT NULL,
  `oficial_exp_lab` varchar(200) NOT NULL,
  `priv_exp_lab` varchar(200) NOT NULL,
  `exihijos` enum('No tiene','Tiene') NOT NULL,
  `gradoCursoHijo` varchar(200) NOT NULL,
  `fecha_ingreso` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal`
--

INSERT INTO `personal` (`P_nombre`, `P_apellido`, `C_I`, `Sexo`, `S_nombre`, `S_apellido`, `Estado_civil`, `Edad`, `Fecha_n`, `Tipo_pers`, `habilidades`, `ocupacion_2`, `exp_lab`, `oficial_exp_lab`, `priv_exp_lab`, `exihijos`, `gradoCursoHijo`, `fecha_ingreso`) VALUES
('Marielys', 'Araujo', 27592227, 'Femenino', 'Jackeline', 'Franco', 'Soltero', 25, '1994-03-09', 'Docente', 'Bilingue', '', 0, '', '', '', '', '2019-12-03 19:34:38');

-- --------------------------------------------------------

--
-- Table structure for table `personal_cumple_inasistencia`
--

CREATE TABLE `personal_cumple_inasistencia` (
  `horario_id` int(11) NOT NULL,
  `Cod_inasist` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_cumple_inasistencia`
--

INSERT INTO `personal_cumple_inasistencia` (`horario_id`, `Cod_inasist`) VALUES
(9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_genera_amonestacion`
--

CREATE TABLE `personal_genera_amonestacion` (
  `C_I` int(100) NOT NULL,
  `Cod_amon` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_genera_amonestacion`
--

INSERT INTO `personal_genera_amonestacion` (`C_I`, `Cod_amon`) VALUES
(27592227, 2),
(27592227, 3);

-- --------------------------------------------------------

--
-- Table structure for table `personal_lleva_horario`
--

CREATE TABLE `personal_lleva_horario` (
  `horario_id` int(11) NOT NULL,
  `Cod_hor_asist` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personal_solicita_permiso`
--

CREATE TABLE `personal_solicita_permiso` (
  `C_I` int(100) NOT NULL,
  `Cod_perm` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personal_tiene_formacion_acad`
--

CREATE TABLE `personal_tiene_formacion_acad` (
  `C_I` int(100) NOT NULL,
  `Cod_for_a` int(100) NOT NULL,
  `Fecha_for` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personal_tiene_justificacion`
--

CREATE TABLE `personal_tiene_justificacion` (
  `C_I` int(100) NOT NULL,
  `Cod_just` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_tiene_justificacion`
--

INSERT INTO `personal_tiene_justificacion` (`C_I`, `Cod_just`) VALUES
(27592227, 1);

-- --------------------------------------------------------

--
-- Table structure for table `telefono`
--

CREATE TABLE `telefono` (
  `Cod_telf` int(100) NOT NULL,
  `Tipo_telf` varchar(20) NOT NULL,
  `Area_telf` varchar(20) NOT NULL,
  `Num_telf` int(100) NOT NULL,
  `C_I` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `telefono`
--

INSERT INTO `telefono` (`Cod_telf`, `Tipo_telf`, `Area_telf`, `Num_telf`, `C_I`) VALUES
(15, 'Celular', '0416', 581646, 27592227),
(16, 'Celular', '0416', 581646, 27592227);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `Nom_usuario` varchar(20) NOT NULL,
  `ID_usuario` int(100) NOT NULL,
  `Tipo_cuenta` varchar(20) NOT NULL,
  `Password` int(20) NOT NULL,
  `Intento` int(20) NOT NULL,
  `Preg_1` varchar(20) NOT NULL,
  `Preg_2` varchar(20) NOT NULL,
  `Preg_3` varchar(20) NOT NULL,
  `Res_1` varchar(20) NOT NULL,
  `Res_2` varchar(20) NOT NULL,
  `Res_3` varchar(20) NOT NULL,
  `C_I` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`Nom_usuario`, `ID_usuario`, `Tipo_cuenta`, `Password`, `Intento`, `Preg_1`, `Preg_2`, `Preg_3`, `Res_1`, `Res_2`, `Res_3`, `C_I`) VALUES
('marielys', 1, 'Administrador', 1234, 1, '45', '454', '45', '45', '45', '45', 27592227);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amonestaciones`
--
ALTER TABLE `amonestaciones`
  ADD PRIMARY KEY (`Cod_amon`);

--
-- Indexes for table `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`asistencia_id`),
  ADD KEY `Cod_hor_asist` (`Cod_hor_asist`);

--
-- Indexes for table `correo`
--
ALTER TABLE `correo`
  ADD PRIMARY KEY (`ID_correo`),
  ADD KEY `C_I` (`C_I`) USING BTREE;

--
-- Indexes for table `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`Cod_dir`),
  ADD KEY `C_I` (`C_I`);

--
-- Indexes for table `formacion_academica`
--
ALTER TABLE `formacion_academica`
  ADD PRIMARY KEY (`Cod_for_a`),
  ADD KEY `C.I` (`C_I`);

--
-- Indexes for table `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`horario_id`),
  ADD KEY `C_I` (`C_I`);

--
-- Indexes for table `inasistencia`
--
ALTER TABLE `inasistencia`
  ADD PRIMARY KEY (`inasistencia_id`),
  ADD KEY `Cod_inasist` (`Cod_inasist`);

--
-- Indexes for table `instituto`
--
ALTER TABLE `instituto`
  ADD PRIMARY KEY (`Cod_inst`),
  ADD KEY `Cod_dir` (`Cod_dir`);

--
-- Indexes for table `justificacion`
--
ALTER TABLE `justificacion`
  ADD PRIMARY KEY (`Cod_just`),
  ADD KEY `Cod_perm` (`Cod_perm`);

--
-- Indexes for table `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`Cod_perm`);

--
-- Indexes for table `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`C_I`);

--
-- Indexes for table `personal_cumple_inasistencia`
--
ALTER TABLE `personal_cumple_inasistencia`
  ADD PRIMARY KEY (`Cod_inasist`),
  ADD KEY `horario_id` (`horario_id`);

--
-- Indexes for table `personal_genera_amonestacion`
--
ALTER TABLE `personal_genera_amonestacion`
  ADD KEY `C.I` (`C_I`,`Cod_amon`),
  ADD KEY `Cod_amon` (`Cod_amon`);

--
-- Indexes for table `personal_lleva_horario`
--
ALTER TABLE `personal_lleva_horario`
  ADD PRIMARY KEY (`Cod_hor_asist`),
  ADD KEY `horario_id` (`horario_id`);

--
-- Indexes for table `personal_solicita_permiso`
--
ALTER TABLE `personal_solicita_permiso`
  ADD KEY `C.I` (`C_I`,`Cod_perm`),
  ADD KEY `Cod_perm` (`Cod_perm`);

--
-- Indexes for table `personal_tiene_formacion_acad`
--
ALTER TABLE `personal_tiene_formacion_acad`
  ADD KEY `C.I` (`C_I`,`Cod_for_a`,`Fecha_for`),
  ADD KEY `Cod_for_a` (`Cod_for_a`);

--
-- Indexes for table `personal_tiene_justificacion`
--
ALTER TABLE `personal_tiene_justificacion`
  ADD KEY `C_I` (`C_I`),
  ADD KEY `Cod_just` (`Cod_just`);

--
-- Indexes for table `telefono`
--
ALTER TABLE `telefono`
  ADD PRIMARY KEY (`Cod_telf`),
  ADD KEY `C.I` (`C_I`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_usuario`),
  ADD UNIQUE KEY `Nom_usuario` (`Nom_usuario`),
  ADD KEY `C_I` (`C_I`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amonestaciones`
--
ALTER TABLE `amonestaciones`
  MODIFY `Cod_amon` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `asistencia_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `correo`
--
ALTER TABLE `correo`
  MODIFY `ID_correo` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `direccion`
--
ALTER TABLE `direccion`
  MODIFY `Cod_dir` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `formacion_academica`
--
ALTER TABLE `formacion_academica`
  MODIFY `Cod_for_a` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `horario`
--
ALTER TABLE `horario`
  MODIFY `horario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `inasistencia`
--
ALTER TABLE `inasistencia`
  MODIFY `inasistencia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `instituto`
--
ALTER TABLE `instituto`
  MODIFY `Cod_inst` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `justificacion`
--
ALTER TABLE `justificacion`
  MODIFY `Cod_just` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `permiso`
--
ALTER TABLE `permiso`
  MODIFY `Cod_perm` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `personal_cumple_inasistencia`
--
ALTER TABLE `personal_cumple_inasistencia`
  MODIFY `Cod_inasist` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `personal_lleva_horario`
--
ALTER TABLE `personal_lleva_horario`
  MODIFY `Cod_hor_asist` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `telefono`
--
ALTER TABLE `telefono`
  MODIFY `Cod_telf` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_usuario` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`Cod_hor_asist`) REFERENCES `personal_lleva_horario` (`Cod_hor_asist`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `correo`
--
ALTER TABLE `correo`
  ADD CONSTRAINT `correo_ibfk_1` FOREIGN KEY (`C_I`) REFERENCES `personal` (`C_I`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `direccion`
--
ALTER TABLE `direccion`
  ADD CONSTRAINT `direccion_ibfk_1` FOREIGN KEY (`C_I`) REFERENCES `personal` (`C_I`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `formacion_academica`
--
ALTER TABLE `formacion_academica`
  ADD CONSTRAINT `formacion_academica_ibfk_1` FOREIGN KEY (`C_I`) REFERENCES `personal` (`C_I`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `horario_ibfk_1` FOREIGN KEY (`C_I`) REFERENCES `personal` (`C_I`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inasistencia`
--
ALTER TABLE `inasistencia`
  ADD CONSTRAINT `inasistencia_ibfk_1` FOREIGN KEY (`Cod_inasist`) REFERENCES `personal_cumple_inasistencia` (`Cod_inasist`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `instituto`
--
ALTER TABLE `instituto`
  ADD CONSTRAINT `instituto_ibfk_1` FOREIGN KEY (`Cod_dir`) REFERENCES `direccion` (`Cod_dir`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `personal_cumple_inasistencia`
--
ALTER TABLE `personal_cumple_inasistencia`
  ADD CONSTRAINT `personal_cumple_inasistencia_ibfk_1` FOREIGN KEY (`horario_id`) REFERENCES `horario` (`horario_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `personal_genera_amonestacion`
--
ALTER TABLE `personal_genera_amonestacion`
  ADD CONSTRAINT `personal_genera_amonestacion_ibfk_1` FOREIGN KEY (`Cod_amon`) REFERENCES `amonestaciones` (`Cod_amon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_genera_amonestacion_ibfk_2` FOREIGN KEY (`C_I`) REFERENCES `personal` (`C_I`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `personal_lleva_horario`
--
ALTER TABLE `personal_lleva_horario`
  ADD CONSTRAINT `personal_lleva_horario_ibfk_1` FOREIGN KEY (`horario_id`) REFERENCES `horario` (`horario_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `personal_solicita_permiso`
--
ALTER TABLE `personal_solicita_permiso`
  ADD CONSTRAINT `personal_solicita_permiso_ibfk_1` FOREIGN KEY (`C_I`) REFERENCES `personal` (`C_I`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_solicita_permiso_ibfk_2` FOREIGN KEY (`Cod_perm`) REFERENCES `permiso` (`Cod_perm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `personal_tiene_formacion_acad`
--
ALTER TABLE `personal_tiene_formacion_acad`
  ADD CONSTRAINT `personal_tiene_formacion_acad_ibfk_1` FOREIGN KEY (`Cod_for_a`) REFERENCES `formacion_academica` (`Cod_for_a`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_tiene_formacion_acad_ibfk_2` FOREIGN KEY (`C_I`) REFERENCES `personal` (`C_I`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `personal_tiene_justificacion`
--
ALTER TABLE `personal_tiene_justificacion`
  ADD CONSTRAINT `personal_tiene_justificacion_ibfk_1` FOREIGN KEY (`Cod_just`) REFERENCES `justificacion` (`Cod_just`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_tiene_justificacion_ibfk_2` FOREIGN KEY (`C_I`) REFERENCES `personal` (`C_I`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `telefono`
--
ALTER TABLE `telefono`
  ADD CONSTRAINT `telefono_ibfk_1` FOREIGN KEY (`C_I`) REFERENCES `personal` (`C_I`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`C_I`) REFERENCES `personal` (`C_I`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

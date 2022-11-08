-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2022 a las 22:11:58
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `spm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrativo`
--

CREATE TABLE `administrativo` (
  `ID_ADMIN` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `NOMBRE` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrativo`
--

INSERT INTO `administrativo` (`ID_ADMIN`, `ID_USUARIO`, `NOMBRE`, `EMAIL`) VALUES
(1, 111, 'Franco Mella Pizarro', 'fmella@utalca.cl'),
(2, 222, 'Christopher Paredes López', 'cparedes16@alumnos.utalca.cl'),
(3, 6169, 'Admin prueba', 'prueba@spm.cl');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `ID_CARRERA` int(10) NOT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `FACULTAD` varchar(100) NOT NULL,
  `CAMPUS` varchar(100) NOT NULL,
  `CREDITOS` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`ID_CARRERA`, `NOMBRE`, `FACULTAD`, `CAMPUS`, `CREDITOS`) VALUES
(419, 'Ingeniería en Informática Empresarial\r\n', 'Facultad de Economía y Negocios\r\n', 'Talca', 300);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convocatoria`
--

CREATE TABLE `convocatoria` (
  `ID_CONVOCATORIA` int(10) NOT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `FECHA_INICIO` date NOT NULL,
  `FECHA_FIN` date NOT NULL,
  `ESTADO` varchar(100) NOT NULL DEFAULT 'Próximamente',
  `MIN_CREDITO_SCT` int(5) NOT NULL,
  `MAX_CREDITO_SCT` int(5) NOT NULL,
  `NOTIFICACION` varchar(2) NOT NULL DEFAULT 'No',
  `RAMOS_REPROBADOS` int(5) NOT NULL,
  `ID_PROGRAMA` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `convocatoria`
--

INSERT INTO `convocatoria` (`ID_CONVOCATORIA`, `NOMBRE`, `FECHA_INICIO`, `FECHA_FIN`, `ESTADO`, `MIN_CREDITO_SCT`, `MAX_CREDITO_SCT`, `NOTIFICACION`, `RAMOS_REPROBADOS`, `ID_PROGRAMA`) VALUES
(4, 'Convocatoria a Beca Juan Abate Molina 1er Semestre', '2222-02-02', '2222-03-02', 'Activa', 1, 99, 'No', 5, 1),
(5, 'Convocatoria a Beca Juan Abate Molina 2do Semestre', '2333-01-01', '2233-02-02', 'Próximamente', 1, 99, 'No', 5, 1),
(6, 'Convocatoria a Beca Juan Abate Molina 2do Semestre', '2333-01-01', '2233-02-02', 'Próximamente', 1, 99, 'No', 5, 1),
(7, 'Convocatoria a Beca Juan Abate Molina 2do Semestre', '2333-01-01', '2233-02-02', 'Activa', 1, 99, 'No', 5, 1),
(29, 'Programa de Doble Titulación', '2022-10-03', '2022-11-04', 'Activa', 1, 99, 'Si', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_universidad`
--

CREATE TABLE `detalle_universidad` (
  `ID_DET_UNIVERSIDAD` int(30) NOT NULL,
  `ID_UNIVERSIDAD` int(15) NOT NULL,
  `ID_PROGRAMA` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_universidad`
--

INSERT INTO `detalle_universidad` (`ID_DET_UNIVERSIDAD`, `ID_UNIVERSIDAD`, `ID_PROGRAMA`) VALUES
(2, 1, 1),
(3, 3, 1),
(4, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `ID_ESTUDIANTE` int(15) NOT NULL,
  `ID_USUARIO` int(15) NOT NULL,
  `RUT` int(15) NOT NULL,
  `NOMBRE` varchar(255) NOT NULL,
  `MATRICULA` int(25) NOT NULL,
  `NACIMIENTO` date NOT NULL,
  `EMAIL_INSTITUCIONAL` varchar(255) NOT NULL,
  `ESTUDIANTE_REGULAR` varchar(2) NOT NULL,
  `CREDITOS_APROBADOS` int(5) NOT NULL,
  `RAMOS_REPROBADOS` int(5) NOT NULL,
  `DEUDOR_DAFE` varchar(2) NOT NULL,
  `DEUDOR_BIBLIOTECA` varchar(2) NOT NULL,
  `ID_CARRERA` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`ID_ESTUDIANTE`, `ID_USUARIO`, `RUT`, `NOMBRE`, `MATRICULA`, `NACIMIENTO`, `EMAIL_INSTITUCIONAL`, `ESTUDIANTE_REGULAR`, `CREDITOS_APROBADOS`, `RAMOS_REPROBADOS`, `DEUDOR_DAFE`, `DEUDOR_BIBLIOTECA`, `ID_CARRERA`) VALUES
(1, 19718582, 197185821, 'Christopher Andrés Paredes López', 2016419076, '1998-01-02', 'cparedes16@alumnos.utalca.cl', 'Si', 210, 1, 'No', 'No', 419),
(2, 19701115, 197011157, 'Ignacio Antonio Orellana Ibarra', 2017419021, '1998-09-02', 'iorellana17@alumnos.utalca.cl', 'Si', 250, 0, 'No', 'No', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idioma`
--

CREATE TABLE `idioma` (
  `ID_IDIOMA` int(10) NOT NULL,
  `IDIOMA` varchar(100) NOT NULL,
  `ESTADO` varchar(25) NOT NULL DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `idioma`
--

INSERT INTO `idioma` (`ID_IDIOMA`, `IDIOMA`, `ESTADO`) VALUES
(1, 'Japonés Medio', 'Activo'),
(2, 'Japonés Básico', 'Activo'),
(3, 'Japonés Avanzado', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movilidad`
--

CREATE TABLE `movilidad` (
  `ID_MOVILIDAD` int(11) NOT NULL,
  `FECHA_INICIO` date NOT NULL,
  `FECHA_FIN` date NOT NULL,
  `SEMESTRE` varchar(25) NOT NULL DEFAULT 'Por definir',
  `ESTADO` varchar(25) NOT NULL DEFAULT 'En preparación',
  `ID_ESTUDIANTE` int(15) NOT NULL,
  `ID_CONVOCATORIA` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `movilidad`
--

INSERT INTO `movilidad` (`ID_MOVILIDAD`, `FECHA_INICIO`, `FECHA_FIN`, `SEMESTRE`, `ESTADO`, `ID_ESTUDIANTE`, `ID_CONVOCATORIA`) VALUES
(1, '0000-00-00', '0000-00-00', 'Por definir', 'En preparación', 1, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones_preg_multiple`
--

CREATE TABLE `opciones_preg_multiple` (
  `ID_OPCIONES_PM` int(100) NOT NULL,
  `OPCION_PMULTIPLE` varchar(255) NOT NULL,
  `ID_PREGUNTA` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `opciones_preg_multiple`
--

INSERT INTO `opciones_preg_multiple` (`ID_OPCIONES_PM`, `OPCION_PMULTIPLE`, `ID_PREGUNTA`) VALUES
(8, 'op1', 2),
(9, 'op2', 2),
(10, 'op3', 2),
(11, 'op4', 2),
(12, 'op1', 3),
(13, 'op2', 3),
(14, 'op3', 3),
(15, 'op4', 3),
(20, 'op1', 4),
(21, 'op2', 4),
(22, 'op3', 4),
(23, 'op4', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `ID_PAIS` int(15) NOT NULL,
  `NOMBRE` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`ID_PAIS`, `NOMBRE`) VALUES
(1, 'Alemania'),
(2, 'Argentina'),
(4, 'Austria'),
(5, 'Bolivia'),
(6, 'Brasil'),
(7, 'Canadá'),
(8, 'China'),
(9, 'Colombia'),
(10, 'Costa Rica'),
(11, 'Corea del Sur'),
(12, 'Cuba'),
(13, 'Dinamarca'),
(14, 'Ecuador'),
(15, 'España'),
(16, 'Estados Unidos'),
(17, 'Finlandia'),
(18, 'Francia'),
(19, 'Guatemala'),
(20, 'Holanda'),
(21, 'Inglaterra'),
(22, 'Israel'),
(23, 'Italia'),
(24, 'India'),
(25, 'Japón'),
(26, 'Marruecos'),
(27, 'México'),
(28, 'Nueva Zelanda'),
(29, 'Palestina'),
(30, 'Paraguay'),
(31, 'Perú'),
(32, 'Portugal'),
(33, 'Puerto Rico'),
(34, 'Rusia'),
(35, 'República Dominicana'),
(36, 'Rumania'),
(37, 'Serbia'),
(38, 'Suiza'),
(39, 'Turquía'),
(40, 'Uruguay'),
(41, 'Uzbekistan'),
(42, 'Gales'),
(43, 'Polonia'),
(9999, 'No existe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulacion`
--

CREATE TABLE `postulacion` (
  `ID_POSTULACION` int(100) NOT NULL,
  `NACIONALIDAD` varchar(100) NOT NULL,
  `N_TELEFONO` int(15) NOT NULL,
  `EMAIL_PERSONAL` varchar(100) NOT NULL,
  `NIVEL_INGLES` varchar(25) NOT NULL,
  `IDIOMA_2` varchar(25) NOT NULL,
  `1RA_OPCION` int(15) NOT NULL,
  `2DA_OPCION` int(15) NOT NULL,
  `3RA_OPCION` int(15) NOT NULL,
  `SELECCION` int(15) NOT NULL DEFAULT 0,
  `ESTADO` varchar(50) NOT NULL DEFAULT 'En espera',
  `ID_CONVOCATORIA` int(15) NOT NULL,
  `ID_MOVILIDAD` int(15) NOT NULL DEFAULT 0,
  `ID_ESTUDIANTE` int(15) NOT NULL,
  `CONFIRMACION` varchar(50) NOT NULL DEFAULT 'Sin aceptar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `postulacion`
--

INSERT INTO `postulacion` (`ID_POSTULACION`, `NACIONALIDAD`, `N_TELEFONO`, `EMAIL_PERSONAL`, `NIVEL_INGLES`, `IDIOMA_2`, `1RA_OPCION`, `2DA_OPCION`, `3RA_OPCION`, `SELECCION`, `ESTADO`, `ID_CONVOCATORIA`, `ID_MOVILIDAD`, `ID_ESTUDIANTE`, `CONFIRMACION`) VALUES
(4, 'Chilena', 989896187, 'chrisparedeslbz@gmail.com', 'Inglés C1', '2', 1, 1, 1, 1, 'Aceptado', 7, 0, 1, 'Confirmado'),
(5, 'Chilena', 989896187, 'chrisparedeslbz@gmail.com', 'Inglés C1', '2', 1, 1, 1, 0, 'En espera', 7, 0, 1, 'Sin aceptar'),
(6, 'Chilena', 989896187, 'chrisparedeslbz@gmail.com', 'Inglés C1', '2', 1, 1, 1, 0, 'En espera', 7, 0, 1, 'Sin aceptar'),
(7, 'Chilena', 989896187, 'chrisparedeslbz@gmail.com', 'Inglés C1', '2', 1, 1, 1, 0, 'En espera', 7, 0, 1, 'Sin aceptar'),
(8, 'chileno', 984352456, 'cparedes@gmail.com', 'Inglés B1', '2', 1, 2, 3, 0, 'En espera', 7, 0, 1, 'Sin aceptar'),
(9, 'Chilena', 985451458, 'cparedeslopes@gmail.com', 'Inglés C1', '2', 1, 2, 3, 0, 'En espera', 7, 0, 1, 'Sin aceptar'),
(10, 'chileno', 984532453, 'cparedes@gmail.com', 'Inglés C1', '2', 1, 2, 3, 0, 'En espera', 7, 0, 1, 'Sin aceptar'),
(11, 'Chilena', 989896187, 'chrisparedeslbz@gmail.com', 'Inglés C1', '2', 1, 1, 1, 0, 'En espera', 7, 0, 1, 'Sin aceptar'),
(12, 'Chilena', 989896187, 'chrisparedeslbz@gmail.com', 'Inglés B2', '2', 1, 1, 1, 0, 'Rechazada', 7, 0, 1, 'Sin aceptar'),
(13, 'Chilena', 947984537, 'fr@gmail', 'Inglés A1', '2', 1, 1, 1, 0, 'En espera', 29, 0, 1, 'Sin aceptar'),
(14, 'Chilena', 947984537, 'fr@gmail.com', 'Inglés A1', '2', 1, 1, 1, 0, 'Aceptado con Beca', 29, 0, 1, 'En espera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `ID_PREGUNTA` int(50) NOT NULL,
  `TIPO` varchar(100) NOT NULL,
  `TITULO` varchar(255) NOT NULL,
  `TIPO_INPUT` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`ID_PREGUNTA`, `TIPO`, `TITULO`, `TIPO_INPUT`) VALUES
(1, 'Simple', 'Nombre social', 'Texto'),
(2, 'Múltiple', 'Radio prueba', 'Radio'),
(3, 'Múltiple', 'Checkbox Prueba', 'Checkbox'),
(4, 'Múltiple', 'Dropdrown Test', 'Dropdown');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta_convocatoria`
--

CREATE TABLE `pregunta_convocatoria` (
  `ID_DETALLE_PREGUNTA` int(100) NOT NULL,
  `ID_PREGUNTA` int(15) NOT NULL,
  `ID_CONVOCATORIA` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pregunta_convocatoria`
--

INSERT INTO `pregunta_convocatoria` (`ID_DETALLE_PREGUNTA`, `ID_PREGUNTA`, `ID_CONVOCATORIA`) VALUES
(1, 1, 7),
(2, 2, 7),
(3, 3, 7),
(4, 4, 7),
(5, 1, 8),
(6, 2, 8),
(7, 3, 8),
(8, 4, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `ID_PROGRAMA` int(15) NOT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `DESCRIPCION` varchar(255) NOT NULL,
  `ESTADO` varchar(50) NOT NULL DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`ID_PROGRAMA`, `NOMBRE`, `DESCRIPCION`, `ESTADO`) VALUES
(1, 'Beca Juan Abate Molina', 'Info Beca Juan Abate Molina', 'En espera'),
(2, 'Beca Juan Abate Molina 2', 'b', 'Activo'),
(3, 'a', 's', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `ID_RESPUESTA` int(25) NOT NULL,
  `RESPUESTA` varchar(255) NOT NULL,
  `ID_PREGUNTA` int(25) NOT NULL,
  `ID_POSTULACION` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `respuesta`
--

INSERT INTO `respuesta` (`ID_RESPUESTA`, `RESPUESTA`, `ID_PREGUNTA`, `ID_POSTULACION`) VALUES
(1, 'Topher', 1, 3),
(2, 'op3', 2, 3),
(3, 'op2, op3', 3, 3),
(4, 'op4', 4, 3),
(5, 'Topher', 1, 4),
(6, 'op3', 2, 4),
(7, 'op2, op3', 3, 4),
(8, 'op4', 4, 4),
(9, 'Topher', 1, 5),
(10, 'op3', 2, 5),
(11, 'op1, op2, op3, op4', 3, 5),
(12, 'op2', 4, 5),
(13, 'Topher', 1, 6),
(14, 'op3', 2, 6),
(15, 'op1, op2, op3, op4', 3, 6),
(16, 'op2', 4, 6),
(17, 'Topher', 1, 7),
(18, 'op3', 2, 7),
(19, 'op1, op2, op3, op4', 3, 7),
(20, 'op2', 4, 7),
(21, 'Christopher', 1, 8),
(22, 'Chris', 1, 9),
(23, 'op2', 2, 9),
(24, 'op2', 3, 9),
(25, 'op4', 4, 9),
(26, 'Chris', 1, 10),
(27, 'op1', 2, 10),
(28, 'op1', 3, 10),
(29, 'op2', 4, 10),
(30, 'Topher', 1, 11),
(31, 'op3', 2, 11),
(32, 'op2', 3, 11),
(33, 'op3', 4, 11),
(34, 'Topher', 1, 12),
(35, 'op2', 2, 12),
(36, 'op2, op3', 3, 12),
(37, 'op4', 4, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universidad`
--

CREATE TABLE `universidad` (
  `ID_UNIVERSIDAD` int(25) NOT NULL,
  `NOMBRE` varchar(255) NOT NULL,
  `ESTADO` varchar(100) NOT NULL DEFAULT 'Activo',
  `ID_PAIS` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `universidad`
--

INSERT INTO `universidad` (`ID_UNIVERSIDAD`, `NOMBRE`, `ESTADO`, `ID_PAIS`) VALUES
(1, 'Rheinische Fiedrich-Wilhelms-Universität Bonn', 'Activo', 1),
(2, 'Technische Universität Dresden', 'Activo', 1),
(3, 'Europa-Universität Flensburg', 'Activo', 1),
(4, 'Georg-August-Universität Göttingen', 'Activo', 1),
(5, 'Rheinisch-Westfälische Technische Hochschule Aachen', 'Activo', 1),
(6, 'Hochschule für Angewandte Wissenschaften Hamburg ', 'Activo', 1),
(7, 'Universität Hohenheim', 'Activo', 1),
(8, 'Universität Konstanz', 'Activo', 1),
(9, 'Handelshochschule Leipzig', 'Activo', 1),
(10, 'Westsächsische Hochschule Zwickau', 'Activo', 1),
(11, 'Universität Siegen', 'Activo', 1),
(12, 'Hochschule Osnabrück', 'Activo', 1),
(13, 'Hochschule Weihenstephan-Triesdorf', 'Activo', 1),
(14, 'Hochschule RheinMain', 'Activo', 1),
(15, 'Universität Bayreuth', 'Activo', 1),
(16, 'Universität Mannheim', 'Activo', 1),
(17, 'Ludwig-Maximilians-Universität München', 'Activo', 1),
(18, 'Hochschule Rhein-Waal', 'Activo', 1),
(19, 'Rheinland Pfalz', 'Activo', 1),
(20, 'Technische Universität Kaiserslautern', 'Activo', 1),
(21, 'Technische Universität München', 'Activo', 1),
(22, 'Hochschule Geisenheim', 'Activo', 1),
(23, 'Hochschule Ruhr West', 'Activo', 1),
(24, 'Pädagogische Hochschule Heidelberg', 'Activo', 1),
(25, 'Escuela Argentina de Negocios ', 'Activo', 2),
(26, 'Universidad Nacional de Cuyo', 'Activo', 2),
(27, 'Universidad Nacional del Litoral', 'Activo', 2),
(28, 'Universidad Nacional del Comahue', 'Activo', 2),
(29, 'Universidad Nacional de San Juan', 'Activo', 2),
(30, 'Universidad Nacional de Córdoba', 'Activo', 2),
(31, 'Universidad Nacional de Tucumán', 'Activo', 2),
(32, 'Pontificia Universidad Católica Argentina - Santa María de los Buenos Aires', 'Activo', 2),
(33, 'Universidad Nacional de Villa María', 'Activo', 2),
(34, 'Universidad Nacional de San Martín', 'Activo', 2),
(35, 'Instituto Universitario de Ciencias de la Salud - Fundación Héctor Alejandro Barceló', 'Activo', 2),
(36, 'Universidad de Buenos Aires', 'Activo', 2),
(39, 'Fachhochschule Kärnten', 'Activo', 4),
(40, 'Donau-Universität Krems ', 'Activo', 4),
(41, 'Universität Innsbruck', 'Activo', 4),
(42, 'Universidad San Francisco Xavier de Chuquisaca', 'Activo', 5),
(43, 'Universidade Federal da Paraíba', 'Activo', 6),
(44, 'Instituto Brasileiro de Mercado de Capitais (IBMEC)', 'Activo', 6),
(45, 'Universidade Estadual de Campinas', 'Activo', 6),
(47, 'Universidade Federal de Itajubá', 'Activo', 6),
(48, 'Universidade Federal do Oeste do Pará', 'Activo', 6),
(49, 'Universidade Federal de Santa Catarina', 'Activo', 6),
(50, 'Universidade de São Paulo', 'Activo', 6),
(51, 'Universidade Federal de Santa Maria', 'Activo', 6),
(52, 'Pontíficia Universidade Católica de Sao Paulo', 'Activo', 6),
(53, 'Universidade do Estado de Santa Catarina', 'Activo', 6),
(54, 'Universidade do Vale do Río Dos Sinos', 'Activo', 6),
(55, 'Universidade de Santa Cruz do Sul', 'Activo', 6),
(56, 'Universidade Federal de Mato Grosso', 'Activo', 6),
(57, 'Universidade Estadual Norte do Paraná', 'Activo', 6),
(58, 'Universidade Federal do Rio Grande du Sul', 'Activo', 6),
(59, 'Universidade Federal de Minas Gerais', 'Activo', 6),
(60, 'Associação Escola da Cidade', 'Activo', 6),
(61, 'Universidade Guarulhos', 'Activo', 6),
(62, 'Faculdades Integradas do Brasil', 'Activo', 6),
(63, 'Universidade do Oeste de Santa Catarina', 'Activo', 6),
(64, 'Serviço Nacional de Aprendizagem Comercial', 'Activo', 6),
(65, 'Universidade Federal Rural da Amazonia', 'Activo', 6),
(66, 'Pontíficia Universidade Católica do Paraná', 'Activo', 6),
(67, 'Universidade Sagrado Coração ', 'Activo', 6),
(68, 'Universidade Federal do Triangulo Mineiro', 'Activo', 6),
(69, 'UNIFAFIFE - Centro Universitário', 'Activo', 6),
(70, 'Facultade Projeção ', 'Activo', 6),
(71, 'Universidade Federal de Ciencias da Saúde de Porto Alegre', 'Activo', 6),
(74, 'University of Ottawa', 'Activo', 7),
(75, 'University of Regina', 'Activo', 7),
(76, 'Yanshan University', 'Activo', 8),
(77, 'Universidad de Antioquía', 'Activo', 9),
(78, 'Universidad de los Andes', 'Activo', 9),
(79, 'Universidad Autónoma de Bucaramanga', 'Activo', 9),
(80, 'Universidad del Rosario', 'Activo', 9),
(81, 'Universidad de Caldas', 'Activo', 9),
(82, 'Universidad Nacional de Colombia', 'Activo', 9),
(83, 'Universidad Autónoma de Occidente ', 'Activo', 9),
(84, 'Universidad CES', 'Activo', 9),
(85, 'Universidad del Norte', 'Activo', 9),
(87, 'Fundación Universitaria Colombo Internacional ', 'Activo', 9),
(88, 'Universidad de Santander', 'Activo', 9),
(89, 'Fundación Universitaria María Cano', 'Activo', 9),
(90, 'Universidad Autónoma de Manizales', 'Activo', 9),
(91, 'Universidad de San Buenaventura de Cartagena', 'Activo', 9),
(92, 'Universidad Tecnológica de Pereira', 'Activo', 9),
(93, 'Universidad de la Costa', 'Activo', 9),
(94, 'Universidad Externado de Colombia', 'Activo', 9),
(95, 'Universidad Santo Tomás', 'Activo', 9),
(96, 'Pontificia Universidad Javeriana', 'Activo', 9),
(97, 'Universitaria Agustiniana', 'Activo', 9),
(98, 'Fundación Universitaria Konrad Lorenz', 'Activo', 9),
(99, 'INCAE Business School', 'Activo', 10),
(100, 'Universidad Nacional de Costa Rica', 'Activo', 10),
(101, 'Instituto Interamericano de Derechos Humanos', 'Activo', 10),
(102, 'Universidad de Costa Rica', 'Activo', 10),
(103, 'Corte Interamericana de Derechos Humanos', 'Activo', 10),
(104, 'Sungkyunkwan University', 'Activo', 11),
(105, 'Incheon National University', 'Activo', 11),
(106, 'Kyonggi University', 'Activo', 11),
(107, 'Dankook University', 'Activo', 11),
(108, 'Universidad de Matanzas Camilo Cienfuegos', 'Activo', 12),
(109, 'Aalborg University', 'Activo', 13),
(110, 'Universidad Católica de Santiago de Guayaquil', 'Activo', 14),
(111, 'Universidad Técnica Estatal de Quevedo', 'Activo', 14),
(112, 'Universidad Técnica del Norte de Ibarra', 'Activo', 14),
(113, 'Universidad Andina Simón Bolívar', 'Activo', 14),
(114, 'Universidad Católica de Cuenca', 'Activo', 14),
(115, 'Universidad Regional Amazónica', 'Activo', 14),
(116, 'Universidad de Alcalá', 'Activo', 15),
(117, 'Universitat de València', 'Activo', 15),
(118, 'Universidad de la Laguna', 'Activo', 15),
(119, 'Universitat Pompeu Fabra', 'Activo', 15),
(120, 'Universidade de Santiago de Compostela', 'Activo', 15),
(121, 'Universidad de Deusto', 'Activo', 15),
(122, 'Universidade de Vigo', 'Activo', 15),
(123, 'Universidad de Málaga', 'Activo', 15),
(124, 'Universidad de Granada', 'Activo', 15),
(125, 'Universidad de Jaén', 'Activo', 15),
(126, 'Universidad Complutense de Madrid', 'Activo', 15),
(127, 'Universidad de la Rioja', 'Activo', 15),
(128, 'Universidad Pública de Navarra', 'Activo', 15),
(129, 'Universitat de Girona', 'Activo', 15),
(130, 'Universidad de Valladolid', 'Activo', 15),
(132, 'Universidade da Coruña', 'Activo', 15),
(133, 'Universidad del País Vasco', 'Activo', 15),
(134, 'Universidad de Las Palmas de Gran Canaria', 'Activo', 15),
(135, 'Escola Politécnica Superior d Edificació de Barcelona', 'Activo', 15),
(136, 'Centro de Investigación Cardiovascular', 'Activo', 15),
(137, 'Universidad de Oviedo', 'Activo', 15),
(138, 'Universitat Politècnica de València', 'Activo', 15),
(139, 'Universidad de Almería', 'Activo', 15),
(140, 'Universidad de Zaragoza', 'Activo', 15),
(141, 'Universidad Politécnica de Madrid', 'Activo', 15),
(142, 'Universitat de Lleida', 'Activo', 15),
(143, 'Universidad Miguel Hernández de Elche', 'Activo', 15),
(144, 'Universidad de Castilla-La Mancha', 'Activo', 15),
(145, 'Universitat Rovira i Virgili', 'Activo', 15),
(146, 'Universidad Nacional de Educación a Distancia', 'Activo', 15),
(147, 'Universidad de Alicante', 'Activo', 15),
(148, 'Universidad Pontificia de Salamanca', 'Activo', 15),
(149, 'Universidad de Murcia', 'Activo', 15),
(150, 'Universidad de Sevilla', 'Activo', 15),
(151, 'Escuela Andaluza de Salud Pública', 'Activo', 15),
(152, 'Institut de Teràpia Regenerativa Tissular', 'Activo', 15),
(153, 'Universitat de Barcelona', 'Activo', 15),
(154, 'University of Connecticut', 'Activo', 16),
(155, 'Cornell University', 'Activo', 16),
(156, 'Southwest Minnesota State University', 'Activo', 16),
(157, 'University of Texas Rio Grande Valley', 'Activo', 16),
(158, 'University of California, Davis', 'Activo', 16),
(159, 'University of Florida', 'Activo', 16),
(160, 'University of Kentucky', 'Activo', 16),
(161, 'The University of Arizona', 'Activo', 16),
(162, 'Western Carolina University', 'Activo', 16),
(163, 'Abo Akademi University', 'Activo', 17),
(164, 'Oulu University of Applied Sciences', 'Activo', 17),
(165, 'Institut National des Sciences Appliquées Centre Val de Loire ', 'Activo', 18),
(166, 'Centro Internacional de Estudios Superiores en Ciencias Agronómicas Montpellier SupAgro', 'Activo', 18),
(167, 'Federation des Ecoles superieures D ingenieurs en Agriculture ', 'Activo', 18),
(168, 'Université d Avignon', 'Activo', 18),
(169, 'Montpellier Business School', 'Activo', 18),
(170, 'Université de Bourgogne', 'Activo', 18),
(171, 'Université de Toulon', 'Activo', 18),
(172, 'Agrocampus Ouest', 'Activo', 18),
(173, 'CFPPA de Beaune', 'Activo', 18),
(174, 'École Normale Supérieure de Cachan', 'Activo', 18),
(175, 'Université de Bordeaux', 'Activo', 18),
(176, 'Institut Universitaire de Technologie de Montpellier', 'Activo', 18),
(177, 'Université d Artois', 'Activo', 18),
(178, 'École de Hautes Etudes en Commerce International', 'Activo', 18),
(179, 'Universidad San Carlos de Guatemala Tricentenaria', 'Activo', 19),
(180, 'Erasmus University Rotterdam', 'Activo', 20),
(181, 'Hogeschool van Amsterdam', 'Activo', 20),
(182, 'Universiteit Twente', 'Activo', 20),
(183, 'Universiteit Wageningen', 'Activo', 20),
(184, 'University of Warwick', 'Activo', 21),
(185, 'University of Nottingham', 'Activo', 21),
(186, 'Bezalez Academy of Arts and Design', 'Activo', 22),
(187, 'Università degli Studi Roma Tre', 'Activo', 23),
(188, 'Università degli Studi di Genova', 'Activo', 23),
(189, 'Università della Calabria', 'Activo', 23),
(190, 'Università Ca Foscari Venezia', 'Activo', 23),
(191, 'SRM University', 'Activo', 24),
(192, 'MS Swaminathan Research Foundation', 'Activo', 24),
(193, 'Yamagata University', 'Activo', 25),
(194, 'ESCA School of Management Casablanca', 'Activo', 26),
(195, 'Universidad Autónoma Chapingo', 'Activo', 27),
(196, 'Universidad Autónoma Metropolitana', 'Activo', 27),
(197, 'Colegio de Postgraduados en Ciencias Agrícolas', 'Activo', 27),
(198, 'Universidad de Colima', 'Activo', 27),
(199, 'Universidad Autónoma de Chihuahua', 'Activo', 27),
(200, 'Universidad de Guadalajara', 'Activo', 27),
(201, 'Tecnológico de Monterrey', 'Activo', 27),
(202, 'Universidad Vasco de Quiroga', 'Activo', 27),
(203, 'Universidad de Monterrey', 'Activo', 27),
(204, 'Universidad Autónoma de Nuevo León', 'Activo', 27),
(205, 'Instituto Mexicano de Tecnología del Agua', 'Activo', 27),
(206, 'Centro de Investigación Científica Yucatán CICY', 'Activo', 27),
(208, 'University of Waikato', 'Activo', 28),
(209, 'University of Auckland', 'Activo', 28),
(210, 'Bethlehem University', 'Activo', 29),
(211, 'Universidad Nacional de Asunción', 'Activo', 30),
(212, 'Universidad Nacional de Villarrica del Espíritu Santo', 'Activo', 30),
(213, 'Ministerio de Salud Pública y Bienestar Social', 'Activo', 30),
(214, 'Universidad Católica Santo Toribio de Mogrovejo', 'Activo', 31),
(215, 'Universidad Privada Norbert Wiener', 'Activo', 31),
(216, 'Universidad Nacional Santiago Antúnez de Mayolo ', 'Activo', 31),
(217, 'Universidad de Lima', 'Activo', 31),
(218, 'Universidade de Aveiro', 'Activo', 32),
(219, 'Instituto Politécnico de Setúbal', 'Activo', 32),
(220, 'Universidade do Algarve', 'Activo', 32),
(221, 'Asociación Interamericana de Contabilidad', 'Activo', 33),
(222, 'Universidad Politécnica de Puerto Rico', 'Activo', 33),
(223, 'Ural Federal University', 'Activo', 34),
(224, 'Instituto Tecnológico de Santo Domingo', 'Activo', 35),
(225, 'Instituto Nacional de Recursos Hidráulicos', 'Activo', 35),
(226, 'Universitatea Alexandru Ioan Cuza ', 'Activo', 36),
(227, 'University of Belgrade', 'Activo', 37),
(228, 'Zürcher Hochschule für Angewandte Wissenschaften', 'Activo', 38),
(229, 'Bezmialem Vakif University', 'Activo', 39),
(230, 'Universidad Católica del Uruguay', 'Activo', 40),
(231, 'Universidad de la República', 'Activo', 40),
(232, 'Pädagogische Hochschule Freiburg', 'Activo', 1),
(233, 'Universidade Estadual Paulista', 'Activo', 6),
(234, 'Universidade Evangélica - Centro Universitário de Anápolis', 'Activo', 6),
(235, 'Korea University - Sejong Campus', 'Activo', 11),
(236, 'Universitat Autònoma de Barcelona', 'Activo', 15),
(237, 'Universidad de Salamanca', 'Activo', 15),
(239, 'Washington State University', 'Activo', 16),
(240, 'Burgundy School of Business', 'Activo', 18),
(241, 'Université de Rennes 1', 'Activo', 18),
(242, 'Université de Lorraine', 'Activo', 18),
(243, 'International Institute for the Unification of Private Law', 'Activo', 23),
(244, 'Università degli Studi di Perugia', 'Activo', 23),
(245, 'Universidad Autónoma de San Luis Potosí', 'Activo', 27),
(246, 'Universidad Politécnica de Guanajuato', 'Activo', 27),
(247, 'Universidad Tecnológica de los Valles Centrales de Oaxaca', 'Activo', 27),
(248, 'Universitè de Genève', 'Activo', 38),
(249, 'Universität Zürich', 'Activo', 38),
(250, 'Fatih Sultan Mehmet Vakif University', 'Activo', 39),
(251, 'Universidade Paulista', 'Activo', 6),
(253, 'Pädagogische Hochschule Zug', 'Activo', 38),
(254, 'Pädagogische Hochschule Kärnten', 'Activo', 4),
(255, 'Universidad EAFIT', 'Activo', 9),
(256, 'Fundación Universitaria Autónoma de las Américas', 'Activo', 9),
(257, 'Universidad de Medellín', 'Activo', 9),
(258, 'University of Nebraska at Kearney', 'Activo', 16),
(259, 'École Nationale Supérieure des Mines d Albi-Carmaux', 'Activo', 18),
(260, 'Universidad Americana', 'Activo', 30),
(261, 'Pädagogische Hochschule Weingarten', 'Activo', 1),
(262, 'Institut Universitaire de Technologie de Nîmes', 'Activo', 18),
(263, 'Hankuk University of Foreign Studies', 'Activo', 11),
(264, 'Universidad Politécnica de Tulancingo', 'Activo', 27),
(265, 'Tashkent State Dental Institute', 'Activo', 41),
(266, 'Universidad Tecnológica Empresarial de Guayaquil', 'Activo', 14),
(267, 'Universidad del Atlántico', 'Activo', 9),
(268, 'Universidad Peruana Cayetano Heredia', 'Activo', 31),
(269, 'Aberystwyth University', 'Activo', 42),
(270, 'Heinrich-Heine-Universität Düsseldorf', 'Activo', 1),
(271, 'Universidad Tecnológica Nacional - Facultad Regional Delta', 'Activo', 2),
(272, 'Instituto Evangélico de Novo Hamburgo', 'Activo', 6),
(273, 'Tampere University of Technology', 'Activo', 17),
(274, 'Universidad Paraguayo Alemana', 'Activo', 30),
(275, 'Peoples Friendship University of Russia', 'Activo', 34),
(276, 'Altinbas University', 'Activo', 39),
(277, 'East Carolina University', 'Activo', 16),
(278, 'Tecnológico de Costa Rica', 'Activo', 10),
(279, 'Universidad Nacional de Loja', 'Activo', 14),
(280, 'Fundació Salut i Envelliment UAB', 'Activo', 15),
(281, 'Universidad del Cono Sur de las Américas', 'Activo', 30),
(282, 'Fachhochschule Münster', 'Activo', 1),
(283, 'Universidade do Minho', 'Activo', 32),
(284, 'Instituto Politécnico de Lisboa', 'Activo', 32),
(285, 'Instituto Internacional de Derecho y Sociedad', 'Activo', 31),
(286, 'Adtalem Global Education', 'Activo', 6),
(287, 'École normale supérieure Paris-Saclay', 'Activo', 9999),
(288, 'Institut de Recerca de l Hospital de la Santa Creu i Sant Pau', 'Activo', 15),
(289, 'Goethe-Universität Frankfurt', 'Activo', 1),
(290, 'Institut National des Sciences Appliquées de Toulouse                                                                                                                                                                                                  ', 'Activo', 18),
(291, 'Instituto Politécnico de Portalegre', 'Activo', 32),
(292, 'Instituto Tecnológico de Costa Rica', 'Activo', 10),
(293, 'Kanagawa University', 'Activo', 25),
(294, 'Leibniz-Universität Hannover', 'Activo', 1),
(295, 'Pontificia Universidad Católica do Rio Grande Do Sul', 'Activo', 6),
(296, 'PRÓ- SAÚDE Associação Beneficente de Assistência Social e Hospitalar', 'Activo', 6),
(297, 'Universidad Antonio Nariño', 'Activo', 9),
(298, 'Universidad Autónoma de Guadalajara', 'Activo', 27),
(299, 'Universidad Autónoma Metropolitana Unidad Xochimilco', 'Activo', 27),
(300, 'Universidad de Cantabria ', 'Activo', 15),
(301, 'Universidade de Evora', 'Activo', 32),
(302, 'Universidad de Sonora', 'Activo', 27),
(303, 'University of North Texas', 'Activo', 16),
(304, 'Universidad Iberoamericana del Paraguay', 'Activo', 30),
(305, 'Universidad Industrial de Santander', 'Activo', 9),
(306, 'Universidad Nacional del Rosario', 'Activo', 27),
(307, 'Universidad Pontificia Bolivariana', 'Activo', 9),
(308, 'Universidad Rey Juan Carlos de España', 'Activo', 15),
(309, 'Universität Bremen', 'Activo', 1),
(310, 'Université Paris-Diderot', 'Activo', 18),
(311, 'Rijksuniversiteit Groningen', 'Activo', 20),
(312, 'University of Lakehead', 'Activo', 7),
(313, 'University of Sussex', 'Activo', 21),
(314, 'Warsaw School of Economics', 'Activo', 43),
(315, 'Westfälische Wilhelms-Universität Münster', 'Activo', 1),
(316, 'Institut Agro Rennes-Angers', 'Activo', 18),
(317, 'Institut Universitaire de Technologie Saint-Étienne', 'Activo', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_USUARIO` int(15) NOT NULL,
  `RELACION` varchar(25) NOT NULL,
  `PASS` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_USUARIO`, `RELACION`, `PASS`) VALUES
(111, 'Administrativo', 'admin'),
(222, 'Administrativo', 'admin'),
(6169, 'Administrativo', '6169'),
(19718582, 'Estudiante', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrativo`
--
ALTER TABLE `administrativo`
  ADD PRIMARY KEY (`ID_ADMIN`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`ID_CARRERA`);

--
-- Indices de la tabla `convocatoria`
--
ALTER TABLE `convocatoria`
  ADD PRIMARY KEY (`ID_CONVOCATORIA`);

--
-- Indices de la tabla `detalle_universidad`
--
ALTER TABLE `detalle_universidad`
  ADD PRIMARY KEY (`ID_DET_UNIVERSIDAD`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`ID_ESTUDIANTE`);

--
-- Indices de la tabla `idioma`
--
ALTER TABLE `idioma`
  ADD PRIMARY KEY (`ID_IDIOMA`);

--
-- Indices de la tabla `movilidad`
--
ALTER TABLE `movilidad`
  ADD PRIMARY KEY (`ID_MOVILIDAD`),
  ADD KEY `ID_ESTUDIANTE` (`ID_ESTUDIANTE`),
  ADD KEY `ID_CONVOCATORIA` (`ID_CONVOCATORIA`);

--
-- Indices de la tabla `opciones_preg_multiple`
--
ALTER TABLE `opciones_preg_multiple`
  ADD PRIMARY KEY (`ID_OPCIONES_PM`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`ID_PAIS`);

--
-- Indices de la tabla `postulacion`
--
ALTER TABLE `postulacion`
  ADD PRIMARY KEY (`ID_POSTULACION`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`ID_PREGUNTA`);

--
-- Indices de la tabla `pregunta_convocatoria`
--
ALTER TABLE `pregunta_convocatoria`
  ADD PRIMARY KEY (`ID_DETALLE_PREGUNTA`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`ID_PROGRAMA`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`ID_RESPUESTA`);

--
-- Indices de la tabla `universidad`
--
ALTER TABLE `universidad`
  ADD PRIMARY KEY (`ID_UNIVERSIDAD`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_USUARIO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrativo`
--
ALTER TABLE `administrativo`
  MODIFY `ID_ADMIN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `ID_CARRERA` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=420;

--
-- AUTO_INCREMENT de la tabla `convocatoria`
--
ALTER TABLE `convocatoria`
  MODIFY `ID_CONVOCATORIA` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `detalle_universidad`
--
ALTER TABLE `detalle_universidad`
  MODIFY `ID_DET_UNIVERSIDAD` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `ID_ESTUDIANTE` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `idioma`
--
ALTER TABLE `idioma`
  MODIFY `ID_IDIOMA` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `movilidad`
--
ALTER TABLE `movilidad`
  MODIFY `ID_MOVILIDAD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `opciones_preg_multiple`
--
ALTER TABLE `opciones_preg_multiple`
  MODIFY `ID_OPCIONES_PM` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `ID_PAIS` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000;

--
-- AUTO_INCREMENT de la tabla `postulacion`
--
ALTER TABLE `postulacion`
  MODIFY `ID_POSTULACION` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `ID_PREGUNTA` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pregunta_convocatoria`
--
ALTER TABLE `pregunta_convocatoria`
  MODIFY `ID_DETALLE_PREGUNTA` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `programa`
--
ALTER TABLE `programa`
  MODIFY `ID_PROGRAMA` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `ID_RESPUESTA` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `universidad`
--
ALTER TABLE `universidad`
  MODIFY `ID_UNIVERSIDAD` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=318;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

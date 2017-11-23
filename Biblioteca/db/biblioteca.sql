-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2017 a las 15:15:05
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `Id_Categoria` varchar(20) NOT NULL,
  `Nombre_Categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`Id_Categoria`, `Nombre_Categoria`) VALUES
('1', '000 - Generalidades'),
('2', '010 - Bibliografia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `Id_Libro` varchar(20) NOT NULL,
  `Titulo_Libro` varchar(100) NOT NULL,
  `Nombre_Categoria_Libro` varchar(100) NOT NULL,
  `Autor_Libro` varchar(70) NOT NULL,
  `Editorial_Libro` varchar(40) NOT NULL,
  `ISBN_Libro` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `Id_Prestamo` varchar(20) NOT NULL,
  `Nombre_Libro_Prestamo` varchar(100) NOT NULL,
  `Codigo_Usuario_Prestamo` varchar(20) NOT NULL,
  `Fecha_Prestamo` date NOT NULL,
  `Fecha_Devolucion` date NOT NULL,
  `Estado_Prestamo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Codigo` varchar(15) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Apellidos` varchar(40) NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `Direccion` varchar(40) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Contrasena` varchar(15) NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Tipo_Usuario` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Codigo`, `Nombre`, `Apellidos`, `Telefono`, `Direccion`, `Email`, `Contrasena`, `Fecha_Nacimiento`, `Tipo_Usuario`) VALUES
('1093224457', 'Angelica', 'Franco Arias', '3014184798', 'Villa de Leyva', 'angelicafranco@utp.edu.co', 'keka', '1994-10-18', '1'),
('1113782360', 'Leonardo', 'Bohorquez Santiago', '3104113377', 'Villa de Leyva', 'lbohorquez@utp.edu.co', 'santi', '1988-11-07', '0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`Id_Categoria`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`Id_Libro`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`Id_Prestamo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

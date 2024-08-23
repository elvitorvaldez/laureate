-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 23-08-2024 a las 01:22:44
-- Versión del servidor: 8.0.39-0ubuntu0.24.04.1
-- Versión de PHP: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Laureate`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `EdoCivil`
--

CREATE TABLE `EdoCivil` (
  `IdEdoCivil` int NOT NULL,
  `EdoCivil` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `EdoCivil`
--

INSERT INTO `EdoCivil` (`IdEdoCivil`, `EdoCivil`) VALUES
(1, 'Soltero'),
(2, 'Casado'),
(3, 'Viudo'),
(4, 'Divorciado'),
(5, 'Separado'),
(6, 'Unión Libre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Especialidades`
--

CREATE TABLE `Especialidades` (
  `IdEspecialidad` int NOT NULL,
  `IdNivel` int NOT NULL,
  `Especialidad` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Especialidades`
--

INSERT INTO `Especialidades` (`IdEspecialidad`, `IdNivel`, `Especialidad`) VALUES
(1, 2, 'Lic. en Derecho'),
(2, 2, 'Lic. en Finanzas'),
(3, 3, 'Mtría. Admón de Negocios'),
(4, 3, 'Mtría. Dirección de Proyectos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Generos`
--

CREATE TABLE `Generos` (
  `IdGenero` int NOT NULL,
  `Genero` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Generos`
--

INSERT INTO `Generos` (`IdGenero`, `Genero`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Niveles`
--

CREATE TABLE `Niveles` (
  `IdNivel` int NOT NULL,
  `Nivel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Niveles`
--

INSERT INTO `Niveles` (`IdNivel`, `Nivel`) VALUES
(1, 'Preparatoria'),
(2, 'Licenciatura'),
(3, 'Postgrado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Registro`
--

CREATE TABLE `Registro` (
  `IdRegistro` int NOT NULL,
  `Nombre` text NOT NULL,
  `APaterno` text NOT NULL,
  `AMaterno` text NOT NULL,
  `IdGenero` int NOT NULL,
  `Edad` int NOT NULL,
  `IdEdoCivil` int NOT NULL,
  `idNivel` int NOT NULL,
  `IdEspecialidad` int NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Registro`
--

INSERT INTO `Registro` (`IdRegistro`, `Nombre`, `APaterno`, `AMaterno`, `IdGenero`, `Edad`, `IdEdoCivil`, `idNivel`, `IdEspecialidad`, `Email`, `Password`) VALUES
(1, 'Vica', 'Paleta', 'Paletón', 1, 20, 1, 1, 0, 'vicapaleta@gmail.com', '3de34bfb56cc607fd38f7d301efeb247');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `EdoCivil`
--
ALTER TABLE `EdoCivil`
  ADD PRIMARY KEY (`IdEdoCivil`);

--
-- Indices de la tabla `Especialidades`
--
ALTER TABLE `Especialidades`
  ADD PRIMARY KEY (`IdEspecialidad`);

--
-- Indices de la tabla `Generos`
--
ALTER TABLE `Generos`
  ADD PRIMARY KEY (`IdGenero`);

--
-- Indices de la tabla `Niveles`
--
ALTER TABLE `Niveles`
  ADD PRIMARY KEY (`IdNivel`);

--
-- Indices de la tabla `Registro`
--
ALTER TABLE `Registro`
  ADD PRIMARY KEY (`IdRegistro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `EdoCivil`
--
ALTER TABLE `EdoCivil`
  MODIFY `IdEdoCivil` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `Especialidades`
--
ALTER TABLE `Especialidades`
  MODIFY `IdEspecialidad` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `Generos`
--
ALTER TABLE `Generos`
  MODIFY `IdGenero` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `Niveles`
--
ALTER TABLE `Niveles`
  MODIFY `IdNivel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `Registro`
--
ALTER TABLE `Registro`
  MODIFY `IdRegistro` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

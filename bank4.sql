-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 26-09-2024 a las 17:20:01
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bank4`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `account`
--

CREATE TABLE `account` (
  `IDUSER` int(11) NOT NULL,
  `MONEY` decimal(10,2) NOT NULL,
  `INCOMES` decimal(10,2) NOT NULL,
  `EXPENSES` decimal(10,2) NOT NULL,
  `DATES` date NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `account`
--

INSERT INTO `account` (`IDUSER`, `MONEY`, `INCOMES`, `EXPENSES`, `DATES`, `ID`) VALUES
(2, 0.00, 500.00, 250.00, '2024-09-23', 118),
(2, 250.00, 500.00, 250.00, '2024-09-23', 119),
(2, 500.00, 500.00, 250.00, '2024-09-23', 120),
(2, 750.00, 500.00, 250.00, '2024-09-23', 121),
(2, 1000.00, 500.00, 250.00, '2024-09-23', 122),
(2, 1250.00, 500.00, 250.00, '2024-09-23', 123),
(2, 1500.00, 500.00, 250.00, '2024-09-23', 124),
(2, 1750.00, 500.00, 250.00, '2024-09-23', 125),
(6, 0.00, 6000.00, 1500.00, '2024-09-23', 126),
(6, 4500.00, 750.00, 220.00, '2024-09-23', 127),
(6, 5030.00, 750.00, 220.00, '2024-09-23', 128),
(9, 0.00, 500.00, 2000.00, '2024-09-23', 129),
(9, -1500.00, 4500.00, 1850.00, '2024-09-23', 130),
(3, 0.00, 5020.00, 1270.00, '2024-09-23', 131),
(3, 3750.00, 6000.00, 4440.00, '2024-09-23', 132),
(3, 5310.00, 6000.00, 4440.00, '2024-09-23', 133),
(3, 6870.00, 2000.00, 100.00, '2024-09-23', 134),
(5, 0.00, 200.00, 400.00, '2024-09-24', 141),
(5, -200.00, 50.00, 470.00, '2024-09-24', 142),
(6, 5560.00, 0.00, 200.00, '2024-09-24', 143),
(5, -620.00, 200.00, 0.00, '2024-09-24', 144),
(11, 0.00, 600.00, 25.00, '2024-09-24', 145),
(11, 575.00, 250.00, 75.00, '2024-09-24', 146),
(11, 750.00, 0.00, 100.00, '2024-09-24', 147),
(6, 5360.00, 100.00, 0.00, '2024-09-24', 148),
(11, 650.00, 220.00, 650.00, '2024-09-24', 149),
(3, 8770.00, 500.00, 3000.00, '2024-09-25', 155),
(6, 5460.00, 550.00, 1500.00, '2024-09-25', 161),
(6, 4510.00, 450.00, 120.00, '2024-09-25', 163),
(6, 4840.00, 2000.00, 600.00, '2024-09-26', 267),
(6, 6240.00, 0.00, 1500.00, '2024-09-26', 268),
(9, 1150.00, 1500.00, 0.00, '2024-09-26', 269),
(6, 4740.00, 500.00, 250.00, '2024-09-26', 270),
(15, 0.00, 500.00, 2000.00, '2024-09-26', 271),
(15, -1500.00, 50.00, 600.00, '2024-09-26', 272),
(15, -2050.00, 500.00, 350.00, '2024-09-26', 273),
(15, -1900.00, 750.00, 1300.00, '2024-09-26', 274),
(15, -2450.00, 700.00, 1200.00, '2024-09-26', 275),
(15, -2950.00, 700.00, 1200.00, '2024-09-26', 276),
(2, 2000.00, 0.00, 200.00, '2024-09-26', 277),
(11, 220.00, 200.00, 0.00, '2024-09-26', 278),
(9, 2650.00, 300.00, 3000.00, '2024-09-26', 281);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`ID`) VALUES
(5),
(6),
(4),
(4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sharedcount`
--

CREATE TABLE `sharedcount` (
  `IDUSER` int(11) NOT NULL,
  `IDShared` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sharedcount`
--

INSERT INTO `sharedcount` (`IDUSER`, `IDShared`) VALUES
(9, 6),
(9, 3),
(3, 6),
(3, 9),
(3, 4),
(3, 5),
(5, 6),
(6, 4),
(6, 7),
(9, 5),
(7, 3),
(7, 2),
(2, 6),
(2, 7),
(6, 5),
(6, 2),
(11, 4),
(6, 11),
(11, 2),
(7, 6),
(15, 6),
(15, 3),
(15, 9),
(15, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `LASTNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`ID`, `USERNAME`, `NAME`, `LASTNAME`, `PASSWORD`, `EMAIL`) VALUES
(2, 'user2', 'Jane', 'Smith', 'e10adc3949ba59abbe56e057f20f883e', 'jane.smith@example.com'),
(3, 'user3', 'Carlos', 'Martinez', 'e10adc3949ba59abbe56e057f20f883e', 'carlos.martinez@example.com'),
(4, 'user4', 'Maria', 'Lopez', 'e10adc3949ba59abbe56e057f20f883e', 'maria.lopez@example.com'),
(5, 'doncic', 'Lucas', 'Garcia', 'e10adc3949ba59abbe56e057f20f883e', 'lucas.garcia@example.com'),
(6, 'gaizka', 'Gaizka', 'Mendez', 'e10adc3949ba59abbe56e057f20f883e', 'gaizka.mendez@example.com'),
(7, 'julen', 'Julen', 'Urlezaga', 'e10adc3949ba59abbe56e057f20f883e', 'julen.urlezaga@example.com'),
(8, 'Juan', 'juan', 'Cuesta', 'e10adc3949ba59abbe56e057f20f883e', 'juan.Cuesta@example.com'),
(9, 'pepe', 'pepe', 'gotera', 'e10adc3949ba59abbe56e057f20f883e', 'pepe@example.com'),
(11, 'murillo', 'Asier', 'Murillo', 'e10adc3949ba59abbe56e057f20f883e', 'murillo@example.com'),
(15, 'pescadero', 'Antonio', 'Recio', 'e10adc3949ba59abbe56e057f20f883e', 'pescadero@example.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `account`
--
ALTER TABLE `account`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

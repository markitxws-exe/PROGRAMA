-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2024 a las 06:38:13
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
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torneos`
--

CREATE TABLE `torneos` (
  `id` int(11) NOT NULL,
  `nombreTorneo` varchar(100) NOT NULL,
  `organizador` varchar(100) NOT NULL,
  `patrocinadores` text DEFAULT NULL,
  `sede` varchar(100) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `premio1` varchar(100) DEFAULT NULL,
  `premio2` varchar(100) DEFAULT NULL,
  `premio3` varchar(100) DEFAULT NULL,
  `otroPremio` text DEFAULT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `torneos`
--

INSERT INTO `torneos` (`id`, `nombreTorneo`, `organizador`, `patrocinadores`, `sede`, `categoria`, `premio1`, `premio2`, `premio3`, `otroPremio`, `usuario`, `contrasena`, `created_at`) VALUES
(1, 'mundial brazil', 'xxxxxxxxx', 'xxxxxxxx', 'xxxxxxxxx', 'Veteranos', '10000', '1000', '1000', '10', 'alexander', '$2y$10$MIOfiMLdFPFOW1R5G43tj.jUFzpKXFJashRVakBxXIXjRSUvBzJyO', '2024-12-19 22:53:55'),
(7, 'SDFSDF', 'SDFFD', 'asdad', 'asd', 'asd', 'asd', 'asd', 'aasd', 'asd', 'asd', '$2y$10$.ZtzT9sOCVjCf1D9DBTMOuCRYn5LeNb.DERZfvlYv3fOYwzG1Ps.G', '2024-12-20 00:02:27'),
(10, 'ghj', 'ghj', 'ghj', 'ghj', 'ghj', 'ghj', 'ghj', 'ghj', 'ghj', 'ghj', '$2y$10$D/45n82KrocBwOzRIcmwhOjFS01cTze4wOEOP5mWC8u.Dnj5dk5Bq', '2024-12-20 00:26:48'),
(11, '', '', '', '', '', '', '', '', '', '', '$2y$10$T6JcY90qvTkypNbBX/ALouK/P3u9JCw14crEcd1p98Sm9KIFs1H6O', '2024-12-20 00:40:22');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `torneos`
--
ALTER TABLE `torneos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `torneos`
--
ALTER TABLE `torneos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-12-2020 a las 01:28:36
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sesiones_ilusweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `imagenID` int(6) NOT NULL,
  `usuario_nb` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `nombreImg` varchar(32) COLLATE utf8_spanish2_ci NOT NULL,
  `rutaImg` varchar(64) COLLATE utf8_spanish2_ci NOT NULL,
  `img_freq` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`imagenID`, `usuario_nb`, `nombreImg`, `rutaImg`, `img_freq`) VALUES
(1, 'guiyeta', 'vaca.jpg', 'img/guiyeta/vaca.jpg', '2020-12-13 21:43:41'),
(2, 'tres', 'goyes.png', 'img/tres/goyes.png', '2020-12-13 22:02:42'),
(3, 'tres', 'personajes.jpg', 'img/tres/personajes.jpg', '2020-12-13 22:27:08'),
(4, 'tres', 'graffiti.png', 'img/tres/graffiti.png', '2020-12-13 22:30:17'),
(5, 'jose', 'libro.jpg', 'img/jose/libro.jpg', '2020-12-13 23:23:58'),
(6, 'jose', 'cerebro-corazon.jpg', 'img/jose/cerebro-corazon.jpg', '2020-12-13 23:29:48'),
(7, 'jose', 'luna.jpg', 'img/jose/luna.jpg', '2020-12-13 23:30:19'),
(8, 'maria', 'mono-astronauta.jpg', 'img/maria/mono-astronauta.jpg', '2020-12-13 23:33:30'),
(9, 'maria', 'arbol.jpg', 'img/maria/arbol.jpg', '2020-12-14 00:09:25'),
(10, 'maria', 'casa.jpg', 'img/maria/casa.jpg', '2020-12-14 00:11:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(4) NOT NULL,
  `usuario_nombre` varchar(15) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '',
  `usuario_clave` varchar(32) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '',
  `usuario_email` varchar(50) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '',
  `usuario_freg` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `usuario_nombre`, `usuario_clave`, `usuario_email`, `usuario_freg`) VALUES
(1, 'guiyeta', 'f52d8f03c9f4202ee8f5d032611e8648', 'guille@mail.com', '2020-11-08 17:16:49'),
(2, 'jose', 'f717c413cebc560ff181002dbc323431', 'jose@mail.com', '2020-11-08 17:17:25'),
(3, 'maria', '5621455638ff13eaf716eb1b4b54f428', 'maria@mail.com', '2020-11-09 10:53:04'),
(4, 'pedro', 'd64918b527e8890afe359dc2e238b936', 'pedro@mail.com', '2020-11-09 15:38:06'),
(5, 'tres', '2f75f4cd5d857df5c644aee133cd4a61', 'tres@mail.com', '2020-12-01 12:02:53'),
(6, 'pepe', '5e783f68bbe280088d77a82cbd235a0d', 'pepe@mail.com', '2020-12-13 14:02:34'),
(7, 'cuatro', 'f6a85fc406ec4479323056b7d3ac3cd2', 'cuatro@mail.com', '2020-12-13 17:07:17'),
(8, 'casa', 'a3e80ab55b9ba5dc0a1c5930616399a5', 'casa@mail.com', '2020-12-13 17:10:48'),
(9, 'cosa', 'e450d6435da4fa4833c45d375eb5c5f0', 'cosa@mail.com', '2020-12-13 17:12:19');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`imagenID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `imagenID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-05-2026 a las 19:31:16
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
-- Base de datos: `catalogo_bbva`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`) VALUES
(1, 'Educacion'),
(2, 'Psicologia'),
(3, 'Motivacion'),
(4, 'Neurociencia'),
(5, 'Bienestar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(2, 'webadmin', '$2y$10$6nlQn60QwqBTtkx9opyz6udMaIZt4irnN.Y9odWEOsMCmgqqef5Ee');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `video`
--

CREATE TABLE `video` (
  `id_video` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `duracion` int(11) NOT NULL,
  `fecha_publicacion` date NOT NULL,
  `URL` varchar(100) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `video`
--

INSERT INTO `video` (`id_video`, `titulo`, `autor`, `descripcion`, `duracion`, `fecha_publicacion`, `URL`, `id_categoria`) VALUES
(1, 'Aprender a aprender', 'Mario Alonso Puig', 'Claves para mejorar el aprendizaje', 28, '2024-01-10', 'https://youtube.com/watch?v=bbva001', 1),
(2, 'La importancia de la inteligencia emocional', 'Daniel Goleman', 'Gestionar emociones en la vida diaria', 32, '2024-01-15', 'https://youtube.com/watch?v=bbva002', 2),
(3, 'Como motivarte cada dia', 'Victor Kuppers', 'Ideas para mantener la motivacion', 24, '2024-01-20', 'https://youtube.com/watch?v=bbva003', 3),
(4, 'El cerebro y la memoria', 'Facundo Manes', 'Como funciona la memoria humana', 30, '2024-01-25', 'https://youtube.com/watch?v=bbva004', 4),
(5, 'Habitos para una vida mejor', 'Marian Rojas Estape', 'Rutinas saludables para bienestar', 27, '2024-02-01', 'https://youtube.com/watch?v=bbva005', 5),
(6, 'Educar con creatividad', 'Ken Robinson', 'La creatividad en la educacion', 35, '2024-02-05', 'https://youtube.com/watch?v=bbva006', 1),
(7, 'Ansiedad y estres', 'Elsa Punset', 'Herramientas para reducir ansiedad', 26, '2024-02-10', 'https://youtube.com/watch?v=bbva007', 2),
(8, 'El poder de la actitud', 'Victor Kuppers', 'Como la actitud cambia resultados', 22, '2024-02-14', 'https://youtube.com/watch?v=bbva008', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`),
  ADD KEY `Video_Categoria` (`id_categoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `video`
--
ALTER TABLE `video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `Video_Categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

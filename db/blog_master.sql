-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-02-2021 a las 09:35:43
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blog_master`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` text COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'PHP'),
(2, 'Java'),
(3, 'Phyton'),
(4, 'Javascript'),
(5, 'C#');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` text COLLATE latin1_general_ci NOT NULL,
  `description` longtext COLLATE latin1_general_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `user_id`, `category_id`, `date`) VALUES
(2, 'yes or no?', 'PHP is awesome code language!!', 3, 1, '2021-02-10'),
(3, 'is java competitive at now?', 'Java requires more lines of code: Writing codes in Java uses a lot of syntaxes. This makes Java a great tool by providing the developers with granular control over their code.\r\n\r\nBut, competitive programming demands speed, so, it’s recommended to pick Java only if you have some prior knowledge of coding in Java. ', 2, 2, '2021-02-24'),
(4, 'are you junior Phyton developer?', 'Before getting started, you may want to find out which IDEs and text editors are tailored to make Python editing easy, browse the list of introductory books, or look at code samples that you might find helpful.\r\n\r\nThere is a list of tutorials suitable for experienced programmers on the BeginnersGuide/Tutorials page. There is also a list of resources in other languages which might be useful if English is not your first language.\r\n\r\nThe online documentation is your first port of call for definitive information. There is a fairly brief tutorial that gives you basic information about the language and gets you started. You can follow this by looking at the library reference for a full description of Python\'s many libraries and the language reference for a complete (though somewhat dry) explanation of Python\'s syntax. If you are looking for common Python recipes and patterns, you can browse the ActiveState Python Cookbook', 3, 3, '2021-02-05'),
(5, 'use strict??', 'What is the good things about \'\'use strict\'?', 2, 4, '2021-02-22'),
(6, 'How to resolve php conflict', 'i attempted to upgrade from php 5.4 to 5.6 on a DigitalOcean Centos7. Now it seems I have an orphan from the old php somewhere. I\'m trying to get php-fann running, but it won\'t install because of this conflict. Clearly I didn\'t upgrade php properly, but now I don\'t know how to fix it. Thanks in advance.\r\n\r\nRan this\r\n\r\nyum install php-pecl-fann\r\n\r\nGot this\r\n\r\nError: php56w-common conflicts with php-common-5.4.16-42.el7.x86_64\r\n\r\nRan this\r\n\r\nrpm -ql php-common-5.4.16-42.el7.x86_64\r\n\r\nGot this\r\n\r\npackage php-common-5.4.16-42.el7.x86_64 is not installed\r\n\r\nRan this\r\n\r\nyum info php\r\n', 2, 1, '2021-02-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text COLLATE latin1_general_ci DEFAULT NULL,
  `last_name` text COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `password` varchar(500) COLLATE latin1_general_ci DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `password`, `date`) VALUES
(2, 'David', 'Barbeira otero', 'davidBarOtero@gmail.com', '$2y$04$LgceIV07aM9AzjzlS44lfOZ5WyR5MO2G.0c95qX4pPkKEkv0YUrJ.', '2021-02-18'),
(3, 'Juan ', 'Diaz Corral', 'juaniTo@gmail.com', '$2y$04$RBU239yRXw2hwYUN9GBYIedFyHdwqIODU3O9IEUzKCTEx4.ZztZo2', '2021-02-18'),
(7, 'antonio', 'rodriguez fuentes', 'antonio@gmail.com', '$2y$04$MYj72lbvS8PBDWdA7Q.BSO2RmoWq9dOQ2eWqck51nbB8UxKdj524q', '2021-02-21'),
(17, 'a', 'a', 'a@gmail.com', '$2y$04$PRCK2aATqHQhZDWz/hL98egflPUWt2ih8ZjpsQ4JeT28aS2yXC7tW', '2021-02-21');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_post` (`user_id`),
  ADD KEY `category_post` (`category_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `category_post` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_post` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

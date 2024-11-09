-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-10-2024 a las 03:50:50
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
-- Base de datos: `blocdenotas`
--
CREATE DATABASE IF NOT EXISTS `blocdenotas` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `blocdenotas`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notebooks`
--

CREATE TABLE `notebooks` (
  `idNotebook` int(11) NOT NULL,
  `idUser` int(11) DEFAULT NULL,
  `noteDate` date DEFAULT NULL,
  `noteCount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `notebooks`:
--   `idUser`
--       `users` -> `idUser`
--

--
-- Volcado de datos para la tabla `notebooks`
--

INSERT INTO `notebooks` (`idNotebook`, `idUser`, `noteDate`, `noteCount`) VALUES
(1, 1, '2024-10-02', 2),
(2, 2, '2024-10-01', 2),
(3, 2, '2024-10-03', 2),
(4, 3, '2024-10-02', 1),
(5, 3, '2024-10-03', 1),
(6, 3, '2024-10-04', 1),
(7, 2, '2024-10-02', 5),
(8, 4, '2024-10-05', 1),
(9, 4, '2024-10-10', 1),
(10, 5, '2024-10-12', 1),
(11, 5, '2024-10-15', 1),
(12, 1, '2024-10-18', 3),
(13, 7, '2024-10-07', 1),
(14, 7, '2024-10-06', 1),
(15, 8, '2024-10-08', 1),
(16, 8, '2024-10-01', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notes`
--

CREATE TABLE `notes` (
  `idNote` int(11) NOT NULL,
  `idNotebook` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `notes`:
--   `idNotebook`
--       `notebooks` -> `idNotebook`
--

--
-- Volcado de datos para la tabla `notes`
--

INSERT INTO `notes` (`idNote`, `idNotebook`, `title`, `note`) VALUES
(1, 1, 'Tareas de programación', 'Completar ejercicios de SQL y repasar Java.'),
(2, 1, 'Fechas de parciales', '1 de noviembre - Matemáticas, 15 de noviembre - Historia.'),
(3, 2, 'Comprar comida para el gato', 'No olvidar comprar la marca favorita.'),
(4, 2, 'Sacar a pasear al perro', 'Paseo en la tarde después de trabajar.'),
(5, 4, 'Postres', 'Prueba estos muffins de avena y plátano, ideales para un desayuno nutritivo. Sin azúcares añadidos y ricos en fibra, son perfectos para comenzar el día con energía. ¡Sencillos de hacer y deliciosos!'),
(6, 5, 'Cómo Hacer Pan Casero', 'Descubre los secretos para hacer pan casero perfecto. Con solo cuatro ingredientes básicos: harina, agua, sal y levadura, puedes lograr una corteza crujiente y un interior esponjoso. ¡Una actividad gratificante que disfrutarás!'),
(7, 6, 'Receta de Pasta ', 'Aprende a preparar una deliciosa pasta al pesto en solo 20 minutos. Mezcla albahaca fresca, piñones, ajo y queso parmesano para crear una salsa vibrante que hará que tus platos brillen. Ideal para una cena rápida.'),
(8, 7, 'Revisar libros', 'Completar lectura del libro de historia.'),
(9, 7, 'Proyectos de trabajo', 'Listar proyectos en curso.'),
(10, 7, 'Citas médicas', 'Agendar cita con el médico.'),
(11, 7, 'Cumpleaños de amigos', 'No olvidar los cumpleaños en octubre.'),
(12, 7, 'Ideas para el blog', 'Escribir sobre recetas y estilo de vida.'),
(13, 8, 'La Importancia de la Hidratación', 'Mantenerse hidratado es fundamental para el buen funcionamiento del cuerpo. El agua ayuda a regular la temperatura, transportar nutrientes y eliminar toxinas. Se recomienda beber al menos 2 litros al día, y más si realizas actividad física. Considera llevar una botella reutilizable contigo para recordar beber agua a lo largo del día.'),
(14, 9, 'Estrategias para Reducir el Estrés', 'El estrés crónico puede afectar tu salud física y mental. Incorpora técnicas como la meditación, la respiración profunda y el ejercicio regular en tu rutina diaria. Dedicar unos minutos al día a desconectar y relajarte puede mejorar significativamente tu bienestar general.'),
(15, 10, 'Tendencias en Inteligencia Artificial', 'La inteligencia artificial (IA) está transformando diversas industrias. Desde asistentes virtuales hasta algoritmos de recomendación, la IA mejora la eficiencia y la toma de decisiones. En 2024, se espera que las aplicaciones de IA generativa se expandan, facilitando tareas creativas y técnicas.'),
(16, 11, 'Dispositivos Portátiles', 'Los dispositivos portátiles, como relojes inteligentes y pulseras de actividad, están ganando popularidad. Estos dispositivos no solo monitorean la actividad física, sino que también ofrecen funciones de salud, como el seguimiento del sueño y la monitorización del ritmo cardíaco. Se prevé que en los próximos años, estos dispositivos se integren aún más con aplicaciones de salud y bienestar.'),
(17, 12, 'Cosas que no debo olvidar', 'Recordar citas y eventos importantes.'),
(18, 12, 'Temas de conversación', 'Ideas para charlar con amigos.'),
(19, 13, 'Estrenos de Películas Imperdibles', ' Este mes se estrenan varias películas esperadas, incluyendo el nuevo thriller de acción y una conmovedora película animada para toda la familia. No te pierdas las críticas y recomendaciones sobre los mejores estrenos que no puedes dejar de ver en el cine.'),
(20, 14, 'Series Recomendadas', 'Si buscas algo para ver este fin de semana, aquí tienes una lista de series que están generando gran revuelo. Desde dramas intensos hasta comedias ligeras, estas series ofrecen tramas adictivas y personajes memorables que te mantendrán enganchado.'),
(21, 15, 'Aprendizaje en Línea', 'La educación en línea ha revolucionado la forma en que aprendemos. Ofrece flexibilidad para estudiar a tu propio ritmo y acceder a una amplia variedad de cursos desde cualquier lugar. Además, permite a los estudiantes adaptar su aprendizaje a sus necesidades individuales y horarios.'),
(22, 16, 'Estrategias para Estudiar', 'Para mejorar tu rendimiento académico, considera técnicas como la práctica distribuida y la autoevaluación. Establecer un horario de estudio, tomar descansos regulares y utilizar recursos como mapas conceptuales pueden ayudar a retener información y aumentar la comprensión de los temas.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `photoProfile` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `users`:
--

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`idUser`, `name`, `email`, `password`, `photoProfile`) VALUES
(1, 'joel.l.fuentes', 'fuenteslautarojoe@gmail.com', '5e884898da28047151d0e56f8dc6292773603d0d7a9a45c6f8e9d1e04e9536b8', 'files/img/perfil.jpg\r\n'),
(2, '07Martin12', 'alexmartin9c@gmail.com', '$2y$10$AStYNFJUTiwfsdUahoUt6.FR8sGUJkXvC5K9xSiS0y4gtC/YfVDfS', 'files/img/perfil.jpg'),
(3, 'cocina', 'notasDeCocina@gmail.com', 'ef92b7797f4f23c4d7f5f41f0c29bcfb1b5ad840ca23a3b486bc57c94f0d982b', 'files/img/perfil.jpg\r\n'),
(4, 'salud.bienestar', 'notasDeSaludYBienestar@example.com', 'b5b6d8a8c5eaf4ae17a3c905fbe2165f7ebfdf2abaf0f826a3f0d96ecdb23f0c', 'files/img/perfil.jpg\r\n'),
(5, 'tecnologia', 'notasDeTecnologia@example.com', 'c6d2bcd165b54d3f30cbdb78c27f7e8be3e626fcd6348d64d7f3a8e8096e4da6', 'files/img/perfil.jpg\r\n'),
(6, 'administrador', 'adminNotePax@gmail.com', '$2y$10$uoQxm6CE7LCwzTy4pURhRe.j/JrMd7s.iwp3L2fWlVOS3mkrY4PXe', 'files/img/perfil.jpg'),
(7, 'entretenimiento', 'notasDeEntretenimiento@gmail.com', '$2y$10$p5YGO/zaSod91Tx/ABLWmeN9s.xbCQaQjnxxAgubCoftQUeDlXSVe', 'files/img/perfil.jpg'),
(8, 'educacion', 'notasDeEducacion@gmail.com', '$2y$10$eOeZFDdl9FIULRbnAqj80.1o8Buoexc2OIgRcu0OLNd6yeQ4sNze6', 'files/img/perfil.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `notebooks`
--
ALTER TABLE `notebooks`
  ADD PRIMARY KEY (`idNotebook`),
  ADD KEY `idUser` (`idUser`);

--
-- Indices de la tabla `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`idNote`),
  ADD KEY `idNotebook` (`idNotebook`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `notebooks`
--
ALTER TABLE `notebooks`
  MODIFY `idNotebook` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `notes`
--
ALTER TABLE `notes`
  MODIFY `idNote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `notebooks`
--
ALTER TABLE `notebooks`
  ADD CONSTRAINT `notebooks_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);

--
-- Filtros para la tabla `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`idNotebook`) REFERENCES `notebooks` (`idNotebook`);


--
-- Metadatos
--
USE `phpmyadmin`;

--
-- Metadatos para la tabla notebooks
--

--
-- Metadatos para la tabla notes
--

--
-- Volcado de datos para la tabla `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'blocdenotas', 'notes', '{\"CREATE_TIME\":\"2024-10-19 02:09:28\",\"col_order\":[1,0,2,3],\"col_visib\":[1,1,1,1]}', '2024-10-20 20:21:06');

--
-- Metadatos para la tabla users
--

--
-- Metadatos para la base de datos blocdenotas
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

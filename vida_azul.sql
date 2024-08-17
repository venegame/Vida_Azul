-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Aug 18, 2024 at 01:09 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vida_azul`
--
CREATE DATABASE IF NOT EXISTS `vida_azul` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `vida_azul`;

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(100) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'Energía Sostenible'),
(2, 'Gestión de Residuos'),
(3, 'Conservación de la Biodiversidad'),
(4, 'Educación Ambiental'),
(5, 'Voluntariado'),
(6, 'Green Wolf'),
(7, 'Costa Rica por Siempre'),
(8, 'Articulo');

-- --------------------------------------------------------

--
-- Table structure for table `comentario`
--

DROP TABLE IF EXISTS `comentario`;
CREATE TABLE IF NOT EXISTS `comentario` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha_comentario` date NOT NULL,
  `comentario` text NOT NULL,
  PRIMARY KEY (`id_comentario`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comentario`
--

INSERT INTO `comentario` (`id_comentario`, `id_usuario`, `fecha_comentario`, `comentario`) VALUES
(1, 2, '2024-08-17', 'El proyecto de paneles solares ha sido un éxito en la comunidad.'),
(2, 3, '2024-08-18', 'La iniciativa de reciclaje ha tenido una gran aceptación entre los vecinos.'),
(3, 4, '2024-08-19', 'La reforestación es crucial para mantener el equilibrio ecológico.'),
(4, 5, '2024-08-20', 'Las capacitaciones han generado un cambio positivo en los estudiantes.'),
(5, 2, '2024-08-21', 'El voluntariado en la playa fue una experiencia enriquecedora.');

-- --------------------------------------------------------

--
-- Table structure for table `evento`
--

DROP TABLE IF EXISTS `evento`;
CREATE TABLE IF NOT EXISTS `evento` (
  `id_evento` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) DEFAULT NULL,
  `nombre_evento` varchar(100) NOT NULL,
  `fecha_evento` date NOT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_evento`),
  KEY `id_categoria` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evento`
--

INSERT INTO `evento` (`id_evento`, `id_categoria`, `nombre_evento`, `fecha_evento`, `descripcion`, `imagen`) VALUES
(1, 1, 'Seminario de Energía Renovable', '2024-09-15', 'Evento para discutir las últimas innovaciones en energía renovable', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTZej7z_4OH_kOB7d_6Z_nkqQZR9eHCBDky6A&s'),
(2, 2, 'Día del Reciclaje', '2024-10-01', 'Evento comunitario para fomentar la cultura del reciclaje', 'https://lh5.googleusercontent.com/proxy/cKzFVse6f_1UIjLl-lW90mEYlpnqQnRIvHLM1HExjmQ6KzEwGpwSSMqK0BKi9vBZX3cViF3CbDqGWefYTyjLEoOD_tm1cMiQ_ZVglg_iuhY6-5OdL0LbUjKT-CCbdYohVSGdqiKcKz-CVwxexO_GsY0M'),
(3, 3, 'Jornada de Reforestación', '2024-08-25', 'Evento para plantar árboles en áreas desforestadas', 'https://www.bcie.org/fileadmin/_processed_/f/d/csm_REFORESTAcr24_59d0626f06.jpg'),
(4, 4, 'Feria Ambiental Escolar', '2024-11-10', 'Feria educativa para concientizar a los estudiantes sobre temas ambientales', 'https://www.tec.ac.cr/hoyeneltec/sites/default/files/styles/colorbox/public/media/img/paragraph/invitacion_personalizada-02.png'),
(5, 5, 'Día Internacional del Voluntariado', '2024-12-05', 'Celebración y reconocimiento a los voluntarios que han participado en los proyectos', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3RaAhJwVemyTP2qrK81hzqU4hxPBYLjrWlQ&s');

-- --------------------------------------------------------

--
-- Table structure for table `expertos`
--

DROP TABLE IF EXISTS `expertos`;
CREATE TABLE IF NOT EXISTS `expertos` (
  `id_experto` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) DEFAULT NULL,
  `nombre_experto` varchar(100) NOT NULL,
  `quienes_somos` text DEFAULT NULL,
  `historia_expertos` text DEFAULT NULL,
  `url_instagram` varchar(255) DEFAULT NULL,
  `url_x` varchar(255) DEFAULT NULL,
  `url_youtube` varchar(255) DEFAULT NULL,
  `url_facebook` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_experto`),
  KEY `id_categoria` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expertos`
--

INSERT INTO `expertos` (`id_experto`, `id_categoria`, `nombre_experto`, `quienes_somos`, `historia_expertos`, `url_instagram`, `url_x`, `url_youtube`, `url_facebook`) VALUES
(1, 6, 'Green Wolf Costa Rica', 'Green Wolf Costa Rica es un movimiento integral, inclusivo y sostenible, que busca la recuperación socio-ecosistémica de Costa Rica a través de la acción y alianzas intersectoriales.', 'Nacemos a partir de la preocupación de nuestro fundador, Ellian Villalobos, por la creciente contaminación de los ecosistemas costarricenses. Por esto, un 15 de diciembre de 2018 funda Green Wolf Costa Rica.', 'https://www.instagram.com/greenwolfcr/', 'https://x.com/greenwolfcr?lang=en', 'https://www.youtube.com/channel/UC6NRa0FDOb3pEx7xmX5P9fQ', 'https://www.facebook.com/GreenWolfCR'),
(2, 7, 'Asociación Costa Rica por Siempre', 'Somos la Asociación Costa Rica por Siempre, una organización no gubernamental de carácter privado, creada en el 2010 como el segundo PFP del mundo, un modelo de financiamiento de proyectos para la permanencia (PFP).\r\n\r\nNos dedicamos a gestionar, invertir y movilizar recursos de Gobiernos, organismos internacionales y fundaciones privadas que buscan la conservación de la biodiversidad.', 'Nacimos bajo una alianza público-privada para apoyar al país en cumplir las metas del Convención de Diversidad Biológica (CDB) de las Naciones Unidas.', 'https://www.instagram.com/costaricaporsiempre/', 'https://x.com/CRporSiempre', 'https://www.youtube.com/channel/UCnpLXRSOKto1pOUxM5cbOQw', 'https://www.facebook.com/ACRXS');

-- --------------------------------------------------------

--
-- Table structure for table `galeria`
--

DROP TABLE IF EXISTS `galeria`;
CREATE TABLE IF NOT EXISTS `galeria` (
  `id_imagen` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `titulo` varchar(100) NOT NULL,
  PRIMARY KEY (`id_imagen`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `galeria`
--

INSERT INTO `galeria` (`id_imagen`, `id_usuario`, `imagen`, `titulo`) VALUES
(1, 2, 'https://www.infobae.com/new-resizer/Ntef1OEt7AsZhUpqmF_iNBbwapo=/1200x900/filters:format(webp):quality(85)/s3.amazonaws.com/arc-wordpress-client-uploads/infobae-wp/wp-content/uploads/2019/05/31160504/DEF-Paneles-solares-escuelas-rurales-Portada.jpg', 'Instalación de Paneles Solares en Escuela Rural'),
(2, 3, 'https://www.munitucapel.cl/include/images/news/gallery/988/_000000988_8768225dba_Tucapel.jpg', 'Punto de Reciclaje Comunitario'),
(3, 4, 'https://loaizacomunicaciones.com/wp-content/uploads/grupo-difare-contribuye-a-la-reforestacion-de-areas-protegidas.jpg', 'Reforestación de Zonas Protegidas'),
(4, 5, 'https://www.pactomundial.org/wp-content/uploads/2023/07/Post_Wordpress_-_1280_x_720-_4_-1024x576.webp', 'Capacitación sobre Sostenibilidad'),
(5, 2, 'https://img.global.news.samsung.com/latin/wp-content/uploads/2018/10/VOL_12.jpg', 'Voluntariado de Limpieza de Playas');

-- --------------------------------------------------------

--
-- Table structure for table `proyecto`
--

DROP TABLE IF EXISTS `proyecto`;
CREATE TABLE IF NOT EXISTS `proyecto` (
  `id_proyecto` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `nombre_proyecto` varchar(100) NOT NULL,
  `detalle_proyecto` text DEFAULT NULL,
  `estado_proyecto` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_proyecto`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_categoria` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proyecto`
--

INSERT INTO `proyecto` (`id_proyecto`, `id_usuario`, `id_categoria`, `nombre_proyecto`, `detalle_proyecto`, `estado_proyecto`) VALUES
(1, 2, 1, 'Instalación de Paneles Solares en Escuelas Rurales', 'Este proyecto busca implementar paneles solares en 10 escuelas rurales del país', 'En Progreso'),
(2, 3, 2, 'Reciclaje Comunitario', 'Iniciativa para establecer puntos de reciclaje en comunidades urbanas', 'Completado'),
(3, 4, 3, 'Reforestación en Zonas Protegidas', 'Reforestación de 100 hectáreas en áreas protegidas', 'Planeado'),
(4, 5, 4, 'Capacitaciones en Escuelas', 'Charlas y talleres sobre sostenibilidad para estudiantes de primaria y secundaria', 'En Progreso'),
(5, 2, 5, 'Voluntariado de Limpieza de Playas', 'Proyecto para organizar grupos de voluntarios que limpien playas en la costa', 'Completado');

-- --------------------------------------------------------

--
-- Table structure for table `recurso`
--

DROP TABLE IF EXISTS `recurso`;
CREATE TABLE IF NOT EXISTS `recurso` (
  `id_recurso` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) DEFAULT NULL,
  `nombre_recurso` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_recurso`),
  KEY `id_categoria` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recurso`
--

INSERT INTO `recurso` (`id_recurso`, `id_categoria`, `nombre_recurso`, `descripcion`, `imagen`) VALUES
(1, 1, 'Paneles Solares', 'Guía completa sobre la instalación y mantenimiento de paneles solares', 'paneles_solares.png'),
(2, 2, 'Reciclaje en Casa', 'Consejos prácticos para implementar un sistema de reciclaje en el hogar', 'reciclaje_casa.png'),
(3, 3, 'Árboles Nativos', 'Importancia de la siembra de árboles nativos para la biodiversidad local', 'arboles_nativos.png'),
(4, 4, 'Charlas Educativas', 'Accede a charlas y talleres sobre sostenibilidad ambiental', 'charlas_educativas.png'),
(5, 5, 'Voluntariados Activos', 'Únete a los proyectos de voluntariado en tu comunidad', 'voluntariados_activos.png');

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(100) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`) VALUES
(1, 'Administrador'),
(2, 'Usuario'),
(3, 'Moderador'),
(4, 'Editor'),
(5, 'Voluntario');

-- --------------------------------------------------------

--
-- Table structure for table `transporte`
--

DROP TABLE IF EXISTS `transporte`;
CREATE TABLE IF NOT EXISTS `transporte` (
  `id_transporte` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `nombre_transporte` varchar(100) NOT NULL,
  `ruta_transporte` varchar(255) DEFAULT NULL,
  `horario_transporte` varchar(100) DEFAULT NULL,
  `precio_transporte` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_transporte`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transporte`
--

INSERT INTO `transporte` (`id_transporte`, `id_usuario`, `nombre_transporte`, `ruta_transporte`, `horario_transporte`, `precio_transporte`) VALUES
(1, 2, 'Autobús Sostenible', 'Ruta A - Centro de la Ciudad a la Zona Verde', '06:00 - 18:00', 0.50),
(2, 3, 'Carro Eléctrico Compartido', 'Ruta B - Estación Central a la Playa', '08:00 - 20:00', 5.00),
(3, 4, 'Bicicleta Comunitaria', 'Ruta C - Parque Central a la Universidad', 'Todo el día', 0.00),
(4, 5, 'Tren Solar', 'Ruta D - Suburbio al Centro de la Ciudad', '07:00 - 19:00', 1.00),
(5, 2, 'Autobús de Biodiésel', 'Ruta E - Zona Rural a la Plaza Principal', '05:00 - 17:00', 0.75);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_rol` int(11) DEFAULT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `apellido_usuario` varchar(100) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `contrasenia` varchar(100) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_rol` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_rol`, `nombre_usuario`, `apellido_usuario`, `correo`, `contrasenia`) VALUES
(1, 1, 'admin', 'admin', 'admin@vidaazul.com', 'adminpass'),
(2, 2, 'Sofia', 'Ramirez', 'sofia.ramirez@vidaazul.com', 'sofia123'),
(3, 3, 'Luis', 'Hernandez', 'luis.hernandez@vidaazul.com', 'luis123'),
(4, 4, 'Ana', 'Martinez', 'ana.martinez@vidaazul.com', 'ana123'),
(5, 5, 'Carlos', 'Gonzalez', 'carlos.gonzalez@vidaazul.com', 'carlos123');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Constraints for table `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Constraints for table `expertos`
--
ALTER TABLE `expertos`
  ADD CONSTRAINT `expertos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Constraints for table `galeria`
--
ALTER TABLE `galeria`
  ADD CONSTRAINT `galeria_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Constraints for table `proyecto`
--
ALTER TABLE `proyecto`
  ADD CONSTRAINT `proyecto_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `proyecto_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Constraints for table `recurso`
--
ALTER TABLE `recurso`
  ADD CONSTRAINT `recurso_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Constraints for table `transporte`
--
ALTER TABLE `transporte`
  ADD CONSTRAINT `transporte_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

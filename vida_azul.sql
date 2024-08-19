SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `vida_azul` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `vida_azul`;

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'Energía Sostenible'),
(2, 'Gestión de Residuos'),
(3, 'Conservación de la Biodiversidad'),
(4, 'Educación Ambiental'),
(5, 'Voluntariado'),
(6, 'Green Wolf'),
(7, 'Costa Rica por Siempre'),
(8, 'Articulo'),
(9, 'Curso');

DROP TABLE IF EXISTS `comentario`;
CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha_comentario` date NOT NULL,
  `comentario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `comentario` (`id_comentario`, `id_usuario`, `fecha_comentario`, `comentario`) VALUES
(1, 2, '2024-08-17', 'El proyecto de paneles solares ha sido un éxito en la comunidad.'),
(2, 3, '2024-08-18', 'La iniciativa de reciclaje ha tenido una gran aceptación entre los vecinos.'),
(3, 4, '2024-08-19', 'La reforestación es crucial para mantener el equilibrio ecológico.'),
(4, 5, '2024-08-20', 'Las capacitaciones han generado un cambio positivo en los estudiantes.'),
(5, 2, '2024-08-21', 'El voluntariado en la playa fue una experiencia enriquecedora.');

DROP TABLE IF EXISTS `eventos`;
CREATE TABLE `eventos` (
  `id_evento` int(11) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `nombre_evento` varchar(100) NOT NULL,
  `fecha_evento` date NOT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `eventos` (`id_evento`, `id_categoria`, `nombre_evento`, `fecha_evento`, `descripcion`, `imagen`) VALUES
(1, 1, 'Seminario de Energía Renovable', '2024-09-15', 'Evento para discutir las últimas innovaciones en energía renovable', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTZej7z_4OH_kOB7d_6Z_nkqQZR9eHCBDky6A&s'),
(2, 2, 'Día del Reciclaje', '2024-10-01', 'Evento comunitario para fomentar la cultura del reciclaje', 'https://lh5.googleusercontent.com/proxy/cKzFVse6f_1UIjLl-lW90mEYlpnqQnRIvHLM1HExjmQ6KzEwGpwSSMqK0BKi9vBZX3cViF3CbDqGWefYTyjLEoOD_tm1cMiQ_ZVglg_iuhY6-5OdL0LbUjKT-CCbdYohVSGdqiKcKz-CVwxexO_GsY0M'),
(3, 3, 'Jornada de Reforestación', '2024-08-25', 'Evento para plantar árboles en áreas desforestadas', 'https://www.bcie.org/fileadmin/_processed_/f/d/csm_REFORESTAcr24_59d0626f06.jpg'),
(4, 4, 'Feria Ambiental Escolar', '2024-11-10', 'Feria educativa para concientizar a los estudiantes sobre temas ambientales', 'https://www.tec.ac.cr/hoyeneltec/sites/default/files/styles/colorbox/public/media/img/paragraph/invitacion_personalizada-02.png'),
(5, 5, 'Día Internacional del Voluntariado', '2024-12-05', 'Celebración y reconocimiento a los voluntarios que han participado en los proyectos', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3RaAhJwVemyTP2qrK81hzqU4hxPBYLjrWlQ&s');

DROP TABLE IF EXISTS `expertos`;
CREATE TABLE `expertos` (
  `id_experto` int(11) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `nombre_experto` varchar(100) NOT NULL,
  `quienes_somos` text DEFAULT NULL,
  `historia_expertos` text DEFAULT NULL,
  `url_instagram` varchar(255) DEFAULT NULL,
  `url_x` varchar(255) DEFAULT NULL,
  `url_youtube` varchar(255) DEFAULT NULL,
  `url_facebook` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `expertos` (`id_experto`, `id_categoria`, `nombre_experto`, `quienes_somos`, `historia_expertos`, `url_instagram`, `url_x`, `url_youtube`, `url_facebook`) VALUES
(1, 6, 'Green Wolf Costa Rica', 'Green Wolf Costa Rica es un movimiento integral, inclusivo y sostenible, que busca la recuperación socio-ecosistémica de Costa Rica a través de la acción y alianzas intersectoriales.', 'Nacemos a partir de la preocupación de nuestro fundador, Ellian Villalobos, por la creciente contaminación de los ecosistemas costarricenses. Por esto, un 15 de diciembre de 2018 funda Green Wolf Costa Rica.', 'https://www.instagram.com/greenwolfcr/', 'https://x.com/greenwolfcr?lang=en', 'https://www.youtube.com/channel/UC6NRa0FDOb3pEx7xmX5P9fQ', 'https://www.facebook.com/GreenWolfCR'),
(2, 7, 'Asociación Costa Rica por Siempre', 'Somos la Asociación Costa Rica por Siempre, una organización no gubernamental de carácter privado, creada en el 2010 como el segundo PFP del mundo, un modelo de financiamiento de proyectos para la permanencia (PFP).\r\n\r\nNos dedicamos a gestionar, invertir y movilizar recursos de Gobiernos, organismos internacionales y fundaciones privadas que buscan la conservación de la biodiversidad.', 'Nacimos bajo una alianza público-privada para apoyar al país en cumplir las metas del Convención de Diversidad Biológica (CDB) de las Naciones Unidas.', 'https://www.instagram.com/costaricaporsiempre/', 'https://x.com/CRporSiempre', 'https://www.youtube.com/channel/UCnpLXRSOKto1pOUxM5cbOQw', 'https://www.facebook.com/ACRXS');

DROP TABLE IF EXISTS `galeria`;
CREATE TABLE `galeria` (
  `id_imagen` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `titulo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `galeria` (`id_imagen`, `id_usuario`, `imagen`, `titulo`) VALUES
(1, 2, 'https://www.infobae.com/new-resizer/Ntef1OEt7AsZhUpqmF_iNBbwapo=/1200x900/filters:format(webp):quality(85)/s3.amazonaws.com/arc-wordpress-client-uploads/infobae-wp/wp-content/uploads/2019/05/31160504/DEF-Paneles-solares-escuelas-rurales-Portada.jpg', 'Instalación de Paneles Solares en Escuela Rural'),
(2, 3, 'https://www.munitucapel.cl/include/images/news/gallery/988/_000000988_8768225dba_Tucapel.jpg', 'Punto de Reciclaje Comunitario'),
(3, 4, 'https://loaizacomunicaciones.com/wp-content/uploads/grupo-difare-contribuye-a-la-reforestacion-de-areas-protegidas.jpg', 'Reforestación de Zonas Protegidas'),
(4, 5, 'https://www.pactomundial.org/wp-content/uploads/2023/07/Post_Wordpress_-_1280_x_720-_4_-1024x576.webp', 'Capacitación sobre Sostenibilidad'),
(5, 2, 'https://img.global.news.samsung.com/latin/wp-content/uploads/2018/10/VOL_12.jpg', 'Voluntariado de Limpieza de Playas');

DROP TABLE IF EXISTS `proyecto`;
CREATE TABLE `proyecto` (
  `id_proyecto` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `nombre_proyecto` varchar(100) NOT NULL,
  `detalle_proyecto` text DEFAULT NULL,
  `estado_proyecto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `proyecto` (`id_proyecto`, `id_usuario`, `id_categoria`, `nombre_proyecto`, `detalle_proyecto`, `estado_proyecto`) VALUES
(1, 2, 1, 'Instalación de Paneles Solares en Escuelas Rurales', 'Este proyecto busca implementar paneles solares en 10 escuelas rurales del país', 'En Progreso'),
(2, 3, 2, 'Reciclaje Comunitario', 'Iniciativa para establecer puntos de reciclaje en comunidades urbanas', 'Completado'),
(3, 4, 3, 'Reforestación en Zonas Protegidas', 'Reforestación de 100 hectáreas en áreas protegidas', 'Completado'),
(4, 5, 4, 'Capacitaciones en Escuelas', 'Charlas y talleres sobre sostenibilidad para estudiantes de primaria y secundaria', 'En Progreso'),
(5, 2, 5, 'Voluntariado de Limpieza de Playas', 'Proyecto para organizar grupos de voluntarios que limpien playas en la costa', 'Completado');

DROP TABLE IF EXISTS `proyecto_imagenes`;
CREATE TABLE `proyecto_imagenes` (
  `id_imagen` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `ruta_imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `proyecto_imagenes` (`id_imagen`, `id_proyecto`, `ruta_imagen`) VALUES
(1, 1, 'https://media.istockphoto.com/id/1467367215/es/foto/una-imagen-de-una-amplia-sala-de-clases.jpg?s=1024x1024&w=is&k=20&c=HkbWrfY-O9PhIH3D9vymNAW1Y8nxdTCz1qZ2ZCVSpGQ='),
(2, 1, 'https://img.freepik.com/foto-gratis/hombre-trabajador-campo-junto-paneles-solares_1303-15597.jpg'),
(3, 1, 'https://img.freepik.com/foto-gratis/panel-energia-solar-fotovoltaica-campo-verde-limpio-concepto-energia-alternativa-ai-generativo_123827-23424.jpg'),
(4, 1, 'https://media.istockphoto.com/id/1127245421/es/foto/manos-de-mujer-pidiendo-la-bendici%C3%B3n-de-dios-sobre-fondo-puesta-de-sol.jpg?s=1024x1024&w=is&k=20&c=rckoeBloyLTsIHQabNQRzxtgKAzZrakd4IIlKDU3nRw='),
(5, 1, 'https://images.unsplash.com/photo-1559302504-64aae6ca6b6d?q=80&w=1637&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(6, 2, 'https://media.istockphoto.com/id/986900214/es/foto/voluntarios-limpieza-parque.jpg?s=612x612&w=0&k=20&c=LfTUF9GKMGVSw45Swxv0-MwWQskY2xYkUJ8Gfazhuwg='),
(7, 2, 'https://media.istockphoto.com/id/1326024656/es/foto/foto-de-un-adolescente-irreconocible-recogiendo-basura-de-un-campo-en-un-campamento-de-verano.jpg?s=612x612&w=0&k=20&c=Q6QNMZVMUvbKYX5W5PKM3oTyIaRZ8Z2h-UmelDWxCx4='),
(8, 2, 'https://media.istockphoto.com/id/127825115/es/foto/limpieza-de-la-camada-sobre-hierba.jpg?s=612x612&w=0&k=20&c=kj0NTU3wxV2eHSIalxgn5ny-1qb0gNCoDYgsNn0TB8o='),
(9, 2, 'https://media.istockphoto.com/id/1273367579/es/foto/alegre-hombre-de-carrera-mixto-mirando-hacia-otro-lado-mientras-recoge-basura-con-amigos-al.jpg?s=612x612&w=0&k=20&c=sJ7MkUCcLnyiULwyk8HYG237BD6ezzMfAX8-YwICumE='),
(10, 2, 'https://media.istockphoto.com/id/127825118/es/foto/limpieza-de-la-camada-sobre-hierba.jpg?s=612x612&w=0&k=20&c=d-UMBBkUAno_LY_kJk77c_ExD37tPxiQHxESNprgRyk='),
(11, 4, 'https://images.unsplash.com/photo-1598335624134-5bceb5de202d?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(12, 4, 'https://media.istockphoto.com/id/1032034626/es/foto/plantando-el-futuro.webp?s=612x612&w=0&k=20&c=T9oN2sfMCwEKiomFpEtVGqm28JNtBbjwPS4V2jQqS9o='),
(13, 4, 'https://media.istockphoto.com/id/1333182719/es/foto/voluntarios-siguiendo-las-pautas-de-covid-19.webp?s=612x612&w=0&k=20&c=VhEhCcEXFZvSgEU1LgURb60Ye7WPjLm-uuDWLWMT2D4='),
(14, 4, 'https://media.istockphoto.com/id/1193732330/es/foto/voluntarios-plantando-un-%C3%A1rbol.webp?s=612x612&w=0&k=20&c=qZDkpm_fIecoxzl47_krhVx1XLzzK95jhKx2-lxyQuY='),
(15, 4, 'https://media.istockphoto.com/id/1371150277/es/foto/vista-de-alto-%C3%A1ngulo-de-ni%C3%B1o-irreconocible-dibujando-el-planeta-tierra-con-personas.jpg?s=1024x1024&w=is&k=20&c=ukRs4Ll_Ac1LW-YmukUCyAveGGJ_j0NFqZwpsCv1u64='),
(16, 5, 'https://media.istockphoto.com/id/1340953635/es/foto/dos-mujeres-voluntarias-recogen-residuos-pl%C3%A1sticos-desechados-junto-al-mar.jpg?s=612x612&w=0&k=20&c=-RS-lUujG-wvEy0sd9rYbiIUWJtalucOcVBrkLZLAio='),
(17, 5, 'https://media.istockphoto.com/id/1366551415/es/foto/una-joven-voluntaria-se-pone-en-cuclillas-y-recoge-basura-en-la-orilla-del-oc%C3%A9ano-limpieza-de.jpg?s=612x612&w=0&k=20&c=QierCFOyPhPB68dt7PG6_CHaqwH7wkbF-WA4yqz8i1M='),
(18, 5, 'https://media.istockphoto.com/id/1435006260/es/foto/recicladores-hablando-mientras-caminan-por-la-playa.jpg?s=612x612&w=0&k=20&c=wUtPMZiGOasGy71HtexsOIh7Droga8nSAhWFWovzdkM='),
(19, 5, 'https://media.istockphoto.com/id/1023578222/es/foto/activistas-que-trabajan-juntos-haciendo-una-diferencia.jpg?s=612x612&w=0&k=20&c=o3BbkI53l2B4ntYugnhu873yHbf2ECcL1c76qY1Nef0='),
(20, 5, 'https://media.istockphoto.com/id/1263087901/es/foto/limpieza-ambiental-una-mujer-playa-koh-lanta-tailandia.jpg?s=612x612&w=0&k=20&c=mVrOKAX7xd_bnNYkaQTQ-PUwRsBd-YTl_jyOgf_tuPs=');

DROP TABLE IF EXISTS `recursos`;
CREATE TABLE `recursos` (
  `id_recurso` int(11) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `nombre_recurso` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `recursos` (`id_recurso`, `id_categoria`, `nombre_recurso`, `descripcion`, `imagen`) VALUES
(1, 8, 'Paneles Solares', 'Guía completa sobre la instalación y mantenimiento de paneles solares\r\n\r\nIntroducción\r\nLos paneles solares convierten la luz del sol en electricidad, ofreciendo una fuente de energía limpia y sostenible. Esta guía te ayudará a entender cómo instalar y mantener tu sistema solar.\r\n\r\nTipos de Paneles Solares\r\nMonocristalinos: Alta eficiencia, mayor costo.\r\nPolicristalinos: Menor costo, eficiencia moderada.\r\nCapa Fina: Flexible y ligero, pero menos eficiente.\r\n\r\nInstalación\r\nEvaluación: Asegúrate de que el área tenga buena exposición al sol.\r\nCálculo de Energía: Revisa tus facturas eléctricas para dimensionar el sistema.\r\nPermisos: Verifica requisitos locales.\r\nPasos de Instalación\r\nMontaje de Estructuras: Fija las estructuras al techo o suelo.\r\nInstalación de Paneles: Coloca los paneles sobre las estructuras.\r\nCableado: Conecta los paneles al inversor y, si es necesario, a la red eléctrica.\r\nConfiguración: Ajusta el inversor y el medidor para monitorear la producción.\r\nMantenimiento\r\nLimpieza: Limpia los paneles una o dos veces al año.\r\nInspección Visual: Revisa los paneles y cables para detectar daños.\r\nMonitoreo: Usa aplicaciones para verificar el rendimiento del sistema.\r\nRevisión Profesional: Realiza una inspección anual para asegurar el funcionamiento óptimo.\r\n\r\nConclusión\r\nCon una instalación adecuada y un mantenimiento regular, los paneles solares pueden ofrecer energía limpia y ahorrar en tus facturas de electricidad durante más de 25 años.', 'https://upload.wikimedia.org/wikipedia/commons/2/2c/Fixed_Tilt_Solar_panel_at_Canterbury_Municipal_Building_Canterbury_New_Hampshire.jpg'),
(2, 9, 'Reciclaje en Casa', 'Consejos prácticos para implementar un sistema de reciclaje en el hogar. \r\n\r\nIntroducción\r\nEl reciclaje en casa es una forma efectiva de reducir residuos y contribuir al cuidado del medio ambiente. Esta guía te ayudará a empezar con el reciclaje en tu hogar.\r\n\r\n¿Qué se Puede Reciclar?\r\nPapel y Cartón: Incluye periódicos, revistas, cajas y envases de cartón.\r\nPlásticos: Botellas, envases y bolsas plásticas. Verifica los símbolos de reciclaje.\r\nVidrio: Botellas y frascos de vidrio. Enjuaga antes de reciclar.\r\nMetales: Latas de alimentos y bebidas. Aplasta las latas para ahorrar espacio.\r\n\r\nCómo Empezar\r\nSelecciona Contenedores: Usa contenedores separados para papel, plásticos, vidrio y metales.\r\nClasifica los Residuos: Asegúrate de separar los materiales reciclables de los no reciclables.\r\nLimpia los Recipientes: Enjuaga los envases para evitar contaminantes.\r\n\r\nConsejos para el Reciclaje\r\nInfórmate: Revisa las normativas locales sobre qué materiales se pueden reciclar.\r\nReduce y Reutiliza: Antes de reciclar, considera reducir tu consumo y reutilizar materiales.\r\nEducación Familiar: Enseña a todos en casa cómo clasificar y manejar los residuos.\r\n\r\nManejo de Residuos Especiales\r\nElectrónicos: Lleva a puntos de recogida especializados.\r\nPilas y Baterías: Llévalas a centros de reciclaje específicos.\r\nResiduos Peligrosos: Sigue las instrucciones locales para la disposición de productos químicos y medicamentos.\r\n\r\nConclusión\r\nReciclar en casa es sencillo y ayuda a reducir el impacto ambiental. Con un poco de organización y educación, puedes contribuir significativamente al cuidado del planeta.', 'https://www.bbva.com/wp-content/uploads/2021/04/como-reciclar-casa-sostenibilidad-reciclaje-bbva-1024x629.jpg'),
(3, 8, 'Árboles Nativos', 'Importancia de la siembra de árboles nativos para la biodiversidad local\r\n\r\nIntroducción\r\nLa siembra de árboles nativos es crucial para mantener y promover la biodiversidad local. Estos árboles, adaptados a las condiciones ambientales, ofrecen numerosos beneficios ecológicos y ambientales.\r\n\r\nBeneficios de los Árboles Nativos\r\nHábitat Natural: Proporcionan refugio y alimento a especies locales de fauna y flora.\r\nAdaptación Local: Están mejor adaptados a las condiciones del suelo y clima, reduciendo la necesidad de riego y fertilizantes.\r\nControl de Erosión: Sus raíces ayudan a estabilizar el suelo y prevenir la erosión.\r\nRegulación del Clima: Contribuyen a la regulación de la temperatura y la calidad del aire al absorber dióxido de carbono.\r\n\r\nCómo Contribuyen a la Biodiversidad\r\nSostenimiento de Ecosistemas: Los árboles nativos mantienen la estructura y función de los ecosistemas locales.\r\nPolinización y Dispersión de Semillas: Atraen polinizadores y animales que ayudan a dispersar semillas, promoviendo la regeneración del bosque.\r\nInteracciones Ecológicas: Fomentan relaciones simbióticas entre plantas, animales y microorganismos.\r\n\r\nCómo Plantar Árboles Nativos\r\nSelecciona Especies Adecuadas: Elige árboles que sean nativos de tu región y adecuados para el tipo de suelo y clima.\r\nPreparación del Terreno: Asegúrate de que el área esté libre de malas hierbas y tenga un buen drenaje.\r\nPlantación: Planta en la temporada adecuada y sigue las mejores prácticas de plantación para asegurar el crecimiento saludable.\r\n\r\nConsejos Adicionales\r\nEducación y Conciencia: Informa a la comunidad sobre la importancia de los árboles nativos y promueve su siembra.\r\nMantenimiento: Proporciona cuidados básicos como riego y protección contra plagas durante los primeros años.\r\nParticipación Comunitaria: Organiza eventos de plantación comunitaria para involucrar a más personas en la conservación.\r\n\r\nConclusión\r\nLa siembra de árboles nativos es fundamental para preservar la biodiversidad local y mejorar la salud ambiental. Contribuye a un ecosistema equilibrado y sostenible, beneficiando a la flora y fauna de tu área.', 'https://cordis.europa.eu/docs/news/images/2019-07/131589.jpg'),
(4, 9, 'Charlas Educativas', 'Accede a charlas y talleres sobre sostenibilidad ambiental\r\n\r\nIntroducción\r\nParticipar en charlas y talleres sobre sostenibilidad ambiental es una excelente manera de aprender más sobre prácticas ecológicas y cómo contribuir al cuidado del planeta. Esta guía te ayudará a encontrar y acceder a estos eventos educativos.\r\n\r\n¿Dónde Encontrar Charlas y Talleres?\r\nEventos Locales: Revisa la agenda de eventos de tu municipio o comunidad. A menudo, se organizan talleres en centros comunitarios o escuelas.\r\nOrganizaciones Ambientales: Muchas ONGs y grupos de conservación ofrecen charlas y talleres. Consulta sus sitios web o redes sociales.\r\nUniversidades y Centros de Investigación: Las instituciones académicas suelen organizar eventos educativos sobre sostenibilidad.\r\nPlataformas Online: Explora sitios web y aplicaciones dedicados a eventos educativos, como Eventbrite o Meetup, para encontrar talleres virtuales y presenciales.\r\n\r\nCómo Participar\r\nRegístrate con Anticipación: Asegúrate de inscribirte con anticipación para asegurar tu lugar en el evento.\r\nVerifica el Formato: Algunos talleres son presenciales, mientras que otros se realizan en línea. Asegúrate de conocer el formato y los requisitos.\r\nPrepárate: Investiga el tema del taller y prepara preguntas o temas de interés para aprovechar al máximo la experiencia.\r\n\r\nBeneficios de Participar\r\nConocimiento Actualizado: Obtén información actualizada sobre las últimas tendencias y prácticas en sostenibilidad ambiental.\r\nRed de Contactos: Conecta con profesionales y otros interesados en el tema, lo que puede abrir oportunidades para colaborar en proyectos.\r\nHabilidades Prácticas: Aprende técnicas y estrategias prácticas que puedes aplicar en tu vida diaria o en tu comunidad.\r\n\r\nConsejos Adicionales\r\nParticipa Activamente: Haz preguntas y participa en discusiones para obtener el mayor beneficio del taller.\r\nAplica lo Aprendido: Implementa las estrategias y conocimientos adquiridos en tu vida cotidiana o en proyectos comunitarios.\r\nComparte la Información: Difunde lo aprendido con amigos, familiares y colegas para promover prácticas sostenibles en tu entorno.\r\n\r\nConclusión\r\nAcceder a charlas y talleres sobre sostenibilidad ambiental te proporciona herramientas valiosas para contribuir al cuidado del medio ambiente. Aprovecha estas oportunidades para educarte y hacer una diferencia positiva en tu comunidad.', 'https://accionsocial.ucr.ac.cr/sites/default/files/noticia/imagenes-portada/2019-05/img_0472.jpg'),
(5, 8, 'Voluntariados Activos', 'Únete a los proyectos de voluntariado en tu comunidad\r\n\r\nIntroducción\r\nParticipar en proyectos de voluntariado es una forma efectiva de contribuir al bienestar de tu comunidad y hacer una diferencia positiva. Esta guía te ayudará a encontrar y unirte a oportunidades de voluntariado en tu área.\r\n\r\n¿Dónde Encontrar Proyectos de Voluntariado?\r\nOrganizaciones Locales: Consulta con ONGs, centros comunitarios y asociaciones locales que suelen tener programas de voluntariado.\r\nRedes Sociales y Sitios Web: Plataformas como Facebook, LinkedIn y sitios web de voluntariado (como Idealist o VolunteerMatch) ofrecen listados de proyectos y oportunidades.\r\nEventos Comunitarios: Asiste a eventos locales para conocer a organizadores de proyectos y obtener información sobre oportunidades de voluntariado.\r\nInstituciones Educativas y Empresas: Muchas universidades y empresas tienen programas de voluntariado y pueden ofrecer oportunidades o recursos para involucrarte.\r\n\r\nCómo Unirte a un Proyecto\r\nInvestiga las Oportunidades: Examina las diferentes opciones disponibles y elige proyectos que se alineen con tus intereses y habilidades.\r\nContacta a los Organizadores: Ponte en contacto con las organizaciones para obtener más detalles sobre los proyectos y el proceso de inscripción.\r\nCompleta el Registro: Sigue el proceso de inscripción que te indiquen, que puede incluir formularios, entrevistas o capacitación previa.\r\nParticipa en la Capacitación: Si el proyecto requiere capacitación, asegúrate de asistir para estar bien preparado.\r\n\r\nBeneficios de Voluntariado\r\nImpacto Positivo: Contribuye al bienestar de tu comunidad y ayuda a resolver problemas locales.\r\nDesarrollo Personal: Adquiere nuevas habilidades, experiencias y perspectivas mientras trabajas en proyectos significativos.\r\nRed de Contactos: Conoce a personas con intereses similares y construye relaciones valiosas en tu comunidad.\r\n\r\nConsejos Adicionales\r\nCompromiso y Puntualidad: Sé puntual y cumple con los compromisos para maximizar tu impacto y mantener una buena relación con los organizadores.\r\nComunicación: Mantén una comunicación abierta con los coordinadores del proyecto para resolver dudas y adaptar tu participación si es necesario.\r\nComparte tu Experiencia: Anima a otros a unirse a proyectos de voluntariado y comparte tus experiencias para inspirar a más personas.\r\n\r\nConclusión\r\nUnirte a proyectos de voluntariado en tu comunidad no solo beneficia a quienes reciben tu ayuda, sino que también enriquece tu vida personal y profesional. Aprovecha estas oportunidades para hacer una diferencia y fortalecer tu conexión con tu entorno local.', 'https://educowebmedia.blob.core.windows.net/educowebmedia/educospain/media/images/blog/manos-voluntariado.jpg');

DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `rol` (`id_rol`, `nombre_rol`) VALUES
(1, 'Administrador'),
(2, 'Usuario'),
(3, 'Moderador'),
(4, 'Editor'),
(5, 'Voluntario');

DROP TABLE IF EXISTS `transportes`;
CREATE TABLE `transportes` (
  `id_transporte` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `nombre_transporte` varchar(100) NOT NULL,
  `ruta_transporte` varchar(255) DEFAULT NULL,
  `horario_transporte` varchar(100) DEFAULT NULL,
  `precio_transporte` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `transportes` (`id_transporte`, `id_usuario`, `nombre_transporte`, `ruta_transporte`, `horario_transporte`, `precio_transporte`) VALUES
(1, 2, 'Autobús Sostenible', 'Ruta A - Centro de la Ciudad a la Zona Verde', '06:00 - 18:00', 0.50),
(2, 3, 'Carro Eléctrico Compartido', 'Ruta B - Estación Central a la Playa', '08:00 - 20:00', 5.00),
(3, 4, 'Bicicleta Comunitaria', 'Ruta C - Parque Central a la Universidad', 'Todo el día', 0.00),
(4, 5, 'Tren Solar', 'Ruta D - Suburbio al Centro de la Ciudad', '07:00 - 19:00', 1.00),
(5, 2, 'Autobús de Biodiésel', 'Ruta E - Zona Rural a la Plaza Principal', '05:00 - 17:00', 0.75);

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `apellido_usuario` varchar(100) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `contrasenia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `usuario` (`id_usuario`, `id_rol`, `nombre_usuario`, `apellido_usuario`, `correo`, `contrasenia`) VALUES
(1, 1, 'admin', 'admin', 'admin@vidaazul.com', '$2y$10$gwzUSgtwUeJ.e.8sET9zteU5d04.Igp0b6a7cpBq4tSBYwgOD1A.W'),
(2, 2, 'Sofia', 'Ramirez', 'sofia.ramirez@vidaazul.com', '$2y$10$4YIpnmngYqdD3AplDvsH9O4IFKV.DJmGJV.r.Y97BU61u9ZkUxSsC'),
(3, 3, 'Luis', 'Hernandez', 'luis.hernandez@vidaazul.com', '$2y$10$i2b3SRx3vXawFr8PsWCheuwNQbDTBt8Gu1ueHh9MeE8IqPGlRUffG'),
(4, 4, 'Ana', 'Martinez', 'ana.martinez@vidaazul.com', '$2y$10$lUHo5Ru0EEHD0lIJYh3rnOHTTyYO7i8HZABgC3hMqzF9mMVd9nEby'),
(5, 5, 'Carlos', 'Gonzalez', 'carlos.gonzalez@vidaazul.com', '$2y$10$NQ7rd2mg6NQrB/5IGIO0leEaFkS6Qi3iTjMe4N50zOlLGTWgGy8ce');


ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_usuario` (`id_usuario`);

ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `id_categoria` (`id_categoria`);

ALTER TABLE `expertos`
  ADD PRIMARY KEY (`id_experto`),
  ADD KEY `id_categoria` (`id_categoria`);

ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id_imagen`),
  ADD KEY `id_usuario` (`id_usuario`);

ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`id_proyecto`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_categoria` (`id_categoria`);

ALTER TABLE `proyecto_imagenes`
  ADD PRIMARY KEY (`id_imagen`),
  ADD KEY `id_proyecto` (`id_proyecto`);

ALTER TABLE `recursos`
  ADD PRIMARY KEY (`id_recurso`),
  ADD KEY `id_categoria` (`id_categoria`);

ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

ALTER TABLE `transportes`
  ADD PRIMARY KEY (`id_transporte`),
  ADD KEY `id_usuario` (`id_usuario`);

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);


ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `eventos`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `expertos`
  MODIFY `id_experto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `galeria`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `proyecto`
  MODIFY `id_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `proyecto_imagenes`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

ALTER TABLE `recursos`
  MODIFY `id_recurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `transportes`
  MODIFY `id_transporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;


ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);

ALTER TABLE `expertos`
  ADD CONSTRAINT `expertos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);

ALTER TABLE `recursos`
  ADD CONSTRAINT `recurso_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);

ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

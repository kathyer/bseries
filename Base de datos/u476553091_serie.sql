
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-03-2017 a las 19:33:59
-- Versión del servidor: 10.0.28-MariaDB
-- Versión de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `u476553091_serie`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amistades`
--

CREATE TABLE IF NOT EXISTS `amistades` (
  `id_amistades` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_amigo` int(11) NOT NULL,
  PRIMARY KEY (`id_amistades`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=48 ;

--
-- Volcado de datos para la tabla `amistades`
--

INSERT INTO `amistades` (`id_amistades`, `id_usuario`, `id_amigo`) VALUES
(1, 1, 2),
(3, 2, 1),
(12, 1, 11),
(13, 11, 1),
(14, 12, 13),
(15, 13, 12),
(20, 12, 14),
(21, 14, 12),
(25, 14, 11),
(26, 11, 12),
(27, 12, 11),
(36, 14, 13),
(37, 13, 14),
(38, 1, 14),
(39, 14, 1),
(40, 1, 12),
(41, 12, 1),
(42, 1, 13),
(43, 13, 1),
(44, 17, 18),
(45, 18, 17),
(46, 13, 17),
(47, 17, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amistades_solicitud`
--

CREATE TABLE IF NOT EXISTS `amistades_solicitud` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_usuario_emisor` int(10) unsigned NOT NULL,
  `id_usuario_receptor` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=76 ;

--
-- Volcado de datos para la tabla `amistades_solicitud`
--

INSERT INTO `amistades_solicitud` (`id`, `id_usuario_emisor`, `id_usuario_receptor`) VALUES
(69, 13, 11),
(70, 13, 15),
(72, 17, 14),
(73, 17, 11),
(74, 17, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capitulos`
--

CREATE TABLE IF NOT EXISTS `capitulos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_serie` int(11) unsigned NOT NULL,
  `imagen_capitulo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `titulo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `enlace` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `temporada` int(10) unsigned NOT NULL,
  `numero` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=123 ;

--
-- Volcado de datos para la tabla `capitulos`
--

INSERT INTO `capitulos` (`id`, `id_serie`, `imagen_capitulo`, `titulo`, `enlace`, `descripcion`, `temporada`, `numero`) VALUES
(2, 1, 'jtT1x1.jpg', 'Se acerca el invierno', 'http://www.divxtotal.com/series/juego-de-tronos/', 'El rey Robert Baratheon de Poniente viaja al Norte para ofrecerle a su viejo amigo Ned Stark, Guardián del Norte y Señor de Invernalia, el puesto de Mano del Rey.', 1, 1),
(3, 1, 'jtT1x2.jpg', 'El camino real', 'http://www.divxtotal.com/series/juego-de-tronos/', 'Tras aceptar su nuevo rol como Mano del Rey, Ned parte hacia Desembarco del Rey con sus hijas Sansa y Arya. Jon Nieve, el hijo bastardo de Ned, se dirige al Muro para unirse a la Guardia de la Noche.', 1, 2),
(4, 1, 'jtT1x3.jpg', 'Lord Nieve', 'http://www.divxtotal.com/series/juego-de-tronos/', 'Ned se une al Consejo Privado del Rey en Desembarco del Rey, la capital de los Siete Reinos, y descubre la mala administración que sufre Poniente. Catelyn decide ir de incógnito al sur para alertar a su esposo de los Lannister.', 1, 3),
(5, 1, 'jtT1x4.jpg', 'Tullidos, bastardos y cosas rotas', 'http://www.divxtotal.com/series/juego-de-tronos/', 'Ned busca pistas para tratar de explicar la muerte de Jon Arryn. Robert celebra un torneo en honor a Ned. Jon toma medidas para proteger a Samwell Tarly, otro recluta de la Guardia de la Noche, de los abusos del resto de sus compañeros.', 1, 4),
(6, 1, 'jtT1x5.jpg', 'El lobo y el león', 'http://www.divxtotal.com/series/juego-de-tronos/', 'Robert y Ned discuten sobre cómo deben manejar la alianza entre la familia Targaryen y los dothraki.', 1, 5),
(7, 1, 'jtT2x1.jpg', 'El Norte no olvida', 'http://www.divxtotal.com/series/juego-de-tronos/', 'Tyrion llega para salvar la corona de Joffrey de viejas y nuevas amenazas. Daenerys busca agua y aliados en el Desierto Rojo. Jon Nieve y los miembros de la Guardia de la Noche se enfrentan a los salvajes más allá del Muro. ', 2, 1),
(8, 1, 'jtT2x2.jpg', 'Las tierras de la noche', 'http://www.divxtotal.com/series/juego-de-tronos/', 'Arya comparte un secreto con un recluta familiar. Un explorador regresa para darle noticias inesperadas a Dany. Theon vuelve a casa en las Islas del Hierro y a su familia verdadera. Tyrion imparte justicia y Jon es testigo de un terrible crimen.', 2, 2),
(9, 1, 'jtT2x3.jpg', 'Lo que está muerto no puede morir', 'http://www.divxtotal.com/series/juego-de-tronos/', 'Tyrion desenmascara a un espía. Catelyn conoce a los nuevos reyes. Bran sueña y Theon se ahoga. ', 2, 3),
(10, 1, 'jtT2x4.jpg', 'Jardín de huesos', 'http://www.divxtotal.com/series/juego-de-tronos/', 'Catelyn intenta salvar a los reyes de ellos mismos. Tyrion practica la coerción. Robb conoce a alguien que viene del extranjero fuera de las puertas de la salvación. Dany encuentra un aliado. Melisandre arroja una gran nube sobre Bastión de Tormentas.', 2, 4),
(11, 1, 'jtT2x5.jpg', 'El fantasma de Harrenhal', 'http://www.divxtotal.com/series/juego-de-tronos/', 'La rivalidad entre los Baratheon termina. Tyrion conoce el arma secreta de Cersei. Dany sufre una perdida. Arya cobra una deuda que desconocia tener. Jon y la Guardia de la Noche encuentran una fortaleza antigua y conocen una leyenda. ', 2, 5),
(12, 2, 'bbT1x1.jpg', 'Piloto', 'http://www.divxtotal.com/series/breaking-bad/', 'Walter y Jesse se dan cuenta de que uno de los dos hombres que tenían en la SUV no está muerto,', 1, 1),
(13, 2, 'bbT1x2.jpg', 'El gato está en la bolsa...', 'http://www.divxtotal.com/series/breaking-bad/', 'Walter y Jesse se dan cuenta de que uno de los dos hombres que tenían en la SUV no está muerto', 1, 2),
(14, 2, 'bbT1x3.jpg', 'Y la bolsa está en el río', 'http://www.divxtotal.com/series/breaking-bad/', 'Walter no puede decidir si matar o no a Krazy-8. Mientras tanto, Skyler le pregunta a Marie si alguna vez fumó marihuana. Skyler le dice a Hank que se lleve a Walter Jr. a algún lugar para asustarlo y hacerle ver que fumar marihuana no es bueno.', 1, 3),
(15, 2, 'bbT1x4.jpg', 'El hombre del cáncer', 'http://www.divxtotal.com/series/breaking-bad/', 'Hank comienza a buscar al nuevo productor de drogas de la ciudad por todos lados. Walter le dice a sus familiares que tiene cáncer. Jesse va a visitar a su familia, y después de pasar un tiempo por ahí, ', 1, 4),
(16, 3, 'wdT1x1.jpg', 'Days Gone Bye', 'http://www.divxtotal.com/series/the-walking-dead/', 'Después de sufrir un terrible accidente automovilístico, una mujer llamada Hannah se despierta con heridas menores y presa del pánico comienza una búsqueda por sus hijos que viajaban con ella.', 1, 1),
(17, 3, 'wdT1x2.jpg', 'Guts', 'http://www.divxtotal.com/series/the-walking-dead/', 'Después de sufrir un terrible accidente automovilístico, una mujer llamada Hannah se despierta con heridas menores y presa del pánico comienza una búsqueda por sus hijos que viajaban con ella.', 1, 2),
(18, 3, 'wdT1x3.jpg', 'Tell It to the Frogs', 'http://www.divxtotal.com/series/the-walking-dead/', 'Después de sufrir un terrible accidente automovilístico, una mujer llamada Hannah se despierta con heridas menores y presa del pánico comienza una búsqueda por sus hijos que viajaban con ella', 1, 3),
(19, 3, 'wdT1x4.jpg', 'Vatos', 'http://www.divxtotal.com/series/the-walking-dead/', 'Después de sufrir un terrible accidente automovilístico, una mujer llamada Hannah se despierta con heridas menores y presa del pánico comienza una búsqueda por sus hijos que viajaban con ella', 1, 4),
(20, 3, 'wdT2x1.jpg', 'What Lies Ahead', 'http://www.divxtotal.com/series/the-walking-dead/', 'Después de sufrir un terrible accidente automovilístico, una mujer llamada Hannah se despierta con heridas menores y presa del pánico comienza una búsqueda por sus hijos que viajaban con ella', 2, 1),
(21, 3, 'wdT2x2.jpg', 'Bloodletting', 'http://www.divxtotal.com/series/the-walking-dead/', 'Después de sufrir un terrible accidente automovilístico, una mujer llamada Hannah se despierta con heridas menores y presa del pánico comienza una búsqueda por sus hijos que viajaban con ella', 2, 2),
(22, 3, 'wdT2x3.jpg', 'Save the Last One', 'http://www.divxtotal.com/series/the-walking-dead/', 'Después de sufrir un terrible accidente automovilístico, una mujer llamada Hannah se despierta con heridas menores y presa del pánico comienza una búsqueda por sus hijos que viajaban con ella.', 2, 3),
(23, 3, 'wdT2x4.jpg', 'Cherokee Rose', 'http://www.divxtotal.com/series/the-walking-dead/', 'Después de sufrir un terrible accidente automovilístico, una mujer llamada Hannah se despierta con heridas menores y presa del pánico comienza una búsqueda por sus hijos que viajaban con ella.', 2, 4),
(24, 4, 'btT1x1.jpg', 'The Big Bran Hypothesis ', 'http://www.divxtotal.com/series/the-big-bang-theory/', 'Leonard y Sheldon descubren el gran desorden que tiene Penny en su habitación, para desconcierto de Sheldon que esta acostumbrado a ordenar todo lo que este a su alrededor', 1, 1),
(25, 4, 'btT1x2.jpg', 'The Fuzzy Boots Corollary', 'http://www.divxtotal.com/series/the-big-bang-theory/', 'Leonard se deprime luego de ver a Penny besar a otro hombre y decide terminar de soñar con ella, ser más realista e ir tras alguien que este a su propia velocidad.', 1, 2),
(26, 4, 'btT1x3.jpg', 'The Luminous Fish Effect', 'http://www.divxtotal.com/series/the-big-bang-theory/', 'Sheldon pierde su empleo tras haber insultado a su nuevo jefe de departamento de Física y con tanto tiempo libre comienza a hacer diversos experimentos sin salir de casa.', 1, 3),
(27, 4, 'btT1x4.jpg', 'The Hamburger Postulate', 'http://www.divxtotal.com/series/the-big-bang-theory/', 'Leonard hace suposiciones acerca de los sentimientos de él y Penny, pero cuando Leslie Winkle lo invita a tener sexo con ella, concluye de que no le debe importar lo que piense Penny.', 1, 4),
(28, 4, 'btT1x5.jpg', 'The Middle Earth Paradigm', 'http://www.divxtotal.com/series/the-big-bang-theory/', 'Penny invita a los muchachos a una fiesta de disfraces. Leonard encuentra este medio como una oportunidad para que Penny lo viera en el contexto de su grupo social.', 1, 5),
(29, 5, 'vkT1x1.jpg', 'Ritos iniciáticos', 'http://www.divxtotal.com/series/vikings/', ' En plena batalla, Ragnar tiene visiones del dios Odín y sus valquirias. De regreso a casa, y contra la opinión de su mujer, Ladgerda, decide llevar a su hijo Bjorn a Kattegat donde el joven realizará su rito de iniciación.', 1, 1),
(30, 5, 'vkT1x2.jpg', 'La ira de los nórdicos', 'http://www.divxtotal.com/series/vikings/', 'Tras reunir un grupo de voluntarios, Ragnar, Rollo y Floki se echan a la mar hacia las tierras del oeste. Lagerda también quería participar en la expedición, pero Ragnar se niega violentamente a ello. ', 1, 2),
(31, 5, 'vkT1x3.jpg', 'Despojados', 'http://www.divxtotal.com/series/vikings/', 'La expedición de Ragnar regresa triunfal a Kattegat, pero allí las fuerzas del conde les despojan del botín, permitiéndoles sólo escoger una pieza por cada hombre. Ragnar elige a Athelstan y regresa a casa.', 1, 3),
(32, 5, 'vkT1x4.jpg', 'Juicio', 'http://www.divxtotal.com/series/vikings/', 'Los vikingos asaltan un pueblo de Norteumbría causando pocas víctimas, dado que los lugareños están en misa, pero Ladgerda mata a Knut cuando este trata de violarla. Al regresar a la playa, los guerreros ', 1, 4),
(33, 4, 'btT2x1.jpg', 'The Bad Fish Paradigm', 'http://www.divxtotal.com/series/the-big-bang-theory/', 'Penny recurre a Sheldon para confiarle lo terrible que le fue en su primera cita con Leonard. Ahora Sheldon se verá forzado, en contra de todos sus deseos, a guardar un secreto.', 2, 1),
(34, 4, 'btT2x2.jpg', 'The Codpiece Topology', 'http://www.divxtotal.com/series/the-big-bang-theory/', 'Luego de ver a Penny con un nuevo y atractivo chico, Leonard vuelve corriendo a los brazos de una antigua novia y némesis de Sheldon, Leslie Winkle.', 2, 2),
(35, 4, 'btT2x3.jpg', 'The Barbarian Sublimation', 'http://www.divxtotal.com/series/the-big-bang-theory/', 'Inocentemente, Sheldon le enseñó a Penny los placeres de los videojuegos en línea, causando que Penny tenga una adiccion a esta y constantemente recurre a Sheldon en busca de ayuda en el juego.', 2, 3),
(36, 4, 'btT2x4.jpg', 'The Griffin Equivalency', 'http://www.divxtotal.com/series/the-big-bang-theory/', 'Cuando Raj aparece en el artículo "30 personas que ver antes de los 30" de la revista People, su ego se dispara y decide jugárselas a conquistar a Penny, poniendo en riesgo su amistad con Leonard.', 2, 4),
(37, 4, 'btT2x5.jpg', 'The Euclid Alternative', 'http://www.divxtotal.com/series/the-big-bang-theory/', 'Leonard comienza a trabajar por las noches en un experimento porque los láseres que necesita sólo están disponibles en el horario nocturno. Como resultado, Sheldon debe encontrar otra forma de llegar al trabajo.', 2, 5),
(38, 5, 'vkT1x5.jpg', 'La batida', 'http://www.divxtotal.com/series/vikings/', 'Los hombres del conde Haraldson atacan la granja de Ragnar, matando a todo el que se les pone a tiro. ', 1, 5),
(39, 5, 'vkT2x1.jpg', 'Guerra de hermanos', 'http://www.divxtotal.com/series/vikings/', '', 2, 1),
(40, 5, 'vkT2x2.jpg', 'Invasión', 'http://www.divxtotal.com/series/vikings/', 'Han pasado cuatro años de paz desde que Ragnar se convirtió en Earl. Ha llegado el momento de que se produzca una alianza insólita para un objetivo en común: una nueva incursión a Inglaterra. ', 2, 2),
(41, 5, 'vkT2x3.jpg', 'Traición', 'http://www.divxtotal.com/series/vikings/', 'La incursión vikinga a Wessex está en pleno apogeo y el rey Ecbert se encuentra enfrentado a un enemigo diferente. ', 2, 3),
(42, 5, 'vkT2x4.jpg', 'Ojo por ojo', 'http://www.divxtotal.com/series/vikings/', ' La reunión de dos grandes hombres podría allanar el camino para un pacto futuro cuando Ragnar y Ecbert se encuentran cara a cara. ', 2, 4),
(43, 5, 'vkT2x5.jpg', 'Respuestas con sangre', 'http://www.divxtotal.com/series/vikings/', ' Lagertha y Ragnar se unen otra vez y juntos luchan para recuperar Kattegat de las manos de Jarl Borg. ', 2, 5),
(44, 6, 'stT1x1.jpg', 'La desaparición de Will Byers', 'http://www.divxtotal.com/series/stranger-things/', 'El 6 de noviembre de 1983, en el Laboratorio Nacional de Hawkins, oculto bajo la fachada del Departamento de Energía de los Estados Unidos, un científico escapa de algo que le persigue entre las sombras pero,', 1, 1),
(45, 6, 'stT1x2.jpg', 'La loca de la calle Maple ', 'http://www.divxtotal.com/series/stranger-things/', 'Mike, Dustin y Lucas regresan a casa Mike con la chica, donde ella le enseña a Mike un tatuaje en el brazo con el número 011, indicándole así que ese es su nombre. Once reconoce entonces a Will en una foto,', 1, 2),
(46, 6, 'stT1x3.jpg', 'Todo está bien', 'http://www.divxtotal.com/series/stranger-things/', 'Desde el fondo de la piscina, Bárbara mira a su alrededor y ve que el mundo es oscuro y gris, mientras su amiga Nancy se pregunta por el paradero de Barb, a la que no ha vuelto a ver desde la fiesta de la noche anterior.', 1, 3),
(47, 6, 'stT1x4.jpg', 'El cuerpo', 'http://www.divxtotal.com/series/stranger-things/', 'Reunidos en el sótano de la casa de Mike, Once insiste en que Will sigue vivo en un eco oscuro de nuestra dimensión, e intenta demostrarlo estableciendo contacto con él. ', 1, 4),
(48, 6, 'stT1x5.jpg', 'La pulga y el acróbata', 'http://www.divxtotal.com/series/stranger-things/', 'Lonnie, padre de Jonathan y Will, regresa a la ciudad para el entierro de su hijo, mientras Joyce insiste, pese a las evidencias, que el cadáver que rescataron del lago no es el de su hijo.', 1, 5),
(49, 6, 'stT1x6.jpg', 'El monstruo', 'http://www.divxtotal.com/series/stranger-things/', 'Tras escapar del portal, Jonathan acompaña a Nancy hasta su casa, donde son sorprendidos por Steve, el novio de la chica. Pese a todo, Nancy y Jonathan deciden aprovisionarse de armamento para dar caza al monstruo,', 1, 6),
(50, 6, 'stT1x7.jpg', 'La bañera', 'http://www.divxtotal.com/series/stranger-things/', 'Gracias a la advertencia de Lucas a través del walkie-talkie, Mike, Dustin y Once logran escapar de casa antes de ser sorprendidos por la gente del laboratorio. Mientras tanto, Jonathan y Nancy revelan a Joyce y Hopper', 1, 7),
(51, 6, 'stT1x8.jpg', 'El otro lado', 'http://www.divxtotal.com/series/stranger-things/', 'Joyce y Hopper, que fueron detenidos mientras intentaban ingresar al Laboratorio Hawkins, son interrogados por el Dr. Brenner, quien finalmente negocia con el jefe de policía el dejarlos atravesar el portal,', 1, 8),
(54, 7, 'fT1x1.jpg', 'Space pilot 3000', 'http://www.divxtotal.com/series/futurama/', 'Futurama es una serie televisiva diego animada estadounidense que sigue las aventuras de Philip J. Fry, un repartidor de pizzas que despierta en la Nueva York del siglo XXXI, después de haber sido congelado criogénicamente por accidente durante mil años,', 1, 1),
(55, 7, 'fT1x2.jpg', 'La serie ha aterrizado', 'http://www.divxtotal.com/series/futurama/', 'Futurama es una serie televisiva diego animada estadounidense que sigue las aventuras de Philip J. Fry, un repartidor de pizzas que despierta en la Nueva York del siglo XXXI, después de haber sido congelado criogénicamente por accidente durante mil años,', 1, 2),
(56, 7, 'fT1x3.jpg', 'Yo, compañero de piso', 'http://www.divxtotal.com/series/futurama/', 'Futurama es una serie televisiva diego animada estadounidense que sigue las aventuras de Philip J. Fry, un repartidor de pizzas que despierta en la Nueva York del siglo XXXI, después de haber sido congelado criogénicamente por accidente durante mil años,', 1, 3),
(57, 7, 'fT1x4.jpg', 'Trabajo de amor perdido en el espacio', 'http://www.divxtotal.com/series/futurama/', 'Futurama es una serie televisiva diego animada estadounidense que sigue las aventuras de Philip J. Fry, un repartidor de pizzas que despierta en la Nueva York del siglo XXXI, después de haber sido congelado criogénicamente por accidente durante mil años,', 1, 4),
(58, 7, 'fT1x5.jpg', 'Temor a un planeta robot', 'http://www.divxtotal.com/series/futurama/', 'Futurama es una serie televisiva diego animada estadounidense que sigue las aventuras de Philip J. Fry, un repartidor de pizzas que despierta en la Nueva York del siglo XXXI, después de haber sido congelado criogénicamente por accidente durante mil años,', 1, 5),
(59, 7, 'fT2x1.jpg', 'Yo siento esa moción', 'http://www.divxtotal.com/series/futurama/', 'Futurama es una serie televisiva diego animada estadounidense que sigue las aventuras de Philip J. Fry, un repartidor de pizzas que despierta en la Nueva York del siglo XXXI, después de haber sido congelado criogénicamente por accidente durante mil años,', 2, 1),
(60, 7, 'fT2x2.jpg', 'Brannigan, comienza de nuevo', 'http://www.divxtotal.com/series/futurama/', 'Futurama es una serie televisiva diego animada estadounidense que sigue las aventuras de Philip J. Fry, un repartidor de pizzas que despierta en la Nueva York del siglo XXXI, después de haber sido congelado criogénicamente por accidente durante mil años,', 2, 2),
(61, 7, 'fT2x3.jpg', 'A la cabeza en las encuestas', 'http://www.divxtotal.com/series/futurama/', 'Futurama es una serie televisiva diego animada estadounidense que sigue las aventuras de Philip J. Fry, un repartidor de pizzas que despierta en la Nueva York del siglo XXXI, después de haber sido congelado criogénicamente por accidente durante mil años,', 2, 3),
(62, 7, 'fT2x4.jpg', 'Cuento de navidad', 'http://www.divxtotal.com/series/futurama/', 'Futurama es una serie televisiva diego animada estadounidense que sigue las aventuras de Philip J. Fry, un repartidor de pizzas que despierta en la Nueva York del siglo XXXI, después de haber sido congelado criogénicamente por accidente durante mil años,', 2, 4),
(63, 7, 'fT2x5.jpg', '¿Por qué debo ser un crustáceo enamorado?', 'http://www.divxtotal.com/series/futurama/', 'Futurama es una serie televisiva diego animada estadounidense que sigue las aventuras de Philip J. Fry, un repartidor de pizzas que despierta en la Nueva York del siglo XXXI, después de haber sido congelado criogénicamente por accidente durante mil años,', 2, 5),
(64, 8, 'dbzT1x1.jpg', 'Un misterioso guerrero', 'http://www.divxtotal.com/series/dragon-ball-super/', 'En un periodo de paz luego de los eventos de Dragon Ball Z, Goku se encuentra trabajando haciendo cultivos en la tierra, luego Goten toma su lugar para que su padre pueda entrenar un momento,', 1, 1),
(65, 8, 'dbzT1x2.jpg', 'El pasado de Goku', 'http://www.divxtotal.com/series/dragon-ball-super/', 'En un periodo de paz luego de los eventos de Dragon Ball Z, Goku se encuentra trabajando haciendo cultivos en la tierra, luego Goten toma su lugar para que su padre pueda entrenar un momento,', 1, 2),
(66, 8, 'dbzT1x3.jpg', ' La union de los adversarios', 'http://www.divxtotal.com/series/dragon-ball-super/', 'En un periodo de paz luego de los eventos de Dragon Ball Z, Goku se encuentra trabajando haciendo cultivos en la tierra, luego Goten toma su lugar para que su padre pueda entrenar un momento,', 1, 3),
(67, 8, 'dbzT1x4.jpg', 'El plan de Piccolo', 'http://www.divxtotal.com/series/dragon-ball-super/', 'En un periodo de paz luego de los eventos de Dragon Ball Z, Goku se encuentra trabajando haciendo cultivos en la tierra, luego Goten toma su lugar para que su padre pueda entrenar un momento,', 1, 4),
(68, 8, 'dbzT1x5.jpg', 'El sacrificio de Goku', 'http://www.divxtotal.com/series/dragon-ball-super/', 'En un periodo de paz luego de los eventos de Dragon Ball Z, Goku se encuentra trabajando haciendo cultivos en la tierra, luego Goten toma su lugar para que su padre pueda entrenar un momento,', 1, 5),
(69, 9, 'dcT1x1.jpg', 'Asesinato en la montaña rusa', 'http://allestrenos.com/anime/lista-de-capitulos-detective-conan.html', 'Cuando Ayumi choca sin querer con un hombre, un mapa del tesoro cae en las manos de la Liga Juvenil de Detectives. ¿Qué les ocurrirá a los niños? ', 1, 1),
(70, 9, 'dcT1x2.jpg', 'El secuestro de la hija del presidente', 'http://allestrenos.com/anime/lista-de-capitulos-detective-conan.html', 'Cuando Ayumi choca sin querer con un hombre, un mapa del tesoro cae en las manos de la Liga Juvenil de Detectives. ¿Qué les ocurrirá a los niños? ', 1, 2),
(71, 9, 'dcT1x3.jpg', 'El caso de la habitación cerrada', 'http://allestrenos.com/anime/lista-de-capitulos-detective-conan.html', 'Cuando Ayumi choca sin querer con un hombre, un mapa del tesoro cae en las manos de la Liga Juvenil de Detectives. ¿Qué les ocurrirá a los niños? ', 1, 3),
(72, 9, 'dcT1x4.jpg', 'El pez brillante', 'http://allestrenos.com/anime/lista-de-capitulos-detective-conan.html', 'Cuando Ayumi choca sin querer con un hombre, un mapa del tesoro cae en las manos de la Liga Juvenil de Detectives. ¿Qué les ocurrirá a los niños? ', 1, 4),
(73, 10, 'bmT1x1.jpg', 'El himno nacional', 'http://www.divxtotal.com/series/black-mirror/', 'En un dormitorio, una mujer llamada Victoria Skillane (Lenora Crichlow) se despierta en una silla sin poder recordar nada de su vida.', 1, 1),
(74, 10, 'bmT1x2.jpg', '15 millones de méritos ', 'http://www.divxtotal.com/series/black-mirror/', 'En un dormitorio, una mujer llamada Victoria Skillane (Lenora Crichlow) se despierta en una silla sin poder recordar nada de su vida.', 1, 2),
(75, 10, 'bmT1x3.jpg', 'Tu historia completa', 'http://www.divxtotal.com/series/black-mirror/', 'En un dormitorio, una mujer llamada Victoria Skillane (Lenora Crichlow) se despierta en una silla sin poder recordar nada de su vida.', 1, 3),
(76, 10, 'bmT2x1.jpg', 'Vuelvo enseguida', 'http://www.divxtotal.com/series/black-mirror/', 'En un dormitorio, una mujer llamada Victoria Skillane (Lenora Crichlow) se despierta en una silla sin poder recordar nada de su vida.', 2, 1),
(77, 10, 'bmT2x2.jpg', 'Oso blanco', 'http://www.divxtotal.com/series/black-mirror/', 'En un dormitorio, una mujer llamada Victoria Skillane (Lenora Crichlow) se despierta en una silla sin poder recordar nada de su vida.', 2, 2),
(78, 11, 'dwT1x1.jpg', 'An Unearthly Child', 'http://www.divxtotal.com/series/doctor-who/', 'Paul McGann reapareció como el Octavo Doctor en el minisodio "The Night of the Doctor", escrito por Steven Moffat. En el mismo, una piloto llamada Cass', 1, 1),
(79, 11, 'dwT1x2.jpg', 'The Daleks', 'http://www.divxtotal.com/series/doctor-who/', 'Paul McGann reapareció como el Octavo Doctor en el minisodio "The Night of the Doctor", escrito por Steven Moffat. En el mismo, una piloto llamada Cass', 1, 2),
(80, 11, 'dwT1x3.jpg', 'The Edge of Destruction', 'http://www.divxtotal.com/series/doctor-who/', 'Paul McGann reapareció como el Octavo Doctor en el minisodio "The Night of the Doctor", escrito por Steven Moffat. En el mismo, una piloto llamada Cass', 1, 3),
(81, 11, 'dwT1x4.jpg', 'Marco Polo', 'http://www.divxtotal.com/series/doctor-who/', 'Paul McGann reapareció como el Octavo Doctor en el minisodio "The Night of the Doctor", escrito por Steven Moffat. En el mismo, una piloto llamada Cass', 1, 4),
(82, 11, 'dwT1x5.jpg', 'The Keys of Marinus', 'http://www.divxtotal.com/series/doctor-who/', 'Paul McGann reapareció como el Octavo Doctor en el minisodio "The Night of the Doctor", escrito por Steven Moffat. En el mismo, una piloto llamada Cass', 1, 5),
(83, 11, 'dwT2x1.jpg', 'Planet of Giants', 'http://www.divxtotal.com/series/doctor-who/', 'Paul McGann reapareció como el Octavo Doctor en el minisodio "The Night of the Doctor", escrito por Steven Moffat. En el mismo, una piloto llamada Cass', 2, 1),
(84, 11, 'dwT2x2.jpg', 'The Dalek Invasion of Earth', 'http://www.divxtotal.com/series/doctor-who/', 'Paul McGann reapareció como el Octavo Doctor en el minisodio "The Night of the Doctor", escrito por Steven Moffat. En el mismo, una piloto llamada Cass', 2, 2),
(85, 11, 'dwT2x3.jpg', 'The Rescue', 'http://www.divxtotal.com/series/doctor-who/', 'Paul McGann reapareció como el Octavo Doctor en el minisodio "The Night of the Doctor", escrito por Steven Moffat. En el mismo, una piloto llamada Cass', 2, 3),
(86, 11, 'dwT2x4.jpg', 'The Romans', 'http://www.divxtotal.com/series/doctor-who/', 'Paul McGann reapareció como el Octavo Doctor en el minisodio "The Night of the Doctor", escrito por Steven Moffat. En el mismo, una piloto llamada Cass', 2, 4),
(87, 11, 'dwT2x5.jpg', 'The Web Planet', 'http://www.divxtotal.com/series/doctor-who/', 'Paul McGann reapareció como el Octavo Doctor en el minisodio "The Night of the Doctor", escrito por Steven Moffat. En el mismo, una piloto llamada Cass', 2, 5),
(88, 12, 'dhntT1x1.jpg', 'Renacimiento', 'http://diskokosmiko.mx/anime/death-note-completa-3737-mp4-sub-espanol-2648', 'L descubre cada vez más información sobre Kira, sospechando que puede ser un estudiante, ya que los días y horarios en que sus «victimas» morían coinciden con el tiempo libre de un estudiante. Sin embargo, Light se entera', 1, 1),
(89, 12, 'dhntT1x2.jpg', 'Duelo', 'http://diskokosmiko.mx/anime/death-note-completa-3737-mp4-sub-espanol-2648', 'L descubre cada vez más información sobre Kira, sospechando que puede ser un estudiante, ya que los días y horarios en que sus «victimas» morían coinciden con el tiempo libre de un estudiante. Sin embargo, Light se entera', 1, 2),
(90, 12, 'dhntT1x3.jpg', 'Negociaciones', 'http://diskokosmiko.mx/anime/death-note-completa-3737-mp4-sub-espanol-2648', 'L descubre cada vez más información sobre Kira, sospechando que puede ser un estudiante, ya que los días y horarios en que sus «victimas» morían coinciden con el tiempo libre de un estudiante. Sin embargo, Light se entera', 1, 3),
(91, 12, 'dhntT1x4.jpg', 'Persecución', 'http://diskokosmiko.mx/anime/death-note-completa-3737-mp4-sub-espanol-2648', 'L descubre cada vez más información sobre Kira, sospechando que puede ser un estudiante, ya que los días y horarios en que sus «victimas» morían coinciden con el tiempo libre de un estudiante. Sin embargo, Light se entera', 1, 4),
(92, 12, 'dhntT1x5.jpg', 'Estrategia', 'http://diskokosmiko.mx/anime/death-note-completa-3737-mp4-sub-espanol-2648', 'L descubre cada vez más información sobre Kira, sospechando que puede ser un estudiante, ya que los días y horarios en que sus «victimas» morían coinciden con el tiempo libre de un estudiante. Sin embargo, Light se entera', 1, 5),
(93, 14, 'mrfaT1x1.jpg', 'Pilot ', 'http://www.divxtotal.com/series/modern-family/', 'Claire cree que su familia pasa demasiado tiempo usando dispositivos electrónicos, y quiere que dejen de usarlos durante una semana entera. Los niños inmediatamente protestan y Phil les ofrece un incentivo: el que aguante', 1, 1),
(94, 14, 'mrfaT1x2.jpg', 'The Bicycle Thief ', 'http://www.divxtotal.com/series/modern-family/', 'Claire cree que su familia pasa demasiado tiempo usando dispositivos electrónicos, y quiere que dejen de usarlos durante una semana entera. Los niños inmediatamente protestan y Phil les ofrece un incentivo: el que aguante', 1, 2),
(95, 14, 'mrfaT1x3.jpg', 'Come Fly With Me ', 'http://www.divxtotal.com/series/modern-family/', 'Claire cree que su familia pasa demasiado tiempo usando dispositivos electrónicos, y quiere que dejen de usarlos durante una semana entera. Los niños inmediatamente protestan y Phil les ofrece un incentivo: el que aguante', 1, 3),
(96, 14, 'mrfaT1x4.jpg', 'The Incident ', 'http://www.divxtotal.com/series/modern-family/', 'Claire cree que su familia pasa demasiado tiempo usando dispositivos electrónicos, y quiere que dejen de usarlos durante una semana entera. Los niños inmediatamente protestan y Phil les ofrece un incentivo: el que aguante', 1, 4),
(97, 14, 'mrfaT1x5.jpg', 'Coal Digger ', 'http://www.divxtotal.com/series/modern-family/', 'Claire cree que su familia pasa demasiado tiempo usando dispositivos electrónicos, y quiere que dejen de usarlos durante una semana entera. Los niños inmediatamente protestan y Phil les ofrece un incentivo: el que aguante', 1, 5),
(98, 14, 'mrfaT2x1.jpg', 'The Old Wagon ', 'http://www.divxtotal.com/series/modern-family/', 'Claire cree que su familia pasa demasiado tiempo usando dispositivos electrónicos, y quiere que dejen de usarlos durante una semana entera. Los niños inmediatamente protestan y Phil les ofrece un incentivo: el que aguante', 2, 1),
(99, 14, 'mrfaT2x2.jpg', 'The Kiss ', 'http://www.divxtotal.com/series/modern-family/', 'Claire cree que su familia pasa demasiado tiempo usando dispositivos electrónicos, y quiere que dejen de usarlos durante una semana entera. Los niños inmediatamente protestan y Phil les ofrece un incentivo: el que aguante', 2, 2),
(100, 14, 'mrfaT2x3.jpg', 'Earthquake ', 'http://www.divxtotal.com/series/modern-family/', 'Claire cree que su familia pasa demasiado tiempo usando dispositivos electrónicos, y quiere que dejen de usarlos durante una semana entera. Los niños inmediatamente protestan y Phil les ofrece un incentivo: el que aguante', 2, 3),
(101, 14, 'mrfaT2x4.jpg', 'Strangers on a Treadmill ', 'http://www.divxtotal.com/series/modern-family/', 'Claire cree que su familia pasa demasiado tiempo usando dispositivos electrónicos, y quiere que dejen de usarlos durante una semana entera. Los niños inmediatamente protestan y Phil les ofrece un incentivo: el que aguante', 2, 4),
(102, 14, 'mrfaT2x5.jpg', 'Unplugged ', 'http://www.divxtotal.com/series/modern-family/', 'Claire cree que su familia pasa demasiado tiempo usando dispositivos electrónicos, y quiere que dejen de usarlos durante una semana entera. Los niños inmediatamente protestan y Phil les ofrece un incentivo: el que aguante', 2, 5),
(103, 15, 'momT1x1.jpg', 'Pilot', 'http://www.divxtotal.com/series/mom/', 'Un matón irlandés tiene que protegerse de sus antiguos compañeros que le quieren matar', 1, 1),
(104, 15, 'momT1x2.jpg', 'Ghosts', 'http://www.divxtotal.com/series/mom/', 'Un matón irlandés tiene que protegerse de sus antiguos compañeros que le quieren matar', 1, 2),
(105, 15, 'momT1x3.jpg', 'Misión Creep', 'http://www.divxtotal.com/series/mom/', 'Un matón irlandés tiene que protegerse de sus antiguos compañeros que le quieren matar', 1, 3),
(106, 15, 'momT1x4.jpg', 'Cura Te Ipsum', 'http://www.divxtotal.com/series/mom/', 'Un matón irlandés tiene que protegerse de sus antiguos compañeros que le quieren matar', 1, 4),
(107, 15, 'momT1x5.jpg', 'Judgement', 'http://www.divxtotal.com/series/mom/', 'Un matón irlandés tiene que protegerse de sus antiguos compañeros que le quieren matar', 1, 5),
(108, 15, 'momT2x1.jpg', 'The Contingency', 'http://www.divxtotal.com/series/mom/', 'Un matón irlandés tiene que protegerse de sus antiguos compañeros que le quieren matar', 2, 1),
(109, 15, 'momT2x2.jpg', 'Bad Code', 'http://www.divxtotal.com/series/mom/', 'Un matón irlandés tiene que protegerse de sus antiguos compañeros que le quieren matar', 2, 2),
(110, 15, 'momT2x3.jpg', 'Masquerade', 'http://www.divxtotal.com/series/mom/', 'Un matón irlandés tiene que protegerse de sus antiguos compañeros que le quieren matar', 2, 3),
(111, 15, 'momT2x4.jpg', 'Triggerman', 'http://www.divxtotal.com/series/mom/', 'Un matón irlandés tiene que protegerse de sus antiguos compañeros que le quieren matar', 2, 4),
(112, 15, 'momT2x5.jpg', 'Bury the Ledge', 'http://www.divxtotal.com/series/mom/', 'Un matón irlandés tiene que protegerse de sus antiguos compañeros que le quieren matar', 2, 5),
(113, 16, 'onpicT1x1.jpg', 'El nuevo capítulo comienza!', 'http://www.divxtotal.com/series/one-piece/', 'Zoro se enfrenta a Neptuno, pero lo vence al igual que los guardias, y los ata. Los 3 principes llegan a la puerta del castillo, pero luego de llamar para que les abran, Zoro responde pidiendo que busquen el Sunny Go', 1, 1),
(114, 16, 'onpicT1x2.jpg', 'Una situación explosiva! Luffy Vs. Falso Luffy!»', 'http://www.divxtotal.com/series/one-piece/', 'Zoro se enfrenta a Neptuno, pero lo vence al igual que los guardias, y los ata. Los 3 principes llegan a la puerta del castillo, pero luego de llamar para que les abran, Zoro responde pidiendo que busquen el Sunny Go', 1, 2),
(115, 16, 'onpicT1x3.jpg', 'Los Marine se ponen en movimiento, el blanco es la tripulación Mugiwara!', 'http://www.divxtotal.com/series/one-piece/', 'Zoro se enfrenta a Neptuno, pero lo vence al igual que los guardias, y los ata. Los 3 principes llegan a la puerta del castillo, pero luego de llamar para que les abran, Zoro responde pidiendo que busquen el Sunny Go', 1, 3),
(116, 16, 'onpicT1x4.jpg', 'Concentración masiva, la amenaza de los falsos Mugiwara', 'http://www.divxtotal.com/series/one-piece/', 'Zoro se enfrenta a Neptuno, pero lo vence al igual que los guardias, y los ata. Los 3 principes llegan a la puerta del castillo, pero luego de llamar para que les abran, Zoro responde pidiendo que busquen el Sunny Go', 1, 4),
(117, 16, 'onpicT1x5.jpg', 'La batalla empieza! Los resultados del entrenamiento!', 'http://www.divxtotal.com/series/one-piece/', 'Zoro se enfrenta a Neptuno, pero lo vence al igual que los guardias, y los ata. Los 3 principes llegan a la puerta del castillo, pero luego de llamar para que les abran, Zoro responde pidiendo que busquen el Sunny Go', 1, 5),
(118, 16, 'onpicT2x1.jpg', 'Todos los miembros se reunieron! Luffy zarpa hacia el nuevo mundo!', 'http://www.divxtotal.com/series/one-piece/', 'Zoro se enfrenta a Neptuno, pero lo vence al igual que los guardias, y los ata. Los 3 principes llegan a la puerta del castillo, pero luego de llamar para que les abran, Zoro responde pidiendo que busquen el Sunny Go', 2, 1),
(119, 16, 'onpicT2x2.jpg', 'El Rey de la Isla Gyojin! ¡Neptuno, Dios del mar!', 'http://www.divxtotal.com/series/one-piece/', 'Zoro se enfrenta a Neptuno, pero lo vence al igual que los guardias, y los ata. Los 3 principes llegan a la puerta del castillo, pero luego de llamar para que les abran, Zoro responde pidiendo que busquen el Sunny Go', 2, 2),
(120, 16, 'onpicT2x3.jpg', 'El palacio Ryūgū! Llevados por el tiburón que salvamos', 'http://www.divxtotal.com/series/one-piece/', 'Zoro se enfrenta a Neptuno, pero lo vence al igual que los guardias, y los ata. Los 3 principes llegan a la puerta del castillo, pero luego de llamar para que les abran, Zoro responde pidiendo que busquen el Sunny Go', 2, 3),
(121, 16, 'onpicT2x4.jpg', 'Estado de emergencia! El palacio Ryūgū invadido', 'http://www.divxtotal.com/series/one-piece/', 'Zoro se enfrenta a Neptuno, pero lo vence al igual que los guardias, y los ata. Los 3 principes llegan a la puerta del castillo, pero luego de llamar para que les abran, Zoro responde pidiendo que busquen el Sunny Go', 2, 4),
(122, 16, 'onpicT2x5.jpg', 'El palacio de Ryūgū en conmoción! El secuestro de Shirahoshi', 'http://www.divxtotal.com/series/one-piece/', 'Zoro se enfrenta a Neptuno, pero lo vence al igual que los guardias, y los ata. Los 3 principes llegan a la puerta del castillo, pero luego de llamar para que les abran, Zoro responde pidiendo que busquen el Sunny Go', 2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capitulos_comentarios`
--

CREATE TABLE IF NOT EXISTS `capitulos_comentarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_capitulo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `contenido` varchar(255) NOT NULL,
  `meGusta` int(11) NOT NULL,
  `wtf` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `capitulos_comentarios`
--

INSERT INTO `capitulos_comentarios` (`id`, `id_capitulo`, `id_usuario`, `contenido`, `meGusta`, `wtf`) VALUES
(3, 12, 1, 'hola!', 0, 0),
(4, 2, 13, 'Capitulazo!!!', 0, 1),
(6, 2, 1, 'Me encanta', 0, 1),
(7, 2, 1, 'Me ha sorprendido bastante el final', 0, 1),
(8, 2, 1, 'Me ha sorprendido bastante el final', 0, 0),
(9, 13, 1, 'primero!', 1, 0),
(10, 26, 1, 'Me pone leslie', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capitulos_comentarios_votos`
--

CREATE TABLE IF NOT EXISTS `capitulos_comentarios_votos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_comentario_capitulo` int(10) unsigned NOT NULL,
  `id_usuario` int(10) unsigned NOT NULL,
  `tipoVoto` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `capitulos_comentarios_votos`
--

INSERT INTO `capitulos_comentarios_votos` (`id`, `id_comentario_capitulo`, `id_usuario`, `tipoVoto`) VALUES
(1, 2, 13, 2),
(2, 1, 13, 2),
(12, 4, 1, 1),
(13, 6, 1, 1),
(14, 7, 1, 1),
(16, 10, 1, 2),
(18, 9, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios_muro`
--

CREATE TABLE IF NOT EXISTS `comentarios_muro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `contenido` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `meGusta` int(11) NOT NULL DEFAULT '0',
  `wtf` int(11) NOT NULL DEFAULT '0',
  `spoil` tinyint(4) NOT NULL DEFAULT '0',
  `imagen_comentario` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=50 ;

--
-- Volcado de datos para la tabla `comentarios_muro`
--

INSERT INTO `comentarios_muro` (`id`, `id_usuario`, `contenido`, `fecha`, `meGusta`, `wtf`, `spoil`, `imagen_comentario`) VALUES
(10, 1, 'Jose mola se merece una ola', '2017-03-07 15:07:17', 0, 0, 0, ''),
(13, 0, 'No es lo mismo meterse en las ruinas del machu pichu, que un machu te meta el pichu y te arruine', '2017-03-19 18:57:04', 0, 0, 0, ''),
(22, 1, 'Este soy yo!', '2017-03-17 15:59:46', 0, 0, 0, '4008b3883d923ba97cadd36aa4b57e10.jpg'),
(43, 13, 'No es lo mismo meterse en las ruinas del machu pichu que un machu te meta el pichu y te arruine', '2017-03-22 02:32:20', 0, 1, 0, ''),
(49, 14, 'Nueva temporada de Stranger Things para YA, hombre!! ', '2017-03-22 02:32:16', 1, 0, 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `humor_comentarios`
--

CREATE TABLE IF NOT EXISTS `humor_comentarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `contenido` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_serie` int(11) NOT NULL,
  `meGusta` int(11) NOT NULL DEFAULT '0',
  `wtf` int(11) NOT NULL DEFAULT '0',
  `imagen_comentario` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=41 ;

--
-- Volcado de datos para la tabla `humor_comentarios`
--

INSERT INTO `humor_comentarios` (`id`, `id_usuario`, `contenido`, `fecha`, `id_serie`, `meGusta`, `wtf`, `imagen_comentario`) VALUES
(40, 1, 'Cita rápida:\r\n-¿Stark o Lannister?\r\n-¿De qué hablas?\r\n-¡La cuenta, por favor!', '2017-03-22 03:28:39', 1, 2, 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `humor_votos`
--

CREATE TABLE IF NOT EXISTS `humor_votos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_humor_comentario` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `tipoVoto` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=185 ;

--
-- Volcado de datos para la tabla `humor_votos`
--

INSERT INTO `humor_votos` (`id`, `id_humor_comentario`, `id_usuario`, `tipoVoto`) VALUES
(183, 40, 1, 2),
(184, 40, 13, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion`
--

CREATE TABLE IF NOT EXISTS `informacion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `direccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `informacion`
--

INSERT INTO `informacion` (`id`, `direccion`) VALUES
(1, '192.168.1.44/phpmyadmin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insignias`
--

CREATE TABLE IF NOT EXISTS `insignias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagen_insignia` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `id_serie` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=43 ;

--
-- Volcado de datos para la tabla `insignias`
--

INSERT INTO `insignias` (`id`, `imagen_insignia`, `id_serie`) VALUES
(1, 'insignia_snow.jpg', 1),
(2, 'insignia_khaleesi.jpg', 1),
(3, 'insignia_heinsenberg.png', 2),
(4, 'insignia_areUBseries.png', 0),
(5, 'insignia_bazingaBBT.png', 4),
(6, 'insignia_sheldonAprove.png', 4),
(7, 'insignia_areUSerous.png', 0),
(8, 'insignia_janeMargolis.png', 2),
(9, 'insignia_pennyMoleculas.png', 4),
(10, 'insignia_piedraPapelTijeraLagartoSpock.png', 4),
(11, 'insignia_jesse.png', 2),
(12, 'insignia_logo.png', 4),
(13, 'insignia_skal.png', 5),
(14, 'insignia_son.png', 5),
(15, 'insignia_carl.png', 3),
(16, 'insignia_floki.png', 5),
(17, 'insignia_gleen.png', 3),
(18, 'insignia_negan.jpg', 3),
(19, 'insignia_hospital.png', 3),
(20, 'insignia_lagertha.png', 5),
(21, 'insignia_ragnar.png', 5),
(22, 'insignia_viejoRifle.png', 3),
(23, 'insignia_zombies.png', 3),
(24, 'insignia_belagertha.png', 5),
(25, 'insignia_demogorgon.png', 6),
(28, 'insignia_dustin.png', 6),
(29, 'insignia_eleven.png', 6),
(30, 'insignia_sheriff.png', 6),
(31, 'insignia_pared.png', 6),
(32, 'insignia_should.png', 6),
(33, 'insignia_lannister.png', 1),
(34, 'insignia_stark.png', 1),
(35, 'insignia_targaryen.png', 1),
(36, 'insignia_martell.png', 1),
(37, 'insignia_10.png', 11),
(38, 'insignia_11.png', 11),
(39, 'insignia_banana.png', 11),
(40, 'insignia_spoilers.png', 11),
(42, 'insignia_souffle.png', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
  `id_mensaje` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario_emisor` int(11) NOT NULL,
  `id_usuario_receptor` int(11) NOT NULL,
  `asunto` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `contenido` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `leido` tinyint(1) NOT NULL,
  `solicitud_amistad` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_mensaje`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id_mensaje`, `id_usuario_emisor`, `id_usuario_receptor`, `asunto`, `contenido`, `leido`, `solicitud_amistad`) VALUES
(7, 3, 2, 'fdsfs', 'fdsfds', 0, 0),
(11, 1, 14, 'LOOL', 'Eres una cosa adorable', 1, 0),
(12, 1, 13, 'lololollolol', 'puto!', 1, 0),
(13, 14, 12, 'Holis Jonatan', 'Goku no mola Goku no mola Goku no mola Goku no mola Goku no mola ', 0, 0),
(15, 13, 1, 'Prueba de mensaje', 'Hola! te mando este mensaje para ver si te sale como mensaje recibido automáticamente', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `muro_votos`
--

CREATE TABLE IF NOT EXISTS `muro_votos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_muro_comentario` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `tipoVoto` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Volcado de datos para la tabla `muro_votos`
--

INSERT INTO `muro_votos` (`id`, `id_muro_comentario`, `id_usuario`, `tipoVoto`) VALUES
(28, 48, 13, 2),
(31, 49, 13, 2),
(33, 43, 13, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `series`
--

CREATE TABLE IF NOT EXISTS `series` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_imagen` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nota_media` decimal(11,0) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `reparto` text COLLATE utf8_spanish_ci NOT NULL,
  `director` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `sinopsis` text COLLATE utf8_spanish_ci NOT NULL,
  `temporadas` int(11) NOT NULL,
  `capitulos` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `series`
--

INSERT INTO `series` (`id`, `titulo`, `nombre_imagen`, `nota_media`, `fecha_inicio`, `reparto`, `director`, `sinopsis`, `temporadas`, `capitulos`) VALUES
(1, 'Juego de tronos', 'juegoDeTronos.jpg', '8', '2017-03-07', 'Sean Bean	Eddard «Ned» Stark	\r\nMark Addy	Robert Baratheon	\r\nNikolaj Coster-Waldau	Jaime Lannister	\r\nMichelle Fairley	Catelyn Tully/Stark	\r\nLena Headey	Cersei Lannister	', 'David Benioff y D. B. Weiss', 'Juego de tronos sigue las múltiples líneas argumentales de Canción de hielo y fuego. La mayor parte de la historia tiene lugar en Poniente, un continente ficticio donde las estaciones pueden durar años, y se centra en las violentas luchas dinásticas que surgen entre varias familias nobiliarias por el control del Trono de Hierro.\r\n\r\nLa primera temporada está basada en la primera novela de la saga, Juego de tronos, que además da nombre a la serie. Su trama transcurre quince años después de la guerra civil conocida como la Rebelión de Robert o la Guerra del Usurpador, en la que Robert Baratheon expulsó del Trono de Hierro a los Targaryen y se proclamó rey de los Siete Reinos de Poniente.\r\n\r\nEddard «Ned» Stark, Señor de Invernalia, se ve obligado a aceptar el cargo de Mano del Rey por temor a rechazar la oferta y que la seguridad de sus hijos se viese afectada y con la intención de descubrir la verdadera razón de la muerte de su predecesor, Jon Arryn de la Casa Arryn. Una vez en Desembarco del Rey, la capital de los Siete Reinos, Ned se verá envuelto en una enrevesada trama de secretos. Mientras tanto, al otro lado del mar, el heredero al trono exiliado Viserys Targaryen casa a su hermana Daenerys con el líder de los Dothraki, Khal Drogo, para formar una alianza que le permita recuperar el Trono de Hierro.\r\n\r\nEn el norte, como tercer hilo argumental, un inmenso muro custodiado por la Guardia de la Noche separa el continente de Poniente de los territorios del exterior, en los cuales se empiezan a suceder una serie de extraños acontecimientos, acrecentados por la llegada del invierno.', 6, 45),
(2, 'Breaking Bad', 'BreakingBad.jpg', '7', '2017-03-16', 'Bryan Cranston, Aaron Paul, Anna Gunn, RJ Mitte y Dean Norris', 'Stewart A. Lyons', 'Walter White (Bryan Cranston) es un frustrado profesor de química en un instituto, padre de un joven discapacitado y con una mujer (Anna Gunn) embarazada. Walt, además, trabaja en un lavadero de coches por las tardes. Cuando le diagnostican un cáncer pulmonar terminal se plantea qué pasará con su familia cuando él muera. En una redada de la DEA organizada por Hank Schrader, su cuñado (Dean Norris), reconoce a un antiguo alumno suyo, Jesse Pinkman (Aaron Paul), a quien contacta para fabricar y vender metanfetamina y así asegurar el bienestar económico de su familia. Pero el acercamiento al mundo de las drogas y el trato con traficantes y mafiosos contamina la personalidad de Walter, el cual va abandonando poco a poco su personalidad recta y predecible para convertirse en alguien sin demasiados escrúpulos cuando se trata de conseguir lo que quiere.', 7, 76),
(3, 'The Walking Dead', 'TWD.jpg', '6', '2017-03-01', 'Andrew Lincoln, Jon Bernthal, Sarah Wayne Callies, Laurie Holden y Jeffrey DeMunn', 'Jolly Dale', 'Tras despertar de un coma en un hospital abandonado, el oficial de policía Rick Grimes (Andrew Lincoln) se da cuenta de que el mundo que conocía ya no existe y de que el caos se ha apoderado de la ciudad debido a que inexplicablemente los muertos caminantes dominan las calles. A las afueras de Atlanta, un pequeño campamento lucha por sobrevivir mientras los muertos-vivientes los acechan a cada momento.16 Dicho grupo, guiado por Shane Walsh (Jon Bernthal), pasa a ser liderado por Rick, a quien encuentran después de haberlo dado por muerto. Este último anteriormente había encontrado en Atlanta a un grupo pequeño que ha ido a la ciudad a buscar víveres. Mientras su situación se vuelve más y más sombría, la desesperación del grupo por sobrevivir les obliga a hacer cosas que en su vida anterior a la plaga caminantes no se habrían imaginado hacer jamás.', 6, 60),
(4, 'The Big Bang Theory', 'bigbang.jpg', '2', '2017-03-01', 'Johnny Galecki, Jim Parsons, Kaley Cuoco, Kunal Nayyar y Simon Helberg', 'Steve Molaro', 'La serie comienza con la llegada de Penny, aspirante a actriz, al apartamento vecino, que comparten Sheldon y Leonard, dos físicos que trabajan en el Instituto Tecnológico de California (Caltech). Leonard se enamora desde el primer momento de Penny.\r\n\r\nLeonard y Sheldon son estudiantes destacados en Caltech , amigos a su vez de Howard y Raj, que son presentados como unos completos geeks, alejados de las inquietudes y problemas de la gente común. En el curso de la serie se muestra la dificultad de los protagonistas masculinos para relacionarse con personas de fuera de su entorno, principalmente de sexo femenino, dando lugar a situaciones cómicas.\r\n\r\nLa serie contiene una gran cantidad de situaciones muy cómicas y referencias a principios y teorías físicas auténticas, aunque simplificados al máximo para poder ser entendidos rápidamente por la audiencia que no posea estudios en física, matemáticas o ingeniería. También aparecen referencias cómicas a series de culto (Star Trek, X-Files, Firefly, Doctor Who, Liga de la Justicia, Star Wars, Stargate, X-Men, Juego de tronos, Battlestar Galactica, The Walking Dead, o Babylon 5), videoconsolas y videojuegos (PS3, PS4, Wii, Xbox, Xbox One, Nintendo DS, PSP, Gameboy, Nintendo 64; Halo, Rock Band, World of Warcraft, Age of Conan, Super Mario 64, Red Dead Redemption o Grand Theft Auto), cómics de DC (Batman, Superman, Flash, Aquaman, Linterna Verde, Mujer Maravilla y Watchmen) y de Marvel (Hulk, Wolverine, Thor, Iron Man, Daredevil y Spider-Man), Sistemas Operativos (Windows 98, Windows Vista, Windows 7, Linux o incluso a Ubuntu como tal), redes sociales e internet (Facebook, MySpace, Twitter, YouTube) y juegos de rol (como Dungeons and Dragons).', 8, 100),
(5, 'Vikingos', 'vikings.jpg', '8', '2017-03-16', 'Travis Fimmel, Katheryn Winnick, Clive Standen, Gustaf Skarsgård, Alexander Ludwig, Ben Robson, Alyssa Sutherland, Maude Hirst ', 'Michael Hirst', 'Vikings está basada en las leyendas sobre el vikingo Ragnar Lodbrok, uno de los héroes más famosos de la cultura nórdica que saqueó Northumbria, Francia y Bretaña. La serie retrata a Lodbrok como guerrero curioso y navegante, tecnológicamente innovador, ambicioso y rebelde, que hace construir un barco a su amigo Floki, para lanzarse a explorar los territorios al oeste de Escandinavia desobedeciendo al jefe tribal, el conde Haraldson, que ordena viajar hacia el este (orientación cardinal en la que se especulaba con gran riqueza en aquella época), como todos los años sucedía.', 4, 50),
(6, 'Stranger Things', 'strangerThings.jpg', '9', '2017-03-03', 'Winona Ryder, David Harbour, Finn Wolfhard , Millie Bobby Brown y Gaten Matarazzo', 'Matt Duffer', 'La historia arranca el 6 de noviembre de 1983, en la ciudad de Hawkins, Indiana, cuando Will Byers, de 12 años de edad, tras pasar el día jugando con sus amigos a Dungeons & Dragons, desaparece misteriosamente al regresar a casa. Su madre, Joyce, desesperada, comienza la búsqueda de Will, mientras el jefe de policía Hopper comienza a investigar por su cuenta. Poco después de la desaparición de Will, una misteriosa niña con extrañas habilidades aparece en una hamburguesería de la localidad. Pero, en el desarrollo de la investigación descubrirán que no solo tendrán que enfrentarse a una misteriosa organización del gobierno, sino a siniestras fuerzas que planean devorarlos a todos.', 1, 8),
(7, 'Futurama', 'futurama.jpg', '9', '1997-05-08', 'Billy West, Katey Sagal, John DiMaggio, Billy West', 'Matt Groening', 'Futurama es otra de las producciones animadas del padre de Los Simpsons, Matt Groening. Ambientada en la ciudad de Nueva York del año 3000, la historia gira sobre Fry, un repartidor de pizzas bastante descontento con su vida que se congela accidentalmente el 31 de diciembre de 1999 y se despierta mil años después, época en la que trabajará en un futurista servicio que realiza repartos por los cinco cuadrantes del universo. Junto a Fry está una sexy alienígena que tiene un ojo en la frente, Leela; un robot con vicios humanos, Bender; el heróico Zapp; y el feroz Nibbler.', 7, 140),
(8, 'Dragon Ball Z', 'dragonball.jpg', '10', '1989-04-26', 'Masako Nozawa, Jōji Yanami, Mayumi Tanaka', 'Tadayoshi Yamamuro', 'Tras la muerte de Freezer y su padre King Cold, Sórbet, el primer oficial de la tercera región estelar, queda a cargo del ejército de Freezer. Un día decide ir a la Tierra para resucitar a Freezer y elige al soldado Tagoma para que lo acompañe. Estos le arrebatan las Bolas del Dragón a Pílaf y su banda, invocando a Shenlong y le pide que resucite al Emperador Freezer. Su deseo se cumple y este sale del capullo que lo tenían los Ángeles del infierno y cae en la Tierra partido en pedazos. Sorbet y Tagoma toman los pedazos de su jefe y los llevan a la nave para ponerlos en una cámara de avivamiento y se van del planeta. Freezer mientras se regenera, comienza a recordar su derrota ante Goku y Trunks del Futuro, hasta que despierta totalmente restaurado. Sórbet le dice que Goku se ha vuelto tan fuerte que fue capaz de derrotar a Majin Boo. Freezer se sorprende, pero revela que todavía tiene un gran poder oculto y que entrenando durante 4 meses, podría sacarlo para así poder vengarse de los 2 Super Saiyajin que lo derrotaron. Luego de 4 meses, Freezer invade la Tierra con su nuevo ejército de alrededor de 1.000 soldados y luchan contra los Guerreros Z. Freezer les dice que gracias a su entrenamiento ha logrado alcanzar una gran evolución (llamada Golden Freezer por el mismo) Pero además , Goku y Vegeta han alcanzado una nueva transformación gracias al entrenamiento de Wiss', 1, 291),
(9, 'Detective Conan', 'DetectiveConan.jpg', '7', '1996-01-06', 'Kudō Shinichi, Mōri Ran, Mōri Kogorō, Haibara Ai', 'Kenji Kodama', 'La historia se centra en Shinichi Kudo, un famoso joven detective que es envenenado por unos hombres vestidos de negro, pero en vez de morir encoge hasta tomar el aspecto de un niño. Tras esto, Shinichi, decide cambiarse el nombre por Conan Edogawa para proteger a los suyos, obtener suficientes pruebas para detener a la organización y encontrar una cura para volver a su tamaño normal1 2 3 4 .\r\n\r\nEn España, la serie ha sido doblada al castellano hasta el episodio 376 y fue emitida, principalmente en Cartoon Network, Canal 2 Andalucía y K30 TV, estrenada en el año 2000. Tan solo se han emitido los primeros 350 episodios.\r\n\r\nEn mayor parte de Hispanoamérica se emitió la primera tanda de 65 episodios, Chile corrió con mejor suerte ya que en un comienzo se emitió la primera tanda de 65 episodios, de la mano de La RED, posteriormente en Chilevisión y Etc TV se emitieron los primeros 123 episodios, los que fueron estrenados entre el año 1999 y 2006. Finalmente el canal chileno privado Etc TV, de la mano de AEDEA STUDIO, ha estrenado los episodios desde el 124 al 152 en el año 20145 6 , desde el 153 al 193 en el año 20157 8 , y desde el 194 al 237 en el año 20169 10 . Actualmente se siguen doblando nuevos episodios, los cuales serán estrenados durante el transcurso del 2017.', 25, 35),
(10, 'Black Mirror', 'blackMirror.jpg', '8', '2015-08-13', 'Hayley Atwell, Rafe Spall, Jon Hamm, Hannah John-Kamen', 'Otto Bathurst', 'Black Mirror es la serie de televisión británica creada por Charlie Brooker y producida por Zeppotron para Endemol. La serie gira en torno a cómo la tecnología afecta nuestras vidas, en ocasiones sacando lo peor de nosotros; Brooker ha señalado que «cada episodio tiene un tono diferente, un entorno diferente, incluso una realidad diferente, pero todos son acerca de la forma en que vivimos ahora y la forma en que podríamos estar viviendo en 10 minutos si somos torpes».1\r\n\r\nUn comunicado de prensa de Endemol describe la serie como «un híbrido de The Twilight Zone y Tales of the Unexpected que se nutre de nuestro malestar contemporáneo sobre nuestro mundo moderno», con historias que tienen un sentimiento de «tecno-paranoia».2 Channel 4 describe el primer episodio como «una parábola retorcida en la era de Twitter».3 La serie se lanzó en DVD el 27 de febrero de 2012.4\r\n\r\nEn noviembre de 2012, Black Mirror ganó el Premio Emmy Internacional en la categoría de mejor película para televisión / miniserie', 3, 13),
(11, 'Doctor Who', 'doctorWho.jpg', '9', '2005-06-15', 'William Hartnell, Patrick Troughton, Jon Pertwee, Tom Baker', 'Steven Moffat', 'La historia comienza en Londres, en el año 1963. Dos profesores del instituto Coal Hill, Ian Chesterton y Barbara Wright, están extrañados por el comportamiento de una alumna común, Susan Foreman, que parece mostrar conocimientos más allá de los que una chica de 15 años como ella debería tener, a la vez que muestra una extraña torpeza absoluta en otras materias que contrasta con esas aparentes dotes intelectuales que posee. Susan, que vive con su abuelo, se niega a que su profesora la visite en su casa para hablar con él, ya que su abuelo no soporta a los extraños, y cuando Barbara intentó ir por su cuenta a la dirección, allí sólo había un viejo depósito de chatarra. Así pues, Ian y Barbara deciden una tarde seguir a Susan a la salida del instituto, observando que entra en el depósito y no sale. Preocupados, entran tras ella y no la encuentran. En su lugar, entre multitud de trastos viejos, sólo encuentran una cabina de policía, lo que les extraña, ya que estas cabinas suelen estar en la calle y no dentro de edificios.\r\n\r\nEntonces irrumpe un anciano en el lugar, y cuando le preguntan sobre Susan, él contesta con evasivas. Al oír a Susan dentro de la cabina, irrumpen dentro de ella, y descubren que se trata de una especie de nave espacial, muchísimo más grande por dentro que por fuera. El anciano, únicamente conocido como el Doctor, resulta ser el abuelo de Susan, y revela que su nieta y él son alienígenas de otro mundo y otro tiempo y que hace tiempo huyeron de su planeta en esa nave, la TARDIS (siglas de "Time And Relative Dimension In Space", "Tiempo y dimensión relativas en el espacio"), capaz de viajar en el espacio y el tiempo, aunque tenían la intención de regresar algún día. Al no poder dejar marchar a Ian y Barbara por miedo a que revelen a la gente el secreto de la TARDIS, el Doctor decide despegar, llevándoselos secuestrados. El dispositivo de dirección de la TARDIS está estropeado, por lo que el Doctor no puede controlar el lugar ni la época en que aterrizarán, así que no puede devolver a Ian y Barbara a su época por más que quiera, y debe conformarse con ir saltando aleatoriamente de un destino a otro esperando tener suerte de aterrizar de nuevo en la Tierra del siglo XX algún día. Es así como arranca una serie de viajes en el espacio y el tiempo en la cual el Doctor y sus acompañantes visitan distintas épocas pasadas, presentes y futuras de la Tierra y de otros mundos, viviendo muchas aventuras, y conociendo a múltiples aliados y enemigos.', 10, 200),
(12, 'Death Note', 'deathNote.jpg', '10', '2003-12-17', 'Yagami Raito, Eru Rōraito, Amane Misa, Mero', 'Tetsurō Araki', 'La historia es protagonizada por Light Yagami, un estudiante sobresaliente de Japón que tiene una perspectiva «aburrida» de la vida y quien considera el mundo como un lugar «podrido». Un día, su vida sufre un cambio radical, cuando encuentra un extraño cuaderno sobrenatural llamado «Death Note», tendido en el suelo.6 Detrás de la portada de dicho cuaderno había instrucciones sobre su uso, donde decía que si se escribía el nombre de una persona y se visualizaba mentalmente el rostro de ésta, moriría de un ataque al corazón.23 Al principio, Light desconfiaba de la autenticidad del cuaderno, pero luego de probarlo en dos ocasiones, se da cuenta que su poder era real.23 Después de cinco días, recibe la visita del verdadero dueño del Death Note, un shinigami llamado Ryuk, que le cuenta que había dejado caer el Death Note a la Tierra porque se encontraba aburrido,7 y a su vez Light le cuenta que su objetivo era matar a todos los criminales, para así limpiar al mundo de la maldad; Ryuk le dice que si lo logra se volverá la última persona malvada, a lo que Light responde que solo es un humano modelo que va a convertirse en el «dios del nuevo mundo».7 Más tarde, el número inexplicable de muertes de criminales llama la atención del FBI y la de un famoso detective privado conocido como «L».24 L deduce rápidamente que el asesino en serie —apodado por el público como «Kira» (キラ? derivado de la típica pronunciación japonesa de la palabra inglesa «killer», lit. «asesino»)— se encontraba en Japón. Asimismo, se da cuenta que Kira podía matar a las personas sin necesidad de poner un dedo sobre ellas. Light descubre que L será uno de sus mayores rivales, y se producirá un juego psicológico entre ambos.', 1, 36),
(14, 'Modern Family', 'modernFamily.jpg', '9', '2009-11-23', 'Sofía Vergara, Julie Bowen, Ty Burrell, Jesse Tyler Ferguson', 'Christopher Lloyd', 'Una comedia con formato de falso documental que retrata a una típica (o atípica, según se mire) familia americana. Los protagonistas representan tres estructuras familiares muy diferentes: la familia convencional, la pareja homosexual y el hombre maduro casado con una mujer mucho más joven.', 8, 183),
(15, 'Mom', 'mom.jpg', '8', '2013-09-23', 'Anna Faris, Allison Janney, Sadie Calvano, Nate Corddry', 'Chuck Lorre', 'Christy (Anna Faris) es una madre soltera que, después de lidiar contra el alcoholismo y la adicción a las drogas, decide reiniciar su vida trabajando como camarera y asistiendo a reuniones de Alcohólicos Anónimos. Su madre Bonnie (Allison Janney) también es una adicta a las drogas y el alcohol en recuperación. Por otro lado, a sus 17 años de edad su hija Violet (Sadie Calvano), que nació cuando Christy también tenía 17 años, ha quedado embarazada de su novio Luke. Christy también tiene un hijo menor, Roscoe, hijo de su ex marido Baxter.', 3, 66),
(16, 'One Piece', 'onePiece.jpg', '10', '1999-01-14', 'Mayumi Tanaka, Kazuya Nakai, Akemi Okamura, Kappei Yamaguchi', 'Kōnosuke Uda', 'La serie comienza con la ejecución de Gol D. Roger, un hombre conocido como el Rey de los Piratas (海賊王 Kaizokuō?). Poco antes de su muerte, Roger hace mención a su gran tesoro legendario, el «One Piece» (ワンピース『ひとつなぎの大秘宝』 Wan Pīsu?), y a que puede ser tomado por todo aquél que lo desee. Ésto marca el inicio de una era conocida como la Gran Era Pirata (大海賊時代 Daikaizokujidai?). Como resultado, un sinnúmero de piratas zarparon hacia Grand Line con el objetivo de encontrarlo.9\r\nVeintidós años después de la muerte de Roger, un joven llamado Monkey D. Luffy, inspirado por la admiración que desde su infancia le tiene al poderoso pirata Shanks «el Pelirrojo»,9 comienza su aventura desde su hogar en el East Blue para encontrar el One Piece y autoproclamarse como el nuevo Rey de los Piratas. Con el fin de crear y convertirse en el capitán de una tripulación propia, el muchacho funda la banda de los Sombreros de Paja (麦わら海賊団篇 Mugiwara Kaizoku-dan?), siendo el espadachín Roronoa Zoro el primer nakamaNota 1 10 que Luffy rescata y alista,9 lo que permite que ambos continúen emprendiendo su viaje hacia el tesoro. Poco después, Nami, una navegante ladrona,11 Usopp, un francotirador mentiroso,12 y Sanji, un cocinero mujeriego se les únen en sus travesías,13 además de conseguir un barco llamado Going Merry. En sus viajes, la tripulación se enfrenta a varios enemigos poderosos como Buggy el Payaso,14 el capitán Kuro15 y Don Krieg.16 Después, el protagonista combate contra el temible gyojin Arlong,17 antiguo tripulante de los Piratas del Sol, quien piensa que los humanos son inferiores a los de su especie. El capitán de los Sombreros de Paja logra derrotarlo y Nami es aceptada oficialmente como uno de sus nakamas, además de que la Marina pone precio a la cabeza de éste.17 El grupo logra arribar a Loguetown, un pueblo porteño, y Luffy conoce a un oficial de la Marina llamado Smoker, el cual posee la habilidad de transformarse en humo, y logra capturarlo, pero es detenido por Monkey D. Dragon, el padre de Luffy, aunque él no lo reconoce.18 Después de llegar finalmente a Grand Line, el grupo conoce a Nefeltari Vivi, una princesa que desea salvar su país, el Reino de Alabasta, de manos de una peligrosa organización criminal llamada Baroque Works.19 Durante su trayecto hacia Alabasta, los piratas encabezan una revuelta la isla de Drum, donde los Sombreros de Paja invitan a un reno antropomórfico médico llamado Tony Tony Chopper a unírseles al grupo, y éste acepta.', 23, 778);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teorias`
--

CREATE TABLE IF NOT EXISTS `teorias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cuerpo` text COLLATE utf8_spanish_ci NOT NULL,
  `id_serie` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `meGusta` int(11) NOT NULL,
  `wtf` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `teorias`
--

INSERT INTO `teorias` (`id`, `titulo`, `cuerpo`, `id_serie`, `id_usuario`, `meGusta`, `wtf`, `fecha`) VALUES
(1, 'Jon Snow es un bastardo', 'Jon Snow es un bastardo. A ver, empezó siendo un bastardo y seguirá siendo un bastardo ¿vale? ni señor de Invernalia, ni rey del Norte ni leches, las cosas como son. Vamos a ver un arco del personaje en el que Jon va a ir escalando hasta conseguir ser alguien y al final PLUUUUUR, va a terminar siendo lo que era antes. Toma plotwist fail :D', 1, 1, 1, 0, '2017-03-17 16:07:55'),
(2, 'Daenerys Targaryen es nieta de sí misma (como Fry)', 'Lo ha dicho Jose, así que debe de ser verdad.', 1, 2, 1, 0, '2017-03-17 16:07:44'),
(3, 'El rey en el Norte va a ser Eneko.', 'En el Norte saben que Eneko es Dios y además es vasco, así que lo nombran master del universo.', 1, 3, 1, 1, '2017-03-21 02:55:59'),
(4, 'TODOS MUEREN', 'Todos. Todos. TODOS. Hasta G.R.R.', 1, 1, 1, 1, '2017-03-19 19:11:20'),
(5, 'Ned Stark vuelve de entre los muertos.', 'Y trae chuches para todos.', 1, 1, 2, 0, '2017-03-17 18:06:49'),
(6, 'Jon Snow sí sabe algo', 'De hecho, es una wikipedia andante, el tío.', 1, 14, 2, 0, '2017-03-21 02:56:01'),
(7, 'La verdad está ahí fuera', 'Mulder y Scully aparecen en Juego de Tronos buscando al Fumador y se encuentran con Varys, que les hace el lío, y les manda a Meeren a liberar esclavos con Daenerys. Mulder, extasiado con encontrar dragones, que él siempre supo que debían existir, rapta a Drogon y se van a dar la vuelta a los Siete Reinos. Fin.', 1, 14, 0, 1, '2017-03-17 19:36:55'),
(8, 'fsdfgsdfgs', 'gfgsgsfgfgf', 1, 14, 0, 0, '2017-03-19 19:18:33'),
(9, 'Walter es ned flanders', 'Me baso en eso por que se parecen mucho muchito vecinito', 2, 13, 1, 0, '2017-03-22 03:26:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teorias_votos`
--

CREATE TABLE IF NOT EXISTS `teorias_votos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_teoria` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `tipoVoto` tinyint(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=49 ;

--
-- Volcado de datos para la tabla `teorias_votos`
--

INSERT INTO `teorias_votos` (`id`, `id_teoria`, `id_usuario`, `tipoVoto`) VALUES
(6, 2, 1, 2),
(7, 1, 1, 2),
(8, 5, 1, 2),
(24, 3, 1, 2),
(25, 4, 1, 1),
(30, 4, 14, 2),
(31, 5, 14, 2),
(32, 6, 14, 2),
(33, 7, 14, 1),
(46, 3, 13, 1),
(47, 6, 13, 2),
(48, 9, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teoria_comentarios`
--

CREATE TABLE IF NOT EXISTS `teoria_comentarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_teoria` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `contenido` varchar(255) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_serie` int(11) NOT NULL,
  `meGusta` tinyint(4) NOT NULL,
  `wtf` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `teoria_comentarios`
--

INSERT INTO `teoria_comentarios` (`id`, `id_usuario`, `id_teoria`, `titulo`, `contenido`, `fecha`, `id_serie`, `meGusta`, `wtf`) VALUES
(1, 14, 1, 'Ni de coña', 'No tienes ni idea, macho.', '2017-03-19 21:26:38', 1, 0, 0),
(2, 13, 6, '', 'Y como puede ser una wikipedia si no existia eh EH!!', '2017-03-21 03:41:28', 0, 1, 0),
(3, 13, 6, '', 'además, el tio es muy ignorante. Pero ya aprenderá...', '2017-03-21 03:41:51', 0, 0, 1),
(4, 14, 6, '', 'Es una snowkipedia, obvio ¬_¬ precursor claro. You know nothing. ', '2017-03-21 15:32:25', 0, 0, 0),
(5, 14, 3, '', 'Pero Eneko no puede ser dios, porque es negro (?)', '2017-03-21 15:43:55', 0, 2, 0),
(6, 13, 3, '', 'Fecundo esa moción angela', '2017-03-21 15:43:54', 0, 0, 0),
(7, 12, 6, '', 'Es obvio que es un bastardo no hay nada mas que verlo', '2017-03-21 16:29:05', 0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teoria_comentarios_votos`
--

CREATE TABLE IF NOT EXISTS `teoria_comentarios_votos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_teoria_comentarios` int(10) unsigned NOT NULL,
  `id_usuario` int(10) unsigned NOT NULL,
  `tipoVoto` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `teoria_comentarios_votos`
--

INSERT INTO `teoria_comentarios_votos` (`id`, `id_teoria_comentarios`, `id_usuario`, `tipoVoto`) VALUES
(7, 2, 13, 2),
(8, 3, 13, 1),
(9, 5, 14, 2),
(10, 5, 13, 2),
(11, 7, 12, 2),
(12, 7, 14, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nick` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `foto_perfil` varchar(255) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'perfil_default.png',
  `nombre_display` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `bio` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `conectado` varchar(30) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'desconectado',
  `admin` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nick`, `correo`, `contrasena`, `foto_perfil`, `nombre_display`, `bio`, `conectado`, `admin`) VALUES
(1, 'eneko', 'eneko@eneko.com', '356a192b7913b04c54574d18c28d46e6395428ab', '9491cc91b26f8acfddfeeda4ac248682.jpg', 'Nko', 'Me pone todo.', 'desconectado', 1),
(11, 'ana', 'ana@ana.com', '72019bbac0b3dac88beac9ddfef0ca808919104f', 'anita.jpg', 'ana', 'wiiiiiiiiiii', 'desconectado', NULL),
(12, 'jonatan', 'jonatan@jonatan.jonatan', '9ee7995f8314a209e3aa1934f5847d5679dce43d', 'goku.png', 'jonatan', '', 'desconectado', NULL),
(13, 'kathyer', 'joseluis_f1@hotmail.com', '4d134bc072212ace2df385dae143139da74ec0ef', '5276edce93f786b814eccf504454aa9f.jpg', 'Jose Luis Martin Ávila', 'programando, como siempre', 'desconectado', NULL),
(14, 'angelasd', 'holis@holis.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '9be846c1699a9a48e8419945e2efcb6d.jpg', 'Ángela', 'Friki del Infierno alone en la vida', 'desconectado', NULL),
(15, 'evampergon', 'dfre@gji.com', '4e657f252c6929f6a9a354ee0e2663b9a1b9735b', 'perfil_default.png', 'Eva', '', 'desconectado', NULL),
(17, 'enekosexy23', 'eneko.diaz.romero@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'f25d977d0548922086c04ca9bde390c2.jpg', 'Eneko', 'Tengo que tengo que tengo de tó', 'desconectado', NULL),
(18, 'Teresa', 'teresa_salm@hotmail.com', '3fcfc1f7f34e78a937e81171ba51dc39538db993', '601f328cd0a453e4009d541c3f234072.jpg', 'Teresa', 'Soy la novia de Eneko!!', 'desconectado', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_insignias`
--

CREATE TABLE IF NOT EXISTS `usuarios_insignias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_insignia` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=38 ;

--
-- Volcado de datos para la tabla `usuarios_insignias`
--

INSERT INTO `usuarios_insignias` (`id`, `id_usuario`, `id_insignia`) VALUES
(1, 1, 1),
(5, 11, 3),
(6, 11, 9),
(7, 11, 15),
(8, 11, 19),
(9, 11, 18),
(10, 11, 10),
(11, 11, 11),
(16, 14, 16),
(17, 14, 24),
(18, 14, 30),
(19, 13, 34),
(20, 13, 1),
(21, 12, 34),
(22, 12, 35),
(23, 12, 17),
(24, 12, 6),
(25, 12, 5),
(26, 14, 42),
(28, 14, 36),
(29, 14, 1),
(30, 14, 38),
(36, 17, 28),
(35, 17, 25),
(37, 17, 31);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_series`
--

CREATE TABLE IF NOT EXISTS `usuario_series` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_serie` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=34 ;

--
-- Volcado de datos para la tabla `usuario_series`
--

INSERT INTO `usuario_series` (`id`, `id_usuario`, `id_serie`) VALUES
(14, 13, 1),
(20, 14, 1),
(21, 14, 5),
(22, 14, 6),
(23, 14, 11),
(24, 14, 12),
(25, 1, 2),
(26, 1, 3),
(27, 1, 4),
(32, 13, 16),
(29, 12, 1),
(30, 12, 3),
(31, 12, 4),
(33, 17, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votos`
--

CREATE TABLE IF NOT EXISTS `votos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_serie` int(11) NOT NULL,
  `nota` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `votos`
--

INSERT INTO `votos` (`id`, `id_usuario`, `id_serie`, `nota`) VALUES
(1, 1, 1, 5),
(2, 2, 1, 9),
(4, 1, 2, 8),
(5, 13, 1, 10),
(6, 1, 12, 8),
(7, 14, 1, 9),
(8, 1, 4, 2),
(11, 13, 3, 6);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

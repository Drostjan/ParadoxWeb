-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-06-2022 a las 21:36:51
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `paradox`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `contra` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(9) NOT NULL,
  `pais` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `apellidos`, `contra`, `correo`, `telefono`, `pais`) VALUES
(1, 'moderador', 'admin', '4be5783513652db197bdbab485abbdc59f439d2e3399cc04c4dd5a412b471425', 'moderador@paradox.com', 696969696, 'España'),
(2, 'aa', 'aa', '1f3ce40415a2081fa3eee75fc39fff8e56c22270d1a978a7249b592dcebd20b4', 'a@a.a', 666666666, 'España');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `usuario` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `direccion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `total` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `precio` int(8) NOT NULL,
  `talla` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `stock` int(3) NOT NULL,
  `imagen` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `categoria` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_producto`, `descripcion`, `precio`, `talla`, `stock`, `imagen`, `categoria`) VALUES
(1, 'adidas yeezy 700', 'Modelo inspirado en los tenis de correr con una suela gruesa. También tienen una combinación de materiales en la parte superior, lengüeta/cuello acolchado, amortiguación Boost y una suela de goma.', 379, '43', 4, 'assets/images/adidas_yeezy_700.png', 'calzado'),
(2, 'jordan 1 retro high red', 'Las icónicas Air Jordan 1 mantienen su diseño familiar e impecable, aunque se actualizan para la cultura actual de los amantes de las zapatillas.', 389, '44', 13, 'assets/images/jordan_1_retro_high.png', 'calzado'),
(3, 'camiseta emporio armani', 'Camiseta de fibra natural 95%. Algodón 5% .Con cuello plano, mangas cortas y con banda con logotipo de Core.', 49, 'M', 44, 'assets/images/camiseta_estampada_emporio_armani.png', 'ropa'),
(4, 'camiseta nike retro beige', 'Una explosión visual del estilo del pasado. Las costuras llamativas y las letras vintage Nike añaden un toque retro a esta camiseta de algodón suave.', 29, 'M', 47, 'assets/images/camiseta-nike-retro-beige.png', 'ropa'),
(5, 'cartera lacoste', 'Cartera de piel en color negro. Contiene varios tarjeteros y billetero.', 49, 'X', 24, 'assets/images/cartera_lacoste.png', 'accesorios'),
(6, 'cinturon guess', 'Cinturón de material sintético. Elementos metálicos color oro pálido. Cierre de encastre con logotipo G.', 79, '85', 26, 'assets/images/cinturon_guess.png', 'accesorios'),
(7, 'cinturon guess 2', 'Cinturón de material sintético. Piezas metálicas color dorado. Cierre con hebilla frontal con logo 4G.', 69, '85', 21, 'assets/images/cinturon_guess_2.png', 'accesorios'),
(8, 'dove hoodie gap', 'La sudadera con capucha está confeccionada con un material de algodón negro de doble capa y presenta un logotipo de GAP descolorido en el pecho.', 249, 'M', 20, 'assets/images/dove-hoodie-gap.png', 'ropa'),
(9, 'gap hoodie grey', 'Sudadera de cuello redondo y con capucha. Mangas largas. Tejido suave de felpa. Bolsillo kanga en parte frontal. Diseño con logo estmapado en el centro de la sudadera. Corte regular.', 59, 'L', 37, 'assets/images/gap_gris.png\r\n', 'ropa'),
(10, 'nike legacy 91 cap', 'La gorra Nike Legacy 91 Tech Swoosh fue diseñada pensando en el golfista. Con un clásico pico curvo, orificios de ventilación.', 39, 'Talla única', 28, 'assets/images/gorra_nike_legacy91.png', 'accesorios'),
(11, 'jordan 1 retro high white', 'El primer modelo Jordan 1 inspirado en UNC se remota a 1985 cuando debutaron en el mercado los Jordan 1', 449, '43', 17, 'assets/images/jordan_1_retro_high_white.png', 'calzado'),
(12, 'nike air force 1 low supreme', 'Estos sneakers Air Force 1 Low incorporan un upper de piel con el Supreme Box Logo rojo con suelas y detalles a juego.', 139, '42', 35, 'assets/images/nike_air_force_1_low_supreme.png', 'calzado'),
(13, 'nike blazer low sacai', 'Las nuevas Blazer Low de sacai cuentan con forros de espuma que quedan a la vista, unas lengüetas superpuestas y unos cordones dobles, pero con una nueva estética en blanco y sail.', 129, '42', 29, 'assets/images/nike_blazer_low_sacai.png', 'calzado'),
(14, 'off white industrial belt', 'El Off-White Industrial Belt es probablemente el artículo más reconocido y popular que ha creado la marca en su historia. Este ofrece el color negro completo.', 129, '85', 10, 'assets/images/off-white-industrial-belt.png', 'accesorios'),
(15, 'puma ca pro classic', 'Las zapatillas CA Pro Classic, la nueva incorporación a esta familia del calzado, incorporan todos los elementos clave del diseño emblemático, como las líneas sencillas.', 89, '42', 36, 'assets/images/puma_ca_pro_classic.png', 'calzado'),
(16, 'emporio armani watch', 'Relojes de pulsera fashion Emporio Armani AR2434 para hombre con movimiento cuarzo, con caja de acero inoxidable con diàmetro de 43 mm, con dial negro o y correa en acero inoxidable.', 199, 'X', 30, 'assets/images/reloj_cronógrafo_emporio_armani.png', 'accesorios'),
(17, 'nike hoodie ocean', 'Está confeccionada con una mezcla de algodón y poliéster y presenta un ajuste holgado y cuadrado. Para terminar, el Swoosh está presente, como es habitual, en la zona del pecho.', 119, 'L', 28, 'assets/images/sudadera_nike.png', 'ropa'),
(18, 'nike blvck hoodie', 'La sudadera con capucha oversize Nike Sportswear Collection Essentials ofrece un look informal y seguro.', 99, 'L', 29, 'assets/images/sudadera_over_sized_nike.png', 'ropa'),
(19, 'vans classic old skool', 'Las zapatillas de skate clásicas de Vans y las primeras en llevar la icónica banda lateral.', 79, '43', 40, 'assets/images/vans_classics.png\n', 'calzado'),
(20, 'nike hoodie cloud', 'La sudadera con capucha Nike Sportswear Club es una prenda básica de tu fondo de armario que combina un estilo clásico con la suave comodidad del tejido Fleece.', 39, 'L', 44, 'assets/images/nike_hoodie_cloud.png', 'ropa'),
(21, 'adidas yeezy 500 blush', 'Adidas Yeezy es sinónimo de estilo urbano. Descubre nuestra colección de zapatos de la marca, seguro que encuentras las botas y zapatillas ideales para tus looks.', 269, '44', 13, 'assets/images/adidas-yeezy-500-blush.png', 'calzado'),
(22, 'adidas yeezy boost 350 v2 light', 'Todo el mundo conoce adidas YEEZY por su inimitable estilo urbano, pero su compromiso para conservar los ecosistemas marinos y terrestres también es notable.', 229, '43', 18, 'assets/images/adidas-yeezy-boost-350-v2-light.png', 'calzado'),
(23, 'common projects original achilles white', 'Las zapatillas Original Achilles de Common Projects se han ganado un estatus de culto gracias a su diseño minimalista. Esta versión en blanco es perfecta para crear looks nítidos y elegantes.', 239, '42', 31, 'assets/images/common-projects-original-achilles-white.png', 'calzado'),
(24, 'converse x comme des garcons play black', 'Firmadas por Comme Des Garçons y hechas con lona negra, estas zapatillas altas fueron creadas para que hagas tuyo cualquier estilo y son una reinterpretación de las All Star de Converse.', 129, '43', 27, 'assets/images/converse-x-comme-des-garcons-play-black.png', 'calzado'),
(25, 'drew house mascot ss tee lavender', 'Esta camiseta fue lanzada por Drew House como parte de la entrega del logotipo de la mascota de septiembre de 2021. Presenta el popular logotipo de la mascota de Draw House.', 179, 'M', 23, 'assets/images/drew-house-mascot-ss-tee-lavender.png', 'ropa'),
(26, 'fear of god essentials tee buttercream', 'Esta camiseta Fear of God Essentials es una revisión de la camiseta con el logotipo tradicional. En vez de mostrar el logotipo de Fear of God Essentials en la parte delantera.', 79, 'M', 25, 'assets/images/FEAR-OF-GOD-ESSENTIALS-T-shirt-Cream-Buttercream.png', 'ropa'),
(27, 'jordan 1 retro high mocha', 'Los Jordan 1 High Dark Mocha presenta una base de piel Sail con cuero negro en torno a la puntera y de ante mocha en el talón y el tobillo.', 639, '43', 10, 'assets/images/jordan-1-retro-high-dark-mocha.png', 'calzado'),
(28, 'new balance 57 40 sea salt', 'A pesar de su legado de versatilidad sencilla y sin pretensiones. Fue un diseño único para su época, un diseño híbrido para carretera y trail que no se basaba en características técnicas visibles.', 119, '43', 48, 'assets/images/new-balance-57slash40-sea-salt.png', 'calzado'),
(29, 'nike air max 97 triple white wolf grey', 'Esta edición \"OG\" de Nike Air Max 97 viene en colores blanco, gris lobo y negro. Hecho para conmemorar el 30 Aniversario de la clásica silueta Air Max.', 169, '44', 24, 'assets/images/nike-air-max-97-triple-white-wolf-grey.png', 'calzado'),
(30, 'nike air vapormax plus triple black', 'Está fabricado en neopreno, fiel al icónico aspecto de los Nike Air Max Plus. La longitud de la suela del modelo Air Max se extiende a lo largo de todo el sneaker.', 159, '42', 31, 'assets/images/nike-air-VaporMax-Plus-triple-black.png', 'calzado'),
(31, 'nike blazer mid 77 vintage white', 'En los años 70, las Nike eran las nuevas zapatillas del mercado. Tan nuevas, que aún estábamos presentes en la escena del baloncesto.', 69, '43', 42, 'assets/images/nike-blazer-mid-77-vintage-white.png', 'calzado'),
(32, 'nike sb dunk low polaroid', 'El Polaroid SB Dunk Low cumple cada parte de esa promesa, con un tratamiento tecnicolor que aporta nuevas dimensiones a las líneas clásicas del Dunk.', 159, '43', 20, 'assets/images/nike-SB-dunk-low-polaroid.png', 'calzado'),
(33, 'nike x stussy hoodie volt', 'Está confeccionado con vellón cepillado con bucle en la parte posterior en un ajuste holgado para una comodidad informal para el día a día.', 199, 'L', 27, 'assets/images/Nike-x-Stussy-Washed-Hoodie-Volt.png', 'ropa'),
(34, 'nike x stussy windrunner jacker habanero', 'Cortavientos de peso medio completamente forrado con ajuste estándar. Puños y cintura elásticos con la icónica línea de diseño Nike chevron.', 179, 'M', 29, 'assets/images/Nike-x-Stussy-Windrunner-Jacket-Habanero-Red.png', 'ropa'),
(35, 'nouveaux half zip white', 'Una prenda que tiene una amplia gama de usos, desde jugar al tenis hasta una cena elegante, aportando a tu outfit su toque final.', 59, 'M', 17, 'assets/images/Nouveaux-half-zip-white.png', 'ropa'),
(36, 'nude project bear hoodie', 'Sudadera con capucha de alta calidad confeccionada en jersey de algodón afieltrado grueso marrón con la imagen de un oso en la parte delantera del pecho, una delicada mezcla de elegancia y arte.', 69, 'M', 31, 'assets/images/Nude-project-bear-hoodie.png', 'ropa'),
(37, 'nude project varsity grey', 'Sudadera gris melange con parche icónico de la marca bordado en el pecho. Un clásico con infinitas posibilidades.', 79, '26', 23, 'assets/images/Nude-project-varsity-grey.png', 'ropa');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 15-03-2024 a las 12:06:56
-- Versión del servidor: 11.3.2-MariaDB-1:11.3.2+maria~ubu2204
-- Versión de PHP: 8.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectodef`
--
CREATE DATABASE IF NOT EXISTS `proyectodef` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `proyectodef`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `db_admin_navbar_menus`
--

CREATE TABLE `db_admin_navbar_menus` (
  `var_menu_id` int(11) NOT NULL,
  `var_menu_name` varchar(100) NOT NULL,
  `var_menu_href` varchar(100) DEFAULT NULL,
  `var_has_submenu` tinyint(1) DEFAULT NULL,
  `var_is_submenu` tinyint(1) DEFAULT NULL,
  `var_menu_parent` int(11) DEFAULT NULL,
  `var_role` smallint(6) NOT NULL COMMENT 'Specifies the minimum role required.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Table that stores the navbar menu items.';

--
-- Volcado de datos para la tabla `db_admin_navbar_menus`
--

INSERT INTO `db_admin_navbar_menus` (`var_menu_id`, `var_menu_name`, `var_menu_href`, `var_has_submenu`, `var_is_submenu`, `var_menu_parent`, `var_role`) VALUES
(1, 'User Management', 'user_management.php', 0, 0, NULL, 3),
(2, 'Product Management', 'product_management.php', 0, 0, NULL, 2),
(3, 'Categories Management', 'categories_management.php', 0, 0, NULL, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `db_orders`
--

CREATE TABLE `db_orders` (
  `order_id` int(11) NOT NULL,
  `order_from` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `shipping_address` varchar(150) DEFAULT NULL,
  `contact_number` varchar(15) DEFAULT NULL,
  `order_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Table that stores the orders.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `db_order_products`
--

CREATE TABLE `db_order_products` (
  `db_order_products_id` int(11) NOT NULL,
  `db_product_id` int(11) DEFAULT NULL,
  `db_product_quantity` int(11) NOT NULL,
  `db_product_price` int(11) NOT NULL COMMENT 'Unitary price.',
  `db_order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Table that makes the relation between an order number and the products.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `db_products`
--

CREATE TABLE `db_products` (
  `var_id` int(11) NOT NULL,
  `var_product_name` varchar(100) NOT NULL,
  `var_product_description` varchar(200) DEFAULT NULL,
  `var_product_image` varchar(200) DEFAULT NULL,
  `var_product_price` double DEFAULT NULL,
  `var_product_vat` double DEFAULT NULL,
  `var_product_is_variant` tinyint(1) NOT NULL,
  `var_parent_product` int(11) DEFAULT NULL,
  `var_is_virtual` tinyint(1) NOT NULL,
  `var_product_category` int(11) DEFAULT NULL,
  `var_product_stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Table that stores the store products.';

--
-- Volcado de datos para la tabla `db_products`
--

INSERT INTO `db_products` (`var_id`, `var_product_name`, `var_product_description`, `var_product_image`, `var_product_price`, `var_product_vat`, `var_product_is_variant`, `var_parent_product`, `var_is_virtual`, `var_product_category`, `var_product_stock`) VALUES
(1, 'Smartphone Android 13 - 6GB RAM - 128GB Almacenamiento', 'Disfruta de la última tecnología con este smartphone Android 13. Cuenta con una pantalla de 6.5 pulgadas, cámara triple de 48MP, batería de 5000mAh y mucho más.', '65eb2716c72f8.jpg', 399.99, 0.21, 0, NULL, 0, 6, 13),
(2, 'Portátil gaming 15.6', 'Experimenta la mejor experiencia de juego con este portátil gaming. Cuenta con un procesador Intel Core i7, tarjeta gráfica NVIDIA RTX 3060, 16GB de RAM y SSD de 512GB.', '65eb2748eee25.jpg', 1499.99, 0.21, 0, NULL, 0, 7, 7),
(3, 'Smartwatch multifunción - Monitor de ritmo cardíaco - GPS', 'Mantente conectado y activo con este smartwatch multifunción. Monitoriza tu ritmo cardíaco, recibe notificaciones, controla tu música y mucho más.', '65eb278dc449f.jpg', 199.99, 0.21, 0, NULL, 0, 3, 13),
(4, 'Auriculares inalámbricos Bluetooth - Cancelación de ruido', 'Disfruta de tu música sin cables con estos auriculares inalámbricos Bluetooth. Cuentan con cancelación de ruido activa para una experiencia de audio envolvente.', '65eb27c0c25a1.jpg', 99.99, 0.21, 0, NULL, 0, 4, 4),
(5, 'Cámara réflex digital - 24MP - Sensor APS-C', 'Captura fotos y vídeos de alta calidad con esta cámara réflex digital. Cuenta con un sensor APS-C de 24MP, pantalla táctil y grabación de vídeo 4K.', '65eb27ebc5c98.jpg', 799.99, 0.21, 0, NULL, 0, 10, 2),
(9, 'iPhone 14 Pro Max', 'IIphone 14 Pro Max con 256Gb de memoria.', '65f02bc0bdec9.jpg', 1023, 0.21, 0, NULL, 0, 6, 12),
(10, 'Reparación de equipo', 'Reparación de tu equipo, precio por hora. Incluye desplazamiento hasta 20Km.', '65f1c5d74c413.png', 45, 0.21, 0, NULL, 1, 16, 999),
(12, 'Windows 10 License Key', 'Windows 10 Pro OEM License Key', '65f1cefe1cb40.png', 14, 0.21, 0, NULL, 1, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `db_shop_categories`
--

CREATE TABLE `db_shop_categories` (
  `var_code` int(11) NOT NULL COMMENT 'Stores Category ID',
  `var_category_name` varchar(50) NOT NULL COMMENT 'Stores category name',
  `var_category_description` varchar(100) DEFAULT NULL COMMENT 'Stores category desc.',
  `var_is_subcategory` tinyint(1) NOT NULL COMMENT 'Stores if it''s subcat.',
  `var_parent_category` int(11) DEFAULT NULL COMMENT 'Stores parent cat. if exists.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Table that stores the site product categories.';

--
-- Volcado de datos para la tabla `db_shop_categories`
--

INSERT INTO `db_shop_categories` (`var_code`, `var_category_name`, `var_category_description`, `var_is_subcategory`, `var_parent_category`) VALUES
(1, 'Móviles', 'Teléfonos inteligentes y smartphones de última generación.', 0, NULL),
(2, 'Informática', 'Ordenadores, portátiles, tablets y accesorios.', 0, NULL),
(3, 'Wearables', 'Smartwatches, pulseras de actividad y otros dispositivos vestibles.', 0, NULL),
(4, 'Audio', 'Auriculares, altavoces y otros dispositivos de audio.', 0, NULL),
(5, 'Fotografía', 'Cámaras réflex, digitales, instantáneas y accesorios.', 0, NULL),
(6, 'Smartphones', 'Teléfonos inteligentes con diferentes características y precios.', 1, 1),
(7, 'Portátiles', 'Ordenadores portátiles para uso personal, profesional o gaming.', 1, 2),
(8, 'Smartwatches', 'Relojes inteligentes con funciones para la salud, el deporte y la vida diaria.', 1, 3),
(9, 'Auriculares inalámbricos', 'Auriculares sin cables para disfrutar de la música sin limitaciones.', 1, 4),
(10, 'Cámaras réflex', 'Cámaras digitales de alta gama para obtener fotos y vídeos de calidad profesional.', 1, 5),
(13, 'Licencias de Windows', 'Licencias de Windows.', 1, 2),
(16, 'Servicios', 'Con/sin desplazamiento', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `db_site_identity`
--

CREATE TABLE `db_site_identity` (
  `var_code` int(11) NOT NULL,
  `var_name` varchar(50) NOT NULL COMMENT 'Name of the param',
  `var_param_name` varchar(50) NOT NULL COMMENT 'Name of the parameter to invoke',
  `var_param_value` varchar(200) NOT NULL COMMENT 'Parameter value'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Table that stores the style data of the website, such as logo width, src, backgrounds';

--
-- Volcado de datos para la tabla `db_site_identity`
--

INSERT INTO `db_site_identity` (`var_code`, `var_name`, `var_param_name`, `var_param_value`) VALUES
(1, 'main_logo_url', 'src', 'https://icons.iconarchive.com/icons/pictogrammers/material/256/star-three-points-outline-icon.png'),
(2, 'main_logo_width', 'width', '100px'),
(3, 'main_site_name', 'site_name', 'DotServices');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `db_site_navbar_menus`
--

CREATE TABLE `db_site_navbar_menus` (
  `var_menu_id` int(11) NOT NULL,
  `var_menu_name` varchar(100) NOT NULL,
  `var_menu_href` varchar(100) DEFAULT NULL,
  `var_has_submenu` tinyint(1) DEFAULT NULL,
  `var_is_submenu` tinyint(1) DEFAULT NULL,
  `var_menu_parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Table that stores the navbar menu items.';

--
-- Volcado de datos para la tabla `db_site_navbar_menus`
--

INSERT INTO `db_site_navbar_menus` (`var_menu_id`, `var_menu_name`, `var_menu_href`, `var_has_submenu`, `var_is_submenu`, `var_menu_parent`) VALUES
(1, ' <i class=\'bx bx-home bx-tada-hover\' ></i> Página Principal', 'index.php', 0, 0, NULL),
(2, '<i class=\'bx bx-info-circle bx-tada-hover\' ></i> Sobre nosotros', 'about.php', 0, 0, NULL),
(3, '<i class=\'bx bx-store-alt bx-tada-hover\' ></i>Tienda', 'store.php', 0, 0, NULL),
(4, '<i class=\'bx bx-cart bx-tada-hover\' ></i> Carrito', 'cart.php', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `db_users`
--

CREATE TABLE `db_users` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(70) NOT NULL,
  `user_nickname` varchar(20) NOT NULL,
  `user_role` tinyint(4) NOT NULL COMMENT '# 4 -> supAdmin\r\n# 3 -> softAdmin\r\n#2 ->shopManager\r\n#1 -> blogManager\r\n#0 -> user',
  `user_name` varchar(100) DEFAULT NULL,
  `user_surname` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Table that stores the site users.';

--
-- Volcado de datos para la tabla `db_users`
--

INSERT INTO `db_users` (`user_id`, `user_email`, `user_password`, `user_nickname`, `user_role`, `user_name`, `user_surname`) VALUES
(1, 'juan13herrero@gmail.com', '$2y$11$ZwnVoQxQmhl/.NpY5q.WYuSxCL3SkiPH51RoihS28nIcI0W5e4Qei', 'juanhcxd', 4, 'Juan Antonio', 'Herrero Centurion'),
(2, 'daniharopadul@gmail.com', '$2y$11$roYI/BWZyhK0zKtzRtvYo.DbCtZnExavk8EbQtpUR5E5QDfmDmcOa', 'dani', 0, 'Daniel', 'Haro'),
(4, 'juan@kaoal.ess', '$2y$11$EZWOHJlgiPPEZ8rcdxKjJu9SCtNkn1BUgkFSmlJVOstxHH50FYtR6', 'koala', 1, 'Koala Gato', 'Herrero'),
(6, 'Juan@juan', '$2y$11$nUf7P46R.GIyvUecJ1JhkeWbZDVGMdEronbXeNledQJGVqoC0CzhK', 'Juan', 0, 'Juan Antonio', 'Herrero Centurión'),
(7, 'jua@juan.es', '$2y$11$uUco4EWryFHIgGAfiVQTReCQaoDtfwuwvwfNYZG3kA0ewd5SgEn0O', 'koalanga', 0, 'jjua', 'juann');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `db_admin_navbar_menus`
--
ALTER TABLE `db_admin_navbar_menus`
  ADD PRIMARY KEY (`var_menu_id`);

--
-- Indices de la tabla `db_orders`
--
ALTER TABLE `db_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `db_orders_db_users_FK` (`order_from`);

--
-- Indices de la tabla `db_order_products`
--
ALTER TABLE `db_order_products`
  ADD PRIMARY KEY (`db_order_products_id`),
  ADD KEY `db_order_products_db_orders_FK` (`db_order_id`),
  ADD KEY `db_order_products_db_products_FK` (`db_product_id`);

--
-- Indices de la tabla `db_products`
--
ALTER TABLE `db_products`
  ADD PRIMARY KEY (`var_id`),
  ADD KEY `db_products_db_products_FK` (`var_parent_product`),
  ADD KEY `db_products_db_shop_categories_FK` (`var_product_category`);

--
-- Indices de la tabla `db_shop_categories`
--
ALTER TABLE `db_shop_categories`
  ADD PRIMARY KEY (`var_code`),
  ADD KEY `db_shop_categories_db_shop_categories_FK` (`var_parent_category`);

--
-- Indices de la tabla `db_site_identity`
--
ALTER TABLE `db_site_identity`
  ADD PRIMARY KEY (`var_code`),
  ADD UNIQUE KEY `db_site_style_unique` (`var_name`);

--
-- Indices de la tabla `db_site_navbar_menus`
--
ALTER TABLE `db_site_navbar_menus`
  ADD PRIMARY KEY (`var_menu_id`);

--
-- Indices de la tabla `db_users`
--
ALTER TABLE `db_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `db_users_unique` (`user_nickname`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `db_admin_navbar_menus`
--
ALTER TABLE `db_admin_navbar_menus`
  MODIFY `var_menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `db_orders`
--
ALTER TABLE `db_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `db_order_products`
--
ALTER TABLE `db_order_products`
  MODIFY `db_order_products_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `db_products`
--
ALTER TABLE `db_products`
  MODIFY `var_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `db_shop_categories`
--
ALTER TABLE `db_shop_categories`
  MODIFY `var_code` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Stores Category ID', AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `db_site_identity`
--
ALTER TABLE `db_site_identity`
  MODIFY `var_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `db_site_navbar_menus`
--
ALTER TABLE `db_site_navbar_menus`
  MODIFY `var_menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `db_users`
--
ALTER TABLE `db_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `db_orders`
--
ALTER TABLE `db_orders`
  ADD CONSTRAINT `db_orders_db_users_FK` FOREIGN KEY (`order_from`) REFERENCES `db_users` (`user_id`);

--
-- Filtros para la tabla `db_order_products`
--
ALTER TABLE `db_order_products`
  ADD CONSTRAINT `db_order_products_db_orders_FK` FOREIGN KEY (`db_order_id`) REFERENCES `db_orders` (`order_id`),
  ADD CONSTRAINT `db_order_products_db_products_FK` FOREIGN KEY (`db_product_id`) REFERENCES `db_products` (`var_id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `db_products`
--
ALTER TABLE `db_products`
  ADD CONSTRAINT `db_products_db_products_FK` FOREIGN KEY (`var_parent_product`) REFERENCES `db_products` (`var_id`),
  ADD CONSTRAINT `db_products_db_shop_categories_FK` FOREIGN KEY (`var_product_category`) REFERENCES `db_shop_categories` (`var_code`) ON DELETE SET NULL;

--
-- Filtros para la tabla `db_shop_categories`
--
ALTER TABLE `db_shop_categories`
  ADD CONSTRAINT `db_shop_categories_db_shop_categories_FK` FOREIGN KEY (`var_parent_category`) REFERENCES `db_shop_categories` (`var_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

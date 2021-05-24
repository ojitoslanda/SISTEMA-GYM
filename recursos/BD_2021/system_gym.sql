-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2021 a las 23:27:55
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
-- Base de datos: `system_gym`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fecha_clientes` date NOT NULL,
  `fecha_clientes_new` date NOT NULL,
  `hora` time NOT NULL,
  `pagado` varchar(3) NOT NULL,
  `estado` varchar(50) NOT NULL DEFAULT 'si',
  `id_tipo_pago` int(11) NOT NULL,
  `descuento_rutina` float NOT NULL,
  `rtn_baile` varchar(5) NOT NULL,
  `rtn_maquinas` varchar(5) NOT NULL,
  `precio_bm` float NOT NULL,
  `dias` int(11) NOT NULL,
  `dinero_adelantado` float NOT NULL,
  `total_rutina` float NOT NULL,
  `cliente_estrella` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ID`, `nombre`, `fecha_clientes`, `fecha_clientes_new`, `hora`, `pagado`, `estado`, `id_tipo_pago`, `descuento_rutina`, `rtn_baile`, `rtn_maquinas`, `precio_bm`, `dias`, `dinero_adelantado`, `total_rutina`, `cliente_estrella`) VALUES
(23, 'Juan', '2021-03-11', '2021-03-13', '12:02:06', 'si', 'si', 1, 0, 'on', 'off', 0, 0, 0, 6, 'no'),
(24, 'Juan Luis', '2021-03-12', '2021-03-13', '12:02:55', 'no', 'si', 1, 0, 'off', 'on', 0, 0, 0, 6, 'no'),
(38, 'Gordo', '2021-03-14', '2021-03-14', '08:17:27', 'si', 'si', 1, 0, 'off', 'off', 0, 0, 0, 6, 'si'),
(39, 'Pedro', '2021-03-14', '2021-03-14', '08:28:44', 'no', 'si', 1, 0, 'on', 'off', 0, 0, 0, 6, 'no'),
(40, 'pepe', '2021-03-15', '2021-03-15', '00:04:21', 'no', 'si', 1, 1, 'off', 'on', 0, 0, 0, 6, 'no'),
(41, 'Gabriel', '2021-03-15', '2021-03-15', '06:47:10', 'si', 'si', 5, 1, 'off', 'on', 0, 0, 20, 6, 'no'),
(42, 'Caballero', '2021-03-16', '2021-03-16', '09:39:59', 'si', 'si', 1, 1, 'off', 'on', 0, 0, 0, 6, 'no'),
(43, 'Camello', '2021-03-18', '2021-03-18', '18:58:49', 'si', 'si', 1, 1, 'off', 'on', 0, 0, 0, 6, 'no'),
(44, 'Pedro', '2021-03-18', '2021-03-18', '19:58:35', 'si', 'si', 5, 1, 'off', 'on', 0, 5, 10, 6, 'no'),
(45, 'mily', '2021-03-18', '2021-03-18', '20:03:13', 'si', 'si', 1, 0, 'on', 'off', 0, 0, 0, 6, 'no'),
(46, 'Semanal', '2021-03-18', '2021-03-18', '19:59:19', 'si', 'si', 2, 0, 'off', 'on', 0, 0, 0, 25, 'no'),
(47, 'Quincenal', '2021-03-18', '2021-03-18', '21:43:10', 'si', 'si', 3, 0, 'off', 'on', 0, 0, 0, 70, 'no'),
(48, 'Mensual', '2021-03-18', '2021-03-18', '21:43:21', 'si', 'si', 4, 0, 'off', 'on', 0, 0, 0, 120, 'no'),
(49, 'Juanito', '2021-03-21', '2021-03-21', '12:37:58', 'no', 'si', 1, 0, 'off', 'on', 0, 0, 0, 6, 'no'),
(50, 'Pepito', '2021-03-21', '2021-03-21', '12:38:29', 'si', 'si', 1, 0, 'off', 'on', 0, 0, 0, 6, 'no');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes_detalle`
--

CREATE TABLE `clientes_detalle` (
  `id_detalle` int(11) NOT NULL,
  `id_clientes` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cant` int(11) NOT NULL,
  `fecha_producto` date NOT NULL,
  `hora_producto` varchar(30) NOT NULL,
  `total_producto` float NOT NULL,
  `descuento_producto` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes_detalle`
--

INSERT INTO `clientes_detalle` (`id_detalle`, `id_clientes`, `id_producto`, `cant`, `fecha_producto`, `hora_producto`, `total_producto`, `descuento_producto`) VALUES
(19, 39, 2, 1, '2021-03-14', '08:28:44', 2, 0),
(20, 40, 0, 0, '2021-03-15', '00:04:21', 0, 0),
(21, 41, 0, 0, '2021-03-15', '06:47:10', 0, 0),
(22, 42, 0, 0, '2021-03-16', '09:39:59', 0, 0),
(23, 43, 0, 0, '2021-03-18', '18:58:49', 0, 0),
(24, 44, 4, 1, '2021-03-18', '19:58:35', 5, 2),
(25, 46, 2, 1, '2021-03-18', '19:59:19', 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_tantosdias`
--

CREATE TABLE `cliente_tantosdias` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `monto_adelanto` float NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente_tantosdias`
--

INSERT INTO `cliente_tantosdias` (`id`, `id_cliente`, `monto_adelanto`, `fecha`) VALUES
(36, 41, 20, '2021-03-15'),
(37, 44, 10, '2021-03-18'),
(38, 46, 0, '2021-03-18'),
(39, 47, 0, '2021-03-18'),
(40, 48, 0, '2021-03-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `db_tipo_pago`
--

CREATE TABLE `db_tipo_pago` (
  `ID` int(11) NOT NULL,
  `pago` varchar(50) NOT NULL,
  `costo_pago` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `db_tipo_pago`
--

INSERT INTO `db_tipo_pago` (`ID`, `pago`, `costo_pago`) VALUES
(1, 'Diario', 6),
(2, 'Semanal', 25),
(3, 'Quincenal', 70),
(4, 'Mensual', 120),
(5, 'PagoxDías', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `db_tipo_producto`
--

CREATE TABLE `db_tipo_producto` (
  `id` int(11) NOT NULL,
  `nombre_producto` varchar(50) NOT NULL,
  `costo_producto` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `db_tipo_producto`
--

INSERT INTO `db_tipo_producto` (`id`, `nombre_producto`, `costo_producto`) VALUES
(0, 'Ninguno', 0),
(2, 'Agua', 2),
(3, 'Proteinas', 5),
(4, 'Quemador', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `color` varchar(255) NOT NULL,
  `textColor` varchar(255) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `title`, `descripcion`, `color`, `textColor`, `start`, `end`, `id_cliente`) VALUES
(43, 'X', '', '#000000', '#FFF', '2021-03-15 06:47:10', '2021-03-15 06:47:10', 41),
(44, 'X', '', '#000000', '#FFF', '2021-03-18 19:58:35', '2021-03-18 19:58:35', 44),
(45, 'X', '', '#000000', '#FFF', '2021-03-18 19:59:19', '2021-03-18 19:59:19', 46),
(46, 'X', '', '#000000', '#FFF', '2021-03-18 21:43:10', '2021-03-18 21:43:10', 47),
(47, 'X', '', '#000000', '#FFF', '2021-03-18 21:43:21', '2021-03-18 21:43:21', 48);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_logo`
--

CREATE TABLE `tbl_logo` (
  `id` int(11) NOT NULL,
  `logo` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_logo`
--

INSERT INTO `tbl_logo` (`id`, `logo`) VALUES
(1, 'logo.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_egresos`
--

CREATE TABLE `t_egresos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `fecha` date NOT NULL,
  `costo_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_ingresos`
--

CREATE TABLE `t_ingresos` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `costo_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_ingresos`
--

INSERT INTO `t_ingresos` (`id`, `fecha`, `costo_total`) VALUES
(1, '2021-01-07', 0),
(2, '2021-03-13', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `user` varchar(20) NOT NULL,
  `clave` varchar(70) NOT NULL,
  `rol` varchar(70) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID`, `nombre`, `user`, `clave`, `rol`, `foto`) VALUES
(1, 'GYM ESPARTA', 'esparta', '1234', 'Administrador', ''),
(6, 'Cajero', 'gabriel', 'Go123456', 'Usuario', 'icono.png'),
(7, 'Cajero Esposa', 'esposadata', '1234', 'Usuario', 'gabo.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_tipo_pago` (`id_tipo_pago`);

--
-- Indices de la tabla `clientes_detalle`
--
ALTER TABLE `clientes_detalle`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_clientes` (`id_clientes`,`id_producto`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `cliente_tantosdias`
--
ALTER TABLE `cliente_tantosdias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `db_tipo_pago`
--
ALTER TABLE `db_tipo_pago`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `db_tipo_producto`
--
ALTER TABLE `db_tipo_producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `tbl_logo`
--
ALTER TABLE `tbl_logo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `t_egresos`
--
ALTER TABLE `t_egresos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `t_ingresos`
--
ALTER TABLE `t_ingresos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `clientes_detalle`
--
ALTER TABLE `clientes_detalle`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `cliente_tantosdias`
--
ALTER TABLE `cliente_tantosdias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `db_tipo_pago`
--
ALTER TABLE `db_tipo_pago`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `db_tipo_producto`
--
ALTER TABLE `db_tipo_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `tbl_logo`
--
ALTER TABLE `tbl_logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `t_egresos`
--
ALTER TABLE `t_egresos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_ingresos`
--
ALTER TABLE `t_ingresos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`id_tipo_pago`) REFERENCES `db_tipo_pago` (`ID`);

--
-- Filtros para la tabla `clientes_detalle`
--
ALTER TABLE `clientes_detalle`
  ADD CONSTRAINT `clientes_detalle_ibfk_1` FOREIGN KEY (`id_clientes`) REFERENCES `clientes` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clientes_detalle_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `db_tipo_producto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente_tantosdias`
--
ALTER TABLE `cliente_tantosdias`
  ADD CONSTRAINT `cliente_tantosdias_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 07-12-2022 a las 20:38:59
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ecommercee`
--
create database if not exists ecommercee;
use ecommercee;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `direccionUser` varchar(70) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telUser` varchar(12) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`idPedido`, `idUser`, `IdProducto`, `fecha`, `direccionUser`, `telUser`, `estado`) VALUES
(2, 1, 3, '2022-12-07 11:12:36', 'call', '942934', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Producto`
--

CREATE TABLE `Producto` (
  `IdProducto` int(11) NOT NULL,
  `nomProducto` varchar(70) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `img` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `descProducto` varchar(150) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `precioProducto` decimal(6,2) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `Producto`
--

INSERT INTO `Producto` (`IdProducto`, `nomProducto`, `img`, `descProducto`, `precioProducto`, `stock`) VALUES
(1, 'test', 'assets/logo.png', 'test para producto bbdd', '1000.99', 1000),
(2, 'test2', 'assets/logo.png', 'test 2  para producto bbdd', '3212.99', 100),
(3, 'test3', 'assets/logo.png', 'test 2  para producto bbdd', '39.00', 100),
(4, 'test4', 'assets/logo.png', 'test 2  para producto bbdd', '1234.99', 100),
(5, 'test3', 'assets/logo.png', 'test 6  para producto bbdd', '3923.00', 100),
(6, 'test7', 'assets/logo.png', 'test 27  para producto bbdd', '1239.00', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUser` int(11) NOT NULL,
  `nomUser` varchar(70) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `apellidoUser` varchar(70) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `emailUser` varchar(70) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `passwordUser` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `stateUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUser`, `nomUser`, `apellidoUser`, `emailUser`, `passwordUser`, `stateUser`) VALUES
(1, 'root', 'root', 'root@arsenbasha.com', 'root', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `usuario_idUser_pedido` (`idUser`),
  ADD KEY `Producto_idProducto_pedido` (`IdProducto`);

--
-- Indices de la tabla `Producto`
--
ALTER TABLE `Producto`
  ADD PRIMARY KEY (`IdProducto`),
  ADD UNIQUE KEY `IdProducto` (`IdProducto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `Producto`
--
ALTER TABLE `Producto`
  MODIFY `IdProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `Producto_idProducto_pedido` FOREIGN KEY (`IdProducto`) REFERENCES `Producto` (`IdProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuario_idUser_pedido` FOREIGN KEY (`idUser`) REFERENCES `usuario` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


/*

INSERT INTO `usuario` ( `nomUser`, `apellidoUser`, `emailUser`, `passwordUser`, `stateUser`) VALUES ( 'root', 'root', 'root@arsenbasha.com', 'root', '1');



INSERT INTO `Producto` (`IdProducto`, `nomProducto`, `img`, `descProducto`, `precioProducto`, `stock`) VALUES ('1', 'test', 'assets/logo.png', 'test para producto bbdd', '1000.99', '1000');
INSERT INTO `Producto` (`IdProducto`, `nomProducto`, `img`, `descProducto`, `precioProducto`, `stock`) VALUES (0, 'test2', 'assets/logo.png', 'test 2  para producto bbdd', '3212.99', '100');

INSERT INTO `Producto` (`IdProducto`, `nomProducto`, `img`, `descProducto`, `precioProducto`, `stock`) VALUES (0, 'test3', 'assets/logo.png', 'test 2  para producto bbdd', '39', '100');
INSERT INTO `Producto` (`IdProducto`, `nomProducto`, `img`, `descProducto`, `precioProducto`, `stock`) VALUES (0, 'test4', 'assets/logo.png', 'test 2  para producto bbdd', '1234.99', '100');
DELETE FROM cedula  WHERE cedula = '3'"
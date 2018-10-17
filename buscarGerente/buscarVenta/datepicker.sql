-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-07-2017 a las 21:24:48
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `datepicker`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `documento` varchar(213) NOT NULL,
  `cliente` varchar(255) NOT NULL,
  `producto` varchar(255) NOT NULL,
  `precio` double(12,2) NOT NULL,
  `iva` double NOT NULL,
  `estado` varchar(213) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `documento`, `cliente`, `producto`, `precio`, `iva`, `estado`, `fecha`) VALUES
(1, 'Factura', 'David E. Gary', 'Shuttering Plywood', 1500.00, 5, 'Pendiente', '2017-01-14'),
(2, 'Factura', 'Eddie M. Douglas', 'Aluminium Heavy Windows', 2000.00, 16, 'Rechazada', '2017-01-08'),
(3, 'Factura', 'Oscar D. Scoggins', 'Plaster Of Paris', 150.00, 17, 'Pendiente', '2016-12-29'),
(4, 'Factura', 'Clara C. Kulik', 'Spin Driller Machine', 350.00, 11, 'Pendiente', '2016-12-30'),
(5, 'Factura', 'Christopher M. Victory', 'Shopping Trolley', 100.00, 19, 'Aprobada', '2017-01-01'),
(6, 'Boleta', 'Jessica G. Fischer', 'CCTV Camera', 800.00, 10, 'Pendiente', '2017-01-02'),
(7, 'Boleta', 'Roger R. White', 'Truck Tires', 2000.00, 12, 'Rechazada', '2016-12-28'),
(8, 'Boleta', 'Susan C. Richardson', 'Glass Block', 200.00, 11, 'Aprobada', '2017-01-04'),
(9, 'Ticket', 'David C. Jury', 'Casing Pipes', 500.00, 20, 'Pendiente', '2016-12-27'),
(10, 'Ticket', 'Lori C. Skinner', 'Glass PVC Rubber', 1800.00, 17, 'Rechazada', '2016-12-30'),
(11, 'Ticket', 'Shawn S. Derosa', 'Sony HTXT1 2.1-Channel TV', 180.00, 8, 'Aprobada', '2017-01-03'),
(12, 'Factura', 'Karen A. McGee', 'Over-the-Ear Stereo Headphones ', 25.00, 18, 'Rechazada', '2017-01-01'),
(13, 'Factura', 'Kristine B. McGraw', 'Tristar 10" Round Copper Chef Pan with Glass Lid', 20.00, 15, 'Pendiente', '2016-12-30'),
(14, 'Factura', 'Gary M. Porter', 'ROBO 3D R1 Plus 3D Printer', 600.00, 14, 'Aprobada', '2017-01-02'),
(15, 'Boleta', 'Sarah D. Hunter', 'Westinghouse Select Kitchen Appliances', 35.00, 12, 'Pendiente', '2016-12-29'),
(16, 'Boleta', 'Diane J. Thomas', 'SanDisk Ultra 32GB microSDHC', 12.00, 14, 'Rechazada', '2017-01-05'),
(17, 'Boleta', 'Helena J. Quillen', 'TaoTronics Dimmable Outdoor String Lights', 16.00, 11, 'Aprobada', '2017-01-04'),
(18, 'Ticket', 'Arlette G. Nathan', 'TaoTronics Bluetooth in-Ear Headphones', 25.00, 14, 'Rechazada', '2017-01-03'),
(19, 'Ticket', 'Ronald S. Vallejo', 'Scotchgard Fabric Protector, 10-Ounce, 2-Pack', 20.00, 15, 'Pendiente', '2017-01-03'),
(20, 'Ticket', 'Felicia L. Sorensen', 'Anker 24W Dual USB Wall Charger with Foldable Plug', 12.00, 13, 'Aprobada', '2017-01-04');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

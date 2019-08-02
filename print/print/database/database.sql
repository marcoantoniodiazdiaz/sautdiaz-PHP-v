-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-06-2018 a las 17:50:55
-- Versión del servidor: 5.5.42
-- Versión de PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `sautdiaz3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ADMIN`
--

CREATE TABLE `ADMIN` (
  `EMAIL` varchar(30) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL,
  `NOMBRE` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ADMIN`
--

INSERT INTO `ADMIN` (`EMAIL`, `PASSWORD`, `NOMBRE`) VALUES
('kingmarkdc@gmail.com', '2400', 'Marco Antonio Diaz'),
('jaquy-101@hotmail.com', '2406', 'Jaquelin Guadalupe Hernandez'),
('zuzy22@gmail.com', 'perro', 'Susana Guadalupe Diaz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CATEGORIAS`
--

CREATE TABLE `CATEGORIAS` (
  `NOMBRE` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `CATEGORIAS`
--

INSERT INTO `CATEGORIAS` (`NOMBRE`) VALUES
('ACEITES'),
('ADITIVOS'),
('BATERIAS'),
('FILTRO DE AIRE'),
('FILTROS DE ACEITE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CLIENTES`
--

CREATE TABLE `CLIENTES` (
  `ID` int(5) NOT NULL,
  `NOMBRE` varchar(45) DEFAULT NULL,
  `DIRECCION` varchar(45) DEFAULT NULL,
  `EMAIL` varchar(60) NOT NULL,
  `TELEFONO` varchar(45) DEFAULT NULL,
  `CELULAR` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=90429 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `CLIENTES`
--

INSERT INTO `CLIENTES` (`ID`, `NOMBRE`, `DIRECCION`, `EMAIL`, `TELEFONO`, `CELULAR`) VALUES
(46507, 'JAQUELIN GUADALUPE HERNANDEZ', 'LIMA #208B COL. PRIMAVERA', '', '', '3921290199');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `COCHES`
--

CREATE TABLE `COCHES` (
  `PLACA` varchar(7) NOT NULL,
  `CLIENTE` int(11) DEFAULT NULL,
  `MARCA` varchar(45) DEFAULT NULL,
  `SUBMARCA` varchar(45) DEFAULT NULL,
  `COLOR` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `COCHES`
--

INSERT INTO `COCHES` (`PLACA`, `CLIENTE`, `MARCA`, `SUBMARCA`, `COLOR`) VALUES
('Y7UISD5', 46507, 'NISSAN', 'PLATINA', 'CAFE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DETALLEDEVENTA`
--

CREATE TABLE `DETALLEDEVENTA` (
  `VENTA` int(11) DEFAULT NULL,
  `CANTIDAD` int(2) NOT NULL,
  `IDPRODUCTO` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `DETALLEDEVENTA`
--

INSERT INTO `DETALLEDEVENTA` (`VENTA`, `CANTIDAD`, `IDPRODUCTO`) VALUES
(95673, 1, '18290'),
(95673, 5, '11306588'),
(25139, 2, '20900604'),
(69557, 1, '55525923'),
(88127, 1, '18290'),
(88127, 5, '33508602'),
(31608, 1, '95855034'),
(31608, 6, '32040089'),
(77691, 1, '29611948');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `EMPLEADOS`
--

CREATE TABLE `EMPLEADOS` (
  `ID` int(5) NOT NULL,
  `NOMBRE` varchar(45) DEFAULT NULL,
  `TELEFONO` varchar(45) DEFAULT NULL,
  `CELULAR` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `EMPLEADOS`
--

INSERT INTO `EMPLEADOS` (`ID`, `NOMBRE`, `TELEFONO`, `CELULAR`) VALUES
(1, 'Marco Antonio Diaz', '3929256049', '3921110808');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `MARCAS`
--

CREATE TABLE `MARCAS` (
  `NOMBRE` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `MARCAS`
--

INSERT INTO `MARCAS` (`NOMBRE`) VALUES
('AUDI'),
('BMW'),
('CHRYSLER'),
('DACIA'),
('DODGE'),
('FERRARI'),
('FIAT'),
('FORD'),
('HONDA'),
('HYUNDAI'),
('INFINITI'),
('ISUZU'),
('JAGUAR'),
('JEEP'),
('KIA'),
('LAND ROVER'),
('LEXUS'),
('MAZDA'),
('MERCEDES'),
('MINI'),
('MITSUBISHI'),
('NISSAN'),
('OPEL'),
('PEUGEOT'),
('PORSCHE'),
('RENAULT'),
('SEAT'),
('SMART'),
('SUBARU'),
('SUZUKI'),
('TESLA'),
('TOYOTA'),
('VOLKSWAGEN'),
('VOLVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `MOVIMIENTOS`
--

CREATE TABLE `MOVIMIENTOS` (
  `ID` int(5) NOT NULL,
  `CANTIDAD` double DEFAULT NULL,
  `FECHA` date DEFAULT NULL,
  `HORA` time DEFAULT NULL,
  `EMPLEADO` int(5) DEFAULT NULL,
  `TIPO` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PRODUCTOS`
--

CREATE TABLE `PRODUCTOS` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(45) DEFAULT NULL,
  `PRECIO` double DEFAULT NULL,
  `CATEGORIA` varchar(30) DEFAULT NULL,
  `BUSCAR` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `PRODUCTOS`
--

INSERT INTO `PRODUCTOS` (`ID`, `NOMBRE`, `PRECIO`, `CATEGORIA`, `BUSCAR`) VALUES
(10639534, 'AMORTIGUADORES', 340, 'MISS', 'NO'),
(11306588, 'litros de aceite', 90, 'MISS', 'NO'),
(12857110, 'litros de aceite', 90, 'MISS', 'NO'),
(17312102, 'Carbuklin', 55, 'MISS', 'NO'),
(18150614, 'MOTORCRAFT MFL-820', 45, 'FILTROS DE ACEITE', 'SI'),
(19756814, 'MOTORCRAFT 20W-50', 100, 'ACEITES', 'SI'),
(20900604, 'cepillar cabezas', 900, 'MISS', 'NO'),
(24504367, 'BARDAHL 1', 75, 'ADITIVOS', 'SI'),
(28439189, 'MANO DE OBRA', 200, 'MISS', 'NO'),
(28489593, 'LIMPIABRISAS', 90, 'MISS', 'NO'),
(29611948, 'Revisar cables', 100, 'MISS', 'NO'),
(32040089, 'MOTORCRAFT 15W-40', 110, 'ACEITES', 'SI'),
(47047901, 'LIMPIZA DE INYECTORES', 250, 'MISS', 'NO'),
(52200414, 'CAMBIO DE FLECHA', 250, 'MISS', 'NO'),
(54638734, 'Afinar motor', 300, 'MISS', 'NO'),
(55525923, 'terminal', 50, 'MISS', 'NO'),
(81383002, 'LIMPIEZA DE INYECTORES', 250, 'MISS', 'NO'),
(84680340, 'FLECHA DELANTERA', 200, 'MISS', 'NO'),
(95855034, 'Revisar frenos', 120, 'MISS', 'NO'),
(2147483647, 'FILTRO DE AIRE', 80, 'MISS', 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SERVICIO`
--

CREATE TABLE `SERVICIO` (
  `ID` int(11) NOT NULL,
  `VENTA` int(11) DEFAULT NULL,
  `COCHE` varchar(7) DEFAULT NULL,
  `RAZON` varchar(200) NOT NULL,
  `FECHA` date NOT NULL,
  `HORA` time NOT NULL,
  `ESTADO` int(1) NOT NULL,
  `TRABAJADOR` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TABLA_VENTA`
--

CREATE TABLE `TABLA_VENTA` (
  `ID` int(5) NOT NULL,
  `CANTIDAD` int(2) NOT NULL,
  `NOMBRE` varchar(40) NOT NULL,
  `PRECIO` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TRABAJADORES`
--

CREATE TABLE `TRABAJADORES` (
  `ID` int(5) NOT NULL,
  `NOMBRE` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `TRABAJADORES`
--

INSERT INTO `TRABAJADORES` (`ID`, `NOMBRE`) VALUES
(23764, 'JESUS'),
(23982, 'DANIEL DIAZ GUTIERREZ'),
(73849, 'DANIEL DIAZ DIAZ'),
(82739, 'JUAN CARLOS ESQUIVEL'),
(98234, 'ROBERTO PLACENCIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `VENTAS`
--

CREATE TABLE `VENTAS` (
  `ID` int(11) NOT NULL,
  `CLIENTE` int(5) DEFAULT NULL,
  `PRODUCTOS` int(11) DEFAULT NULL,
  `FECHA` date DEFAULT NULL,
  `HORA` time DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=77692 DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `CATEGORIAS`
--
ALTER TABLE `CATEGORIAS`
  ADD UNIQUE KEY `NOMBRE` (`NOMBRE`);

--
-- Indices de la tabla `CLIENTES`
--
ALTER TABLE `CLIENTES`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `COCHES`
--
ALTER TABLE `COCHES`
  ADD PRIMARY KEY (`PLACA`),
  ADD KEY `FK_CLIENTE_idx` (`CLIENTE`);

--
-- Indices de la tabla `EMPLEADOS`
--
ALTER TABLE `EMPLEADOS`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `MARCAS`
--
ALTER TABLE `MARCAS`
  ADD UNIQUE KEY `NOMBRE` (`NOMBRE`);

--
-- Indices de la tabla `MOVIMIENTOS`
--
ALTER TABLE `MOVIMIENTOS`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_MOV_EMPLEADO_idx` (`EMPLEADO`);

--
-- Indices de la tabla `PRODUCTOS`
--
ALTER TABLE `PRODUCTOS`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `SERVICIO`
--
ALTER TABLE `SERVICIO`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_SER_VENTA_idx` (`VENTA`),
  ADD KEY `FK_SER_COCHE_idx` (`COCHE`),
  ADD KEY `FK_TRABAJADOR_idx` (`TRABAJADOR`);

--
-- Indices de la tabla `TABLA_VENTA`
--
ALTER TABLE `TABLA_VENTA`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indices de la tabla `TRABAJADORES`
--
ALTER TABLE `TRABAJADORES`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `VENTAS`
--
ALTER TABLE `VENTAS`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_CLIENTE_idx` (`CLIENTE`),
  ADD KEY `FK_VENTAS_CLIENTES_idx` (`CLIENTE`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `CLIENTES`
--
ALTER TABLE `CLIENTES`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=90429;
--
-- AUTO_INCREMENT de la tabla `VENTAS`
--
ALTER TABLE `VENTAS`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=77692;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `COCHES`
--
ALTER TABLE `COCHES`
  ADD CONSTRAINT `FK_CLIENTE` FOREIGN KEY (`CLIENTE`) REFERENCES `CLIENTES` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `MOVIMIENTOS`
--
ALTER TABLE `MOVIMIENTOS`
  ADD CONSTRAINT `FK_MOV_EMPLEADO` FOREIGN KEY (`EMPLEADO`) REFERENCES `EMPLEADOS` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `SERVICIO`
--
ALTER TABLE `SERVICIO`
  ADD CONSTRAINT `FK_SER_COCHE` FOREIGN KEY (`COCHE`) REFERENCES `COCHES` (`PLACA`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_SER_VENTA` FOREIGN KEY (`VENTA`) REFERENCES `VENTAS` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TRABAJADOR` FOREIGN KEY (`TRABAJADOR`) REFERENCES `TRABAJADORES` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `VENTAS`
--
ALTER TABLE `VENTAS`
  ADD CONSTRAINT `FK_VENTAS_CLIENTES` FOREIGN KEY (`CLIENTE`) REFERENCES `CLIENTES` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 13-06-2021 a las 22:35:03
-- Versión del servidor: 8.0.21
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gimnasio_fss`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE IF NOT EXISTS `administrador` (
  `Doc_identidad` int NOT NULL,
  `Tipo_doc` varchar(2) COLLATE utf8_spanish2_ci NOT NULL,
  `Nombres` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Apellidos` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Tel_contacto` varchar(7) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Cel_contacto` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `Email` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`Doc_identidad`,`Tipo_doc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `Doc_identidad` int NOT NULL,
  `Tipo_doc` varchar(2) COLLATE utf8_spanish2_ci NOT NULL,
  `Nombres` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Apellidos` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Tel_contacto` varchar(7) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Cel_contacto` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `Email` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`Doc_identidad`,`Tipo_doc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`Doc_identidad`, `Tipo_doc`, `Nombres`, `Apellidos`, `Tel_contacto`, `Cel_contacto`, `Email`) VALUES
(52974541, 'CC', 'Jennie', 'Gonzalez', '7214857', '3135478774', 'jennie@gmail.com'),
(55442211, 'TI', 'Roseanne', 'Duarte', '3545410', '3145774150', 'roseanne@gmail.com'),
(57849874, 'CC', 'Irene', 'Lopez', '', '3154788747', 'irene@gmail.com'),
(84561230, 'CC', 'Wendy', 'Trujillo', '', '3154875406', 'wendy@gmail.com'),
(85741245, 'CC', 'Carlos', 'Sanchez', '', '3145774887', 'carlos@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_has_entrenador`
--

DROP TABLE IF EXISTS `cliente_has_entrenador`;
CREATE TABLE IF NOT EXISTS `cliente_has_entrenador` (
  `CLIENTE_Doc_identidad` int NOT NULL,
  `ENTRENADOR_Doc_identidad` int NOT NULL,
  PRIMARY KEY (`CLIENTE_Doc_identidad`,`ENTRENADOR_Doc_identidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenador`
--

DROP TABLE IF EXISTS `entrenador`;
CREATE TABLE IF NOT EXISTS `entrenador` (
  `Doc_identidad` int NOT NULL,
  `Tipo_doc` varchar(2) COLLATE utf8_spanish2_ci NOT NULL,
  `Nombres` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Apellidos` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Tel_contacto` varchar(7) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Cel_contacto` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `Email` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`Doc_identidad`,`Tipo_doc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `entrenador`
--

INSERT INTO `entrenador` (`Doc_identidad`, `Tipo_doc`, `Nombres`, `Apellidos`, `Tel_contacto`, `Cel_contacto`, `Email`) VALUES
(95621478, 'CC', 'David', 'Romero', '7847541', '3215447804', 'david@gmail.com'),
(99547741, 'CC', 'Jack', 'Lilac', '3542410', '3185447145', 'jack@gmail.com'),
(1003525441, 'CE', 'Alexander', 'Zamora', '7481023', '3132541006', 'alexander@gmail.com'),
(1005484774, 'CC', 'Lisa', 'Franco', '', '3142551008', 'lisa@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

DROP TABLE IF EXISTS `gastos`;
CREATE TABLE IF NOT EXISTS `gastos` (
  `Cod_gasto` int NOT NULL,
  `Fecha_gasto` date NOT NULL,
  `Valor_gasto` varchar(7) COLLATE utf8_spanish2_ci NOT NULL,
  `Tipo_gasto` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `Descrip_gasto` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `ADMINISTRADOR_Doc_identidad` int NOT NULL,
  PRIMARY KEY (`Cod_gasto`,`ADMINISTRADOR_Doc_identidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `gastos`
--

INSERT INTO `gastos` (`Cod_gasto`, `Fecha_gasto`, `Valor_gasto`, `Tipo_gasto`, `Descrip_gasto`, `ADMINISTRADOR_Doc_identidad`) VALUES
(1, '2021-06-12', '80000', 'Recibo luz', 'Pago de junio recibo de la luz', 84878874);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `Doc_identidad` int NOT NULL,
  `Nom_usuario` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Password` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Tipo_usuario` varchar(1) COLLATE utf8_spanish2_ci NOT NULL,
  `ENTRENADOR_Doc_identidad` int NOT NULL,
  `CLIENTE_Doc_identidad` int NOT NULL,
  `ADMINISTRADOR_Doc_identidad` int NOT NULL,
  PRIMARY KEY (`ENTRENADOR_Doc_identidad`,`CLIENTE_Doc_identidad`,`Doc_identidad`,`ADMINISTRADOR_Doc_identidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`Doc_identidad`, `Nom_usuario`, `Password`, `Tipo_usuario`, `ENTRENADOR_Doc_identidad`, `CLIENTE_Doc_identidad`, `ADMINISTRADOR_Doc_identidad`) VALUES
(1007646008, 'Nay S', 'butter', '1', 0, 0, 0),
(1008646007, 'Joy RV', 'hello', '1', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomina`
--

DROP TABLE IF EXISTS `nomina`;
CREATE TABLE IF NOT EXISTS `nomina` (
  `Cod_pago` int NOT NULL,
  `Fecha_pago` date NOT NULL,
  `Valor_pago` varchar(7) COLLATE utf8_spanish2_ci NOT NULL,
  `Tipo_cargo` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `Descrip_pago` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `ADMINISTRADOR_Doc_identidad` int NOT NULL,
  `ENTRENADOR_Doc_identidad` int NOT NULL,
  PRIMARY KEY (`ADMINISTRADOR_Doc_identidad`,`Cod_pago`,`ENTRENADOR_Doc_identidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `nomina`
--

INSERT INTO `nomina` (`Cod_pago`, `Fecha_pago`, `Valor_pago`, `Tipo_cargo`, `Descrip_pago`, `ADMINISTRADOR_Doc_identidad`, `ENTRENADOR_Doc_identidad`) VALUES
(1, '2021-06-12', '35000', 'Entrenador', 'Pago 1 día de trabajo', 52541541, 78745745),
(2, '2021-06-13', '35000', 'Entrenador', 'Pago 1 día trabajo', 52541541, 96985985);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_clientes`
--

DROP TABLE IF EXISTS `pago_clientes`;
CREATE TABLE IF NOT EXISTS `pago_clientes` (
  `Num_factura` int NOT NULL,
  `Fecha_pago` date NOT NULL,
  `Valor_pago` varchar(6) COLLATE utf8_spanish2_ci NOT NULL,
  `Descrip_pago` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `CLIENTE_Doc_identidad` int NOT NULL,
  `ADMINISTRADOR_Doc_identidad` int NOT NULL,
  PRIMARY KEY (`CLIENTE_Doc_identidad`,`ADMINISTRADOR_Doc_identidad`,`Num_factura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pago_clientes`
--

INSERT INTO `pago_clientes` (`Num_factura`, `Fecha_pago`, `Valor_pago`, `Descrip_pago`, `CLIENTE_Doc_identidad`, `ADMINISTRADOR_Doc_identidad`) VALUES
(1, '2021-06-12', '8000', 'Pago un día', 57849874, 69874514);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

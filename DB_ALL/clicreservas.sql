-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-09-2020 a las 02:58:42
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clicreservas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barrio`
--

CREATE TABLE `barrio` (
  `idBarrio` tinyint(4) NOT NULL,
  `bNombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `barrio`
--

INSERT INTO `barrio` (`idBarrio`, `bNombre`, `created_at`, `updated_at`) VALUES
(1, 'NAYITA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'CENTENARIO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'LA ISLA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'VIENTOS LIBRES NORTE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'MONTE CHINO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'EL FIRME', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'CAPRICHO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'FRANSISCO DE PAULA SANTANDER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'EL JORGE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'BORRERO OLANO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'SANTA ROSA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'ALFONSO LOPEZ P', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'ALBERTO LLERAS CAMARGO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'SAN JOSE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'MURO YUSTY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'VIENTOS LIBRES SUR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'CAMPO ALEGRE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'LA PLAYITA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'PASCUAL DE ANDAGOYA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'LA PALERA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'PUNTA DEL ESTE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'SANTA CRUZ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'LA INMACULADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'SANTA FE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'MIRAMAR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'EL PORVENIR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'EL CAMPIN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'EL JARDIN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'BRISAS DEL MAR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'MIRAFLORES', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'EL ORIENTE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'ISLA DE LA PAZ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'BARRIO NAVAL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'BOSQUE MUNICIPAL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'LA COMUNA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'KENNEDY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'SAN LUIS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'SAN FRANCISCO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'MUNICIPAL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'JUAN XXIII', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'EUCARISTICO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'ROCKEFELLER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, '14 DE JULIO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'MODELO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 'MARIA EUGENIA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'BELLA VISTA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'OLIMPICO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'EL CRISTAL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'TRANSFORMACION', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'LOS LAURELES', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'CIUDADELA COLPUERTOS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'SAN BUENAVENTURA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'DOÑA CESI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, '12 DE ABRIL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, '6 DE ENERO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 'TURBAY AYALA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 'NUEVA BUENAVENTURA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 'INDEPENDENCIA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 'URBANIZACION ACUARELA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 'CARLOS HOLMES', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 'LAS AMERICAS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 'BOLIVAR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 'CAMILO TORRES', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 'URBANIZACION BAHIA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 'EL PROGRESO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 'LA FORTALEZA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 'URBANIZACION COMUNITARIA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 'LOS ALAMOS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 'URBANIZACION COMFAMAR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 'BELLO HORIZONTE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 'EL DORADO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 'ANTONIO NARIÑO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 'CASCAJAL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 'EL CARMEN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 'NUEVA COLOMBIA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 'LOS PINOS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 'PANAMERICANO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 'GRAN COLOMBIANA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 'CRISTOBAL COLON', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 'EL FUTURO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 'PUERTA DEL MAR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 'ALFONSO LOPEZ MICHELSEN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 'UNION DE VIVIENDA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 'EL FRIUNFO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, '20 DE JULIO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 'EL RETEN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 'NUEVA GRANADA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 'LAS PALMAS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 'NUEVA FRONTERA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 'MATIA MULUMBA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 'CABAL POMBO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 'EL CALDAS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 'LA LIBERTAD', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 'LA GLORIA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 'LA UNION', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 'EL RUIZ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 'RAFAEL URIBE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 'EL CAMBIO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 'NUEVO AMANECER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 'LA CAMPIÑA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 'VISTA HERMOSA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 'JORGE ELIECER GAITAN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 'LA DIGNIDAD', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 'BRISAS DEL PACIFICO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, '12 DE OCTUBRE', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Disparadores `barrio`
--
DELIMITER $$
CREATE TRIGGER `barrio_BEFORE_INSERT` BEFORE INSERT ON `barrio` FOR EACH ROW BEGIN
	if(new.created_at = '' and New.updated_at = '') then
		set new.created_at = (select now());
		set new.updated_at = (select now());
    end if;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cant_vent`
--

CREATE TABLE `cant_vent` (
  `idCantVent` int(11) NOT NULL,
  `idEmpresaR` int(11) NOT NULL,
  `idVentR` tinyint(25) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cant_vent`
--
--
-- Disparadores `cant_vent`
--
DELIMITER $$
CREATE TRIGGER `cant_vent_BEFORE_INSERT` BEFORE INSERT ON `cant_vent` FOR EACH ROW BEGIN
	if(new.created_at = '' and New.updated_at = '') then
		set new.created_at = (select now());
		set new.updated_at = (select now());
    end if;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `cliNombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `cliCc` bigint(11) NOT NULL,
  `cliDireccion` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `cliTelefono` bigint(10) NOT NULL,
  `cliMail` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `idPerfilR` int(11) NOT NULL,
  `idBarRe` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cliente`
--


--
-- Disparadores `cliente`
--
DELIMITER $$
CREATE TRIGGER `cliente_BEFORE_INSERT` BEFORE INSERT ON `cliente` FOR EACH ROW BEGIN
	if(new.created_at = '' and New.updated_at = '') then
		set new.created_at = (select now());
		set new.updated_at = (select now());
    end if;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras_cli`
--

CREATE TABLE `compras_cli` (
  `idCompCli` int(11) NOT NULL,
  `estado` tinyint(2) NOT NULL,
  `idClienteR` int(11) NOT NULL,
  `idEmpHorarioR` int(11) NOT NULL,
  `fechaCompra` date DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `compras_cli`
--


--
-- Disparadores `compras_cli`
--
DELIMITER $$
CREATE TRIGGER `compras_cli_BEFORE_INSERT` BEFORE INSERT ON `compras_cli` FOR EACH ROW BEGIN
	if(new.created_at = '' and New.updated_at = '') then
		set new.created_at = (select now());
		set new.updated_at = (select now());
    end if;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contact`
--

CREATE TABLE `contact` (
  `idContact` int(11) NOT NULL,
  `conNombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `conAsunto` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `conMail` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `contact`
--


--
-- Disparadores `contact`
--
DELIMITER $$
CREATE TRIGGER `contact_BEFORE_INSERT` BEFORE INSERT ON `contact` FOR EACH ROW BEGIN
	if(new.created_at = '' and New.updated_at = '') then
		set new.created_at = (select now());
		set new.updated_at = (select now());
    end if;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `idEmpresa` int(11) NOT NULL,
  `empNombre` varchar(65) COLLATE utf8_spanish2_ci NOT NULL,
  `empNit` bigint(14) NOT NULL,
  `empDireccion` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `empTelefono` bigint(10) NOT NULL,
  `idBarrioR` tinyint(4) NOT NULL,
  `idInfoR` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `empresa`
--


--
-- Disparadores `empresa`
--
DELIMITER $$
CREATE TRIGGER `empresa_AFTER_INSERT` AFTER INSERT ON `empresa` FOR EACH ROW BEGIN
	INSERT INTO `cant_vent` (`idCantVent`, `idEmpresaR`, `idVentR`, `created_at`, `updated_at`) VALUES (NULL, new.idEmpresa, 1, '', '');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `empresa_BEFORE_INSERT` BEFORE INSERT ON `empresa` FOR EACH ROW BEGIN
	if(new.created_at = '' and New.updated_at = '') then
		set new.created_at = (select now());
		set new.updated_at = (select now());
    end if;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emp_horario`
--

CREATE TABLE `emp_horario` (
  `idEmpHorario` int(11) NOT NULL,
  `erPrecio` int(6) NOT NULL,
  `erEstado` tinyint(1) NOT NULL,
  `idHoraR` int(6) NOT NULL,
  `idEmpVent` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `emp_horario`
--


--
-- Disparadores `emp_horario`
--
DELIMITER $$
CREATE TRIGGER `emp_horario_BEFORE_DELETE` BEFORE DELETE ON `emp_horario` FOR EACH ROW BEGIN
	DELETE FROM `compras_cli` WHERE `compras_cli`.`idEmpHorarioR` = old.idEmpHorario;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `emp_horario_BEFORE_INSERT` BEFORE INSERT ON `emp_horario` FOR EACH ROW BEGIN
	if(new.created_at = '' and New.updated_at = '') then
		set new.created_at = (select now());
		set new.updated_at = (select now());
    end if;
    set new.erEstado = 0;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emp_info`
--

CREATE TABLE `emp_info` (
  `idEmpInfo` int(11) NOT NULL,
  `empUsuario` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `empClave` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `correo` varchar(64) COLLATE utf8_spanish2_ci NOT NULL,
  `empImg` varchar(64) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `empDescripBreve` text COLLATE utf8_spanish2_ci DEFAULT NULL,
  `empDescripLarga` text COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `emp_info`
--


--
-- Disparadores `emp_info`
--
DELIMITER $$
CREATE TRIGGER `emp_info_BEFORE_INSERT` BEFORE INSERT ON `emp_info` FOR EACH ROW BEGIN
	if(new.created_at = '' and New.updated_at = '') then
		set new.created_at = (select now());
		set new.updated_at = (select now());
    end if;
	set new.empClave = PASSWORD(new.empClave);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `emp_info_BEFORE_UPDATE` BEFORE UPDATE ON `emp_info` FOR EACH ROW BEGIN
	if((select LENGTH(new.empClave) > 0)) then
		set new.empClave = PASSWORD(new.empClave);
    end if;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hora`
--

CREATE TABLE `hora` (
  `idHora` int(6) NOT NULL,
  `hora` time NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `hora`
--


--
-- Disparadores `hora`
--
DELIMITER $$
CREATE TRIGGER `hora_BEFORE_INSERT` BEFORE INSERT ON `hora` FOR EACH ROW BEGIN
	if(new.created_at = '' and New.updated_at = '') then
		set new.created_at = (select now());
		set new.updated_at = (select now());
    end if;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_cli`
--

CREATE TABLE `perfil_cli` (
  `idPerfilCli` int(11) NOT NULL,
  `perUsuario` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `perClave` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `perImg` varchar(64) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `perfil_cli`
--

INSERT INTO `perfil_cli` (`idPerfilCli`, `perUsuario`, `perClave`, `perImg`, `created_at`, `updated_at`) VALUES
(1, 'haritol', '*B6A94D8ED510A4CA6B23A06D65FB668C9F189F14', 'recursos/img/user/pp.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 'pePito', '*B6A94D8ED510A4CA6B23A06D65FB668C9F189F14', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 'Dante01', '*B6A94D8ED510A4CA6B23A06D65FB668C9F189F14', 'recursos/img/user/YT-P.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 'adyel01', '*B6A94D8ED510A4CA6B23A06D65FB668C9F189F14', 'recursos/img/user/adyel01-38.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 'ademm', '*B6A94D8ED510A4CA6B23A06D65FB668C9F189F14', NULL, '2020-08-25 22:07:34', '2020-08-25 22:07:34');

--
-- Disparadores `perfil_cli`
--
DELIMITER $$
CREATE TRIGGER `insertador` BEFORE INSERT ON `perfil_cli` FOR EACH ROW BEGIN
	if(new.created_at = '' and New.updated_at = '') then
		set new.created_at = (select now());
		set new.updated_at = (select now());
    end if;
	set new.perClave = PASSWORD(new.perClave);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `perfil_cli_BEFORE_UPDATE` BEFORE UPDATE ON `perfil_cli` FOR EACH ROW BEGIN
	if((select LENGTH(new.perClave) > 0)) then
		set new.perClave = PASSWORD(new.perClave);
    end if;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventanillas`
--

CREATE TABLE `ventanillas` (
  `idVentanillas` tinyint(25) NOT NULL,
  `VenNumero` tinyint(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ventanillas`
--


--
-- Disparadores `ventanillas`
--
DELIMITER $$
CREATE TRIGGER `ventanillas_BEFORE_INSERT` BEFORE INSERT ON `ventanillas` FOR EACH ROW BEGIN
	if(new.created_at = '' and New.updated_at = '') then
		set new.created_at = (select now());
		set new.updated_at = (select now());
    end if;
END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `barrio`
--
ALTER TABLE `barrio`
  ADD PRIMARY KEY (`idBarrio`);

--
-- Indices de la tabla `cant_vent`
--
ALTER TABLE `cant_vent`
  ADD PRIMARY KEY (`idCantVent`),
  ADD KEY `idEmpresa_idx` (`idEmpresaR`),
  ADD KEY `idVentanillas_idx` (`idVentR`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`),
  ADD KEY `idPerfilCli_idx` (`idPerfilR`),
  ADD KEY `idBarrio_idx` (`idBarRe`);

--
-- Indices de la tabla `compras_cli`
--
ALTER TABLE `compras_cli`
  ADD PRIMARY KEY (`idCompCli`),
  ADD KEY `idEmpHorario_idx` (`idEmpHorarioR`),
  ADD KEY `idCliente_idx` (`idClienteR`);

--
-- Indices de la tabla `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`idContact`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idEmpresa`),
  ADD KEY `idBarrio_idx` (`idBarrioR`),
  ADD KEY `idEmpInfo_idx` (`idInfoR`);

--
-- Indices de la tabla `emp_horario`
--
ALTER TABLE `emp_horario`
  ADD PRIMARY KEY (`idEmpHorario`),
  ADD KEY `idHora_idx` (`idHoraR`),
  ADD KEY `idEmpVent_idx` (`idEmpVent`);

--
-- Indices de la tabla `emp_info`
--
ALTER TABLE `emp_info`
  ADD PRIMARY KEY (`idEmpInfo`);

--
-- Indices de la tabla `hora`
--
ALTER TABLE `hora`
  ADD PRIMARY KEY (`idHora`);

--
-- Indices de la tabla `perfil_cli`
--
ALTER TABLE `perfil_cli`
  ADD PRIMARY KEY (`idPerfilCli`);

--
-- Indices de la tabla `ventanillas`
--
ALTER TABLE `ventanillas`
  ADD PRIMARY KEY (`idVentanillas`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `barrio`
--
ALTER TABLE `barrio`
  MODIFY `idBarrio` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT de la tabla `cant_vent`
--
ALTER TABLE `cant_vent`
  MODIFY `idCantVent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `compras_cli`
--
ALTER TABLE `compras_cli`
  MODIFY `idCompCli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `contact`
--
ALTER TABLE `contact`
  MODIFY `idContact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `emp_horario`
--
ALTER TABLE `emp_horario`
  MODIFY `idEmpHorario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `emp_info`
--
ALTER TABLE `emp_info`
  MODIFY `idEmpInfo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `hora`
--
ALTER TABLE `hora`
  MODIFY `idHora` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `perfil_cli`
--
ALTER TABLE `perfil_cli`
  MODIFY `idPerfilCli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cant_vent`
--
ALTER TABLE `cant_vent`
  ADD CONSTRAINT `idEmpresaR` FOREIGN KEY (`idEmpresaR`) REFERENCES `empresa` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idVentR` FOREIGN KEY (`idVentR`) REFERENCES `ventanillas` (`idVentanillas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `idBarRe` FOREIGN KEY (`idBarRe`) REFERENCES `barrio` (`idBarrio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idPerfilR` FOREIGN KEY (`idPerfilR`) REFERENCES `perfil_cli` (`idPerfilCli`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `compras_cli`
--
ALTER TABLE `compras_cli`
  ADD CONSTRAINT `idClienteR` FOREIGN KEY (`idClienteR`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idEmpHorarioR` FOREIGN KEY (`idEmpHorarioR`) REFERENCES `emp_horario` (`idEmpHorario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `idBarrioR` FOREIGN KEY (`idBarrioR`) REFERENCES `barrio` (`idBarrio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idInfoR` FOREIGN KEY (`idInfoR`) REFERENCES `emp_info` (`idEmpInfo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `emp_horario`
--
ALTER TABLE `emp_horario`
  ADD CONSTRAINT `idEmpVent` FOREIGN KEY (`idEmpVent`) REFERENCES `cant_vent` (`idCantVent`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idHoraR` FOREIGN KEY (`idHoraR`) REFERENCES `hora` (`idHora`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

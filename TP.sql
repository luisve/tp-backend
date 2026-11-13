-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.6.19-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando estructura para tabla TP.Clientes
CREATE TABLE IF NOT EXISTS `Clientes` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '',
  `RazonSocial` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '',
  `Domicilio` varchar(128) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '',
  `CUIT` varchar(11) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '',
  `Telefono` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '',
  `Email` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`Id`),
  KEY `Nombre` (`Nombre`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_mysql500_ci;

-- Volcando datos para la tabla TP.Clientes: 2 rows
/*!40000 ALTER TABLE `Clientes` DISABLE KEYS */;
REPLACE INTO `Clientes` (`Id`, `Nombre`, `RazonSocial`, `Domicilio`, `CUIT`, `Telefono`, `Email`) VALUES
	(1, 'Cliente 1', 'Cliente Uno RS', '', '00112223334', '', 'cliente@mail.com'),
	(2, 'Otro Cliente', 'Cliente ', 'Domicilio Client', '99887776665', '3434', 'mail@mail.com');
/*!40000 ALTER TABLE `Clientes` ENABLE KEYS */;

-- Volcando estructura para tabla TP.Pases
CREATE TABLE IF NOT EXISTS `Pases` (
  `Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `NumeroPase` int(11) DEFAULT NULL,
  `IdCliente` int(11) DEFAULT NULL,
  `Saldo` int(11) DEFAULT NULL COMMENT 'Saldo en pases',
  `FechaHoraAlta` datetime DEFAULT NULL,
  `IdUsuarioAlta` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`) USING BTREE,
  KEY `IdCliente` (`IdCliente`),
  KEY `FechaHoraAlta` (`FechaHoraAlta`),
  KEY `IdUsuarioAlta` (`IdUsuarioAlta`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla TP.Pases: 2 rows
/*!40000 ALTER TABLE `Pases` DISABLE KEYS */;
REPLACE INTO `Pases` (`Id`, `NumeroPase`, `IdCliente`, `Saldo`, `FechaHoraAlta`, `IdUsuarioAlta`) VALUES
	(1, 123, 2, 191, NULL, NULL),
	(2, 222, 2, 71, '2025-04-21 19:20:10', 1);
/*!40000 ALTER TABLE `Pases` ENABLE KEYS */;

-- Volcando estructura para tabla TP.PasesMovimientos
CREATE TABLE IF NOT EXISTS `PasesMovimientos` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdPase` int(11) DEFAULT NULL,
  `CantidadPases` int(11) DEFAULT NULL,
  `Saldo` int(11) DEFAULT NULL,
  `IdTipoMovimiento` int(11) DEFAULT NULL,
  `IdPaso` int(11) DEFAULT NULL,
  `PrecioUnitario` float DEFAULT NULL,
  `FechaHora` datetime DEFAULT NULL,
  `IdUsuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdUsuario` (`IdUsuario`),
  KEY `Fecha` (`FechaHora`) USING BTREE,
  KEY `IdTarjeta` (`IdPase`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla TP.PasesMovimientos: 18 rows
/*!40000 ALTER TABLE `PasesMovimientos` DISABLE KEYS */;
REPLACE INTO `PasesMovimientos` (`Id`, `IdPase`, `CantidadPases`, `Saldo`, `IdTipoMovimiento`, `IdPaso`, `PrecioUnitario`, `FechaHora`, `IdUsuario`) VALUES
	(1, 1, 200, 200, 1, 1, 5000, '2025-04-19 21:32:54', 1),
	(2, 1, 1, 199, 3, 1, 0, '2025-04-21 18:42:57', 1),
	(3, 1, 1, 198, 3, 1, 0, '2025-04-21 18:44:54', 1),
	(4, 1, 1, 197, 3, 1, 0, '2025-04-21 18:46:53', 1),
	(5, 1, 1, 196, 3, 1, 0, '2025-04-21 18:49:16', 1),
	(6, 1, 1, 195, 3, 1, 0, '2025-04-21 18:52:55', 1),
	(7, 1, 1, 194, 3, 1, 0, '2025-04-21 18:56:55', 1),
	(8, 1, 1, 193, 3, 1, 0, '2025-04-21 19:00:10', 1),
	(9, 1, 1, 192, 3, 1, 0, '2025-04-21 19:10:42', 1),
	(10, 1, 1, 191, 3, 1, 0, '2025-04-21 19:19:04', 1),
	(11, 1, 50, 50, 1, NULL, 3000, '2025-04-21 19:20:10', 1),
	(12, 2, 5, NULL, NULL, NULL, 3000, '2025-04-21 19:21:31', 1),
	(13, 2, 3, 0, 2, NULL, 3000, '2025-04-21 19:31:30', 1),
	(14, 2, 3, 0, 2, NULL, 3000, '2025-04-21 19:34:00', 1),
	(15, 2, 3, 0, 2, NULL, 3000, '2025-04-21 19:34:00', 1),
	(16, 2, 3, 0, 2, NULL, 3000, '2025-04-21 19:37:09', 1),
	(17, 2, 8, 72, 2, NULL, 3000, '2025-04-21 19:42:30', 1),
	(18, 2, 1, 71, 3, 1, 0, '2025-04-21 19:42:52', 1);
/*!40000 ALTER TABLE `PasesMovimientos` ENABLE KEYS */;

-- Volcando estructura para tabla TP.Pasos
CREATE TABLE IF NOT EXISTS `Pasos` (
  `Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(32) DEFAULT NULL COMMENT 'por ej, Salida Nacionales Paraná',
  `Obs` text DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Volcando datos para la tabla TP.Pasos: ~2 rows (aproximadamente)
REPLACE INTO `Pasos` (`Id`, `Nombre`, `Obs`) VALUES
	(1, 'PNA Salida Nac', 'Salida Líneas Nacionales'),
	(2, 'PNA Salidas Provinciales', 'Salida de líneas provinciales');

-- Volcando estructura para tabla TP.TipoMovimiento
CREATE TABLE IF NOT EXISTS `TipoMovimiento` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(32) DEFAULT NULL,
  `Codigo` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `Nombre` (`Nombre`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Volcando datos para la tabla TP.TipoMovimiento: 3 rows
/*!40000 ALTER TABLE `TipoMovimiento` DISABLE KEYS */;
REPLACE INTO `TipoMovimiento` (`Id`, `Nombre`, `Codigo`) VALUES
	(1, 'Alta de Tarjeta', 'ALTA'),
	(2, 'Carga de Saldo', 'CSAL'),
	(3, 'Egreso Terminal', 'EGRE');
/*!40000 ALTER TABLE `TipoMovimiento` ENABLE KEYS */;

-- Volcando estructura para tabla TP.Usuarios
CREATE TABLE IF NOT EXISTS `Usuarios` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(32) NOT NULL DEFAULT '',
  `Apellido` varchar(32) NOT NULL DEFAULT '',
  `Email` varchar(64) DEFAULT '',
  `Usuario` varchar(32) NOT NULL DEFAULT '',
  `Password` varchar(128) NOT NULL DEFAULT '',
  `Telefono` varchar(32) DEFAULT '',
  `Domicilio` varchar(64) DEFAULT '',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Email` (`Email`) USING BTREE,
  KEY `Apellido` (`Apellido`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Volcando datos para la tabla TP.Usuarios: 11 rows
/*!40000 ALTER TABLE `Usuarios` DISABLE KEYS */;
REPLACE INTO `Usuarios` (`Id`, `Nombre`, `Apellido`, `Email`, `Usuario`, `Password`, `Telefono`, `Domicilio`) VALUES
	(1, 'Super', 'Visor', NULL, 'supervisor', '$2y$10$zB2hPFJFhLXcjDAmL9VzQe/XGTKgu.kHplbDXfSWBLrWEFntHfW', NULL, NULL),
	(2, 'Luis', 'Vera', '1', 'luis', '', '34', ''),
	(3, 'veraluis', 'vera', '2', 'veraluis', '', '', ''),
	(4, 'Nombre Usuario 2', 'Apellido Usuario2', 'emailUser@mail', 'Usuario2', '', '343', 'Domicilio Usuairo 2'),
	(5, 'nombre nuevo', ' apellido nuevo', 'emailnuevo', 'user nuevo', '', 'telefono nuevo', 'domicilio nuevo'),
	(6, 'otro nombre', 'otro apellido', 'otro email', 'otro', '', 'otro telefono', 'otro domicilio'),
	(7, 'dd', 'dd', 'dd', 'dd', '', 'dd', 'dd'),
	(8, 'ff', 'ff', 'ff', 'ff', '', 'ff', 'ff'),
	(9, 'aa', 'aa', 'aa', 'aa', '', 'aa', 'aa'),
	(10, 'f', 'd', 'd', 'a', '', 'd', 'd'),
	(11, 'aa', 'aa', 'aa@aa.com', 'aa', '', 'aa', 'aa');
/*!40000 ALTER TABLE `Usuarios` ENABLE KEYS */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

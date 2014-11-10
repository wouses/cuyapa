/*
Navicat MySQL Data Transfer

Source Server         : BD
Source Server Version : 50612
Source Host           : 127.0.0.1:3306
Source Database       : cuyapa

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2014-10-15 12:11:06
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for administradores
-- ----------------------------
DROP TABLE IF EXISTS `administradores`;
CREATE TABLE `administradores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `cedula` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `institucion` varchar(255) NOT NULL,
  `cargo` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of administradores
-- ----------------------------

-- ----------------------------
-- Table structure for anunciantes
-- ----------------------------
DROP TABLE IF EXISTS `anunciantes`;
CREATE TABLE `anunciantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `texto` mediumtext NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `direccion` mediumtext NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of anunciantes
-- ----------------------------

-- ----------------------------
-- Table structure for calidad_cosechas
-- ----------------------------
DROP TABLE IF EXISTS `calidad_cosechas`;
CREATE TABLE `calidad_cosechas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produccion_cosecha` int(11) NOT NULL,
  `calidad` varchar(255) NOT NULL,
  `cantidad` float(11,2) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of calidad_cosechas
-- ----------------------------
INSERT INTO `calidad_cosechas` VALUES ('1', '1', '1era', '100.00', '0');
INSERT INTO `calidad_cosechas` VALUES ('2', '2', 'Sin Calificar', '2200.00', '0');
INSERT INTO `calidad_cosechas` VALUES ('3', '3', 'Sin Calificar', '2000.00', '0');
INSERT INTO `calidad_cosechas` VALUES ('4', '4', 'Sin Calificar', '790.00', '0');

-- ----------------------------
-- Table structure for calidad_cosechas_temp
-- ----------------------------
DROP TABLE IF EXISTS `calidad_cosechas_temp`;
CREATE TABLE `calidad_cosechas_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_random` int(11) NOT NULL,
  `id_produccion` int(11) NOT NULL,
  `calidad` varchar(255) NOT NULL,
  `cantidad` float(11,2) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of calidad_cosechas_temp
-- ----------------------------
INSERT INTO `calidad_cosechas_temp` VALUES ('1', '130', '1', '1era', '100.00', '0');
INSERT INTO `calidad_cosechas_temp` VALUES ('2', '235', '2', 'Sin Calificar', '2200.00', '0');
INSERT INTO `calidad_cosechas_temp` VALUES ('3', '282', '3', 'Sin Calificar', '2000.00', '0');
INSERT INTO `calidad_cosechas_temp` VALUES ('4', '744', '4', 'Sin Calificar', '790.00', '0');

-- ----------------------------
-- Table structure for categorias
-- ----------------------------
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categorias
-- ----------------------------
INSERT INTO `categorias` VALUES ('1', 'Cereales', '0');
INSERT INTO `categorias` VALUES ('2', 'Hortalizas', '0');
INSERT INTO `categorias` VALUES ('3', 'Raices y Tuberculos', '0');
INSERT INTO `categorias` VALUES ('4', 'Frutas', '0');
INSERT INTO `categorias` VALUES ('5', 'Leguminosas', '0');

-- ----------------------------
-- Table structure for clientes_distribucion
-- ----------------------------
DROP TABLE IF EXISTS `clientes_distribucion`;
CREATE TABLE `clientes_distribucion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_productor` int(11) NOT NULL,
  `tipo_cedula_rif` varchar(255) NOT NULL,
  `cedula_rif` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `direccion` mediumtext NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of clientes_distribucion
-- ----------------------------
INSERT INTO `clientes_distribucion` VALUES ('1', '1', 'E', '123123123', 'ma', 'asd', '0');

-- ----------------------------
-- Table structure for comentarios
-- ----------------------------
DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(255) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `sentimiento` varchar(255) NOT NULL,
  `asunto` varchar(255) NOT NULL,
  `opinion` mediumtext NOT NULL,
  `ubicacion` varchar(255) NOT NULL,
  `sistema_operativo` varchar(255) NOT NULL,
  `navegador` varchar(255) NOT NULL,
  `version` varchar(255) NOT NULL,
  `fecha` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comentarios
-- ----------------------------

-- ----------------------------
-- Table structure for contacto
-- ----------------------------
DROP TABLE IF EXISTS `contacto`;
CREATE TABLE `contacto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(255) DEFAULT NULL,
  `solicitud` varchar(255) DEFAULT NULL,
  `mensaje` text,
  `sistema_operativo` varchar(255) DEFAULT NULL,
  `navegador` varchar(255) DEFAULT NULL,
  `version` varchar(255) DEFAULT NULL,
  `fecha` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of contacto
-- ----------------------------

-- ----------------------------
-- Table structure for coordinadores
-- ----------------------------
DROP TABLE IF EXISTS `coordinadores`;
CREATE TABLE `coordinadores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `cedula` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `institucion` varchar(255) NOT NULL,
  `cargo` varchar(255) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of coordinadores
-- ----------------------------
INSERT INTO `coordinadores` VALUES ('1', '2', '11111111', 'Carlos Zambrano', 'MPPAT', '', '40', '4', '0', '', '1');

-- ----------------------------
-- Table structure for distribuciones
-- ----------------------------
DROP TABLE IF EXISTS `distribuciones`;
CREATE TABLE `distribuciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_productor` int(11) NOT NULL,
  `id_cliente_distribucion` int(11) NOT NULL,
  `fecha` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of distribuciones
-- ----------------------------

-- ----------------------------
-- Table structure for estados
-- ----------------------------
DROP TABLE IF EXISTS `estados`;
CREATE TABLE `estados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `poblacion` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of estados
-- ----------------------------
INSERT INTO `estados` VALUES ('1', 'Amazonas', '0', '0');
INSERT INTO `estados` VALUES ('2', 'Anzo', '0', '0');
INSERT INTO `estados` VALUES ('3', 'Apure', '0', '0');
INSERT INTO `estados` VALUES ('4', 'Aragua', '0', '0');
INSERT INTO `estados` VALUES ('5', 'Barinas', '0', '0');
INSERT INTO `estados` VALUES ('6', 'Bolivar', '0', '0');
INSERT INTO `estados` VALUES ('7', 'Carabobo', '0', '0');
INSERT INTO `estados` VALUES ('8', 'Cojedes', '0', '0');
INSERT INTO `estados` VALUES ('9', 'Delta Amacuro', '0', '0');
INSERT INTO `estados` VALUES ('10', 'Falcon', '0', '0');
INSERT INTO `estados` VALUES ('11', 'Gu', '0', '0');
INSERT INTO `estados` VALUES ('12', 'Lara', '0', '0');
INSERT INTO `estados` VALUES ('13', 'M', '0', '0');
INSERT INTO `estados` VALUES ('14', 'Miranda', '0', '0');
INSERT INTO `estados` VALUES ('15', 'Monagas', '0', '0');
INSERT INTO `estados` VALUES ('16', 'Nueva Esparta', '0', '0');
INSERT INTO `estados` VALUES ('17', 'Portuguesa', '0', '0');
INSERT INTO `estados` VALUES ('18', 'Sucre', '0', '0');
INSERT INTO `estados` VALUES ('19', 'T', '0', '0');
INSERT INTO `estados` VALUES ('20', 'Trujillo', '0', '0');
INSERT INTO `estados` VALUES ('21', 'Vargas', '0', '0');
INSERT INTO `estados` VALUES ('22', 'Yaracuy', '0', '0');
INSERT INTO `estados` VALUES ('23', 'Zulia', '0', '0');
INSERT INTO `estados` VALUES ('24', 'Distrito Capital', '0', '0');
INSERT INTO `estados` VALUES ('25', 'Dependencias Federales', '0', '0');

-- ----------------------------
-- Table structure for guias
-- ----------------------------
DROP TABLE IF EXISTS `guias`;
CREATE TABLE `guias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `categoria` varchar(25) NOT NULL,
  `subcategoria` varchar(25) NOT NULL,
  `ruta` varchar(255) NOT NULL,
  `fecha` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of guias
-- ----------------------------

-- ----------------------------
-- Table structure for inventario
-- ----------------------------
DROP TABLE IF EXISTS `inventario`;
CREATE TABLE `inventario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_productor` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_modalidad` int(11) NOT NULL,
  `id_uso` int(11) NOT NULL,
  `calidad` varchar(255) NOT NULL,
  `cantidad` float(11,2) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of inventario
-- ----------------------------
INSERT INTO `inventario` VALUES ('1', '1', '8', '2', '2', '1era', '100.00', '0');
INSERT INTO `inventario` VALUES ('2', '18', '37', '1', '2', 'Sin Calificar', '2200.00', '0');
INSERT INTO `inventario` VALUES ('3', '18', '50', '1', '2', 'Sin Calificar', '2000.00', '0');
INSERT INTO `inventario` VALUES ('4', '18', '51', '1', '2', 'Sin Calificar', '790.00', '0');

-- ----------------------------
-- Table structure for mensajes_productor
-- ----------------------------
DROP TABLE IF EXISTS `mensajes_productor`;
CREATE TABLE `mensajes_productor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `mensaje` text,
  `fecha` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mensajes_productor
-- ----------------------------

-- ----------------------------
-- Table structure for modalidades
-- ----------------------------
DROP TABLE IF EXISTS `modalidades`;
CREATE TABLE `modalidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of modalidades
-- ----------------------------
INSERT INTO `modalidades` VALUES ('1', 'Ninguna', '1');
INSERT INTO `modalidades` VALUES ('2', 'Dulce', '1');
INSERT INTO `modalidades` VALUES ('3', 'Amarga', '1');
INSERT INTO `modalidades` VALUES ('4', 'Picante', '1');
INSERT INTO `modalidades` VALUES ('6', 'Grano', '1');
INSERT INTO `modalidades` VALUES ('7', 'Jojoto', '1');

-- ----------------------------
-- Table structure for modalidad_uso_productos
-- ----------------------------
DROP TABLE IF EXISTS `modalidad_uso_productos`;
CREATE TABLE `modalidad_uso_productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `id_modalidad` int(11) NOT NULL,
  `id_uso` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of modalidad_uso_productos
-- ----------------------------
INSERT INTO `modalidad_uso_productos` VALUES ('1', '1', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('2', '4', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('3', '6', '2', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('4', '7', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('5', '7', '3', '3', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('6', '1', '6', '3', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('7', '2', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('8', '3', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('9', '4', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('10', '5', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('11', '6', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('12', '7', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('13', '8', '2', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('14', '8', '4', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('15', '9', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('16', '10', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('17', '11', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('18', '12', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('19', '13', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('20', '14', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('21', '15', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('22', '16', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('23', '17', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('24', '18', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('25', '19', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('26', '20', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('27', '21', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('28', '22', '7', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('29', '23', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('30', '24', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('31', '25', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('32', '26', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('33', '27', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('34', '28', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('35', '29', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('36', '29', '1', '3', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('37', '30', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('38', '31', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('39', '32', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('40', '33', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('41', '34', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('42', '35', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('43', '35', '1', '3', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('44', '36', '2', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('45', '36', '3', '3', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('46', '37', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('47', '38', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('48', '39', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('49', '40', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('50', '41', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('51', '42', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('52', '43', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('53', '44', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('54', '45', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('55', '46', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('56', '47', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('57', '48', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('58', '49', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('59', '50', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('60', '51', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('61', '52', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('62', '53', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('63', '54', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('64', '55', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('65', '56', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('66', '57', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('67', '58', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('68', '59', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('69', '60', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('70', '61', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('71', '62', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('72', '63', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('73', '64', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('74', '65', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('75', '66', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('76', '67', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('77', '68', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('78', '69', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('79', '70', '1', '2', '0');
INSERT INTO `modalidad_uso_productos` VALUES ('80', '71', '1', '2', '0');

-- ----------------------------
-- Table structure for modalidad_uso_temp
-- ----------------------------
DROP TABLE IF EXISTS `modalidad_uso_temp`;
CREATE TABLE `modalidad_uso_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_random` int(11) NOT NULL,
  `id_modalidad` int(11) NOT NULL,
  `id_uso` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of modalidad_uso_temp
-- ----------------------------

-- ----------------------------
-- Table structure for municipios
-- ----------------------------
DROP TABLE IF EXISTS `municipios`;
CREATE TABLE `municipios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_estado` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `poblacion` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_estado` (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=463 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of municipios
-- ----------------------------
INSERT INTO `municipios` VALUES ('1', '1', 'Alto Orinoco', '0', '0');
INSERT INTO `municipios` VALUES ('2', '1', 'Atabapo', '0', '0');
INSERT INTO `municipios` VALUES ('3', '1', 'Atures', '0', '0');
INSERT INTO `municipios` VALUES ('4', '1', 'Autana', '0', '0');
INSERT INTO `municipios` VALUES ('5', '1', 'Manapiare', '0', '0');
INSERT INTO `municipios` VALUES ('6', '1', 'Maroa', '0', '0');
INSERT INTO `municipios` VALUES ('7', '1', 'R', '0', '0');
INSERT INTO `municipios` VALUES ('8', '2', 'Anaco', '0', '0');
INSERT INTO `municipios` VALUES ('9', '2', 'Aragua', '0', '0');
INSERT INTO `municipios` VALUES ('10', '2', 'Manuel Ezequiel Bruzual', '0', '0');
INSERT INTO `municipios` VALUES ('11', '2', 'Diego Bautista Urbaneja', '0', '0');
INSERT INTO `municipios` VALUES ('12', '2', 'Fernando Pe', '0', '0');
INSERT INTO `municipios` VALUES ('13', '2', 'Francisco Del Carmen Carvajal', '0', '0');
INSERT INTO `municipios` VALUES ('14', '2', 'General Sir Arthur McGregor', '0', '0');
INSERT INTO `municipios` VALUES ('15', '2', 'Guanta', '0', '0');
INSERT INTO `municipios` VALUES ('16', '2', 'Independencia', '0', '0');
INSERT INTO `municipios` VALUES ('17', '2', 'Jos', '0', '0');
INSERT INTO `municipios` VALUES ('18', '2', 'Juan Antonio Sotillo', '0', '0');
INSERT INTO `municipios` VALUES ('19', '2', 'Juan Manuel Cajigal', '0', '0');
INSERT INTO `municipios` VALUES ('20', '2', 'Libertad', '0', '0');
INSERT INTO `municipios` VALUES ('21', '2', 'Francisco de Miranda', '0', '0');
INSERT INTO `municipios` VALUES ('22', '2', 'Pedro Mar', '0', '0');
INSERT INTO `municipios` VALUES ('23', '2', 'P', '0', '0');
INSERT INTO `municipios` VALUES ('24', '2', 'San Jos', '0', '0');
INSERT INTO `municipios` VALUES ('25', '2', 'San Juan de Capistrano', '0', '0');
INSERT INTO `municipios` VALUES ('26', '2', 'Santa Ana', '0', '0');
INSERT INTO `municipios` VALUES ('27', '2', 'Sim', '0', '0');
INSERT INTO `municipios` VALUES ('28', '2', 'Sim', '0', '0');
INSERT INTO `municipios` VALUES ('29', '3', 'Achaguas', '0', '0');
INSERT INTO `municipios` VALUES ('30', '3', 'Biruaca', '0', '0');
INSERT INTO `municipios` VALUES ('31', '3', 'Mu', '0', '0');
INSERT INTO `municipios` VALUES ('32', '3', 'P', '0', '0');
INSERT INTO `municipios` VALUES ('33', '3', 'Pedro Camejo', '0', '0');
INSERT INTO `municipios` VALUES ('34', '3', 'R', '0', '0');
INSERT INTO `municipios` VALUES ('35', '3', 'San Fernando', '0', '0');
INSERT INTO `municipios` VALUES ('36', '4', 'Atanasio Girardot', '0', '0');
INSERT INTO `municipios` VALUES ('37', '4', 'Bol', '0', '0');
INSERT INTO `municipios` VALUES ('38', '4', 'Camatagua', '0', '0');
INSERT INTO `municipios` VALUES ('39', '4', 'Francisco Linares Alc', '0', '0');
INSERT INTO `municipios` VALUES ('40', '4', 'Jose Felix Ribas', '0', '0');
INSERT INTO `municipios` VALUES ('41', '4', 'Jos', '0', '0');
INSERT INTO `municipios` VALUES ('42', '4', 'Jos', '0', '0');
INSERT INTO `municipios` VALUES ('43', '4', 'Libertador', '0', '0');
INSERT INTO `municipios` VALUES ('44', '4', 'Mario Brice', '0', '0');
INSERT INTO `municipios` VALUES ('45', '4', 'Ocumare de la Costa de Oro', '0', '0');
INSERT INTO `municipios` VALUES ('46', '4', 'San Casimiro', '0', '0');
INSERT INTO `municipios` VALUES ('47', '4', 'San Sebasti', '0', '0');
INSERT INTO `municipios` VALUES ('48', '4', 'Santiago Mari', '0', '0');
INSERT INTO `municipios` VALUES ('49', '4', 'Santos Michelena', '0', '0');
INSERT INTO `municipios` VALUES ('50', '4', 'Sucre', '0', '0');
INSERT INTO `municipios` VALUES ('51', '4', 'Tovar', '0', '0');
INSERT INTO `municipios` VALUES ('52', '4', 'Urdaneta', '0', '0');
INSERT INTO `municipios` VALUES ('53', '4', 'Zamora', '0', '0');
INSERT INTO `municipios` VALUES ('54', '5', 'Alberto Arvelo Torrealba', '0', '0');
INSERT INTO `municipios` VALUES ('55', '5', 'Andr', '0', '0');
INSERT INTO `municipios` VALUES ('56', '5', 'Antonio Jos', '0', '0');
INSERT INTO `municipios` VALUES ('57', '5', 'Arismendi', '0', '0');
INSERT INTO `municipios` VALUES ('58', '5', 'Barinas', '0', '0');
INSERT INTO `municipios` VALUES ('59', '5', 'Bol', '0', '0');
INSERT INTO `municipios` VALUES ('60', '5', 'Cruz Paredes', '0', '0');
INSERT INTO `municipios` VALUES ('61', '5', 'Ezequiel Zamora', '0', '0');
INSERT INTO `municipios` VALUES ('62', '5', 'Obispos', '0', '0');
INSERT INTO `municipios` VALUES ('63', '5', 'Pedraza', '0', '0');
INSERT INTO `municipios` VALUES ('64', '5', 'Rojas', '0', '0');
INSERT INTO `municipios` VALUES ('65', '5', 'Sosa', '0', '0');
INSERT INTO `municipios` VALUES ('66', '6', 'Caron', '0', '0');
INSERT INTO `municipios` VALUES ('67', '6', 'Cede', '0', '0');
INSERT INTO `municipios` VALUES ('68', '6', 'El Callao', '0', '0');
INSERT INTO `municipios` VALUES ('69', '6', 'Gran Sabana', '0', '0');
INSERT INTO `municipios` VALUES ('70', '6', 'Heres', '0', '0');
INSERT INTO `municipios` VALUES ('71', '6', 'Piar', '0', '0');
INSERT INTO `municipios` VALUES ('72', '6', 'Angostura (Ra', '0', '0');
INSERT INTO `municipios` VALUES ('73', '6', 'Roscio', '0', '0');
INSERT INTO `municipios` VALUES ('74', '6', 'Sifontes', '0', '0');
INSERT INTO `municipios` VALUES ('75', '6', 'Sucre', '0', '0');
INSERT INTO `municipios` VALUES ('76', '6', 'Padre Pedro Chien', '0', '0');
INSERT INTO `municipios` VALUES ('77', '7', 'Bejuma', '0', '0');
INSERT INTO `municipios` VALUES ('78', '7', 'Carlos Arvelo', '0', '0');
INSERT INTO `municipios` VALUES ('79', '7', 'Diego Ibarra', '0', '0');
INSERT INTO `municipios` VALUES ('80', '7', 'Guacara', '0', '0');
INSERT INTO `municipios` VALUES ('81', '7', 'Juan Jos', '0', '0');
INSERT INTO `municipios` VALUES ('82', '7', 'Libertador', '0', '0');
INSERT INTO `municipios` VALUES ('83', '7', 'Los Guayos', '0', '0');
INSERT INTO `municipios` VALUES ('84', '7', 'Miranda', '0', '0');
INSERT INTO `municipios` VALUES ('85', '7', 'Montalb', '0', '0');
INSERT INTO `municipios` VALUES ('86', '7', 'Naguanagua', '0', '0');
INSERT INTO `municipios` VALUES ('87', '7', 'Puerto Cabello', '0', '0');
INSERT INTO `municipios` VALUES ('88', '7', 'San Diego', '0', '0');
INSERT INTO `municipios` VALUES ('89', '7', 'San Joaqu', '0', '0');
INSERT INTO `municipios` VALUES ('90', '7', 'Valencia', '0', '0');
INSERT INTO `municipios` VALUES ('91', '8', 'Anzo', '0', '0');
INSERT INTO `municipios` VALUES ('92', '8', 'Tinaquillo', '0', '0');
INSERT INTO `municipios` VALUES ('93', '8', 'Girardot', '0', '0');
INSERT INTO `municipios` VALUES ('94', '8', 'Lima Blanco', '0', '0');
INSERT INTO `municipios` VALUES ('95', '8', 'Pao de San Juan Bautista', '0', '0');
INSERT INTO `municipios` VALUES ('96', '8', 'Ricaurte', '0', '0');
INSERT INTO `municipios` VALUES ('97', '8', 'R', '0', '0');
INSERT INTO `municipios` VALUES ('98', '8', 'San Carlos', '0', '0');
INSERT INTO `municipios` VALUES ('99', '8', 'Tinaco', '0', '0');
INSERT INTO `municipios` VALUES ('100', '9', 'Antonio D', '0', '0');
INSERT INTO `municipios` VALUES ('101', '9', 'Casacoima', '0', '0');
INSERT INTO `municipios` VALUES ('102', '9', 'Pedernales', '0', '0');
INSERT INTO `municipios` VALUES ('103', '9', 'Tucupita', '0', '0');
INSERT INTO `municipios` VALUES ('104', '10', 'Acosta', '0', '0');
INSERT INTO `municipios` VALUES ('105', '10', 'Bol', '0', '0');
INSERT INTO `municipios` VALUES ('106', '10', 'Buchivacoa', '0', '0');
INSERT INTO `municipios` VALUES ('107', '10', 'Cacique Manaure', '0', '0');
INSERT INTO `municipios` VALUES ('108', '10', 'Carirubana', '0', '0');
INSERT INTO `municipios` VALUES ('109', '10', 'Colina', '0', '0');
INSERT INTO `municipios` VALUES ('110', '10', 'Dabajuro', '0', '0');
INSERT INTO `municipios` VALUES ('111', '10', 'Democracia', '0', '0');
INSERT INTO `municipios` VALUES ('112', '10', 'Falc', '0', '0');
INSERT INTO `municipios` VALUES ('113', '10', 'Federaci', '0', '0');
INSERT INTO `municipios` VALUES ('114', '10', 'Jacura', '0', '0');
INSERT INTO `municipios` VALUES ('115', '10', 'Jos', '0', '0');
INSERT INTO `municipios` VALUES ('116', '10', 'Los Taques', '0', '0');
INSERT INTO `municipios` VALUES ('117', '10', 'Mauroa', '0', '0');
INSERT INTO `municipios` VALUES ('118', '10', 'Miranda', '0', '0');
INSERT INTO `municipios` VALUES ('119', '10', 'Monse', '0', '0');
INSERT INTO `municipios` VALUES ('120', '10', 'Palmasola', '0', '0');
INSERT INTO `municipios` VALUES ('121', '10', 'Petit', '0', '0');
INSERT INTO `municipios` VALUES ('122', '10', 'P', '0', '0');
INSERT INTO `municipios` VALUES ('123', '10', 'San Francisco', '0', '0');
INSERT INTO `municipios` VALUES ('124', '10', 'Sucre', '0', '0');
INSERT INTO `municipios` VALUES ('125', '10', 'Toc', '0', '0');
INSERT INTO `municipios` VALUES ('126', '10', 'Uni', '0', '0');
INSERT INTO `municipios` VALUES ('127', '10', 'Urumaco', '0', '0');
INSERT INTO `municipios` VALUES ('128', '10', 'Zamora', '0', '0');
INSERT INTO `municipios` VALUES ('129', '11', 'Camagu', '0', '0');
INSERT INTO `municipios` VALUES ('130', '11', 'Chaguaramas', '0', '0');
INSERT INTO `municipios` VALUES ('131', '11', 'El Socorro', '0', '0');
INSERT INTO `municipios` VALUES ('132', '11', 'Jos', '0', '0');
INSERT INTO `municipios` VALUES ('133', '11', 'Jos', '0', '0');
INSERT INTO `municipios` VALUES ('134', '11', 'Juan Germ', '0', '0');
INSERT INTO `municipios` VALUES ('135', '11', 'Juli', '0', '0');
INSERT INTO `municipios` VALUES ('136', '11', 'Las Mercedes', '0', '0');
INSERT INTO `municipios` VALUES ('137', '11', 'Leonardo Infante', '0', '0');
INSERT INTO `municipios` VALUES ('138', '11', 'Pedro Zaraza', '0', '0');
INSERT INTO `municipios` VALUES ('139', '11', 'Ort', '0', '0');
INSERT INTO `municipios` VALUES ('140', '11', 'San Ger', '0', '0');
INSERT INTO `municipios` VALUES ('141', '11', 'San Jos', '0', '0');
INSERT INTO `municipios` VALUES ('142', '11', 'Santa Mar', '0', '0');
INSERT INTO `municipios` VALUES ('143', '11', 'Sebasti', '0', '0');
INSERT INTO `municipios` VALUES ('144', '12', 'Andr', '0', '0');
INSERT INTO `municipios` VALUES ('145', '12', 'Crespo', '0', '0');
INSERT INTO `municipios` VALUES ('146', '12', 'Iribarren', '0', '0');
INSERT INTO `municipios` VALUES ('147', '12', 'Jim', '0', '0');
INSERT INTO `municipios` VALUES ('148', '12', 'Mor', '0', '0');
INSERT INTO `municipios` VALUES ('149', '12', 'Palavecino', '0', '0');
INSERT INTO `municipios` VALUES ('150', '12', 'Sim', '0', '0');
INSERT INTO `municipios` VALUES ('151', '12', 'Torres', '0', '0');
INSERT INTO `municipios` VALUES ('152', '12', 'Urdaneta', '0', '0');
INSERT INTO `municipios` VALUES ('179', '13', 'Alberto Adriani', '0', '0');
INSERT INTO `municipios` VALUES ('180', '13', 'Andr', '0', '0');
INSERT INTO `municipios` VALUES ('181', '13', 'Antonio Pinto Salinas', '0', '0');
INSERT INTO `municipios` VALUES ('182', '13', 'Aricagua', '0', '0');
INSERT INTO `municipios` VALUES ('183', '13', 'Arzobispo Chac', '0', '0');
INSERT INTO `municipios` VALUES ('184', '13', 'Campo El', '0', '0');
INSERT INTO `municipios` VALUES ('185', '13', 'Caracciolo Parra Olmedo', '0', '0');
INSERT INTO `municipios` VALUES ('186', '13', 'Cardenal Quintero', '0', '0');
INSERT INTO `municipios` VALUES ('187', '13', 'Guaraque', '0', '0');
INSERT INTO `municipios` VALUES ('188', '13', 'Julio C', '0', '0');
INSERT INTO `municipios` VALUES ('189', '13', 'Justo Brice', '0', '0');
INSERT INTO `municipios` VALUES ('190', '13', 'Libertador', '0', '0');
INSERT INTO `municipios` VALUES ('191', '13', 'Miranda', '0', '0');
INSERT INTO `municipios` VALUES ('192', '13', 'Obispo Ramos de Lora', '0', '0');
INSERT INTO `municipios` VALUES ('193', '13', 'Padre Noguera', '0', '0');
INSERT INTO `municipios` VALUES ('194', '13', 'Pueblo Llano', '0', '0');
INSERT INTO `municipios` VALUES ('195', '13', 'Rangel', '0', '0');
INSERT INTO `municipios` VALUES ('196', '13', 'Rivas D', '0', '0');
INSERT INTO `municipios` VALUES ('197', '13', 'Santos Marquina', '0', '0');
INSERT INTO `municipios` VALUES ('198', '13', 'Sucre', '0', '0');
INSERT INTO `municipios` VALUES ('199', '13', 'Tovar', '0', '0');
INSERT INTO `municipios` VALUES ('200', '13', 'Tulio Febres Cordero', '0', '0');
INSERT INTO `municipios` VALUES ('201', '13', 'Zea', '0', '0');
INSERT INTO `municipios` VALUES ('223', '14', 'Acevedo', '0', '0');
INSERT INTO `municipios` VALUES ('224', '14', 'Andr', '0', '0');
INSERT INTO `municipios` VALUES ('225', '14', 'Baruta', '0', '0');
INSERT INTO `municipios` VALUES ('226', '14', 'Bri', '0', '0');
INSERT INTO `municipios` VALUES ('227', '14', 'Buroz', '0', '0');
INSERT INTO `municipios` VALUES ('228', '14', 'Carrizal', '0', '0');
INSERT INTO `municipios` VALUES ('229', '14', 'Chacao', '0', '0');
INSERT INTO `municipios` VALUES ('230', '14', 'Crist', '0', '0');
INSERT INTO `municipios` VALUES ('231', '14', 'El Hatillo', '0', '0');
INSERT INTO `municipios` VALUES ('232', '14', 'Guaicaipuro', '0', '0');
INSERT INTO `municipios` VALUES ('233', '14', 'Independencia', '0', '0');
INSERT INTO `municipios` VALUES ('234', '14', 'Lander', '0', '0');
INSERT INTO `municipios` VALUES ('235', '14', 'Los Salias', '0', '0');
INSERT INTO `municipios` VALUES ('236', '14', 'P', '0', '0');
INSERT INTO `municipios` VALUES ('237', '14', 'Paz Castillo', '0', '0');
INSERT INTO `municipios` VALUES ('238', '14', 'Pedro Gual', '0', '0');
INSERT INTO `municipios` VALUES ('239', '14', 'Plaza', '0', '0');
INSERT INTO `municipios` VALUES ('240', '14', 'Sim', '0', '0');
INSERT INTO `municipios` VALUES ('241', '14', 'Sucre', '0', '0');
INSERT INTO `municipios` VALUES ('242', '14', 'Urdaneta', '0', '0');
INSERT INTO `municipios` VALUES ('243', '14', 'Zamora', '0', '0');
INSERT INTO `municipios` VALUES ('258', '15', 'Acosta', '0', '0');
INSERT INTO `municipios` VALUES ('259', '15', 'Aguasay', '0', '0');
INSERT INTO `municipios` VALUES ('260', '15', 'Bol', '0', '0');
INSERT INTO `municipios` VALUES ('261', '15', 'Caripe', '0', '0');
INSERT INTO `municipios` VALUES ('262', '15', 'Cede', '0', '0');
INSERT INTO `municipios` VALUES ('263', '15', 'Ezequiel Zamora', '0', '0');
INSERT INTO `municipios` VALUES ('264', '15', 'Libertador', '0', '0');
INSERT INTO `municipios` VALUES ('265', '15', 'Matur', '0', '0');
INSERT INTO `municipios` VALUES ('266', '15', 'Piar', '0', '0');
INSERT INTO `municipios` VALUES ('267', '15', 'Punceres', '0', '0');
INSERT INTO `municipios` VALUES ('268', '15', 'Santa B', '0', '0');
INSERT INTO `municipios` VALUES ('269', '15', 'Sotillo', '0', '0');
INSERT INTO `municipios` VALUES ('270', '15', 'Uracoa', '0', '0');
INSERT INTO `municipios` VALUES ('271', '16', 'Antol', '0', '0');
INSERT INTO `municipios` VALUES ('272', '16', 'Arismendi', '0', '0');
INSERT INTO `municipios` VALUES ('273', '16', 'Garc', '0', '0');
INSERT INTO `municipios` VALUES ('274', '16', 'G', '0', '0');
INSERT INTO `municipios` VALUES ('275', '16', 'Maneiro', '0', '0');
INSERT INTO `municipios` VALUES ('276', '16', 'Marcano', '0', '0');
INSERT INTO `municipios` VALUES ('277', '16', 'Mari', '0', '0');
INSERT INTO `municipios` VALUES ('278', '16', 'Pen', '0', '0');
INSERT INTO `municipios` VALUES ('279', '16', 'Tubores', '0', '0');
INSERT INTO `municipios` VALUES ('280', '16', 'Villalba', '0', '0');
INSERT INTO `municipios` VALUES ('281', '16', 'D', '0', '0');
INSERT INTO `municipios` VALUES ('282', '17', 'Agua Blanca', '0', '0');
INSERT INTO `municipios` VALUES ('283', '17', 'Araure', '0', '0');
INSERT INTO `municipios` VALUES ('284', '17', 'Esteller', '0', '0');
INSERT INTO `municipios` VALUES ('285', '17', 'Guanare', '0', '0');
INSERT INTO `municipios` VALUES ('286', '17', 'Guanarito', '0', '0');
INSERT INTO `municipios` VALUES ('287', '17', 'Monse', '0', '0');
INSERT INTO `municipios` VALUES ('288', '17', 'Ospino', '0', '0');
INSERT INTO `municipios` VALUES ('289', '17', 'P', '0', '0');
INSERT INTO `municipios` VALUES ('290', '17', 'Papel', '0', '0');
INSERT INTO `municipios` VALUES ('291', '17', 'San Genaro de Bocono', '0', '0');
INSERT INTO `municipios` VALUES ('292', '17', 'San Rafael de Onoto', '0', '0');
INSERT INTO `municipios` VALUES ('293', '17', 'Santa Rosal', '0', '0');
INSERT INTO `municipios` VALUES ('294', '17', 'Sucre', '0', '0');
INSERT INTO `municipios` VALUES ('295', '17', 'Tur', '0', '0');
INSERT INTO `municipios` VALUES ('296', '18', 'Andr', '0', '0');
INSERT INTO `municipios` VALUES ('297', '18', 'Andr', '0', '0');
INSERT INTO `municipios` VALUES ('298', '18', 'Arismendi', '0', '0');
INSERT INTO `municipios` VALUES ('299', '18', 'Ben', '0', '0');
INSERT INTO `municipios` VALUES ('300', '18', 'Berm', '0', '0');
INSERT INTO `municipios` VALUES ('301', '18', 'Bol', '0', '0');
INSERT INTO `municipios` VALUES ('302', '18', 'Cajigal', '0', '0');
INSERT INTO `municipios` VALUES ('303', '18', 'Cruz Salmer', '0', '0');
INSERT INTO `municipios` VALUES ('304', '18', 'Libertador', '0', '0');
INSERT INTO `municipios` VALUES ('305', '18', 'Mari', '0', '0');
INSERT INTO `municipios` VALUES ('306', '18', 'Mej', '0', '0');
INSERT INTO `municipios` VALUES ('307', '18', 'Montes', '0', '0');
INSERT INTO `municipios` VALUES ('308', '18', 'Ribero', '0', '0');
INSERT INTO `municipios` VALUES ('309', '18', 'Sucre', '0', '0');
INSERT INTO `municipios` VALUES ('310', '18', 'Vald', '0', '0');
INSERT INTO `municipios` VALUES ('341', '19', 'Andr', '0', '0');
INSERT INTO `municipios` VALUES ('342', '19', 'Antonio R', '0', '0');
INSERT INTO `municipios` VALUES ('343', '19', 'Ayacucho', '0', '0');
INSERT INTO `municipios` VALUES ('344', '19', 'Bol', '0', '0');
INSERT INTO `municipios` VALUES ('345', '19', 'C', '0', '0');
INSERT INTO `municipios` VALUES ('346', '19', 'C', '0', '0');
INSERT INTO `municipios` VALUES ('347', '19', 'Fern', '0', '0');
INSERT INTO `municipios` VALUES ('348', '19', 'Francisco de Miranda', '0', '0');
INSERT INTO `municipios` VALUES ('349', '19', 'Garc', '0', '0');
INSERT INTO `municipios` VALUES ('350', '19', 'Gu', '0', '0');
INSERT INTO `municipios` VALUES ('351', '19', 'Independencia', '0', '0');
INSERT INTO `municipios` VALUES ('352', '19', 'J', '0', '0');
INSERT INTO `municipios` VALUES ('353', '19', 'Jos', '0', '0');
INSERT INTO `municipios` VALUES ('354', '19', 'Jun', '0', '0');
INSERT INTO `municipios` VALUES ('355', '19', 'Libertad', '0', '0');
INSERT INTO `municipios` VALUES ('356', '19', 'Libertador', '0', '0');
INSERT INTO `municipios` VALUES ('357', '19', 'Lobatera', '0', '0');
INSERT INTO `municipios` VALUES ('358', '19', 'Michelena', '0', '0');
INSERT INTO `municipios` VALUES ('359', '19', 'Panamericano', '0', '0');
INSERT INTO `municipios` VALUES ('360', '19', 'Pedro Mar', '0', '0');
INSERT INTO `municipios` VALUES ('361', '19', 'Rafael Urdaneta', '0', '0');
INSERT INTO `municipios` VALUES ('362', '19', 'Samuel Dar', '0', '0');
INSERT INTO `municipios` VALUES ('363', '19', 'San Crist', '0', '0');
INSERT INTO `municipios` VALUES ('364', '19', 'Seboruco', '0', '0');
INSERT INTO `municipios` VALUES ('365', '19', 'Sim', '0', '0');
INSERT INTO `municipios` VALUES ('366', '19', 'Sucre', '0', '0');
INSERT INTO `municipios` VALUES ('367', '19', 'Torbes', '0', '0');
INSERT INTO `municipios` VALUES ('368', '19', 'Uribante', '0', '0');
INSERT INTO `municipios` VALUES ('369', '19', 'San Judas Tadeo', '0', '0');
INSERT INTO `municipios` VALUES ('370', '20', 'Andr', '0', '0');
INSERT INTO `municipios` VALUES ('371', '20', 'Bocon', '0', '0');
INSERT INTO `municipios` VALUES ('372', '20', 'Bol', '0', '0');
INSERT INTO `municipios` VALUES ('373', '20', 'Candelaria', '0', '0');
INSERT INTO `municipios` VALUES ('374', '20', 'Carache', '0', '0');
INSERT INTO `municipios` VALUES ('375', '20', 'Escuque', '0', '0');
INSERT INTO `municipios` VALUES ('376', '20', 'Jos', '0', '0');
INSERT INTO `municipios` VALUES ('377', '20', 'Juan Vicente Campos El', '0', '0');
INSERT INTO `municipios` VALUES ('378', '20', 'La Ceiba', '0', '0');
INSERT INTO `municipios` VALUES ('379', '20', 'Miranda', '0', '0');
INSERT INTO `municipios` VALUES ('380', '20', 'Monte Carmelo', '0', '0');
INSERT INTO `municipios` VALUES ('381', '20', 'Motat', '0', '0');
INSERT INTO `municipios` VALUES ('382', '20', 'Pamp', '0', '0');
INSERT INTO `municipios` VALUES ('383', '20', 'Pampanito', '0', '0');
INSERT INTO `municipios` VALUES ('384', '20', 'Rafael Rangel', '0', '0');
INSERT INTO `municipios` VALUES ('385', '20', 'San Rafael de Carvajal', '0', '0');
INSERT INTO `municipios` VALUES ('386', '20', 'Sucre', '0', '0');
INSERT INTO `municipios` VALUES ('387', '20', 'Trujillo', '0', '0');
INSERT INTO `municipios` VALUES ('388', '20', 'Urdaneta', '0', '0');
INSERT INTO `municipios` VALUES ('389', '20', 'Valera', '0', '0');
INSERT INTO `municipios` VALUES ('390', '21', 'Vargas', '0', '0');
INSERT INTO `municipios` VALUES ('391', '22', 'Ar', '0', '0');
INSERT INTO `municipios` VALUES ('392', '22', 'Bol', '0', '0');
INSERT INTO `municipios` VALUES ('407', '22', 'Bruzual', '0', '0');
INSERT INTO `municipios` VALUES ('408', '22', 'Cocorote', '0', '0');
INSERT INTO `municipios` VALUES ('409', '22', 'Independencia', '0', '0');
INSERT INTO `municipios` VALUES ('410', '22', 'Jos', '0', '0');
INSERT INTO `municipios` VALUES ('411', '22', 'La Trinidad', '0', '0');
INSERT INTO `municipios` VALUES ('412', '22', 'Manuel Monge', '0', '0');
INSERT INTO `municipios` VALUES ('413', '22', 'Nirgua', '0', '0');
INSERT INTO `municipios` VALUES ('414', '22', 'Pe', '0', '0');
INSERT INTO `municipios` VALUES ('415', '22', 'San Felipe', '0', '0');
INSERT INTO `municipios` VALUES ('416', '22', 'Sucre', '0', '0');
INSERT INTO `municipios` VALUES ('417', '22', 'Urachiche', '0', '0');
INSERT INTO `municipios` VALUES ('418', '22', 'Jos', '0', '0');
INSERT INTO `municipios` VALUES ('441', '23', 'Almirante Padilla', '0', '0');
INSERT INTO `municipios` VALUES ('442', '23', 'Baralt', '0', '0');
INSERT INTO `municipios` VALUES ('443', '23', 'Cabimas', '0', '0');
INSERT INTO `municipios` VALUES ('444', '23', 'Catatumbo', '0', '0');
INSERT INTO `municipios` VALUES ('445', '23', 'Col', '0', '0');
INSERT INTO `municipios` VALUES ('446', '23', 'Francisco Javier Pulgar', '0', '0');
INSERT INTO `municipios` VALUES ('447', '23', 'P', '0', '0');
INSERT INTO `municipios` VALUES ('448', '23', 'Jes', '0', '0');
INSERT INTO `municipios` VALUES ('449', '23', 'Jes', '0', '0');
INSERT INTO `municipios` VALUES ('450', '23', 'La Ca', '0', '0');
INSERT INTO `municipios` VALUES ('451', '23', 'Lagunillas', '0', '0');
INSERT INTO `municipios` VALUES ('452', '23', 'Machiques de Perij', '0', '0');
INSERT INTO `municipios` VALUES ('453', '23', 'Mara', '0', '0');
INSERT INTO `municipios` VALUES ('454', '23', 'Maracaibo', '0', '0');
INSERT INTO `municipios` VALUES ('455', '23', 'Miranda', '0', '0');
INSERT INTO `municipios` VALUES ('456', '23', 'Rosario de Perij', '0', '0');
INSERT INTO `municipios` VALUES ('457', '23', 'San Francisco', '0', '0');
INSERT INTO `municipios` VALUES ('458', '23', 'Santa Rita', '0', '0');
INSERT INTO `municipios` VALUES ('459', '23', 'Sim', '0', '0');
INSERT INTO `municipios` VALUES ('460', '23', 'Sucre', '0', '0');
INSERT INTO `municipios` VALUES ('461', '23', 'Valmore Rodr', '0', '0');
INSERT INTO `municipios` VALUES ('462', '24', 'Libertador', '0', '0');

-- ----------------------------
-- Table structure for parroquias
-- ----------------------------
DROP TABLE IF EXISTS `parroquias`;
CREATE TABLE `parroquias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_municipio` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_estado` (`id_municipio`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of parroquias
-- ----------------------------
INSERT INTO `parroquias` VALUES ('1', '40', 'La Victoria', '0');
INSERT INTO `parroquias` VALUES ('2', '40', 'Zuata', '0');
INSERT INTO `parroquias` VALUES ('3', '40', 'Castor Nieves Rios', '0');
INSERT INTO `parroquias` VALUES ('4', '40', 'Las Guacamayas', '0');
INSERT INTO `parroquias` VALUES ('5', '40', 'Pao de Zarate', '0');
INSERT INTO `parroquias` VALUES ('6', '40', 'Pie de Cerro', '0');

-- ----------------------------
-- Table structure for probabilidades_exito
-- ----------------------------
DROP TABLE IF EXISTS `probabilidades_exito`;
CREATE TABLE `probabilidades_exito` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_estado` int(11) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `fecha_inicio` varchar(255) NOT NULL,
  `fecha_final` varchar(255) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `mensaje` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of probabilidades_exito
-- ----------------------------

-- ----------------------------
-- Table structure for producciones
-- ----------------------------
DROP TABLE IF EXISTS `producciones`;
CREATE TABLE `producciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `id_productor` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_modalidad` int(11) NOT NULL,
  `id_uso` int(11) NOT NULL,
  `fecha` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of producciones
-- ----------------------------
INSERT INTO `producciones` VALUES ('1', 'pp', '1', '8', '2', '2', '1412824309', '0');
INSERT INTO `producciones` VALUES ('2', 'Aguacate', '18', '37', '1', '2', '1413331334', '0');
INSERT INTO `producciones` VALUES ('3', 'Lechosa', '18', '50', '1', '2', '1413331443', '0');
INSERT INTO `producciones` VALUES ('4', 'Limon', '18', '51', '1', '2', '1413331534', '0');
INSERT INTO `producciones` VALUES ('5', 'Platano', '18', '64', '1', '2', '1413331663', '0');
INSERT INTO `producciones` VALUES ('6', 'Ajo', '28', '9', '1', '2', '1413349803', '0');
INSERT INTO `producciones` VALUES ('7', 'Perejil', '28', '23', '1', '2', '1413349822', '0');
INSERT INTO `producciones` VALUES ('8', 'Maiz', '21', '1', '1', '2', '1413349857', '0');

-- ----------------------------
-- Table structure for producciones_cosechas
-- ----------------------------
DROP TABLE IF EXISTS `producciones_cosechas`;
CREATE TABLE `producciones_cosechas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produccion` int(11) NOT NULL,
  `cantidad_terreno` float(11,2) NOT NULL,
  `fecha` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of producciones_cosechas
-- ----------------------------
INSERT INTO `producciones_cosechas` VALUES ('1', '1', '40.00', '1412824366', '0');
INSERT INTO `producciones_cosechas` VALUES ('2', '2', '2000.00', '1413331389', '0');
INSERT INTO `producciones_cosechas` VALUES ('3', '3', '450.00', '1413331480', '0');
INSERT INTO `producciones_cosechas` VALUES ('4', '4', '140.00', '1413331593', '0');

-- ----------------------------
-- Table structure for producciones_siembras
-- ----------------------------
DROP TABLE IF EXISTS `producciones_siembras`;
CREATE TABLE `producciones_siembras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produccion` int(11) NOT NULL,
  `cantidad_terreno` float(11,2) NOT NULL,
  `tipo_financiamiento` int(11) NOT NULL,
  `fecha` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of producciones_siembras
-- ----------------------------
INSERT INTO `producciones_siembras` VALUES ('1', '1', '100.00', '2', '1412824346', '0');
INSERT INTO `producciones_siembras` VALUES ('2', '2', '5000.00', '1', '1413331367', '0');
INSERT INTO `producciones_siembras` VALUES ('3', '3', '450.00', '1', '1413231464', '0');
INSERT INTO `producciones_siembras` VALUES ('4', '4', '140.00', '1', '1413231573', '0');
INSERT INTO `producciones_siembras` VALUES ('5', '5', '650.00', '1', '1413231681', '0');
INSERT INTO `producciones_siembras` VALUES ('6', '8', '1000.00', '2', '1413349873', '0');

-- ----------------------------
-- Table structure for productores
-- ----------------------------
DROP TABLE IF EXISTS `productores`;
CREATE TABLE `productores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `tipo_cedula_rif` varchar(255) NOT NULL,
  `cedula_rif` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `cantidad_terreno` int(11) NOT NULL,
  `ubicacion` text NOT NULL,
  `ubicacion_lat` varchar(255) NOT NULL,
  `ubicacion_long` varchar(255) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `id_parroquia` int(11) NOT NULL,
  `id_sector` int(11) NOT NULL,
  `direccion` text NOT NULL,
  `tipo_productor` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `imagen_portada` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `activo` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of productores
-- ----------------------------
INSERT INTO `productores` VALUES ('1', '1', 'Nelson Jimenez', 'V', '19864208', '0412-8312166', '120000', 'Celle D, La Victoria 2121, Venezuela', '10.168075', '-67.3890743', '4', '40', '1', '1', 'morichal', '1', '', '', 'produzco papa , cebolla en tal zzona', '1', '1');
INSERT INTO `productores` VALUES ('18', '0', 'Nestor Paracuto', 'V', '9268228', '-', '20000', 'La Victoria, Aragua, Venezuela', '10.227778', '-67.333611', '4', '40', '1', '1', '0', '1', '', '', '', '1', '0');
INSERT INTO `productores` VALUES ('19', '0', 'Wilmer Silva', 'V', '8816092', '-', '20000', 'La Victoria, Aragua, Venezuela', '10.227778', '-67.333611', '4', '40', '1', '1', '0', '1', '', '', '', '1', '0');
INSERT INTO `productores` VALUES ('20', '0', 'Hernando Sanchez', 'V', '24670492', '-', '8000', 'La Victoria, Aragua, Venezuela', '10.227778', '-67.333611', '4', '40', '1', '1', '0', '1', '', '', '', '1', '0');
INSERT INTO `productores` VALUES ('21', '0', 'Guillermo Hernandez', 'V', '11177413', '-', '20000', 'La Victoria, Aragua, Venezuela', '10.227778', '-67.333611', '4', '40', '2', '6', '0', '1', '', '', '', '1', '0');
INSERT INTO `productores` VALUES ('22', '0', 'Orlando Hernandez', 'V', '10362751', '-', '50000', 'La Victoria, Aragua, Venezuela', '10.227778', '-67.333611', '4', '40', '2', '7', '0', '1', '', '', '', '1', '0');
INSERT INTO `productores` VALUES ('23', '0', 'Pedro Hernandez', 'V', '4403000', '-', '1500', 'Zuata, Aragua, Venezuela', '10.168075', '-67.3890743', '4', '40', '2', '6', '0', '1', '', '', '', '1', '0');
INSERT INTO `productores` VALUES ('24', '0', 'Simon Ortega', 'V', '4439054', '-', '20000', 'Zuata, Aragua, Venezuela', '10.168075', '-67.3890743', '4', '40', '2', '6', '0', '1', '', '', '', '1', '0');
INSERT INTO `productores` VALUES ('25', '0', 'Antonia Garboza', 'V', '4368438', '-', '20000', 'Zuata, Aragua, Venezuela', '10.168075', '-67.3890743', '4', '40', '2', '7', '0', '1', '', '', '', '1', '0');
INSERT INTO `productores` VALUES ('26', '0', 'Juan Antivero', 'V', '3173372', '-', '8900', 'Zuata, Aragua, Venezuela', '10.168075', '-67.3890743', '4', '40', '2', '7', '0', '1', '', '', '', '1', '0');
INSERT INTO `productores` VALUES ('27', '0', 'Yuleidi Ojeda', 'V', '14683604', '-', '20000', 'La Victoria, Aragua, Venezuela', '10.227778', '-67.333611', '4', '40', '1', '1', '0', '1', '', '', '', '1', '0');
INSERT INTO `productores` VALUES ('28', '0', 'Alexis Sosa', 'V', '13733065', '-', '2500', 'Pie de Cerro, Aragua, Venezuela', '10.2228783', '-67.3255867', '4', '40', '6', '2', '0', '1', '', '', '', '1', '0');
INSERT INTO `productores` VALUES ('29', '0', 'Alexander Blanco', 'V', '5672843', '-', '20000', 'Pie de Cerro, Aragua, Venezuela', '10.2228783', '-67.3255867', '4', '40', '6', '8', '0', '1', '', '', '', '1', '0');

-- ----------------------------
-- Table structure for productores_visitas_perfil
-- ----------------------------
DROP TABLE IF EXISTS `productores_visitas_perfil`;
CREATE TABLE `productores_visitas_perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_productor` int(11) DEFAULT NULL,
  `sistema_operativo` varchar(255) DEFAULT NULL,
  `navegador` varchar(255) DEFAULT NULL,
  `version` varchar(255) DEFAULT NULL,
  `fecha` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of productores_visitas_perfil
-- ----------------------------
INSERT INTO `productores_visitas_perfil` VALUES ('1', '17', 'WIN', 'CHROME', '37.0.2062.124', '1412743514', '0');
INSERT INTO `productores_visitas_perfil` VALUES ('2', '17', 'WIN', 'CHROME', '37.0.2062.124', '1412746646', '0');
INSERT INTO `productores_visitas_perfil` VALUES ('3', '17', 'WIN', 'CHROME', '37.0.2062.124', '1412746974', '0');
INSERT INTO `productores_visitas_perfil` VALUES ('4', '1', 'WIN', 'CHROME', '37.0.2062.124', '1413347615', '0');

-- ----------------------------
-- Table structure for productos
-- ----------------------------
DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rubro` varchar(255) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `rendimiento` float(11,2) NOT NULL,
  `precio` float(11,2) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of productos
-- ----------------------------
INSERT INTO `productos` VALUES ('1', 'Maiz', '1', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('2', 'Caraota', '5', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('3', 'Frijol', '5', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('4', 'Arveja', '5', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('5', 'Quinchoncho', '5', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('6', 'Soya', '5', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('7', 'Acelga', '2', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('8', 'Aji', '2', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('9', 'Ajo', '2', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('10', 'Ajo Porro', '2', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('11', 'Apio Espana', '2', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('12', 'Auyama', '2', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('13', 'Berenjena', '2', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('14', 'Brocoli', '2', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('15', 'Calabacin', '2', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('16', 'Cebollin', '2', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('17', 'Cebolla', '2', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('18', 'Cilantro', '2', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('19', 'Coliflor', '2', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('20', 'Espinaca', '2', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('21', 'Lechuga', '2', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('22', 'Maiz Dulce', '2', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('23', 'Perejil', '2', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('24', 'Pepino', '2', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('25', 'Pimenton', '2', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('26', 'Remolacha', '2', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('27', 'Repollo', '2', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('28', 'Vainita', '2', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('29', 'Tomate', '2', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('30', 'Apio', '3', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('31', 'Batata', '3', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('32', 'Name', '3', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('33', 'Ocumo', '3', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('34', 'Zanahoria', '3', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('35', 'Papa', '3', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('36', 'Yuca', '3', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('37', 'Aguacate', '4', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('38', 'Cambur', '4', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('39', 'Cereza', '4', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('40', 'Chayota', '4', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('41', 'Ciruela de Huesito', '4', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('42', 'Chirimoya', '4', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('43', 'Coco', '4', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('44', 'Fresa', '4', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('45', 'Grape Fruit', '4', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('46', 'Guanabana', '4', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('47', 'Guayaba', '4', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('48', 'Higo', '4', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('49', 'Icaco', '4', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('50', 'Lechosa', '4', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('51', 'Limon', '4', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('52', 'Lulo', '4', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('53', 'Mamon', '4', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('54', 'Mandarina', '4', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('55', 'Mango', '4', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('56', 'Melon', '4', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('57', 'Membrillo', '4', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('58', 'Mora', '4', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('59', 'Naranja', '4', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('60', 'Nispero', '4', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('61', 'Parchita', '4', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('62', 'Patilla', '4', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('63', 'Pina', '4', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('64', 'Platano', '4', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('65', 'Quimbombo', '4', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('66', 'Tamarindo', '4', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('67', 'Toronja', '4', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('68', 'Tomate de Arbol', '4', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('69', 'Uva', '4', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('70', 'Durazno', '4', '0.00', '0.00', '', '0');
INSERT INTO `productos` VALUES ('71', 'Pumarosa', '4', '0.00', '0.00', '', '0');

-- ----------------------------
-- Table structure for productos_distribucion
-- ----------------------------
DROP TABLE IF EXISTS `productos_distribucion`;
CREATE TABLE `productos_distribucion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_distribucion` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_modalidad` int(11) NOT NULL,
  `id_uso` int(11) NOT NULL,
  `cantidad` float(11,2) NOT NULL,
  `calidad` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of productos_distribucion
-- ----------------------------

-- ----------------------------
-- Table structure for productos_distribucion_temp
-- ----------------------------
DROP TABLE IF EXISTS `productos_distribucion_temp`;
CREATE TABLE `productos_distribucion_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_random` int(11) NOT NULL,
  `id_distribucion` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_modalidad` int(11) NOT NULL,
  `id_uso` int(11) NOT NULL,
  `cantidad` float(11,2) NOT NULL,
  `calidad` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of productos_distribucion_temp
-- ----------------------------

-- ----------------------------
-- Table structure for productos_productores
-- ----------------------------
DROP TABLE IF EXISTS `productos_productores`;
CREATE TABLE `productos_productores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_productor` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of productos_productores
-- ----------------------------
INSERT INTO `productos_productores` VALUES ('2', '14', '9', '0');

-- ----------------------------
-- Table structure for proyecciones
-- ----------------------------
DROP TABLE IF EXISTS `proyecciones`;
CREATE TABLE `proyecciones` (
  `id` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of proyecciones
-- ----------------------------

-- ----------------------------
-- Table structure for proyecciones_productos
-- ----------------------------
DROP TABLE IF EXISTS `proyecciones_productos`;
CREATE TABLE `proyecciones_productos` (
  `id` int(11) NOT NULL,
  `id_proyeccion` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `ton/hect` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of proyecciones_productos
-- ----------------------------

-- ----------------------------
-- Table structure for redes_sociales_productores
-- ----------------------------
DROP TABLE IF EXISTS `redes_sociales_productores`;
CREATE TABLE `redes_sociales_productores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_productor` int(11) NOT NULL,
  `red_social` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of redes_sociales_productores
-- ----------------------------
INSERT INTO `redes_sociales_productores` VALUES ('1', '1', '1', 'http://productor.com/o', '0');
INSERT INTO `redes_sociales_productores` VALUES ('2', '1', '2', '', '0');
INSERT INTO `redes_sociales_productores` VALUES ('3', '1', '3', '', '0');

-- ----------------------------
-- Table structure for sectores
-- ----------------------------
DROP TABLE IF EXISTS `sectores`;
CREATE TABLE `sectores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_parroquia` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_estado` (`id_parroquia`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of sectores
-- ----------------------------
INSERT INTO `sectores` VALUES ('1', '1', 'Monte Azul', '0');
INSERT INTO `sectores` VALUES ('2', '6', 'Corozal', '0');
INSERT INTO `sectores` VALUES ('3', '5', 'El Toro', '0');
INSERT INTO `sectores` VALUES ('4', '5', 'La Candelaria', '0');
INSERT INTO `sectores` VALUES ('5', '2', 'Rancho Veguero', '0');
INSERT INTO `sectores` VALUES ('6', '2', 'Punta de Monte', '0');
INSERT INTO `sectores` VALUES ('7', '2', 'Primitivo de Jesus', '0');
INSERT INTO `sectores` VALUES ('8', '6', 'Monte Esperanza', '0');

-- ----------------------------
-- Table structure for usos
-- ----------------------------
DROP TABLE IF EXISTS `usos`;
CREATE TABLE `usos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of usos
-- ----------------------------
INSERT INTO `usos` VALUES ('2', 'Consumo', '1');
INSERT INTO `usos` VALUES ('3', 'Industrial', '1');

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) NOT NULL,
  `clave` blob NOT NULL,
  `tipo` int(11) NOT NULL,
  `fecha` varchar(255) NOT NULL,
  `cod_conf` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1', 'moisesperoconw@gmail.com', 0x6265636432613063386635653439626336653530333530313738323136623133, '1', '1402932514', 'x5rn77szkrzqmfrbeiupipnd38zbpsa', '1');
INSERT INTO `usuarios` VALUES ('2', 'carlosjzambrano@gmail.com', 0x6265636432613063386635653439626336653530333530313738323136623133, '2', '1404327358', 'qgrtcxzpe62g0cs3u7j3wx6eta0gogw', '1');
INSERT INTO `usuarios` VALUES ('3', 'admin', 0x6265636432613063386635653439626336653530333530313738323136623133, '3', '1402932514', 'satgio060fcntnzmuuohm7n42bjto7p', '1');

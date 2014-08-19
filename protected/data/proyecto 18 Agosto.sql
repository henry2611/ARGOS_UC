/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;

SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE `proyecto`
    CHARACTER SET 'latin1'
    COLLATE 'latin1_swedish_ci';

USE `proyecto`;

CREATE TABLE `cruge_user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `regdate` bigint(30) DEFAULT NULL,
  `actdate` bigint(30) DEFAULT NULL,
  `logondate` bigint(30) DEFAULT NULL,
  `username` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Hashed password',
  `authkey` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'llave de autentificacion',
  `state` int(11) DEFAULT '0',
  `totalsessioncounter` int(11) DEFAULT '0',
  `currentsessioncounter` int(11) DEFAULT '0',
  `nombreUsuario` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `dependencia` text COLLATE utf8_unicode_ci,
  `foto` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fechaUltConex` date DEFAULT NULL,
  `bioUsuario` text COLLATE utf8_unicode_ci,
  `ipUltConex` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numTips` int(11) DEFAULT NULL,
  `skype_user` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`iduser`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_curso` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_curso` text COLLATE utf8_unicode_ci,
  `username_docente` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `numero_estudiantes` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_curso`),
  UNIQUE KEY `username_docente` (`username_docente`),
  KEY `id_curso` (`id_curso`),
  CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`username_docente`) REFERENCES `cruge_user` (`username`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `tema` (
  `id_tema` int(11) NOT NULL AUTO_INCREMENT,
  `id_curso` int(11) NOT NULL,
  `nombre_tema` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_tema` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id_tema`),
  KEY `id_tema` (`id_tema`),
  KEY `fk_tema` (`id_curso`),
  CONSTRAINT `fk_tema` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `clase` (
  `id_clase` int(11) NOT NULL AUTO_INCREMENT,
  `id_tema` int(11) NOT NULL,
  `nombre_clase` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_clase` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id_clase`),
  KEY `id_clase` (`id_clase`),
  KEY `fk_clase` (`id_tema`),
  CONSTRAINT `fk_clase` FOREIGN KEY (`id_tema`) REFERENCES `tema` (`id_tema`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `clase_pregunta` (
  `id_clase_pregunta` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_clase_pregunta` varchar(64) NOT NULL,
  PRIMARY KEY (`id_clase_pregunta`),
  UNIQUE KEY `id_clase_pregunta` (`id_clase_pregunta`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

CREATE TABLE `cruge_authitem` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `bizrule` text COLLATE utf8_unicode_ci,
  `data` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `cruge_authassignment` (
  `userid` int(11) NOT NULL,
  `bizrule` text COLLATE utf8_unicode_ci,
  `data` text COLLATE utf8_unicode_ci,
  `itemname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`userid`,`itemname`),
  KEY `fk_cruge_authassignment_cruge_authitem1` (`itemname`),
  KEY `fk_cruge_authassignment_user` (`userid`),
  CONSTRAINT `fk_cruge_authassignment_cruge_authitem1` FOREIGN KEY (`itemname`) REFERENCES `cruge_authitem` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cruge_authassignment_user` FOREIGN KEY (`userid`) REFERENCES `cruge_user` (`iduser`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `cruge_authitemchild` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `crugeauthitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `cruge_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `crugeauthitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `cruge_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `cruge_field` (
  `idfield` int(11) NOT NULL AUTO_INCREMENT,
  `fieldname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `longname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` int(11) DEFAULT '0',
  `required` int(11) DEFAULT '0',
  `fieldtype` int(11) DEFAULT '0',
  `fieldsize` int(11) DEFAULT '20',
  `maxlength` int(11) DEFAULT '45',
  `showinreports` int(11) DEFAULT '0',
  `useregexp` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `useregexpmsg` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `predetvalue` mediumblob,
  PRIMARY KEY (`idfield`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `cruge_fieldvalue` (
  `idfieldvalue` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `idfield` int(11) NOT NULL,
  `value` blob,
  PRIMARY KEY (`idfieldvalue`),
  KEY `fk_cruge_fieldvalue_cruge_user1` (`iduser`),
  KEY `fk_cruge_fieldvalue_cruge_field1` (`idfield`),
  CONSTRAINT `fk_cruge_fieldvalue_cruge_field1` FOREIGN KEY (`idfield`) REFERENCES `cruge_field` (`idfield`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_cruge_fieldvalue_cruge_user1` FOREIGN KEY (`iduser`) REFERENCES `cruge_user` (`iduser`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `cruge_session` (
  `idsession` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `created` bigint(30) DEFAULT NULL,
  `expire` bigint(30) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `ipaddress` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usagecount` int(11) DEFAULT '0',
  `lastusage` bigint(30) DEFAULT NULL,
  `logoutdate` bigint(30) DEFAULT NULL,
  `ipaddressout` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idsession`),
  KEY `crugesession_iduser` (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=259 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `cruge_system` (
  `idsystem` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `largename` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sessionmaxdurationmins` int(11) DEFAULT '30',
  `sessionmaxsameipconnections` int(11) DEFAULT '10',
  `sessionreusesessions` int(11) DEFAULT '1' COMMENT '1yes 0no',
  `sessionmaxsessionsperday` int(11) DEFAULT '-1',
  `sessionmaxsessionsperuser` int(11) DEFAULT '-1',
  `systemnonewsessions` int(11) DEFAULT '0' COMMENT '1yes 0no',
  `systemdown` int(11) DEFAULT '0',
  `registerusingcaptcha` int(11) DEFAULT '0',
  `registerusingterms` int(11) DEFAULT '0',
  `terms` blob,
  `registerusingactivation` int(11) DEFAULT '1',
  `defaultroleforregistration` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `registerusingtermslabel` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `registrationonlogin` int(11) DEFAULT '1',
  PRIMARY KEY (`idsystem`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `curso_estudiantes` (
  `id_curso_estudiante` int(11) NOT NULL AUTO_INCREMENT,
  `id_curso` int(11) NOT NULL,
  `username_estudiante` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_curso_estudiante`),
  UNIQUE KEY `id_curso` (`id_curso`),
  UNIQUE KEY `username_estudiante` (`username_estudiante`),
  KEY `id_curso_estudiante` (`id_curso_estudiante`),
  CONSTRAINT `curso_estudiantes_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `curso_estudiantes_ibfk_2` FOREIGN KEY (`username_estudiante`) REFERENCES `cruge_user` (`username`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `evaluacion` (
  `id_evaluacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_clase` int(11) NOT NULL,
  `porcentaje` int(11) DEFAULT NULL,
  `tiempo_inicio` datetime NOT NULL,
  `numero_max_tips` int(11) DEFAULT NULL,
  `cant_dificil` int(11) DEFAULT NULL,
  `cant_intermedio` int(11) DEFAULT NULL,
  `cant_facil` int(11) DEFAULT NULL,
  `puntuacion_dificil` int(11) DEFAULT NULL,
  `puntuacion_intermedio` int(11) DEFAULT NULL,
  `puntuacion_facil` int(11) DEFAULT NULL,
  `tiempo_final` datetime NOT NULL,
  PRIMARY KEY (`id_evaluacion`),
  UNIQUE KEY `id_evaluacion` (`id_evaluacion`),
  KEY `id_clase` (`id_clase`),
  CONSTRAINT `evaluacion_fk1` FOREIGN KEY (`id_clase`) REFERENCES `clase` (`id_clase`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `estudiante_evaluacion` (
  `id_evaluacion_estudiante` int(11) NOT NULL AUTO_INCREMENT,
  `id_evaluacion` int(11) NOT NULL,
  `id_curso_estudiante` int(11) NOT NULL,
  `calificacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_evaluacion_estudiante`),
  UNIQUE KEY `id_evaluacion_estudiante` (`id_evaluacion_estudiante`),
  KEY `id_evaluacion` (`id_evaluacion`),
  KEY `id_curso_estudiante` (`id_curso_estudiante`),
  CONSTRAINT `estudiante_evaluacion_fk` FOREIGN KEY (`id_evaluacion`) REFERENCES `evaluacion` (`id_evaluacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `estudiante_evaluacion_fk1` FOREIGN KEY (`id_curso_estudiante`) REFERENCES `curso_estudiantes` (`id_curso_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

CREATE TABLE `mensaje` (
  `id_mensaje` bigint(11) NOT NULL AUTO_INCREMENT,
  `username_destino` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `username_origen` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `texto_mensaje` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_mensaje`),
  UNIQUE KEY `username_destino` (`username_destino`),
  UNIQUE KEY `username_origen` (`username_origen`),
  KEY `id_mensaje` (`id_mensaje`),
  CONSTRAINT `mensaje_ibfk_1` FOREIGN KEY (`username_destino`) REFERENCES `cruge_user` (`username`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `mensaje_ibfk_2` FOREIGN KEY (`username_origen`) REFERENCES `cruge_user` (`username`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `tipo_pregunta` (
  `id_tipo_pregunta` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo_pregunta` varchar(64) NOT NULL,
  PRIMARY KEY (`id_tipo_pregunta`),
  UNIQUE KEY `id_tipo_pregunta` (`id_tipo_pregunta`),
  UNIQUE KEY `nombre_tipo_pregunta` (`nombre_tipo_pregunta`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

CREATE TABLE `pregunta` (
  `id_pregunta` int(11) NOT NULL AUTO_INCREMENT,
  `id_evaluacion` int(11) NOT NULL,
  `id_clase_pregunta` int(11) NOT NULL,
  `id_tipo_pregunta` int(11) NOT NULL,
  `texto_pregunta` text NOT NULL,
  PRIMARY KEY (`id_pregunta`),
  UNIQUE KEY `id_pregunta` (`id_pregunta`),
  KEY `id_tipo_pregunta` (`id_tipo_pregunta`),
  KEY `id_evaluacion` (`id_evaluacion`),
  KEY `id_clase_pregunta` (`id_clase_pregunta`),
  CONSTRAINT `pregunta_fk` FOREIGN KEY (`id_evaluacion`) REFERENCES `evaluacion` (`id_evaluacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pregunta_fk1` FOREIGN KEY (`id_tipo_pregunta`) REFERENCES `tipo_pregunta` (`id_tipo_pregunta`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pregunta_fk2` FOREIGN KEY (`id_clase_pregunta`) REFERENCES `clase_pregunta` (`id_clase_pregunta`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

CREATE TABLE `recurso` (
  `id_recurso` int(11) NOT NULL AUTO_INCREMENT,
  `id_clase` int(11) NOT NULL,
  `nombre_recurso` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `ubicacion_recurso` text COLLATE utf8_unicode_ci NOT NULL,
  `duracion_recurso` int(11) DEFAULT NULL,
  `peso_recurso` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_recurso`),
  UNIQUE KEY `id_clase` (`id_clase`),
  KEY `id_recurso` (`id_recurso`),
  CONSTRAINT `recurso_ibfk_1` FOREIGN KEY (`id_clase`) REFERENCES `clase` (`id_clase`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `tipo_respuesta` (
  `id_tipo_respuesta` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo_respuesta` varchar(64) NOT NULL,
  PRIMARY KEY (`id_tipo_respuesta`),
  UNIQUE KEY `id_tipo_respuesta` (`id_tipo_respuesta`),
  UNIQUE KEY `nombre_tipo_respuesta` (`nombre_tipo_respuesta`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

CREATE TABLE `respuesta` (
  `id_respuesta` int(11) NOT NULL AUTO_INCREMENT,
  `id_pregunta` int(11) NOT NULL,
  `id_tipo_respuesta` int(11) NOT NULL,
  `texto_respuesta` text NOT NULL,
  `texto_respuesta_b` text,
  PRIMARY KEY (`id_respuesta`),
  UNIQUE KEY `id_respuesta` (`id_respuesta`),
  KEY `id_pregunta` (`id_pregunta`),
  KEY `id_tipo_respuesta` (`id_tipo_respuesta`),
  CONSTRAINT `respuesta_fk` FOREIGN KEY (`id_tipo_respuesta`) REFERENCES `tipo_respuesta` (`id_tipo_respuesta`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `respuesta_fk1` FOREIGN KEY (`id_pregunta`) REFERENCES `pregunta` (`id_pregunta`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

CREATE TABLE `respuesta_estudiante` (
  `id_respuesta_estudiante` int(11) NOT NULL AUTO_INCREMENT,
  `id_estudiante_evaluacion` int(11) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  `texto_respuesta` text NOT NULL,
  `texto_respuesta_b` text,
  PRIMARY KEY (`id_respuesta_estudiante`),
  UNIQUE KEY `id_respuesta_estudiante` (`id_respuesta_estudiante`),
  KEY `id_estudiante_evaluacion` (`id_estudiante_evaluacion`),
  KEY `id_pregunta` (`id_pregunta`),
  CONSTRAINT `respuesta_estudiante_fk1` FOREIGN KEY (`id_pregunta`) REFERENCES `pregunta` (`id_pregunta`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `respuesta_estudiante_fk` FOREIGN KEY (`id_estudiante_evaluacion`) REFERENCES `estudiante_evaluacion` (`id_evaluacion_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;

SET FOREIGN_KEY_CHECKS=0;

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
) ENGINE=InnoDB AUTO_INCREMENT=181 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

CREATE TABLE `respuesta_estudiante` (
  `id_respuesta_estudiante` int(11) NOT NULL AUTO_INCREMENT,
  `id_estudiante_evaluacion` int(11) NOT NULL,
  `id_respuesta` int(11) NOT NULL,
  PRIMARY KEY (`id_respuesta_estudiante`),
  UNIQUE KEY `id_respuesta_estudiante` (`id_respuesta_estudiante`),
  KEY `id_respuesta` (`id_respuesta`),
  KEY `id_estudiante_evaluacion` (`id_estudiante_evaluacion`),
  CONSTRAINT `respuesta_estudiante_fk` FOREIGN KEY (`id_estudiante_evaluacion`) REFERENCES `estudiante_evaluacion` (`id_evaluacion_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `respuesta_estudiante_fk1` FOREIGN KEY (`id_respuesta`) REFERENCES `respuesta` (`id_respuesta`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `cruge_user` (`iduser`, `regdate`, `actdate`, `logondate`, `username`, `email`, `password`, `authkey`, `state`, `totalsessioncounter`, `currentsessioncounter`, `nombreUsuario`, `fechaNacimiento`, `dependencia`, `foto`, `fechaUltConex`, `bioUsuario`, `ipUltConex`, `numTips`, `skype_user`) VALUES 
  (1,NULL,NULL,1401292143,'admin','admin@tucorreo.com','admin',NULL,1,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (2,NULL,NULL,1370560598,'invitado','invitado',NULL,NULL,1,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (3,1370904527,NULL,1401291769,'ricardo','ricardo@correo.com','ricardo','db06705fbe537cd1c6274546f6ede22d',1,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (4,1372107077,NULL,1401978912,'profesor1','prof1@uc.edu.ve','profesor1','e4367f0196ac62802b73f45a7d0971c4',1,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (5,1385999156,NULL,1385999742,'administrador','administrador@uc.edu.ve','administrador','ae978bd4cc48f66cc7f0416bdcabe655',1,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (6,1395777326,NULL,1399238044,'profesor2','prof@correouc.com.ve','profesor2','db9fb85670c4deb2a8220dbaa53dc141',1,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
COMMIT;

INSERT INTO `curso` (`id_curso`, `nombre_curso`, `descripcion_curso`, `username_docente`, `numero_estudiantes`) VALUES 
  (1,'Algoritmos y Programacion I','Curso de introduccion al desarrollo de algoritmos mediante el uso de pseudocodigo, nociones basicas y estructuras de control. Primeros pasos para programar en lenguaje C (ANSI C).','profesor1',10),
  (2,'Calculo I','Con este curso se pretende que el estudiante se familiarice con los conceptos propios del an','profesor2',30);
COMMIT;

INSERT INTO `tema` (`id_tema`, `id_curso`, `nombre_tema`, `descripcion_tema`) VALUES 
  (1,1,'Introduccion a los algoritmos','Introduccion al uso de algoritmos'),
  (2,2,'L','Establecer el concepto de l');
COMMIT;

INSERT INTO `clase` (`id_clase`, `id_tema`, `nombre_clase`, `descripcion_clase`) VALUES 
  (1,1,'Uso de condicionales (If - Else)','Uso de condicionales para el desarrollo de algoritmos.'),
  (2,1,'Ciclos (for)','Uso de ciclos (for) para realzar tareas repetitivas. Ejercicios.'),
  (3,1,'Recursividad','Utilizaci'),
  (4,2,'Definici','Clase introductoria al concepto de funci');
COMMIT;

INSERT INTO `clase_pregunta` (`id_clase_pregunta`, `nombre_clase_pregunta`) VALUES 
  (1,'Selecccion Simple'),
  (2,'Seleccion Multiple'),
  (3,'Verdadero o Falso'),
  (4,'Pareamiento');
COMMIT;

INSERT INTO `cruge_authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES 
  ('action_clase_admin',0,'',NULL,'N;'),
  ('action_clase_clases',0,'',NULL,'N;'),
  ('action_clase_create',0,'',NULL,'N;'),
  ('action_clase_delete',0,'',NULL,'N;'),
  ('action_clase_index',0,'',NULL,'N;'),
  ('action_clase_update',0,'',NULL,'N;'),
  ('action_clase_view',0,'',NULL,'N;'),
  ('action_clasepregunta_admin',0,'',NULL,'N;'),
  ('action_clasepregunta_create',0,'',NULL,'N;'),
  ('action_clasepregunta_delete',0,'',NULL,'N;'),
  ('action_clasepregunta_index',0,'',NULL,'N;'),
  ('action_clasepregunta_update',0,'',NULL,'N;'),
  ('action_clasepregunta_view',0,'',NULL,'N;'),
  ('action_curso_admin',0,'',NULL,'N;'),
  ('action_curso_create',0,'',NULL,'N;'),
  ('action_curso_delete',0,'',NULL,'N;'),
  ('action_curso_index',0,'',NULL,'N;'),
  ('action_curso_indexdocente',0,'',NULL,'N;'),
  ('action_curso_indexestudiante',0,'',NULL,'N;'),
  ('action_curso_temas',0,'',NULL,'N;'),
  ('action_curso_update',0,'',NULL,'N;'),
  ('action_curso_view',0,'',NULL,'N;'),
  ('action_cursoestudiantes_admin',0,'',NULL,'N;'),
  ('action_cursoestudiantes_create',0,'',NULL,'N;'),
  ('action_cursoestudiantes_delete',0,'',NULL,'N;'),
  ('action_cursoestudiantes_index',0,'',NULL,'N;'),
  ('action_cursoestudiantes_update',0,'',NULL,'N;'),
  ('action_cursoestudiantes_view',0,'',NULL,'N;'),
  ('action_estudianteevaluacion_admin',0,'',NULL,'N;'),
  ('action_estudianteevaluacion_create',0,'',NULL,'N;'),
  ('action_estudianteevaluacion_delete',0,'',NULL,'N;'),
  ('action_estudianteevaluacion_index',0,'',NULL,'N;'),
  ('action_estudianteevaluacion_update',0,'',NULL,'N;'),
  ('action_estudianteevaluacion_view',0,'',NULL,'N;'),
  ('action_evaluacion_admin',0,'',NULL,'N;'),
  ('action_evaluacion_create',0,'',NULL,'N;'),
  ('action_evaluacion_delete',0,'',NULL,'N;'),
  ('action_evaluacion_index',0,'',NULL,'N;'),
  ('action_evaluacion_update',0,'',NULL,'N;'),
  ('action_evaluacion_view',0,'',NULL,'N;'),
  ('action_hola_index',0,'',NULL,'N;'),
  ('action_mensaje_admin',0,'',NULL,'N;'),
  ('action_mensaje_create',0,'',NULL,'N;'),
  ('action_mensaje_delete',0,'',NULL,'N;'),
  ('action_mensaje_index',0,'',NULL,'N;'),
  ('action_mensaje_update',0,'',NULL,'N;'),
  ('action_mensaje_view',0,'',NULL,'N;'),
  ('action_pregunta_admin',0,'',NULL,'N;'),
  ('action_pregunta_create',0,'',NULL,'N;'),
  ('action_pregunta_delete',0,'',NULL,'N;'),
  ('action_pregunta_index',0,'',NULL,'N;'),
  ('action_pregunta_redactar',0,'',NULL,'N;'),
  ('action_pregunta_update',0,'',NULL,'N;'),
  ('action_pregunta_view',0,'',NULL,'N;'),
  ('action_recurso_admin',0,'',NULL,'N;'),
  ('action_recurso_create',0,'',NULL,'N;'),
  ('action_recurso_delete',0,'',NULL,'N;'),
  ('action_recurso_index',0,'',NULL,'N;'),
  ('action_recurso_update',0,'',NULL,'N;'),
  ('action_recurso_view',0,'',NULL,'N;'),
  ('action_respuesta_admin',0,'',NULL,'N;'),
  ('action_respuesta_create',0,'',NULL,'N;'),
  ('action_respuesta_delete',0,'',NULL,'N;'),
  ('action_respuesta_index',0,'',NULL,'N;'),
  ('action_respuesta_redactar',0,'',NULL,'N;'),
  ('action_respuesta_update',0,'',NULL,'N;'),
  ('action_respuesta_view',0,'',NULL,'N;'),
  ('action_respuestaestudiante_admin',0,'',NULL,'N;'),
  ('action_respuestaestudiante_create',0,'',NULL,'N;'),
  ('action_respuestaestudiante_delete',0,'',NULL,'N;'),
  ('action_respuestaestudiante_index',0,'',NULL,'N;'),
  ('action_respuestaestudiante_update',0,'',NULL,'N;'),
  ('action_respuestaestudiante_view',0,'',NULL,'N;'),
  ('action_site_contact',0,'',NULL,'N;'),
  ('action_site_error',0,'',NULL,'N;'),
  ('action_site_index',0,'',NULL,'N;'),
  ('action_site_login',0,'',NULL,'N;'),
  ('action_site_logout',0,'',NULL,'N;'),
  ('action_tema_admin',0,'',NULL,'N;'),
  ('action_tema_clases',0,'',NULL,'N;'),
  ('action_tema_create',0,'',NULL,'N;'),
  ('action_tema_delete',0,'',NULL,'N;'),
  ('action_tema_index',0,'',NULL,'N;'),
  ('action_tema_temas',0,'',NULL,'N;'),
  ('action_tema_update',0,'',NULL,'N;'),
  ('action_tema_view',0,'',NULL,'N;'),
  ('action_tipoevaluacion_admin',0,'',NULL,'N;'),
  ('action_tipoevaluacion_create',0,'',NULL,'N;'),
  ('action_tipoevaluacion_delete',0,'',NULL,'N;'),
  ('action_tipoevaluacion_index',0,'',NULL,'N;'),
  ('action_tipoevaluacion_update',0,'',NULL,'N;'),
  ('action_tipoevaluacion_view',0,'',NULL,'N;'),
  ('action_tipopregunta_admin',0,'',NULL,'N;'),
  ('action_tipopregunta_create',0,'',NULL,'N;'),
  ('action_tipopregunta_delete',0,'',NULL,'N;'),
  ('action_tipopregunta_index',0,'',NULL,'N;'),
  ('action_tipopregunta_update',0,'',NULL,'N;'),
  ('action_tipopregunta_view',0,'',NULL,'N;'),
  ('action_tiporespuesta_admin',0,'',NULL,'N;'),
  ('action_tiporespuesta_create',0,'',NULL,'N;'),
  ('action_tiporespuesta_delete',0,'',NULL,'N;'),
  ('action_tiporespuesta_index',0,'',NULL,'N;'),
  ('action_tiporespuesta_update',0,'',NULL,'N;'),
  ('action_tiporespuesta_view',0,'',NULL,'N;'),
  ('action_ui_ajaxrbacitemdescr',0,'',NULL,'N;'),
  ('action_ui_editprofile',0,'',NULL,'N;'),
  ('action_ui_fieldsadmincreate',0,'',NULL,'N;'),
  ('action_ui_fieldsadmindelete',0,'',NULL,'N;'),
  ('action_ui_fieldsadminlist',0,'',NULL,'N;'),
  ('action_ui_rbacajaxassignment',0,'',NULL,'N;'),
  ('action_ui_rbacajaxsetchilditem',0,'',NULL,'N;'),
  ('action_ui_rbacauthitemchilditems',0,'',NULL,'N;'),
  ('action_ui_rbacauthitemcreate',0,'',NULL,'N;'),
  ('action_ui_rbacauthitemdelete',0,'',NULL,'N;'),
  ('action_ui_rbacauthitemupdate',0,'',NULL,'N;'),
  ('action_ui_rbaclistops',0,'',NULL,'N;'),
  ('action_ui_rbaclistroles',0,'',NULL,'N;'),
  ('action_ui_rbaclisttasks',0,'',NULL,'N;'),
  ('action_ui_rbacusersassignments',0,'',NULL,'N;'),
  ('action_ui_sessionadmin',0,'',NULL,'N;'),
  ('action_ui_systemupdate',0,'',NULL,'N;'),
  ('action_ui_usermanagementadmin',0,'',NULL,'N;'),
  ('action_ui_usermanagementcreate',0,'',NULL,'N;'),
  ('action_ui_usermanagementdelete',0,'',NULL,'N;'),
  ('action_ui_usermanagementupdate',0,'',NULL,'N;'),
  ('action_user_admin',0,'',NULL,'N;'),
  ('action_user_create',0,'',NULL,'N;'),
  ('action_user_delete',0,'',NULL,'N;'),
  ('action_user_index',0,'',NULL,'N;'),
  ('action_user_update',0,'',NULL,'N;'),
  ('action_user_view',0,'',NULL,'N;'),
  ('admin',0,'',NULL,'N;'),
  ('Administrador',2,'Administrador del Sistema de Videoconferencias ARGOS','','N;'),
  ('controller_clase',0,'',NULL,'N;'),
  ('controller_clasepregunta',0,'',NULL,'N;'),
  ('controller_curso',0,'',NULL,'N;'),
  ('controller_cursoestudiantes',0,'',NULL,'N;'),
  ('controller_estudianteevaluacion',0,'',NULL,'N;'),
  ('controller_evaluacion',0,'',NULL,'N;'),
  ('controller_hola',0,'',NULL,'N;'),
  ('controller_mensaje',0,'',NULL,'N;'),
  ('controller_pregunta',0,'',NULL,'N;'),
  ('controller_recurso',0,'',NULL,'N;'),
  ('controller_respuesta',0,'',NULL,'N;'),
  ('controller_respuestaestudiante',0,'',NULL,'N;'),
  ('controller_site',0,'',NULL,'N;'),
  ('controller_tema',0,'',NULL,'N;'),
  ('controller_tipoevaluacion',0,'',NULL,'N;'),
  ('controller_tipopregunta',0,'',NULL,'N;'),
  ('controller_tiporespuesta',0,'',NULL,'N;'),
  ('controller_user',0,'',NULL,'N;'),
  ('Dcente',0,'',NULL,'N;'),
  ('Docente',2,'Docente perteneciente al Sistema de Videoconferencias ARGOS','','N;'),
  ('edit-advanced-profile-features',0,'C:\\xampp\\htdocs\\Prueba1\\protected\\modules\\cruge\\views\\ui\\usermanagementupdate.php linea 114',NULL,'N;'),
  ('Estudiante',2,'Rol de estudiantes que pertenecen al Sistema de Videoconferencias ARGOS','','N;'),
  ('Invitado',2,'Rol de personas que no pertencen al sistema','','N;'),
  ('menu_docente',1,':Menu Docente','','N;'),
  ('mis_cursos',1,':0 Mis Cursos{menu_docente}{action_curso_indexdocente}','','N;'),
  ('student',0,'',NULL,'N;');
COMMIT;

INSERT INTO `cruge_authassignment` (`userid`, `bizrule`, `data`, `itemname`) VALUES 
  (2,NULL,'N;','Invitado'),
  (3,NULL,'N;','Estudiante'),
  (4,NULL,'N;','Docente'),
  (5,NULL,'N;','Administrador'),
  (6,NULL,'N;','Docente');
COMMIT;

INSERT INTO `cruge_authitemchild` (`parent`, `child`) VALUES 
  ('Administrador','action_site_contact'),
  ('Administrador','action_site_error'),
  ('Administrador','action_site_index'),
  ('Administrador','action_site_login'),
  ('Administrador','action_site_logout'),
  ('Administrador','action_ui_rbacusersassignments'),
  ('Administrador','action_ui_usermanagementadmin'),
  ('Administrador','action_ui_usermanagementcreate'),
  ('Administrador','action_ui_usermanagementdelete'),
  ('Administrador','action_ui_usermanagementupdate'),
  ('Administrador','edit-advanced-profile-features'),
  ('Docente','action_respuesta_admin'),
  ('Docente','action_respuesta_create'),
  ('Docente','action_respuesta_delete'),
  ('Docente','action_respuesta_index'),
  ('Docente','action_respuesta_redactar'),
  ('Docente','action_respuesta_update'),
  ('Docente','action_respuesta_view'),
  ('Docente','menu_docente'),
  ('Estudiante','action_site_contact'),
  ('Estudiante','action_site_error'),
  ('Estudiante','action_site_index'),
  ('Estudiante','action_site_login'),
  ('Estudiante','action_site_logout'),
  ('Estudiante','controller_site'),
  ('Invitado','action_site_contact'),
  ('Invitado','action_site_error'),
  ('Invitado','action_site_index'),
  ('Invitado','action_site_login'),
  ('Invitado','controller_site'),
  ('menu_docente','mis_cursos'),
  ('mis_cursos','action_curso_admin'),
  ('mis_cursos','action_curso_create'),
  ('mis_cursos','action_curso_indexdocente'),
  ('mis_cursos','action_curso_view');
COMMIT;

INSERT INTO `cruge_session` (`idsession`, `iduser`, `created`, `expire`, `status`, `ipaddress`, `usagecount`, `lastusage`, `logoutdate`, `ipaddressout`) VALUES 
  (1,1,1367899303,1367901103,0,'127.0.0.1',1,1367899303,1367899614,'::1'),
  (2,1,1368216945,1368218745,1,'127.0.0.1',1,1368216945,NULL,NULL),
  (3,1,1368734965,1368736765,1,'::1',1,1368734965,NULL,NULL),
  (4,1,1370559507,1370561307,0,'::1',1,1370559507,1370559696,'::1'),
  (5,2,1370559707,1370561507,1,'::1',5,1370560598,NULL,NULL),
  (6,1,1370559798,1370561598,0,'::1',1,1370559798,1370559802,'::1'),
  (7,1,1370559859,1370561659,0,'::1',1,1370559859,1370559997,'::1'),
  (8,3,1370560007,1370561807,0,'::1',1,1370560007,1370560365,'::1'),
  (9,1,1370560372,1370562172,0,'::1',1,1370560372,1370560557,'::1'),
  (10,3,1370560567,1370562367,0,'::1',1,1370560567,1370560588,'::1'),
  (11,1,1370560670,1370562470,0,'::1',1,1370560670,1370561126,'::1'),
  (12,3,1370561136,1370562936,0,'::1',1,1370561136,1370561746,'::1'),
  (13,1,1370561764,1370563564,0,'::1',1,1370561764,1370561768,'::1'),
  (14,1,1370561783,1370563583,0,'::1',1,1370561783,1370561830,'::1'),
  (15,3,1370561844,1370563644,0,'::1',1,1370561844,1370561858,'::1'),
  (16,1,1370561942,1370563742,0,'::1',1,1370561942,1370561950,'::1'),
  (17,3,1370561962,1370563762,0,'::1',1,1370561962,1370562005,'::1'),
  (18,3,1370562015,1370563815,0,'::1',1,1370562015,1370562022,'::1'),
  (19,1,1370562032,1370563832,0,'::1',1,1370562032,1370563493,'::1'),
  (20,1,1370563678,1370565478,0,'::1',1,1370563678,NULL,NULL),
  (21,1,1370903302,1370905102,0,'::1',1,1370903302,1370903323,'::1'),
  (22,3,1370903349,1370905149,0,'::1',1,1370903349,1370904579,'::1'),
  (23,1,1370904494,1370906294,0,'::1',1,1370904494,1370905438,'::1'),
  (24,1,1370905447,1370907247,1,'::1',1,1370905447,NULL,NULL),
  (25,3,1371151264,1371153064,0,'::1',1,1371151264,1371151273,'::1'),
  (26,1,1371151283,1371153083,0,'::1',1,1371151283,1371151403,'::1'),
  (27,1,1371836965,1371838765,0,'::1',2,1371838630,NULL,NULL),
  (28,1,1371838886,1371840686,0,'::1',1,1371838886,NULL,NULL),
  (29,1,1371840706,1371842506,0,'::1',1,1371840706,NULL,NULL),
  (30,1,1371842589,1371844389,0,'::1',1,1371842589,NULL,NULL),
  (31,1,1372096233,1372098033,0,'::1',1,1372096233,1372096530,'::1'),
  (32,1,1372096555,1372098355,0,'::1',1,1372096555,NULL,NULL),
  (33,1,1372106493,1372108293,1,'::1',1,1372106493,NULL,NULL),
  (34,1,1372176439,1372178239,0,'::1',1,1372176439,1372176925,'::1'),
  (35,1,1372181953,1372183753,1,'::1',1,1372181953,NULL,NULL),
  (36,1,1372211131,1372212931,0,'::1',2,1372211291,NULL,NULL),
  (37,1,1372213171,1372214971,0,'::1',2,1372213271,NULL,NULL),
  (38,1,1372217270,1372219070,0,'::1',1,1372217270,1372218132,'::1'),
  (39,1,1372535770,1372537570,1,'::1',1,1372535770,NULL,NULL),
  (40,1,1383251791,1383253591,0,'127.0.0.1',1,1383251791,1383251805,'127.0.0.1'),
  (41,1,1385653021,1385654821,0,'127.0.0.1',1,1385653021,1385653480,'127.0.0.1'),
  (42,4,1385656296,1385658096,0,'127.0.0.1',1,1385656296,NULL,NULL),
  (43,4,1385665404,1385667204,0,'127.0.0.1',1,1385665404,NULL,NULL),
  (44,4,1385671079,1385672879,0,'127.0.0.1',1,1385671079,NULL,NULL),
  (45,4,1385924668,1385926468,0,'127.0.0.1',1,1385924668,NULL,NULL),
  (46,4,1385926580,1385928380,0,'127.0.0.1',1,1385926580,1385926632,'127.0.0.1'),
  (47,1,1385926640,1385928440,1,'127.0.0.1',1,1385926640,NULL,NULL),
  (48,4,1385997335,1385999135,0,'127.0.0.1',1,1385997335,1385997519,'127.0.0.1'),
  (49,1,1385997535,1385999335,0,'127.0.0.1',1,1385997535,NULL,NULL),
  (50,1,1385999506,1386001306,0,'127.0.0.1',1,1385999506,1385999590,'127.0.0.1'),
  (51,5,1385999607,1386001407,0,'127.0.0.1',1,1385999607,1385999620,'127.0.0.1'),
  (52,1,1385999628,1386001428,0,'127.0.0.1',1,1385999628,1385999727,'127.0.0.1'),
  (53,5,1385999742,1386001542,0,'127.0.0.1',1,1385999742,NULL,NULL),
  (54,1,1386014154,1386015954,0,'127.0.0.1',1,1386014154,NULL,NULL),
  (55,4,1386855429,1386857229,0,'127.0.0.1',1,1386855429,NULL,NULL),
  (56,1,1387212501,1387214301,0,'127.0.0.1',1,1387212501,1387213414,'127.0.0.1'),
  (57,4,1387213426,1387215226,0,'127.0.0.1',1,1387213426,NULL,NULL),
  (58,4,1387216880,1387218680,0,'127.0.0.1',1,1387216880,NULL,NULL),
  (59,4,1387220238,1387222038,0,'127.0.0.1',1,1387220238,1387220356,'127.0.0.1'),
  (60,1,1387220366,1387222166,0,'127.0.0.1',1,1387220366,1387222012,'127.0.0.1'),
  (61,4,1387222032,1387223832,0,'127.0.0.1',1,1387222032,1387222051,'127.0.0.1'),
  (62,1,1387222061,1387223861,0,'127.0.0.1',1,1387222061,1387222089,'127.0.0.1'),
  (63,4,1387222102,1387223902,0,'127.0.0.1',1,1387222102,1387223650,'127.0.0.1'),
  (64,1,1387223661,1387225461,0,'127.0.0.1',1,1387223661,1387223848,'127.0.0.1'),
  (65,4,1387226191,1387227991,0,'127.0.0.1',1,1387226191,1387226849,'127.0.0.1'),
  (66,1,1387226869,1387228669,0,'127.0.0.1',1,1387226869,1387226929,'127.0.0.1'),
  (67,4,1387226942,1387228742,1,'127.0.0.1',1,1387226942,NULL,NULL),
  (68,4,1388351843,1388353643,0,'127.0.0.1',1,1388351843,NULL,NULL),
  (69,4,1388353935,1388355735,1,'127.0.0.1',1,1388353935,NULL,NULL),
  (70,1,1391823372,1391825172,0,'127.0.0.1',1,1391823372,1391823433,'127.0.0.1'),
  (71,3,1391823565,1391825365,1,'127.0.0.1',1,1391823565,NULL,NULL),
  (72,4,1395357803,1395359603,0,'127.0.0.1',1,1395357803,1395357861,'127.0.0.1'),
  (73,3,1395357927,1395359727,0,'127.0.0.1',1,1395357927,NULL,NULL),
  (74,4,1395437669,1395439469,0,'127.0.0.1',1,1395437669,NULL,NULL),
  (75,4,1395439678,1395441478,0,'127.0.0.1',1,1395439678,NULL,NULL),
  (76,4,1395441554,1395443354,0,'127.0.0.1',1,1395441554,NULL,NULL),
  (77,4,1395697658,1395699458,0,'127.0.0.1',1,1395697658,NULL,NULL),
  (78,4,1395699525,1395701325,0,'127.0.0.1',1,1395699525,NULL,NULL),
  (79,4,1395701470,1395703270,0,'127.0.0.1',1,1395701470,NULL,NULL),
  (80,4,1395703288,1395705088,0,'127.0.0.1',3,1395704245,NULL,NULL),
  (81,4,1396579748,1396581548,0,'127.0.0.1',1,1396579748,NULL,NULL),
  (82,4,1396821600,1396823400,0,'127.0.0.1',1,1396821600,NULL,NULL),
  (83,4,1396824294,1396826094,0,'127.0.0.1',1,1396824294,NULL,NULL),
  (84,4,1396826216,1396828016,0,'127.0.0.1',1,1396826216,NULL,NULL),
  (85,4,1396828258,1396830058,0,'127.0.0.1',1,1396828258,NULL,NULL),
  (86,4,1396830617,1396832417,0,'127.0.0.1',1,1396830617,NULL,NULL),
  (87,4,1396899809,1396901609,1,'127.0.0.1',1,1396899809,NULL,NULL),
  (88,4,1396996336,1396998136,0,'127.0.0.1',1,1396996336,NULL,NULL),
  (89,1,1399074997,1399076797,0,'127.0.0.1',1,1399074997,1399075202,'127.0.0.1'),
  (90,4,1399075217,1399078817,0,'127.0.0.1',1,1399075217,1399075316,'127.0.0.1'),
  (91,3,1399075327,1399078927,0,'127.0.0.1',1,1399075327,1399075329,'127.0.0.1'),
  (92,1,1399075338,1399078938,0,'127.0.0.1',1,1399075338,1399076007,'127.0.0.1'),
  (93,4,1399076023,1399079623,0,'127.0.0.1',1,1399076023,1399076044,'127.0.0.1'),
  (94,1,1399076052,1399079652,0,'127.0.0.1',1,1399076052,1399076173,'127.0.0.1'),
  (95,3,1399076189,1399079789,0,'127.0.0.1',1,1399076189,1399076192,'127.0.0.1'),
  (96,4,1399076238,1399079838,0,'127.0.0.1',1,1399076238,1399076240,'127.0.0.1'),
  (97,1,1399076248,1399079848,0,'127.0.0.1',1,1399076248,1399076881,'127.0.0.1'),
  (98,4,1399076892,1399080492,0,'127.0.0.1',1,1399076892,1399077314,'127.0.0.1'),
  (99,1,1399077321,1399080921,0,'127.0.0.1',1,1399077321,1399078307,'127.0.0.1'),
  (100,4,1399078318,1399081918,0,'127.0.0.1',1,1399078318,1399080583,'127.0.0.1'),
  (101,1,1399080591,1399084191,0,'127.0.0.1',1,1399080591,1399080669,'127.0.0.1'),
  (102,4,1399080679,1399084279,0,'127.0.0.1',1,1399080679,NULL,NULL),
  (103,1,1399084942,1399088542,0,'127.0.0.1',1,1399084942,1399084996,'127.0.0.1'),
  (104,4,1399085008,1399088608,1,'127.0.0.1',1,1399085008,NULL,NULL),
  (105,6,1399150754,1399154354,0,'127.0.0.1',1,1399150754,1399150815,'127.0.0.1'),
  (106,1,1399150823,1399154423,0,'127.0.0.1',1,1399150823,1399150898,'127.0.0.1'),
  (107,4,1399150908,1399154508,0,'127.0.0.1',1,1399150908,1399150946,'127.0.0.1'),
  (108,1,1399150955,1399154555,0,'127.0.0.1',1,1399150955,1399150968,'127.0.0.1'),
  (109,4,1399150978,1399154578,0,'127.0.0.1',1,1399150978,1399151040,'127.0.0.1'),
  (110,1,1399151150,1399154750,0,'127.0.0.1',1,1399151150,1399151221,'127.0.0.1'),
  (111,4,1399151231,1399154831,0,'127.0.0.1',1,1399151231,1399151407,'127.0.0.1'),
  (112,6,1399151417,1399155017,0,'127.0.0.1',1,1399151417,1399151606,'127.0.0.1'),
  (113,1,1399151615,1399155215,0,'127.0.0.1',1,1399151615,1399151632,'127.0.0.1'),
  (114,4,1399151641,1399155241,0,'127.0.0.1',1,1399151641,1399151648,'127.0.0.1'),
  (115,1,1399151655,1399155255,0,'127.0.0.1',1,1399151655,1399151717,'127.0.0.1'),
  (116,4,1399151731,1399155331,0,'127.0.0.1',1,1399151731,1399152604,'127.0.0.1'),
  (117,1,1399152612,1399156212,0,'127.0.0.1',1,1399152612,1399152628,'127.0.0.1'),
  (118,4,1399152638,1399156238,0,'127.0.0.1',1,1399152638,1399152924,'127.0.0.1'),
  (119,1,1399152932,1399156532,0,'127.0.0.1',1,1399152932,1399153089,'127.0.0.1'),
  (120,4,1399153100,1399156700,0,'127.0.0.1',1,1399153100,1399153177,'127.0.0.1'),
  (121,1,1399153184,1399156784,0,'127.0.0.1',1,1399153184,1399153927,'127.0.0.1'),
  (122,4,1399153938,1399157538,0,'127.0.0.1',1,1399153938,1399153962,'127.0.0.1'),
  (123,1,1399153970,1399157570,0,'127.0.0.1',1,1399153970,1399154008,'127.0.0.1'),
  (124,4,1399154018,1399157618,0,'127.0.0.1',1,1399154018,1399154024,'127.0.0.1'),
  (125,6,1399154033,1399157633,0,'127.0.0.1',1,1399154033,1399154528,'127.0.0.1'),
  (126,1,1399154534,1399158134,0,'127.0.0.1',1,1399154534,1399154580,'127.0.0.1'),
  (127,4,1399154591,1399158191,0,'127.0.0.1',1,1399154591,1399154725,'127.0.0.1'),
  (128,1,1399154734,1399158334,0,'127.0.0.1',1,1399154734,1399154815,'127.0.0.1'),
  (129,4,1399154828,1399158428,0,'127.0.0.1',1,1399154828,1399154952,'127.0.0.1'),
  (130,6,1399154962,1399158562,0,'127.0.0.1',1,1399154962,1399155668,'127.0.0.1'),
  (131,4,1399155678,1399159278,0,'127.0.0.1',1,1399155678,NULL,NULL),
  (132,1,1399159468,1399163068,0,'127.0.0.1',1,1399159468,1399159492,'127.0.0.1'),
  (133,4,1399159502,1399163102,0,'127.0.0.1',1,1399159502,1399162805,'127.0.0.1'),
  (134,1,1399162812,1399166412,0,'127.0.0.1',1,1399162812,1399162827,'127.0.0.1'),
  (135,4,1399162836,1399166436,0,'127.0.0.1',1,1399162836,NULL,NULL),
  (136,4,1399178798,1399182398,0,'127.0.0.1',1,1399178798,NULL,NULL),
  (137,4,1399185315,1399188915,1,'127.0.0.1',1,1399185315,NULL,NULL),
  (138,4,1399237147,1399240747,0,'127.0.0.1',1,1399237147,1399237973,'127.0.0.1'),
  (139,1,1399237984,1399241584,0,'127.0.0.1',1,1399237984,1399238002,'127.0.0.1'),
  (140,6,1399238016,1399243416,0,'127.0.0.1',1,1399238016,1399238032,'127.0.0.1'),
  (141,6,1399238044,1399243444,1,'127.0.0.1',1,1399238044,NULL,NULL),
  (142,4,1399417680,1399423080,0,'127.0.0.1',1,1399417680,1399417712,'127.0.0.1'),
  (143,3,1399417720,1399423120,0,'127.0.0.1',1,1399417720,1399417813,'127.0.0.1'),
  (144,4,1399417822,1399423222,0,'127.0.0.1',2,1399417846,NULL,NULL),
  (145,4,1399425755,1399431155,0,'127.0.0.1',1,1399425755,NULL,NULL),
  (146,4,1399500040,1399505440,0,'127.0.0.1',1,1399500040,NULL,NULL),
  (147,4,1399505502,1399510902,0,'127.0.0.1',1,1399505502,NULL,NULL),
  (148,4,1399514099,1399519499,0,'127.0.0.1',1,1399514099,NULL,NULL),
  (149,4,1399571057,1399576457,0,'127.0.0.1',1,1399571057,NULL,NULL),
  (150,4,1399582930,1399588330,0,'127.0.0.1',1,1399582930,NULL,NULL),
  (151,4,1399589490,1399594890,0,'127.0.0.1',1,1399589490,NULL,NULL),
  (152,4,1399599460,1399604860,0,'127.0.0.1',1,1399599460,NULL,NULL),
  (153,4,1399848450,1399853850,0,'127.0.0.1',1,1399848450,NULL,NULL),
  (154,4,1399932171,1399937571,0,'127.0.0.1',1,1399932171,NULL,NULL),
  (155,4,1400015982,1400021382,0,'127.0.0.1',1,1400015982,NULL,NULL),
  (156,4,1400510800,1400516200,0,'127.0.0.1',1,1400510800,NULL,NULL),
  (157,4,1400705342,1400710742,0,'127.0.0.1',1,1400705342,NULL,NULL),
  (158,4,1400773157,1400778557,0,'127.0.0.1',1,1400773157,NULL,NULL),
  (159,4,1400783274,1400788674,0,'127.0.0.1',1,1400783274,NULL,NULL),
  (160,4,1400790471,1400795871,0,'127.0.0.1',1,1400790471,NULL,NULL),
  (161,4,1400796745,1400802145,0,'127.0.0.1',1,1400796745,NULL,NULL),
  (162,4,1400802292,1400807692,0,'127.0.0.1',1,1400802292,NULL,NULL),
  (163,4,1400809068,1400814468,0,'127.0.0.1',1,1400809068,NULL,NULL),
  (164,4,1400816305,1400821705,0,'127.0.0.1',1,1400816305,NULL,NULL),
  (165,4,1401286717,1401292117,0,'127.0.0.1',1,1401286717,1401287608,'127.0.0.1'),
  (166,3,1401287618,1401293018,0,'127.0.0.1',1,1401287618,1401287648,'127.0.0.1'),
  (167,4,1401287669,1401293069,0,'127.0.0.1',1,1401287669,1401288698,'127.0.0.1'),
  (168,3,1401288709,1401294109,0,'127.0.0.1',1,1401288709,1401288723,'127.0.0.1'),
  (169,1,1401288730,1401294130,0,'127.0.0.1',1,1401288730,1401288851,'127.0.0.1'),
  (170,3,1401288859,1401294259,0,'127.0.0.1',2,1401289048,1401289146,'127.0.0.1'),
  (171,4,1401289161,1401294561,0,'127.0.0.1',1,1401289161,1401289175,'127.0.0.1'),
  (172,1,1401289191,1401294591,0,'127.0.0.1',1,1401289191,1401289235,'127.0.0.1'),
  (173,3,1401289247,1401294647,0,'127.0.0.1',1,1401289247,1401291202,'127.0.0.1'),
  (174,4,1401291211,1401296611,0,'127.0.0.1',1,1401291211,1401291761,'127.0.0.1'),
  (175,3,1401291769,1401297169,0,'127.0.0.1',1,1401291769,1401292122,'127.0.0.1'),
  (176,1,1401292143,1401297543,0,'127.0.0.1',1,1401292143,NULL,NULL),
  (177,4,1401318215,1401323615,0,'127.0.0.1',1,1401318215,NULL,NULL),
  (178,4,1401832259,1401837659,0,'127.0.0.1',1,1401832259,NULL,NULL),
  (179,4,1401919798,1401925198,0,'127.0.0.1',1,1401919798,NULL,NULL),
  (180,4,1401978912,1401984312,1,'127.0.0.1',1,1401978912,NULL,NULL);
COMMIT;

INSERT INTO `cruge_system` (`idsystem`, `name`, `largename`, `sessionmaxdurationmins`, `sessionmaxsameipconnections`, `sessionreusesessions`, `sessionmaxsessionsperday`, `sessionmaxsessionsperuser`, `systemnonewsessions`, `systemdown`, `registerusingcaptcha`, `registerusingterms`, `terms`, `registerusingactivation`, `defaultroleforregistration`, `registerusingtermslabel`, `registrationonlogin`) VALUES 
  (1,'default',NULL,90,10,1,-1,-1,0,0,0,0,'',0,'','',1);
COMMIT;

INSERT INTO `evaluacion` (`id_evaluacion`, `id_clase`, `porcentaje`, `tiempo_inicio`, `numero_max_tips`, `cant_dificil`, `cant_intermedio`, `cant_facil`, `puntuacion_dificil`, `puntuacion_intermedio`, `puntuacion_facil`, `tiempo_final`) VALUES 
  (1,3,10,'2014-05-08 07:36:00',3,2,3,4,5,2,1,'2014-05-10 13:43:00');
COMMIT;

INSERT INTO `tipo_pregunta` (`id_tipo_pregunta`, `nombre_tipo_pregunta`) VALUES 
  (1,'Dificil'),
  (2,'Intermedio'),
  (3,'Facil');
COMMIT;

INSERT INTO `pregunta` (`id_pregunta`, `id_evaluacion`, `id_clase_pregunta`, `id_tipo_pregunta`, `texto_pregunta`) VALUES 
  (1,1,2,1,'Pregunta dificil 1'),
  (2,1,2,1,'Pregunta Dificil 2'),
  (3,1,3,1,'Pregunta dificil 3'),
  (4,1,4,2,'Pregunta Intermedio 1'),
  (5,1,4,2,'Pregunta Intermedio 2'),
  (6,1,1,2,'Pregunta Intermedio 3'),
  (7,1,1,3,'Pregunta Facil 1'),
  (8,1,2,3,'Pregunta facil 2'),
  (9,1,3,3,'Pregunta Facil 3'),
  (10,1,4,3,'Pregunta Facil 4');
COMMIT;

INSERT INTO `recurso` (`id_recurso`, `id_clase`, `nombre_recurso`, `ubicacion_recurso`, `duracion_recurso`, `peso_recurso`) VALUES 
  (1,1,'holamundo.ppt','C:/xampp/htdocs/Tesis/resources/holamundo/',NULL,153),
  (2,2,'CapaAplicacion.ppt','C:/xampp/htdocs/Prueba1/resources/CapaAplicacion/',NULL,480),
  (3,3,'recursividad.ppt','C:/xampp/htdocs/Prueba1/resources/recursividad273/',NULL,770);
COMMIT;

INSERT INTO `tipo_respuesta` (`id_tipo_respuesta`, `nombre_tipo_respuesta`) VALUES 
  (1,'Correcta'),
  (2,'Incorrecta');
COMMIT;

INSERT INTO `respuesta` (`id_respuesta`, `id_pregunta`, `id_tipo_respuesta`, `texto_respuesta`, `texto_respuesta_b`) VALUES 
  (1,10,1,'asdasd',NULL),
  (2,10,1,'1234','5678'),
  (3,10,1,'asda','dsadasda'),
  (4,10,1,'1124','asdasda'),
  (5,7,1,'sa',NULL),
  (9,10,1,'323','23234'),
  (10,10,1,'154','5465465'),
  (14,3,1,'Verdadero',NULL),
  (15,9,1,'Falso',NULL);
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
CREATE DATABASE `proyecto2`
    CHARACTER SET 'latin1'
    COLLATE 'latin1_swedish_ci';

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `tema` (
  `id_tema` int(11) NOT NULL AUTO_INCREMENT,
  `id_curso` int(11) NOT NULL,
  `nombre_tema` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_tema` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id_tema`),
  KEY `id_tema` (`id_tema`),
  KEY `fk_tema` (`id_curso`),
  CONSTRAINT `fk_tema` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `clase` (
  `id_clase` int(11) NOT NULL AUTO_INCREMENT,
  `id_tema` int(11) NOT NULL,
  `nombre_clase` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_clase` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id_clase`),
  KEY `id_clase` (`id_clase`),
  KEY `fk_clase` (`id_tema`),
  CONSTRAINT `fk_clase` FOREIGN KEY (`id_tema`) REFERENCES `tema` (`id_tema`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

CREATE TABLE `tipo_evaluacion` (
  `id_tipo_evaluacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_evaluacion` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_tipo_evaluacion`),
  KEY `id_tipo_evaluacion` (`id_tipo_evaluacion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `evaluacion` (
  `id_evaluacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_evaluacion` int(11) NOT NULL,
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
  KEY `id_tipo_evaluacion` (`id_tipo_evaluacion`),
  KEY `id_clase` (`id_clase`),
  CONSTRAINT `evaluacion_fk1` FOREIGN KEY (`id_clase`) REFERENCES `clase` (`id_clase`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `evaluacion_fk` FOREIGN KEY (`id_tipo_evaluacion`) REFERENCES `tipo_evaluacion` (`id_tipo_evaluacion`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `estudiante_evaluacion` (
  `id_evaluacion_estudiante` int(11) NOT NULL AUTO_INCREMENT,
  `id_evaluacion` int(11) NOT NULL,
  `id_curso_estudiante` int(11) NOT NULL,
  `calificacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_evaluacion_estudiante`),
  UNIQUE KEY `id_evaluacion_estudiante` (`id_evaluacion_estudiante`),
  KEY `id_evaluacion` (`id_evaluacion`),
  KEY `id_curso_estudiante` (`id_curso_estudiante`),
  CONSTRAINT `estudiante_evaluacion_fk1` FOREIGN KEY (`id_curso_estudiante`) REFERENCES `curso_estudiantes` (`id_curso_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `estudiante_evaluacion_fk` FOREIGN KEY (`id_evaluacion`) REFERENCES `evaluacion` (`id_evaluacion`) ON DELETE CASCADE ON UPDATE CASCADE
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `pregunta` (
  `id_pregunta` int(11) NOT NULL AUTO_INCREMENT,
  `id_evaluacion` int(11) NOT NULL,
  `id_tipo_pregunta` int(11) NOT NULL,
  `texto_pregunta` text NOT NULL,
  PRIMARY KEY (`id_pregunta`),
  UNIQUE KEY `id_pregunta` (`id_pregunta`),
  KEY `id_tipo_pregunta` (`id_tipo_pregunta`),
  KEY `id_evaluacion` (`id_evaluacion`),
  CONSTRAINT `pregunta_fk` FOREIGN KEY (`id_evaluacion`) REFERENCES `evaluacion` (`id_evaluacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pregunta_fk1` FOREIGN KEY (`id_tipo_pregunta`) REFERENCES `tipo_pregunta` (`id_tipo_pregunta`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `tipo_respuesta` (
  `id_tipo_respuesta` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo_respuesta` varchar(64) NOT NULL,
  PRIMARY KEY (`id_tipo_respuesta`),
  UNIQUE KEY `id_tipo_respuesta` (`id_tipo_respuesta`),
  UNIQUE KEY `nombre_tipo_respuesta` (`nombre_tipo_respuesta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `respuesta` (
  `id_respuesta` int(11) NOT NULL AUTO_INCREMENT,
  `id_pregunta` int(11) NOT NULL,
  `id_tipo_respuesta` int(11) NOT NULL,
  `texto_respuesta` text NOT NULL,
  PRIMARY KEY (`id_respuesta`),
  UNIQUE KEY `id_respuesta` (`id_respuesta`),
  KEY `id_pregunta` (`id_pregunta`),
  KEY `id_tipo_respuesta` (`id_tipo_respuesta`),
  CONSTRAINT `respuesta_fk1` FOREIGN KEY (`id_pregunta`) REFERENCES `pregunta` (`id_pregunta`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `respuesta_fk` FOREIGN KEY (`id_tipo_respuesta`) REFERENCES `tipo_respuesta` (`id_tipo_respuesta`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `respuesta_estudiante` (
  `id_respuesta_estudiante` int(11) NOT NULL AUTO_INCREMENT,
  `id_estudiante_evaluacion` int(11) NOT NULL,
  `id_respuesta` int(11) NOT NULL,
  PRIMARY KEY (`id_respuesta_estudiante`),
  UNIQUE KEY `id_respuesta_estudiante` (`id_respuesta_estudiante`),
  KEY `id_respuesta` (`id_respuesta`),
  KEY `id_estudiante_evaluacion` (`id_estudiante_evaluacion`),
  CONSTRAINT `respuesta_estudiante_fk1` FOREIGN KEY (`id_respuesta`) REFERENCES `respuesta` (`id_respuesta`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `respuesta_estudiante_fk` FOREIGN KEY (`id_estudiante_evaluacion`) REFERENCES `estudiante_evaluacion` (`id_evaluacion_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `cruge_user` (`iduser`, `regdate`, `actdate`, `logondate`, `username`, `email`, `password`, `authkey`, `state`, `totalsessioncounter`, `currentsessioncounter`, `nombreUsuario`, `fechaNacimiento`, `dependencia`, `foto`, `fechaUltConex`, `bioUsuario`, `ipUltConex`, `numTips`, `skype_user`) VALUES
(1, NULL, NULL, 1396820505, 'admin', 'admin@tucorreo.com', 'admin', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, 1370560598, 'invitado', 'invitado', NULL, NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1370904527, NULL, 1397604230, 'ricardo', 'ricardo@correo.com', 'ricardo', 'db06705fbe537cd1c6274546f6ede22d', 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 1372107077, NULL, 1397604198, 'profesor1', 'prof1@uc.edu.ve', 'profesor1', 'e4367f0196ac62802b73f45a7d0971c4', 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 1385999156, NULL, 1385999742, 'administrador', 'administrador@uc.edu.ve', 'administrador', 'ae978bd4cc48f66cc7f0416bdcabe655', 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 1395777326, NULL, NULL, 'profesor2', 'prof@correouc.com.ve', 'profesor2', 'db9fb85670c4deb2a8220dbaa53dc141', 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
COMMIT;

INSERT INTO `curso` (`id_curso`, `nombre_curso`, `descripcion_curso`, `username_docente`, `numero_estudiantes`) VALUES 
  (1,'Algoritmos y Programacion I','Curso de introduccion al desarrollo de algoritmos mediante el uso de pseudocodigo, nociones basicas y estructuras de control. Primeros pasos para programar en lenguaje C (ANSI C).','profesor1',10);
COMMIT;

INSERT INTO `tema` (`id_tema`, `id_curso`, `nombre_tema`, `descripcion_tema`) VALUES 
  (1,1,'Introduccion a los algoritmos','Introduccion al uso de algoritmos');
COMMIT;

INSERT INTO `clase` (`id_clase`, `id_tema`, `nombre_clase`, `descripcion_clase`) VALUES
(1, 1, 'Uso de condicionales (If - Else)', 'Uso de condicionales para el desarrollo de algoritmos.'),
(2, 1, 'Ciclos (for)', 'Uso de ciclos (for) para realzar tareas repetitivas. Ejercicios.'),
(3, 1, 'Recursividad', 'Utilización del método recursividad para la resolución de problemas.');
COMMIT;

INSERT INTO `cruge_authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('action_clase_admin', 0, '', NULL, 'N;'),
('action_clase_create', 0, '', NULL, 'N;'),
('action_clase_delete', 0, '', NULL, 'N;'),
('action_clase_index', 0, '', NULL, 'N;'),
('action_clase_update', 0, '', NULL, 'N;'),
('action_clase_view', 0, '', NULL, 'N;'),
('action_curso_admin', 0, '', NULL, 'N;'),
('action_curso_create', 0, '', NULL, 'N;'),
('action_curso_delete', 0, '', NULL, 'N;'),
('action_curso_index', 0, '', NULL, 'N;'),
('action_curso_update', 0, '', NULL, 'N;'),
('action_curso_view', 0, '', NULL, 'N;'),
('action_cursoestudiantes_admin', 0, '', NULL, 'N;'),
('action_cursoestudiantes_create', 0, '', NULL, 'N;'),
('action_cursoestudiantes_delete', 0, '', NULL, 'N;'),
('action_cursoestudiantes_index', 0, '', NULL, 'N;'),
('action_cursoestudiantes_update', 0, '', NULL, 'N;'),
('action_cursoestudiantes_view', 0, '', NULL, 'N;'),
('action_hola_index', 0, '', NULL, 'N;'),
('action_mensaje_admin', 0, '', NULL, 'N;'),
('action_mensaje_create', 0, '', NULL, 'N;'),
('action_mensaje_delete', 0, '', NULL, 'N;'),
('action_mensaje_index', 0, '', NULL, 'N;'),
('action_mensaje_update', 0, '', NULL, 'N;'),
('action_mensaje_view', 0, '', NULL, 'N;'),
('action_recurso_admin', 0, '', NULL, 'N;'),
('action_recurso_create', 0, '', NULL, 'N;'),
('action_recurso_delete', 0, '', NULL, 'N;'),
('action_recurso_index', 0, '', NULL, 'N;'),
('action_recurso_update', 0, '', NULL, 'N;'),
('action_recurso_view', 0, '', NULL, 'N;'),
('action_site_contact', 0, '', NULL, 'N;'),
('action_site_error', 0, '', NULL, 'N;'),
('action_site_index', 0, '', NULL, 'N;'),
('action_site_login', 0, '', NULL, 'N;'),
('action_site_logout', 0, '', NULL, 'N;'),
('action_tema_admin', 0, '', NULL, 'N;'),
('action_tema_create', 0, '', NULL, 'N;'),
('action_tema_delete', 0, '', NULL, 'N;'),
('action_tema_index', 0, '', NULL, 'N;'),
('action_tema_update', 0, '', NULL, 'N;'),
('action_tema_view', 0, '', NULL, 'N;'),
('action_ui_ajaxrbacitemdescr', 0, '', NULL, 'N;'),
('action_ui_editprofile', 0, '', NULL, 'N;'),
('action_ui_fieldsadmincreate', 0, '', NULL, 'N;'),
('action_ui_fieldsadmindelete', 0, '', NULL, 'N;'),
('action_ui_fieldsadminlist', 0, '', NULL, 'N;'),
('action_ui_rbacajaxassignment', 0, '', NULL, 'N;'),
('action_ui_rbacajaxsetchilditem', 0, '', NULL, 'N;'),
('action_ui_rbacauthitemchilditems', 0, '', NULL, 'N;'),
('action_ui_rbacauthitemcreate', 0, '', NULL, 'N;'),
('action_ui_rbacauthitemdelete', 0, '', NULL, 'N;'),
('action_ui_rbacauthitemupdate', 0, '', NULL, 'N;'),
('action_ui_rbaclistops', 0, '', NULL, 'N;'),
('action_ui_rbaclistroles', 0, '', NULL, 'N;'),
('action_ui_rbaclisttasks', 0, '', NULL, 'N;'),
('action_ui_rbacusersassignments', 0, '', NULL, 'N;'),
('action_ui_sessionadmin', 0, '', NULL, 'N;'),
('action_ui_systemupdate', 0, '', NULL, 'N;'),
('action_ui_usermanagementadmin', 0, '', NULL, 'N;'),
('action_ui_usermanagementcreate', 0, '', NULL, 'N;'),
('action_ui_usermanagementdelete', 0, '', NULL, 'N;'),
('action_ui_usermanagementupdate', 0, '', NULL, 'N;'),
('action_user_admin', 0, '', NULL, 'N;'),
('action_user_create', 0, '', NULL, 'N;'),
('action_user_delete', 0, '', NULL, 'N;'),
('action_user_index', 0, '', NULL, 'N;'),
('action_user_update', 0, '', NULL, 'N;'),
('action_user_view', 0, '', NULL, 'N;'),
('admin', 0, '', NULL, 'N;'),
('Administrador', 2, 'Administrador del Sistema de Videoconferencias ARGOS', '', 'N;'),
('controller_clase', 0, '', NULL, 'N;'),
('controller_curso', 0, '', NULL, 'N;'),
('controller_cursoestudiantes', 0, '', NULL, 'N;'),
('controller_hola', 0, '', NULL, 'N;'),
('controller_mensaje', 0, '', NULL, 'N;'),
('controller_recurso', 0, '', NULL, 'N;'),
('controller_site', 0, '', NULL, 'N;'),
('controller_tema', 0, '', NULL, 'N;'),
('controller_user', 0, '', NULL, 'N;'),
('cursos', 1, ':Cursos{menu_Docente}', '', 'N;'),
('Dcente', 0, '', NULL, 'N;'),
('Docente', 2, 'Docente perteneciente al Sistema de Videoconferencias ARGOS', '', 'N;'),
('edit-advanced-profile-features', 0, 'C:\\xampp\\htdocs\\Prueba1\\protected\\modules\\cruge\\views\\ui\\usermanagementupdate.php linea 114', NULL, 'N;'),
('Estudiante', 2, 'Rol de estudiantes que pertenecen al Sistema de Videoconferencias ARGOS', '', 'N;'),
('Invitado', 2, 'Rol de personas que no pertencen al sistema', '', 'N;'),
('menu_Docente', 1, ':Menu personal para los docentes', '', 'N;'),
('perfil', 1, ':0 Perfil{menu_Docente}{action_user_view}', '', 'N;'),
('student', 0, '', NULL, 'N;');
COMMIT;

INSERT INTO `cruge_authassignment` (`userid`, `bizrule`, `data`, `itemname`) VALUES
(2, NULL, 'N;', 'Invitado'),
(3, NULL, 'N;', 'Estudiante'),
(4, NULL, 'N;', 'Docente'),
(5, NULL, 'N;', 'Administrador'),
(6, NULL, 'N;', 'Docente');
COMMIT;

INSERT INTO `cruge_authitemchild` (`parent`, `child`) VALUES
('Administrador', 'action_site_contact'),
('Estudiante', 'action_site_contact'),
('Invitado', 'action_site_contact'),
('Administrador', 'action_site_error'),
('Estudiante', 'action_site_error'),
('Invitado', 'action_site_error'),
('Administrador', 'action_site_index'),
('Estudiante', 'action_site_index'),
('Invitado', 'action_site_index'),
('Administrador', 'action_site_login'),
('Estudiante', 'action_site_login'),
('Invitado', 'action_site_login'),
('Administrador', 'action_site_logout'),
('Estudiante', 'action_site_logout'),
('Administrador', 'action_ui_rbacusersassignments'),
('Administrador', 'action_ui_usermanagementadmin'),
('Administrador', 'action_ui_usermanagementcreate'),
('Administrador', 'action_ui_usermanagementdelete'),
('Administrador', 'action_ui_usermanagementupdate'),
('perfil', 'action_user_view'),
('Estudiante', 'controller_site'),
('Invitado', 'controller_site'),
('menu_Docente', 'cursos'),
('Administrador', 'edit-advanced-profile-features'),
('Docente', 'menu_Docente'),
('menu_Docente', 'perfil');
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
  (88,4,1396996336,1396998136,0,'127.0.0.1',1,1396996336,NULL,NULL);
COMMIT;

INSERT INTO `cruge_system` (`idsystem`, `name`, `largename`, `sessionmaxdurationmins`, `sessionmaxsameipconnections`, `sessionreusesessions`, `sessionmaxsessionsperday`, `sessionmaxsessionsperuser`, `systemnonewsessions`, `systemdown`, `registerusingcaptcha`, `registerusingterms`, `terms`, `registerusingactivation`, `defaultroleforregistration`, `registerusingtermslabel`, `registrationonlogin`) VALUES 
  (1,'default',NULL,30,10,1,-1,-1,0,0,0,0,'',0,'','',1);
COMMIT;

INSERT INTO `tipo_evaluacion` (`id_tipo_evaluacion`, `nombre_evaluacion`) VALUES 
  (1,'Selección Multiple');
COMMIT;

INSERT INTO `evaluacion` (`id_evaluacion`, `id_tipo_evaluacion`, `id_clase`, `porcentaje`, `tiempo_inicio`, `numero_max_tips`, `cant_dificil`, `cant_intermedio`, `cant_facil`, `puntuacion_dificil`, `puntuacion_intermedio`, `puntuacion_facil`, `tiempo_final`) VALUES 
  (4,1,1,0,'2014-04-07 15:20:03',0,0,0,0,0,0,0,'2014-04-07 15:20:03'),
  (5,1,2,0,'2014-04-08 18:02:46',0,0,0,0,0,0,0,'2014-04-08 18:02:46');
COMMIT;

INSERT INTO `recurso` (`id_recurso`, `id_clase`, `nombre_recurso`, `ubicacion_recurso`, `duracion_recurso`, `peso_recurso`) VALUES
(1, 1, 'holamundo.ppt', 'C:/xampp/htdocs/Tesis/resources/holamundo/', NULL, 153),
(2, 2, 'CapaAplicacion.ppt', 'C:/xampp/htdocs/Prueba1/resources/CapaAplicacion/', NULL, 480),
(3, 3, 'recursividad.ppt', 'C:/xampp/htdocs/Prueba1/resources/recursividad273/', NULL, 770);
COMMIT;


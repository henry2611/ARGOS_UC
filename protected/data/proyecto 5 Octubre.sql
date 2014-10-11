-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-10-2014 a las 04:27:25
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase`
--

CREATE TABLE IF NOT EXISTS `clase` (
  `id_clase` int(11) NOT NULL AUTO_INCREMENT,
  `id_tema` int(11) NOT NULL,
  `nombre_clase` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_clase` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id_clase`),
  KEY `id_clase` (`id_clase`),
  KEY `fk_clase` (`id_tema`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `clase`
--

INSERT INTO `clase` (`id_clase`, `id_tema`, `nombre_clase`, `descripcion_clase`) VALUES
(1, 1, 'Uso de condicionales (If - Else)', 'Uso de condicionales para el desarrollo de algoritmos.'),
(2, 1, 'Ciclos (for)', 'Uso de ciclos (for) para realzar tareas repetitivas. Ejercicios.'),
(3, 1, 'Recursividad', 'Utilizaci'),
(4, 2, 'Definici', 'Clase introductoria al concepto de funci');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase_pregunta`
--

CREATE TABLE IF NOT EXISTS `clase_pregunta` (
  `id_clase_pregunta` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_clase_pregunta` varchar(64) NOT NULL,
  PRIMARY KEY (`id_clase_pregunta`),
  UNIQUE KEY `id_clase_pregunta` (`id_clase_pregunta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `clase_pregunta`
--

INSERT INTO `clase_pregunta` (`id_clase_pregunta`, `nombre_clase_pregunta`) VALUES
(1, 'Selecccion Simple'),
(2, 'Seleccion Multiple'),
(3, 'Verdadero o Falso'),
(4, 'Pareamiento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_authassignment`
--

CREATE TABLE IF NOT EXISTS `cruge_authassignment` (
  `userid` int(11) NOT NULL,
  `bizrule` text COLLATE utf8_unicode_ci,
  `data` text COLLATE utf8_unicode_ci,
  `itemname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`userid`,`itemname`),
  KEY `fk_cruge_authassignment_cruge_authitem1` (`itemname`),
  KEY `fk_cruge_authassignment_user` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cruge_authassignment`
--

INSERT INTO `cruge_authassignment` (`userid`, `bizrule`, `data`, `itemname`) VALUES
(2, NULL, 'N;', 'Invitado'),
(3, NULL, 'N;', 'Estudiante'),
(4, NULL, 'N;', 'Docente'),
(5, NULL, 'N;', 'Administrador'),
(6, NULL, 'N;', 'Docente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_authitem`
--

CREATE TABLE IF NOT EXISTS `cruge_authitem` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `bizrule` text COLLATE utf8_unicode_ci,
  `data` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cruge_authitem`
--

INSERT INTO `cruge_authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('action_clase_admin', 0, '', NULL, 'N;'),
('action_clase_clases', 0, '', NULL, 'N;'),
('action_clase_create', 0, '', NULL, 'N;'),
('action_clase_delete', 0, '', NULL, 'N;'),
('action_clase_index', 0, '', NULL, 'N;'),
('action_clase_update', 0, '', NULL, 'N;'),
('action_clase_view', 0, '', NULL, 'N;'),
('action_clasepregunta_admin', 0, '', NULL, 'N;'),
('action_clasepregunta_create', 0, '', NULL, 'N;'),
('action_clasepregunta_delete', 0, '', NULL, 'N;'),
('action_clasepregunta_index', 0, '', NULL, 'N;'),
('action_clasepregunta_update', 0, '', NULL, 'N;'),
('action_clasepregunta_view', 0, '', NULL, 'N;'),
('action_curso_admin', 0, '', NULL, 'N;'),
('action_curso_create', 0, '', NULL, 'N;'),
('action_curso_delete', 0, '', NULL, 'N;'),
('action_curso_index', 0, '', NULL, 'N;'),
('action_curso_indexdocente', 0, '', NULL, 'N;'),
('action_curso_indexestudiante', 0, '', NULL, 'N;'),
('action_curso_temas', 0, '', NULL, 'N;'),
('action_curso_update', 0, '', NULL, 'N;'),
('action_curso_view', 0, '', NULL, 'N;'),
('action_cursoestudiantes_admin', 0, '', NULL, 'N;'),
('action_cursoestudiantes_create', 0, '', NULL, 'N;'),
('action_cursoestudiantes_delete', 0, '', NULL, 'N;'),
('action_cursoestudiantes_index', 0, '', NULL, 'N;'),
('action_cursoestudiantes_update', 0, '', NULL, 'N;'),
('action_cursoestudiantes_view', 0, '', NULL, 'N;'),
('action_estudianteevaluacion_admin', 0, '', NULL, 'N;'),
('action_estudianteevaluacion_create', 0, '', NULL, 'N;'),
('action_estudianteevaluacion_delete', 0, '', NULL, 'N;'),
('action_estudianteevaluacion_index', 0, '', NULL, 'N;'),
('action_estudianteevaluacion_loadcursos', 0, '', NULL, 'N;'),
('action_estudianteevaluacion_update', 0, '', NULL, 'N;'),
('action_estudianteevaluacion_view', 0, '', NULL, 'N;'),
('action_evaluacion_admin', 0, '', NULL, 'N;'),
('action_evaluacion_create', 0, '', NULL, 'N;'),
('action_evaluacion_delete', 0, '', NULL, 'N;'),
('action_evaluacion_index', 0, '', NULL, 'N;'),
('action_evaluacion_loadcursos', 0, '', NULL, 'N;'),
('action_evaluacion_notas', 0, '', NULL, 'N;'),
('action_evaluacion_update', 0, '', NULL, 'N;'),
('action_evaluacion_view', 0, '', NULL, 'N;'),
('action_hola_index', 0, '', NULL, 'N;'),
('action_mensaje_admin', 0, '', NULL, 'N;'),
('action_mensaje_create', 0, '', NULL, 'N;'),
('action_mensaje_delete', 0, '', NULL, 'N;'),
('action_mensaje_index', 0, '', NULL, 'N;'),
('action_mensaje_update', 0, '', NULL, 'N;'),
('action_mensaje_view', 0, '', NULL, 'N;'),
('action_pregunta_admin', 0, '', NULL, 'N;'),
('action_pregunta_create', 0, '', NULL, 'N;'),
('action_pregunta_delete', 0, '', NULL, 'N;'),
('action_pregunta_index', 0, '', NULL, 'N;'),
('action_pregunta_redactar', 0, '', NULL, 'N;'),
('action_pregunta_update', 0, '', NULL, 'N;'),
('action_pregunta_view', 0, '', NULL, 'N;'),
('action_recurso_admin', 0, '', NULL, 'N;'),
('action_recurso_create', 0, '', NULL, 'N;'),
('action_recurso_delete', 0, '', NULL, 'N;'),
('action_recurso_index', 0, '', NULL, 'N;'),
('action_recurso_update', 0, '', NULL, 'N;'),
('action_recurso_view', 0, '', NULL, 'N;'),
('action_respuesta_admin', 0, '', NULL, 'N;'),
('action_respuesta_create', 0, '', NULL, 'N;'),
('action_respuesta_delete', 0, '', NULL, 'N;'),
('action_respuesta_index', 0, '', NULL, 'N;'),
('action_respuesta_redactar', 0, '', NULL, 'N;'),
('action_respuesta_update', 0, '', NULL, 'N;'),
('action_respuesta_view', 0, '', NULL, 'N;'),
('action_respuestaestudiante_admin', 0, '', NULL, 'N;'),
('action_respuestaestudiante_create', 0, '', NULL, 'N;'),
('action_respuestaestudiante_delete', 0, '', NULL, 'N;'),
('action_respuestaestudiante_examen', 0, '', NULL, 'N;'),
('action_respuestaestudiante_index', 0, '', NULL, 'N;'),
('action_respuestaestudiante_update', 0, '', NULL, 'N;'),
('action_respuestaestudiante_view', 0, '', NULL, 'N;'),
('action_site_contact', 0, '', NULL, 'N;'),
('action_site_error', 0, '', NULL, 'N;'),
('action_site_index', 0, '', NULL, 'N;'),
('action_site_login', 0, '', NULL, 'N;'),
('action_site_logout', 0, '', NULL, 'N;'),
('action_tema_admin', 0, '', NULL, 'N;'),
('action_tema_clases', 0, '', NULL, 'N;'),
('action_tema_create', 0, '', NULL, 'N;'),
('action_tema_delete', 0, '', NULL, 'N;'),
('action_tema_index', 0, '', NULL, 'N;'),
('action_tema_temas', 0, '', NULL, 'N;'),
('action_tema_update', 0, '', NULL, 'N;'),
('action_tema_view', 0, '', NULL, 'N;'),
('action_tipoevaluacion_admin', 0, '', NULL, 'N;'),
('action_tipoevaluacion_create', 0, '', NULL, 'N;'),
('action_tipoevaluacion_delete', 0, '', NULL, 'N;'),
('action_tipoevaluacion_index', 0, '', NULL, 'N;'),
('action_tipoevaluacion_update', 0, '', NULL, 'N;'),
('action_tipoevaluacion_view', 0, '', NULL, 'N;'),
('action_tipopregunta_admin', 0, '', NULL, 'N;'),
('action_tipopregunta_create', 0, '', NULL, 'N;'),
('action_tipopregunta_delete', 0, '', NULL, 'N;'),
('action_tipopregunta_index', 0, '', NULL, 'N;'),
('action_tipopregunta_update', 0, '', NULL, 'N;'),
('action_tipopregunta_view', 0, '', NULL, 'N;'),
('action_tiporespuesta_admin', 0, '', NULL, 'N;'),
('action_tiporespuesta_create', 0, '', NULL, 'N;'),
('action_tiporespuesta_delete', 0, '', NULL, 'N;'),
('action_tiporespuesta_index', 0, '', NULL, 'N;'),
('action_tiporespuesta_update', 0, '', NULL, 'N;'),
('action_tiporespuesta_view', 0, '', NULL, 'N;'),
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
('controller_clasepregunta', 0, '', NULL, 'N;'),
('controller_curso', 0, '', NULL, 'N;'),
('controller_cursoestudiantes', 0, '', NULL, 'N;'),
('controller_estudianteevaluacion', 0, '', NULL, 'N;'),
('controller_evaluacion', 0, '', NULL, 'N;'),
('controller_hola', 0, '', NULL, 'N;'),
('controller_mensaje', 0, '', NULL, 'N;'),
('controller_pregunta', 0, '', NULL, 'N;'),
('controller_recurso', 0, '', NULL, 'N;'),
('controller_respuesta', 0, '', NULL, 'N;'),
('controller_respuestaestudiante', 0, '', NULL, 'N;'),
('controller_site', 0, '', NULL, 'N;'),
('controller_tema', 0, '', NULL, 'N;'),
('controller_tipoevaluacion', 0, '', NULL, 'N;'),
('controller_tipopregunta', 0, '', NULL, 'N;'),
('controller_tiporespuesta', 0, '', NULL, 'N;'),
('controller_user', 0, '', NULL, 'N;'),
('Dcente', 0, '', NULL, 'N;'),
('Docente', 2, 'Docente perteneciente al Sistema de Videoconferencias ARGOS', '', 'N;'),
('edit-advanced-profile-features', 0, 'C:\\xampp\\htdocs\\Prueba1\\protected\\modules\\cruge\\views\\ui\\usermanagementupdate.php linea 114', NULL, 'N;'),
('Estudiante', 2, 'Rol de estudiantes que pertenecen al Sistema de Videoconferencias ARGOS', '', 'N;'),
('Invitado', 2, 'Rol de personas que no pertencen al sistema', '', 'N;'),
('menu_docente', 1, ':Menu Docente', '', 'N;'),
('menu_estudiante', 1, ':Menu Estudiante', NULL, 'N;\r\nN;'),
('mis_cursos', 1, ':0 Mis Cursos{menu_docente}{action_curso_indexdocente}', '', 'N;'),
('mis_evaluaciones', 1, ':Mis Evaluaciones', NULL, 'N;'),
('student', 0, '', NULL, 'N;');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_authitemchild`
--

CREATE TABLE IF NOT EXISTS `cruge_authitemchild` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cruge_authitemchild`
--

INSERT INTO `cruge_authitemchild` (`parent`, `child`) VALUES
('mis_cursos', 'action_curso_admin'),
('mis_cursos', 'action_curso_create'),
('mis_cursos', 'action_curso_indexdocente'),
('mis_cursos', 'action_curso_view'),
('mis_evaluaciones', 'action_estudianteevaluacion_index'),
('Docente', 'action_evaluacion_admin'),
('Docente', 'action_evaluacion_create'),
('Docente', 'action_evaluacion_delete'),
('Docente', 'action_evaluacion_index'),
('Docente', 'action_evaluacion_update'),
('Docente', 'action_evaluacion_view'),
('Docente', 'action_respuesta_admin'),
('Docente', 'action_respuesta_create'),
('Docente', 'action_respuesta_delete'),
('Docente', 'action_respuesta_index'),
('Docente', 'action_respuesta_redactar'),
('Docente', 'action_respuesta_update'),
('Docente', 'action_respuesta_view'),
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
('Estudiante', 'controller_site'),
('Invitado', 'controller_site'),
('Administrador', 'edit-advanced-profile-features'),
('Docente', 'menu_docente'),
('menu_docente', 'mis_cursos'),
('menu_estudiante', 'mis_evaluaciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_field`
--

CREATE TABLE IF NOT EXISTS `cruge_field` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_fieldvalue`
--

CREATE TABLE IF NOT EXISTS `cruge_fieldvalue` (
  `idfieldvalue` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `idfield` int(11) NOT NULL,
  `value` blob,
  PRIMARY KEY (`idfieldvalue`),
  KEY `fk_cruge_fieldvalue_cruge_user1` (`iduser`),
  KEY `fk_cruge_fieldvalue_cruge_field1` (`idfield`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_session`
--

CREATE TABLE IF NOT EXISTS `cruge_session` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=270 ;

--
-- Volcado de datos para la tabla `cruge_session`
--

INSERT INTO `cruge_session` (`idsession`, `iduser`, `created`, `expire`, `status`, `ipaddress`, `usagecount`, `lastusage`, `logoutdate`, `ipaddressout`) VALUES
(1, 1, 1367899303, 1367901103, 0, '127.0.0.1', 1, 1367899303, 1367899614, '::1'),
(2, 1, 1368216945, 1368218745, 1, '127.0.0.1', 1, 1368216945, NULL, NULL),
(3, 1, 1368734965, 1368736765, 1, '::1', 1, 1368734965, NULL, NULL),
(4, 1, 1370559507, 1370561307, 0, '::1', 1, 1370559507, 1370559696, '::1'),
(5, 2, 1370559707, 1370561507, 1, '::1', 5, 1370560598, NULL, NULL),
(6, 1, 1370559798, 1370561598, 0, '::1', 1, 1370559798, 1370559802, '::1'),
(7, 1, 1370559859, 1370561659, 0, '::1', 1, 1370559859, 1370559997, '::1'),
(8, 3, 1370560007, 1370561807, 0, '::1', 1, 1370560007, 1370560365, '::1'),
(9, 1, 1370560372, 1370562172, 0, '::1', 1, 1370560372, 1370560557, '::1'),
(10, 3, 1370560567, 1370562367, 0, '::1', 1, 1370560567, 1370560588, '::1'),
(11, 1, 1370560670, 1370562470, 0, '::1', 1, 1370560670, 1370561126, '::1'),
(12, 3, 1370561136, 1370562936, 0, '::1', 1, 1370561136, 1370561746, '::1'),
(13, 1, 1370561764, 1370563564, 0, '::1', 1, 1370561764, 1370561768, '::1'),
(14, 1, 1370561783, 1370563583, 0, '::1', 1, 1370561783, 1370561830, '::1'),
(15, 3, 1370561844, 1370563644, 0, '::1', 1, 1370561844, 1370561858, '::1'),
(16, 1, 1370561942, 1370563742, 0, '::1', 1, 1370561942, 1370561950, '::1'),
(17, 3, 1370561962, 1370563762, 0, '::1', 1, 1370561962, 1370562005, '::1'),
(18, 3, 1370562015, 1370563815, 0, '::1', 1, 1370562015, 1370562022, '::1'),
(19, 1, 1370562032, 1370563832, 0, '::1', 1, 1370562032, 1370563493, '::1'),
(20, 1, 1370563678, 1370565478, 0, '::1', 1, 1370563678, NULL, NULL),
(21, 1, 1370903302, 1370905102, 0, '::1', 1, 1370903302, 1370903323, '::1'),
(22, 3, 1370903349, 1370905149, 0, '::1', 1, 1370903349, 1370904579, '::1'),
(23, 1, 1370904494, 1370906294, 0, '::1', 1, 1370904494, 1370905438, '::1'),
(24, 1, 1370905447, 1370907247, 1, '::1', 1, 1370905447, NULL, NULL),
(25, 3, 1371151264, 1371153064, 0, '::1', 1, 1371151264, 1371151273, '::1'),
(26, 1, 1371151283, 1371153083, 0, '::1', 1, 1371151283, 1371151403, '::1'),
(27, 1, 1371836965, 1371838765, 0, '::1', 2, 1371838630, NULL, NULL),
(28, 1, 1371838886, 1371840686, 0, '::1', 1, 1371838886, NULL, NULL),
(29, 1, 1371840706, 1371842506, 0, '::1', 1, 1371840706, NULL, NULL),
(30, 1, 1371842589, 1371844389, 0, '::1', 1, 1371842589, NULL, NULL),
(31, 1, 1372096233, 1372098033, 0, '::1', 1, 1372096233, 1372096530, '::1'),
(32, 1, 1372096555, 1372098355, 0, '::1', 1, 1372096555, NULL, NULL),
(33, 1, 1372106493, 1372108293, 1, '::1', 1, 1372106493, NULL, NULL),
(34, 1, 1372176439, 1372178239, 0, '::1', 1, 1372176439, 1372176925, '::1'),
(35, 1, 1372181953, 1372183753, 1, '::1', 1, 1372181953, NULL, NULL),
(36, 1, 1372211131, 1372212931, 0, '::1', 2, 1372211291, NULL, NULL),
(37, 1, 1372213171, 1372214971, 0, '::1', 2, 1372213271, NULL, NULL),
(38, 1, 1372217270, 1372219070, 0, '::1', 1, 1372217270, 1372218132, '::1'),
(39, 1, 1372535770, 1372537570, 1, '::1', 1, 1372535770, NULL, NULL),
(40, 1, 1383251791, 1383253591, 0, '127.0.0.1', 1, 1383251791, 1383251805, '127.0.0.1'),
(41, 1, 1385653021, 1385654821, 0, '127.0.0.1', 1, 1385653021, 1385653480, '127.0.0.1'),
(42, 4, 1385656296, 1385658096, 0, '127.0.0.1', 1, 1385656296, NULL, NULL),
(43, 4, 1385665404, 1385667204, 0, '127.0.0.1', 1, 1385665404, NULL, NULL),
(44, 4, 1385671079, 1385672879, 0, '127.0.0.1', 1, 1385671079, NULL, NULL),
(45, 4, 1385924668, 1385926468, 0, '127.0.0.1', 1, 1385924668, NULL, NULL),
(46, 4, 1385926580, 1385928380, 0, '127.0.0.1', 1, 1385926580, 1385926632, '127.0.0.1'),
(47, 1, 1385926640, 1385928440, 1, '127.0.0.1', 1, 1385926640, NULL, NULL),
(48, 4, 1385997335, 1385999135, 0, '127.0.0.1', 1, 1385997335, 1385997519, '127.0.0.1'),
(49, 1, 1385997535, 1385999335, 0, '127.0.0.1', 1, 1385997535, NULL, NULL),
(50, 1, 1385999506, 1386001306, 0, '127.0.0.1', 1, 1385999506, 1385999590, '127.0.0.1'),
(51, 5, 1385999607, 1386001407, 0, '127.0.0.1', 1, 1385999607, 1385999620, '127.0.0.1'),
(52, 1, 1385999628, 1386001428, 0, '127.0.0.1', 1, 1385999628, 1385999727, '127.0.0.1'),
(53, 5, 1385999742, 1386001542, 0, '127.0.0.1', 1, 1385999742, NULL, NULL),
(54, 1, 1386014154, 1386015954, 0, '127.0.0.1', 1, 1386014154, NULL, NULL),
(55, 4, 1386855429, 1386857229, 0, '127.0.0.1', 1, 1386855429, NULL, NULL),
(56, 1, 1387212501, 1387214301, 0, '127.0.0.1', 1, 1387212501, 1387213414, '127.0.0.1'),
(57, 4, 1387213426, 1387215226, 0, '127.0.0.1', 1, 1387213426, NULL, NULL),
(58, 4, 1387216880, 1387218680, 0, '127.0.0.1', 1, 1387216880, NULL, NULL),
(59, 4, 1387220238, 1387222038, 0, '127.0.0.1', 1, 1387220238, 1387220356, '127.0.0.1'),
(60, 1, 1387220366, 1387222166, 0, '127.0.0.1', 1, 1387220366, 1387222012, '127.0.0.1'),
(61, 4, 1387222032, 1387223832, 0, '127.0.0.1', 1, 1387222032, 1387222051, '127.0.0.1'),
(62, 1, 1387222061, 1387223861, 0, '127.0.0.1', 1, 1387222061, 1387222089, '127.0.0.1'),
(63, 4, 1387222102, 1387223902, 0, '127.0.0.1', 1, 1387222102, 1387223650, '127.0.0.1'),
(64, 1, 1387223661, 1387225461, 0, '127.0.0.1', 1, 1387223661, 1387223848, '127.0.0.1'),
(65, 4, 1387226191, 1387227991, 0, '127.0.0.1', 1, 1387226191, 1387226849, '127.0.0.1'),
(66, 1, 1387226869, 1387228669, 0, '127.0.0.1', 1, 1387226869, 1387226929, '127.0.0.1'),
(67, 4, 1387226942, 1387228742, 1, '127.0.0.1', 1, 1387226942, NULL, NULL),
(68, 4, 1388351843, 1388353643, 0, '127.0.0.1', 1, 1388351843, NULL, NULL),
(69, 4, 1388353935, 1388355735, 1, '127.0.0.1', 1, 1388353935, NULL, NULL),
(70, 1, 1391823372, 1391825172, 0, '127.0.0.1', 1, 1391823372, 1391823433, '127.0.0.1'),
(71, 3, 1391823565, 1391825365, 1, '127.0.0.1', 1, 1391823565, NULL, NULL),
(72, 4, 1395357803, 1395359603, 0, '127.0.0.1', 1, 1395357803, 1395357861, '127.0.0.1'),
(73, 3, 1395357927, 1395359727, 0, '127.0.0.1', 1, 1395357927, NULL, NULL),
(74, 4, 1395437669, 1395439469, 0, '127.0.0.1', 1, 1395437669, NULL, NULL),
(75, 4, 1395439678, 1395441478, 0, '127.0.0.1', 1, 1395439678, NULL, NULL),
(76, 4, 1395441554, 1395443354, 0, '127.0.0.1', 1, 1395441554, NULL, NULL),
(77, 4, 1395697658, 1395699458, 0, '127.0.0.1', 1, 1395697658, NULL, NULL),
(78, 4, 1395699525, 1395701325, 0, '127.0.0.1', 1, 1395699525, NULL, NULL),
(79, 4, 1395701470, 1395703270, 0, '127.0.0.1', 1, 1395701470, NULL, NULL),
(80, 4, 1395703288, 1395705088, 0, '127.0.0.1', 3, 1395704245, NULL, NULL),
(81, 4, 1396579748, 1396581548, 0, '127.0.0.1', 1, 1396579748, NULL, NULL),
(82, 4, 1396821600, 1396823400, 0, '127.0.0.1', 1, 1396821600, NULL, NULL),
(83, 4, 1396824294, 1396826094, 0, '127.0.0.1', 1, 1396824294, NULL, NULL),
(84, 4, 1396826216, 1396828016, 0, '127.0.0.1', 1, 1396826216, NULL, NULL),
(85, 4, 1396828258, 1396830058, 0, '127.0.0.1', 1, 1396828258, NULL, NULL),
(86, 4, 1396830617, 1396832417, 0, '127.0.0.1', 1, 1396830617, NULL, NULL),
(87, 4, 1396899809, 1396901609, 1, '127.0.0.1', 1, 1396899809, NULL, NULL),
(88, 4, 1396996336, 1396998136, 0, '127.0.0.1', 1, 1396996336, NULL, NULL),
(89, 1, 1399074997, 1399076797, 0, '127.0.0.1', 1, 1399074997, 1399075202, '127.0.0.1'),
(90, 4, 1399075217, 1399078817, 0, '127.0.0.1', 1, 1399075217, 1399075316, '127.0.0.1'),
(91, 3, 1399075327, 1399078927, 0, '127.0.0.1', 1, 1399075327, 1399075329, '127.0.0.1'),
(92, 1, 1399075338, 1399078938, 0, '127.0.0.1', 1, 1399075338, 1399076007, '127.0.0.1'),
(93, 4, 1399076023, 1399079623, 0, '127.0.0.1', 1, 1399076023, 1399076044, '127.0.0.1'),
(94, 1, 1399076052, 1399079652, 0, '127.0.0.1', 1, 1399076052, 1399076173, '127.0.0.1'),
(95, 3, 1399076189, 1399079789, 0, '127.0.0.1', 1, 1399076189, 1399076192, '127.0.0.1'),
(96, 4, 1399076238, 1399079838, 0, '127.0.0.1', 1, 1399076238, 1399076240, '127.0.0.1'),
(97, 1, 1399076248, 1399079848, 0, '127.0.0.1', 1, 1399076248, 1399076881, '127.0.0.1'),
(98, 4, 1399076892, 1399080492, 0, '127.0.0.1', 1, 1399076892, 1399077314, '127.0.0.1'),
(99, 1, 1399077321, 1399080921, 0, '127.0.0.1', 1, 1399077321, 1399078307, '127.0.0.1'),
(100, 4, 1399078318, 1399081918, 0, '127.0.0.1', 1, 1399078318, 1399080583, '127.0.0.1'),
(101, 1, 1399080591, 1399084191, 0, '127.0.0.1', 1, 1399080591, 1399080669, '127.0.0.1'),
(102, 4, 1399080679, 1399084279, 0, '127.0.0.1', 1, 1399080679, NULL, NULL),
(103, 1, 1399084942, 1399088542, 0, '127.0.0.1', 1, 1399084942, 1399084996, '127.0.0.1'),
(104, 4, 1399085008, 1399088608, 1, '127.0.0.1', 1, 1399085008, NULL, NULL),
(105, 6, 1399150754, 1399154354, 0, '127.0.0.1', 1, 1399150754, 1399150815, '127.0.0.1'),
(106, 1, 1399150823, 1399154423, 0, '127.0.0.1', 1, 1399150823, 1399150898, '127.0.0.1'),
(107, 4, 1399150908, 1399154508, 0, '127.0.0.1', 1, 1399150908, 1399150946, '127.0.0.1'),
(108, 1, 1399150955, 1399154555, 0, '127.0.0.1', 1, 1399150955, 1399150968, '127.0.0.1'),
(109, 4, 1399150978, 1399154578, 0, '127.0.0.1', 1, 1399150978, 1399151040, '127.0.0.1'),
(110, 1, 1399151150, 1399154750, 0, '127.0.0.1', 1, 1399151150, 1399151221, '127.0.0.1'),
(111, 4, 1399151231, 1399154831, 0, '127.0.0.1', 1, 1399151231, 1399151407, '127.0.0.1'),
(112, 6, 1399151417, 1399155017, 0, '127.0.0.1', 1, 1399151417, 1399151606, '127.0.0.1'),
(113, 1, 1399151615, 1399155215, 0, '127.0.0.1', 1, 1399151615, 1399151632, '127.0.0.1'),
(114, 4, 1399151641, 1399155241, 0, '127.0.0.1', 1, 1399151641, 1399151648, '127.0.0.1'),
(115, 1, 1399151655, 1399155255, 0, '127.0.0.1', 1, 1399151655, 1399151717, '127.0.0.1'),
(116, 4, 1399151731, 1399155331, 0, '127.0.0.1', 1, 1399151731, 1399152604, '127.0.0.1'),
(117, 1, 1399152612, 1399156212, 0, '127.0.0.1', 1, 1399152612, 1399152628, '127.0.0.1'),
(118, 4, 1399152638, 1399156238, 0, '127.0.0.1', 1, 1399152638, 1399152924, '127.0.0.1'),
(119, 1, 1399152932, 1399156532, 0, '127.0.0.1', 1, 1399152932, 1399153089, '127.0.0.1'),
(120, 4, 1399153100, 1399156700, 0, '127.0.0.1', 1, 1399153100, 1399153177, '127.0.0.1'),
(121, 1, 1399153184, 1399156784, 0, '127.0.0.1', 1, 1399153184, 1399153927, '127.0.0.1'),
(122, 4, 1399153938, 1399157538, 0, '127.0.0.1', 1, 1399153938, 1399153962, '127.0.0.1'),
(123, 1, 1399153970, 1399157570, 0, '127.0.0.1', 1, 1399153970, 1399154008, '127.0.0.1'),
(124, 4, 1399154018, 1399157618, 0, '127.0.0.1', 1, 1399154018, 1399154024, '127.0.0.1'),
(125, 6, 1399154033, 1399157633, 0, '127.0.0.1', 1, 1399154033, 1399154528, '127.0.0.1'),
(126, 1, 1399154534, 1399158134, 0, '127.0.0.1', 1, 1399154534, 1399154580, '127.0.0.1'),
(127, 4, 1399154591, 1399158191, 0, '127.0.0.1', 1, 1399154591, 1399154725, '127.0.0.1'),
(128, 1, 1399154734, 1399158334, 0, '127.0.0.1', 1, 1399154734, 1399154815, '127.0.0.1'),
(129, 4, 1399154828, 1399158428, 0, '127.0.0.1', 1, 1399154828, 1399154952, '127.0.0.1'),
(130, 6, 1399154962, 1399158562, 0, '127.0.0.1', 1, 1399154962, 1399155668, '127.0.0.1'),
(131, 4, 1399155678, 1399159278, 0, '127.0.0.1', 1, 1399155678, NULL, NULL),
(132, 1, 1399159468, 1399163068, 0, '127.0.0.1', 1, 1399159468, 1399159492, '127.0.0.1'),
(133, 4, 1399159502, 1399163102, 0, '127.0.0.1', 1, 1399159502, 1399162805, '127.0.0.1'),
(134, 1, 1399162812, 1399166412, 0, '127.0.0.1', 1, 1399162812, 1399162827, '127.0.0.1'),
(135, 4, 1399162836, 1399166436, 0, '127.0.0.1', 1, 1399162836, NULL, NULL),
(136, 4, 1399178798, 1399182398, 0, '127.0.0.1', 1, 1399178798, NULL, NULL),
(137, 4, 1399185315, 1399188915, 1, '127.0.0.1', 1, 1399185315, NULL, NULL),
(138, 4, 1399237147, 1399240747, 0, '127.0.0.1', 1, 1399237147, 1399237973, '127.0.0.1'),
(139, 1, 1399237984, 1399241584, 0, '127.0.0.1', 1, 1399237984, 1399238002, '127.0.0.1'),
(140, 6, 1399238016, 1399243416, 0, '127.0.0.1', 1, 1399238016, 1399238032, '127.0.0.1'),
(141, 6, 1399238044, 1399243444, 1, '127.0.0.1', 1, 1399238044, NULL, NULL),
(142, 4, 1399417680, 1399423080, 0, '127.0.0.1', 1, 1399417680, 1399417712, '127.0.0.1'),
(143, 3, 1399417720, 1399423120, 0, '127.0.0.1', 1, 1399417720, 1399417813, '127.0.0.1'),
(144, 4, 1399417822, 1399423222, 0, '127.0.0.1', 2, 1399417846, NULL, NULL),
(145, 4, 1399425755, 1399431155, 0, '127.0.0.1', 1, 1399425755, NULL, NULL),
(146, 4, 1399500040, 1399505440, 0, '127.0.0.1', 1, 1399500040, NULL, NULL),
(147, 4, 1399505502, 1399510902, 0, '127.0.0.1', 1, 1399505502, NULL, NULL),
(148, 4, 1399514099, 1399519499, 0, '127.0.0.1', 1, 1399514099, NULL, NULL),
(149, 4, 1399571057, 1399576457, 0, '127.0.0.1', 1, 1399571057, NULL, NULL),
(150, 4, 1399582930, 1399588330, 0, '127.0.0.1', 1, 1399582930, NULL, NULL),
(151, 4, 1399589490, 1399594890, 0, '127.0.0.1', 1, 1399589490, NULL, NULL),
(152, 4, 1399599460, 1399604860, 0, '127.0.0.1', 1, 1399599460, NULL, NULL),
(153, 4, 1399848450, 1399853850, 0, '127.0.0.1', 1, 1399848450, NULL, NULL),
(154, 4, 1399932171, 1399937571, 0, '127.0.0.1', 1, 1399932171, NULL, NULL),
(155, 4, 1400015982, 1400021382, 0, '127.0.0.1', 1, 1400015982, NULL, NULL),
(156, 4, 1400510800, 1400516200, 0, '127.0.0.1', 1, 1400510800, NULL, NULL),
(157, 4, 1400705342, 1400710742, 0, '127.0.0.1', 1, 1400705342, NULL, NULL),
(158, 4, 1400773157, 1400778557, 0, '127.0.0.1', 1, 1400773157, NULL, NULL),
(159, 4, 1400783274, 1400788674, 0, '127.0.0.1', 1, 1400783274, NULL, NULL),
(160, 4, 1400790471, 1400795871, 0, '127.0.0.1', 1, 1400790471, NULL, NULL),
(161, 4, 1400796745, 1400802145, 0, '127.0.0.1', 1, 1400796745, NULL, NULL),
(162, 4, 1400802292, 1400807692, 0, '127.0.0.1', 1, 1400802292, NULL, NULL),
(163, 4, 1400809068, 1400814468, 0, '127.0.0.1', 1, 1400809068, NULL, NULL),
(164, 4, 1400816305, 1400821705, 0, '127.0.0.1', 1, 1400816305, NULL, NULL),
(165, 4, 1401286717, 1401292117, 0, '127.0.0.1', 1, 1401286717, 1401287608, '127.0.0.1'),
(166, 3, 1401287618, 1401293018, 0, '127.0.0.1', 1, 1401287618, 1401287648, '127.0.0.1'),
(167, 4, 1401287669, 1401293069, 0, '127.0.0.1', 1, 1401287669, 1401288698, '127.0.0.1'),
(168, 3, 1401288709, 1401294109, 0, '127.0.0.1', 1, 1401288709, 1401288723, '127.0.0.1'),
(169, 1, 1401288730, 1401294130, 0, '127.0.0.1', 1, 1401288730, 1401288851, '127.0.0.1'),
(170, 3, 1401288859, 1401294259, 0, '127.0.0.1', 2, 1401289048, 1401289146, '127.0.0.1'),
(171, 4, 1401289161, 1401294561, 0, '127.0.0.1', 1, 1401289161, 1401289175, '127.0.0.1'),
(172, 1, 1401289191, 1401294591, 0, '127.0.0.1', 1, 1401289191, 1401289235, '127.0.0.1'),
(173, 3, 1401289247, 1401294647, 0, '127.0.0.1', 1, 1401289247, 1401291202, '127.0.0.1'),
(174, 4, 1401291211, 1401296611, 0, '127.0.0.1', 1, 1401291211, 1401291761, '127.0.0.1'),
(175, 3, 1401291769, 1401297169, 0, '127.0.0.1', 1, 1401291769, 1401292122, '127.0.0.1'),
(176, 1, 1401292143, 1401297543, 0, '127.0.0.1', 1, 1401292143, NULL, NULL),
(177, 4, 1401318215, 1401323615, 0, '127.0.0.1', 1, 1401318215, NULL, NULL),
(178, 4, 1401832259, 1401837659, 0, '127.0.0.1', 1, 1401832259, NULL, NULL),
(179, 4, 1401919798, 1401925198, 0, '127.0.0.1', 1, 1401919798, NULL, NULL),
(180, 4, 1401978912, 1401984312, 0, '127.0.0.1', 1, 1401978912, NULL, NULL),
(181, 3, 1402005631, 1402011031, 0, '127.0.0.1', 1, 1402005631, NULL, NULL),
(182, 3, 1404256450, 1404261850, 0, '127.0.0.1', 1, 1404256450, NULL, NULL),
(183, 3, 1404335378, 1404340778, 0, '127.0.0.1', 1, 1404335378, NULL, NULL),
(184, 3, 1404343474, 1404348874, 0, '127.0.0.1', 1, 1404343474, NULL, NULL),
(185, 3, 1404418578, 1404423978, 0, '127.0.0.1', 1, 1404418578, NULL, NULL),
(186, 3, 1404922445, 1404927845, 0, '127.0.0.1', 1, 1404922445, 1404923640, '127.0.0.1'),
(187, 1, 1404923830, 1404929230, 0, '127.0.0.1', 1, 1404923830, NULL, NULL),
(188, 3, 1404935416, 1404940816, 0, '127.0.0.1', 1, 1404935416, 1404935560, '127.0.0.1'),
(189, 1, 1404935567, 1404940967, 0, '127.0.0.1', 1, 1404935567, 1404938403, '127.0.0.1'),
(190, 3, 1404945976, 1404951376, 0, '127.0.0.1', 1, 1404945976, NULL, NULL),
(191, 3, 1404951403, 1404956803, 0, '127.0.0.1', 1, 1404951403, NULL, NULL),
(192, 3, 1404966036, 1404971436, 0, '127.0.0.1', 1, 1404966036, NULL, NULL),
(193, 3, 1405003449, 1405008849, 0, '127.0.0.1', 1, 1405003449, NULL, NULL),
(194, 4, 1405180387, 1405185787, 0, '127.0.0.1', 1, 1405180387, 1405181444, '127.0.0.1'),
(195, 3, 1405181454, 1405186854, 0, '127.0.0.1', 1, 1405181454, NULL, NULL),
(196, 3, 1405350933, 1405356333, 0, '127.0.0.1', 1, 1405350933, NULL, NULL),
(197, 3, 1405434782, 1405440182, 0, '127.0.0.1', 1, 1405434782, NULL, NULL),
(198, 3, 1405440449, 1405445849, 0, '127.0.0.1', 1, 1405440449, NULL, NULL),
(199, 3, 1405470081, 1405475481, 0, '127.0.0.1', 1, 1405470081, NULL, NULL),
(200, 3, 1405475583, 1405480983, 0, '127.0.0.1', 1, 1405475583, NULL, NULL),
(201, 3, 1405522630, 1405528030, 0, '127.0.0.1', 1, 1405522630, 1405522694, '127.0.0.1'),
(202, 4, 1405522710, 1405528110, 0, '127.0.0.1', 1, 1405522710, 1405523704, '127.0.0.1'),
(203, 3, 1405523716, 1405529116, 0, '127.0.0.1', 1, 1405523716, NULL, NULL),
(204, 3, 1405554458, 1405559858, 0, '127.0.0.1', 1, 1405554458, NULL, NULL),
(205, 3, 1405634494, 1405639894, 0, '127.0.0.1', 1, 1405634494, NULL, NULL),
(206, 3, 1405954899, 1405960299, 0, '127.0.0.1', 1, 1405954899, 1405958102, '127.0.0.1'),
(207, 4, 1405958119, 1405963519, 0, '127.0.0.1', 1, 1405958119, 1405958265, '127.0.0.1'),
(208, 3, 1405958277, 1405963677, 0, '127.0.0.1', 1, 1405958277, 1405961210, '127.0.0.1'),
(209, 4, 1405961221, 1405966621, 0, '127.0.0.1', 1, 1405961221, 1405961316, '127.0.0.1'),
(210, 3, 1405961328, 1405966728, 0, '127.0.0.1', 1, 1405961328, NULL, NULL),
(211, 3, 1405976776, 1405982176, 0, '127.0.0.1', 1, 1405976776, NULL, NULL),
(212, 3, 1405984530, 1405989930, 0, '127.0.0.1', 1, 1405984530, NULL, NULL),
(213, 3, 1405992295, 1405997695, 0, '127.0.0.1', 1, 1405992295, NULL, NULL),
(214, 3, 1406042369, 1406047769, 1, '127.0.0.1', 1, 1406042369, NULL, NULL),
(215, 3, 1406126786, 1406132186, 0, '127.0.0.1', 1, 1406126786, NULL, NULL),
(216, 3, 1406132859, 1406138259, 0, '127.0.0.1', 1, 1406132859, NULL, NULL),
(217, 3, 1406153815, 1406159215, 0, '127.0.0.1', 1, 1406153815, NULL, NULL),
(218, 3, 1406228800, 1406234200, 0, '127.0.0.1', 1, 1406228800, NULL, NULL),
(219, 3, 1406236042, 1406241442, 0, '127.0.0.1', 1, 1406236042, NULL, NULL),
(220, 3, 1406242101, 1406247501, 0, '127.0.0.1', 1, 1406242101, NULL, NULL),
(221, 3, 1406256241, 1406261641, 0, '127.0.0.1', 1, 1406256241, NULL, NULL),
(222, 3, 1406261992, 1406267392, 0, '127.0.0.1', 1, 1406261992, NULL, NULL),
(223, 3, 1406299571, 1406304971, 0, '127.0.0.1', 1, 1406299571, NULL, NULL),
(224, 3, 1406498022, 1406503422, 0, '127.0.0.1', 1, 1406498022, NULL, NULL),
(225, 3, 1406562593, 1406567993, 0, '127.0.0.1', 1, 1406562593, NULL, NULL),
(226, 3, 1406648697, 1406654097, 0, '127.0.0.1', 1, 1406648697, NULL, NULL),
(227, 3, 1406669088, 1406674488, 0, '127.0.0.1', 1, 1406669088, NULL, NULL),
(228, 3, 1406684333, 1406689733, 0, '127.0.0.1', 1, 1406684333, NULL, NULL),
(229, 3, 1406689846, 1406695246, 0, '127.0.0.1', 1, 1406689846, NULL, NULL),
(230, 3, 1406751411, 1406756811, 0, '127.0.0.1', 1, 1406751411, NULL, NULL),
(231, 3, 1406769163, 1406774563, 0, '127.0.0.1', 1, 1406769163, NULL, NULL),
(232, 3, 1406823908, 1406829308, 0, '127.0.0.1', 1, 1406823908, NULL, NULL),
(233, 3, 1406906514, 1406911914, 0, '127.0.0.1', 1, 1406906514, NULL, NULL),
(234, 3, 1407030950, 1407036350, 0, '127.0.0.1', 1, 1407030950, NULL, NULL),
(235, 3, 1407262341, 1407267741, 0, '127.0.0.1', 1, 1407262341, NULL, NULL),
(236, 3, 1407343553, 1407348953, 0, '127.0.0.1', 1, 1407343553, NULL, NULL),
(237, 4, 1407361182, 1407366582, 0, '127.0.0.1', 1, 1407361182, 1407365209, '127.0.0.1'),
(238, 4, 1407365220, 1407370620, 0, '127.0.0.1', 1, 1407365220, 1407365259, '127.0.0.1'),
(239, 3, 1407365268, 1407370668, 0, '127.0.0.1', 1, 1407365268, NULL, NULL),
(240, 4, 1407365424, 1407370824, 1, '192.168.1.114', 1, 1407365424, NULL, NULL),
(241, 4, 1407376625, 1407382025, 0, '127.0.0.1', 1, 1407376625, NULL, NULL),
(242, 4, 1407382263, 1407387663, 1, '127.0.0.1', 1, 1407382263, NULL, NULL),
(243, 4, 1407465490, 1407470890, 0, '127.0.0.1', 1, 1407465490, NULL, NULL),
(244, 3, 1407548970, 1407554370, 0, '127.0.0.1', 1, 1407548970, 1407548978, '127.0.0.1'),
(245, 4, 1407548991, 1407554391, 0, '127.0.0.1', 1, 1407548991, 1407549133, '127.0.0.1'),
(246, 3, 1407549143, 1407554543, 0, '127.0.0.1', 1, 1407549143, 1407550906, '127.0.0.1'),
(247, 4, 1407550916, 1407556316, 0, '127.0.0.1', 1, 1407550916, 1407552219, '127.0.0.1'),
(248, 1, 1407552228, 1407557628, 0, '127.0.0.1', 1, 1407552228, 1407552414, '127.0.0.1'),
(249, 4, 1407552428, 1407557828, 0, '127.0.0.1', 1, 1407552428, NULL, NULL),
(250, 3, 1407603007, 1407608407, 0, '127.0.0.1', 1, 1407603007, 1407603068, '127.0.0.1'),
(251, 4, 1407603078, 1407608478, 0, '127.0.0.1', 1, 1407603078, NULL, NULL),
(252, 4, 1407709204, 1407714604, 0, '127.0.0.1', 1, 1407709204, NULL, NULL),
(253, 4, 1407877573, 1407882973, 0, '127.0.0.1', 1, 1407877573, NULL, NULL),
(254, 6, 1407889361, 1407894761, 0, '127.0.0.1', 1, 1407889361, NULL, NULL),
(255, 4, 1408057901, 1408063301, 0, '127.0.0.1', 1, 1408057901, NULL, NULL),
(256, 4, 1408147050, 1408152450, 0, '127.0.0.1', 1, 1408147050, 1408147068, '127.0.0.1'),
(257, 3, 1408147076, 1408152476, 0, '127.0.0.1', 1, 1408147076, NULL, NULL),
(258, 4, 1408156484, 1408161884, 1, '127.0.0.1', 1, 1408156484, NULL, NULL),
(259, 4, 1410384801, 1410390201, 0, '127.0.0.1', 1, 1410384801, NULL, NULL),
(260, 4, 1410398325, 1410403725, 0, '127.0.0.1', 1, 1410398325, NULL, NULL),
(261, 7, 1410478725, 1410484125, 0, '127.0.0.1', 1, 1410478725, NULL, NULL),
(262, 7, 1410484975, 1410490375, 0, '127.0.0.1', 1, 1410484975, 1410486675, '127.0.0.1'),
(263, 1, 1410486680, 1410492080, 0, '127.0.0.1', 1, 1410486680, 1410486946, '127.0.0.1'),
(264, 3, 1410488594, 1410493994, 0, '127.0.0.1', 1, 1410488594, NULL, NULL),
(265, 3, 1410530164, 1410535564, 0, '127.0.0.1', 1, 1410530164, NULL, NULL),
(266, 7, 1410560856, 1410566256, 0, '127.0.0.1', 1, 1410560856, NULL, NULL),
(267, 7, 1410575151, 1410580551, 0, '127.0.0.1', 1, 1410575151, NULL, NULL),
(268, 7, 1410643702, 1410649102, 0, '127.0.0.1', 1, 1410643702, NULL, NULL),
(269, 7, 1412087149, 1412092549, 1, '127.0.0.1', 1, 1412087149, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_system`
--

CREATE TABLE IF NOT EXISTS `cruge_system` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `cruge_system`
--

INSERT INTO `cruge_system` (`idsystem`, `name`, `largename`, `sessionmaxdurationmins`, `sessionmaxsameipconnections`, `sessionreusesessions`, `sessionmaxsessionsperday`, `sessionmaxsessionsperuser`, `systemnonewsessions`, `systemdown`, `registerusingcaptcha`, `registerusingterms`, `terms`, `registerusingactivation`, `defaultroleforregistration`, `registerusingtermslabel`, `registrationonlogin`) VALUES
(1, 'default', NULL, 90, 10, 1, -1, -1, 0, 0, 0, 0, '', 0, '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_user`
--

CREATE TABLE IF NOT EXISTS `cruge_user` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `cruge_user`
--

INSERT INTO `cruge_user` (`iduser`, `regdate`, `actdate`, `logondate`, `username`, `email`, `password`, `authkey`, `state`, `totalsessioncounter`, `currentsessioncounter`, `nombreUsuario`, `fechaNacimiento`, `dependencia`, `foto`, `fechaUltConex`, `bioUsuario`, `ipUltConex`, `numTips`, `skype_user`) VALUES
(1, NULL, NULL, 1410486680, 'admin', 'admin@tucorreo.com', 'admin', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, 1370560598, 'invitado', 'invitado', NULL, NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1370904527, NULL, 1410530164, 'ricardo', 'ricardo@correo.com', 'ricardo', 'db06705fbe537cd1c6274546f6ede22d', 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 1372107077, NULL, 1410398325, 'profesor1', 'prof1@uc.edu.ve', 'profesor1', 'e4367f0196ac62802b73f45a7d0971c4', 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 1385999156, NULL, 1385999742, 'administrador', 'administrador@uc.edu.ve', 'administrador', 'ae978bd4cc48f66cc7f0416bdcabe655', 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 1395777326, NULL, 1407889361, 'profesor2', 'prof@correouc.com.ve', 'profesor2', 'db9fb85670c4deb2a8220dbaa53dc141', 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 1410478706, NULL, 1412087149, 'henry', 'henry2611@uc.edu.ve', '123456', 'c59ef0abebcfb6b1c5729e2b7680197c', 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_curso` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_curso` text COLLATE utf8_unicode_ci,
  `username_docente` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `numero_estudiantes` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_curso`),
  UNIQUE KEY `username_docente` (`username_docente`),
  KEY `id_curso` (`id_curso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id_curso`, `nombre_curso`, `descripcion_curso`, `username_docente`, `numero_estudiantes`) VALUES
(1, 'Algoritmos y Programacion I', 'Curso de introduccion al desarrollo de algoritmos mediante el uso de pseudocodigo, nociones basicas y estructuras de control. Primeros pasos para programar en lenguaje C (ANSI C).', 'profesor1', 10),
(2, 'Calculo I', 'Con este curso se pretende que el estudiante se familiarice con los conceptos propios del an', 'profesor2', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso_estudiantes`
--

CREATE TABLE IF NOT EXISTS `curso_estudiantes` (
  `id_curso_estudiante` int(11) NOT NULL AUTO_INCREMENT,
  `id_curso` int(11) NOT NULL,
  `username_estudiante` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_curso_estudiante`),
  KEY `id_curso_estudiante` (`id_curso_estudiante`),
  KEY `id_curso` (`id_curso`),
  KEY `username_estudiante` (`username_estudiante`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `curso_estudiantes`
--

INSERT INTO `curso_estudiantes` (`id_curso_estudiante`, `id_curso`, `username_estudiante`) VALUES
(1, 1, 'ricardo'),
(3, 2, 'henry'),
(5, 1, 'henry');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_evaluacion`
--

CREATE TABLE IF NOT EXISTS `estudiante_evaluacion` (
  `id_evaluacion_estudiante` int(11) NOT NULL AUTO_INCREMENT,
  `id_evaluacion` int(11) NOT NULL,
  `id_curso_estudiante` int(11) NOT NULL,
  `calificacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_evaluacion_estudiante`),
  UNIQUE KEY `id_evaluacion_estudiante` (`id_evaluacion_estudiante`),
  KEY `id_evaluacion` (`id_evaluacion`),
  KEY `id_curso_estudiante` (`id_curso_estudiante`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `estudiante_evaluacion`
--

INSERT INTO `estudiante_evaluacion` (`id_evaluacion_estudiante`, `id_evaluacion`, `id_curso_estudiante`, `calificacion`) VALUES
(3, 2, 1, 15),
(5, 2, 1, 20),
(7, 33, 5, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion`
--

CREATE TABLE IF NOT EXISTS `evaluacion` (
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
  KEY `id_clase` (`id_clase`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34 ;

--
-- Volcado de datos para la tabla `evaluacion`
--

INSERT INTO `evaluacion` (`id_evaluacion`, `id_clase`, `porcentaje`, `tiempo_inicio`, `numero_max_tips`, `cant_dificil`, `cant_intermedio`, `cant_facil`, `puntuacion_dificil`, `puntuacion_intermedio`, `puntuacion_facil`, `tiempo_final`) VALUES
(2, 2, 0, '2014-07-16 00:00:00', 2, 2, 2, 4, 4, 3, 2, '2014-08-30 00:00:00'),
(3, 1, 2, '2014-08-01 00:00:00', 0, 0, 0, 0, 0, 0, 0, '2014-08-15 00:00:00'),
(4, 1, 2, '2014-08-01 00:00:00', 0, 0, 0, 0, 0, 0, 0, '2014-08-15 00:00:00'),
(5, 1, 2, '2014-08-01 00:00:00', 0, 0, 0, 0, 0, 0, 0, '2014-08-15 00:00:00'),
(6, 3, 5, '2014-08-02 00:00:00', 0, 0, 0, 0, 0, 0, 0, '2014-08-16 00:00:00'),
(7, 3, 5, '2014-08-02 00:00:00', 0, 0, 0, 0, 0, 0, 0, '2014-08-16 00:00:00'),
(8, 2, 3, '2014-08-01 00:00:00', 0, 0, 0, 0, 0, 0, 0, '2014-08-23 00:00:00'),
(9, 2, 3, '2014-08-01 00:00:00', 0, 0, 0, 0, 0, 0, 0, '2014-08-23 00:00:00'),
(10, 3, 10, '2014-07-16 00:00:00', 3, 2, 3, 4, 5, 2, 1, '2014-08-30 00:00:00'),
(11, 1, 12, '2014-08-10 00:00:00', 0, 0, 0, 0, 0, 0, 0, '2014-08-16 00:00:00'),
(12, 2, 9, '2014-08-01 00:00:00', 0, 0, 0, 0, 0, 0, 0, '2014-08-16 00:00:00'),
(13, 2, 9, '2014-08-01 00:00:00', 0, 0, 0, 0, 0, 0, 0, '2014-08-16 00:00:00'),
(14, 2, 9, '2014-08-01 00:00:00', 0, 0, 0, 0, 0, 0, 0, '2014-08-16 00:00:00'),
(15, 2, 9, '2014-08-01 00:00:00', 0, 0, 0, 0, 0, 0, 0, '2014-08-16 00:00:00'),
(16, 1, 2, '2014-08-01 00:00:00', 0, 0, 0, 0, 0, 0, 0, '2014-08-03 00:00:00'),
(17, 1, 2, '2014-08-01 00:00:00', 0, 0, 0, 0, 0, 0, 0, '2014-08-03 00:00:00'),
(18, 1, 2, '2014-08-01 00:00:00', 0, 0, 0, 0, 0, 0, 0, '2014-08-03 00:00:00'),
(19, 1, 2, '2014-08-01 00:00:00', 0, 0, 0, 0, 0, 0, 0, '2014-08-03 00:00:00'),
(20, 1, 2, '2014-08-01 00:00:00', 0, 0, 0, 0, 0, 0, 0, '2014-08-30 00:00:00'),
(21, 2, 3, '2014-08-02 00:00:00', 0, 0, 0, 0, 0, 0, 0, '2014-08-09 00:00:00'),
(22, 2, 8, '2014-08-02 00:00:00', 0, 0, 0, 0, 0, 0, 0, '2014-08-09 00:00:00'),
(23, 2, 3, '2014-08-02 00:00:00', 0, 0, 0, 0, 0, 0, 0, '2014-08-09 00:00:00'),
(24, 2, 3, '2014-08-02 00:00:00', 0, 0, 0, 0, 0, 0, 0, '2014-08-09 00:00:00'),
(25, 2, 3, '2014-08-02 00:00:00', 0, 0, 0, 0, 0, 0, 0, '2014-08-09 00:00:00'),
(26, 2, 3, '2014-08-02 00:00:00', 0, 0, 0, 0, 0, 0, 0, '2014-08-09 00:00:00'),
(27, 2, 3, '2014-08-02 00:00:00', 0, 0, 0, 0, 0, 0, 0, '2014-08-09 00:00:00'),
(28, 2, 3, '2014-08-02 00:00:00', 0, 0, 0, 0, 0, 0, 0, '2014-08-09 00:00:00'),
(29, 2, 2, '2014-08-26 00:00:00', 0, 0, 0, 0, 0, 0, 0, '2014-08-22 00:00:00'),
(30, 2, 3, '2014-08-28 00:00:00', 0, 1, 2, 4, 5, 3, 1, '2014-08-15 00:00:00'),
(31, 4, 2, '2014-08-28 00:00:00', 0, 0, 0, 0, 0, 0, 0, '2014-08-31 00:00:00'),
(32, 2, 12, '2014-09-30 00:00:00', 0, 0, 0, 0, 0, 0, 0, '2014-09-30 00:00:00'),
(33, 3, 2, '2014-09-12 01:12:00', 3, 2, 3, 6, 6, 3, 1, '2014-09-26 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE IF NOT EXISTS `mensaje` (
  `id_mensaje` bigint(11) NOT NULL AUTO_INCREMENT,
  `username_destino` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `username_origen` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `texto_mensaje` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_mensaje`),
  UNIQUE KEY `username_destino` (`username_destino`),
  UNIQUE KEY `username_origen` (`username_origen`),
  KEY `id_mensaje` (`id_mensaje`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE IF NOT EXISTS `pregunta` (
  `id_pregunta` int(11) NOT NULL AUTO_INCREMENT,
  `id_evaluacion` int(11) NOT NULL,
  `id_clase_pregunta` int(11) NOT NULL,
  `id_tipo_pregunta` int(11) NOT NULL,
  `texto_pregunta` text NOT NULL,
  PRIMARY KEY (`id_pregunta`),
  UNIQUE KEY `id_pregunta` (`id_pregunta`),
  KEY `id_tipo_pregunta` (`id_tipo_pregunta`),
  KEY `id_evaluacion` (`id_evaluacion`),
  KEY `id_clase_pregunta` (`id_clase_pregunta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`id_pregunta`, `id_evaluacion`, `id_clase_pregunta`, `id_tipo_pregunta`, `texto_pregunta`) VALUES
(1, 10, 2, 1, 'Pregunta dificil 1'),
(2, 10, 2, 1, 'Pregunta Dificil 2'),
(3, 10, 3, 1, 'Pregunta dificil 3'),
(4, 10, 4, 2, 'Pregunta Intermedio 1'),
(5, 10, 4, 2, 'Pregunta Intermedio 2'),
(6, 10, 1, 2, 'Pregunta Intermedio 3'),
(7, 10, 1, 3, 'Pregunta Facil 1'),
(8, 10, 2, 3, 'Pregunta facil 2'),
(9, 10, 3, 3, 'Pregunta Facil 3'),
(10, 10, 4, 3, 'Pregunta Facil 4'),
(11, 2, 1, 1, 'text1'),
(12, 2, 3, 1, 'text2'),
(13, 2, 4, 2, 'texttext1'),
(14, 2, 3, 2, 'texttext2'),
(15, 2, 1, 3, 'textextext1'),
(16, 2, 1, 3, 'texttextext2'),
(17, 2, 1, 3, 'texttexttext3'),
(18, 2, 2, 3, 'texttextexttext4'),
(19, 2, 2, 1, 'text3'),
(20, 24, 1, 1, 'ajsajsja'),
(21, 24, 2, 1, 'zxjzjkxnzkjczkjxcz'),
(22, 26, 2, 1, 'ajajs'),
(23, 26, 3, 1, 'jsdsjdkfsjd'),
(24, 28, 1, 1, 'sjdfnsdfs'),
(25, 28, 1, 1, 'sdfsdfsdfsdf'),
(26, 29, 2, 1, 'sdfsdfs'),
(27, 29, 2, 1, 'sdfsdfsdf'),
(28, 29, 2, 1, 'jsdkfds'),
(29, 29, 2, 2, 'asadsadasd'),
(30, 29, 3, 2, 'asdsadfsdfsdfds'),
(31, 29, 2, 2, 'sdfsdfsdfs'),
(32, 30, 1, 1, 'ujujuj'),
(33, 30, 2, 2, 'sdjsfdsf'),
(34, 30, 4, 2, 'sdfsfsdfsdfs'),
(35, 30, 1, 3, '12313123'),
(36, 30, 2, 3, '323423432432'),
(37, 30, 4, 3, '5454545'),
(38, 30, 3, 3, 'ieierer'),
(39, 33, 1, 1, 'Pregunta 1 Simple'),
(40, 33, 2, 1, 'Pregunta 2 Multiple'),
(41, 33, 3, 1, 'Pregunta 3 V o F'),
(42, 33, 4, 1, 'Pregunta 4 Pareamiento'),
(43, 33, 1, 2, 'pregunta simple intermedio 1'),
(44, 33, 1, 2, 'pregunta simple intermedio 2'),
(45, 33, 1, 2, 'pregunta simple intermedio 3'),
(46, 33, 1, 3, 'pregunta simple facil 1'),
(47, 33, 1, 3, 'pregunta simple facil 2'),
(48, 33, 1, 3, 'pregunta simple facil 3'),
(49, 33, 1, 3, 'pregunta simple facil 4'),
(50, 33, 1, 3, 'pregunta simple facil 5'),
(51, 33, 1, 3, 'pregunta simple facil 6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recurso`
--

CREATE TABLE IF NOT EXISTS `recurso` (
  `id_recurso` int(11) NOT NULL AUTO_INCREMENT,
  `id_clase` int(11) NOT NULL,
  `nombre_recurso` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `ubicacion_recurso` text COLLATE utf8_unicode_ci NOT NULL,
  `duracion_recurso` int(11) DEFAULT NULL,
  `peso_recurso` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_recurso`),
  UNIQUE KEY `id_clase` (`id_clase`),
  KEY `id_recurso` (`id_recurso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `recurso`
--

INSERT INTO `recurso` (`id_recurso`, `id_clase`, `nombre_recurso`, `ubicacion_recurso`, `duracion_recurso`, `peso_recurso`) VALUES
(1, 1, 'holamundo.ppt', 'C:/xampp/htdocs/Tesis/resources/holamundo/', NULL, 153),
(2, 2, 'CapaAplicacion.ppt', 'C:/xampp/htdocs/Prueba1/resources/CapaAplicacion/', NULL, 480),
(3, 3, 'recursividad.ppt', 'C:/xampp/htdocs/Prueba1/resources/recursividad273/', NULL, 770);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE IF NOT EXISTS `respuesta` (
  `id_respuesta` int(11) NOT NULL AUTO_INCREMENT,
  `id_pregunta` int(11) NOT NULL,
  `id_tipo_respuesta` int(11) NOT NULL,
  `texto_respuesta` text NOT NULL,
  `texto_respuesta_b` text,
  PRIMARY KEY (`id_respuesta`),
  UNIQUE KEY `id_respuesta` (`id_respuesta`),
  KEY `id_pregunta` (`id_pregunta`),
  KEY `id_tipo_respuesta` (`id_tipo_respuesta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Volcado de datos para la tabla `respuesta`
--

INSERT INTO `respuesta` (`id_respuesta`, `id_pregunta`, `id_tipo_respuesta`, `texto_respuesta`, `texto_respuesta_b`) VALUES
(1, 10, 1, 'asdasd', NULL),
(2, 10, 1, '1234', '5678'),
(3, 10, 1, 'asda', 'dsadasda'),
(4, 10, 1, '1124', 'asdasda'),
(5, 7, 1, 'sa', NULL),
(9, 10, 1, '323', '23234'),
(10, 10, 1, '154', '5465465'),
(14, 3, 1, 'Verdadero', NULL),
(15, 9, 1, 'Falso', NULL),
(16, 11, 1, 'respuesta1 correcta', NULL),
(17, 11, 2, 'respuesta1 incorrecta', NULL),
(18, 12, 1, 'Verdadero', NULL),
(19, 11, 2, 'respuesta2 incorrecta', NULL),
(20, 13, 1, 'par a', 'par a'),
(21, 13, 1, 'par b', 'par b'),
(22, 13, 1, 'par c', ''),
(23, 14, 1, 'Falso', NULL),
(24, 15, 1, 'respuesta1 correcta ', NULL),
(25, 15, 2, 'respuesta1 incorrecta', NULL),
(26, 15, 2, 'respuesta2 incorrecta', NULL),
(27, 16, 1, 'respuesta1 correcta', NULL),
(28, 16, 2, 'respuesta1 incorrecta', NULL),
(29, 16, 1, 'respuesta2 correcta', NULL),
(30, 16, 2, 'respuesta2 incorrecta', NULL),
(31, 17, 1, 'res1 true', NULL),
(32, 17, 1, 'res2 true', NULL),
(33, 17, 2, 'res1 false', NULL),
(34, 17, 1, 'res3 true', NULL),
(35, 17, 2, 'res2 false', NULL),
(36, 18, 1, 'res1 true', NULL),
(37, 18, 2, 'res1 false', NULL),
(38, 18, 1, 'res2 true', NULL),
(39, 18, 1, 'res3 true', NULL),
(40, 18, 2, 'res2 false', NULL),
(41, 19, 1, 'respuesta1 correcta', NULL),
(42, 19, 1, 'respuesta2 correcta', NULL),
(43, 19, 2, 'respuesta1 incorrecta', NULL),
(44, 19, 1, 'respuesta3 correcta', NULL),
(45, 19, 1, 'respuesta4 correcta', NULL),
(46, 39, 1, 'Respuesta correcta', NULL),
(47, 39, 1, 'Respuesta incorrecta 1', NULL),
(48, 40, 1, 'Respuesta multiple correcta 1', NULL),
(49, 40, 1, 'Respuesta multiple correcta 2', NULL),
(50, 40, 1, 'Respuesta multiple incorrecta 1', NULL),
(51, 40, 2, 'Respuesta multiple incorrecta 2', NULL),
(52, 42, 1, 'Respuesta pareamiento 1 lado A', 'Respuesta pareamiento 1 lado B'),
(53, 42, 1, 'Respuesta pareamiento 2 lado A', 'Respuesta pareamiento 2 lado B'),
(54, 42, 1, 'Respuesta 3 Lada A', ''),
(55, 43, 1, 'asdasd', NULL),
(56, 44, 1, 'assadssdas', NULL),
(57, 45, 1, 'asdsadsadasda', NULL),
(58, 45, 1, 'asdasdadadgfdgd', NULL),
(59, 46, 1, 'iuwehrowiehroiwe', NULL),
(60, 46, 1, 'diusfsdbfosfuowbfwf', NULL),
(61, 47, 1, 'sfusbdfibdsoufbsudfbwef', NULL),
(62, 48, 1, 'sdfsdfsdfdsfsdfsf', NULL),
(63, 49, 1, 'ruebgiubegerugbe', NULL),
(64, 50, 1, 'iownferfbreiuberugbreugbrteg', NULL),
(65, 51, 1, 'ieubwfiwbfirebfkrfberufbef', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta_estudiante`
--

CREATE TABLE IF NOT EXISTS `respuesta_estudiante` (
  `id_respuesta_estudiante` int(11) NOT NULL AUTO_INCREMENT,
  `id_estudiante_evaluacion` int(11) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  `texto_respuesta` text NOT NULL,
  `texto_respuesta_b` text,
  PRIMARY KEY (`id_respuesta_estudiante`),
  UNIQUE KEY `id_respuesta_estudiante` (`id_respuesta_estudiante`),
  KEY `id_estudiante_evaluacion` (`id_estudiante_evaluacion`),
  KEY `id_pregunta` (`id_pregunta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=91 ;

--
-- Volcado de datos para la tabla `respuesta_estudiante`
--

INSERT INTO `respuesta_estudiante` (`id_respuesta_estudiante`, `id_estudiante_evaluacion`, `id_pregunta`, `texto_respuesta`, `texto_respuesta_b`) VALUES
(73, 3, 12, 'Verdadero', NULL),
(74, 3, 11, 'respuesta2 incorrecta', NULL),
(75, 3, 13, 'par c', NULL),
(76, 3, 13, 'par b', 'par a'),
(77, 3, 13, 'par a', 'par b'),
(78, 3, 14, 'Falso', NULL),
(79, 7, 42, 'Respuesta pareamiento 2 lado A', 'Respuesta pareamiento 2 lado B'),
(80, 7, 42, 'Respuesta pareamiento 1 lado A', NULL),
(81, 7, 42, 'Respuesta pareamiento 1 lado B', 'Respuesta 3 Lada A'),
(82, 7, 40, 'Respuesta multiple correcta 1', NULL),
(83, 7, 40, 'Respuesta multiple correcta 2', NULL),
(84, 7, 45, 'asdasdadadgfdgd', NULL),
(85, 7, 44, 'assadssdas', NULL),
(86, 7, 43, 'asdasd', NULL),
(87, 7, 48, 'sdfsdfsdfdsfsdfsf', NULL),
(88, 7, 51, 'ieubwfiwbfirebfkrfberufbef', NULL),
(89, 7, 49, 'ruebgiubegerugbe', NULL),
(90, 7, 50, 'iownferfbreiuberugbreugbrteg', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema`
--

CREATE TABLE IF NOT EXISTS `tema` (
  `id_tema` int(11) NOT NULL AUTO_INCREMENT,
  `id_curso` int(11) NOT NULL,
  `nombre_tema` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_tema` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id_tema`),
  KEY `id_tema` (`id_tema`),
  KEY `fk_tema` (`id_curso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tema`
--

INSERT INTO `tema` (`id_tema`, `id_curso`, `nombre_tema`, `descripcion_tema`) VALUES
(1, 1, 'Introduccion a los algoritmos', 'Introduccion al uso de algoritmos'),
(2, 2, 'L', 'Establecer el concepto de l');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pregunta`
--

CREATE TABLE IF NOT EXISTS `tipo_pregunta` (
  `id_tipo_pregunta` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo_pregunta` varchar(64) NOT NULL,
  PRIMARY KEY (`id_tipo_pregunta`),
  UNIQUE KEY `id_tipo_pregunta` (`id_tipo_pregunta`),
  UNIQUE KEY `nombre_tipo_pregunta` (`nombre_tipo_pregunta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tipo_pregunta`
--

INSERT INTO `tipo_pregunta` (`id_tipo_pregunta`, `nombre_tipo_pregunta`) VALUES
(1, 'Dificil'),
(3, 'Facil'),
(2, 'Intermedio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_respuesta`
--

CREATE TABLE IF NOT EXISTS `tipo_respuesta` (
  `id_tipo_respuesta` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo_respuesta` varchar(64) NOT NULL,
  PRIMARY KEY (`id_tipo_respuesta`),
  UNIQUE KEY `id_tipo_respuesta` (`id_tipo_respuesta`),
  UNIQUE KEY `nombre_tipo_respuesta` (`nombre_tipo_respuesta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipo_respuesta`
--

INSERT INTO `tipo_respuesta` (`id_tipo_respuesta`, `nombre_tipo_respuesta`) VALUES
(1, 'Correcta'),
(2, 'Incorrecta');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clase`
--
ALTER TABLE `clase`
  ADD CONSTRAINT `fk_clase` FOREIGN KEY (`id_tema`) REFERENCES `tema` (`id_tema`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cruge_authassignment`
--
ALTER TABLE `cruge_authassignment`
  ADD CONSTRAINT `fk_cruge_authassignment_cruge_authitem1` FOREIGN KEY (`itemname`) REFERENCES `cruge_authitem` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cruge_authassignment_user` FOREIGN KEY (`userid`) REFERENCES `cruge_user` (`iduser`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cruge_authitemchild`
--
ALTER TABLE `cruge_authitemchild`
  ADD CONSTRAINT `crugeauthitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `cruge_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `crugeauthitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `cruge_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cruge_fieldvalue`
--
ALTER TABLE `cruge_fieldvalue`
  ADD CONSTRAINT `fk_cruge_fieldvalue_cruge_field1` FOREIGN KEY (`idfield`) REFERENCES `cruge_field` (`idfield`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cruge_fieldvalue_cruge_user1` FOREIGN KEY (`iduser`) REFERENCES `cruge_user` (`iduser`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`username_docente`) REFERENCES `cruge_user` (`username`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `curso_estudiantes`
--
ALTER TABLE `curso_estudiantes`
  ADD CONSTRAINT `curso_estudiantes_fk1` FOREIGN KEY (`username_estudiante`) REFERENCES `cruge_user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `curso_estudiantes_fk` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estudiante_evaluacion`
--
ALTER TABLE `estudiante_evaluacion`
  ADD CONSTRAINT `estudiante_evaluacion_fk` FOREIGN KEY (`id_evaluacion`) REFERENCES `evaluacion` (`id_evaluacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estudiante_evaluacion_fk1` FOREIGN KEY (`id_curso_estudiante`) REFERENCES `curso_estudiantes` (`id_curso_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD CONSTRAINT `evaluacion_fk1` FOREIGN KEY (`id_clase`) REFERENCES `clase` (`id_clase`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `mensaje_ibfk_1` FOREIGN KEY (`username_destino`) REFERENCES `cruge_user` (`username`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `mensaje_ibfk_2` FOREIGN KEY (`username_origen`) REFERENCES `cruge_user` (`username`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `pregunta_fk` FOREIGN KEY (`id_evaluacion`) REFERENCES `evaluacion` (`id_evaluacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pregunta_fk1` FOREIGN KEY (`id_tipo_pregunta`) REFERENCES `tipo_pregunta` (`id_tipo_pregunta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pregunta_fk2` FOREIGN KEY (`id_clase_pregunta`) REFERENCES `clase_pregunta` (`id_clase_pregunta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `recurso`
--
ALTER TABLE `recurso`
  ADD CONSTRAINT `recurso_ibfk_1` FOREIGN KEY (`id_clase`) REFERENCES `clase` (`id_clase`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `respuesta_fk` FOREIGN KEY (`id_tipo_respuesta`) REFERENCES `tipo_respuesta` (`id_tipo_respuesta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `respuesta_fk1` FOREIGN KEY (`id_pregunta`) REFERENCES `pregunta` (`id_pregunta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `respuesta_estudiante`
--
ALTER TABLE `respuesta_estudiante`
  ADD CONSTRAINT `respuesta_estudiante_fk` FOREIGN KEY (`id_estudiante_evaluacion`) REFERENCES `estudiante_evaluacion` (`id_evaluacion_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `respuesta_estudiante_fk1` FOREIGN KEY (`id_pregunta`) REFERENCES `pregunta` (`id_pregunta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tema`
--
ALTER TABLE `tema`
  ADD CONSTRAINT `fk_tema` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

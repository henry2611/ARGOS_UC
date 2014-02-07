<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>¡Bienvenido al Sistema de Videoconferencias <i><?php echo CHtml::encode(Yii::app()->name); ?></i>!</h1>

<p>Nuestro sistema virtual de videoconferencias ARGOS, tiene como objetivo brindar a nuestra comunidad
   universitaria una herramienta de trabajo colaborativo para apoyar las actividades de clase.</p>

<p>Para acceder a los cursos que aquí se administran debes Utilizar tu identificación en ALFA. 
   Cualquier información, envía un correo a: <a href="mailto:<webmaster-facyt@uc.edu.ve>">WEBMASTER</a>. 
</p>

<p>You may change the content of this page by modifying the following two files:</p>
<ul>
	<li>View file: <code><?php echo __FILE__; ?></code></li>
	<li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>

<?php
/* @var $this RespuestaEstudianteController */
/* @var $model RespuestaEstudiante */

$this->breadcrumbs=array(
	'Respuesta Estudiantes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RespuestaEstudiante', 'url'=>array('index')),
	array('label'=>'Manage RespuestaEstudiante', 'url'=>array('admin')),
);
?>

<h1>Create RespuestaEstudiante</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
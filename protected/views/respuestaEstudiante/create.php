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
<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>

<h1>Respuestas de la Evaluacion</h1>
<?php echo $this->renderPartial('_form', array('model'=>$model,'tipo_pregunta'=>$tipo_pregunta)); ?>
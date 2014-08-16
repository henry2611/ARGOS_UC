<?php
/* @var $this EvaluacionController */
/* @var $model Evaluacion */

/*$this->breadcrumbs=array(
	'Evaluacions'=>array('index'),
	$model->id_evaluacion,
);*/


?>

<h1>Calificaciones</h1>

<?php 
	/*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'username_estudiante',
		'calificacion',
		),
)); */
 echo $this->renderPartial('_notas', array('model'=>$model))?>

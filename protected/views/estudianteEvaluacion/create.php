<?php
/* @var $this EstudianteEvaluacionController */
/* @var $model EstudianteEvaluacion */

$this->breadcrumbs=array(
	'Estudiante Evaluacions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Estudiante Evaluacion', 'url'=>array('index')),
	array('label'=>'Manage Estudiante Evaluacion', 'url'=>array('admin')),
);
?>

<h1>Create Estudiante Evaluacion</h1>

<?php echo $this->renderPartial('_create', array('model'=>$model)); ?>
<?php
/* @var $this EstudianteEvaluacionController */
/* @var $model EstudianteEvaluacion */

$this->breadcrumbs=array(
	'Estudiante Evaluacions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EstudianteEvaluacion', 'url'=>array('index')),
	array('label'=>'Manage EstudianteEvaluacion', 'url'=>array('admin')),
);
?>

<h1>Create EstudianteEvaluacion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
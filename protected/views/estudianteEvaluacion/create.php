<?php
/* @var $this EstudianteEvaluacionController */
/* @var $model EstudianteEvaluacion */

$this->breadcrumbs=array(
	'Evaluaciones Estudiante'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Lista Evaluaciones Estudiante', 'url'=>array('index')),
	//array('label'=>'Manage Estudiante Evaluacion', 'url'=>array('admin')),
);
?>

<h1>Crear Evaluacion Estudiante</h1>

<?php echo $this->renderPartial('_create', array('model'=>$model)); ?>
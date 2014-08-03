<?php
/* @var $this EstudianteEvaluacionController */
/* @var $model EstudianteEvaluacion */

$this->breadcrumbs=array(
	'Estudiante Evaluacions'=>array('index'),
	$model->id_evaluacion_estudiante=>array('view','id'=>$model->id_evaluacion_estudiante),
	'Update',
);

$this->menu=array(
	array('label'=>'List Estudiante Evaluacion', 'url'=>array('index')),
	array('label'=>'Create Estudiante Evaluacion', 'url'=>array('create')),
	array('label'=>'View Estudiante Evaluacion', 'url'=>array('view', 'id'=>$model->id_evaluacion_estudiante)),
	array('label'=>'Manage Estudiante Evaluacion', 'url'=>array('admin')),
);
?>

<h1>Update EstudianteEvaluacion <?php echo $model->id_evaluacion_estudiante; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
/* @var $this EstudianteEvaluacionController */
/* @var $model EstudianteEvaluacion */

$this->breadcrumbs=array(
	'Estudiante Evaluacions'=>array('index'),
	$model->id_evaluacion_estudiante=>array('view','id'=>$model->id_evaluacion_estudiante),
	'Update',
);

$this->menu=array(
	array('label'=>'List EstudianteEvaluacion', 'url'=>array('index')),
	array('label'=>'Create EstudianteEvaluacion', 'url'=>array('create')),
	array('label'=>'View EstudianteEvaluacion', 'url'=>array('view', 'id'=>$model->id_evaluacion_estudiante)),
	array('label'=>'Manage EstudianteEvaluacion', 'url'=>array('admin')),
);
?>

<h1>Update EstudianteEvaluacion <?php echo $model->id_evaluacion_estudiante; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
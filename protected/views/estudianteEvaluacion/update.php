<?php
/* @var $this EstudianteEvaluacionController */
/* @var $model EstudianteEvaluacion */

$this->breadcrumbs=array(
	'Evaluaciones Estudiante'=>array('index'),
	$model->id_evaluacion_estudiante=>array('view','id'=>$model->id_evaluacion_estudiante),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista Evaluaciones Estudiante', 'url'=>array('index')),
	array('label'=>'Crear Evaluacion Estudiante', 'url'=>array('create')),
	array('label'=>'Ver Evaluacion Estudiante', 'url'=>array('view', 'id'=>$model->id_evaluacion_estudiante)),
	array('label'=>'Administrar Evaluaciones Estudiante', 'url'=>array('admin')),
);
?>

<h1>Actualizar Evaluacion Estudiante <?php echo $model->id_evaluacion_estudiante; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
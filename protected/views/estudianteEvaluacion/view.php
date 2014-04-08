<?php
/* @var $this EstudianteEvaluacionController */
/* @var $model EstudianteEvaluacion */

$this->breadcrumbs=array(
	'Estudiante Evaluacions'=>array('index'),
	$model->id_evaluacion_estudiante,
);

$this->menu=array(
	array('label'=>'List EstudianteEvaluacion', 'url'=>array('index')),
	array('label'=>'Create EstudianteEvaluacion', 'url'=>array('create')),
	array('label'=>'Update EstudianteEvaluacion', 'url'=>array('update', 'id'=>$model->id_evaluacion_estudiante)),
	array('label'=>'Delete EstudianteEvaluacion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_evaluacion_estudiante),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EstudianteEvaluacion', 'url'=>array('admin')),
);
?>

<h1>View EstudianteEvaluacion #<?php echo $model->id_evaluacion_estudiante; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_evaluacion_estudiante',
		'id_evaluacion',
		'id_curso_estudiante',
		'calificacion',
	),
)); ?>

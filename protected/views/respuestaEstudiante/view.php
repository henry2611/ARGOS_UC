<?php
/* @var $this RespuestaEstudianteController */
/* @var $model RespuestaEstudiante */

$this->breadcrumbs=array(
	'Respuesta Estudiantes'=>array('index'),
	$model->id_respuesta_estudiante,
);

$this->menu=array(
	array('label'=>'List RespuestaEstudiante', 'url'=>array('index')),
	array('label'=>'Create RespuestaEstudiante', 'url'=>array('create')),
	array('label'=>'Update RespuestaEstudiante', 'url'=>array('update', 'id'=>$model->id_respuesta_estudiante)),
	array('label'=>'Delete RespuestaEstudiante', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_respuesta_estudiante),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RespuestaEstudiante', 'url'=>array('admin')),
);
?>

<h1>View RespuestaEstudiante #<?php echo $model->id_respuesta_estudiante; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_respuesta_estudiante',
		'id_estudiante_evaluacion',
		'id_pregunta',
		'texto_respuesta',
		'texto_respuesta_b',
	),
)); ?>

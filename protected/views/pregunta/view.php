<?php
/* @var $this PreguntaController */
/* @var $model Pregunta */

$this->breadcrumbs=array(
	'Preguntas'=>array('index'),
	$model->id_pregunta,
);

$this->menu=array(
	array('label'=>'Lista Pregunta', 'url'=>array('index')),
//	array('label'=>'Crear Pregunta', 'url'=>array('create')),
//	array('label'=>'Update Pregunta', 'url'=>array('update', 'id'=>$model->id_pregunta)),
//	array('label'=>'Delete Pregunta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_pregunta),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Pregunta', 'url'=>array('admin')),
);
?>

<h1>Ver Pregunta #<?php echo $model->id_pregunta; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_pregunta',
		'id_evaluacion',
		'id_tipo_pregunta',
		'texto_pregunta',
	),
)); ?>

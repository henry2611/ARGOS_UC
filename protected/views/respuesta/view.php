<?php
/* @var $this RespuestaController */
/* @var $model Respuesta */

$this->breadcrumbs=array(
	'Respuestas'=>array('index'),
	$model->id_respuesta,
);

$this->menu=array(
	array('label'=>'Lista Respuestas', 'url'=>array('index')),
	array('label'=>'Crear Respuesta', 'url'=>array('create')),
	//array('label'=>'Update Respuesta', 'url'=>array('update', 'id'=>$model->id_respuesta)),
	//array('label'=>'Delete Respuesta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_respuesta),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Respuestas', 'url'=>array('admin')),
);
?>

<h1>View Respuesta #<?php echo $model->id_respuesta; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_respuesta',
		'id_pregunta',
		'id_tipo_respuesta',
		'texto_respuesta',
	),
)); ?>

<?php
/* @var $this TipoRespuestaController */
/* @var $model TipoRespuesta */

$this->breadcrumbs=array(
	'Tipo Respuestas'=>array('index'),
	$model->id_tipo_respuesta,
);

$this->menu=array(
	array('label'=>'List TipoRespuesta', 'url'=>array('index')),
	array('label'=>'Create TipoRespuesta', 'url'=>array('create')),
	array('label'=>'Update TipoRespuesta', 'url'=>array('update', 'id'=>$model->id_tipo_respuesta)),
	array('label'=>'Delete TipoRespuesta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tipo_respuesta),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipoRespuesta', 'url'=>array('admin')),
);
?>

<h1>View TipoRespuesta #<?php echo $model->id_tipo_respuesta; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_tipo_respuesta',
		'nombre_tipo_respuesta',
	),
)); ?>

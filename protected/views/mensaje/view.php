<?php
/* @var $this MensajeController */
/* @var $model Mensaje */

$this->breadcrumbs=array(
	'Mensajes'=>array('index'),
	$model->id_mensaje,
);

$this->menu=array(
	array('label'=>'List Mensaje', 'url'=>array('index')),
	array('label'=>'Create Mensaje', 'url'=>array('create')),
	array('label'=>'Update Mensaje', 'url'=>array('update', 'id'=>$model->id_mensaje)),
	array('label'=>'Delete Mensaje', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_mensaje),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Mensaje', 'url'=>array('admin')),
);
?>

<h1>View Mensaje #<?php echo $model->id_mensaje; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_mensaje',
		'username_destino',
		'username_origen',
		'texto_mensaje',
	),
)); ?>

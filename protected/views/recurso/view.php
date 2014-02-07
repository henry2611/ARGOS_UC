<?php
/* @var $this RecursoController */
/* @var $model Recurso */

$this->breadcrumbs=array(
	'Recursos'=>array('index'),
	$model->id_recurso,
);

$this->menu=array(
	array('label'=>'List Recurso', 'url'=>array('index')),
	array('label'=>'Create Recurso', 'url'=>array('create')),
	array('label'=>'Update Recurso', 'url'=>array('update', 'id'=>$model->id_recurso)),
	array('label'=>'Delete Recurso', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_recurso),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Recurso', 'url'=>array('admin')),
);
?>

<h1>View Recurso #<?php echo $model->id_recurso; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_recurso',
		'id_clase',
		'nombre_recurso',
		'ubicacion_recurso',
		'duracion_recurso',
		'peso_recurso',
	),
)); ?>

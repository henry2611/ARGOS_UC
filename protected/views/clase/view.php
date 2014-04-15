<?php
/* @var $this ClaseController */
/* @var $model Clase */

$this->breadcrumbs=array(
	'Clases'=>array('index'),
	$model->id_clase,
);

$this->menu=array(
	array('label'=>'List Clase', 'url'=>array('index')),
	array('label'=>'Create Clase', 'url'=>array('create')),
	array('label'=>'Update Clase', 'url'=>array('update', 'id'=>$model->id_clase)),
	array('label'=>'Delete Clase', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_clase),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Clase', 'url'=>array('admin')),
);
?>

<h1>View Clase #<?php echo $model->id_clase; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_clase',
		'id_tema',
		'nombre_clase',
		'descripcion_clase',
	),
)); ?>

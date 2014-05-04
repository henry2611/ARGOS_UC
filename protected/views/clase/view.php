<?php
/* @var $this ClaseController */
/* @var $model Clase */

$this->breadcrumbs=array(
	'Clases'=>array('index'),
	$model->id_clase,
);

$this->menu=array(
	array('label'=>'Update Clase', 'url'=>array('update', 'id'=>$model->id_clase)),
	array('label'=>'Delete Clase', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_clase),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Recurso (Diapositivas)', 'url'=>array('')),
        array('label'=>'Lanzar Clase', 'url'=>array('')),
);
?>

<h1>Vista detalle de Clase: <?php echo $model->nombre_clase; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nombre_clase',
		'descripcion_clase',
	),
)); ?>

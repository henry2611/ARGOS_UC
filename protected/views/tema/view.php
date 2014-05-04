<?php
/* @var $this TemaController */
/* @var $model Tema */

$this->breadcrumbs=array(
	'Temas'=>array('index'),
	//$model->id_tema,
);

$this->menu=array(
	//array('label'=>'List Tema', 'url'=>array('index')),
	array('label'=>'Update Tema', 'url'=>array('update', 'id'=>$model->id_tema)),
	array('label'=>'Delete Tema', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tema),'confirm'=>'Are you sure you want to delete this item?')),
        array('label'=>'Lista de Clases', 'url'=>array('clases', 'id'=>$model->id_tema)),
	//array('label'=>'Manage Tema', 'url'=>array('admin')),
);
?>

<h1>Vista detalle de <?php echo $model->nombre_tema; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nombre_tema',
		'descripcion_tema',
	),
)); ?>

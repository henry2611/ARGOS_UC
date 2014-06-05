<?php
/* @var $this ClasePreguntaController */
/* @var $model ClasePregunta */

$this->breadcrumbs=array(
	'Clase Preguntas'=>array('index'),
	$model->id_clase_pregunta,
);

$this->menu=array(
	array('label'=>'List ClasePregunta', 'url'=>array('index')),
	array('label'=>'Create ClasePregunta', 'url'=>array('create')),
	array('label'=>'Update ClasePregunta', 'url'=>array('update', 'id'=>$model->id_clase_pregunta)),
	array('label'=>'Delete ClasePregunta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_clase_pregunta),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ClasePregunta', 'url'=>array('admin')),
);
?>

<h1>View ClasePregunta #<?php echo $model->id_clase_pregunta; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_clase_pregunta',
		'nombre_clase_pregunta',
	),
)); ?>

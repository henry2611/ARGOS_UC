<?php
/* @var $this TipoPreguntaController */
/* @var $model TipoPregunta */

$this->breadcrumbs=array(
	'Tipo Preguntas'=>array('index'),
	$model->id_tipo_pregunta,
);

$this->menu=array(
	array('label'=>'List TipoPregunta', 'url'=>array('index')),
	array('label'=>'Create TipoPregunta', 'url'=>array('create')),
	array('label'=>'Update TipoPregunta', 'url'=>array('update', 'id'=>$model->id_tipo_pregunta)),
	array('label'=>'Delete TipoPregunta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tipo_pregunta),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipoPregunta', 'url'=>array('admin')),
);
?>

<h1>View TipoPregunta #<?php echo $model->id_tipo_pregunta; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_tipo_pregunta',
		'nombre_tipo_pregunta',
	),
)); ?>

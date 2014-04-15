<?php
/* @var $this TipoEvaluacionController */
/* @var $model TipoEvaluacion */

$this->breadcrumbs=array(
	'Tipo Evaluacions'=>array('index'),
	$model->id_tipo_evaluacion,
);

$this->menu=array(
	array('label'=>'List TipoEvaluacion', 'url'=>array('index')),
	array('label'=>'Create TipoEvaluacion', 'url'=>array('create')),
	array('label'=>'Update TipoEvaluacion', 'url'=>array('update', 'id'=>$model->id_tipo_evaluacion)),
	array('label'=>'Delete TipoEvaluacion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tipo_evaluacion),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipoEvaluacion', 'url'=>array('admin')),
);
?>

<h1>View TipoEvaluacion #<?php echo $model->id_tipo_evaluacion; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_tipo_evaluacion',
		'nombre_evaluacion',
	),
)); ?>

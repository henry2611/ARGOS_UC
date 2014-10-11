<?php
/* @var $this EvaluacionController */
/* @var $model Evaluacion */

$this->breadcrumbs=array(
	'Evaluaciones'=>array('index'),
	$model->id_evaluacion,
);

$this->menu=array(
	array('label'=>'Lista Evaluaciones', 'url'=>array('index')),
	array('label'=>'Crear Evaluacion', 'url'=>array('create')),
	//array('label'=>'Update Evaluacion', 'url'=>array('update', 'id'=>$model->id_evaluacion)),
	//array('label'=>'Delete Evaluacion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_evaluacion),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Evaluacion', 'url'=>array('admin')),
);
?>

<h1>Ver Evaluacion #<?php echo $model->id_evaluacion; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_evaluacion',
		'id_clase',
		'porcentaje',
		'tiempo_inicio',
		'tiempo_final',
		'numero_max_tips',
		'cant_dificil',
		'cant_intermedio',
		'cant_facil',
		'puntuacion_dificil',
		'puntuacion_intermedio',
		'puntuacion_facil',
	),
)); ?>

<div class="row buttons">
		<?php echo CHtml::Button('Ver Notas',array('submit'=>'../evaluacion/notas','params'=>array('id_evaluacion'=>$model->id_evaluacion))); ?>
</div>

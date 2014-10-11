<?php
/* @var $this EvaluacionController */
/* @var $model Evaluacion */

$this->breadcrumbs=array(
	'Evaluaciones'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Lista Evaluaciones', 'url'=>array('index')),
	array('label'=>'Crear Evaluacion', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#evaluacion-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Evaluaciones</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'evaluacion-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_evaluacion',
		'id_clase',
		'porcentaje',
		'tiempo_inicio',
		'tiempo_final',
		'numero_max_tips',
		/*
		'cant_dificil',
		'cant_intermedio',
		'cant_facil',
		'puntuacion_dificil',
		'puntuacion_intermedio',
		'puntuacion_facil',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php
/* @var $this EvaluacionController */
/* @var $model Evaluacion */

$this->breadcrumbs=array(
	'Evaluaciones'=>array('index'),
	$model->id_evaluacion=>array('view','id'=>$model->id_evaluacion),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista Evaluaciones', 'url'=>array('index')),
	array('label'=>'Crear Evaluacion', 'url'=>array('create')),
	array('label'=>'Ver Evaluacion', 'url'=>array('view', 'id'=>$model->id_evaluacion)),
	array('label'=>'Administrar Evaluaciones', 'url'=>array('admin')),
);
?>

<h1>Update Evaluacion <?php echo $model->id_evaluacion; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
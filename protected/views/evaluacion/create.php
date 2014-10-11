<?php
/* @var $this EvaluacionController */
/* @var $model Evaluacion */

$this->breadcrumbs=array(
	'Evaluaciones'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Lista Evaluaciones', 'url'=>array('index')),
	array('label'=>'Administrar Evaluaciones', 'url'=>array('admin')),
);
?>

<h1>Crear Evaluacion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
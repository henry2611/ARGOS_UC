<?php
/* @var $this TipoEvaluacionController */
/* @var $model TipoEvaluacion */

$this->breadcrumbs=array(
	'Tipo Evaluacions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TipoEvaluacion', 'url'=>array('index')),
	array('label'=>'Manage TipoEvaluacion', 'url'=>array('admin')),
);
?>

<h1>Create TipoEvaluacion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
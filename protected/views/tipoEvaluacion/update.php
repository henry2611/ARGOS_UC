<?php
/* @var $this TipoEvaluacionController */
/* @var $model TipoEvaluacion */

$this->breadcrumbs=array(
	'Tipo Evaluacions'=>array('index'),
	$model->id_tipo_evaluacion=>array('view','id'=>$model->id_tipo_evaluacion),
	'Update',
);

$this->menu=array(
	array('label'=>'List TipoEvaluacion', 'url'=>array('index')),
	array('label'=>'Create TipoEvaluacion', 'url'=>array('create')),
	array('label'=>'View TipoEvaluacion', 'url'=>array('view', 'id'=>$model->id_tipo_evaluacion)),
	array('label'=>'Manage TipoEvaluacion', 'url'=>array('admin')),
);
?>

<h1>Update TipoEvaluacion <?php echo $model->id_tipo_evaluacion; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
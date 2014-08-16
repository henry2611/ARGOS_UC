<?php
/* @var $this EvaluacionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Evaluaciones',
);

$this->menu=array(
	array('label'=>'Create Evaluacion', 'url'=>array('create')),
	array('label'=>'Manage Evaluacion', 'url'=>array('admin')),
);
?>

<h1>Evaluaciones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

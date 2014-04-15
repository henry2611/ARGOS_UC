<?php
/* @var $this TipoEvaluacionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Evaluacions',
);

$this->menu=array(
	array('label'=>'Create TipoEvaluacion', 'url'=>array('create')),
	array('label'=>'Manage TipoEvaluacion', 'url'=>array('admin')),
);
?>

<h1>Tipo Evaluacions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
